<?php

// Galactic Tales language file
// Note that this file is only for short messages.
// Long descriptions, such as found in index.php and the helpfiles,
// may be translated manualy

if(!defined("LANGUAGE")||(LANGUAGE==false)){
     define("LANGUAGE",true); //say we have been included
     
     //helper function .. 
     function get_language(&$lang_out, $groups,$lang_code="de"){                
             $RSlanguage = new db_query;
             $load_sql = "na";
             if($groups != ""){
                  //only load groups we dont already have .. 
                  $gr = explode(",",$groups);
                  $groups = "";
                  foreach($gr as $group){
                       if(!is_array($lang_out[$group])){
                               $groups .= ",'".$group."'";
                       }
                  }
                  $groups = trim($groups,",");
                  if($groups != ""){
                       $load_sql = " WHERE string_group IN (".$groups.") AND string_category='game' AND ";
                  }
             } else {
                  //load all game texts .. maybe this could be more dynamic too
                  $load_sql = " WHERE string_category='game'";
             }
             
             if($load_sql != "na"){
                  //only load if we have to ..
                  $RSlanguage->execute("SELECT string_group,string_name,".$lang_code."_text FROM tbllanguage".$load_sql);
                  if($RSlanguage->rowcount > 0) {
                     $retVal = true;
                     while($RSlanguage->next()){
                         $lang_out[$RSlanguage->value("string_group")][$RSlanguage->value("string_name")] = $RSlanguage->value($lang_code."_text");
                     }
                  }
             }
     }
     
     $lang_out = array();
     
     if (!defined("GAMEOPTIONS")) {
             //gameoptions includieren, da ich nicht in jedem file die serverweiche haben will
             require $_SERVER["DOCUMENT_ROOT"]."/gameoptions.php";
     }
     
     $lang_code = "de";
     
     if (isset($_COOKIE[$accpre."_lang"])) {
          switch (strtoupper($_COOKIE[$accpre."_lang"])) {
                  case "EN" : $lang_code = "en"; 
                              $lang_var = "en_lang_out";
                              break;
                  case "DE" : 
                  default   : $lang_code = "de";
                              $lang_var = "de_lang_out";
                              break;
          }
     }
     
     if(defined("TESTSYS")&&(TESTSYS==true)){
          //will be encapsulated into function .. 
          require $_SERVER["DOCUMENT_ROOT"]."/inc_db_query.php";
          
          if(isset($_GET["lang_insert"])){
               include "language_de.php";
               include "language_en.php";
               $RSlanguage = new db_query;
               $RSlanguage->execute('DELETE FROM tbllanguage where (string_category="game") or (string_category="") or (string_category is NULL)');
               $count = count($de_lang_out);
               foreach($de_lang_out as $k => $v){
                       $string_group = $RSlanguage->escape($k);
                       $sql = "";
                       if(is_array($v)){
                               //should always be, but you never know
                               foreach($v as $name => $value){
                                       $value_en = "";
                                       if(isset($en_lang_out[$string_group][$name])){
                                               $value_en = $en_lang_out[$string_group][$name];
                                       }
                                       $sql .= ',("'.$string_group.'","'.$RSlanguage->escape($name).'","game","'.$RSlanguage->escape($value).'","'.$RSlanguage->escape($value_en).'")';
                               }
                       }
                       $RSlanguage->execute('INSERT INTO tbllanguage (string_group,string_name,string_category,de_text,en_text) VALUES '.trim($sql,","));
                       echo $string_group."<br />";
               }
          }
          
          //remove if we have enough scripts that load on demand 
          //loads all strings we have .. 
          get_language($lang_out,"");
     } else {
          include "language_".$lang_code.".php";
          
          switch ($lang_code) {
               case "en" : $lang_out = &$en_lang_out;
                           break;
               case "de" : 
               default   : $lang_out = &$de_lang_out;
                           break;
          }
     }  
}
?>