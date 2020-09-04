<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
switch ($zn)
{
case 'id_ploshadki':
case 'id_ploshadki_2':
{   
	if (isset($_SESSION['_column_name_error'])) // если возникла ошибка при добавлении, то здесь отрабатывается показ последнего выбора пользователя
	{
		$query_selected_ploshadki = mysql_query("SELECT `id_centers`,`centers`,`id_uzly`,`uzly`,`id_punkty`,`punkty`,`ploshadki`.`id`,`ploshadki` FROM spravochnik.ploshadki, spravochnik.punkty, spravochnik.uzly,spravochnik.centers WHERE (`ploshadki`.`id` = '".$_SESSION['_parametr_error'][$zn]."') AND (`ploshadki`.`id_punkty` = `punkty`.`id`) AND (`punkty`.`id_uzly` = `uzly`.`id`) AND (`uzly`.`id_centers` = `centers`.`id`)".@$_SESSION['_login_center'])or die($error_message_on_query.mysql_error());
	    $selected_ploshadki = mysql_fetch_assoc($query_selected_ploshadki);
		//print_r($selected_ploshadki);
    }
	$query_select_centers = mysql_query("SELECT DISTINCT `centers`.`id`,`centers` FROM spravochnik.centers, spravochnik.uzly, spravochnik.punkty, spravochnik.ploshadki 
	WHERE (`id_centers` = `centers`.`id`) AND (`id_uzly` = `uzly`.`id`) AND (`id_punkty` = `punkty`.`id`)".@$_SESSION['_login_center']." ORDER BY `centers` ASC");
	echo "<select class=\"select_box\" name='centers_select' size='1' id='centers' onchange=autopodbor_ct('centers','')>";
	$q = 0;
	while ($c = mysql_fetch_assoc($query_select_centers))
	{		     
		 echo"<option value=".$c['id'];
		 if ((isset($_SESSION['_column_name_error']))&&($selected_ploshadki['id_centers']==$c['id'])) {echo " SELECTED";}
		 echo">".$c['centers']."</option>";
		 if ($q==0) {$limit_uzel_first_load = $c['id']; ++$q;}  // для конкретизации списка нас. пунктов по данному узлу, при первой загрузке add.php	 
	}
	echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif1\"><br>";
	
	if (isset($_SESSION['_column_name_error'])) $id_centers = $selected_ploshadki['id_centers']; else $id_centers = $limit_uzel_first_load;
	$query_select_uzly = mysql_query("SELECT DISTINCT `uzly`.`id`,`uzly` FROM spravochnik.uzly, spravochnik.punkty, spravochnik.ploshadki
	WHERE (`id_centers` = '".$id_centers."') AND (`id_uzly` = `uzly`.`id`) AND (`id_punkty` = `punkty`.`id`) ORDER BY `uzly` ASC");
	echo "<select class=\"select_box\" name='uzly_select' size='1' id='uzly' onchange=autopodbor_uzel('uzly','')>";
	$q = 0;
	while ($u = mysql_fetch_assoc($query_select_uzly))
	{		     
		 echo"<option value=".$u['id'];
		 if ((isset($_SESSION['_column_name_error']))&&($selected_ploshadki['id_uzly']==$u['id'])) {echo " SELECTED";}
		 echo">".$u['uzly']."</option>";
		 if ($q==0) {$limit_punkt_first_load = $u['id']; ++$q;}  // для конкретизации списка нас. пунктов по данному узлу, при первой загрузке add.php
	}
	echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif2\"><br>";
		   
	if (isset($_SESSION['_column_name_error'])) $id_uzly = $selected_ploshadki['id_uzly']; else $id_uzly = $limit_punkt_first_load;
	$query_select_punkty = mysql_query("SELECT DISTINCT `punkty`.`id`,`punkty` FROM spravochnik.punkty, spravochnik.ploshadki 
	WHERE (`id_uzly` = '".$id_uzly."') AND (`id_punkty` = `punkty`.`id`) ORDER BY `punkty` ASC");
	echo "<select class=\"select_box\" name='punkty_select' size='1' id='punkty' onchange=autopodbor_punkt('punkty','')>";
	$q = 0;
	while ($p = mysql_fetch_assoc($query_select_punkty))
	{		     
		 echo"<option value=".$p['id']; 
		 if ((isset($_SESSION['_column_name_error']))&&($selected_ploshadki['id_punkty']==$p['id'])) {echo " SELECTED";} 
		 echo">".$p['punkty']."</option>";
		 if ($q==0) {$limit_ploshadka_first_load = $p['id']; ++$q;}  // для конкретизации списка нас. пунктов по данному узлу, при первой загрузке add.php
		  
	} 
	echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif3\"><br>";
	
	if (isset($_SESSION['_column_name_error'])) $id_punkty = $selected_ploshadki['id_punkty']; else $id_punkty = $limit_ploshadka_first_load;
	$query_select_ploshadki = mysql_query("SELECT `ploshadki`.`id`,`ploshadki`,`type_ploshadki`.`type_ploshadki` FROM spravochnik.ploshadki, spravochnik.type_ploshadki  WHERE (`id_punkty` = '".$id_punkty."') AND (`ploshadki`.`id_type_ploshadki` = `type_ploshadki`.`id`) ORDER BY `ploshadki`.`id_type_ploshadki` ASC");
	echo "<select class=\"select_box\" name='text$k' size='1' id='ploshadki'>";
	while ($r = mysql_fetch_assoc($query_select_ploshadki))
	{		     
		 echo"<option value=".$r['id']; 
		 if ((isset($_SESSION['_column_name_error']))&&($selected_ploshadki['id']==$r['id'])) {echo " SELECTED";}
		 echo">".$r['ploshadki']."  (".$r['type_ploshadki'].")</option>"; 
	} 
	echo "</select>";
} break;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_punkty': 
case 'id_punkty_2':
{   
	if (isset($_SESSION['_column_name_error'])) // если возникла ошибка при добавлении, то здесь отрабатывается показ последнего выбора пользователя
	{
		$query_selected_punkty = mysql_query("SELECT `id_centers`,`centers`,`id_uzly`,`uzly`,`punkty`,`punkty`.`id` FROM spravochnik.punkty, spravochnik.uzly, spravochnik.centers WHERE (`punkty`.`id` = '".$_SESSION['_parametr_error'][$zn]."') AND (`punkty`.`id_uzly` = `uzly`.`id`) AND (`uzly`.`id_centers` = `centers`.`id`)");
		$selected_punkty = mysql_fetch_assoc($query_selected_punkty);
	}
	$query_select_centers = mysql_query("SELECT * FROM spravochnik.centers WHERE 1".@$_SESSION['_login_center']." ORDER BY `centers` ASC");
	echo "<select class=\"select_box\" name='centers_select' size='1' id='centers' onchange=autopodbor_ct('centers','')>";
	$q = 0;
	while ($c = mysql_fetch_assoc($query_select_centers))
	{		     
		 echo"<option value=".$c['id'];
		 if ((isset($_SESSION['_column_name_error']))&&($selected_punkty['id_centers']==$c['id'])) {echo " SELECTED";}
		 echo">".$c['centers']."</option>";
		 if ($q==0) {$limit_uzel_first_load = $c['id']; ++$q;}  // для конкретизации списка нас. пунктов по данному узлу, при первой загрузке add.php	 
	}
	echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif1\"><br>";
	
	if (isset($_SESSION['_column_name_error'])) $id_centers = $selected_punkty['id_centers']; else $id_centers = $limit_uzel_first_load;
	$query_select_uzly = mysql_query("SELECT DISTINCT `id`,`uzly` FROM spravochnik.uzly WHERE (`id_centers` = '".$id_centers."') ORDER BY `uzly` ASC");
	echo "<select class=\"select_box\" name='uzly_select' size='1' id='uzly' onchange=autopodbor_uzel('uzly','')>";
	$q = 0;
	while ($u = mysql_fetch_assoc($query_select_uzly))
	{		     
		 echo"<option value=".$u['id'];
		 if ((isset($_SESSION['_column_name_error']))&&($selected_punkty['id_uzly']==$u['id'])) {echo " SELECTED";}
		 echo">".$u['uzly']."</option>";
		 if ($q==0) {$limit_punkt_first_load = $u['id']; ++$q;}  // для конкретизации списка нас. пунктов по данному узлу, при первой загрузке add.php
	}
	echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif2\"><br>";
		   
	if (isset($_SESSION['_column_name_error'])) $id_uzly = $selected_punkty['id_uzly']; else $id_uzly = $limit_punkt_first_load;
	$query_select_punkty = mysql_query("SELECT * FROM spravochnik.punkty WHERE (`id_uzly` = '".$id_uzly."') ORDER BY `id` ASC");
	echo "<select class=\"select_box\" name='text$k' size='1' id='punkty'>";
	$q = 0;
	while ($p = mysql_fetch_assoc($query_select_punkty))
	{		     
		 echo"<option value=".$p['id']; 
		 if ((isset($_SESSION['_column_name_error']))&&($selected_punkty['id']==$p['id'])) {echo " SELECTED";} 
		 echo">".$p['punkty']."</option>";		  
	} 
	echo "</select>";
} break;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_uzly':
{   
	if (isset($_SESSION['_column_name_error'])) // если возникла ошибка при добавлении, то здесь отрабатывается показ последнего выбора пользователя
	{
		$query_selected_uzly = mysql_query("SELECT `id_centers`,`centers`,`uzly`.`id`,`uzly` FROM spravochnik.uzly, spravochnik.centers WHERE (`uzly`.`id` = '".$_SESSION['_parametr_error'][$zn]."') AND (`uzly`.`id_centers` = `centers`.`id`)");
		$selected_uzly = mysql_fetch_assoc($query_selected_uzly);
    }
	$query_select_centers = mysql_query("SELECT * FROM spravochnik.centers WHERE 1".@$_SESSION['_login_center']." ORDER BY `centers` ASC");
	echo "<select class=\"select_box\" name='centers_select' size='1' id='centers' onchange=autopodbor_ct('centers','')>";
	$q = 0;
	while ($c = mysql_fetch_assoc($query_select_centers))
	{		     
		 echo"<option value=".$c['id'];
		 if ((isset($_SESSION['_column_name_error']))&&($selected_uzly['id_centers']==$c['id'])) {echo " SELECTED";}
		 echo">".$c['centers']."</option>";
		 if ($q==0) {$limit_uzel_first_load = $c['id']; ++$q;}  // для конкретизации списка нас. пунктов по данному узлу, при первой загрузке add.php	 
	}
	echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif1\"><br>";
	
	if (isset($_SESSION['_column_name_error'])) $id_centers = $selected_uzly['id_centers']; else $id_centers = $limit_uzel_first_load;
	$query_select_uzly = mysql_query("SELECT DISTINCT `id`,`uzly` FROM spravochnik.uzly WHERE (`id_centers` = '".$limit_uzel_first_load."') ORDER BY `uzly` ASC");
	echo "<select class=\"select_box\" name='text$k' size='1' id='uzly'>";
	$q = 0;
	while ($u = mysql_fetch_assoc($query_select_uzly))
	{		     
		 echo"<option value=".$u['id'];
		 if ((isset($_SESSION['_column_name_error']))&&($selected_uzly['id']==$u['id'])) {echo " SELECTED";}
		 echo">".$u['uzly']."</option>";
	}
	echo "</select>";
} break;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_centers':
{   
	$query_select_centers = mysql_query("SELECT * FROM spravochnik.centers WHERE 1".@$_SESSION['_login_center']." ORDER BY `centers` ASC");
	echo "<select class=\"select_box\" name='text$k' size='1' id='centers' >";
	while ($c = mysql_fetch_assoc($query_select_centers))
	{		     
		 echo"<option value=".$c['id'];
		 if ((isset($_SESSION['_column_name_error']))&&($_SESSION['_parametr_error'][$zn]==$c['id'])) {echo " SELECTED";}
		 echo">".$c['centers']."</option>";
	}
	echo "</select>";
} break;

///////////////////////////ПРИМЕНЕНИЕ LABEL в SELECT/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		 
case 'id_ats_type':
case 'id_ats_type_2':
case 'id_type_korzin_cavu':
case 'id_type_stancionnyx_plat_cavu':
case 'id_type_abonentskix_plat_cavu':
case 'id_cable':
case 'id_sotrudniki':
{  
	if (strstr($zn, "_2")) $zn=substr($zn, 0, strlen($zn)-2); // убираем _2 из имени и получаем имя таблицы
	$tbl_name=substr($zn, 3, strlen($zn)-3); // убираем id_ из имени и получаем имя таблицы
	$query_select_group = mysql_query("SELECT DISTINCT `group` FROM `spravochnik`.`".$tbl_name."` ORDER BY `group` ASC");
	echo "<select class=\"select_box\" name='text$k' size='1'>";
	while ($r = mysql_fetch_assoc($query_select_group))
	{   
	   echo "<optgroup label=".$r['group'].">";
	   $query_select = mysql_query("SELECT `id`,`".$tbl_name."` FROM `spravochnik`.`".$tbl_name."` WHERE (`group`='".$r['group']."') ORDER BY ".$tbl_name." ASC");
	   while ($s = mysql_fetch_assoc($query_select))
	   {   
			echo"<option value=".$s['id'];
		    if ((isset($_SESSION['_column_name_error']))&&($_SESSION['_parametr_error'][$zn]==$s['id'])) {echo " SELECTED";}
		    echo">".$s[$tbl_name]."</option>";
	   }
	   echo"</optgroup>";
	}
	echo "</select>";
} break;	 	 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_ats':
case 'id_ats_2':
{  
	if (($zn == "id_ats_2")&&(@strstr($login_center['center'], "3"))) {$login_cntr = "";} else {$login_cntr = @$_SESSION['_login_center'];}
	$query_ats = mysql_query("SELECT `ats`.`id`,`centers`,`uzly`,`punkty`,`ploshadki`,`id_type_ploshadki`,`type_ploshadki`,`company`,`ats_type`,`index_ats` 
	FROM `spravochnik`.`ploshadki`, `spravochnik`.`centers`, `spravochnik`.`uzly`,`spravochnik`.`punkty`, `spravochnik`.`ats_type`, `techuchet`.`ats`,`spravochnik`.`company`,`spravochnik`.`type_ploshadki` 
	WHERE (`centers`.`id` = `uzly`.`id_centers`) AND (`uzly`.`id` = `punkty`.`id_uzly`) AND (`punkty`.`id` = `ploshadki`.`id_punkty`) AND (`type_ploshadki`.`id` = `ploshadki`.`id_type_ploshadki`) 
	AND (`ploshadki`.`id` = `ats`.`id_ploshadki`) AND (`ats_type`.`id` = `ats`.`id_ats_type`) AND (`company`.`id` = `ats`.`id_company`)".@$login_cntr."
	ORDER BY `centers`,`uzly`,`id_type_ploshadki`,`company`,`punkty`,`index_ats` ASC") or die($error_message_on_query.mysql_error());
	echo "<select class=\"select_box\" name='text$k' size='1'>";
	$label = "";
	while ($r = mysql_fetch_assoc($query_ats))
	{   
	   if (($label != $r['centers']."  ".$r['uzly'])&&($label != "")) echo"</optgroup>";
	   if ($label != $r['centers']."  ".$r['uzly']) echo "<optgroup label=\"".$r['centers']."  ".$r['uzly']."\">";
	   echo"<option value=".$r['id'];
	   if ((isset($_SESSION['_column_name_error']))&&($_SESSION['_parametr_error'][$zn]==$r['id'])) {echo " SELECTED";}
	   if (($r['id_type_ploshadki'] == "1")||($r['id_type_ploshadki'] == "4")||($r['id_type_ploshadki'] == "2")) 
	   {
	       echo">".$r['index_ats']."  ".$r['ats_type']."  (".$r['punkty'].", ".$r['ploshadki'].")</option>"; 
	   }
	   else {echo">".$r['type_ploshadki']." ".$r['company']." ".$r['index_ats']." ".$r['ats_type']."(".$r['punkty'].")</option>";}
	   $label = $r['centers']."  ".$r['uzly'];
	}
	echo"</optgroup>";
	echo "</select>";
} break;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_cavu_ats':
{   
		// http_request ПОИСК ЦАВУ данного населенного пункта	
		echo "<input type='text' name='search' id='".$zn."' value='Поиск по нас. пункту' SIZE=20 onfocus='this.select();' >"; 
		echo "<input type='button' name='button_search' value='Найти' onClick=autopodbor_search('$zn','text$k')><br>";
		echo "<select class=\"select_box\" name='text$k' id='text$k' size='1'>";
		echo "</select>";
} break;


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_taxophones':
{   
	    if (isset($_SESSION['_column_name_error'])) // если возникла ошибка при добавлении, то здесь отрабатывается показ последнего выбора пользователя
	    {
		    $query_tax = mysql_query("SELECT `taxophones`.`id`,`punkty`,`ploshadki`,`taxophones`.`phone_number`
			FROM `spravochnik`.`ploshadki`, `spravochnik`.`centers`, `spravochnik`.`uzly`, `spravochnik`.`punkty`, `techuchet`.`taxophones`  
			WHERE (`centers`.`id` = `uzly`.`id_centers`) AND (`uzly`.`id` = `punkty`.`id_uzly`) AND (`punkty`.`id` = `ploshadki`.`id_punkty`) AND (`ploshadki`.`id` = `taxophones`.`id_ploshadki_2`) 
			AND (`taxophones`.`id` = '".$_SESSION['_parametr_error'][$zn]."')".@$_SESSION['_login_center']) or die($error_message_on_query.mysql_error());
	        $p = mysql_fetch_assoc($query_tax);
		}
		// http_request ПОИСК таксофонов данного района	
		echo "<input type='text' name='search' id='".$zn."' value='Поиск по району' SIZE=20 onfocus='this.select();' >"; 
		echo "<input type='button' name='button_search' value='Найти' onClick=autopodbor_search('$zn','text$k')><br>";
		echo "<select class=\"select_box\" name='text$k' id='text$k' size='1'>";   
		if (isset($_SESSION['_column_name_error'])) echo"<option value=".$p['id'].">".$p['punkty'].", ".$p['ploshadki']." (№".$p['phone_number'].")</option>"; 		   
		echo "</select>";
} break;


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_company':
{   
		if (isset($_SESSION['_column_name_error'])) // если возникла ошибка при добавлении, то здесь отрабатывается показ последнего выбора пользователя
	    {
		    $query_company = mysql_query("SELECT * FROM `spravochnik`.`company` WHERE (`id` = '".$_SESSION['_parametr_error'][$zn]."') ORDER BY `company` ASC")or die($error_message_on_query.mysql_error());
	        $r = mysql_fetch_assoc($query_company);
		}
		// http_request ПОИСК таксофонов данного района	
		echo "<input type='text' name='search' id='".$zn."' value='Поиск организации' SIZE=20 onfocus='this.select();' >"; 
		echo "<input type='button' name='button_search' value='Найти' onClick=autopodbor_search('$zn','text$k')><br>";
		echo "<select class=\"select_box\" name='text$k' id='text$k' size='1'>";
		if (isset($_SESSION['_column_name_error'])) echo"<option value=".$r['id'].">".$r['company']."</option>"; 
		echo "</select>";
} break;


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_type_otkazy_uslugi':
{   	
	if (isset($_SESSION['_column_name_error'])) // если возникла ошибка при добавлении, то здесь отрабатывается показ последнего выбора пользователя
	{
		$query_otkazy = mysql_query("SELECT * FROM spravochnik.type_otkazy_uslugi WHERE (`id` = ".$_SESSION['_parametr_error'][$zn].") ORDER BY `group`,`type_otkazy_uslugi` ASC")or die($error_message_on_query.mysql_error());
		$selected_otkazy = mysql_fetch_assoc($query_otkazy);
	}
	$query_otkazy = mysql_query("SELECT DISTINCT `group` FROM spravochnik.type_otkazy_uslugi ORDER BY `group`,`type_otkazy_uslugi` ASC")or die($error_message_on_query.mysql_error());
	echo "<div class=\"text\">Технология доступа:</div><select class=\"select_box\" name='group_otkazy' size='1' id='group_otkazy' onchange=autopodbor_otkazy('group_otkazy','')>";
	$i = 0;
	while ($q = mysql_fetch_assoc($query_otkazy))
	{		     
		 echo"<option value=".$q['group'];
		 if ((isset($_SESSION['_column_name_error']))&&($selected_otkazy['group']==$q['group'])) {echo " SELECTED";}
		 echo">".$q['group']."</option>"; 
		 if ($i==0) {$otkazy_first_load = $q['group']; ++$i;}  // для конкретизации списка отказов по данной технологии доступа, при первой загрузке add.php	 
	}
	echo "</select><br><br>";
	
	if (isset($_SESSION['_column_name_error'])) $group = $selected_otkazy['group']; else $group = $otkazy_first_load;
	$query_otkazy = mysql_query("SELECT `id`, `type_otkazy_uslugi` FROM spravochnik.type_otkazy_uslugi WHERE (`group` = '".$group."') ORDER BY `type_otkazy_uslugi` ASC")or die($error_message_on_query.mysql_error());
	echo "<select class=\"select_box\" name='text$k' size='1' id='otkazy_uslugi'>";
	while ($q = mysql_fetch_assoc($query_otkazy))
	{		     
		 echo"<option value=".$q['id'];
		 if ((isset($_SESSION['_column_name_error']))&&($_SESSION['_parametr_error'][$zn]==$q['id'])) {echo " SELECTED";}
		 echo">".$q['type_otkazy_uslugi']."</option>"; 	 
	}
	echo "</select>";
} break;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 		 

case 'id_lzk_group3':
{   
	if (isset($_SESSION['_column_name_error'])) // если возникла ошибка при добавлении, то здесь отрабатывается показ последнего выбора пользователя
	{
		$query_selected = mysql_query("SELECT `id_lzk_group1`,`lzk_group1`,`id_lzk_group2`,`lzk_group2`,`lzk_group3`.`id`,`lzk_group3` FROM spravochnik.lzk_group1, spravochnik.lzk_group2, spravochnik.lzk_group3 WHERE (`lzk_group3`.`id` = '".$_SESSION['_parametr_error'][$zn]."') AND (`lzk_group3`.`id_lzk_group2` = `lzk_group2`.`id`) AND (`lzk_group2`.`id_lzk_group1` = `lzk_group1`.`id`)".@$_SESSION['_login_center'])or die($error_message_on_query.mysql_error());
	    $selected = mysql_fetch_assoc($query_selected);
    }
	$query_select_group1 = mysql_query("SELECT DISTINCT `lzk_group1`.`id`,`lzk_group1` FROM spravochnik.lzk_group1 
	WHERE 1".@$_SESSION['_login_center']." ORDER BY `lzk_group1` ASC");
	echo "<select class=\"select_box\" name='lzk_group1_select' size='1' id='lzk_group1' onchange=autopodbor_lzk_group1('lzk_group1','')>";
	$q = 0;
	while ($c = mysql_fetch_assoc($query_select_group1))
	{		     
		 echo"<option value=".$c['id'];
		 if ((isset($_SESSION['_column_name_error']))&&($selected['id_lzk_group1']==$c['id'])) {echo " SELECTED";}
		 echo">".$c['lzk_group1']."</option>";
		 if ($q==0) {$limit_group1_first_load = $c['id']; ++$q;}  // для конкретизации списка группы2 по данным группам1, при первой загрузке add.php	 
	}
	echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif5\"><br>";
	
	if (isset($_SESSION['_column_name_error'])) $id_lzk_group1 = $selected['id_lzk_group1']; else $id_lzk_group1 = $limit_group1_first_load;
	$query_select_group2 = mysql_query("SELECT DISTINCT `lzk_group2`.`id`,`lzk_group2` FROM spravochnik.lzk_group2, spravochnik.lzk_group3
	WHERE (`id_lzk_group1` = '".$id_lzk_group1."') AND (`id_lzk_group2` = `lzk_group2`.`id`) ORDER BY `lzk_group2` ASC");
	echo "<select class=\"select_box\" name='lzk_group2_select' size='1' id='lzk_group2' onchange=autopodbor_lzk_group2('lzk_group2','')>";
	$q = 0;
	while ($u = mysql_fetch_assoc($query_select_group2))
	{		     
		 echo"<option value=".$u['id'];
		 if ((isset($_SESSION['_column_name_error']))&&($selected['id_lzk_group2']==$u['id'])) {echo " SELECTED";}
		 echo">".$u['lzk_group2']."</option>";
		 if ($q==0) {$limit_group2_first_load = $u['id']; ++$q;}   // для конкретизации списка группы3 по данным группам2, при первой загрузке add.php	 
	}
	echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif6\"><br>";
		   
	if (isset($_SESSION['_column_name_error'])) $id_lzk_group2 = $selected['id_lzk_group2']; else $id_lzk_group2 = $limit_group2_first_load;
	$query_select_lzk_group3 = mysql_query("SELECT DISTINCT `lzk_group3`.`id`,`lzk_group3` FROM spravochnik.lzk_group3 
	WHERE (`id_lzk_group2` = '".$id_lzk_group2."') ORDER BY `lzk_group3` ASC");
	echo "<select class=\"select_box\" name='text$k' size='1' id='lzk_group3'>";
	$q = 0;
	while ($p = mysql_fetch_assoc($query_select_lzk_group3))
	{		     
		 echo"<option value=".$p['id']; 
		 if ((isset($_SESSION['_column_name_error']))&&($selected['id']==$p['id'])) {echo " SELECTED";} 
		 echo">".$p['lzk_group3']."</option>";		  
	} 
	echo "</select>";
} break;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



default:
{
    $tbl_name=substr($zn, 3, strlen($zn)-3); // убираем id_ из имени и получаем имя таблицы
	$query_select = mysql_query("SELECT * FROM `spravochnik`.`".$tbl_name."` ORDER BY `".$tbl_name."` ASC") or die($error_message_on_query.mysql_error());
	echo "<select class=\"select_box\" name='text$k' size='1'>";
	while ($r = mysql_fetch_assoc($query_select))
	{		     
		echo"<option value=".$r['id'];
	    if ((isset($_SESSION['_column_name_error']))&&($_SESSION['_parametr_error'][$zn]==$r['id'])) {echo " SELECTED";}
	    echo">".$r[$tbl_name]."</option>"; 
	} 
	echo "</select>";
}
	     
}		
?>