<?php
/*******************************
 *
 *  zentrale include Datein
 *
 *  jede Menge Funktionen, Variablen
 *
 * $Id: include.php,v 1.399 2012/09/30 20:29:45 spec Exp $
 *******************************/

// Wo simmer denn grad auf dem Server?
$docroot=$_SERVER["DOCUMENT_ROOT"];

// --------------------------------

include $docroot."/classes/loader.php";
$loader = new \gt\AutoLoaderClass;
$loader->register();
$loader->addNamespace('gt',$docroot.'/classes');

// Die Spieloptionen einbinden
include $docroot."/gameoptions.php";

//nach oben versetzt da gerade die language.php schon gebraucht wird ..
include $docroot."/language/language.php";

include $docroot."/inc_db_query.php";

// template
include $docroot."/template/inc_template.php";

function log_user_activity($act_type, $id)
{
   global $acc_id;
   global $acc_md5;

   if (isset($id))
   {
      // Char Aktion
   }
   else
   {
      // Account Aktion
      $id=0;
   }

   // Variablendefinition
   //
   // $act_type	=	Aktions-Typ
   //	Alle zu protokollierenden Aktionen werden in der Tabelle act_type (DB Marketing) numerisch verschlüsselt
   //
   //	0   -  99	= Account Aktion

   //	100 - 199	= Char Aktion

   //	0 	= Account erstellt
   //	1	= Account ordnungsgemäß freigeschaltet
   //	10 	= Account Login

   //	100	= Char erstellt
   //	110	= Char Login
   //	111	= BP-Verbrauch
   //		= Levelup
   //		= Nuke erleidet

   // $id		=	Char-ID (optional)

   $RS = new db_query(MARKETING_DB);

   // Festlegung: 	WIE werden zu zählende Aktionen identifiziert und
   //		WELCHE Aktionen müssen die zu zählenden Aktionen bereits Datensatztechnisch WIE vorbereiten ?


   if ("Identifikation der zu zählenden Aktionen")
   {
      // Update-SQL bei zu zählenden Aktionen wie z.B. BP-Verbrauch, oder Forumsbesuch usw.
      // ACHTUNG: Zur Schonung der DB-Ressourcen ist es zwingend erforderlich bei einer entsprechenden
      //	vorhergehenden Aktion die Datensätze mit den zu zählenden Aktion VORHER anzulegen !!!
      //	Ansonsten würde vor einem Update-Versuch zunächst überprüft werden muessen, ob ein
      //	entsprechender Datensatz bereits vorhanden ist oder erst angelegt werden muss.
      $RS->execute("UPDATE action SET act_count = act_count + 1 WHERE
				act_md5 = $acc_md5 AND
				acc_id  = $acc_id AND
				char_id = $id AND
				act_type= $act_type");
   }
   else
   {
      //eigentliche Aktion protokollieren
      $RS->execute("INSERT INTO action
				(acc_id, char_id, act_md5, act_type, act_count, act_first, act_last)
				VALUES ($acc_id, $id, $acc_md5, $act_type, 1, sysdate(), sysdate())");


      switch ($act_type)
      {
         case 0:		// Account erstellt
            	
            $RS->execute("INSERT INTO account
							(acc_id, acc_created)
							VALUES ($acc_id, sysdate())");
            break;

         case 1:		// Account ordnungsgemäß freigeschaltet
            // Datensätze schon vorbereiten, da Login nicht mehr erforderlich?
            break;
            	
         case 10:	// Account Login
            // Datensätze für zu zählende Aktionen vorbereiten
            	
            break;

         case 110:	// Char Login
            // Datensätze für zu zählende Aktionen vorbereiten

            // BP-Verbrauch
            $RS->execute("INSERT INTO action
						(acc_id, char_id, act_md5, act_type, act_count, act_first)
						VALUES ($acc_id, $id, $acc_md5, 111, 0, sysdate())");
            	
            break;
            	
         default:	// keine Sonderbehandlung erforderlich
      }
   }
}







// -----------------------------------------------------------------------------------------------------------

function ist_integer($zahl)
{
   global $lang_out;
   // erstmal Püfen, ob das überhaupt eine Ansammlung numerischer Zeichen ist
   if (is_numeric($zahl)) {
      // Da auch ein String ausschlisslich aus numerischen Zeichen bestehen kann, hier
      // eine miniberechnung durchführen, damit die Variable auch sicher NICHT als String
      // interpretiert wird. (ansonsten läuft die Prüfung auf is_int() nicht!!)
      $zahl=$zahl*1;

      // ist die nun numerische Variable auch nun ein Integer ?
      if (!is_int($zahl)) {
        	?>
<script type="text/javascript">
        	alert ("<?php echo $lang_out["include.php"]["cardinal_number"];?>");
			history.back();
	        </script>
        	<?php
        	die();
      }
      else {
         // alles in Butter :-)
         return true;
      }
   }
   else {
     	?>
<script type="text/javascript">
       	alert("<?php echo $lang_out["include.php"]["cardinal_number"];?>");
		history.back();
        </script>
     	<?php
     	die();
   }
}

// -----------------------------------------------------------------------------------------------------------

function gain_exp($exp,$level=0) {
   global $id;
   global $epgainfactor;
   global $skillpointsbase;
   global $skillpointsrelative;
   global $lang_out;
   
   //when we don't want to give exp we don't need to calculate those things
   if($exp > 0){
      $RS=new db_query;
      if ($level==0) {
         $RS->execute("SELECT pl_lvl FROM tbluser WHERE id=".$id);
         $RS->next();
         $level=$RS->value("pl_lvl");
      };
      //give at least 1 Point
      $exp=max(1,ceil($exp*$epgainfactor/$level));
      $RS->execute("UPDATE tbluser SET pl_exp=pl_exp+".$exp.",ths_pl_exp=ths_pl_exp+".$exp." WHERE id='".$id."'");
      $RS->execute("SELECT pl_exp, pl_lvl, pl_nxtlvl, "
      ."(pl_sk_1+pl_sk_2+pl_sk_3+pl_sk_4+pl_sk_5+pl_sk_6+pl_sk_7+pl_sk_8+pl_sk_9+"
      ."pl_sk_10+pl_sk_11+pl_sk_12+pl_sk_13+pl_sk_14+pl_sk_15+pl_sk_16+pl_sk_17+"
      ."pl_sk_18+pl_sk_19+pl_sk_20+pl_sk_21+pl_sk_22+pl_sk_24) as skill_sum "
      ."FROM tbluser WHERE id='".$id."'");
      $RS->next();
      if ($RS->value("pl_exp")>$RS->value("pl_nxtlvl")) {
         $pl_lvl = $RS->value("pl_lvl");
         $next_lvl = floor(($pl_lvl+1)*($pl_lvl+1)*($pl_lvl+2)/10)*200+(($pl_lvl+1)*300);
         $pl_lvl++; //calculate outside sql

         if ($pl_lvl <= 10) {
            //doppelte skillpunkte fuer newbees
            $skillpointsbase = $skillpointsbase*2;
         }
         if($pl_lvl <= 30) {
            //skillcap könnte greifen
            $cap = get_skillcap($pl_lvl);
            if(($RS->value("skill_sum")+($skillpointsbase*100)) > $cap) {
               //summe der skills + skillpoints > als cap -> max. rest bis zum cap als punkte (abgerundet) (falls summe < cap sonst 0)
               $maxpoints = max(0,($cap - $RS->value("skill_sum")));
               $skillpointsbase = floor($maxpoints/100);
            }
         }
          

         $RS->execute("UPDATE tbluser SET pl_nxtlvl=$next_lvl, pl_lvl=$pl_lvl, pl_sk_pts=$skillpointsbase+round(pl_lvl/$skillpointsrelative) WHERE id=".$id);
         ?>
		<script type="text/javascript">
   			top.frames[0].schreib("<?php echo $lang_out["include.php"]["new_level"] ?>");
   		</script>
   		<?php
   		
   	    $RSoptions= new db_query;
   	    $RSoptions->execute("SELECT * FROM char_options WHERE id=$id");
   			
   	    if (($RSoptions->rowcount)==1) {
   		   $RSoptions->next();
   		
      		// Prüfung, ob auto_bounty nun angepasst werden muss?
      		// Achtung in $RS steckt noch das ALTE Level !!
      		if ( ($RSoptions->value("auto_bounty")) < (($RS->value("pl_lvl")+1)/10+1) ) {
      			$auto_bounty=($RS->value("pl_lvl")+1)/10+1;
      		}
      		else {
      			$auto_bounty=$RSoptions->value("auto_bounty");
      		}
      
      		$RS->execute("UPDATE char_options SET auto_bounty='$auto_bounty' WHERE id=$id");
      	}
      	else {
      		$auto_bounty=($RS->value("pl_lvl")+1)/10+1;
      		$RS->execute("INSERT INTO char_options (id,auto_bounty) VALUES($id,$auto_bounty)");
      	}
   
      	// Wenn Server Skillpunkte zuläßt auf Charsheet springen
      	if($skillpointsbase > 0) {
      	   //write marker into charoptions and be done ..
      	   $RS->execute("UPDATE char_options SET lvlup_notify=1 WHERE id=".$id);
      	}
      };
   }
};

// -----------------------------------------------------------------------------------------------------------


// Login Sequenz zum einloggen in den Account, dabei cookies setzen, md5 generieren und DB Update
function login_sequence($acc_id_par){
   global $accpre;

   // IP des Users ermitteln...
   $ip = $_SERVER["REMOTE_ADDR"];

   // Login-MD5 generieren
   $login_md5 = md5($acc_id_par . time());

   $RSdummy = new db_query;

   $sql_lang = "";
   if(defined("TESTSYS") && (TESTSYS == true)) {
      if(defined("NEWMAP") && (NEWMAP == true)) {
         $sql_lang = ",acc_lang";
      }
   }

   // is das hier derselbe Account wie der in den Cookies?
   if(isset($_COOKIE["acc_id"]) && ($acc_id_par != $_COOKIE["acc_id"])) {
      // ja wie kommt das denn bitte? gleich mal aufschreiben
      $RSdummy->execute("INSERT INTO log_account_xaccess (current_acc, other_acc, ip, time) VALUES
       																					(".$acc_id_par.",".$_COOKIE["acc_id"].",'".$ip."', now())");
   }
   // Hat sich der User in diesem Account schonmal eingeloggt? ja -> cookies löschen...
   $sql = "SELECT login_md5".$sql_lang." FROM tblaccounts WHERE acc_id=".$acc_id_par;
   $RSdummy->execute($sql);
   $RSdummy->next();

   $acc_lang = $RSdummy->value("acc_lang");
   if(($RSdummy->value("login_md5")==NULL) || ($RSdummy->value("login_md5")== ""))	{
      setcookie("acc_id", $acc_id_par, time() - 1);
      setcookie("acc_md5", $RSdummy->value("login_md5"), time() - 1);
      if(defined("TESTSYS") && (TESTSYS == true)){
         if(defined("NEWMAP") && (NEWMAP == true)) {
            setcookie($accpre."_lang", "", time() - 1, "/");
         }
      }
   }

   // MD5 + IP in die DB schreiben...
   $sql = "UPDATE tblaccounts SET login_md5='$login_md5', acc_ip='$ip' WHERE acc_id=".$acc_id_par;
   $RSdummy->execute($sql);

   // und dann noch die cookies setzten - einmal die acc_id und dann den MD5...
   setcookie("acc_id", $acc_id_par);
   setcookie("acc_md5", $login_md5);
   if(defined("TESTSYS") && (TESTSYS == true)) {
      if(defined("NEWMAP") && (NEWMAP == true)) {
         setcookie($accpre."_lang", $acc_lang, time()+(3600*24), "/");
      }
   }
}


// -----------------------------------------------------------------------------------------------------------


/**
 * Ist id gesetzt?
 */
function chk_id($manual_id = NULL) {
   global $lang_out;

   if($manual_id != NULL){
      $id = $manual_id;
   }
   else {
      $id = $_REQUEST["id"];
   }

   if ((!isset($id)) OR (!ist_integer($id))) {
      ?>
<script type="text/javascript">
		alert ("<?php echo $lang_out["include.php"]["no_cookie_set"] ?>");
		top.location.href="/index.php";
		</script>
      <?php
      die();
   }
}
// -----------------------------------------------------------------------------------------------------------

/**
 * Prüfung, ob die in Cookies hinterlegten Accountdaten, mit den Datenbankinformationen übereinstimmen
 */
function chk_ip() {
   // Die Werte aus der Datenbank sollen mit den globalen Variablen verglichen werden
   global $lang_out;
   global $payduty; // Kostenpflicht ja oder nein

   $RSipchk = new db_query;
   $RSacc = new db_query;
   $RSchar = new db_query;

   //einfache Prüfungen ob die wichtigsten Variablen gesetzt sind ODER ob die Anfrage besteht das der IP-Check auszuschalten ist...
   if ((!isset($_COOKIE["acc_md5"]) OR !isset($_COOKIE["acc_id"])) AND ($_REQUEST["ipchk_off_request"] != 1)) {
      ?>
<script type="text/javascript">
		alert ("<?php echo $lang_out["include.php"]["re_login"]?>");
		top.location.href="/index.php";
		</script>
      <?php
      die();
   }
   $acc_id = isset($_GET["acc_id"])?$_GET["acc_id"]:$_COOKIE["acc_id"];
   // Daten des Account besorgen...
   $sql = "SELECT login_md5,paytime FROM tblaccounts WHERE acc_id=".$acc_id;
   $RSacc->execute($sql);
   $RSacc->next();
   $datear=explode("-",$RSacc->value("paytime"));
   if (@count($datear) < 3) {
      // Offensichtlich gibt die DB als nicht-separierten Wert zurück, manuell auseinanderschneiden
      $ds=$RSacc->value("paytime");
      $datear[0]=substr($ds,0,4); // Jahr
      $datear[1]=substr($ds,4,2); // Monat
      $datear[2]=substr($ds,6,2); // Tag
   };
   // Unix-Timestamp aus dem Ablaufdatum erstellen, Zeit ist 23:59:59
   $abo_end=mktime ( 4, 59, 59, $datear[1], $datear[2]+1, $datear[0]);

   $db_acc_md5 = $RSacc->value("login_md5");

   // Antrag, den IP-Check AUS zu schalten... (funktioniert NUR mit chars, nicht mit dem account)
   if (isset($_REQUEST["ipchk_off_request"]) && $_REQUEST["ipchk_off_request"] == 1) {
      // Existiert keine GÜLTIGE authorisierung?
      $sql = "SELECT * FROM char_access WHERE time > DATE_SUB(SYSDATE(), INTERVAL 15 MINUTE) AND id=".$_REQUEST["id"]." AND ip='" . $_SERVER["REMOTE_ADDR"] . "'";
      $RSipchk->execute($sql);
      if (!$RSipchk->next()) {
         ?>
<script type="text/javascript">
			alert ("<?php echo $lang_out["include.php"]["no_permission"] ?>");
			top.location.href="/index.php";
			</script>
         <?php
         die();
      }
   }
   else {
      // Vergleichen des md5 im cookie und in der DB
      if (($_COOKIE["acc_md5"] != $db_acc_md5) OR ($db_acc_md5 == "")) {
         ?>
<script type="text/javascript">
			alert ("<?php echo $lang_out["include.php"]["re_login"]?>");
			top.location.href="/index.php";
			</script>
         <?php
         die();
      }
      	
      // Befinden wir uns in einem Char oder nur so im Account
      // $id wird auch bei Erstellung einer Forenantwort mitgegeben
      // also: keine ID-Prüfung wenn Forenantwort
      // id 0 damit keiner als system msgs sendet, isset weil in account nicht immer id da .. wo gebraucht wird eh getestet (spec)
      if ( ( ($_REQUEST["id"] >= 0)&& (isset($_REQUEST["id"])) ) && (preg_match("/nntp2web|juwelboard/",$_SERVER["SCRIPT_NAME"])==0) )	{
         // Gehört der Char überhaupt zum Account?
         $sql = "SELECT id, pl_ip, sh_loc_id, pl_lvl FROM tbluser WHERE acc_id=".$acc_id." AND id=".$_REQUEST["id"];
         $RSchar->execute($sql);
         	
         if (!$RSchar->next()) {
            ?>
<script type="text/javascript">
				alert ("<?php echo $lang_out["include.php"]["not_in_account"]?>");
				top.location.href="/index.php";
				</script>
            <?php
            die();
         }
         $pl_lvl=$RSchar->value("pl_lvl");
         // Ist der Char ggf. gesperrt ?
         if ( ! is_numeric(substr($RSchar->value("pl_ip"),0,1))&& !checkForIP($RSchar->value("pl_ip")))	{
            ?>
<script type="text/javascript">
				alert("<?php echo $lang_out["include.php"]["account_blocked"].$RSchar->value("pl_ip") ?>");
				top.location.href="/index.php";
				</script>
            <?php
            die();
         }
         	
         // Jetzt die Prüfung für Payment
         	
         // if-Abfrage zum "deaktivieren" des payments
         // if (0==1) {
         	
            // Ist das überhaupt eine kostenpflichtige Aktion UND bedarf es einer Prüfung ?
            $flipout=true; //flag whether char will return from "systemruhe" or not
            if ( ($pl_lvl > 15) && ($abo_end < time()) ) {
               //this char is not payed for
               $pay_ok=true;
               // Prüfung ist erforderlich
               // Grundsätzlich alles kostenpflichtig, nun aber die Ausnahmen
               // Liste der Scripte, die auch ausgeführt werden dürfen, auch wenn Account NICHT bezahlt
               // muss . in RegEx per \ auskommentiert werden ?
               /*
                * this central approach is soo broken .. do not use right now ..
               if (!preg_match("(index.php|char_delete|frame\.php|messagecenter|charsheet|charts\.php"
                               ."|clan_highscore|cockpit|menu\.php|ship|clan\.php|options\.php)",$_SERVER["SCRIPT_NAME"])) {
                  //action not allowed
                  $pay_ok = false;
                  $flipout=false;
               }
               else {
                  //action allowed
                  $pay_ok = true;
                  $flipout=false;
               };
               */
            }
            else {
               $pay_ok=true;
            }
            	
            // Keine Aktionen mehr in Location 0
            // ist jedoch ein Char nicht bezahlt und steht aktuell in Location 0, soller auch dort bitte drin bleiben!
            if ( ($RSchar->value("sh_loc_id")==0) AND ($flipout)) {
               $RSchar->execute("UPDATE tbluser SET sh_loc_id=old_sh_loc_id WHERE id=".$_REQUEST["id"]);
            }
            	
            if ($pay_ok==false) {
               //set char into "systemruhe", kill script
               $RSchar->execute("UPDATE tbluser SET sh_loc_id=0 WHERE id=".$_REQUEST["id"]." AND NOT (sh_loc_id IN (99999,99998))");
               die("
				<script language=javascript>
				alert('".$lang_out["include.php"]["no_abo"]."');
				history.back();
				</script>");
            }
         }
      }
   };

   // -----------------------------------------------------------------------------------------------------------

   /**
    * Prüfung, ob der User noch Bewegungspunkte zur Verfügung hat
    *
    * @param $RS \db_query Datensatz des zu überprüfenden Users
    * @param $ausparken - are we in the process of leaving parking area?
    */
   function chk_bp($RS,$ausparken=false){
      global $id;
      global $lang_out;
      global $ip;

      // Prüfe ob User noch Bewegungspunkt > 0 hat
      // L.D. habe auch die Prüfung eingebaut, ob das Schiff bereits zerstört wurde!
      // auch wenn nun der Name der Funktion nicht mehr ganz passt, erschien mir dies
      // hier die sinnvollste Stelle
      if (( $RS->value('pl_bp') <= 0 ) || ( $RS->value('sh_health') <=0 )){
         if ( $RS->value('pl_bp') <= 0 )	{
            ?>
<script type="text/javascript">
			if (top.location==this.location)
			{
				opener.top.frames[0].schreib("<?php echo $lang_out["include.php"]["no_mp_left"] ?>");
				history.back();
			}
			else
			{
				top.frames[0].schreib("<?php echo $lang_out["include.php"]["no_mp_left"] ?>");
				top.frames[1].location.href="/1/cockpit.php?id=<?php echo $id ?>&ship_move=nobp";
			};
			</script>
            <?php
            die();
         }
         else
         {
            ?>
<script type="text/javascript">
			top.frames[0].schreib("<?php echo $lang_out["include.php"]["ship_destroyed"] ?>");
			history.back();
			</script>
            <?php
            die();
         };
      };

      if ((($RS->value("sh_loc_id") == 99999)||($RS->value("sh_loc_id") == 99999))&&($ausparken != true))	{
         // Prüfung, ob der char etwas anderes als ausparken durchführen möchte
         ?>
<script type="text/javascript">
			top.frames[0].schreib("<?php echo $lang_out["include.php"]["disallowed_in_landing_arrea"] ?>");
			history.back();
			</script>
         <?php
         die();
      };

      // Erstmal Lastaction wieder = 5000 und Panikflucht = 0 setzen
      $RSme= new db_query;
      $RSme->execute("UPDATE tbluser SET pl_lastaction=5000,pl_pfcounter=0, pl_ip='$ip' WHERE id=$id");

      //alle anstehenden Parkversuche killen ..
      $RSme->execute("DELETE FROM tblparkomat WHERE char_id=".$id);

   };

   // -----------------------------------------------------------------------------------------------------------

   /**
    * Prüft, ob ein anderes Schiff momentan sichtbar ist
    *
    * @param $RSme \db_query - Datensatz des zu prüfenden ("sehenden") Users
    * @return bool - tell if the other is in line of sight
    */
   function chk_los($RSme) {
      global $id;
      global $ot_id;
      global $lang_out;
      $RSother = new db_query;
      // Die Anzahl der Schiffe berechnen, die $id sehen kann
      // 4+Sensorik/5
      $visibility = round($RSme->value("pl_sk_24")/500+5);

      // Die Schiffe selektieren, die im selben Sektor wie $id sind,
      // noch Zustand > 0 haben. Sortieren nach Skill "Tarnmanöver".
      // Der am schlechtesten Getarnte kommt zuerst.
      // Anzahl der Ergebnisse = $visibility
      $RSother->execute("SELECT id,sh_graphic,pl_race,pl_guild,pl_kills_g,pl_kills_e,sh_name,pl_gu_shortcolor
         					from tbluser
      					        LEFT JOIN tblstation on tbluser.sh_loc_id=tblstation.st_loc_id AND tblstation.st_type=0 AND tblstation.st_health >0 AND tblstation.st_id=tbluser.id
         					WHERE tbluser.sh_loc_id=".$RSme->value("sh_loc_id")."
         					AND st_id IS NULL
         					AND NOT (tbluser.id=$id)
         					AND tbluser.sh_health>0
         					AND NOT (id <= ".MAX_EVENTCHAR_ID." OR sh_type LIKE '%shuttle%')
         					ORDER by pl_sk_23, pl_exp
                                           	LIMIT " . $visibility);

      $tosee=0;

      // Falls sich $ot_id unter den sichtbaren Schiffen befindet, Flag setzen
      while ( $RSother->next() ) {
         if ($RSother->value("id")==$ot_id) {
            $tosee=1;
         }
      };
      $RSother->execute("SELECT id FROM tbluser WHERE ((sh_type LIKE '%shuttle%') OR (id <= ".MAX_EVENTCHAR_ID.")) AND id=".$ot_id." AND sh_loc_id=".$RSme->value("sh_loc_id"));
      if ($RSother->next()) $tosee=1;

      //if ($ot_id <= MAX_EVENTCHAR_ID) $tosee=1;
      // Schiff garnicht sichtbar? Dann war das wohl ein Cheat-Versuch! Und wenn im Kerker isses egal :-)

      if ( ($tosee==0) && ($RSme->value("sh_loc_id")!=111) ) {
         ?>
<script type="text/javascript">
		alert("<?php echo $lang_out["include.php"]["ship_out_of_sight"] ?>");
		</script>
         <?php
         return false;
      };
      return true;
   };

   // -----------------------------------------------------------------------------------------------------------

   /**
    * Gibt den Dateinamen der Schiffsgrafik zu einem Schiffstyp $shiptype zurück
    *
    * @param sh_id -  Typ des Schiffs (String)
    * @param sh_origin - flag if this is a clanship
    * @return Dateinamen der Schiffsgrafik
    */

   function shiptype2graphic($sh_id, $sh_origin=0) {
      /*
       due to my lack of foresight there is no easy link between clanship types and standard type so i had to do it this way ..
       */
      $RS = new db_query;

      switch ($sh_origin) {
         case 1 : //clanship ..... ???? sonderbare sache das ding
            $RS->execute("SELECT rsh_graphic,rsh_id FROM tblraw_ships WHERE (rsh_id=$sh_id and rsh_origin=1) OR rsh_origin=0 ORDER BY rsh_origin DESC, rsh_id DESC");
            $RS->next();
            $pic_name=$RS->value("rsh_graphic");
            switch ($pic_name{8}) {
               case 9 : //based upon multifunctional ship
                  while (!(($RS->value("rsh_id")==11)&&($RS->value("rsh_origin")==0))) {
                     $RS->next();
                  }
                  return $RS->value("rsh_graphic");
                  break;
               case 8 : //based upon Corvette ship
                  while (!(($RS->value("rsh_id")==7)&&($RS->value("rsh_origin")==0))) {
                     $RS->next();
                  }
                  return $RS->value("rsh_graphic");
                  break;
               case 7 : //based upon destroyer ship
                  while (!(($RS->value("rsh_id")==10)&&($RS->value("rsh_origin")==0))) {
                     $RS->next();
                  }
                  return $RS->value("rsh_graphic");
                  break;
               case 6 : //based upon cruiser ship
                  while (!(($RS->value("rsh_id")==9)&&($RS->value("rsh_origin")==0))) {
                     $RS->next();
                  }
                  return $RS->value("rsh_graphic");
                  break;
               case 5 : //based upon frigate ship
                  while (!(($RS->value("rsh_id")==13)&&($RS->value("rsh_origin")==0))) {
                     $RS->next();
                  }
                  return $RS->value("rsh_graphic");
                  break;
               case 4 : //based upon fighter ship
                  while (!(($RS->value("rsh_id")==8)&&($RS->value("rsh_origin")==0))) {
                     $RS->next();
                  }
                  return $RS->value("rsh_graphic");
                  break;
               case 3 : //based upon transporter ship
                  while (!(($RS->value("rsh_id")==6)&&($RS->value("rsh_origin")==0))) {
                     $RS->next();
                  }
                  return $RS->value("rsh_graphic");
                  break;
               case 2 : //based upon pegasus ship
                  while (!(($RS->value("rsh_id")==12)&&($RS->value("rsh_origin")==0))) {
                     $RS->next();
                  }
                  return $RS->value("rsh_graphic");
                  break;
               case 1 : //based upon freighter ship
                  while (!(($RS->value("rsh_id")==5)&&($RS->value("rsh_origin")==0))) {
                     $RS->next();
                  }
                  return $RS->value("rsh_graphic");
                  break;
               case 0 : //based on custom ship
                  return $RS->value("rsh_graphic");
                  break;
               default  : //error
                  return "na.gif";
                  break;
            }
            break;
               case 0 : //normal ship
               default:
                  $RS->execute("SELECT rsh_graphic FROM tblraw_ships WHERE rsh_id=$sh_id and rsh_origin=0");
                  $RS->next();
                  return $RS->value("rsh_graphic");
                  break;
      }
   };

   // -----------------------------------------------------------------------------------------------------------



   // -----------------------------------------------------------------------------------------------------------

   /**
    * Rechnet Rundenanzahl in Realzeit um und liefert String zurück
    */
   function runde2time($dauer) {
      global $lang_out;
      global $serverspeed;
      $tage = floor($dauer/48);
      $stunden=($dauer- ($tage*48) ) /2; //round lassen ma erstmal weg :)
      $minuten=$serverspeed; //halbe Stunde halt :-)
      if ($tage > 0) {
         if ($tage > 1) {
            if ($stunden > 1.5) {
               // 10.5 - 10 = 0.5 => 10 Stunden 30 Minuten
               if($stunden-round($stunden) == 0) {
                  $retval=$tage.$lang_out["include.php"]["days"].$stunden.$lang_out["include.php"]["hours"];
               } else {
                  $retval=$tage.$lang_out["include.php"]["days"].floor($stunden).$lang_out["include.php"]["hours"].$minuten.$lang_out["include.php"]["minutes"];
               }
            } else {
               // nochmal Trennung wegen 1 Stunde und 0 Stunden
               if($stunden > 0) {
                  if($stunden-round($stunden) == 0) {
                     $retval=$tage.$lang_out["include.php"]["days"].$stunden.$lang_out["include.php"]["hour"];
                  } else {
                     if(floor($stunden) != 0) {
                        $retval=$tage.$lang_out["include.php"]["days"].floor($stunden).$lang_out["include.php"]["hour"].$minuten.$lang_out["include.php"]["minutes"];
                     } else {
                        $retval=$tage.$lang_out["include.php"]["days"].$minuten.$lang_out["include.php"]["minutes"];
                     }
                  }
               } else {
                  $retval=$tage.$lang_out["include.php"]["days"];
               }
            };
         } else {
            // das gleiche wie oben nur Tag statt Tage
            if ($stunden > 1.5) {
               if($stunden-round($stunden) == 0) {
                  $retval=$tage.$lang_out["include.php"]["day"].$stunden.$lang_out["include.php"]["hours"];
               } else {
                  $retval=$tage.$lang_out["include.php"]["day"].floor($stunden).$lang_out["include.php"]["hours"].$minuten.$lang_out["include.php"]["minutes"];
               }
            } else {
               if($stunden > 0) {
                  if($stunden-round($stunden) == 0) {
                     $retval=$tage.$lang_out["include.php"]["day"].$stunden.$lang_out["include.php"]["hour"];
                  } else {
                     if(floor($stunden) != 0) {
                        $retval=$tage.$lang_out["include.php"]["day"].floor($stunden).$lang_out["include.php"]["hour"].$minuten.$lang_out["include.php"]["minutes"];
                     } else {
                        $retval=$tage.$lang_out["include.php"]["day"].$minuten.$lang_out["include.php"]["minutes"];
                     }
                  }
               } else {
                  $retval=$tage.$lang_out["include.php"]["day"];
               }
            };
         };
      } else {
         // 0 Tage ....Rest ist wieder das gleiche
         if ($stunden == 0) {
            $retval=$lang_out["include.php"]["immediately"];
         } else {
            if ($stunden > 1.5)      {
               if($stunden-round($stunden) == 0) {
                  $retval=$stunden.$lang_out["include.php"]["hours"];
               } else {
                  if(floor($stunden) != 0) {
                     $retval=floor($stunden).$lang_out["include.php"]["hours"].$minuten.$lang_out["include.php"]["minutes"];
                  } else {
                     $retval=$stunden.$lang_out["include.php"]["hours"].$minuten.$lang_out["include.php"]["minutes"];
                  }
               }
            } else {
               if($stunden > 0.5) {
                  if($stunden-round($stunden) == 0) {
                     $retval=$stunden.$lang_out["include.php"]["hour"];
                  } else {
                     $retval=floor($stunden).$lang_out["include.php"]["hour"].$minuten.$lang_out["include.php"]["minutes"];;
                  }
               } else {
                  $retval=$minuten.$lang_out["include.php"]["minutes"];
               }
            };
         };
      };

      return $retval;
   };

   // -----------------------------------------------------------------------------------------------------------

   // Funktion um einen char zu löschen...
   function char_death($id, $allowonelogin = false, $newsmessage="" , $moveToShadow = false) {
      $RS= new db_query;
      $RSwrk = new db_query;
      $RSb = new db_query(BOARD_DB);

      $RS->execute("SELECT * FROM tbluser WHERE id=$id");
      $RS->next();

      // if coming from nuke, store in shadowtable
      if ($moveToShadow === true) {
          backupRow($RS,"tbluser");

          // tblship_slots
          $RSwrk->execute("SELECT * FROM tblship_slots WHERE sh_id=".$RS->value("id"));
          while($RSwrk->next()) {
              backupRow($RSwrk,"tblship_slots");
          }
          // tblship_cargo
          $RSwrk->execute("SELECT * FROM tblship_cargo WHERE sh_id=".$RS->value("id"));
          while($RSwrk->next()) {
              backupRow($RSwrk,"tblship_cargo");
          }
      }

      $gu_id=$RS->value("pl_guild");
      $pl_name=$RS->value("pl_name");

      removeFromClan($id);

      // Nachrichten des Spielers löschen
      if ($moveToShadow === true) {
          $RS->execute('SELECT * FROM tblmessages WHERE receiver_id='.$id);
          while($RS->next()) {
              backupRow($RS,"tblmessages");
          }
      }
      $RS->execute("DELETE FROM tblmessages WHERE receiver_id=$id");

      // Alle Adressbuch eintragungen für den Spieler löschen
      $RS->execute("DELETE FROM tblcontactbook WHERE id=$id");

      // Player wird nicht mehr physikalisch gelöscht, es ist aber erforderlich ein paar Kleinigkeiten durchzuführen:
      // - Station muss aus dem Weg geräumt werden (st_loc_id=0)
      // - Das Schiff nach Location 0
      // - Char aus der Gilde/Clan nehmen (pl_guild=0)
      // - Char umbenennen damit ein neuer Char mit vorherigem Namen wieder angelegt werden kann
      // - Charnick von der Verbindung zum Char befreien, ACLs löschen ..

      $char_list = "";
      $RSb->execute("SELECT n_id FROM tblnicks WHERE n_char_nick=".$id);
      while($RSb->next()) {
          
         $char_list .= ",".$RSb->value("n_id");
      }
      if($char_list != "") {
         $char_list = trim($char_list,",");
         //alle gruppenzugehörigkeiten ausser default+story (1 und 3) löschen
         $RSb->execute("DELETE FROM tblnicks_acl WHERE n_acl <> 1 AND n_acl <> 3 AND n_id IN (".$char_list.")");
      }
      $RSb->execute("UPDATE tblnicks SET n_char_nick=0 WHERE n_char_nick=".$id);

      if ($allowonelogin === true) {
         $sql = "UPDATE tbluser SET sh_loc_id=0, sh_health=0, pl_guild=0, pl_ip='0' where id=$id";
      } else {
         $sql = "UPDATE tbluser SET acc_id=0, sh_loc_id=0, sh_health=0, pl_guild=0, pl_name='tot_" . $RS->escape($pl_name) . "', pl_pwd='death',abo_end=date_sub(now(),interval 1 day) where id=$id";
      }

      $RS->execute($sql);
      $RS->execute("UPDATE tblstation SET st_health=0 WHERE st_id=$id AND st_type=0"); //no physical station delete .. will be done were starving is computed
      // noch eine Nachricht absetzten...
      if ($newsmessage != "")
      {
         $RS->execute("INSERT INTO tblnews (news, happened) VALUES ('".$RS->escape($newsmessage)."', NULL)");
      }
   };

   /**
    * @param $RSrow \db_query - row to backup
    * @param $tableMode string - table this row comes from
    */
   function backupRow($RSrow, $tableMode) {
       $sql = "INSERT INTO s_%tableName% (%fieldList%) VALUES (%valueList%)";
       $fieldList = "entered";
       $valueList = "now()";
       $rowData = $RSrow->get_complete_row();

       foreach ($rowData as $k => $v) {
           if(!is_numeric($k)) {
               // echo $k." => ".$v."<br>";
               $fieldList .= ",".$k;
               $valueList .= ",'".$RSrow->escape($v)."'";
           }
       }

       $sql = str_replace("%fieldList%",$fieldList,str_replace("%valueList%",$valueList,str_replace("%tableName%",$tableMode,$sql)));

       echo "<pre>".$sql."</pre>";
   }
   // ----------------------------------------------------------------------------------------------------------
   /*
   set new clan leader or delete clan and clanstation
   */
   function removeFromClan($id) {
      global $lang_out;

      $RS = new db_query;
      $RS->execute("SELECT * FROM tbluser WHERE id=".$id);
      $RS->next();
      $gu_id = $RS->value("pl_guild");
      $id = $RS->value("id");
      if ($gu_id  > 0 ) {
         $RSguilds = new db_query;
         $RSguilds->execute("SELECT * FROM tblguilds WHERE gu_id=".$gu_id);
         $RSguilds->next();

        	$gu_master = $RSguilds->value("gu_master");
        	$gu_co_master = $RSguilds->value("gu_co_master");
        	$gu_st_admin = $RSguilds->value("gu_st_admin");
        	// Checken ob der Leader, Co-Leader oder Stat Verwalter sich kickt

        	if ( $id == $RSguilds->value("gu_master")
        	||  // der Leader kickt sich selbst...was'n Fisch
        	$id == $RSguilds->value("gu_st_admin")
        	|| // Clan Station Verwalter kickt sich selbst
        	$id == $RSguilds->value("gu_co_master")  )
        	// Co Leader kickt sich selbst
        	{
        	   $RSnext_leader = new db_query;
        	   $RSnext_leader->execute("SELECT id,pl_exp FROM tbluser where pl_guild=".$gu_id." order by pl_exp desc");
        	   $RSnext_leader->next();

        	   if ( $id == $RSguilds->value("gu_master") ) {
        	      // Auf Wunsch eines einzelnen Herrn Co Leader wird neuer Clanmuckel
        	      if ( $id == $RSguilds->value("gu_co_master") ) { // nun noch gucken ob er auch gu_st_admin ist
        	         if ( $id == $RSguilds->value("gu_st_admin") ) { // datt war ja wohl nüschts und worst case
        	            while ($id == $RSnext_leader->value("id")){
        	               $RSnext_leader->next();
        	            }
        	            // höchste Exp nun neuer Leader
        	            $new_leader=$RSnext_leader->value("id");
        	         } else {
        	            // okay ClanMaster war auch nicht der st_Master, also neuer Leader der Co Master
        	            $new_leader = $gu_st_admin;
        	         }
        	      } else {
        	         // da isser ja
        	         $new_leader=$gu_co_master;
        	      }
        	   } else {
        	      // temporäre variable für das nächste if und um die Prüfungen weiter unten nicht zu zerstören
        	      $temp_co_leader=$gu_master;
        	   }


        	   // Co-Leader?? .. Freaks lauter Freaks
        	   if ( $id == $RSguilds->value("gu_co_master") ) {
        	      // Clan Master kanns ja nimmer sein
        	      if ( isset ($temp_co_leader) ) {
        	         // der (alte) Master nun auch Co Leader
        	         $new_co_leader=$temp_co_leader;
        	      } else {
        	         // neuer Master hat Kontrolle
        	         $new_co_leader = $new_leader;
        	      }
        	   }


        	   //  Verwalter??
        	   if ( $id == $RSguilds->value("gu_st_admin") ) {
        	      // Kontrolle geht an neuen Master zurück
        	      if ( !isset($temp_co_leader) ) {
        	         $new_st_admin = $new_leader;
        	      } else {
        	        // oder lieber an den alten Master
        	         $new_st_admin = $gu_master;
        	      }
        	   }
        	}

        	$RS->execute("UPDATE tbluser SET pl_guild=0, pl_gu_shortcolor='' WHERE id=".$id);
        	// mal schaun ob der Char ne Station hat
        	$RS->execute("SELECT station_only_clan FROM tblstation where st_id=".$id);
        	$RS->next();
        	if ( $RS->value("station_only_clan") == "1" ) { // Char hat, Station-Clan-Ban entfernen
        	   $RS->execute("UPDATE tblstation SET station_only_clan='0' WHERE st_id=".$id);
        	}
        	$RS->execute("SELECT count(*) as anzahl FROM tbluser WHERE pl_guild=".$gu_id);
        	$RS->next();
        	// falls letzter im Clan sollte das Ergebnis ja $RS->value("anzahl") == 0 sein
        	if ( $RS->value("anzahl") == 0 ) {
        	    // jetzt müssen ma auch noch checken obs eine Clanstation gab
        	   $RS->execute("DELETE FROM tblguilds WHERE gu_id=".$gu_id);
        	   $RS->execute("DELETE FROM tblclanwar WHERE gu_id=$gu_id OR ot_gu_id=".$gu_id);
        	   $RS->execute("SELECT st_health FROM tblstation WHERE st_id=$gu_id AND st_type=1");

        	   if ( $RS->next() ) {
        	      if ( $RS->value("st_health") > 0 ) {
        	         $replacing=array(
                                   "%clan_name%"=>$RSguilds->value("gu_name"),
                                   "%clan_short%"=>$RSguilds->value("gu_shorty"));
        	         // Eintrag in den News
        	         $deletemessage="<span style=\"color:silver;\">".strtr($lang_out["station_remove.php"]["has_detroyed_clanstaion"],$replacing)."</span>"; // "Der Clan %clan_name% [%clan_short%] hat soeben seine <b>Clanstation</b> selbst zerstört"
        	         $RS->execute("INSERT INTO tblnews (news, happened) VALUES ('".$RS->escape($deletemessage)."', NULL)");
        	      }
        	      $RS->execute("UPDATE tbluser SET sh_loc_id=0 WHERE sh_loc_id=99998 AND pl_guild=$gu_id"); //transfer from "parked at clanstation" to "hidden"
        	      // delete clanstation
        	      $RS->execute("DELETE FROM tblstation WHERE st_id=$gu_id AND st_type=1");
        	      $RS->execute("DELETE FROM tblstation_sells WHERE st_id=$gu_id AND st_type=1");
        	   }
        	   $RS->execute("DELETE FROM station_banlist WHERE id=$gu_id AND type=1"); //delete clanstation char banlist
        	   $RS->execute("DELETE FROM station_banlist_clan WHERE id=$gu_id AND type=1"); //delete clanstation clan banlist
        	} else {
        	   // mal bischen updaten die ganze Sache
        	   if ( isset($new_leader) ) {
        	      $RS->execute("UPDATE tblguilds SET gu_master=".$new_leader.",gu_members=".$RS->value("anzahl")." WHERE gu_id=".$gu_id);
        	   }

        	   if ( isset($new_st_admin) ) {
        	      $RS->execute("UPDATE tblguilds SET gu_st_admin=".$new_st_admin.",gu_members=".$RS->value("anzahl")." WHERE gu_id=".$gu_id);
        	   }
        	   if ( isset($new_co_leader) ) {
        	      $RS->execute("UPDATE tblguilds SET gu_co_master=".$new_co_leader.",gu_members=".$RS->value("anzahl")." WHERE gu_id=".$gu_id);
        	   }
        	   // war nicht der master, st_admin oder co leader, dann ein ganz normaler Member, also nur Anzahl updaten
        	   if ( !isset($new_co_leader) && !isset($new_st_admin) && !isset($new_co_leader) ) {
        	      $RS->execute("UPDATE tblguilds SET gu_members=".$RS->value("anzahl")." WHERE gu_id=".$gu_id);
        	   }
        	}
      }

      return true;
   }
   // -----------------------------------------------------------------------------------------------------------

/**
 * Funktion is_destructible
 * Gibt den Dateinamen der Schiffsgrafik zu einem Schiffstyp $shiptype zurück
 *
 * @param $RS \db_query - Recordset mit Spielerdaten (Objekt) *
 * @return Array mit Inhalt "yes" = true oder false, "redkillsleft" mit verbleibenden roten Kills
 * "bluekillsleft" mit verbleibenden blauen Kills, "levelsleft" mit verbleibenden Levels (jeweils bis man zerstörbar ist)
 */
   function is_destructible(\gt\User $user)
   {
      $redkills=$user->getProperty("pl_kills_e");
      $bluekills=$user->getProperty("pl_kills_g");
      $nukes=$user->getProperty("nuke_count")*10000; // * 10000 für Nukecount = zerstörbar ...0.01 counts * 10000 => +100 Lvls
      $level=$user->getProperty("pl_lvl");
      // Kopfgeld grösser gleich 100.000,00 Credits, dann zerstörbar
      if ( $user->getProperty("pl_bounty") >= 10000000 )
      $bounty = 100;
      else
      $bounty = 0;
      $return=array();
      $level_eff=$level+($bluekills/1000)+($redkills/500)+$nukes+$bounty;
      if ($level_eff >= 20) {
         $return["yes"]=true;
         $return["redkillsleft"]=0;
         $return["bluekillsleft"]=0;
      } else {
         $return["yes"]=false;
         $return["redkillsleft"]=(20 - $level_eff) * 5;
         $return["bluekillsleft"]=(20 - $level_eff) * 10;
      };
      return $return;
   };

   // -----------------------------------------------------------------------------------------------------------

   // Realtime zu Unixtime umrechnen
   function time_to_unixtime ($timestamp)
   {
      $year=substr($timestamp,0,4);
      $month=substr($timestamp,4,2);
      $day=substr($timestamp,6,2);
      $hour=substr($timestamp,8,2);
      $minute=substr($timestamp,10,2);
      $unixtime=mktime($hour,$minute,00,$month,$day,$year);

      return $unixtime;
   };

   // -----------------------------------------------------------------------------------------------------------

   $clan_wars=array();

   function is_clan_opponent($gu_id, $ot_gu_id,$clan_cache=false)
   {
      global $clan_wars;

      $return=false;
      //check if both opponents are in a clan
      if (($ot_gu_id != 0)&&($gu_id !=0))
      {
         //yes they ara

         //check if we should use alliance-cache (saves a lot of queries in cockpit)
         if ($clan_cache)
         {
            //yes, lets see if cache is already filled
            if (empty($clan_wars))
            {
               //not so good, we have to fill the array
               array_push($clan_wars,0);//add dummy entry to save us from trying to fill cache again in the future
               $RS = new db_query;
               $RS->execute("SELECT * FROM tblclanwar WHERE ((gu_id=$gu_id) OR (ot_gu_id=$gu_id)) AND ((status=2) OR (status=3))");
               while ($RS->next())
               {
                  if ($RS->value("gu_id")==$gu_id)
                  {
                     array_push($clan_wars,$RS->value("ot_gu_id"));
                  }
                  else
                  {
                     array_push($clan_wars,$RS->value("gu_id"));
                  }
               }
            }
            if (in_array($ot_gu_id,$clan_wars))
            {
               $return=true;
            }
         }
         else
         {
            $RS = new db_query;


            $RS->execute("SELECT * FROM tblclanwar WHERE ((gu_id=$gu_id AND ot_gu_id=$ot_gu_id) OR (gu_id=$ot_gu_id AND ot_gu_id=$gu_id)) AND ((status=2) OR (status=3))");
            if($RS->next())
            {
               $return=true;
            }
         }
      }

      return $return;
   };

   // -----------------------------------------------------------------------------------------------------------

   $clan_alliances=array();

   function is_clan_alliance($gu_id, $ot_gu_id, $clan_cache=false)
   {
      global $clan_alliances;

      $return=false;

      //check if both opponents are in a clan
      if ($ot_gu_id != 0)
      {
         //yes they ara

         //check if we should use alliance-cache (saves a lot of queries in cockpit)
         if (($clan_cache)&&(0==1))
         {
            //yes, lets see if cache is already filled
            if (empty($clan_alliances))
            {
               //not so good, we have to fill the array
               array_push($clan_alliances,$gu_id);//add dummy entry to save us from trying to fill cache again in the future
               $RS = new db_query;
               $RS->execute("SELECT * FROM clan_alliance WHERE (gu_id=$gu_id) OR (ot_gu_id=$gu_id) AND status=1");
               while ($RS->next())
               {
                  if ($RS->value("gu_id")==$gu_id)
                  {
                     array_push($clan_alliances,$RS->value("ot_gu_id"));
                  }
                  else
                  {
                     array_push($clan_alliances,$RS->value("gu_id"));
                  }
               }
            }
            if (in_array($ot_gu_id,$clan_alliances))
            {
               $return=true;
            }
         }
         else
         {
            //don't use cache, thats better if we have only few calls per script
            $RS = new db_query;
             
            $RS->execute("SELECT * FROM clan_alliance WHERE ((gu_id=$gu_id AND ot_gu_id=$ot_gu_id) OR (gu_id=$ot_gu_id AND ot_gu_id=$gu_id)) AND status=1");
            if($RS->next())
            {
               $return=true;
            }
            	
         }
      }
      return $return;
   };

   // -----------------------------------------------------------------------------------------------------------


   function FilterCode($message)
   {
      #--------------------------------------------------------------------
      # JAVA-Script filtern (übernommen aus der alten version der Datei)
      #--------------------------------------------------------------------
      $message = preg_replace("'<script[^>]*?>.*?</script>'si", "", $message);

      #--------------------------------------------------------------------
      # Hier werden die zu filternden Worte festgelegt - Syntax: Wort1|Wort2
      # Alles kleinschreiben!
      #-------------------------------------------------------------------- later: <style>|</style>|
      $filter = ".phtml|.php|script|javascript|iframe|object|embed|applet|onload|onunload|body|head|title|<div>|</div>|div |div\"|div=|\/div|base|meta|link rel|position:|position :|display:|display :";
      $filter = explode("|", $filter);

      #-----------------------------------------------
      # Alle Elemnte die gefiltert werden durchgehen...
      #-----------------------------------------------
      for($i = 0; $i < count($filter); $i++) {
         #----------------------------------------------------------------------------------------
         # und dabei (egal ob gross oder klein geschrieben) die "bösen" Commandos herrausfiltern...
         #----------------------------------------------------------------------------------------
         $message = preg_replace("|".$filter[$i]."|i","",$message);
      }

      return $message;
   }

   // -----------------------------------------------------------------------------------------------------------

   /**
    * @param $RS \db_query
    * @return float - value of the ship if sold
    */
   function payback($RS) {
      // $RS=new db_query;
      // $RS->execute("SELECT * FROM tbluser where id=$id");
      // $RS->next();
      $payback=(	$RS->value("sh_act_cargo")/50+
      $RS->value("sh_act_shield")/10+
      $RS->value("sh_act_weap")/5+
      $RS->value("sh_act_speed")/2+
      $RS->value("sh_act_get1")+
      $RS->value("sh_act_get2")+
      $RS->value("sh_act_get3")+
      $RS->value("sh_act_get4")+
      $RS->value("sh_act_get5")+
      $RS->value("sh_act_get6")+
      $RS->value("sh_act_get7")+
      $RS->value("sh_act_get8"))*
      $RS->value("sh_health")*100;
      return($payback);
   };


   // -----------------------------------------------------------------------------------------------------------


   function check_name($name_type, $name, $id=0) {
      // ACHTUNG: Funktion ist noch NICHT fertig !!

      // Diese Funktion soll Durchnummerierungen von Charnamen und nicht zulässige Namen erkennen

      // $name	= zu Überprüfender Char- / Schiffs- / Nickname
      // $name_type	= gibt an welche Art Name überprüft werden soll (Char- / Schiffs- / Nickname)
      // $id 		= id (in Abhängigkeit zu $name_type kann hier die Charakter-ID oder die Account-ID angegeben werden)

      // Die Account-ID sollte bei allen Namensprüfungen ja bereits bestehen
      global $acc_id;
      global $lang_out;

      $testserver = false;
      if (defined("TESTSYS")&&(TESTSYS==true)) {
         $testserver=true;
      }

      if(($name_type=='Charname')||($name_type=='Nickname')) {
         //ein paar ueberpruefungen
         //ausgangspunkt htmlspecialchared, getrimmt ..
         if ($testserver) { echo "<br>spezialcharCheck";}
         $test = preg_replace('|([^a-zA-Z0-9_&;\s\[\]\-\.\/äöü]+)|i',"",$name);
         if($name != $test) {
            ?>
			<script type="text/javascript">
				alert("<?php echo $lang_out["include.php"]["unwanted_specialchars"] ?>");
				history.back();
			</script>
            <?php
            die();
         }
          
         if(!strcmp(substr($name,-3),"(*)")) {
            ?>
			<script type="text/javascript">
				alert("<?php echo $lang_out["include.php"]["unwanted_name_ending"] ?>");
				history.back();
			</script>
            <?php
         }
          
      }

      $RScheck=new db_query;

      // extrahieren der alphanumerischen Teile des Namens
      $alphaname=preg_replace("|^[A-Za-z]|", "", $name);
      if ($testserver) { echo "<br>alphaname  =".$alphaname; }

      // Prüfung auf Durchnummerierung
      // (nur Char und Schiffsnamen)
      // || $name_type=='Shipname') exclude shipname from these tests .. we allow multiple ships with the same name
      if ($name_type=='Charname') {
         if ($name_type=='Charname') {
            $rsvalue="pl_name";
         } else {
            $rsvalue="sh_name";
         }

         // extrahieren der Leerzeichen
         $spacenamecheck= str_replace(" ", "", $alphaname);
         if ($testserver) { echo "<br>spacenamecheck=".$spacenamecheck; }

         // extrahieren ggf. vorhandener römischer Nummerierungen
         $romnamecheck=str_replace(" I", " ", $name);

         // wurde nun aber 'Willi' und Willi 'III' gleich eingegeben werden die restlichen ' I' nun auch entfernt
         while ($romnamecheck != ($romnamecheck=preg_replace("| I|i", " ", $romnamecheck))) {
            // nix tun, die While-Schleifenbedingung macht bereits genug :-)
         }

         // nun noch die Leerzeichen entfernen
         $romnamecheck=str_replace(" ", "", $romnamecheck);
         if ($testserver) { echo "<br>romnamecheck=".$romnamecheck; }

         // eine Nummerierung in der Form 'Willi' und 'Willi V' würde nun aber nicht gefunden


         $RScheck->execute("SELECT pl_name, sh_name FROM tbluser WHERE acc_id=".$_COOKIE["acc_id"]);

         $check=true;

         //Prüfungsläufe beginnen
         while (($RScheck->next()) && ($check)) {
            if ($testserver) { echo "<br><br>Schleifendurchflug"; }
            $alphadbname=preg_replace("|^[A-Za-z]|", "", $RScheck->value($rsvalue));
            if ($testserver) { echo "<br>alphadbname=".$alphadbname; }

            	
            // vielleicht gibbet den Namen schon im Account
            if (strtolower($name) == strtolower($RScheck->value($rsvalue))) {
               if (($name_type=='Charname') || ($name_type=='Nickname')) {
                  // nicht weiter machen, die DB lehnt diesen Fall eh ab
                  $check=false;
               } else {
                  // bei Schiffsnamen machen wir doch wahrscheinlich nichts?
               }
            }
            	
            // Durchnummerierung der Namen per numerische- und Sonderzeichen
            if ((strtolower($alphaname) == strtolower($alphadbname)) && ($check)) {
               // Nummerierung entdeckt
               if ($name_type=='Charname') {
                  ?>
				  <script type="text/javascript">
						alert("<?php echo $lang_out["include.php"]["numbered_names_alpha"]?>");
						history.back();
				  </script>
                  <?php
                  die();
               } else {
                  // watt nu ?
                  // $check=false;
               }
            }

            // Durchnummerierung durch Leerzeichen
            if ((strtolower($spacenamecheck) == strtolower(str_replace(" ", "", $alphadbname))) && ($check)) {
               // Nummerierung entdeckt
               if ($name_type=='Charname') {
                  ?>
				  <script type="text/javascript">
						alert("<?php echo $lang_out["include.php"]["numbered_names_spaces"]?>");
						history.back();
				  </script>
                  <?php
                  die();
               }
               else {
                  // watt nu ?
                  // $check=false;
               }

            }

            // Durchnummerierung durch römische Zeichen
            $tempname=preg_replace("| I|i", " ", $RScheck->value($rsvalue));
            while ($tempname != ($tempname=preg_replace("| I|i", " ", $tempname))) {
               // nix tun, die While-Schleifenbedingung macht bereits genug :-)
            }
            $tempname=str_replace(" ", "", $tempname);

            if (((strtolower($tempname) == strtolower($romnamecheck)) || ((strtolower($alphadbname) == strtolower($romnamecheck)))) && ($check)) {
               // Nummerierung entdeckt
               if ($name_type=='Charname') {
                  ?>
				  <script type="text/javascript">
						alert("<?php echo $lang_out["include.php"]["numbered_names_roman"]?>");
						history.back();
				  </script>
                  <?php
                  die();
               }
               else {
                  // watt nu ?
                  // $check=false;
               }
            }
            if ($testserver) { echo "<br>tempname=".$tempname; }

            // sonstige Durchnummerierungen
            // Prüfung auf Zeichengleichheit (z.B. "a-user" "b-user" usw.
            // ich habe nur noch keine Ahnung wie ich das angehen soll
         }
         // Ende Prüfung auf Nummerierung
      }

      // Prüfung auf "Bad-Words"
      // hier werden dann wohl alle Namenstypen gecheckt werden muessen
      // it was choosen to have more than 1 bad_word list ..
      $check = false;
      $log = "off";
      switch ($name_type) {
         case 'Shipname'  : $bad_field="ship_bad_level";
         $check=true;
         break;
         case 'Clanname'  : $bad_field="clan_bad_level";
         $check=true;
         break;
         case 'Clantag'   : $bad_field="clan_tag_bad_level";
         $check=true;
         break;
         case 'Broadcast' : $bad_field="bc_bad_level";
         $check=true;
         break;
         case 'Charname'  :
         default		 : $bad_field="bad_level";
         break;
      }


      // SELECT der ganz bösen Wörter, die NIE als Wort oder auch Wortbestandteil vorkommen dürfen
      if ($testserver) { echo "<br><br>Badword-check (Level 10)"; }

      $RScheck->execute("SELECT * FROM badword WHERE $bad_field > 9");
      while (($RScheck->next()) && ($check)) {
         if ($testserver) { echo "<br>Badword=".$RScheck->value("badword"); }
         	
         if (preg_match("|".$RScheck->value("badword")."|i", $name)) {
            // Bad-Word gefunden
            $replacing = array("%badword%" =>$RScheck->value("badword"),
		 		                   "%name_type%" => $name_type );
            ?>
			<script type="text/javascript">
        		alert ("<?php echo strtr($lang_out["include.php"]["badword_word_part"],$replacing);?>");
				history.back();
	        </script>
            <?php
            die();
         }
      }

      // SELECT der bösen Wörter, die NIE als alleinstehendes Wort vorkommen dürfen
      //	sind diese aberals Wortbestandteil enthalten wird es protokolliert
      if ($testserver) { echo "<br><br>Badwordcheck (Level 9)"; }

      $RScheck->execute("SELECT * FROM badword WHERE $bad_field = 9");
      while (($RScheck->next()) && ($check)) {
         if ($testserver) { echo "<br>Badword=".$RScheck->value("badword"); }
         	
         if(preg_match_all("/((.?)".$RScheck->value("badword")."(.?))/i",$name,$matches)!=0) {
            // Bad-Word gefunden
            // isses ein Wortbestandteil oder ein alleinstehendes Wort?
            foreach($matches[0] as $match) {
               if (("" == preg_replace("/".$RScheck->value("badword")."/i", "", trim($match)))) {
                  // Alleinstehendes "Bad" Wort
                  $replacing = array("%badword%" =>$RScheck->value("badword"),
		 		                                   "%name_type%" => $name_type );
                  ?>
				  <script type="text/javascript">
        				alert ("<?php echo strtr($lang_out["include.php"]["badword_word_single"],$replacing);?>");
						history.back();
	        	  </script>
                  <?php
                  die();
               } else {
                  // Wortbestandteil; Protokollierung einschalten
                  $log="on";
                  $check=false;
               }
            }
         }
      }

      // SELECT der "harmlosen" bösen Wörter
      if ($testserver) { echo "<br><br>Badwordcheck (< Level 9)"; }

      $RScheck->execute("SELECT * FROM badword WHERE $bad_field < 9 and $bad_field >4"); //only level 5-9 will be logged .. needed some (well 1) non-logging level
      while (($RScheck->next()) && ($check)) {
         if ($testserver) { echo "<br>Badword=".$RScheck->value("badword"); }
         	
         if (preg_match("/".$RScheck->value("badword")."/i", $name)) {
            // Bad-Word gefunden
            // Dokumentieren des gefundenen Eintrages mitsamt Linkerstellung zur Reaktion, falls Name "pfui"
            $log="on";
            $check=false;
         }
      }
       
      // Protokollierung der BAD-Word-Detection
      if ($log=="on") {
         $logmessage="<a href=\"/backoffice/close_name.php?action=";

         switch ($name_type) {
            case 'Charname':
               $logmessage="<font>Charname </font><a href=\"/backoffice/searchuser.php?search=".urlencode($name)."\">\'".$name."\'</a><font> sperren \(Bad-Word detected\)?</font>";
               $RScheck->execute("INSERT INTO badword_log (log_message, category, happened, char_id) VALUES ('$logmessage', '$name_type', sysdate(),'$name')");
               break;
               	
            case 'Shipname':
               $logmessage="<font>Shipname Schiff \'".$name."\'</font><a href=\"/backoffice/char_search_all.php?order=2&sort=id&search=".$name."\"> ansehen \</a>(Bad-Word detected\)?";
               if ($id!=0) {
                  $logname=$id;
               }
               else {
                  $logname=$name;
               }
               $RScheck->execute("INSERT INTO badword_log (log_message, category, happened, char_id) VALUES ('$logmessage', '$name_type', sysdate(),'$logname')");
               break;
               	
            case 'Nickname':
               $logmessage=$logmessage."close_nick&id=".$id."\">Nickname \'".$name."\' sperren \(Bad-Word detected\)?</a>";
               $RScheck->execute("INSERT INTO badword_log (log_message, category, happened, char_id) VALUES ('$logmessage', '$name_type', sysdate(),'$id')");
               break;
            case 'Clanname':
            case 'Clantag':
               //hmm yeah .. what can we do here? .. make a new script to edit these entries? sounds good .. maybee next time, now we send us a mail :-)
               mail("support@".MAILHOST,
				"Bad Word Detected",
				"Der Clan ".$id."hat sein ".$name_type." auf ".$name." geändert, was laut badword-liste nicht gern gesehen ist",
				"From: support@".MAILHOST."\nReply-To: support@".MAILHOST."\nX-Mailer: PHP/" . phpversion()
               );
               $RScheck->execute("INSERT INTO badword_log (log_message, category, happened, char_id) VALUES ('$logmessage', '$name_type', sysdate(),'$id')");
               break;
            case 'Broadcast':
               $logmessage="<font>Broadcast </font><a href=\"/backoffice/new.chardetails.php?id=".$id."\">Char ansehen</a> (Bad-Word detected)";
               $RScheck->execute("INSERT INTO badword_log (log_message, category, happened, char_id) VALUES ('$logmessage', '$name_type', sysdate(),'$id')");
               break;
         }


         $log="off";
      }

      // Prüfung auf zuviele Sonderzeichen
      // Besteht der Name zu 2/3 nur aus Sonderzeichen ?
      if ((strlen($name)) > (strlen($alphaname)*3)) {
         // zuviele Sonderzeichen im Namen
         // was tun?

         $logmessage="<a href=\"/backoffice/close_name.php?action=";
         if ($testserver) { echo "<br>zu viele Sonderzeichen entdeckt -> Protokollierung !!"; }
         switch ($name_type) {
            case 'Charname':
               $logmessage="<font>Charname </font><a href=\"/backoffice/searchuser.php?search=".urlencode($name)."\">\'".$name."\'</a><font> sperren \(Sonderzeichen\)?</font>";
               break;
               	
            case 'Shipname':
               $logmessage="<font>Shipname </font><a href=\"/backoffice/char_search_all.php?order=2&sort=id&search=".$name."\">Schiffsname \'".$name."\' sperren \(Bad-Word detected\)?</a>";
               break;
               	
            case 'Nickname':
               $logmessage=$logmessage."close_nick&id=".$id."\">Nickname \'".$name."\' sperren \(Sonderzeichen\)?</a>";
               break;
         }

         $RScheck->execute("INSERT INTO badword_log (log_message, category, happened,char_id) VALUES ('$logmessage', '$name_type Sonder', sysdate(),'$name')");
      }


   }

   // -----------------------------------------------------------------------------------------------------------

   function safe_url($querystring,$extra="",$set_cookie="")
   {
      /******************************************
       * this function builds a hash
       * from the query string to another
       * script, making it more difficult
       * to guess the right url
       *
       * $extra can be used to verify a
       * predifined referrer-like variable
       *****************************************/

      global $lang_out; //"hidden" part of url
      global $id;

      //first the string we want to build the hash from
      $to_test=$querystring.$lang_out["generic"]["safe"].$extra;
      $to_test_cookie = $set_cookie.$extra;
      //now the actual hashbuild process
      //we use only a substring of the md5
      $test_hash = md5($to_test);
      $test_hash_cookie = md5($to_test_cookie);
      $result=substr($test_hash,10,6);

      //sometimes we need to set a cookie
      //preventing the multiple parrallel use of scripts
      //that should not be used that way

      //!!! be careful what u set as $set_cookie ..
      //if you "safe" more than one link per page,
      //only the last call to safe_url "counts" ..!!!

      if ($set_cookie != "")
      {
         //rigth, we want to set a cookie

         $cookie_hash = substr($test_hash_cookie,3,8);
         setcookie("url_".$id."_id",$cookie_hash);
      }
      return $result;
   }

   // -----------------------------------------------------------------------------------------------------------

   function chk_safe_url($querystring,$sure,$extra="",$set_cookie="")
   {
      /***************************************
       * this function checks an url
       * if an hash added by safe_url is
       * correct
       *
       * you have to give exact the same
       * $extra to make it work
       **************************************/

      global $lang_out; //"hidden" part of url
      global $id;
      $url_id = $_COOKIE["url_".$id."_id"]; //should come from cookie

      //first the string the hash was build of
      //we have to remove the hash from the query string
      // as it was added after its calculation (a wonder)
      $to_test=(str_replace("&sure=".$sure,"",$querystring)).$lang_out["generic"]["safe"].$extra;
      $to_test_cookie = $set_cookie.$extra;

      //build the hash
      $test_hash = md5($to_test);
      $test_hash_cookie = md5($to_test_cookie);
      $result=substr($test_hash,10,6);
      //check it

      //maybe we had a cookie set?
      if ($set_cookie != "")
      {
         //yes we had to set one

         $cookie_hash = substr($test_hash_cookie,3,8);
         if (!strcmp($url_id,$cookie_hash))
         {
            //equal strings
            $cookie_ok=true;
         }
         else
         {
            //not equal
            $cookie_ok=false;
         }

         setcookie("url_".$id."_id",$set_cookie,time()-1); //write dummy value and delete it anyway
      }
      else
      {
         $cookie_ok=true; //cookie is true if we didn't have to check it
      }

      if (($result==$sure)&&($cookie_ok == true))
      return true;
      else
      {
         ?>
<script type="text/javascript">
		alert ("<?php echo $lang_out["include.php"]["invalid_link"] ?>");
		history.back();
		</script>
         <?php
         die();
      }
   }

   // -----------------------------------------------------------------------------------------------------------

   //gibt skillcap zu einem level zurück (datenbank kompatibel, also *100)
   function get_skillcap($pl_lvl)
   {
      global $gt_skillcap;

      if(is_array($gt_skillcap))
      {
         //nur wenns ein array is was mit machen
         $current_level = 100; //design flaw, max cap has to be < level 100
         $current_cap = 100000; //next flaw ..
         foreach($gt_skillcap as $level=>$cap)
         {
            if(($pl_lvl <= $level)&&($level < $current_level))
            {
               $current_level = $level;
               $current_cap = $cap;
            }
         }
         $current_cap *= 100;
         return $current_cap;
      }
      else
      {
         return (0);
      }
   }

   // return CSS Class Definition
   function get_sh_health_CSSClass($health) {
      $css = SHIPHEALTHGOODCLASS;

      if ( $health < 61 and $health >= 25 )
        $css = SHIPHEALTHWARNINGCLASS;
      if ( $health < 25 )
        $css = SHIPHEALTHDANGERCLASS;

      return $css;
   }

   /**
    * returns own character race attitude
    * @param $user - data object for char
    * @return string
    */
   function get_own_character_race_attitude(\gt\User $user) {
      $css_ships = NORMALCLASS;
      if ($user->getProperty("pl_kills_g") > 0) {
         $css_ships = HEADHUNTERCLASS;
      }

      if ($user->getProperty("pl_kills_e") > 0) {
         $css_ships = PIRATECLASS;
      }

      if ( ($user->getProperty("pl_kills_e") > 0) && ($user->getProperty("pl_kills_g") > 0) ) {
         $css_ships = MARAUDERCLASS;
      }

      return $css_ships;
   }

   /**
    * returns other character race attitude
    * @param $RSme \db_query
    * @param $RSother \db_query
    * @return string
    */
   function get_other_character_race_attitude($RSme,$RSother) {
      switch (true)
      {
         case ($RSother->value("pl_race")==9):
            $css_ships = ALIENCLASS;
            break;
         case (is_clan_opponent($RSme->value("pl_guild"),$RSother->value("pl_guild"),true) ):
            $css_ships = CLANWARCLASS;
            break;
         case (($RSother->value("pl_kills_g")>0)&&($RSother->value("pl_kills_e")<=0)):
            $css_ships = HEADHUNTERCLASS;
            break;
         case (($RSother->value("pl_kills_e")>0)&&($RSother->value("pl_kills_g")<=0)):
            $css_ships = PIRATECLASS;
            break;
         case (($RSother->value("pl_kills_g")>0)&&($RSother->value("pl_kills_e")>0)):
            $css_ships = MARAUDERCLASS;
            break;
         default:
            $css_ships = NORMALCLASS;
            break;
      }
      return $css_ships;
   }
   // -----------------------------------------------------------------------------------------------------------

   /**
    * erstellt aus Planetflags ein array mit capabilities
    */
   function get_planet_caps($flags)
   {
      $caps = array();

      if(($flags&1)==1){
         $caps["trading"] = true;
      }
      else{
         $caps["trading"] = false;
      }

      if(($flags&2)==2){
         $caps["quests"] = true;
      }
      else{
         $caps["quests"] = false;
      }

      if(($flags&4)==4){
         $caps["eventquests"] = true;
      }
      else{
         $caps["eventquests"] = false;
      }

      if(($flags&8)==8){
         $caps["repair"] = true;
      }
      else{
         $caps["repair"] = false;
      }

      if(($flags&16)==16){
         $caps["shop"] = true;
      }
      else{
         $caps["shop"] = false;
      }
      if(($flags&32)==32){
         $caps["startplanet"] = true;
      }
      else{
         $caps["startplanet"] = false;
      }
      if(($flags&64)==64){
         $caps["ptrpg"] = true;
      }
      else{
         $caps["ptrpg"] = false;
      }
      if(($flags&128)==128){
         $caps["secag"] = true;
      }
      else{
         $caps["secag"] = false;
      }

      return $caps;
   }
   // -----------------------------------------------------------------------------------------------------------
   // -----------------------------------------------------------------------------------------------------------
   // -----------------------------------------------------------------------------------------------------------

   /* prüft ob valider Hexcode oder HTML Farbe */
   function valid_color($color)
   {

      if ( preg_match ("/(^[#])(([0-9a-fA-F]{6})|([0-9a-fA-F]{3}))/",$color ,$outhex) )
      {
         return $outhex[0];
      }
      else
      {
         // Farbwerte von http://homepage.swissonline.ch/markus.ammann/farbtabelle.html
         $color_array = array(
    	"aliceblue" => "#F0F8FF", "antiquewhite" => "#FAEBD7", "aqua" => "#00FFFF", "aquamarine" => "#7FFFD4", "azure" => "#F0FFFF",
    	"beige" => "#F5F5DC", "bisque" => "#FFE4C4", "black" => "#000000", "blanchedalmond" => "#FFEBCD", "blue" => "#0000FF",
    	"blueviolet" => "#8A2BE2", "brown" => "#A52A2A", "burlywood" => "#DEB887", "cadetblue" => "#5F9EA0",
    	"chartreuse" => "#7FFF00", "chocolate" => "#D2691E", "coral" => "#FF7F50", "cornflowerblue" => "#6495ED",
    	"cornsilk" => "#FFF8DC", "crimson" => "#DC143C", "cyan" => "#00FFFF", "darkblue" => "#00008B",
    	"darkcyan" => "#008B8B", "darkgoldenrod" => "#B8860B", "darkgray" => "#A9A9A9", "darkgreen" => "#006400",
    	"darkkhaki" => "#BDB76B", "darkmagenta"=> "#8B008B", "darkolivegreen" => "#556B2F", "darkorange" => "#FF8C00",
    	"darkorchid" => "#9932CC", "darkred" => "#8B0000", "darksalmon" => "#E9967A", "darkseagreen" => "#8FBC8F",
    	"darkslateblue" => "#483D8B", "darkslategray" => "#2F4F4F", "darkturquoise" => "#00CED1", "darkviolet" => "#9400D3",
    	"deeppink" => "#FF1493", "deepskyblue" => "#00BFBF", "dimgray" => "#696969", "dodgerblue" => "#1E90FF", "firebrick" => "#B22222",
    	"floralwithe" => "#FFFAF0", "forestgreen" => "#228B22", "fuchsia" => "#FF00FF", "gainsboro" => "#DCDCDC", "ghostwhite" => "#F8F8FF",
    	"gold" => "#FFD700", "goldenrod" => "#DAA520", "gray" => "#808080", "green" => "#008000",
    	"greenyellow" => "#ADFF2F", "honeydew" => "#F0FFF0", "hotpink" => "#FF69B4", "indianred" => "#CD5C5C",
    	"indigo" => "#4B0082", "ivory" => "#FFFFF0", "khaki" => "#E0E68C", "lavender" => "#E6E6FA",
    	"lavenderblush" => "#FFF0F5", "lawngreen" => "#7CFC00", "lemonchiffon" => "#FFFACD", "lightblue" => "#ADD8E6",
    	"lightcoral" => "#F08080", "lightcyan" => "#E0FFFF", "lightgoldenrodyellow" => "#FAFAD2", "lightgreen" => "#90FF90",
    	"lightgrey" => "#D3D3D3", "lightpink" => "#FFB6C1", "lightsalmon" => "#FFA07A", "lightseagreen" => "#20B2AA",
    	"lightskyblue" => "#87CEFA", "lightslategray" => "#778899", "lightsteelblue" => "#B0C4DE", "lightyellow" => "#FFFFFE0",
    	"lime" => "#00FF00", "limegreen" => "#32CD32", "linen" => "#FAF0E6", "magenta" => "#FF00FF",
    	"maroon" => "#800000", "mediumaquamarine" => "#66CDAA", "mediumblue" => "#0000CD", "mediumorchid" => "#BA55D3",
    	"mediumpurple" => "#9370DB", "mediumseagreen" => "#3CB371", "mediumslateblue" => "#7B68EE", "mediumspringgreen" => "#00FA9A",
    	"mediumturquoise" => "#48D1CC", "mediumvioletred" => "#C71585", "midnightblue" => "#191970", "mintcream" => "#F5FFFA",
    	"mistyrose" => "#FFE4E1", "moccasin" => "#FFE4B5", "navajowhite" => "#FFDEAD", "navy" => "#000080",
    	"oldlace" => "#FDF5E6", "olive" => "#808000", "olivedrab" => "#6B8E23", "orange" => "#FFA500",
    	"orangered" => "#FF4500", "orchid" => "#DA70D6", "palegoldenrod" => "#EEE8AA", "palegreen" => "#98FB98",
    	"paleturquoise" => "#AFEEEE", "palevioletred" => "#DB7093", "papayawhip" => "#FFEFD5", "peachpuff" => "#FFDAB9",
    	"peru" => "#CD853F", "pink" => "#FFC0CB", "plum" => "#DDA0DD", "powderblue" => "#B0E0E6",
    	"purple" => "#800080", "red" => "#FF0000", "rosybrown" => "#BC8F8F", "royalblue" => "#4169E1",
    	"saddlebrown" => "#8B4513", "salmon" => "#FA8072", "sandybrown" => "#F4A460", "seagreen" => "#2E8B57",
    	"seashell" => "#FFF5EE", "sienna" => "#A0522D", "silver" => "#C0C0C0", "skyblue" => "#87CEEB",
    	"slateblue" => "#6A5ACD", "slategray" => "#708090", "snow" => "#FFFAFA", "springgreen" => "#00FF7F",
    	"steelblue" => "#4682B4", "tan" => "#D2B48C", "teal" => "#008080", "thistle" => "#D8BFD8",
    	"tomato" => "#FF6347", "turquoise" => "#40E0D0", "violet" => "#EE82EE"," wheat" => "#F5DEB3",
    	"white" => "#FFFFFF", "yellow" => "#FFFF00", "yellowgreem" => "#9ACD32"
    	);
    	$color = strtolower($color);
    	if ($color_array[$color])
    	return $color_array[$color];
      }
      return false;
   }

   // -----------------------------------------------------------------------------------------------------------
   // -----------------------------------------------------------------------------------------------------------
   // -----------------------------------------------------------------------------------------------------------



   /*==========================================*/
   // Gibt ein Layout aus und ersetzt vorher...
   function DrawLayout($layout_file, $replacearray, $prepareonly=0)
   {
      global $docroot;
      global $imgroot;
      global $gtgfx_path;

      switch($prepareonly)
      {
         case "2" : $layout = $layout_file;
            break;
         case "0" :
         case "1" :
         default  : $fn = @fopen($layout_file, "r");
         $layout = @fread($fn, @filesize($layout_file));
         break;
          
      }

      $replacearray["%docroot%"]=$docroot;
      $replacearray["%imgroot%"]=$gtgfx_path;

      foreach($replacearray as $key => $val) {
         $layout = str_replace($key, $val, $layout);
      }
      // hier suche wir nach den in den urls vorkommenden & und ersetzen sie durch &amp;
      // W3C mag das so und ich auch :))
      if ($rest=preg_replace("/([&])([a-zA-Z0-9_]*)([=])/i","&amp;$2$3",$layout)) {
         $layout=$rest;
      }

      $layout = preg_replace("=(<script[^>]*>)(.*)(</script>)=siUe",'stripslashes("\\1".str_replace("&amp;","&","\\2")."\\3")',$layout);

      switch($prepareonly) {
         case "1" :
         case "2" : return $layout;
         break;
         case "0" :
         default  : echo $layout;
         break;
      }
   }

   // Das selbe wie DrawLayout, nur das hier nicht direkt ausgegeben wird...
   function PrepareLayout($layout_file, $replacearray,$use_file=1)
   {
      //use_file = 1 -> $layout_file is path, =2 $layout_file is string with layout
      return DrawLayout($layout_file, $replacearray, $use_file);
   }
   //  Layout: Pfadvariablen
   //  Übergabe-Parameter: $RSme->value("go_graphpath"), falls nicht wird auf Grafikserver gesetzt.
   function ChangePath($path,$layout = "",$color = "")
   {
      global $dummy;

      if ($path == "" )
      $path="http://grafik.galactic-tales.eu/gtgfx/";


      if ($color != "")
      {
         $color = $color."_";
      }

      if($layout != "")
      {
         $layout = $layout."/";

         $dummy["%path_starback%"]=$path.$layout."backgrounds/".$color;
         $dummy["%path_general_elements%"]=$path.$layout."general/".$color;
        	$dummy["%path_cockpit_elements%"]=$path.$layout."cockpit/".$color;
        	$dummy["%path_ship_elements%"]=$path.$layout."ship/".$color;
        	$dummy["%path_station_elements%"]=$path.$layout."station/".$color;
        	$dummy["%path_menu_elements%"]=$path.$layout."menu/".$color;
        	$dummy["%path_buttons%"]=$path.$layout."buttons/".$color;
        	$dummy["%path_resources%"]=$path.$layout."res/".$color;
        	$dummy["%path_misc_elements%"]=$path.$layout."misc/".$color;
      }
      else
      {
         $dummy["%path_starback%"]=$path."backgrounds/".$color;
         $dummy["%path_general_elements%"]=$path."themes/general/".$color;
        	$dummy["%path_cockpit_elements%"]=$path."themes/cockpit/".$color;
        	$dummy["%path_ship_elements%"]=$path."themes/ship/".$color;
        	$dummy["%path_station_elements%"]=$path."themes/station/".$color;
        	$dummy["%path_menu_elements%"]=$path."themes/menu/".$color;
        	$dummy["%path_buttons%"]=$path."buttons/".$color;
        	$dummy["%path_resources%"]=$path."res/".$color;
        	$dummy["%path_misc_elements%"]=$path."misc/".$color;
      }

      //das themes is "scheisse" hier da stattdessen das layout da stehen müsste ..

      $dummy["%path_avt%"]=$path."avt/";
      $dummy["%path_small_avt%"]=$path."small_avt/";
   }
   /*==========================================*/
   $dummy["%path_logos%"]="../logos/";

   // $startzeit= microtime();
   // $zeiten=explode(" ",$startzeit);
   // $startzeit=$zeiten[1]+$zeiten[0];

   // --------------------------------

   //Encoding-Möglichkeiten des Browsers holen
   $encoding = $_SERVER["HTTP_ACCEPT_ENCODING"];

   // Falls gzip unterstützt wird, Output-Komprimierung einschalten.
   if ((preg_match("|gzip|i",$encoding))
      && (!preg_match("|event_battle|i",$_SERVER["REQUEST_URI"]))
      && (!preg_match("|battle_action|i",$_SERVER["REQUEST_URI"]))
      && (!isset($nozip))) {
      ob_start("ob_gzhandler");
   };

   // --------------------------------

   // Caching auch für IE 5.x ausschalten.
   // Entnommen aus http://www.koehntopp.de/php/faq-webserver.html#webserver-6
   // reorder according to http://www.faqts.com/knowledge_base/view.phtml/aid/14481/fid/3
   header("Cache-Control: post-check=0, pre-check=0");
   header("Pragma: no-cache");
   header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
   header("Last-Modified: ". gmdate("D, d M Y H:i:s") ." GMT");
   header("Cache-Control: no-cache, no-store, must-revalidate"); //added no-store, must-revalidate
   // header("Pragma: no-cache");
   // header("Cache-Control: post-check=0, pre-check=0");

   // --------------------------------

   // IP-Adresse merken
   // mt_srand((double)microtime()*1000000);
   // $ip=mt_rand(100,900);
   $ip=$_SERVER["REMOTE_ADDR"];

   // --------------------------------

   // Variablen für's Layout
   $body="<body bgcolor=black text=white link=gold vlink=gold background=\"http://grafik.galactic-tales.eu/gtgfx/backgrounds/starback.gif\">";
   $gtgfx_path="http://grafik.galactic-tales.eu/gtgfx/";
   $bg_path="http://grafik.galactic-tales.eu/gtgfx/backgrounds/";
   $ships_path="http://grafik.galactic-tales.eu/gtgfx/".SHIPDIR;
   $buttons_path="http://grafik.galactic-tales.eu/gtgfx/buttons/";
   $misc_path="http://grafik.galactic-tales.eu/gtgfx/misc/";
   $butt="";
   $maskbg="";
   $windowopen="
<table border=0 cellspacing=0 cellpadding=3 bordercolor=blue bordercolordark=darkblue>
	<tr>
		<td background=\"http://grafik.galactic-tales.eu/gtgfx/misc/maskbg.gif\">";
   $windowclose="
		</td>
		
	</tr>
</table>";


   // Array, welches die Beziehungen bei Kills zwischen Rot/Blau/Weiss/Rosa angibt
   $killwhich=array("e","e","g","g","e","e","g","g","e","e","g","e","e","e","g","g");

   
   // Variable für den HTML-Banner-Code
   // Neuer Bannertag von 4P

   // was gegen zu aggressiv cachende Browser
   $bannerid=uniqid("");

   // ein Banner extra für Foren
   $forumbanner="";

   // ein Banner für den Rest
   $phpbanner="";

   // hinweis das es sich um werbung handelt
   $werbehinweis="";

   // Pixelgrafik zum zugriffzählen (Neu 19.12.04 Fizz)
   $pixelgrafik="";

   // split aogf codes for everything and the legal/help stuff

$aogf_code = "55463180";
//SZM Tag (01.09.05)
switch($server)
{
   case "testgt" :
   case "dl"     : $szm_tag = "";
                  // eigenes AOGF Tag für Foren (spec 07.12.08)
                  $szm_tag_forum = "";
                  break;
   case "genesis" :
   default       : $szm_tag = "";
                  // eigenes AOGF Tag für Foren (spec 07.12.08)
                  $szm_tag_forum = "";
}



// wir bauen uns das Bannertag zusammen für die scripte
$banner=$phpbanner.$werbehinweis.$pixelgrafik.$szm_tag;

$forumbanner .= $szm_tag_forum;

//das tail brauchen wir noch wegen den html-tags, die grafik dürfen wir aber ans banner hängen
$tail='</body></html>';


function changebanner($yesno) {
	global $banner;
	global $pixelgrafik;
	global $szm_tag;
	global $happened_SQL_string;
	if ($yesno) {
		$banner='<table cellpadding="0" cellspacing="0" border="0">';
		$RShist = new db_query;
		$RShist->execute("SELECT ".str_replace("%datefield%","happened",$happened_SQL_string)." as Wann, news FROM tblnews ORDER BY happened DESC, news_id DESC LIMIT 4");
		while($RShist->next())
		{
			$banner.='<tr>
				<td style="white-space: nowrap;" class="banner">'.$RShist->value("Wann").'</td>';
			$banner.= '<td class="banner">'.str_replace("nach Forschungsstation", "zur Forschungsstation", stripslashes($RShist->value("news")) ).'</td>';
			$banner.= '</tr>';
			
		};
		$banner.= '</table>'.$pixelgrafik.$szm_tag;
	};
};

/**
 * Checks if given input is v4 or v6 (compressed and uncompressed) IP value
 *
 * @param $string given input
 * @return boolean
 */
function checkForIP($string) {
   // Regex by Daniel Adam
   // http://www.regxlib.com/REDetails.aspx?regexp_id=1139
   $pattern['ipv4'] = '/^((\d|[1-9]\d|2[0-4]\d|25[0-5]|1\d\d)(?:\.(\d|[1-9]\d|2[0-4]\d|25[0-5]|1\d\d)){3})$/';

   // Checks whether a given IPv6 address string could be valid based on
   // full and compressed IPv6 addresses as defined in RFC 2373 -
   // http://www.faqs.org/rfcs/rfc2373.html
   // Regex by Jeff Johnson
   // http://www.regxlib.com/REDetails.aspx?regexp_id=1000
   $pattern['ipv6'] = '/^((([0-9A-Fa-f]{1,4}:){7}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){6}:[0-9A-Fa-f]{1,4})'
                   .'|(([0-9A-Fa-f]{1,4}:){5}:([0-9A-Fa-f]{1,4}:)?[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){4}'
                   .':([0-9A-Fa-f]{1,4}:){0,2}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){3}:([0-9A-Fa-f]{1,4}:)'
                   .'{0,3}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){2}:([0-9A-Fa-f]{1,4}:){0,4}[0-9A-Fa-f]{1,4'
                   .'})|(([0-9A-Fa-f]{1,4}:){6}((\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b)\.){3}(\b((2'
                   .'5[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b))|(([0-9A-Fa-f]{1,4}:){0,5}:((\b((25[0-5])|(1'
                   .'\d{2})|(2[0-4]\d)|(\d{1,2}))\b)\.){3}(\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b))|'
                   .'(::([0-9A-Fa-f]{1,4}:){0,5}((\b((25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b)\.){3}(\b(('
                   .'25[0-5])|(1\d{2})|(2[0-4]\d)|(\d{1,2}))\b))|([0-9A-Fa-f]{1,4}::([0-9A-Fa-f]{1,4}:){0,5'
                   .'}[0-9A-Fa-f]{1,4})|(::([0-9A-Fa-f]{1,4}:){0,6}[0-9A-Fa-f]{1,4})|(([0-9A-Fa-f]{1,4}:){1,'
                   .'7}:))$/'; // this is a monster .. could be made more readable by splitting into repeated pattern parts

   $ipV4 = preg_match( $pattern['ipv4'], $string ) ? TRUE : FALSE;
   
   $ipV6 = preg_match( $pattern['ipv6'], $string ) ? TRUE : FALSE;
   
   return $ipV4 || $ipV6;
}

/**
 * @param $template \Template
 */
function loginDisabled($template) {

	// Login deaktivert
	if (defined('login_disabled') and login_disabled == true) {
		// Wartungsmeldung ausspielen und Script beenden
		$template->assign_vars(array(
			'document_title' => "Wartung"
		));

		$template->pparse('xhtmlhead');
		$template->pparse('maintenance');
		
		die();
	} else {
		return;
	}
	
}

/**
 * determine if this char has full or newbie rounds and how long those are.
 *
 * @param $RS \db_query - db result for this char
 * @param $unit - unit of round duration - "minutes"[default] or "seconds"
 */
function getRoundDuration($RS, $unit = "minutes") {
   global $serverspeed;
   
   $duration = 0;
   if(
           (($RS->value("pl_lvl") < 10)&&
	   (($RS->value("rsh_id") < 5) &&($RS->value("rsh_origin") == 0))&&
	   ($RS->value("pl_kills_e") == 0) &&
	   ($RS->value("pl_kills_g") == 0) &&
	   ($RS->value("pl_kills_l") == 0))||($RS->value("pl_race") == 9)
	   )
	{
	   $duration = $serverspeed * 0.5; // newbie rounds, which is half of serverspeed
	} else {
	   $duration = $serverspeed;
	}
	
	if($unit == "seconds") {
	   $duration = $duration*60;
	}
	
	return $duration;
}
?>
