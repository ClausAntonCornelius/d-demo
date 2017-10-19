<?php

// Galactic Tales language file
// Note that this file is only for short messages.
// Long descriptions, such as found in index.php and the helpfiles,
// may be translated manualy

$en_lang_out = array();

// Gerneric output
$en_lang_out["generic"]["currency"]="Credits";
$en_lang_out["generic"]["sbd_on_ship"]=" on ";
$en_lang_out["generic"]["new_entry"]="New Entry";
$en_lang_out["generic"]["start_search"]="(Press ENTER to start search)";
$en_lang_out["generic"]["type"]="Type";
$en_lang_out["generic"]["and"]="and";
$en_lang_out["generic"]["safe"]="dummy";
$en_lang_out["generic"]["back"]="back";

// --------------rootdir--------------------------------

// text from account.php
$en_lang_out["account.php"]["marked_for_deletion"]="Attention: Account will be deleted after 7 days with no login!";
$en_lang_out["account.php"]["accountoverview"]="Accountoverview";
$en_lang_out["account.php"]["board_nicks"]="News Board-Nicknames";
$en_lang_out["account.php"]["no_nicks_yet"]="Attention: obviously You have no news board Nickname.<br />\r\nWithout a Forennick you can't write or answer in the news board.<br />";
$en_lang_out["account.php"]["make_new_nick"]="create a new Nickname";
$en_lang_out["account.php"]["to_the_board"]="to the news boards";
$en_lang_out["account.php"]["xplain_accountfunctions"]="<b>A short explanation of the Accounting:</b><br />
        Characters und nicknames are linked to the account.<br />
		characters can be moved to an other account only <b>once</b>, 
		but only if there is an empty space for the character in the target account.<br />For this you need the ID of the target account. The ID is used at the trasfer.<br />
		Apart of this own characters can only be played by others if they completely log in with this account and let their own account rest therefor.<br />
		If an account isn't used for 90 days (no log in in this account) this account will be deleted with all news board nics automatically by the system. 
		<br />(information: characters that are not in use for 45 days automatically because of starvation!)
        ";
$en_lang_out["account.php"]["to_much_chars"]="There can be only 5 characters in a account!";
$en_lang_out["account.php"]["your_account_id_is"]="The ID of your account is: ";
$en_lang_out["account.php"]["always_mention_id"]=" (Please write allways the Account-ID in all questions)";
$en_lang_out["account.php"]["account_data"]="Account-Data:";
$en_lang_out["account.php"]["change_account_data"]="Change Accountdata";
$en_lang_out["account.php"]["chars"]="characters";
$en_lang_out["account.php"]["Level"]=", Level ";
$en_lang_out["account.php"]["sector"]="In sector: ";
$en_lang_out["account.php"]["release_is_not_delete"]="(release </a>is not delete)"; //part of release link
$en_lang_out["account.php"]["make_new_char"]="create a <b>new</b> character";
$en_lang_out["account.php"]["claim_char"]=" <b>Add</b> a character to this account:";
$en_lang_out["account.php"]["name"]="Name: "; //form label
$en_lang_out["account.php"]["password"]="Password:";
$en_lang_out["account.php"]["brute_force_mail_subject"]="Brute-Force Attack? acc_id: %acc_id% / acc_name: %acc_name%";
$en_lang_out["account.php"]["brute_force_mail_body"]="A wrong password is type in 100 times for this account.";
$en_lang_out["account.php"]["failure_title"]="Galactic Tales";
$en_lang_out["account.php"]["failure_xplain"]="<h2 align=center>Wrong login</h2>
        This is not a falid account. Please try it <a href=\"../portal/index.php\">again</a> or <a href=\"new_acc.php\">create
        a new Account</a>.";
$en_lang_out["account.php"]["char_move_pt1"]="character to an other account ";
$en_lang_out["account.php"]["char_move_pt2"]="move";
$en_lang_out["account.php"]["change_board_prefs"]="Game board settings";
$en_lang_out["account.php"]["hint_char_needed"] = "you need a character to play";
$en_lang_out["account.php"]["char_is_safe"] = "(hidden)";
$en_lang_out["account.php"]["devnews_head"] = "official DevTeam News :";
$en_lang_out["account.php"]["acc_options_link"] = "Accountpreferences";

//text from account options
$en_lang_out["account_options.php"]["e-mail"]="Emailaddress";
$en_lang_out["account_options.php"]["new_password"]="new password";
$en_lang_out["account_options.php"]["repeat_password"]="reenter password";
$en_lang_out["account_options.php"]["mark_for_deletion"]="Mark account for delete";
$en_lang_out["account_options.php"]["xplain_deletion_mark"]="Accounts marked for delete are deleted by the system <b>after 7 Days </b>they are not used! (No Login in the Account!)";
$en_lang_out["account_options.php"]["accept_changes"] = "accept";
$en_lang_out["account_options.php"]["choose_language"] = "language:";
$en_lang_out["account_options.php"]["german"] = "German";
$en_lang_out["account_options.php"]["english"] = "English";
$en_lang_out["account_options.php"]["lang_backto_account"] = "back to  accountoverview";
$en_lang_out["account_options.php"]["mail_for_all"] = "mailaddress for all characters:";
$en_lang_out["account_options.php"]["xplain_mail_for_all"] = "sets the account mailaddress for all characters belonging to the account";
$en_lang_out["account_options.php"]["gfxpath_for_all"] = "graphicspath for all characters:";
$en_lang_out["account_options.php"]["xplain_gfxpath_for_all"] = "sets input as graphicspath for all characters belonging to the account";

// text from account_update
$en_lang_out["account_update.php"]["different_passwords"]="The two passwords are not equal, are empty or the Emailaddress is missing!";
$en_lang_out["account_update.php"]["mail_change_mail_subject"]="Change the mailaddress of your Galactic-Tales Account.";
$en_lang_out["account_update.php"]["mail_change_mail_body"]="Hello!\n
The Email-address of the Account %acc_name% is changed to %acc_next_mail%.\n
is these change not wanted by the owner of these Email-Accounts,\n
please send a message to support@galactic-tales.eu .\n\n
if there is no reply to this Mail further mails will be send to this Email-address.\n
To accept the change please click on the link:\n
http://$HTTP_HOST/mail_change.php?action=account&id=%acc_id%&sure=%sure%\n
with kind regards,\n
your Galactic-Tales Team";
$en_lang_out["account_update.php"]["read_confirm_mail"]="To activate the new mailaddress, please follow the instructions in the confirmation-mail";

//board_prefs.php
$en_lang_out["board_prefs.php"]["headline"]="personal news board settings";
$en_lang_out["board_prefs.php"]["nicksort"]="search order of nicknames";
$en_lang_out["board_prefs.php"]["nicksort_lastuse"]="last use";
$en_lang_out["board_prefs.php"]["nicksort_age"]="age of Nickname";
$en_lang_out["board_prefs.php"]["nicksort_alpha"]="alphabetical";
$en_lang_out["board_prefs.php"]["threadsort"]="search order of the Threads";
$en_lang_out["board_prefs.php"]["threadsort_date"]="Creation date";
$en_lang_out["board_prefs.php"]["threadsort_lastdate"]="Datum of last entry";
$en_lang_out["board_prefs.php"]["showicons"]="show Icons";
$en_lang_out["board_prefs.php"]["showicons_all"]="Threadstate, subject smileys";
$en_lang_out["board_prefs.php"]["showicons_none"]="none, only Text";
$en_lang_out["board_prefs.php"]["post_bg_color"]="Backgroundcolor of the Postingtext";
$en_lang_out["board_prefs.php"]["thread_bg_color1"]="1. Backgroundcolor of the Thread";
$en_lang_out["board_prefs.php"]["thread_bg_color2"]="2. Backgroundcolor of the Thread";
$en_lang_out["board_prefs.php"]["thread_limit"]="Number of Threads per page";
$en_lang_out["board_prefs.php"]["quote_bg_color"]="Background color of quotation";
// several text from the functions in include.php

// first of all, Database Errors
$en_lang_out["include.php"]["mysql_connect_error"]="Error while connectin to mySQL";
$en_lang_out["include.php"]["mysql_debug_text"]="Operation in seconds";
$en_lang_out["include.php"]["mysql_error_sql"]="Error while sendind a SQL-statemend";
// next, security issues and validation checks
$en_lang_out["include.php"]["ip_error"]="Your IP-Adresse have changed. Please login again.";
$en_lang_out["include.php"]["no_mp_left"]="You have no more Moving points!";
$en_lang_out["include.php"]["ship_destroyed"]="Your ship has been destroyed, enjoy your last moments!";
$en_lang_out["include.php"]["del_ship_destroyed"]="Death Chars can't be destroyed again!";
$en_lang_out["include.php"]["disallowed_in_landing_arrea"]="You can't do this on teh Flightdeck!";
$en_lang_out["include.php"]["ship_out_of_sight"]="You can't find this ship";
$en_lang_out["include.php"]["cardinal_number"]="please type in only integers without \\\".\\\" and \\\",\\\" !";
$en_lang_out["include.php"]["no_cookie_set"]="Cookie (ID) not set... - Please login again!";
$en_lang_out["include.php"]["no_permission"]="you have no effectual permission!";
$en_lang_out["include.php"]["re_login"]="Please login again!";
$en_lang_out["include.php"]["not_in_account"]="this character is not in your account!";
$en_lang_out["include.php"]["invalid_link"]="This link is not valid anymore";
$en_lang_out["include.php"]["no_abo"]="This is available only with a valid Abo";
// Time formatting
$en_lang_out["include.php"]["days"]=" days ";
$en_lang_out["include.php"]["hours"]=" hours ";
$en_lang_out["include.php"]["day"]=" day ";
$en_lang_out["include.php"]["hour"]=" hour ";
$en_lang_out["include.php"]["minutes"]=" minutes";
$en_lang_out["include.php"]["immediately"]="immediately";
// misc
$en_lang_out["include.php"]["new_level"]="congratulation, you have gained a new level!";
$en_lang_out["include.php"]["skillnames"]=array("collect space-crap","ore reduction","gas reduction","solar reduction","mineral reduction","biology","thaumaturgic",
                        "oxygen reduction","dodge maneuver","shildmodulation","attack maneuver","attack tactics",
                        "repair","boarding maneuver","escape maneuver","hunting maneuver","spaceship construction","weapon construction",
                        "shield construction","engine construction","bargaining","navigation","camouflage maneuver","sensors");
$en_lang_out["include.php"]["ressource_name"]=array("spacecrap","iron ore","inert gas","solar energy","minerals","biomass","astral energy","oxygen");

// text from login.php
$en_lang_out["login.php"]["login_failure"]="Login failed";
$en_lang_out["login.php"]["no_permission"]="You have no permission!";
$en_lang_out["include.php"]["unwanted_specialchars"]="Your name contains unwanted specialchars";
$en_lang_out["include.php"]["unwanted_name_ending"]="Your name ends with an unwanted set of characters";
$en_lang_out["include.php"]["numbered_names_alpha"]="Serially numbered names are not wanted (alphabetical test)";
$en_lang_out["include.php"]["numbered_names_spaces"]="Serially numbered names are not wanted (spaces test)";
$en_lang_out["include.php"]["numbered_names_roman"]="Serially numbered names are not wanted (roman test)";
$en_lang_out["include.php"]["badword_word_part"]="%badword% is not wanted as part of the name (%name_type%)";
$en_lang_out["include.php"]["badword_word_single"]="%badword% is not wanted as name (%name_type%)";

// text from frame.php

$en_lang_out["frame.php"]["false_login"]="There is no one with these name or password in our universe. Please check your entries";
$en_lang_out["frame.php"]["character_confirmed"]="Your character is activated now, the DEV-Team wish you a lot of fun!";
$en_lang_out["frame.php"]["his"]="his";
$en_lang_out["frame.php"]["her"]="hers";
$en_lang_out["frame.php"]["on"]=" on  ";
$en_lang_out["frame.php"]["has_just"]=" has just now ";
$en_lang_out["frame.php"]["carrier_started"]=" start a career in space";
$en_lang_out["frame.php"]["destroyed_pre"]="Your ship, the ";
$en_lang_out["frame.php"]["destroyed_post"]=" was destroyed.  for your eyes your life takes place again briefly, then deep blackness fulfills your senses.";
$en_lang_out["frame.php"]["sh_critical_pre"]="WARNING! The condition of ";
$en_lang_out["frame.php"]["sh_critical_mid"]=" is only ";

