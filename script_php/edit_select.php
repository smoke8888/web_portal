<?php
switch ($ind)
{
case 'id_ploshadki':
case 'id_ploshadki_2':
{   
   $query_selected_ploshadki = mysql_query("SELECT `id_centers`,`centers`,`id_uzly`,`uzly`,`id_punkty`,`punkty`,`ploshadki`.`id`,`ploshadki` FROM spravochnik.ploshadki, spravochnik.punkty, spravochnik.uzly,spravochnik.centers WHERE (`ploshadki`.`id` = '".$edit_array[$ind]."') AND (`ploshadki`.`id_punkty` = `punkty`.`id`) AND (`punkty`.`id_uzly` = `uzly`.`id`) AND (`uzly`.`id_centers` = `centers`.`id`)".@$_SESSION['_login_center'])or die($error_message_on_query.mysql_error());
   $selected_ploshadki = mysql_fetch_assoc($query_selected_ploshadki);
   if (@$no_editable == true) // если у пользователя нет прав на редактирование плошадок
   {
         echo"<div class=\"no_edit\">".$selected_ploshadki['centers'].", ".$selected_ploshadki['uzly'].", ".$selected_ploshadki['punkty'].", ".$selected_ploshadki['ploshadki']."</div>";
   }
   else // если у пользователя есть права на редактирование плошадок
   {
	   $query_select_centers = mysql_query("SELECT DISTINCT `centers`.`id`,`centers` FROM spravochnik.centers, spravochnik.uzly, spravochnik.punkty, spravochnik.ploshadki 
	   WHERE (`id_centers` = `centers`.`id`) AND (`id_uzly` = `uzly`.`id`) AND (`id_punkty` = `punkty`.`id`)".@$_SESSION['_login_center']." ORDER BY `centers` ASC");
	   echo "<select class=\"select_box\" name='centers_select' size='1' id='centers' onchange=autopodbor_ct('centers','')>";
	   while ($r = mysql_fetch_assoc($query_select_centers))
	   {		     
			 echo"<option value=".$r['id']; 
			 if ($selected_ploshadki['id_centers']==$r['id']) {echo " SELECTED";}
			 echo">".$r['centers']."</option>"; 
	   }
	   echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif1\"><br>";
	   
	   $query_select_uzly = mysql_query("SELECT DISTINCT `uzly`.`id`, `uzly` FROM spravochnik.uzly, spravochnik.punkty, spravochnik.ploshadki
	   WHERE (`uzly`.`id_centers` = '".$selected_ploshadki['id_centers']."') AND (`id_uzly` = `uzly`.`id`) AND (`id_punkty` = `punkty`.`id`) ORDER BY `uzly` ASC");
	   echo "<select class=\"select_box\" name='uzly_select' size='1' id='uzly' onchange=autopodbor_uzel('uzly','')>";
	   while ($r = mysql_fetch_assoc($query_select_uzly))
	   {		     
			 echo"<option value=".$r['id']; 
			 if ($selected_ploshadki['id_uzly']==$r['id']) {echo " SELECTED";}
			 echo">".$r['uzly']."</option>"; 
	   }
	   echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif2\"><br>";
			   
	   $query_select_punkty = mysql_query("SELECT DISTINCT `punkty`.`id`,`punkty` FROM spravochnik.punkty, spravochnik.ploshadki 
	   WHERE (`id_uzly` = '".$selected_ploshadki['id_uzly']."') AND (`id_punkty` = `punkty`.`id`) ORDER BY `punkty` ASC");
	   echo "<select class=\"select_box\" name='punkty_select' size='1' id='punkty' onchange=autopodbor_punkt('punkty','')>";
	   while ($r = mysql_fetch_assoc($query_select_punkty))
	   {		     
			 echo"<option value=".$r['id']; 
			 if ($selected_ploshadki['id_punkty']==$r['id']) {echo " SELECTED";} 
			 echo">".$r['punkty']."</option>"; 
	   } 
	   echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif3\"><br>";
	
	   $query_select_ploshadki = mysql_query("SELECT `ploshadki`.`id`,`ploshadki`,`type_ploshadki`.`type_ploshadki` FROM spravochnik.ploshadki, spravochnik.type_ploshadki  WHERE (`id_punkty` = '".$selected_ploshadki['id_punkty']."') AND (`ploshadki`.`id_type_ploshadki` = `type_ploshadki`.`id`) ORDER BY `ploshadki`.`id_type_ploshadki` ASC");
	   echo "<select class=\"select_box\" name='text$k' size='1' id='ploshadki'>";
	   while ($r = mysql_fetch_assoc($query_select_ploshadki))
	   {		     
			 echo"<option value=".$r['id']; 
			 if ($selected_ploshadki['id']==$r['id']) {echo " SELECTED";}
			 echo">".$r['ploshadki']."  (".$r['type_ploshadki'].")</option>"; 
	   } 
	   echo "</select>";
   }		   
} break;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_punkty': 
case 'id_punkty_2': 
{  
   $query_selected_punkty = mysql_query("SELECT `id_centers`,`centers`,`id_uzly`,`uzly`,`punkty`,`punkty`.`id` FROM spravochnik.punkty, spravochnik.uzly, spravochnik.centers WHERE (`punkty`.`id` = '".$edit_array[$ind]."') AND (`punkty`.`id_uzly` = `uzly`.`id`) AND (`uzly`.`id_centers` = `centers`.`id`)");
   $selected_punkty = mysql_fetch_assoc($query_selected_punkty);
   if (@$no_editable == true) // если у пользователя нет прав на редактирование 
   {
         echo"<div class=\"no_edit\">".$selected_punkty['centers'].", ".$selected_punkty['uzly'].", ".$selected_punkty['punkty']."</div>";
   }
   else // если у пользователя есть права на редактирование
   {
	   $query_select_centers = mysql_query("SELECT * FROM spravochnik.centers WHERE 1".@$_SESSION['_login_center']." ORDER BY `centers` ASC");
	   echo "<select class=\"select_box\" name='centers_select' size='1' id='centers' onchange=autopodbor_ct('centers','')>";
	   while ($r = mysql_fetch_assoc($query_select_centers))
	   {		     
			 echo"<option value=".$r['id']; 
			 if ($selected_punkty['id_centers']==$r['id']) {echo " SELECTED";}
			 echo">".$r['centers']."</option>"; 
	   }
	   echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif1\"><br>";
	   
	   $query_select_uzly = mysql_query("SELECT DISTINCT `uzly`.`id`,`uzly`.`uzly` FROM spravochnik.uzly WHERE (`uzly`.`id_centers` = '".$selected_punkty['id_centers']."') ORDER BY `uzly`.`uzly` ASC");
	   echo "<select class=\"select_box\" name='uzly_select' size='1' id='uzly' onchange=autopodbor_uzel('uzly','')>";
	   while ($r = mysql_fetch_assoc($query_select_uzly))
	   {		     
			 echo"<option value=".$r['id']; 
			 if ($selected_punkty['id_uzly']==$r['id']) {echo " SELECTED";}
			 echo">".$r['uzly']."</option>"; 
	   }
	   echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif2\"><br>";
			   
	   $query_select_punkty = mysql_query("SELECT * FROM spravochnik.punkty WHERE `id_uzly` = '".$selected_punkty['id_uzly']."' ORDER BY `id` ASC");
	   echo "<select class=\"select_box\" name='text$k' size='1' id='punkty'>";
	   while ($r = mysql_fetch_assoc($query_select_punkty))
	   {		     
			 echo"<option value=".$r['id']; 
			 if ($selected_punkty['id']==$r['id']) {echo " SELECTED";}
			 echo">".$r['punkty']."</option>"; 
	   } 
	   echo "</select>";
   }		   
} break;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_uzly':
{  
   $query_selected_uzly = mysql_query("SELECT `id_centers`,`centers`,`uzly`.`id`,`uzly` FROM spravochnik.uzly, spravochnik.centers WHERE (`uzly`.`id` = '".$edit_array[$ind]."') AND (`uzly`.`id_centers` = `centers`.`id`)");
   $selected_uzly = mysql_fetch_assoc($query_selected_uzly);
   if (@$no_editable == true) // если у пользователя нет прав на редактирование 
   {
         echo"<div class=\"no_edit\">".$selected_uzly['centers'].", ".$selected_uzly['uzly']."</div>";
   }
   else // если у пользователя есть права на редактирование
   {
	   $query_select_centers = mysql_query("SELECT * FROM spravochnik.centers WHERE 1".@$_SESSION['_login_center']." ORDER BY `centers` ASC");
	   echo "<select class=\"select_box\" name='centers_select' size='1' id='centers' onchange=autopodbor_ct('centers','')>";
	   while ($r = mysql_fetch_assoc($query_select_centers))
	   {		     
			 echo"<option value=".$r['id']; 
			 if ($selected_uzly['id_centers']==$r['id']) {echo " SELECTED";}
			 echo">".$r['centers']."</option>"; 
	   }
	   echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif1\"><br>";
	   
	   $query_select_uzly = mysql_query("SELECT DISTINCT `uzly`.`id`,`uzly`.`uzly` FROM spravochnik.uzly WHERE (`uzly`.`id_centers` = '".$selected_uzly['id_centers']."') ORDER BY `uzly`.`uzly` ASC");
	   echo "<select class=\"select_box\" name='text$k' size='1' id='uzly'>";
	   while ($r = mysql_fetch_assoc($query_select_uzly))
	   {		     
			 echo"<option value=".$r['id']; 
			 if ($selected_uzly['id']==$r['id']) {echo " SELECTED";}
			 echo">".$r['uzly']."</option>"; 
	   }
	   echo "</select>";
			   
   }		   
} break;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_centers':
{  
   $query_select_centers = mysql_query("SELECT * FROM spravochnik.centers WHERE 1".@$_SESSION['_login_center']." ORDER BY `centers` ASC");
   $c = mysql_fetch_assoc($query_select_centers);
   if (@$no_editable == true) // если у пользователя нет прав на редактирование 
   {
         echo"<div class=\"no_edit\">".$c['centers']."</div>";
   }
   else // если у пользователя есть права на редактирование
   {
	   mysql_data_seek($query_select_centers,0);
	   echo "<select class=\"select_box\" name='text$k' size='1' id='centers' onchange=autopodbor_ct('centers','')>";
	   while ($c = mysql_fetch_assoc($query_select_centers))
	   {		     
			 echo"<option value=".$c['id']; 
			 if ($zn==$c['id']) {echo " SELECTED";}
			 echo">".$c['centers']."</option>"; 
	   }
	   echo "</select>";
   }		   
} break;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	 
case 'id_ats_type':
case 'id_ats_type_2':
case 'id_type_korzin_cavu':
case 'id_type_stancionnyx_plat_cavu':
case 'id_type_abonentskix_plat_cavu':
case 'id_cable':
case 'id_sotrudniki':
{  
   $index = $ind;
   if (strstr($ind, "_2")) $index=substr($ind, 0, strlen($ind)-2); // убираем _2 из имени и получаем имя таблицы
   $tbl_name=substr($index, 3, strlen($index)-3); //убираем id_ из имени и получаем имя таблицы
   if (@$no_editable == true) // если у пользователя нет прав на редактирование плошадок
   {
		$query_select = mysql_query("SELECT `".$tbl_name."` FROM `spravochnik`.`".$tbl_name."` WHERE (`id` = '".$zn."')");
		$s = mysql_fetch_assoc($query_select);
		echo"<div class=\"no_edit\">".$s[$tbl_name]."</div>";
   } 
   else // если у пользователя есть права на редактирование плошадок
   {  
	   $query_select_group = mysql_query("SELECT DISTINCT `group` FROM `spravochnik`.`".$tbl_name."` ORDER BY `group` ASC");
	   echo "<select class=\"select_box\" name='text$k' size='1'>";
	   while ($r = mysql_fetch_assoc($query_select_group))
	   {   
			echo "<optgroup label=".$r['group'].">";
			$query_select = mysql_query("SELECT `id`,`".$tbl_name."` FROM `spravochnik`.`".$tbl_name."` WHERE (`group`='".$r['group']."') ORDER BY `".$tbl_name."` ASC");
			while ($s = mysql_fetch_assoc($query_select))
			{   
				 echo"<option value=".$s['id']; if ($zn==$s['id']) {echo " SELECTED";} echo">".$s[$tbl_name]."</option>";
			}
			echo"</optgroup>";
	   }
	   echo "</select>";
   }
} break;		 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_ats':
case 'id_ats_2':
{  
	if (@$no_editable == true) // если у пользователя нет прав на редактирование 
    {
		$query_ats = mysql_query("SELECT `ats`.`id`, `centers`,`uzly`,`punkty`,`ploshadki`,`id_type_ploshadki`,`type_ploshadki`,`company`,`ats_type`,`index_ats` 
		FROM `spravochnik`.`ploshadki`, `spravochnik`.`centers`, `spravochnik`.`uzly`, `spravochnik`.`punkty`, `spravochnik`.`ats_type`, `techuchet`.`ats`,`spravochnik`.`company`,`spravochnik`.`type_ploshadki` 
		WHERE (`centers`.`id` = `uzly`.`id_centers`) AND (`uzly`.`id` = `punkty`.`id_uzly`) AND (`punkty`.`id` = `ploshadki`.`id_punkty`) AND (`type_ploshadki`.`id` = `ploshadki`.`id_type_ploshadki`)  
		AND (`ploshadki`.`id` = `ats`.`id_ploshadki`) AND (`ats_type`.`id` = `ats`.`id_ats_type`) AND (`ats`.`id` = '".$zn."') AND (`company`.`id` = `ats`.`id_company`)".@$_SESSION['_login_center']) 
		or die($error_message_on_query.mysql_error());
		$r = mysql_fetch_assoc($query_ats);
		if (($r['id_type_ploshadki'] == "1")||($r['id_type_ploshadki'] == "4")||($r['id_type_ploshadki'] == "2")) 
		{
		    echo"<div class=\"no_edit\">".$r['index_ats']."  ".$r['ats_type']."  (".$r['punkty'].", ".$r['ploshadki'].")</div>";
	        }
	        else {echo"<div class=\"no_edit\">".$r['type_ploshadki']." ".$r['company']."  ".$r['ats_type']."  (".$r['punkty'].")</option>";}
    }
	else
	{       if (($ind == "id_ats_2")&&(strstr($login_center['center'], "3"))) {$login_cntr = "";} else {$login_cntr = @$_SESSION['_login_center'];}
		$query_ats = mysql_query("SELECT `ats`.`id`, `centers`,`uzly`,`punkty`,`ploshadki`,`id_type_ploshadki`,`type_ploshadki`,`company`,`ats_type`,`index_ats` 
		FROM `spravochnik`.`ploshadki`, `spravochnik`.`centers`, `spravochnik`.`uzly`, `spravochnik`.`punkty`, `spravochnik`.`ats_type`, `techuchet`.`ats`,`spravochnik`.`company`,`spravochnik`.`type_ploshadki` 
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
		   if ($zn==$r['id']) {echo " SELECTED";}
		   if (($r['id_type_ploshadki'] == "1")||($r['id_type_ploshadki'] == "4")||($r['id_type_ploshadki'] == "2")) 
	           {
	               echo">".$r['index_ats']."  ".$r['ats_type']."  (".$r['punkty'].", ".$r['ploshadki'].")</option>"; 
	           }
	           else {echo">".$r['type_ploshadki']." ".$r['company']." ".$r['index_ats']." ".$r['ats_type']."(".$r['punkty'].")</option>";} 
		   
		   $label = $r['centers']."  ".$r['uzly'];
		}
		echo"</optgroup>";
		echo "</select>";
	}
} break;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_cavu_ats':
{   // определяем все данные для конкретно выбранной ЦАВУ
	$query_cavu = mysql_query("SELECT `cavu_ats`.`id`, `type_korzin_cavu`, `type_stancionnyx_plat_cavu`, `centers`,`uzly`,`punkty`,`ploshadki`,`index_ats` 
	FROM `spravochnik`.`ploshadki`, `spravochnik`.`centers`, `spravochnik`.`uzly`, `spravochnik`.`punkty`, `techuchet`.`ats`, `techuchet`.`cavu_ats`, 
	`spravochnik`.`type_korzin_cavu`, `spravochnik`.`type_stancionnyx_plat_cavu`  
	WHERE (`centers`.`id` = `uzly`.`id_centers`) AND (`uzly`.`id` = `punkty`.`id_uzly`) AND (`punkty`.`id` = `ploshadki`.`id_punkty`) AND (`ploshadki`.`id` = `ats`.`id_ploshadki`) 
	AND (`ats`.`id` = `cavu_ats`.`id_ats`) AND (`type_korzin_cavu`.`id` = `cavu_ats`.`id_type_korzin_cavu`) 
	AND (`type_stancionnyx_plat_cavu`.`id` = `cavu_ats`.`id_type_stancionnyx_plat_cavu`) AND (`cavu_ats`.`id` = '".$zn."')".@$_SESSION['_login_center']);
	$r = mysql_fetch_assoc($query_cavu);
	if (@$no_editable == true) // если у пользователя нет прав на редактирование 
    {
		echo"<div class=\"no_edit\">".$r['centers'].", ".$r['uzly'].", ".$r['punkty'].", ".$r['ploshadki'].", ".$r['index_ats']."</div>
		<div class=\"no_edit\">".$r['type_stancionnyx_plat_cavu']."  (корзина ".$r['type_korzin_cavu'].")</div>";
    }
	else // если у пользователя есть права на редактирование 
	{	// запрашиваем список ЦАВУ для данного населенного пункта данного района
		$query_select_punkty = mysql_query("SELECT `cavu_ats`.`id`, `zavod_number_cavu_ats`, `type_korzin_cavu`, `type_stancionnyx_plat_cavu`, `punkty`,`ploshadki`,`index_ats` 
		FROM `spravochnik`.`ploshadki`, `spravochnik`.`centers`, `spravochnik`.`uzly`, `spravochnik`.`punkty`, `techuchet`.`ats`, `techuchet`.`cavu_ats`, 
		`spravochnik`.`type_korzin_cavu`, `spravochnik`.`type_stancionnyx_plat_cavu`  
		WHERE (`centers`.`id` = `uzly`.`id_centers`) AND (`uzly`.`id` = `punkty`.`id_uzly`) AND (`punkty`.`id` = `ploshadki`.`id_punkty`) AND (`ploshadki`.`id` = `ats`.`id_ploshadki`) 
		AND (`ats`.`id` = `cavu_ats`.`id_ats`) AND (`type_korzin_cavu`.`id` = `cavu_ats`.`id_type_korzin_cavu`) 
		AND (`type_stancionnyx_plat_cavu`.`id` = `cavu_ats`.`id_type_stancionnyx_plat_cavu`) AND (`uzly` = '".$r['uzly']."') AND (`punkty` = '".$r['punkty']."')".@$_SESSION['_login_center']."
		ORDER BY `punkty`,`ploshadki`,`index_ats`,`type_stancionnyx_plat_cavu` ASC");

		// http_request ПОИСК ЦАВУ данного населенного пункта	
		echo "<input type='text' name='search' id='".$ind."' value='Поиск по нас. пункту' SIZE=20 onfocus='this.select();' >"; 
		echo "<input type='button' name='button_search' value='Найти' onClick=autopodbor_search('$ind','text$k')><br>";
		echo "<select class=\"select_box\" name='text$k' id='text$k' size='1'>";
		
		$label = "";
		while ($p = mysql_fetch_assoc($query_select_punkty))
		{   
		   $string = $p['punkty'].", ".$p['ploshadki'].", ".$p['index_ats'];
		   if (($label != $string)&&($label != "")) echo"</optgroup>";
		   if ($label != $string)  echo "<optgroup label=\"". $string."\">";
		   echo"<option value=".$p['id'];
		   if ($zn==$p['id']) {echo " SELECTED";}
		   echo ">".$p['type_stancionnyx_plat_cavu']." / зав.№".$p['zavod_number_cavu_ats']." / корзина ".$p['type_korzin_cavu']."</option>"; 		   
		   $label = $string;
		}
		echo"</optgroup>";
		echo "</select>";
	}
} break;


////////////////////////////// закоментирован код в целях запрета изменения таксофона в журнале повреждений УУ //////////////////////////////////////////////////////////////////
case 'id_taxophones':
{   // определяем все данные для конкретно выбранного таксофона
	$query_tax = mysql_query("SELECT `taxophones`.`id`, `centers`,`uzly`,`punkty`,`ploshadki`,`taxophones`.`phone_number`
	FROM `spravochnik`.`ploshadki`, `spravochnik`.`centers`, `spravochnik`.`uzly`, `spravochnik`.`punkty`, `techuchet`.`taxophones`  
	WHERE (`centers`.`id` = `uzly`.`id_centers`) AND (`uzly`.`id` = `punkty`.`id_uzly`) AND (`punkty`.`id` = `ploshadki`.`id_punkty`) AND (`ploshadki`.`id` = `taxophones`.`id_ploshadki_2`) 
	AND (`taxophones`.`id` = '".$zn."')".@$_SESSION['_login_center']) or die($error_message_on_query.mysql_error());
	$r = mysql_fetch_assoc($query_tax);
	if (@$no_editable == true) // если у пользователя нет прав на редактирование 
    {
		echo"<div class=\"no_edit\">".$r['centers'].", ".$r['uzly'].", ".$r['punkty'].", ".$r['ploshadki']." (№".$r['phone_number'].")</div>";
    }
	else // если у пользователя есть права на редактирование 
	{	// запрашиваем список таксофонов для данного населенного пункта данного района
		$query_tax = mysql_query("SELECT `taxophones`.`id`, `centers`,`uzly`,`punkty`,`ploshadki`, `taxophones`.`phone_number`
		FROM `spravochnik`.`ploshadki`, `spravochnik`.`centers`, `spravochnik`.`uzly`, `spravochnik`.`punkty`, `techuchet`.`taxophones`   
		WHERE (`centers`.`id` = `uzly`.`id_centers`) AND (`uzly`.`id` = `punkty`.`id_uzly`) AND (`punkty`.`id` = `ploshadki`.`id_punkty`)  
		AND (`ploshadki`.`id` = `taxophones`.`id_ploshadki_2`) AND (`uzly` = '".$r['uzly']."') AND (`taxophones`.`id_type_taxophone_prinad` = 2)".@$_SESSION['_login_center']."
		ORDER BY `centers`,`uzly`,`punkty`,`ploshadki` ASC")or die($error_message_on_query.mysql_error());

		// http_request ПОИСК таксофонов данного населенного пункта	 
		echo "<input type='text' name='search' id='".$ind."' value='Поиск по району' SIZE=20 onfocus='this.select();' >"; 
		echo "<input type='button' name='button_search' value='Найти' onClick=autopodbor_search('$ind','text$k')><br>";
		echo "<select class=\"select_box\" name='text$k' id='text$k' size='1'>";
		
		$label = "";
		while ($p = mysql_fetch_assoc($query_tax))
		{   
		   $string = $p['centers'].", ".$p['uzly'];
		   if (($label != $string)&&($label != "")) echo"</optgroup>";
		   if ($label != $string)  echo "<optgroup label=\"". $string."\">";
		   echo"<option value=".$p['id'];
		   if ($zn==$p['id']) {echo " SELECTED";}
		   echo ">".$p['punkty'].", ".$p['ploshadki']." (№".$p['phone_number'].")</option>"; 		   
		   $label = $string;
		}
		echo"</optgroup>";
		echo "</select>";
	}
} break;


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_company':
{   
	$query_company = mysql_query("SELECT * FROM `spravochnik`.`company` WHERE (`id` = '".$zn."') ORDER BY `company` ASC")or die($error_message_on_query.mysql_error());
	if (@$no_editable == true) // если у пользователя нет прав на редактирование 
    {
		$r = mysql_fetch_assoc($query_company);
		echo"<div class=\"no_edit\">".$r['company']."</div>";
    }
	else // если у пользователя есть права на редактирование 
	{
		// http_request ПОИСК таксофонов данного района	
		echo "<input type='text' name='search' id='".$ind."' value='Поиск организации' SIZE=20 onfocus='this.select();' >"; 
		echo "<input type='button' name='button_search' value='Найти' onClick=autopodbor_search('$ind','text$k')><br>";
		echo "<select class=\"select_box\" name='text$k' id='text$k' size='1'>";
		while ($r = mysql_fetch_assoc($query_company))
		{		     
			echo"<option value=".$r['id']; 
			if ($zn==$r['id']) {echo " SELECTED";}
			echo">".$r['company']."</option>"; 
		}
		echo "</select>";
	}
} break;


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
case 'id_type_otkazy_uslugi':
{   	
	$query_otkazy = mysql_query("SELECT * FROM spravochnik.type_otkazy_uslugi WHERE (`id` = ".$zn.") ORDER BY `group`,`type_otkazy_uslugi` ASC")or die($error_message_on_query.mysql_error());
	$selected_otkazy = mysql_fetch_assoc($query_otkazy);
	if (@$no_editable == true) // если у пользователя нет прав на редактирование 
    {
		echo"<div class=\"no_edit\">Технология доступа: ".$selected_otkazy['group']."<br>".$selected_otkazy['type_otkazy_uslugi']."</div>";
    }
	else // если у пользователя есть права на редактирование 
	{
		$query_otkazy = mysql_query("SELECT DISTINCT `group` FROM spravochnik.type_otkazy_uslugi ORDER BY `group` ASC")or die($error_message_on_query.mysql_error());
		echo "Технология доступа: <select class=\"select_box\" name='group_otkazy' size='1' id='group_otkazy' onchange=autopodbor_otkazy('group_otkazy','')>";
		while ($q = mysql_fetch_assoc($query_otkazy))
		{		     
			 echo"<option value=".$q['group']; 
			 if ($selected_otkazy['group']==$q['group']) {echo " SELECTED";}
			 echo">".$q['group']."</option>"; 	 
		}
		echo "</select><br><br>";
		
		$query_otkazy = mysql_query("SELECT `id`, `type_otkazy_uslugi` FROM spravochnik.type_otkazy_uslugi WHERE (`group` = '".$selected_otkazy['group']."') 
		                             ORDER BY `type_otkazy_uslugi` ASC") or die($error_message_on_query.mysql_error());
		echo "<select class=\"select_box\" name='text$k' size='1' id='otkazy_uslugi'>";
		while ($q = mysql_fetch_assoc($query_otkazy))
		{		     
			 echo"<option value=".$q['id']; 
			 if ($zn==$q['id']) {echo " SELECTED";}
			 echo">".$q['type_otkazy_uslugi']."</option>"; 	 
		}
		echo "</select>";
	}	
} break;


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

case 'id_lzk_group3':
{   
	$query_selected = mysql_query("SELECT `id_lzk_group1`,`lzk_group1`,`id_lzk_group2`,`lzk_group2`,`lzk_group3`.`id`,`lzk_group3` 
	FROM spravochnik.lzk_group1, spravochnik.lzk_group2, spravochnik.lzk_group3 WHERE (`lzk_group3`.`id` = '".$edit_array[$ind]."') AND (`lzk_group3`.`id_lzk_group2` = `lzk_group2`.`id`) AND (`lzk_group2`.`id_lzk_group1` = `lzk_group1`.`id`)".@$_SESSION['_login_center'])or die($error_message_on_query.mysql_error());
	    $selected = mysql_fetch_assoc($query_selected);
    if (@$no_editable == true) // если у пользователя нет прав на редактирование плошадок
    {
         echo"<div class=\"no_edit\">".$selected['lzk_group1'].", ".$selected['lzk_group2'].", ".$selected['lzk_group3']."</div>";
    }
    else // если у пользователя есть права на редактирование плошадок
    {
		$query_select_group1 = mysql_query("SELECT DISTINCT `lzk_group1`.`id`,`lzk_group1` FROM spravochnik.lzk_group1 
		WHERE 1".@$_SESSION['_login_center']." ORDER BY `lzk_group1` ASC");
		echo "<select class=\"select_box\" name='lzk_group1_select' size='1' id='lzk_group1' onchange=autopodbor_lzk_group1('lzk_group1','')>";
		while ($c = mysql_fetch_assoc($query_select_group1))
		{		     
			 echo"<option value=".$c['id'];
			 if ($selected['id_lzk_group1']==$c['id']) {echo " SELECTED";}
			 echo">".$c['lzk_group1']."</option>";	 
		}
		echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif5\"><br>";
		
		$query_select_group2 = mysql_query("SELECT DISTINCT `lzk_group2`.`id`,`lzk_group2` FROM spravochnik.lzk_group2, spravochnik.lzk_group3
		WHERE (`id_lzk_group1` = '".$query_selected['id_lzk_group1']."') AND (`id_lzk_group2` = `lzk_group2`.`id`) ORDER BY `lzk_group2` ASC");
		echo "<select class=\"select_box\" name='lzk_group2_select' size='1' id='lzk_group2' onchange=autopodbor_lzk_group2('lzk_group2','')>";
		while ($u = mysql_fetch_assoc($query_select_group2))
		{		     
			 echo"<option value=".$u['id'];
			 if ($selected['id_lzk_group2']==$u['id']) {echo " SELECTED";}
			 echo">".$u['lzk_group2']."</option>";
		}
		echo "</select><img src=\"images/load.gif\" style=\"display: none; \" id=\"load_gif6\"><br>";
			   
		$query_select_lzk_group3 = mysql_query("SELECT DISTINCT `lzk_group3`.`id`,`lzk_group3` FROM spravochnik.lzk_group3 
		WHERE (`id_lzk_group2` = '".$query_selected['id_lzk_group2']."') ORDER BY `lzk_group3` ASC");
		echo "<select class=\"select_box\" name='text$k' size='1' id='lzk_group3'>";
		while ($p = mysql_fetch_assoc($query_select_lzk_group3))
		{		     
			 echo"<option value=".$p['id']; 
			 if ($selected['id']==$p['id']) {echo " SELECTED";} 
			 echo">".$p['lzk_group3']."</option>";		  
		} 
		echo "</select>";
	}
} break;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 		 
default:
{
    $tbl_name=substr($ind, 3, strlen($ind)-3); //убираем id_ из имени и получаем имя таблицы
	$query_select = mysql_query("SELECT * FROM `spravochnik`.`".$tbl_name."` WHERE 1 ORDER BY `".$tbl_name."` ASC");
	if (@$no_editable == true) // если у пользователя нет прав на редактирование 
    {
		$r = mysql_fetch_assoc($query_select);
		echo"<div class=\"no_edit\">".$r[$tbl_name]."</div>";
    }
	else  // если у пользователя есть права на редактирование 
	{ 
		echo "<select class=\"select_box\" name='text$k' size='1'>";
		while ($r = mysql_fetch_assoc($query_select))
		{		     
			echo"<option value=".$r['id']; 
			if ($zn==$r['id']) {echo " SELECTED";}
			echo">".$r[$tbl_name]."</option>"; 
		} 
		echo "</select>";
    }
}
}

?>