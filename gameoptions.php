<?php
/*******************************************
 *
 *  basic variables
 *
 *  db host, user, pw
 *  basic game values (stationsprice, skillgain ..)
 *
 *  @TODO: transform into static class when switching to PHP5
 *******************************************/

//some constants
define("GT_DB","1");
define("BOARD_DB","2");
define("PORTAL_DB","3");
define("MARKETING_DB","4");
define("PAYMENT_DB","5");
define("GAMEOPTIONS",true); //say we have been included

// DB-Anmeldung
switch (strtolower($_SERVER["HTTP_HOST"]))
{
   case "divided-legends.4players.de":
   case "divided-legends.de":
   case "test.galactic-tales.de":
   case "test.divided-legends.webtales.de":
      /*
       $stationprice=27500000; 	// Stationsgrundpreis, Standard 250.000,00 ok
       $stationpriceplus=500000;	// Zusätzlicher Preis pro Station im Spiel, Grundwert 0 ok
       $stationpricepow=1.2;		// "Hoch"-Faktor zur Stationspreisberechnung
       */
      // lastminute request by shai:
      $stationprice=30000000; 	// Stationsgrundpreis, Standard 250.000,00 ok
      $stationpriceplus=0;	// Zusätzlicher Preis pro Station im Spiel, Grundwert 0 ok
      $stationpricepow=1;		// "Hoch"-Faktor zur Stationspreisberechnung
      $nicename="Divided Legends";
      $serverspeed=20;			// Rundengeschwindigkeit
      // Startausstattung für neue Chars
      $start_skillpoints=0;
      $start_level=1;
      $start_nextlevel=300;
      $start_money=50000;
      $happened_SQL_string = "date_format(date_add(%datefield%,INTERVAL 452 YEAR), '%d.%m.%Y %H:%i Uhr')";
      $accpre = "DL";			// Vor Account-ID
      $payduty = 0;			// Kostenpflicht NEIN
      $clanstation_price=1500000000;	//clanstation base price ..
      define("MAX_EVENTCHAR_ID",999);
      break;
   default:
      $stationprice=27500000; 	// Stationsgrundpreis, Standard 250.000,00 ok
      $stationpriceplus=1000000;	// Zusätzlicher Preis pro Station im Spiel, Grundwert 0 ok
      $stationpricepow=1.3;		// "Hoch"-Faktor zur Stationspreisberechnung
      $nicename="Galactic Tales";
      $serverspeed=30;			// Rundengeschwindigkeit
      // Startausstattung für neue Chars
      $start_skillpoints=0;
      $start_level=1;
      $start_nextlevel=300;
      $start_money=50000;
      $happened_SQL_string = "date_format(date_add(%datefield%,INTERVAL 362 YEAR), '%d.%m.%Y %H:%i Uhr')";
      $accpre = "GT";			// Vor Account-ID
      $payduty = 0;			// Kostenpflicht NEIN
      $clanstation_price=2000000000;	//clanstation base price ..
      define("MAX_EVENTCHAR_ID",99);
      break;
};



$maxrepairvalue=100000;		// Maximaler Reparaturpreis, Grundwert ? ok
$skillgainchance=10;		// Chance 1/(X+1) das Skill steigt bei Anwendung, Grundwert 5 ok
$skillpointsbase=5;		// Grundwert Skillpunkte bei Levelup, Grundwert 10 ok
$skillpointsrelative=200000;	// Zusätzlich: (Level / X) Skillpunkte bei Levelup, Grundwert 10 ok
$epgainfactor=10;		// Faktor zum EP-Gain, je höher je besser, Grundwert 10 ok
$st_upgrade_plusprice=1;	// Faktor zur Berechnung der Stationsupgrade-Preise
$station_rep_price=1000000;	//how much costs 1% ..
$id_ev1=71; //id vom Galactic News Center Char
$id_ev2=72; //id von A.Tomar

//wirkungsmatrix der stein/schere/papier - Waffen/Schild Upgrades
$srs_weapon_shield[0][0] = 0.7;
$srs_weapon_shield[0][1] = 1;
$srs_weapon_shield[0][2] = 1.3;
$srs_weapon_shield[1][0] = 1;
$srs_weapon_shield[1][1] = 1.3;
$srs_weapon_shield[1][2] = 0.7;
$srs_weapon_shield[2][0] = 1.3;
$srs_weapon_shield[2][1] = 0.7;
$srs_weapon_shield[2][2] = 1;
$srs_weapon_shield_normalize = 1.3;


// DB-Anmeldung

$DBhandle=array(); // this array holds all db links
$DBcharset=array();