// text from bug_post.php
$en_lang_out["bug_post.php"]["been_send"]="Your support request was send to the Galactic-Tales Team.";

// text from mail_change.php
$en_lang_out["mail_change.php"]["invalid_link"]="These link is not valid anymore";
$en_lang_out["mail_change.php"]["all_ok"]="The Mail was changed";

// Text from new_acc.php
$en_lang_out["new_acc.php"]["have_to_read_policy"]="You have to read and accept the terms of use in order to create an account.";
$en_lang_out["new_acc.php"]["account_creation"]="Account creation";
$en_lang_out["new_acc.php"]["account_name"]="Username:";
$en_lang_out["new_acc.php"]["account_password"]="Password:";
$en_lang_out["new_acc.php"]["account_password_retype"]="Confirm password:";
$en_lang_out["new_acc.php"]["account_email"]="E-Mail adress:";
$en_lang_out["new_acc.php"]["create_account"] ="Create account";

// text from new_acc_insert.php
$en_lang_out["new_acc_insert.php"]["failed_pw_check"]="You have entered two differend passwords, please check your entryi";
$en_lang_out["new_acc_insert.php"]["name_too_short"]="The name is to short (least 3 charakters), enter a longer name please";
$en_lang_out["new_acc_insert.php"]["pw_too_short"]="The password is to short (least 3 charakters), enter a longer password please";
$en_lang_out["new_acc_insert.php"]["mail_adress_too_short"]="The mailadress is not valid, enter a valid one please";
$en_lang_out["new_acc_insert.php"]["mail_adress_too_long"]="The mailadress is to long.";
$en_lang_out["new_acc_insert.php"]["mail_adress_malformed"]="You typed in a wrong password";
$en_lang_out["new_acc_insert.php"]["name_already_in_use"]="There is already a Player whith this name, please chose an other one";
$en_lang_out["new_acc_insert.php"]["acc_created"]="the account is created, you should receive a confimation mail in the next minutes";
$en_lang_out["new_acc_insert.php"]["not_activated_yet"]="This account is not activ!";


// text from nick_update.php
$en_lang_out["nick_update.php"]["changes_done"]="Changes are done!";
$en_lang_out["nick_update.php"]["no_permission"]="Access is not allowed";
$en_lang_out["nick_update.php"]["nick_already_in_use"]="There is allready a nick whith this name, choose an other one please!";
$en_lang_out["nick_update.php"]["nick_registered"]="Your nick is registered now!";

//--------- subdir /1

//text from menu.php
$en_lang_out["menu.php"]["get_button_graphic_start"]="Download the graphic ";
$en_lang_out["menu.php"]["get_button_graphic_end"]=" from Server please";
$en_lang_out["menu.php"]["cockpit"]="Cockpit";
$en_lang_out["menu.php"]["ship"]="Ship";
$en_lang_out["menu.php"]["station"]="Station";
$en_lang_out["menu.php"]["clanstation"]="Clanstation";
$en_lang_out["menu.php"]["navcomp"]="NavComp";
$en_lang_out["menu.php"]["character"]="character";
$en_lang_out["menu.php"]["options"]="Options";
$en_lang_out["menu.php"]["clans"]="Clans";
$en_lang_out["menu.php"]["forum"]="news board";
$en_lang_out["menu.php"]["messages"]="Messages";
$en_lang_out["menu.php"]["charts"]="Highscore";
$en_lang_out["menu.php"]["chat"]="Chat";
$en_lang_out["menu.php"]["help"]="Help";
$en_lang_out["menu.php"]["alert_buttons"]="Download the complete directory '%go_graphpath%buttons' and save it on you harddisk please";


//text from add_bounty.php
$en_lang_out["add_bounty.php"]["no_selfbounty"]="You don't realy want to set bounty on yourself?!?";
$en_lang_out["add_bounty.php"]["no_jailbounty"]="The dungeon masters don't like to see something like this!";
$en_lang_out["add_bounty.php"]["bad_people_only"]="bounty is only posible for pirates or marodeurs!";
$en_lang_out["add_bounty.php"]["its_dead_jim"]="Should a Ghostbuster chase him?";
$en_lang_out["add_bounty.php"]["only_after_attack"]="this pilot hasn't attac you in the last time!";

// text from bank.php
// all warnings etc. (javascript)
$en_lang_out["bank.php"]["not_in_landing_area"]="You have to be in the landingzone to have access to the bank";
$en_lang_out["bank.php"]["wait_for_bank_and_stock"]="There are less than 48 hours after your last bank and storage visit!!!";
$en_lang_out["bank.php"]["wait_for_bank_notyet_stock"]="There are less than 48 hours after your last bank- and storage visit, you can't go agian yet!";
// evrything else
$en_lang_out["bank.php"]["money_on_ship"]="Credits in your ship: ";
$en_lang_out["bank.php"]["money_in_bank"]="your actual balance at the bank is: ";
$en_lang_out["bank.php"]["pay_costs"]=" You can deposit money with the bank now, consider the following please:<br /></br>
                                                <b>you must pay 20% of the deposited amount <br/>as retain account carrying fees!</b><br /></br>";
$en_lang_out["bank.php"]["how_much_pay"]="As much would you like to deposit?<br />";
$en_lang_out["bank.php"]["cardinal_values_only"]=" (only integer amounts)<br />";
$en_lang_out["bank.php"]["pay_in"]=" deposit";
$en_lang_out["bank.php"]["draw_for_free"]="Of course you can take also money off from the bank and this even <b>for free</b>!.<br /></br>";
$en_lang_out["bank.php"]["how_much_draw"]="How much you would like to take off?<br />";
$en_lang_out["bank.php"]["draw"]=" take off";
$en_lang_out["bank.php"]["put_into_stock"]="<b>store Ship installations</b><br />";
$en_lang_out["bank.php"]["stock_space"]="Up-to-date you can store installations up to %amount%.";
$en_lang_out["bank.php"]["get_from_stock"]="<b>infer Ship installations</b>";
$en_lang_out["bank.php"]["delete"]="remove";

// text from bank_get_upgrade.php
$en_lang_out["bank_get_upgrade.php"]["not_in_landing_area"]="You have to be in the landingzone to have access to the bank";
$en_lang_out["bank_get_upgrade.php"]["wait_for_stock"]="There are less than 48 hours after your last bank and storage visit!!!";
$en_lang_out["bank_get_upgrade.php"]["no_space_on_ship"]="There is no free slot in your ship";

// text from bank_insert.php
$en_lang_out["bank_insert.php"]["not_in_landing_area"]="You have to be in the landingzone to have access to the bank";
$en_lang_out["bank_insert.php"]["wait_for_bank"]="There are less than 48 hours after your last bank and storage visit!!!";
$en_lang_out["bank_insert.php"]["cardinal_number"]="Type in only numbers whitout \\\".\\\" and \\\",\\\"please!";
$en_lang_out["bank_insert.php"]["no_negative"]="No negativ numbers please!";
$en_lang_out["bank_insert.php"]["half_only"]="You can't deposit more than the half of your credits!";
$en_lang_out["bank_insert.php"]["too_poor"]="You cannot take more off than you have on the account";

// text from bank_put_upgrade.php
$en_lang_out["bank_put_upgrade.php"]["not_in_landing_area"]="You have to be in the landingzone to have access to the bank";
$en_lang_out["bank_put_upgrade.php"]["wait_for_stock"]="There are less than 48 hours after your last bank and storage visit!!!";
$en_lang_out["bank_put_upgrade.php"]["maxitems_only"]="You can't have more than %maxitems% addons in teh store at the moment!"; 

// text from battle_object.php
$en_lang_out["battle_object.php"]["shuttle_no_battle"]="Shuttles can't attac!";
$en_lang_out["battle_object.php"]["selfattack"]="You can't attac yourself!!";
$en_lang_out["battle_object.php"]["sameclan"]="You can't attac someone of your own clan!";
$en_lang_out["battle_object.php"]["sameacc"]="You can't attac your own charaters";
$en_lang_out["battle_object.php"]["sameip"]="These Charakter is using the same IP-adress as you!";
$en_lang_out["battle_object.php"]["attack_not_allowed"]="You are not allowed to attac these Charakter!";
$en_lang_out["battle_object.php"]["the"]="The ";
$en_lang_out["battle_object.php"]["tries_to_flee"]="try to escape ...";
$en_lang_out["battle_object.php"]["but_the"]="... but the ";
$en_lang_out["battle_object.php"]["catches_up"]=" can catch it.";
$en_lang_out["battle_object.php"]["and_escapes"]="... and that escapes the ";
$en_lang_out["battle_object.php"]["fires_torps"]="fires the Photonentorpedos ...";
$en_lang_out["battle_object.php"]["miss"]="... and miss the ";
$en_lang_out["battle_object.php"]["evades"]="can dodge!";
$en_lang_out["battle_object.php"]["hits"]="... and hit the ";
$en_lang_out["battle_object.php"]["pentrating_shields"]=" weakens the shield of ";
$en_lang_out["battle_object.php"]["halfs_shields"]=" around half.";
$en_lang_out["battle_object.php"]["shield_units"]="shield units";
$en_lang_out["battle_object.php"]["real_damage"]=" make damage at the ";
$en_lang_out["battle_object.php"]["attacks"]=" starts to attac ...";
$en_lang_out["battle_object.php"]["fight_ends"]="The fight ends whith ";
$en_lang_out["battle_object.php"]["structure_damage"]=" Hull hits.";
$en_lang_out["battle_object.php"]["flet"]="The %E_SH_NAME% could escape!";
$en_lang_out["battle_object.php"]["attackerwon"]="You could board the %E_SH_NAME% and get %BEUTE% credits!";
$en_lang_out["battle_object.php"]["attackerlost"]="You can't enter the %E_SH_NAME%!";
$en_lang_out["battle_object.php"]["flet_message"]="The %T_SH_NAME% has tried to enter the %E_SH_NAME% in sector %LOC_NAME%, but you could escape with %SHIELD% shilds and %DAMAGE% (%REAL_DAMAGE%) damage. Resthull: %HEALTH% %%MASSATTACK%";
$en_lang_out["battle_object.php"]["attackerwon_message"]="The %T_SH_NAME% has entered the %E_SH_NAME% in sector %LOC_NAME%. You get %DAMAGE% (%REAL_DAMAGE%) damage, your resthull is %HEALTH% %%MASSATTACK%.<br>You have lost %BEUTE% Credits. ";
$en_lang_out["battle_object.php"]["attackerlost_message"]="The %T_SH_NAME% has tried to enter the %E_SH_NAME% in sector %LOC_NAME%, you could defend yourself with %SHIELD% shilds and %DAMAGE% (%REAL_DAMAGE%) Hull hits. resthull: %HEALTH% %%MASSATTACK%. ";
$en_lang_out["battle_object.php"]["message_bounty_add"]="You can set <a href=\"/1/bounty.php?id=%id%&ot_id=%ot_id%\">bounty</a>";
$en_lang_out["battle_object.php"]["auto_bounty"]="You increase bounty this rogue over ";
$en_lang_out["battle_object.php"]["flet_subject"]="<b><font color=green>Successful escape!</font></b>";
$en_lang_out["battle_object.php"]["attackerwon_subject"]="<b><font color=red>Unsuccessful defense!</font></b>";
$en_lang_out["battle_object.php"]["attackerlost_subject"]="<b><font color=green>Successful defense!</font></b>";
$en_lang_out["battle_object.php"]["get_bounty"]="In addition you keep a portion of the bounty, it is ";
$en_lang_out["battle_object.php"]["self_destruction"]="With this attac you destroy yourself!";
$en_lang_out["battle_object.php"]["enemy_destruction"]="You can jail the crew of the %E_SH_NAME%!";
$en_lang_out["battle_object.php"]["newsentry"]="The %T_SH_NAME% has entered the %E_SH_NAME%.";
$en_lang_out["battle_object.php"]["newsentry_human_vs_aliens"]="The %T_SH_NAME% has wounded a Welladji.";
$en_lang_out["battle_object.php"]["newsentry_aliens_vs_human"]="The %E_SH_NAME% has damage a Welladji.";
$en_lang_out["battle_object.php"]["newsentry_station"]="%T_PL_NAME% on the %T_SH_NAME% attacked %E_PL_NAME%´s %E_SH_NAME% successfully.";
$en_lang_out["battle_object.php"]["newsentry_clanstation"]="%T_PL_NAME% on the %T_SH_NAME% attacked %E_SH_NAME% successfully.";
$en_lang_out["battle_object.php"]["enemy_destruction_message"]="You were imprisoned taken with this attack!";
$en_lang_out["battle_object.php"]["self_destruction_message"]="Your aggressor destroyed himself with this fight";
$en_lang_out["battle_object.php"]["enemy_destruction_bounty"]="Due to the successful capture you receive the head money, it is ";
$en_lang_out["battle_object.php"]["self_destruction_newsentry_first"]=" on the ";
$en_lang_out["battle_object.php"]["self_destruction_newsentry_second"]=" just destroyed himself!";
$en_lang_out["battle_object.php"]["newsentry_station_destruct"]="%T_PL_NAME% on the %T_SH_NAME% has destroyed the %E_SH_NAME%!";
$en_lang_out["battle_object.php"]["newsentry_station_destruct_thealien"]="%T_PL_NAME% on the %T_SH_NAME% has destroyed the breeding place of the Welladji!";
$en_lang_out["battle_object.php"]["newsentry_station_destruct_alien"]="The %E_SH_NAME% has been destroyed by the Welladji!";
$en_lang_out["battle_object.php"]["enemy_destruction_station"]="YOU HAS DESTROYED THE %E_SH_NAME%!";
$en_lang_out["battle_object.php"]["enemy_destruction_message_station"]="YOUR STATION WAS DESTROYED WITH THIS ATTACK!";
$en_lang_out["battle_object.php"]["flet_message_alien"]="In sector %LOC_NAME% a Welladji has tryed to eat the %E_SH_NAME%n, but you can escape with %SHIELD% remaining shilds and %DAMAGE% (%REAL_DAMAGE%) Hull hits. Resthull: %HEALTH% %";
$en_lang_out["battle_object.php"]["attackerwon_message_alien"]="A Welladji has successfully attacked the %E_SH_NAME% im sector %LOC_NAME%. You get %DAMAGE% (%REAL_DAMAGE%) Hull hits, your Ship Hull Integrity is %HEALTH% %.<br />You lost a part of your crew.";
$en_lang_out["battle_object.php"]["attackerlost_message_alien"]="In sector %LOC_NAME% a Welladji has tried to attack the %E_SH_NAME%, but you can defend yourself with %SHIELD% remaining shilds and %DAMAGE% (%REAL_DAMAGE%) Hull hits. Hull Integrity is %HEALTH% %";
$en_lang_out["battle_object.php"]["invalid_battle"]="During the fight an error arose.";


