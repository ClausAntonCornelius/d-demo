<?php

/****************************************
*
*
* Die Datenbankklasse über die alle DB Zugriffe abgewickelt werden
*
* @author spec
* @copyright 2003, webtales
*
* $Id: inc_db_query.php,v 1.22 2012/01/21 17:42:17 doc Exp $
*****************************************/

if(!defined("GAMEOPTIONS")){
	//gameoptions.php has not yet been included, its vital so we do it now
	require $_SERVER["DOCUMENT_ROOT"]."/gameoptions.php";
}

if(!defined("LANGUAGE")){
	//langauge.php has not yet been included, its vital so we do it now
	require $_SERVER["DOCUMENT_ROOT"]."/language/language.php";
}

if(!defined("DB_QUERY")||(DB_QUERY==false)){
        //only define if not defined yet
        define("DB_QUERY",true); //say we have been included
        /****************************************************
        * function error_trace()
        *
        * returns string with complete call trace
        * should be more interesting than current line_number
        ****************************************************/
        function error_trace(){
        	$result="";
        	$array=debug_backtrace();
        	foreach($array as $call){
        		if (($call["function"]!="error_trace")&&($call["function"]!="include")&&($call["function"]!="require")&&($call["function"]!="require_once")&&($call["function"]!="include_once")){
        			//we do not want to see the call of this function here .. or includes, requires
        			$result .= "aktuelle Datei: ".$call["file"]."\r\n";
        			$result .= "aufgerufene Funktion:".$call["function"]."\r\n";
        			$result .= "aus Zeile: ".$call["line"]."\r\n";
        		}
        	}
        	return $result;
        }
        
        /**
         * Klasse db_query zur Abstraktion von Datenbank-Zugriffen
         *
         * mySQL-Version
         *
         * @author Sven Sladek, sven@sladek.de, spec
         * @copyright 2000,2003
         */
        class db_query{
        	// Das Handle der DB-Connection
        	var $dbcon;
        		
        	// Pointer innerhalb der aktuellen Query
        	var $queryptr;
        		
        	// Anzahl der Ergebniszeilen
        	var $rowcount;
        		
        	// Ergebnis der Query-Operation als assoziatives Array
        	var $result;
        
        	// Debug status
        	var $debug = 0;
        	
        	var $error_value;
        	var $error_text;
        	
        	var $sql_text;
        	
        	// --------------------------------
        	
        	/**
        	* Initializing of object
        	*
        	*
        	*
        	*
        	*/
        	
        	function __construct($DSN=GT_DB){
        	   //global array of all active db-handles
        		global $handle;
        		
        		//initialize variables
        		if(isset($_REQUEST["debug"])){
        		        $this->debug=$_REQUEST["debug"];
        		}
        		$this->error_value=0;
        		$this->error_text="";
        		
        		//atm we have just a global array
        		$this->dbcon= $this->connect_db($DSN);
        	}
        	// --------------------------------
        	
            /**************************
            *   connect_db($DSN) erstellt neuen link bzw. gibt vorhandenen zurück
            **************************/
            
            function connect_db($DSN=DB_GT){
                global $handle;
                global $DBservername;
                global $DBusername;
                global $DBpassword;
                global $DBdatabase;
                global $DBcharset;
                global $DBserverport;
                global $lang_out;
                    
                if (!isset($handle[$DSN]) || !is_resource($handle[$DSN])){
                    $handle[$DSN]=new mysqli ($DBservername[$DSN],$DBusername[$DSN],$DBpassword[$DSN],$DBdatabase[$DSN],isset($DBserverport[$DSN])?$DBserverport[$DSN]:null); //always make new link when we ar here
                    
                    if (!$handle[$DSN]){
                        $error=mysqli_connect_error();
                        die("<br></tr></table>".$lang_out["include.php"]["mysql_connect_error"]."<br>".$error);
                    }
                    
                    if(isset($DBcharset[$DSN])) {
                        $dbCharset = $DBcharset[$DSN];
                    } else {
                        $dbCharset = 'latin1';    
                    }
                    //echo "set link charset for "+$DSN+" to "+$dbCharset."<br>";
                    $handle[$DSN]->set_charset($dbCharset);
                }

                return $handle[$DSN];
            }

        	/**
        	* Ausführen eines SQL-Befehls
        	*
        	* Speichert den Pointer auf das Ergebnis des Befehls in $queryptr
        	* und die Anzahl der erhaltenen Zeilen in $rowcount
        	*/
        	function execute($sql,$error_handling=0){
        		global $lang_out;
        		global $server;
        		
        		/******- error-handling levels -*******
        		*
        		* 0 - sends mail, die()
        		* 1 - sends mail, no die()
        		* 2 - no mail, die()
        		* 3 - no mail, no die()
        		*/
        		
        		$this->error_value=0;
        		$this->error_text="";
        		$this->sql_text = $sql;
        		if ($this->debug==1){
        			$timer = new BC_Timer;
        			$timer->start_time();
        			echo "<br>[$sql] ".$lang_out["include.php"]["mysql_debug_text"].": ";
        		}
        		
        		if (!$this->queryptr=$this->dbcon->query($sql)){
        			// Absetzen der SQL wurde von der DB mit Fehler abgelehnt
        			$echoerror=true;
        			$sql_error=$this->dbcon->error;
        			if (preg_match('/Duplicate entry/', $sql_error) > 0){
        				//entsprechende Fehler entstehen ggf. durch die beiden Webserver, sind jedoch unbedenklich
        				//oder durch primärschlüssel, indices usw. .. evtl. sind die durchaus bedenklich
        				$this->error_value=1;
        				$this->error_text="Duplicate entry";
        				$echoerror=false;
        			}
        			elseif (preg_match("/www./", $sql_error) > 0){
        				//offensichtlich löschen einige nicht immer die bereits bestehende url und fügen eine neue
        				//url an, welche dann als Teil einer Variable unserer php übergeben wird und ggf. zum
        				//SQL-Fehler führt, weil ID "4711www.porno.de" bei uns eben nicht existiert.
        				$this->error_value=2;
        				$this->error_text="misformed query";
        				$echoerror=false;
        			}
        			else{
        				//some realbad error
        				$this->error_value=$this->dbcon->errno;
        				$this->error_text=$sql_error;
        			}
        
        			if (($echoerror)&&((1==$error_handling)||(0==$error_handling))){
        			        $error_msg="In der Seite ".$_SERVER["SCRIPT_NAME"]."  ist bei der Ausführung des Befehles\r\n".
        					  $sql." folgender Fehler aufgetreten:\r\n".
        					  $sql_error."\r\n".
        					  "aktueller Server: ".$server."\r\n".
        					  "calltrace: \r\n".error_trace().
        					  "aufrufende Seite: ".$_SERVER["HTTP_REFERER"]."\r\n".
        					  "Browserkennung: ".$_SERVER["HTTP_USER_AGENT"]."\r\n".
        					  "Query-String: ".$_SERVER["QUERY_STRING"]."\r\n".
        				          "aufrufende IP-Adresse: ".$_SERVER["REMOTE_ADDR"]." ".$_SERVER["PHP_AUTH_USER"];
        
        
        				if ((!mail("sql-bugs@".MAILHOST,"SQL-Fehler in Script ".$_SERVER["SCRIPT_NAME"],$error_msg,
        					  "From: no_reply@".MAILHOST."\r\nReply-To: no_reply@".MAILHOST."\r\nX-Mailer: PHP/" . phpversion(),
        					  "-f no_reply@".MAILHOST)
        				     )
        				     ||
        				     (TESTSYS==true)
        				    ){
        					echo nl2br($error_msg);
        				}
        			}
        				
        			if ((2==$error_handling)||(0==$error_handling)){
        				die ("<br></tr></table>".$lang_out["include.php"]["mysql_error_sql"]);
        			}
        			
        		};
                    		
        		$this->rowcount=$this->dbcon->affected_rows;
                    
        		if ($this->debug==1){
        			$timer->showtime();
        		}
        	}
              
        	// --------------------------------
        	
        	/**
        	* Holen der nächsten Resultat-Zeile der Query
        	*
        	* Speichern der Inhalte der Resultat-Zeile im assoziativen Array $result
        	*/
        	function next(){
        		$this->result=$this->queryptr->fetch_assoc();
        		if (!$this->result){
        			return (false);
        		}
        		else{
        			return (true);
        		};
        	}
           
        	// --------------------------------
        	
        	/**
        	* Zeiger zurück auf Anfang setzen
        	* @returns bool Erfolgsstatus
        	*/
        	function mv_start(){
        		if($this->rowcount > 0 && $this->queryptr->data_seek(0)){
        			return true;
        		}
        		else{
        			return false;
        		}
        	}

        	// --------------------------------
        
        	// Rückgabe des gewünschten Wertes aus der aktuellen Resultat-Zeile
        	function value($col){
        		if (is_array($this->result) && array_key_exists($col,$this->result)){
        			return($this->result["$col"]);
        		} else {
              if (defined("TESTSYS") && (TESTSYS == true)) {
                // warning only for not empty result sets
                if ($this->rowcount > 0) {
                  echo "<strong>".$col." not in result set</strong>".($this->sql_text)."<br />";
                }
              }
              return("");
        		};
        	}

        	
        	// --------------------------------
        
        	// Schließen der Datenbank, gilt anscheinend für alle Objekte
        	function close(){
        		$this->dbcon->close();
        	}
        	
        	// --------------------------------
        	
        	//return internal error code
        	function get_error_value(){
        		return $this->error_value;
        	}
        	
        	// --------------------------------
        	
        	//return internal error text
        	function get_error_text(){
        		return $this->error_text;
        	}
        	
        	// --------------------------------
        	
        	// return id of last insert
        	function get_insert_id(){
        		return $this->dbcon->insert_id;
        	}
        	
        	//escape string for current db handle ..
        	function escape($string){
        	    return $this->dbcon->real_escape_string($string);
        	}
        	
        	//returns server version string
        	function get_server_version(){
        	    return $this->dbcon->server_info;
        	}

            /*
             * returns server version as int. 
             * major * 10000, minor * 100, sub
             */
            function get_server_version_int(){
                return $this->dbcon->server_version;
            }
        	
        	/**
        	 * returns the complete row .. if already fetched
        	 */
        	function get_complete_row() {
        	   return $this->result;
        	}

            function get_charset() {
                return $this->dbcon->client_encoding();
            }
        };
        
        // -----------------------------------------------------------------------------------------------------------
        
        //Klasse zur Performance-Messung der einzelnen SQL-Statements
        class BC_Timer{
        	var $stime;
        	var $etime;
        
        	function get_microtime(){
          		$tmp=explode(" ",microtime());
          		$rt=$tmp[0]+$tmp[1];
          		return $rt;
         	}
        	
        	// --------------------------------
        	
         	function start_time(){
         		$this->stime = $this->get_microtime();
         	}
         
        	// --------------------------------
        
        	function end_time(){
        		$this->etime = $this->get_microtime();
        	}
         
        	// --------------------------------
        
        	function elapsed_time(){
          		return ($this->etime - $this->stime);
         	}
         
        	// --------------------------------
        
        	function showtime(){
        		echo ($this->get_microtime()-$this->stime . "  ");
        	}
        	
        	// --------------------------------
        
        	function rshowtime(){
        		echo $this->get_microtime()-$this->stime;
        	}
        
        	// --------------------------------
        
        	function savescripttime(){
        		$seite = $_SERVER["SCRIPT_NAME"];
        		$rs = new db_query;
        		$rs->execute("select * from tbl_x_performance where pe_seite = '".$seite."'");
        	
        		if ($rs->eof()){
        			dosql("insert into tbl_x_performance (pe_seite,pe_anzahl,pe_zeit) values ('".$seite."',1,".intval(($this->get_microtime()-$this->stime)*1000).")");
        		}
        		else{
        			dosql("update tbl_x_performance set pe_anzahl = pe_anzahl + 1, pe_durchschnitt = (pe_zeit+ ".intval(($this->get_microtime()-$this->stime)*1000).")/(pe_anzahl), pe_zeit = pe_zeit + ".intval(($this->get_microtime()-$this->stime)*1000)." where pe_seite = '".$seite."'");
        		}
        	}
        }
}