switch (strtolower($_SERVER["HTTP_HOST"])) {
   default:
     	$server="genesis"; //verwende richtige DB
     	$layout_style = "gt_standard";
     	$layout_color = "01"; //blau grau, standard
     	define("SERVER_LAYOUT", "gt_standard");
     	define("SERVER_SKIN", "01");
     	//GT_DB game data
     	$DBservername[GT_DB]="localhost";
	$DBserverport[GT_DB]=3306;
     	$DBusername[GT_DB]="gtdbuser";
     	$DBpassword[GT_DB]="test";
     	$DBdatabase[GT_DB]=$server;

     	//BOARD_DB board data
     	$DBservername[BOARD_DB]="localhost";
     	$DBusername[BOARD_DB]="gtdbuser";
     	$DBpassword[BOARD_DB]="test";
     	$DBdatabase[BOARD_DB]=$server;

     	//PORTAL_DB portal data
     	$DBservername[PORTAL_DB]="tlocalhost";
     	$DBusername[PORTAL_DB]="gtdbuser";
     	$DBpassword[PORTAL_DB]="test";
     	$DBdatabase[PORTAL_DB]=$server;

     	// whether this is test or not
     	define("TESTSYS", true);
	define("DEVELOPMENT", false);
     	// läuft der Server bereits mit der neuen Kartensystematik
     	define("NEWMAP",false);

     	// wo sind die Schiffsbilder
     	define("SHIPDIR","ships/");

     	// stein/schere/papier Waffen/Schilde
     	define("SRS_UPGRADES",true);
     	break;
};


// Schrott, Erz, Gas, Solar, Mineral, Bio, Astral, Sauer,
// Ausweich, Schild, Angriff, Taktik, Reppen, Entern, Flucht
// Jagd, Raumschiffbau, Waffenkunde, Schildgen., Maschinenbau
// Verhandlung, Navi, Tarn, Sensorik

$gains=array(2,2,2,2,2,2,2,2,1,2,1,2,5,6,2,4,9,9,9,9,3,2,2,1);
$safe_loc_ids="1,3,11005,11008,10009,10001,1002,1007";


//array der skillcap grenzen
//ACHTUNG! für vergleich mit DB Werte mit 100 multiplizieren (macht die auswerte funktion)
$gt_skillcap[10] = 350;
$gt_skillcap[15] = 425;
$gt_skillcap[20] = 600;
$gt_skillcap[25] = 825;
$gt_skillcap[30] = 1000;

// Konstanten für Farbwerte
// jeder Konstante ist eine CSS Klasse zugeordnet die, die entsprechende Farbe darstellt
define("PIRATECLASS","pirate"); // Countfarbe, Darstellungsfarbe
define("HEADHUNTERCLASS","headhunter_dark"); // Countfarbe, Darstellungsfarbe
// define("HEADHUNTERCLASS","headhunter"); // Countfarbe, Darstellungsfarbe, old value
define("NORMALCLASS","normal"); // Countfarbe, Darstellungsfarbe
define("MARAUDERCLASS","marauder_dark"); // Countfarbe, Darstellungsfarbe
// define("MARAUDERCLASS","marauder"); // Countfarbe, Darstellungsfarbe, old value
define("CLANWARCLASS","clanwar"); // Countfarbe, Darstellungsfarbe
define("NUKECLASS","nuke"); // Countfarbe, Darstellungsfarbe
define("ALIENCLASS","alien"); // Countfarbe, Darstellungsfarbe
define("EVENTCLASS", "eventcount"); // Countfarbe, Darstellungsfarbe

define("ALLIANCECLASS","alliance"); // Farbe der underline
define("STATIONCLASS","stations"); // Clanstationschrift, Stationschrift

// ship health
define("SHIPHEALTHDANGERCLASS","shhd");
define("SHIPHEALTHWARNINGCLASS","shhw");
define("SHIPHEALTHGOODCLASS","shhg");

// Einträge GOs .. evtl später mal
// station
define("STATIONCONSTRUCTIONCLASS","stc"); // stationconstruction
define("STATIONATTACKCLASS","sta"); // stationattack
define("STATIONSELFDESTRUCTIONCLASS","stsd"); // stationselfdestrution
define("STATIONDESTRUCTIONCLASS","std"); // stationdestruction
// ship
define("SHIPLAUNCHCLASS","shl"); // shiplaunch
define("SHIPBOARDINGCLASS","shb"); // shipboarding
define("SHIPSELFDESTRUCTIONCLASS","shsd"); // shipselfdestruction
define("SHIPDESTRUCTIONCLASS","shd"); // shipdestruction
define("SHIPTOPRISONCLASS","shtp"); // shiptoprison
define("SHIPBRAINWASHINGCLASS","shbw"); // shipbrainwashing

define("MAILHOST","galactic-tales.eu"); // base server URL as we need to have a workaround .. 
// Login für GT und DL deaktivieren
// nur produktiv deaktiveren
if (TESTSYS == false) {
   define("login_disabled", false);
}