// text from battleframe.php
$en_lang_out["battleframe.php"]["the_ship"]="The ship ";
$en_lang_out["battleframe.php"]["not_here_anymore"]=" is not any longer in this system!";
$en_lang_out["battleframe.php"]["this_ship"]="You can't attack the ship ";
$en_lang_out["battleframe.php"]["not_be_attacked"]="!";

// text from bounty.php
$en_lang_out["bounty.php"]["no_ally_bounty"]="You can't set a bounty on allies!";
$en_lang_out["bounty.php"]["how_much_bounty"]="For the destruction of this ship are<br /><b>%amount% Credits</b> exposed.<br /><br />";
$en_lang_out["bounty.php"]["raise_bounty"]="raise bounty:";

// text from build_station.php
$en_lang_out["build_station.php"]["already_have"]="You have allready a station!";
$en_lang_out["build_station.php"]["here"]="Build a station for "; //conflict german/english grammar Attention!!
$en_lang_out["build_station.php"]["build"]=" ?";

// text from buy_from_planet.php
$en_lang_out["buy_from_planet.php"]["something_wrong"]="attempt to defraud! (or something went wrong...)";
$en_lang_out["buy_from_planet.php"]["not_enough_exp"]="You are not yet experience enough (level) to fly this ship!";
$en_lang_out["buy_from_planet.php"]["amount_changed"]="The number of this article changed!";
$en_lang_out["buy_from_planet.php"]["name_your_ship"]="name your ship:";
$en_lang_out["buy_from_planet.php"]["buy"]="buy ";

// text from buy_good.php
$en_lang_out["buy_good.php"]["price_payed"]="Buy %amount% units of %raw materialname% for %fullprice% (%singleprice% per piece)!";

// text from char_delete.php
$en_lang_out["char_delete.php"]["went_away"]=" died</font>";
$en_lang_out["char_delete.php"]["char_deleted"]="<b>character deleted</b>";
$en_lang_out["char_delete.php"]["rip"]="...R.I.P...";

// text from char_delete_sure.php
$en_lang_out["char_delete_sure.php"]["attention"]="ATTENTION!";
$en_lang_out["char_delete_sure.php"]["delete_sure"]="You are in the process deleting your character irrevocable. He <b>can't</b> be revitalise. Are you sure?";
$en_lang_out["char_delete_sure.php"]["delete_sure_link"]="Yes, <b>delete</b> the character";

// text from charsheet.php
$en_lang_out["charsheet.php"]["name"]=" name: ";
$en_lang_out["charsheet.php"]["race"]=" race: ";
$en_lang_out["charsheet.php"]["money"]=" capital: ";
$en_lang_out["charsheet.php"]["bank_account"]=" Account at the bank: ";
$en_lang_out["charsheet.php"]["current_level"]=" your level: ";
$en_lang_out["charsheet.php"]["experience_points"]=" experience points: ";
$en_lang_out["charsheet.php"]["next_level_at"]=" next level at: ";
$en_lang_out["charsheet.php"]["pirate_counts"]=" captures: ";
$en_lang_out["charsheet.php"]["headhunter_counts"]=" captured pirates: ";
$en_lang_out["charsheet.php"]["clanwar_counts"]=" slayed enemies: ";
$en_lang_out["charsheet.php"]["nuke_counts"]=" destroyed ships: ";
$en_lang_out["charsheet.php"]["bounty"]=" bounty: ";
$en_lang_out["charsheet.php"]["skillpoints"]=" skillpoints: ";
$en_lang_out["charsheet.php"]["your_char_is"]="Your charakter is ";
$en_lang_out["charsheet.php"]["attackable"]="<b>vulnerable</b>";
$en_lang_out["charsheet.php"]["non_attackable"]="not vulnerable";
$en_lang_out["charsheet.php"]["destructible"]="<b>destructible</b>";
$en_lang_out["charsheet.php"]["non_destructible"]="not destructible<br />";
$en_lang_out["charsheet.php"]["become_destructible"]="<b>be destructible at: </b><br /><font color=red>%redamount% trader captures</font><br /><font color=lightskyblue>%blueamount% captured pirates<br /></font></font>";
$en_lang_out["charsheet.php"]["you_can_see"]="Your sensor skill allowes you to see <b>%amount% </b> ships";
$en_lang_out["charsheet.php"]["you_get_mp"]="Because of your navigation skill you can get <b>%amount% </b> movement points.";
$en_lang_out["charsheet.php"]["current_panic"]="Your panic: ";
$en_lang_out["charsheet.php"]["wait_for_bank"]="Remaining time up to the next possible bank attendance: ";
$en_lang_out["charsheet.php"]["wait_for_stock"]="Remaining time up to the next possible stock attendance: ";
$en_lang_out["charsheet.php"]["wait_for_station_repair"]="Remaining time up to the next possible station repair: ";
$en_lang_out["charsheet.php"]["wait_for_clan_station_repair"]="Remaining time up to the next possible clanstation repair: ";
$en_lang_out["charsheet.php"]["wait_for_clanaccount"]="Remaining time up to the next possible Deposit into the clan cash: ";
$en_lang_out["charsheet.php"]["remaining_jail_time"]="Remaining time in the dungeon: ";
$en_lang_out["charsheet.php"]["next_turn"]="Next&nbsp;round ";
$en_lang_out["charsheet.php"]["time"]=" Uhr";
$en_lang_out["charsheet.php"]["set_turn_time"]=" set on current time +30 minutes";
$en_lang_out["charsheet.php"]["change_turnsystematic"]=" change Round systematics";
$en_lang_out["charsheet.php"]["turnsystematic_variable"]="<b>(variable)</b>: ";
$en_lang_out["charsheet.php"]["turnsystematic_fix"]="<b>(fix)</b>: ";
$en_lang_out["charsheet.php"]["in_stock"]="Stored Upgrades:";
$en_lang_out["charsheet.php"]["currently_nothing"]="none";
$en_lang_out["charsheet.php"]["stationprice_factor"]="Station price multiplier: ";

// text from charts.php
$en_lang_out["charts.php"]["all_player_stats"]="player overview";
$en_lang_out["charts.php"]["fighter_stats"]="fighter";
$en_lang_out["charts.php"]["clan_stats"]="Clan statistics";
$en_lang_out["charts.php"]["clans"]="Clans";
$en_lang_out["charts.php"]["clan_wars"]="Clan Wars";

// text from clan_highscore.php
$en_lang_out["clan_highscore.php"]["best_clans"]="Largest clan:";

// text from cockpit.php
$en_lang_out["cockpit.php"]["no_such_waypoint"]="waypoint not found";
$en_lang_out["cockpit.php"]["environment_damage"]="Your ship gets %damage% points damage through %damage_type%!";
$en_lang_out["cockpit.php"]["planet_attack_warning"]="ATTENTION! You are under attack from planet %planet% if you continue flying. Continue?";
$en_lang_out["cockpit.php"]["cant_pay_landing"]="You cannot apply the landing duty!";
$en_lang_out["cockpit.php"]["quest_solved"]="You have solved your order and get %payment% credits as payment.";
$en_lang_out["cockpit.php"]["get_wormhole_pic"]="Download the file deadtun.gif from server please"; 
$en_lang_out["cockpit.php"]["get_landing_pic"]="Download the file landing.gif from server please";
$en_lang_out["cockpit.php"]["get_ship_graphic"]="Download the file %sh_graphic% from server please";
$en_lang_out["cockpit.php"]["hull"]=" Hull  ";
$en_lang_out["cockpit.php"]["mails"]=" mails";
$en_lang_out["cockpit.php"]["sys-mails"]=" Sys-mails";
$en_lang_out["cockpit.php"]["move_points"]=" MP ";
$en_lang_out["cockpit.php"]["special_quest_solved"]="%pl_name% on the %sh_name% has carried %amount% %what% to %loc_name%";
$en_lang_out["cockpit.php"]["cargo_status"]="hold: <b>%cargouse%</b> of <b>%sh_act_cargo%</b> unites";
$en_lang_out["cockpit.php"]["current_quest"]="carried <br />%amount% %what% to <a href=\"#\" onClick=\"javascript:window.open('/navsys/navigation.php?id=$id&start=%start_loc%&ziel=%ziel_loc%','Nav1','width=420,height=500,scrollbars=yes');\">%ziel_loc_link%</a>.";
$en_lang_out["cockpit.php"]["sector"]="sector:";
$en_lang_out["cockpit.php"]["system"]="System:";
$en_lang_out["cockpit.php"]["waypoint"]="Waypoint:";
$en_lang_out["cockpit.php"]["landing_fee"]="(charge 500cr)";
$en_lang_out["cockpit.php"]["bank_stock_link"]="bank/stock";
$en_lang_out["cockpit.php"]["distribute_sk_pts"]="<nobr>You have </nobr><br /><nobr>%sk_pts% Skillpoint(s)</nobr><br />to allot!";
$en_lang_out["cockpit.php"]["level"]="Level: ";
$en_lang_out["cockpit.php"]["next_level_in"]="Next Level<br />&nbsp;&nbsp;in: ";
$en_lang_out["cockpit.php"]["counts"]="Counts:";
$en_lang_out["cockpit.php"]["next_turn"]="Next&nbsp;Round:";
$en_lang_out["cockpit.php"]["bounty"]="bounty: ";
$en_lang_out["cockpit.php"]["build_here"]="Build a station here";
$en_lang_out["cockpit.php"]["build_clanstation_here"]="Build a clanstation here";
$en_lang_out["cockpit.php"]["under_attack"]="you were attacked";
$en_lang_out["cockpit.php"]["planet_damage"]="you get %damage% damage";
// Tutorial-Stuff
// 3rd Value: Activated 1/0
// 4th Value: Experience of player
$en_lang_out["cockpit.php"]["tutorial"][0][1]="<font color=\"red\" size=\"5\"><center>Welcome to Galactic Tales!</font><br />Click <a href=\"tut_activate.php?id=$id\">HERE</a> to get an introduction.</center>";

