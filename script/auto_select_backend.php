<?php
session_start();
require_once ("JsHttpRequest.php");
// Init JsHttpRequest and specify the encoding. It's important!
$JsHttpRequest = new JsHttpRequest("windows-1251");

//___________________________содеинение с БД $DB____________________________________________ 
$openConn2db = mysql_connect("localhost", "$PHP_AUTH_USER", "$PHP_AUTH_PW"); 
//___________________установка национальной кодировки после соединения с БД_________________
  mysql_query ("set character_set_client='cp1251'");  
  mysql_query ("set character_set_results='cp1251'");  
  mysql_query ("set collation_connection='cp1251_general_ci'");


// Fetch request parameters.
$selected_element = @$_REQUEST['selected_element'];
$selected_data = @$_REQUEST['selected_data'];


if ($selected_element == 'centers')
{
     $query_uzly=mysql_query("SELECT DISTINCT `uzly`.`id`, `uzly` FROM spravochnik.uzly, spravochnik.punkty, spravochnik.ploshadki
	 WHERE (`id_centers` = '".$selected_data."') AND (`id_uzly` = `uzly`.`id`)");
	 $first_uzel = @mysql_fetch_assoc($query_uzly); // получаем первый узел в select'е 
	 mysql_data_seek($query_uzly,0);					// возврат запроса в начало
	 $query_punkty = mysql_query("SELECT DISTINCT `punkty`.`id`,`punkty` FROM spravochnik.uzly, spravochnik.punkty, spravochnik.ploshadki 
	 WHERE (`id_centers` = '".$selected_data."') AND (`id_uzly` = `uzly`.`id`) AND (`id_uzly` = '".$first_uzel['id']."') 
	 ORDER BY `punkty` ASC");
     $first_punkt = @mysql_fetch_assoc($query_punkty); // получаем площадку первого нас. пункта в select'е 
	 mysql_data_seek($query_punkty,0);					// возврат запроса в начало
	 $query_ploshadki = mysql_query("SELECT `ploshadki`.`id`,`ploshadki`,`type_ploshadki` FROM spravochnik.ploshadki, spravochnik.type_ploshadki  WHERE (`id_punkty` = '".$first_punkt['id']."') AND (`ploshadki`.`id_type_ploshadki` = `type_ploshadki`.`id`) ORDER BY `ploshadki`,`id_type_ploshadki` ASC");
}
if ($selected_element == 'uzly')
{
	 $query_punkty = mysql_query("SELECT DISTINCT `punkty`.`id`,`punkty` FROM spravochnik.punkty, spravochnik.ploshadki 
	 WHERE (`id_uzly` = '".$selected_data."') ORDER BY `punkty` ASC");
	 $first_punkt = @mysql_fetch_assoc($query_punkty);
	 mysql_data_seek($query_punkty,0); 
	 $query_ploshadki = mysql_query("SELECT `ploshadki`.`id`,`ploshadki`,`type_ploshadki` FROM spravochnik.ploshadki, spravochnik.type_ploshadki  WHERE (`id_punkty` = '".$first_punkt['id']."') AND (`ploshadki`.`id_type_ploshadki` = `type_ploshadki`.`id`) ORDER BY `ploshadki`,`id_type_ploshadki` ASC");
}
if ($selected_element == 'punkty')
{
    $query_ploshadki = mysql_query("SELECT `ploshadki`.`id`,`ploshadki`,`type_ploshadki` FROM spravochnik.ploshadki, spravochnik.type_ploshadki  WHERE (`id_punkty` = '".$selected_data."') AND (`ploshadki`.`id_type_ploshadki` = `type_ploshadki`.`id`) ORDER BY `ploshadki`,`id_type_ploshadki` ASC");
}

if ($selected_element == 'group_otkazy')
{
	$query_otkazy = mysql_query("SELECT `id`, `type_otkazy_uslugi` FROM spravochnik.type_otkazy_uslugi WHERE (`group` = '".$selected_data."') ORDER BY `type_otkazy_uslugi` ASC");
}

if ($selected_element == 'id_cavu_ats')
{
	$query_search = mysql_query("SELECT `cavu_ats`.`id`, `zavod_number_cavu_ats`, `type_korzin_cavu`, `type_stancionnyx_plat_cavu`, `punkty`,`ploshadki`,`index_ats`
	FROM `spravochnik`.`ploshadki`, `spravochnik`.`centers`, `spravochnik`.`uzly`, `spravochnik`.`punkty`, `techuchet`.`ats`, `techuchet`.`cavu_ats`, 
	`spravochnik`.`type_korzin_cavu`, `spravochnik`.`type_stancionnyx_plat_cavu`  
	WHERE (`centers`.`id` = `uzly`.`id_centers`) AND (`uzly`.`id` = `punkty`.`id_uzly`) AND (`punkty`.`id` = `ploshadki`.`id_punkty`) AND (`ploshadki`.`id` = `ats`.`id_ploshadki`) 
	AND (`ats`.`id` = `cavu_ats`.`id_ats`) AND (`type_korzin_cavu`.`id` = `cavu_ats`.`id_type_korzin_cavu`) 
	AND (`type_stancionnyx_plat_cavu`.`id` = `cavu_ats`.`id_type_stancionnyx_plat_cavu`) AND (`punkty` LIKE '%".$selected_data."%')".@$_SESSION['_login_center']."
	ORDER BY `punkty`,`ploshadki`,`index_ats`,`type_stancionnyx_plat_cavu` ASC");
}

if ($selected_element == 'id_taxophones')
{
	$query_search = mysql_query("SELECT `taxophones`.`id`, `centers`,`uzly`,`punkty`,`ploshadki`, `taxophones`.`phone_number`
		FROM `spravochnik`.`ploshadki`, `spravochnik`.`centers`, `spravochnik`.`uzly`, `spravochnik`.`punkty`, `techuchet`.`taxophones`   
		WHERE (`centers`.`id` = `uzly`.`id_centers`) AND (`uzly`.`id` = `punkty`.`id_uzly`) AND (`punkty`.`id` = `ploshadki`.`id_punkty`)  
		AND (`ploshadki`.`id` = `taxophones`.`id_ploshadki_2`) AND (`taxophones`.`id_type_taxophone_prinad` = 2) AND (`uzly` LIKE '%".$selected_data."%')".@$_SESSION['_login_center']."
	    ORDER BY `centers`,`uzly`,`punkty`,`ploshadki` ASC");
}

if ($selected_element == 'id_company')
{
	$query_search = mysql_query("SELECT * FROM `spravochnik`.`company` WHERE (`company` LIKE '%".$selected_data."%') ORDER BY `company` ASC");
}

if ($selected_element == 'lzk_group1')
{
	 $query_lzk_group2 = mysql_query("SELECT DISTINCT `lzk_group2`.`id`,`lzk_group2` FROM spravochnik.lzk_group2 WHERE (`id_lzk_group1` = '".$selected_data."') ORDER BY `lzk_group2` ASC");
	 $first_lzk_group2 = @mysql_fetch_assoc($query_lzk_group2);
	 mysql_data_seek($query_lzk_group2,0); 
	 $query_lzk_group3 = mysql_query("SELECT `lzk_group3`.`id`, `lzk_group3` FROM spravochnik.lzk_group3  WHERE (`id_lzk_group2` = '".$first_lzk_group2['id']."') ORDER BY `lzk_group3` ASC");
}
if ($selected_element == 'lzk_group2')
{
    $query_lzk_group3 = mysql_query("SELECT `lzk_group3`.`id`, `lzk_group3` FROM spravochnik.lzk_group3 WHERE (`id_lzk_group2` = '".$selected_data."') ORDER BY `lzk_group3` ASC");
}


$u_key=0; $p_key=0; $pl_key=0; unset($UZEL); unset($PUNKT); unset($PLOSHADKI); unset($ID_UZEL); unset($ID_PUNKT); unset($ID_PLOSHADKI);
$search_key=0; $search_key_2=0; $label = ""; unset($SEARCH); unset($ID_SEARCH); unset($SEARCH_group);
$otk_key = 0; unset($OTKAZY); unset($ID_OTKAZY);
$lzk_key1=0; $lzk_key2=0; unset($LZK_GROUP2); unset($LZK_GROUP3); unset($ID_LZK_GROUP2); unset($ID_LZK_GROUP3);

while($u = @mysql_fetch_assoc($query_uzly))
{
   $UZEL[$u_key]=$u['uzly'];
   $ID_UZEL[$u_key]=$u['id'];
   ++$u_key;
}   
while($p = @mysql_fetch_assoc($query_punkty))
{
   $PUNKT[$p_key]=$p['punkty']; 
   $ID_PUNKT[$p_key]=$p['id'];
   ++$p_key;
}
while($pl = @mysql_fetch_assoc($query_ploshadki))
{
   $PLOSHADKI[$pl_key]=$pl['ploshadki']."  (".$pl['type_ploshadki'].")";    
   $ID_PLOSHADKI[$pl_key]=$pl['id'];
   ++$pl_key;
}
while($otk = @mysql_fetch_assoc($query_otkazy))
{
   $OTKAZY[$otk_key]=$otk['type_otkazy_uslugi'];    
   $ID_OTKAZY[$otk_key]=$otk['id'];
   ++$otk_key;
}
while($srch = @mysql_fetch_assoc($query_search))
{
   if ($selected_element == 'id_cavu_ats') 
   {
       $string = $srch['punkty'].", ".$srch['ploshadki'].", ".$srch['index_ats']; // эталон label
	   if ($label != $string) {$SEARCH_group[$search_key] = $string; $label = $string;} // записываем label для формирования групп в select	   
	   $SEARCH[$search_key]=$srch['type_stancionnyx_plat_cavu']." / зав.№".$srch['zavod_number_cavu_ats']." / корзина ".$srch['type_korzin_cavu'];
   }
   if ($selected_element == 'id_taxophones') 
   {
       $string = $srch['centers'].", ".$srch['uzly']; // эталон label
	   if ($label != $string) {$SEARCH_group[$search_key] = $string; $label = $string;} // записываем label для формирования групп в select
	   $SEARCH[$search_key]=$srch['punkty'].", ".$srch['ploshadki']." (№".$srch['phone_number'].")";
   }
   if ($selected_element == 'id_company') {$SEARCH[$search_key] = $srch['company']; $SEARCH_group = no;}
   
   $ID_SEARCH[$search_key]=$srch['id'];
   ++$search_key;
}

while($u = @mysql_fetch_assoc($query_lzk_group2))
{
   $LZK_GROUP2[$lzk_key1]=$u['lzk_group2'];
   $ID_LZK_GROUP2[$lzk_key1]=$u['id'];
   ++$lzk_key1;
}   
while($p = @mysql_fetch_assoc($query_lzk_group3))
{
   $LZK_GROUP3[$lzk_key2]=$p['lzk_group3']; 
   $ID_LZK_GROUP3[$lzk_key2]=$p['id'];
   ++$lzk_key2;
}

mysql_close();


$GLOBALS['_RESULT'] = array(
  "UZEL"   => @$UZEL,
  "ID_UZEL"   => @$ID_UZEL,
  "PUNKT"  => @$PUNKT,
  "ID_PUNKT"  => @$ID_PUNKT,
  "PLOSHADKI"  => @$PLOSHADKI,
  "ID_PLOSHADKI"  => @$ID_PLOSHADKI,
   "SEARCH"  => @$SEARCH,
   "SEARCH_group" => @$SEARCH_group,
   "ID_SEARCH"  => @$ID_SEARCH,
   "OTKAZY" => @$OTKAZY,
   "ID_OTKAZY" => @$ID_OTKAZY,
   "LZK_GROUP2" => @$LZK_GROUP2,
   "ID_LZK_GROUP2" => @$ID_LZK_GROUP2,
   "LZK_GROUP3" => @$LZK_GROUP3,
   "ID_LZK_GROUP3" => @$ID_LZK_GROUP3);

?>