$en_lang_out["cockpit.php"]["tutorial"][1][1]="
This is the main action window of Galactic Talas, the <b>cockpit.</b> <br />
From here you can control the most actions of your character. The cockpit is fielded in single
blue highlighted windows.Left at the top, under the banner, you can see the basic information about your character:<br />
The <b>state</b> of your ship (currently 100%), the number of your <b>mails</b> (currently 0), dthe number of your <b>systemmails</b> (currently 1, these
are messages from the system itself), the current number of your MP (currently 10, MP means <b>movement points</b> and this is the babis of all of your
actions in GT. Actually you get <b>new MP every 15 minutes</b>, to perform new actions) as well as your current <b>account balance</b>,
500 credits.<br /><br />Left in this windows you can see information about the <b>sector</b>, you are located at the moment. There stands, in
which <b>system</b> this sector is (linked with the star map of the system) and the <b>waypoints</b>, that means the routes you can flyt.<br /><br />
Memorize the name of the sector and fly to the lowest waypoint<b>(no landing zone!)</b> to continue with the tutorial.";

$en_lang_out["cockpit.php"]["tutorial"][1][51]="
Good. Now you are in another sector, in unobstructed space. Please notice the ?Laufschrift? above in the navigation strip; It can be,
that you got <b>enviromental damage</b>. That means, that your ship lost hull integrity (<b>state</b>). But don't bother, by enviromental damage
your ship cannot be destroyed completely. That happens only by attacking. But if you are not at least level 5, you can neither attack nor be attacked.<br /><br />
You see, this action cost you some <b>moving points</b>. So you have 9 actions left until the next round. It depends to your starting time
when a new round will start. You can see this information, as well as the so far missing <b>experience points</b>, in the left bottom window. There is
a clock, too, that shows you the current time.<br /><br />
Now fly back to your starting planet to continue with the introdution.";



$en_lang_out["cockpit.php"]["tutorial"][1][101]="
Right on the top you can see the planet you are on at the moment. If you click on it you can buy an <b>exploitation machine</b>. An exploitation machine is a ship unit, every ship has limited space for installations, so called slots. Your current ship, a cargo shuttle , has
the option for 4 installations. Expect of exploitation machines there are installations that improve the speed of your ship (the maximum number of available
movment points), your hold or weapons and shields. With the extraction of raw materials you can earn your
first money.<br /><br />Click on the planet and buy on the left an exploitation machine. After that extract the raw material of your choice at the top left corner. (<font color=\"gold\">yellow</font> highlighted) and
sell on the planet again. Alternative to that you can take, if available, a <b>transport mission</b> on the planet, these you can find sporadically on the right bottom corner
in the planet view. For more informatuion and gamehelp click in the right top corner in the menue on <a href=\"/help/index.php?id=$id\">help</a>";


// text from digging.php
$en_lang_out["digging.php"]["no_such_device"]="You don't have this exploitation machine! (Cheater)";

$en_lang_out["digging.php"]["no_cargo_space"]="your hold is full!";
$en_lang_out["digging.php"]["null_dig"]="You weren't able to extract this %rohstoffname% - Extract units!";
$en_lang_out["digging.php"]["dig_result"]="%amount% units %rohstoffname% extracted";
$en_lang_out["digging.php"]["dig_cheat_sql"]="insert into logs (log_message, category, happened)values ('%name% auf %ship% mit ID $id has just now tried to extract raw materials without the according exploitation machine','Url-Hack', sysdate())";

// text from get_quest.php
$en_lang_out["get_quest.php"]["already_have_quest"]="You already have a transport mission.";
$en_lang_out["get_quest.php"]["racer_only"]="Only Space Racers are allowed to take this mission!";
$en_lang_out["get_quest.php"]["cannot_pay"]="You have not enough money to take this mission";
$en_lang_out["get_quest.php"]["not_enogh_cargospace"]="The necessary hold is missing to you";
$en_lang_out["get_quest.php"]["quest_accepted"]="You have accepted the mission to transport %amount% of %what%.";
$en_lang_out["get_quest.php"]["already_taken"]="This order was already assigned...";

// text from guild_charts.php
$en_lang_out["guild.charts.php"]["current_clanwars"]="current clanwars:";
$en_lang_out["guild_charts.php"]["versus"]="vs.";
$en_lang_out["guild_charts.php"]["back"]="back";

// text from guild_getmember.php
$en_lang_out["guild_getmember.php"]["wrong_password"]="You have entered a wrong password. Contact the clan leader to get the right one";
$en_lang_out["guild_getmember.php"]["not_enough_money"]="You have not enough money to pay the application fee!";

// text from guild_insert.php
$en_lang_out["guild_insert.php"]["not_enough_money"]="You have not enough money to found a clan";
$en_lang_out["guild_insert.php"]["guild_created"]="Clan founded. Please change the password immediatelyt.";

// text from guild_options.php
$en_lang_out["guild_options.php"]["pw_check_failed"]="The passwords don't match, please correct your entry";
$en_lang_out["guild_options.php"]["have_to_wait"]="You have to wait until you are able to give this position to someone else";
$en_lang_out["guild_options.php"]["shorty_check_failed"]="No clan day existing, please correct your entry";
$en_lang_out["guild_options.php"]["color_check_failed"]="No valid hex color code or no valid HTML color code.";

// text from guild_resign.php
$en_lang_out["guild_resign.php"]["cant_leave"]="You are not allowed to leave this clan voluntary";

// text from guilds.php
$en_lang_out["guilds.php"]["best_clans"]="The biggest clans:";
$en_lang_out["guilds.php"]["all_clans"]="All clans";
$en_lang_out["guilds.php"]["clanwars"]="clanwars";
$en_lang_out["guilds.php"]["clanname"]="clanname:";
$en_lang_out["guilds.php"]["clan_short_name"]="Clantag:";
$en_lang_out["guilds.php"]["clan_description"]="description:";
$en_lang_out["guilds.php"]["clan_password"]="clanpassword:";
$en_lang_out["guilds.php"]["clan_password_retype"]="(password again):";
$en_lang_out["guilds.php"]["clan_leader"]="clanleader:";
$en_lang_out["guilds.php"]["clan_homepage"]="clanhomepage:";
$en_lang_out["guilds.php"]["clan_color"]="clancolor:";
$en_lang_out["guilds.php"]["internal_text"]="internal text:";
$en_lang_out["guilds.php"]["text_preview"]="Text-Preview";
$en_lang_out["guilds.php"]["text_edit"]="edit internal text";
$en_lang_out["guilds.php"]["with_preview"]="Save and show Text-Preview.";
$en_lang_out["guilds.php"]["internal_link"]="internal link:";
$en_lang_out["guilds.php"]["save_changes"]="accept changes ";
$en_lang_out["guilds.php"]["delete_clan"]="delete clan ";
$en_lang_out["guilds.php"]["contact"]="[contact]";
$en_lang_out["guilds.php"]["dismiss"]="[dismiss]";
$en_lang_out["guilds.php"]["inaktive_members_explain"]="Members with a '+' were not active for more than a week.";
$en_lang_out["guilds.php"]["clanwar_admin"]="clanwar-administration";
$en_lang_out["guilds.php"]["clanalliance_admin"]="clan-alliance-administration";
$en_lang_out["guilds.php"]["internal_link_link"]="Claninterner Link";
$en_lang_out["guilds.php"]["homepage_link"]="Homepage";
$en_lang_out["guilds.php"]["other_members"]="members of your clan:";
$en_lang_out["guilds.php"]["resign_link"]="resign";
$en_lang_out["guilds.php"]["current_clanwars"]="actuell clanwars:";
$en_lang_out["guilds.php"]["current_alliances"]="current clanallies:";
$en_lang_out["guilds.php"]["nothing"]="none!<br />";
$en_lang_out["guilds.php"]["found_clan"]="Found a clan for ";
$en_lang_out["guilds.php"]["join_clan"]="Join a clan:";
$en_lang_out["guilds.php"]["join_password"]="password: ";
$en_lang_out["guilds.php"]["join_button"]=" join for %amount% credits";
$en_lang_out["guilds.php"]["money_in_bank"]="capital of your clan: ";
$en_lang_out["guilds.php"]["needed_for_station"]="Needed to build a clanstation: ";
$en_lang_out["guilds.php"]["no_bank_access"]="Next posible deposit to the clankasse erst in: %time%";
$en_lang_out["guilds.php"]["spend_money"]="Make a deposit (max. 50% of your capital):";
$en_lang_out["guilds.php"]["gu_st_admin"]="Clanstationadministrator";
$en_lang_out["guilds.php"]["private_money"]="your bar capital: ";

// text from guildwar.php
$en_lang_out["guildwar.php"]["war_declare_msg"]="My Clan %clanname%, [%clantag%], transmit your clan %ot_clanname%, [%ot_clantag%], an official declaration of war. They are requested to accept these in the clan war screen.";
$en_lang_out["guildwar.php"]["war_declaration"]="declaration of war";
$en_lang_out["guildwar.php"]["revoke_war_declaration"]="My clan %clanname%, [%clantag%], revoke the declaration of war gainst your clan %ot_clanname%, [%ot_clantag%].";
$en_lang_out["guildwar.php"]["war_declartaion_taken:back"]="take back the declaration of war";
$en_lang_out["guildwar.php"]["accept_war"]="My clan %clanname%, [%clantag%], accept the declaration of war from your clan %ot_clanname%, [%ot_clantag%].";
$en_lang_out["guildwar.php"]["war_accepted"]="Your declaration of war was accepted";
$en_lang_out["guildwar.php"]["offer_peace"]="My clan %clanname%, [%clantag%], offers, peace to your clan %clanname%, [%clantag%]. You are request to accept this offer in the clan war screen.";
$en_lang_out["guildwar.php"]["peace_offer"]="peace-offering";
$en_lang_out["guildwar.php"]["revoke_peace_offer"]="My clan %clanname%, [%clantag%], withdraws the peace offer to your clan %ot_clanname%, [%ot_clantag%]. The war will continue!";
$en_lang_out["guildwar.php"]["peace_offer_revoked"]="Peace offer was withdrawn";
$en_lang_out["guildwar.php"]["accept_peace"]="My clan %clanname%, [%clantag%], consents to the peace offer of your clan %ot_clanname%, [%ot_clantag%]. This peace may have long existence!";
$en_lang_out["guildwar.php"]["peace_accepted"]="Peace offer accepted";
$en_lang_out["guildwar.php"]["clanwars_of_clan"]="Clanwars of the clan ";
$en_lang_out["guildwar.php"]["declare_war_button"]=" transmit declaration of war";
$en_lang_out["guildwar.php"]["declared_wars"]="notedly declaration of waren to:";
$en_lang_out["guildwar.php"]["un_declare"]=" withdraws declaration(s) of war";
$en_lang_out["guildwar.php"]["incoming_war_declarations"]="received declaration of waren from:";
$en_lang_out["guildwar.php"]["accept_war_button"]=" accept declaration(s) of war";
$en_lang_out["guildwar.php"]["current_wars_with"]="In war with:";
$en_lang_out["guildwar.php"]["offer_peace_button"]=" submit peace-offering(s)";
$en_lang_out["guildwar.php"]["current_peace_offers_to"]="submited peace-offerings to:";
$en_lang_out["guildwar.php"]["revoke_peace_offer_button"]=" withdraw peace-offering(s)";
$en_lang_out["guildwar.php"]["incoming_peace_offers"]="received peace-offerings fron:";
$en_lang_out["guildwar.php"]["accept_peace_button"]=" accept peace-offering(s)";
$en_lang_out["guildwar.php"]["clanalliance_exists"]="With this clan up-to-date a alliance(offer) exists!";

//text from guildalliance.php
$en_lang_out["guildalliance.php"]["alliance_declare_msg"]="My clan %clanname%, [%clantag%], submit an official inquiry to your clan %ot_clanname%, [%ot_clantag%] for alliance. They are asked to accept these in the clan alliance screen.";
$en_lang_out["guildalliance.php"]["alliance_declaration"]="alliance declaration";
$en_lang_out["guildalliance.php"]["revoke_alliance_declaration"]="My clan %clanname%, [%clantag%], withdraws the offer for alliance with your clan %ot_clanname%, [%ot_clantag%].";
$en_lang_out["guildalliance.php"]["alliance_declartaion_taken:back"]=" alliance declaration withdrawen";
$en_lang_out["guildalliance.php"]["accept_alliance"]="My clan %clanname%, [%clantag%], accepts the offer for the alliance of your clan %ot_clanname%, [%ot_clantag%].";
$en_lang_out["guildalliance.php"]["alliance_accepted"]="Your alliance declaration was accepted";
$en_lang_out["guildalliance.php"]["revoke_alliance"]="My clan %clanname%, [%clantag%], quits the existing alliance with your clan %ot_clanname%, [%ot_clantag%] immediately!";
$en_lang_out["guildalliance.php"]["revoke_alliance_subject"]="alliance declaration ended";
$en_lang_out["guildalliance.php"]["declare_alliance_button"]=" offer of alliance declaration submited";
$en_lang_out["guildalliance.php"]["clanalliances_of_clan"]="alliances of the clans ";
$en_lang_out["guildalliance.php"]["offer_alliance"]="offer alliance:";
$en_lang_out["guildalliance.php"]["declared_alliances"]="notedly alliance declaration to:";
$en_lang_out["guildalliance.php"]["un_declare"]=" withdraw alliance declaration(s)";
$en_lang_out["guildalliance.php"]["incoming_alliance_declarations"]="received alliance offers from:";
$en_lang_out["guildalliance.php"]["accept_alliance_button"]=" accept alliance offer(s)";
$en_lang_out["guildalliance.php"]["current_alliance_with"]="existing alliances:";
$en_lang_out["guildalliance.php"]["revoke_alliance_button"]="end alliance(s)";
$en_lang_out["guildalliance.php"]["clanwar_exists"]="To this clan up-to-date a declaration of war exists !";

// text from if_sh_health_0.php
$en_lang_out["if_sh_health_0.php"]["no_more_decide"]="You are not (longer) allowed to decide about the fate of this ship!";
$en_lang_out["if_sh_health_0.php"]["level_too_low"]="Your enemy has a too low level for this option";
$en_lang_out["if_sh_health_0.php"]["enemy_destroyed"]="You have destroyed the ship!";
$en_lang_out["if_sh_health_0.php"]["enemy_plundered"]="You have imprisoned the crew of the ship into a shuttle and carried off %loot% credits!";
$en_lang_out["if_sh_health_0.php"]["enemy_all_minus5"]="All skills of the enemy were lowered by 5%t";
$en_lang_out["if_sh_health_0.php"]["please_choose"]="Please choose a skill!";
$en_lang_out["if_sh_health_0.php"]["enemy_one_minus50"]="The chosen skill was lowered by 50% through the brainwash!";
$en_lang_out["if_sh_health_0.php"]["enemy_into_jail"]="Your enemy was imprisoned for %days% days and %hours% hours!";
$en_lang_out["if_sh_health_0.php"]["destroy_mail_subject"]="GT-Info: Nuke -> %ot_name%s ship %ot_sh_name% was destroyed by  %me_name%!";
$en_lang_out["if_sh_health_0.php"]["destroy_mail_body"]="GT-Sender: System\nGT-Receiver: %ot_name% on the %ot_sh_name%\n\nInhalt: \n %me_name% on the %me_sh_name% has just now destroyed the ship %ot_sh_name% of  %ot_name%";
$en_lang_out["if_sh_health_0.php"]["destroy_go_msg"]="%me_name% on the %me_sh_name% has just now destroyed the ship %ot_sh_name% of  %ot_name% %wherenuke% %zusatz%";
$en_lang_out["if_sh_health_0.php"]["plundered_go_msg"]="%me_name% on the %me_sh_name% has just now completely looted %ot_name% on the %ot_sh_name% %wherenuke% ";
$en_lang_out["if_sh_health_0.php"]["plundered_login_msg"]="You have left 500 credite and you are imprisoned or 3 days!";
$en_lang_out["if_sh_health_0.php"]["plundered_ingame_msg_subject"]="You were looted!";
$en_lang_out["if_sh_health_0.php"]["plundered_ingame_msg_body"]="Your ship was destroyed, all credits stolen and you were imprisoned together with your crew for 3 days in the prison of %planet%!";
$en_lang_out["if_sh_health_0.php"]["all_minus5_go_msg"]="%me_name% on the %me_sh_name% has just now brainwashed %ot_name% on the %ot_sh_name% %wherenuke% ";
$en_lang_out["if_sh_health_0.php"]["all_minus5_login_msg"]="5% were lowered of your skills!";
$en_lang_out["if_sh_health_0.php"]["all_minus5_ingame_msg_subject"]="Brainwash!";
$en_lang_out["if_sh_health_0.php"]["all_minus5_ingame_msg_body"]="You were imprisoned and brainwashed! All your skills were lowered by 5%!";
$en_lang_out["if_sh_health_0.php"]["minus50_go_msg"]="%me_name% on the  %me_sh_name% has just now brainwashed %ot_name% on the %ot_sh_name% %wherenuke%";
$en_lang_out["if_sh_health_0.php"]["minus50_ingame_msg_subject"]="Brainwash!";
$en_lang_out["if_sh_health_0.php"]["minus50_ingame_msg_body"]="You were imprisoned and brainwashed! One of your skills was lowered by 50%";
$en_lang_out["if_sh_health_0.php"]["minus50_login_msg"]="50% o your skill lost!";
$en_lang_out["if_sh_health_0.php"]["jail_go_msg"]="%me_name% on the %me_sh_name% has just now imprisoned %ot_name% on the %ot_sh_name% %wherenuke%";
$en_lang_out["if_sh_health_0.php"]["jail_ingame_msg_subject"]="Imprisoned!";
$en_lang_out["if_sh_health_0.php"]["jail_ingame_msg_body"]="I imprisoned you for  %days% days and %hours% hours on the planet %planet% !";
$en_lang_out["if_sh_health_0.php"]["jail_login_msg"]="%time% round(s) left till release";
$en_lang_out["if_sh_health_0.php"]["you_have_imprisoned"]="You imprisoned %ot_name% on the %ot_sh_name% , what do you want to do with the character?";
$en_lang_out["if_sh_health_0.php"]["destroy_it"]="Destroy the character";
$en_lang_out["if_sh_health_0.php"]["plunder_it"]="Imprison the character in a shuttle for three days (you get 40% of his capital, he looses everything and will be exposed in an intact shuttle)";
$en_lang_out["if_sh_health_0.php"]["wash_it_minus5"]="Brainwash the character (All skills -5%)";
$en_lang_out["if_sh_health_0.php"]["wash_it_minus50"]="Brainwash the character targeted (Chosen skill -50%):";
$en_lang_out["if_sh_health_0.php"]["jail_it"]="Imprison the character for %days% days and %hours% hours (For this time he can't make moves)";
// for aliens:
$en_lang_out["if_sh_health_0.php"]["destroy_go_msg_human"]="Der Funkkontakt zu %ot_name% auf der %ot_sh_name% ist soeben abgebrochen";
$en_lang_out["if_sh_health_0.php"]["destroy_go_msg_alien"]="%me_name% on the  %me_sh_name% has weaken the Welladjibrood ";

// text from insert_station.php
$en_lang_out["insert_station.php"]["station_built"]="%name% has just now built the %st_name%.";
$en_lang_out["insert_station.php"]["clanstation_built"]="The clan %clan_name% [%clansign%] has just built its <b>clan station</b>.";
$en_lang_out["insert_station.php"]["no_gu_st_admin"]="You are not the clan station administrator";
$en_lang_out["insert_station.php"]["price_changed"]="The price changed, please try again";

// text from jump.php
$en_lang_out["jump.php"]["wormhole_damage"]="Your ship got on the journey through the worm hole %damage% damage";

// text from landing_repair.php
$en_lang_out["landing_repair.php"]["not_in_landing_area"]="You have to be in the landing zone to be able to repair";
$en_lang_out["landing_repair.php"]["cant_pay"]="You can't afford this repair";
$en_lang_out["landing_repair.php"]["too_bad"]="Your reputation is too small to repair here!";
$en_lang_out["landing_repair.php"]["illegal_access"]="Illegal accessf";
$en_lang_out["landing_repair.php"]["no_mp_left"]="You have no more movement points";
$en_lang_out["landing_repair.php"]["repaired"]="You were able to repair your ship on the state %sh_health% .";
$en_lang_out["landing_repair.php"]["upgrade_destroyed"]="One of your installations was destroyed!";

// text from name_station.php
$en_lang_out["name_station.php"]["name_your_station"]="Name your station:";
$en_lang_out["name_station.php"]["name_clanstation"]="Clan station %clan_sign%";
$en_lang_out["name_station.php"]["build_button"]="Build ";

// text from new1.php
$en_lang_out["new1.php"]["re_login"]="Please log in again";
$en_lang_out["new1.php"]["read_policy"]="The terms of use have to be read an accepted, to create a new character.";
$en_lang_out["new1.php"]["title"]="Galactic Tales - new character";
$en_lang_out["new1.php"]["layout_char"]="With the arrows you can choose the look of your chraracter.";

// Help for Skills
$en_lang_out["new1.php"]["skill_0"]="Select three starting skill right";
$en_lang_out["new1.php"]["skill_1"]="With this skill you can collect the raw material space-crap";
$en_lang_out["new1.php"]["skill_2"]="With this skill you can reduce the raw material ore";
$en_lang_out["new1.php"]["skill_3"]="With this skill you can reduce the raw material gas";
$en_lang_out["new1.php"]["skill_4"]="With this skill you can reduce the raw material Solar";
$en_lang_out["new1.php"]["skill_5"]="With this skill you can reduce the raw material Mineral";
$en_lang_out["new1.php"]["skill_6"]="With this skill you can reduce the raw material biology";
$en_lang_out["new1.php"]["skill_7"]="With this skill you can reduce the raw material thaumaturgic";
$en_lang_out["new1.php"]["skill_8"]="With this skill you can reduce the raw material oxygen";
$en_lang_out["new1.php"]["skill_9"]="This skill indicates, how well you can evade to a shot in the fight";
$en_lang_out["new1.php"]["skill_10"]="This skill indicates, how well you can modulate your shield. You get less damage to your shield if you have a high skill.";
$en_lang_out["new1.php"]["skill_11"]="This skill indicates, how well you can place a shot in the fight against your opponent";
$en_lang_out["new1.php"]["skill_12"]="This skill indicates, how much damage you do to the shields with one hit. You make more damage if you have a high skill";
$en_lang_out["new1.php"]["skill_13"]="This skill indicates, how well you can repair your ship at stations if it is damaged";
$en_lang_out["new1.php"]["skill_14"]="This skill indicates, how much money you can transfer with a boarding of a ship";
$en_lang_out["new1.php"]["skill_15"]="With this skill you try to escape from a fight instead of fight your opponent";
$en_lang_out["new1.php"]["skill_16"]="With this skill you prevent the escape of your opponent from the fight";
$en_lang_out["new1.php"]["skill_17"]="With this skill you can build spaceships and loading areas, if you have a station";
$en_lang_out["new1.php"]["skill_18"]="With this skill you can build different weapon types, if you have a station";
$en_lang_out["new1.php"]["skill_19"]="With this skill you can build shields for ships, if you have a station";
$en_lang_out["new1.php"]["skill_20"]="With this skill you can build reduce devices and engines, if you have a station";
$en_lang_out["new1.php"]["skill_21"]="This skill indicates, as good you negotiates with dealers on planets. You can purchase cheap raw materials and expensive selling";
$en_lang_out["new1.php"]["skill_22"]="This skill indicates as well you can navigate a spaceship. Based on this skill you get movement points, which are used for each action in GT";
$en_lang_out["new1.php"]["skill_23"]="This skill indicates, as good you can hide within a larger accumulation of spaceships";
$en_lang_out["new1.php"]["skill_24"]="This skill indicates, how many ships you can maximal see in one sector";
// Avatar parts
$en_lang_out["new1.php"]["hair"]="Hair";
$en_lang_out["new1.php"]["eyes"]="Eyes";
$en_lang_out["new1.php"]["face"]="Face";
$en_lang_out["new1.php"]["clothes"]="Suit";
$en_lang_out["new1.php"]["tatoos"]="Tatoos";
$en_lang_out["new1.php"]["make_up"]="MakeUp/Beard";
$en_lang_out["new1.php"]["piercing"]="Stigma/Piercing";
$en_lang_out["new1.php"]["beard"]="Beard";
$en_lang_out["new1.php"]["moustache"]="Mustache";
$en_lang_out["new1.php"]["bandou"]="Band";
$en_lang_out["new1.php"]["more_hair"]="Hairs";
$en_lang_out["new1.php"]["streak"]="Strand of hair";
$en_lang_out["new1.php"]["charname"]="Name of the character:";
$en_lang_out["new1.php"]["sex"]="Gender:";
$en_lang_out["new1.php"]["password"]="Password:";
$en_lang_out["new1.php"]["re_type_pasword"]="Password reenter:";
$en_lang_out["new1.php"]["mailadress"]="Your Mailadress:";
$en_lang_out["new1.php"]["shipname"]="Name your first ship:";
$en_lang_out["new1.php"]["startplanet"]="Your home planet:";
$en_lang_out["new1.php"]["ships_there"]="(In parentheses: Number of ships there)";
$en_lang_out["new1.php"]["first_skill"]="Your first skill";
$en_lang_out["new1.php"]["second_skill"]="Your secound skill";
$en_lang_out["new1.php"]["third_skill"]="Your third skill";
$en_lang_out["new1.php"]["confirm_policy"]="I read and explain myself the use conditions in its entirety in agreement.";

// text from new_insert.php
$en_lang_out["new_insert.php"]["re_login"]="Log in again please";
$en_lang_out["new_insert.php"]["cheater"]="Try to cheat...";
$en_lang_out["new_insert.php"]["pw_check_failed"]="You entered two different passwords, please check your entry";
$en_lang_out["new_insert.php"]["name_too_short"]="Your name is too short (at least 3 charakters), please changes your entry";
$en_lang_out["new_insert.php"]["name_too_long"]="Your name is too long, please changes your entry";
$en_lang_out["new_insert.php"]["invalid_char_name"]="You typed in an invalid character name, please change your input";
$en_lang_out["new_insert.php"]["sh_name_too_short"]="The name of your ship is too short (at least 3 Charakters), please changes your entry";
$en_lang_out["new_insert.php"]["sh_name_too_long"]="The name of your ship is too long, please changes your entry";
$en_lang_out["new_insert.php"]["name_already_taken"]="There is already a player of this name, please changes your entry";
$en_lang_out["new_insert.php"]["non_unique_startskill"]="You have selected min. twice the same startskill, please change your choice";
$en_lang_out["new_insert.php"]["character_created"]="Your character was created.";
$en_lang_out["new_insert.php"]["wrong_planet"]="Invalid starting planet.";
$en_lang_out["new_insert.php"]["too_many_chars"]="You have already 5 characters in the account.";

// text from opt_commit.php
$en_lang_out["opt_commit.php"]["pw_check_failed"]="The passwords do not match, please check your entry";

// text from options.php
$en_lang_out["options.php"]["delete_question"]="Delete this character, %pl_name%, irrevocablly?";
$en_lang_out["options.php"]["options"]="Gameoptions";
$en_lang_out["options.php"]["graphpath"]="Path to the graphic files";
$en_lang_out["options.php"]["graphpath_xplain"]="In order to accelerate the representation, a local non removable disk path can be registered here, on which the play graphics are stored. If the graphics should be loaded from the server, please enter <font color=\"red\"><b>Server</b></font>!";
$en_lang_out["options.php"]["download_all_file"]="Download the (complete) graphic files here";
$en_lang_out["options.php"]["buttons_zip"]="Download buttons";
$en_lang_out["options.php"]["download_single_files"]="Download individuall graphic files here";
$en_lang_out["options.php"]["password"]="Password";
$en_lang_out["options.php"]["password_xplain"]="Enter here a password which can't be guessed easy but can be noticed well. It should differ from the account name.";
$en_lang_out["options.php"]["retype_pwd"]="Reenter password";
$en_lang_out["options.php"]["retype_pwd_xplain"]="To be sure you did not mistype the password, you must repeat your password again here.";
$en_lang_out["options.php"]["email"]="E-Mail-address";
$en_lang_out["options.php"]["email_xplain"]="Enter here a VALID Mailadresse. It is used to send to you play messages if desired and other things. The address is for internal use and will NOT given to third parties or be sold.";
$en_lang_out["options.php"]["msgs_as_mail_xplain"]="With this option all your game- and systemmails will be sent to your eMail-ddress you specified above.";
$en_lang_out["options.php"]["ships_per_row_in_cockpit"]="ships per row in the cockpit";
$en_lang_out["options.php"]["ships_per_row"]="ships per row";
$en_lang_out["options.php"]["ships_per_row_xplain"]="The higher your screen resolution the more ships can be displayed in one row. Rule of thumb: 640x480 = 3 ships, 800x600 = 4 ships, everything above = 5 ships per row.";
$en_lang_out["options.php"]["attack_warning"]="Planet-attack-warning";
$en_lang_out["options.php"]["warning_yes"]="Show warning";
$en_lang_out["options.php"]["warning_no"]="Show no warnings";
$en_lang_out["options.php"]["attack_warnin_xplain"]="With approaching into a hostile sectore will be shown a warning categorically (WARNING! You are under attack from a planet ...) <b>Only</b> skilled pilots should shut up this warning.";
$en_lang_out["options.php"]["battle_speed"]="fight speed";
$en_lang_out["options.php"]["very_fast"]="Very fast";
$en_lang_out["options.php"]["fast"]="Fast";
$en_lang_out["options.php"]["normal"]="Normal";
$en_lang_out["options.php"]["battle_speed_xplain"]="Here you can choose how fast a fight will be shown on the screen. The speed has no influence to the game occuring, the result is already ascertained with the beginning fight.";
$en_lang_out["options.php"]["defence_mode"]="Defense modus";
$en_lang_out["options.php"]["fight_back"]="Start counterstrike";
$en_lang_out["options.php"]["flee"]="Try to flight";
$en_lang_out["options.php"]["defence_mode_xplain"]="In case of an attack your char can try to fight or to flight. Trader should ALWAYS choose flight!";
$en_lang_out["options.php"]["under_attack"]="Under massive attack";
$en_lang_out["options.php"]["stay_calm"]="To keep steady";
$en_lang_out["options.php"]["panic"]="Flight panically";
$en_lang_out["options.php"]["under_attack_xplain"]="&quot;Flight panically&quot; your char, being under massive attack, will try to fly to the next sector, without BPs, too.";
$en_lang_out["options.php"]["traders_revenge"]="Trader revenge";
$en_lang_out["options.php"]["traders_revenge_xplain"]="It indicates how much % of the captured capitals are to be suspended automatically as bounty.";
$en_lang_out["options.php"]["broadcast"]="Broadcast-message";
$en_lang_out["options.php"]["broadcast_xplain"]="This text appears when your crusor reposes on a ship picture";
$en_lang_out["options.php"]["make_changes"]="To take over";
$en_lang_out["options.php"]["make_changes_xplain"]="This will save the above setted options on the server.";
$en_lang_out["options.php"]["delete_char"]=" character <font color=\"#FF0000\">DELETE</font> !";
$en_lang_out["options.php"]["delete_char_xplain"]="This option is once and for all! This will delete your char <font color=\"#FF0000\"><b>IRREVOCABLE</b></font> . A restoration is <font color=\"#FF0000\"><b>NOT</b></font> possible!";
$en_lang_out["options.php"]["hidechar"]="After serverdown char";
$en_lang_out["options.php"]["hidechar_xplain"]="Shall your char, after a serverdown, if he stands behind his station, be blinded out or stay there?";
$en_lang_out["options.php"]["hidechar_yes"]="blind out";
$en_lang_out["options.php"]["hidechar_no"]="stay there";
$en_lang_out["options.php"]["choose_language"]="language";

// text from opt_commit.php
$en_lang_out["opt_commit.php"]["mail_cant_exist"]="Your mail adress can't exist this way. Please change your entry";
$en_lang_out["opt_commit.php"]["char_mail_changed_body"]="

Hello!\n
The eMail adress of character %pl_name% was changed to %pl_mail%.\n
If the change is not wished by the owner of this eMail-account,\n
please send a message to support@galactic-tales.eu .\n\n
If this notification isn't contradicted, eventually other messages will be \n
sent to the character with this eMail-adress.\n\n
Kind regards,\n
Your Galactic-Tales Team";
$en_lang_out["opt_commit.php"]["char_mail_changed_subject"]="Confirmation of the change of the email address of your character with Galactic-Tales";
$en_lang_out["opt_commit.php"]["cheat_mail_subject"]="TRY TO CHEAT";
$en_lang_out["opt_commit.php"]["cheat_mail_body"]="The Char with the ID {%id%} has tried to cheat in the data base with the GO bug";

// text from planet.php
$en_lang_out["planet.php"]["x_on_planet"]="<b>%name%</b> on the planet <b>%loc_name%</b>";
$en_lang_out["planet.php"]["your_money"]="Your credits: ";
$en_lang_out["planet.php"]["leave_planet"]="Leave to planet";
$en_lang_out["planet.php"]["ressourcename"]="Raw material";
$en_lang_out["planet.php"]["amount"]="Amount";
$en_lang_out["planet.php"]["price"]="Price";
$en_lang_out["planet.php"]["sell"]="sell";
$en_lang_out["planet.php"]["buy"]="buy";
$en_lang_out["planet.php"]["quest_offer"]="Mission: <a href='get_quest.php?id=$id&q_id=%quest_id%'>Bring <b>%amount% %what%</b> to <b>%dest%</b> for <b>%price%</b> Credits</a>&nbsp;&nbsp;&nbsp;&nbsp;";
$en_lang_out["planet.php"]["quest_cost"]="Costs: %cost%";
$en_lang_out["planet.php"]["racer_only"]="(only for spaceracer)";
$en_lang_out["planet.php"]["nav_computer"]="Nav-computer";
$en_lang_out["planet.php"]["type"]="Type:";
$en_lang_out["planet.php"]["available"]="Avail.:";
$en_lang_out["planet.php"]["sell_price"]="Price:";
$en_lang_out["planet.php"]["cheat_sql"]="insert into logs (log_message, category, happened) values ('%name% auf %ship% mit ID $id und IP: %ip% versuchte soeben an Location %location% einen Planeten aufzurufen?!','PlanetWech', sysdate())";
$en_lang_out["planet.php"]["upgrade"]="Upgrade, ";
$en_lang_out["planet.php"]["ship"]="Spaceship, ";
// text from roundopt_commit.php
$en_lang_out["roundopt_commit.php"]["bullshit"]="We do not take such a nonsense!";
$en_lang_out["roundopt_commit.php"]["wait_for_change"]="Still no 48 hours passed since the last change!";

// text from roundoptions.php
$en_lang_out["roundoptions.php"]["turntime_options"]="Round time setting";
$en_lang_out["roundoptions.php"]["option_type"]="Kind of the setting";
$en_lang_out["roundoptions.php"]["variable_turntime"]="Variable round time";
$en_lang_out["roundoptions.php"]["fixed_turntime"]="Fixed round time";
$en_lang_out["roundoptions.php"]["when_fixed_turntime"]="with fixed round time <br />the round change is at:<br />minutes after full hour.";
$en_lang_out["roundoptions.php"]["last_change"]="The last change of these setting was";
$en_lang_out["roundoptions.php"]["on"]="on ";
$en_lang_out["roundoptions.php"]["at_charcreation"]="at Character creation";
$en_lang_out["roundoptions.php"]["timestamp"]="%time% </b>&nbsp;!";
$en_lang_out["roundoptions.php"]["change_now"]="You can change the setting now!";
$en_lang_out["roundoptions.php"]["no_change_now"]="Setting cannot be changed again by you yet!";
$en_lang_out["roundoptions.php"]["make_changes"]=" accept";

// text from sell_good.php
$en_lang_out["sell_good.php"]["sell_result"]="sold %amount% units of %rohstoffname% for %fullprice% (each for %singleprice%)!";
$en_lang_out["sell_good.php"]["not_allowed_to_sell_here"]="You may not sell that here";
$en_lang_out["station_frame_sell_good.php"]["nothing_in_cargo"]="You have no more raw materials in the ship!";

// text from ship.php
$en_lang_out["ship.php"]["ship_name"]="Data of the ship %sh_name%";
$en_lang_out["ship.php"]["ship_type"]="Ship of %sh_type%-class";
$en_lang_out["ship.php"]["sell_value"]="Present sales value: %sell_value%";
$en_lang_out["ship.php"]["weapons"]="Weapons:";
$en_lang_out["ship.php"]["shields"]="Shild:";
$en_lang_out["ship.php"]["cargo_space"]="Cargo:";
$en_lang_out["ship.php"]["speed"]="Speed:";
$en_lang_out["ship.php"]["slots"]="Slots:";
$en_lang_out["ship.php"]["sh_health"]="condition:";
$en_lang_out["ship.php"]["structure"]="internal structure:";
$en_lang_out["ship.php"]["sum"]="total:";
$en_lang_out["ship.php"]["cargo"]="Cargo:";
$en_lang_out["ship.php"]["get"]="reduce devices:";
$en_lang_out["ship.php"]["left_slots"]="remaining slots:";

// text from ship_actions.php
$en_lang_out["ship_actions.php"]["options"]="options";
$en_lang_out["ship_actions.php"]["ship_name"]="shipcontact: ";
$en_lang_out["ship_actions.php"]["contact_pilot"]=" <b>contact</b> the pilot";
$en_lang_out["ship_actions.php"]["scan_ship"]=" <b>scan</b> the shipdata";
$en_lang_out["ship_actions.php"]["add_bounty"]=" set <b>bounty</b> ";
$en_lang_out["ship_actions.php"]["fleet_it"]=" build a <b>fleet</b>";
$en_lang_out["ship_actions.php"]["attack"]=" <b>attack</b> the ship";
$en_lang_out["ship_actions.php"]["message_button"]="messages";
$en_lang_out["ship_actions.php"]["scan_button"]="Scan";
$en_lang_out["ship_actions.php"]["attack_button"]="attack";
$en_lang_out["ship_actions.php"]["bounty_button"]="bounty";
$en_lang_out["ship_actions.php"]["fleet_button"]="Fleet";


// text from ship_scan.php
$en_lang_out["ship_scan.php"]["invalid_link"]="This link is not valid any more!";
$en_lang_out["ship_scan.php"]["pilot"]="Pilot:";
$en_lang_out["ship_scan.php"]["ship"]="Ship:";
$en_lang_out["ship_scan.php"]["sh_type"]="Type:";
$en_lang_out["ship_scan.php"]["no_scan"]="no Scan";
$en_lang_out["ship_scan.php"]["level"]="Level:";
$en_lang_out["ship_scan.php"]["shields"]="Shields:";
$en_lang_out["ship_scan.php"]["weapons"]="Weapons:";
$en_lang_out["ship_scan.php"]["money"]="money:";
$en_lang_out["ship_scan.php"]["ship_health"]="Ship condition:";
$en_lang_out["ship_scan.php"]["pirate_counts"]="Pirate counts:";
$en_lang_out["ship_scan.php"]["hh_counts"]="Head hunter counts:";
$en_lang_out["ship_scan.php"]["nuke_counts"]="nuke counts:";
$en_lang_out["ship_scan.php"]["bounty"]="bounty:";
$en_lang_out["ship_scan.php"]["scan_again"]="<b>Scan</b> the ship data again";
$en_lang_out["ship_scan.php"]["clanship"]="<br />(Clanship)";
$en_lang_out["ship_scan.php"]["current_bp"]="current: ";
$en_lang_out["ship_scan.php"]["bp"]=" MP";


// text from station.php
$en_lang_out["station.php"]["in"]=" in "; // as in "in sector" ..
$en_lang_out["station.php"]["who"]="<b>%name%</b>  with <b>%money%</b> Credits";
$en_lang_out["station.php"]["upgrade"]="upgrade";
$en_lang_out["station.php"]["level"]="level";
$en_lang_out["station.php"]["costs"]="Ext. costs";
$en_lang_out["station.php"]["health_up"]="Stationhull (+1)";
$en_lang_out["station.php"]["weapon_up"]="Weaponsystem (+2)";
$en_lang_out["station.php"]["shield_up"]="Shieldupgarde (+50)";
$en_lang_out["station.php"]["torpblocker_up"]="Photonenblocker";
$en_lang_out["station.php"]["tac_comp_up"]="tactical computer";
$en_lang_out["station.php"]["build_comp_up"]="Shipbuild computer";
$en_lang_out["station.php"]["cargo_up"]="cargo (+1000)";
$en_lang_out["station.php"]["rep_dock"]="repairdock";
$en_lang_out["station.php"]["not_built_in"]="no";
$en_lang_out["station.php"]["built_in"]="available";
$en_lang_out["station.php"]["no_price_available"]="n/a";
$en_lang_out["station.php"]["builddock"]="builddock";
$en_lang_out["station.php"]["weap_build"]="Weaponfactory";
$en_lang_out["station.php"]["shield_build"]="shieldfactory";
$en_lang_out["station.php"]["mach_build"]="Machinefactory";
$en_lang_out["station.php"]["rep_price"]="Repair price";
$en_lang_out["station.php"]["deactivate_rep_xplain"]=" (0,00 deactivate the repair)";
$en_lang_out["station.php"]["allow_nuker_repair"]="repair nukers";
$en_lang_out["station.php"]["show_clansign"]="Show clansigns";
$en_lang_out["station.php"]["only_clanmember"]="access only for Clanmember and alliance partners";
$en_lang_out["station.php"]["show_res_remain"]="show cargo fill level";
$en_lang_out["station.php"]["homepage"]="Homepage";
$en_lang_out["station.php"]["welcome_text"]="Welcometext: ";
$en_lang_out["station.php"]["xplain_text_link"]="Note for station text";
$en_lang_out["station.php"]["make_changes"]="apply setting ";
$en_lang_out["station.php"]["destroy_station"]="Destroy this Station";
$en_lang_out["station.php"]["station_banlist_edit"]="Stationbanlist";
$en_lang_out["station.php"]["ressource"]="raw material ";
$en_lang_out["station.php"]["place_on_ship"]="(load on ship)";
$en_lang_out["station.php"]["used_cargo_space"]="Cargo hold";
$en_lang_out["station.php"]["max_cargo_space"]="Maximum";
$en_lang_out["station.php"]["price"]="Price";
$en_lang_out["station.php"]["item"]="item";
$en_lang_out["station.php"]["stock"]="store";
$en_lang_out["station.php"]["no_clanship_defined_yet"]="<font color=red><b>Your clan designed no clan ship yet</b></font>";
$en_lang_out["station.php"]["shiptype"]="Shiptype:";
$en_lang_out["station.php"]["shipgraphic"]="Shipgraphic:";
$en_lang_out["station.php"]["shipweapons"]="Weapons:";
$en_lang_out["station.php"]["shipshields"]="Shields:";
$en_lang_out["station.php"]["shipcargo"]="Cargo hold:";
$en_lang_out["station.php"]["shipslots"]="Slots:";
$en_lang_out["station.php"]["shipspeed"]="MP:";
$en_lang_out["station.php"]["ship_minskill"]="Minimum skill:";
$en_lang_out["station.php"]["ship_minlevel"]="Minimum level:";
$en_lang_out["station.php"]["design_ship_button"]="Design clanschip";
$en_lang_out["station.php"]["choose_graphic_button"]="Choose shipgraphic";
$en_lang_out["station.php"]["ready_to_construct"]="ok to the build";
$en_lang_out["station.php"]["confirm_button"]="apply";
$en_lang_out["station.php"]["requires"]="Consumption:";
$en_lang_out["station.php"]["min_price"]="Minimum price:";
$en_lang_out["station.php"]["max_price"]="Maximum price:";
$en_lang_out["station.php"]["requires_all"]="Complete raw materials:";
$en_lang_out["station.php"]["ship_category"]="Category";
$en_lang_out["station.php"]["ship_offer"]="choice";
$en_lang_out["station.php"]["hint_to_hidechar_option"]="Please consider the options for server down!";

//text from station_frame_decision.php
$en_lang_out["station_frame_decision.php"]["message_button"]="Message";
$en_lang_out["station_frame_decision.php"]["repair_button"]="Repair";
$en_lang_out["station_frame_decision.php"]["attack_button"]="Attack";
$en_lang_out["station_frame_decision.php"]["shop_button"]="to the offer";
$en_lang_out["station_frame_decision.php"]["fleet_button"]="Fleet";
$en_lang_out["station_frame_decision.php"]["ship_rep"]="repair ship for ";
$en_lang_out["station_frame_decision.php"]["rep"]=" credits";
$en_lang_out["station_frame_decision.php"]["shop"]="to the offer";
$en_lang_out["station_frame_decision.php"]["station_fleet"]="Fleet the station";
$en_lang_out["station_frame_decision.php"]["station_attack"]="Attack the station";
$en_lang_out["station_frame_decision.php"]["station_attack_warning"]="Your level is too low, your account unpaid or you sits in a shuttle...no matter, you can't attack the station! Possibly you would have destroyed yourself almost, but owing to the unequalled distance vision of the DEV team you get this Popup instead of it.";
$en_lang_out["station_frame_decision.php"]["repcost"]="Repair cost here:";
$en_lang_out["station_frame_decision.php"]["rep_here"]="Repair ship for";
$en_lang_out["station_frame_decision.php"]["leave_station"]="Quit station";
$en_lang_out["station_frame_decision.php"]["station_message"]="Send a message to the Station owner";

// text from station_build_ship.php
$en_lang_out["station_build_ship.php"]["not_enough_ress"]="Necessary raw materials are missing to build this ship";
$en_lang_out["station_build_ship.php"]["no_ship_found"]="Your clan designed no clan ship yet";

// text from station_build_upgrade.php
$en_lang_out["station_build_upgrade.php"]["not_enough_ress"]="Necessary raw materials are missing to build this upgrade";
$en_lang_out["station_build_upgrade.php"]["action_not_supported"]="One cannot implement this action on this type of station";

// text from new_station_get_stuff.php
$en_lang_out["new_station_get_stuff.php"]["action_not_allowed"]="This action is not allowed here";

// text from station_part_pricing.php
$en_lang_out["station_part_pricing.php"]["min_price_alert"]="The minimum price is %min_price% Credits!";
$en_lang_out["station_part_pricing.php"]["max_price_alert"]="The maximum price is %max_price% Credits!";

// text from station_remove.php
$en_lang_out["station_remove.php"]["really_destroy"]="Do you REALLY want to  DESTROY this station?";
$en_lang_out["station_remove.php"]["has_detroyed"]="%pl_name% has self destroyed the station %st_name%";
$en_lang_out["station_remove.php"]["has_detroyed_clanstaion"]="The Clan %clan_name% [%clan_short%] has self destroyed the <b>Clanstation</b>";

// text from station_remove_sure.php
$en_lang_out["station_remove_sure.php"]["last_warning"]="<h1>ATTENTION !</h1>
You will destroy your station irrevocable. This <b>can't</b> be restored afterwards. Are you sure you will realy do this?<br />";
$en_lang_out["station_remove_sure.php"]["confirm_remove"]="Yes, <b>destroy</b> this station";

// text from station_upgrade.php
$en_lang_out["station_upgrade.php"]["upgrade_limit_reached"]="This upgrade cannot be upgrated further.";

// text from tofleet.php
$en_lang_out["tofleet.php"]["no_racer_fleet"]="Space Racer cannot be gefleetet!";
$en_lang_out["tofleet.php"]["no_enemy_fleet"]="You may not support your enemy by fleet!";
$en_lang_out["tofleet.php"]["other_level_too_low"]="Alliance missed: The level of your relay leader is too low";
$en_lang_out["tofleet.php"]["own_level_or_bp_too_low"]="Alliance missed: Your level is too low or you has too little MP";
$en_lang_out["tofleet.php"]["fleet_msg_subject"]="Fleet formed";
$en_lang_out["tofleet.php"]["fleet_msg_body"]="%pl_name% on the %sh_name% allied itself with you to fleet (+%add_weapons% weapons and %add_shields% shield) current fleet strength: %fleet_weap% weapons and %fleet_shield% shield.";
$en_lang_out["tofleet.php"]["current_weapons"]="Current weapon strength: ";
$en_lang_out["tofleet.php"]["current_shields"]="Current shield strength: ";

// subdir /1/messagecenter

// text from contactbook.php
$en_lang_out["contactbook.php"]["admin_adress_book"]="adress book administration";
$en_lang_out["contactbook.php"]["back"]="back";
$en_lang_out["contactbook.php"]["delete"]="delete";
$en_lang_out["contactbook.php"]["no_entry"]="no entrys available";

// text from inc.message_insert.php
$en_lang_out["inc.message_insert.php"]["mass_message"]="mass message, %amount% receiver";
$en_lang_out["inc.message_insert.php"]["sysmsg_mail_subject"]="GT-Info: mail from SYSTEM an %name%";
$en_lang_out["inc.message_insert.php"]["sysmsg_mail_body"]="GT-sender: SYSTEM\nGT-reciever: %reci_name% on the %reci_ship%\n\nsubject: \n%subject%\n\ncontent: \n%text%\n\n\n";
$en_lang_out["inc.message_insert.php"]["supportmsg_mail_subject"]="GT-Info: mail from USER SUPPORT to %name%";
$en_lang_out["inc.message_insert.php"]["supportmsg_mail_body"]="GT-SENDER: USER SUPPORT\nGT-receiver: %reci_name% on the %reci_ship%\n\nsubject: \n%subject%\n\ncontent: \n%text%\n\n\n";
$en_lang_out["inc.message_insert.php"]["playermsg_mail_subject"]="GT-Info: Mail from %send_name% to %reci_name%";
$en_lang_out["inc.message_insert.php"]["playermsg_mail_body"]="GT-sender: %send_name% on the %send_ship%\nGT-receiver: %reci_name% on the %reci_ship%\n\nsubject: \n%subject%\n\ncontent: \n%text%\n\n\n";
$en_lang_out["inc.message_insert.php"]["was_sent_to"]="<I>This message was sent to: %name%</I><P>";

// text from message_write.php
$en_lang_out["message_write.php"]["to"]="an ";
$en_lang_out["message_write.php"]["receiver_not_found"]="Receiver not found: %reci_name%!";
$en_lang_out["message_write.php"]["write_message"]="message %receiver%write";
$en_lang_out["message_write.php"]["subject"]="subject: ";
$en_lang_out["message_write.php"]["body"]="message:";
$en_lang_out["message_write.php"]["send"]=" Send";
$en_lang_out["message_write.php"]["multiple_receiver"]="multiple Receiver";

// text from messagecenter.php
$en_lang_out["messagecenter.php"]["message_to_support"]="message to the support";
$en_lang_out["messagecenter.php"]["clan"]="clan: ";
$en_lang_out["messagecenter.php"]["choose_receiver"]="Please choose a receiver.";
$en_lang_out["messagecenter.php"]["write_message"]="Write message";
$en_lang_out["messagecenter.php"]["adressbook"]="adressbook ";
$en_lang_out["messagecenter.php"]["administration"]="administration";
$en_lang_out["messagecenter.php"]["direct_mail"]="Mail directly to a player:";
$en_lang_out["messagecenter.php"]["about_msgcenter"]="
<font face=tahoma COLOR=red size=2><b>Remark to the new message center</b></FONT><P>
<font face=tahoma size=2>Small change:<br />
messages that are older than three days and not marked will be deleted from the inbox right away.</font>";
$en_lang_out["messagecenter.php"]["mailbox_in"]="inbox";
$en_lang_out["messagecenter.php"]["mailbox_out"]="outbox";
$en_lang_out["messagecenter.php"]["mailbox_system"]="system";
$en_lang_out["messagecenter.php"]["mailbox_store"]="store";
$en_lang_out["messagecenter.php"]["mailbox_trash"]="trash";
$en_lang_out["messagecenter.php"]["msgs_shown"]="%amount% are shown!";
$en_lang_out["messagecenter.php"]["back"]="back";
$en_lang_out["messagecenter.php"]["next"]="next";
$en_lang_out["messagecenter.php"]["message"]="message ";
$en_lang_out["messagecenter.php"]["unread_message"]="unread message";
$en_lang_out["messagecenter.php"]["msg_from_system"]="from <B><FONT COLOR=red>system</font></b>";
$en_lang_out["messagecenter.php"]["msg_from_support"]="from <B><FONT COLOR=red>user support</font></b>";
$en_lang_out["messagecenter.php"]["msg_from"]="von ";
$en_lang_out["messagecenter.php"]["msg_time"]="%hour%:%minute% on %day%.%month%";
$en_lang_out["messagecenter.php"]["empty_msg_received"]="<i>You have recieded an empty message.</i>";
$en_lang_out["messagecenter.php"]["answer"]=" answer";
$en_lang_out["messagecenter.php"]["add_to_adressbook"]=" add to contact list";
$en_lang_out["messagecenter.php"]["delete"]=" löschen";
$en_lang_out["messagecenter.php"]["permanent_delete"]=" permanent delete";
$en_lang_out["messagecenter.php"]["mark"]=" mark";
$en_lang_out["messagecenter.php"]["de_mark"]=" remove mark";
$en_lang_out["messagecenter.php"]["move"]="move all messages to";
$en_lang_out["messagecenter.php"]["tag_all_msgs"]=" choose all messages";
$en_lang_out["messagecenter.php"]["tagged_msgs"]="Chosen message...";

// text from station_banlist.php
$en_lang_out["station_banlist.php"]["admin_station_banlist"]="Persons banned from station";
$en_lang_out["station_banlist.php"]["no_entry"]="no entrys available";
$en_lang_out["station_banlist.php"]["no_station"]="You need to have a station to ban someone from your station!";
$en_lang_out["station_banlist.php"]["search"]="station ban list - SEARCH (the first 100 hits)";
$en_lang_out["station_banlist.php"]["no_hits"]="no hit...";
$en_lang_out["station_banlist.php"]["search_by_ship"]="Search for a ship";
$en_lang_out["station_banlist.php"]["search_by_char"]="Search for charname";

// text from station_banlist_clan.php
$en_lang_out["station_banlist_clan.php"]["admin_station_banlist"]="Unwandet clans on the station";
$en_lang_out["station_banlist_clan.php"]["search_by_name"]="search for clan name";
$en_lang_out["station_banlist_clan.php"]["search_by_sign"]="search for clansign";

//subdir  /scripts
// Script Rundenscript
$en_lang_out["rundenscript.php"]["nuked_counter"]="You were imprisoned short-dated";

// subdir /1/station
// Script buy_from_planet
$en_lang_out["buy_from_planet.php"]["not_in_sys"]="This station is not in this system";
$en_lang_out["buy_from_planet.php"]["amount_changed"]="The amount of this object has changed!";
$en_lang_out["buy_from_planet.php"]["no_money"]="You have not enough money to buy this!";
$en_lang_out["buy_from_planet.php"]["out_of_items"]="This object is no longer on the station!";
$en_lang_out["buy_from_planet.php"]["lowlevel"]="YOu are not expirienced enough (level) to fly this ship!";
$en_lang_out["buy_from_planet.php"]["name_ship"]="Name your ship:";
$en_lang_out["buy_from_planet.php"]["no_more_slots"]="You have no free slot for this upgrade!";

//subdir /1/clanstation
// Script clanship_insert.php
$en_lang_out["clanship_insert.php"]["not_allowed_to_design"]="Your clan isn't allowed to create a new clanship design";
$en_lang_out["clanship_insert.php"]["no_name_given"]="The ship design needs a name";

// Script sell_good
$en_lang_out["sell_good.php"]["no_money"]="The owner of the station has no money to buy your ware";

// Script station/station
$en_lang_out["station/station.php"]["on_station"]="on the station";
$en_lang_out["station/station.php"]["your_money"]="your money:";

$en_lang_out["station/station.php"]["youarebanned"]="The access to this station was refused to you!";
$en_lang_out["station/station.php"]["clanonly"]="Access to this station only for clan member and alliance partners at the moment!";

$en_lang_out["station/station.php"]["station_homepage"]="station homepage ";
$en_lang_out["station/station.php"]["ressource"]="ressource";
$en_lang_out["station/station.php"]["amount"]="amount";
$en_lang_out["station/station.php"]["price"]="price";
$en_lang_out["station/station.php"]["sell"]="sell";
$en_lang_out["station/station.php"]["sum"]="quantum:";


// station/new_station.php
$en_lang_out["station/new_station.php"]["station_overview"] ="station management";
$en_lang_out["station/new_station.php"]["dock_overview"] ="spaceship dockyard";
$en_lang_out["station/new_station.php"]["mach_overview"] ="machine factory";
$en_lang_out["station/new_station.php"]["weap_overview"] ="weapon factory";
$en_lang_out["station/new_station.php"]["shield_overview"] ="shield generator factory";
$en_lang_out["station/new_station.php"]["store_administration"] ="warehouse management";
$en_lang_out["station/new_station.php"]["no_station"]="You have no station!";

//station_text.php
$de_lang_out["station_text.php"]["with_preview"] = "Save and show Preview.";
$de_lang_out["station_text.php"]["text_preview"] = "Stationtext-Preview";

// guild_bank_insert.php
$en_lang_out["guild_bank_insert.php"]["no_clan"] = "You are not member of a clan!";

// text von planet_actions.php
$en_lang_out["planet_actions.php"]["options"]="options";
$en_lang_out["planet_actions.php"]["planet_name"]="planet contact: ";
$en_lang_out["planet_actions.php"]["help"]=" Send the planet <b>financial contribution</b> ";
$en_lang_out["planet_actions.php"]["doom"]=" <b>Tyrannize</b> the planet";
$en_lang_out["planet_actions.php"]["help_button"]="Help";
$en_lang_out["planet_actions.php"]["doom_button"]="tyrannize";
$en_lang_out["planet_actions.php"]["planet_nothere"]="You are not in the sector.";
$en_lang_out["planet_actions.php"]["planet_notmoney"]="You don't have enough creds.";
$en_lang_out["planet_actions.php"]["planet_notclan"]="You have to be in a clan.";
$en_lang_out["planet_actions.php"]["planet_help"]="The population is thankful to you.";
$en_lang_out["planet_actions.php"]["planet_doom"]="The population fears you more.";
$en_lang_out["planet_actions.php"]["planet_is_donated"]="The population loves the clan ";
$en_lang_out["planet_actions.php"]["planet_is_doomed"]="The population fears the clan ";
$en_lang_out["planet_actions.php"]["planet_not_old_enough"]="You have to be minimum level 10 for this action";

// subdir /payment
// text from pay_include.php
$en_lang_out["pay_include.php"]["payback_abo"]="Rebooking because of abo-start";
$en_lang_out["pay_include.php"]["error_4p"]="An error occupied. Please contact with information about this error message the uter support, if this error remains durable.";
$en_lang_out["pay_include.php"]["no_payment_user"]="This payment-record doesn't exist. Please try again in some minutes.";
$en_lang_out["pay_include_fizz.php"]["liquidity_error_0"]="This abo is marked as <span style=\"color:red\"><b>\"not payed\"</b></span>.<br> if the payment is made as remittance, 
please note that it needs ten days to process, an abo is already marked as not paid after seven days without recieved payment. As soon as the payment reached 4Payment, the account will be marked 
as paid again.<br> At an other payment method or a longer period of time, please contact 4Payment or the Galactic-Tales DevTeam immediately for processing the problem.";

//missing_graphic.php
$en_lang_out["missing_graphic.php"]["title"]="Missing graphic";
$en_lang_out["missing_graphic.php"]["download_intro"]="Please load the following graphic(s):<br />";
$en_lang_out["missing_graphic.php"]["download_to"]="to";
$en_lang_out["missing_graphic.php"]["download_downward"]="down.";
