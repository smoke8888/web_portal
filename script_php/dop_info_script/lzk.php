<?php    
////////// проверки ПРИВИЛЕГИИ по добавлению поставок
$privelegies_global_ins_query = mysql_query("SELECT `Insert_priv` FROM `mysql`.`user` WHERE `User` = '".$PHP_AUTH_USER."'")or die("Ошибка определения глобальных привелегий: ".mysql_error()); // запрос глобальных привелегий доступа на чтение всего
$privelegies_global_ins = @mysql_fetch_assoc($privelegies_global_ins_query);
if ($privelegies_global_ins['Insert_priv'] == "N")
{
	// проверки ПРИВИЛЕГИИ по добавлению поставок НА УРОВНЕ БД
	@$privelegies_db_ins_query = mysql_query("SELECT `Db` FROM `mysql`.`db` WHERE (`User` = '".$PHP_AUTH_USER."') AND (`Insert_priv` = 'Y') AND (`Db` = '".$doc_array['DB']."')")
	or die("Ошибка определения привелегий: ".mysql_error());   
	$privelegies_db_ins = mysql_fetch_assoc($privelegies_db_ins_query); 
	// ПРИВИЛЕГИИ НА УРОВНЕ ТАБЛИЦЫ
	if (!isset($privelegies_db_ins['Db']))
	{
		@$privelegies_table_ins_query = mysql_query("SELECT `Table_name` FROM `mysql`.`tables_priv` WHERE (`User` = '".$PHP_AUTH_USER."') AND (`Table_priv` LIKE '%Insert%') AND 
		(`Table_name` = 'postavki') AND (`Db` = '".$doc_array['DB']."')")or die("Ошибка определения привелегий: ".mysql_error());   
		$privelegies_table_ins = mysql_fetch_assoc($privelegies_table_ins_query);		
	}
}



$privelegies_global_del_query = mysql_query("SELECT `Delete_priv` FROM `mysql`.`user` WHERE `User` = '".$PHP_AUTH_USER."'")or die("Ошибка определения глобальных привелегий: ".mysql_error()); // запрос глобальных привелегий доступа на удаление всего
$privelegies_global_del = @mysql_fetch_assoc($privelegies_global_del_query);
if ($privelegies_global_del['Delete_priv'] == "N")
{
 	// ПРИВИЛЕГИИ НА УРОВНЕ БД		
	@$privelegies_db_del_query = mysql_query("SELECT `Db` FROM `mysql`.`db` WHERE (`User` = '".$PHP_AUTH_USER."') AND (`Delete_priv` = 'Y') AND (`Db` = '".$doc_array['DB']."')")
	or die("Ошибка определения привелегий: ".mysql_error());  
	$privelegies_db_del = mysql_fetch_assoc($privelegies_db_del_query);   	 
	// ПРИВИЛЕГИИ НА УРОВНЕ ТАБЛИЦЫ
	if (!isset($privelegies_db_del['Db']))
	{
		@$privelegies_table_del_query = mysql_query("SELECT `Table_name` FROM `mysql`.`tables_priv` WHERE (`User` = '".$PHP_AUTH_USER."') AND (`Table_priv` LIKE '%Delete%') AND 
		(`Table_name` = 'postavki') AND (`Db` = '".$doc_array['DB']."')")or die("Ошибка определения привелегий: ".mysql_error());   
		$privelegies_table_del = mysql_fetch_assoc($privelegies_table_del_query);		
	}
}

if ((@$privelegies_global_ins['Insert_priv'] == "Y")||(@$privelegies_db_ins['Db'])||(@$privelegies_table_ins['Table_name'])) $insert_privilegies = true;
if ((@$privelegies_global_del['Delete_priv'] == "Y")||(@$privelegies_db_del['Db'])||(@$privelegies_table_del['Table_name'])) $delete_privilegies = true;








                     
//// Запрос строки из ЛЗК //////////////////////////////////////////////////////////////////////////////////////////////////////////////
$querry_lzk_info = mysql_query("SELECT SQL_NO_CACHE * FROM ".$doc_array['DB'].".".$doc_array['table']." WHERE (`".$doc_array['table']."`.`id`=".$num_row.")")or die($error_message_on_query.mysql_error()); 
$edit_array = mysql_fetch_assoc($querry_lzk_info);


//// Запрос полей таблицы Постовок //////////////////////////////////////////////////////////////////////////////////////////////////////////////
$query_add = mysql_query("SHOW FULL COLUMNS FROM `lzk`.`postavki`") or die($error_message_on_query.mysql_error()); 


//////////// НАЗВАНИЕ ТАБЛИЦЫ ////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<div class=\"table_name\">Привязка поставок к позиции в \"".$menu_array['name']."\"</div>";

echo"<table border=0 width=768>";
echo"<tr valign=\"middle\" height=50><td align=\"center\" colspan=2><div class=\"news_details\">";

/////////// ссылки на предыдущую и следующую записи ////////////////////////////////////////////////////////////////////////////
		  
	$id_back = @$_SESSION['_id_list_array'][array_search($num_row, $_SESSION['_id_list_array'])-1];
	$id_next = @$_SESSION['_id_list_array'][array_search($num_row, $_SESSION['_id_list_array'])+1];
	
	if (isset($id_back)) {echo"<a href='index.php?action=dop_info&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&num_row=".$id_back."'><img src='images/back.png' border=0>Предыдущая запись</a>&nbsp;&nbsp;";}
	if (isset($id_next)) {echo"<a class=\"news_details\" href='index.php?action=dop_info&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&num_row=".$id_next."'>Следующая запись<img src='images/forward.png' border=0></a>";}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo"</div></td></tr>";
echo"<tr class=\"text\"><td width=50%>";
echo"<table border=0 cellpadding=\"3\" cellspacing=\"1\">";
echo"<tr><td align=\"center\" colspan=\"2\"><strong>Позиция в ЛЗК</strong></td></tr>";
$i=0; $k=0;
//_________________________________________________________________________________________________________________________

foreach ($edit_array as $ind=>$zn) 
{		
	  if ($ind=='id') {++$i; continue;}
	  if ($ind=='id_users') {++$i; continue;}
	  $no_editable = true;
	  $query_rusfield = mysql_query("SELECT `rus_field` FROM `engine`.`tables_fields` WHERE `eng_field` = '".$ind."'")or die($error_message_on_query.mysql_error()); 
	  $rusfield = @mysql_fetch_row($query_rusfield);   
	  if (!$rusfield) {$rusfield[0] = "<h1>".$ind."</h1>";}  // если русского аналога названия не находим, то выделяем его
	  echo"<tr class=\"table_fon\"><td align=\"right\">".$rusfield[0]."</td>"; //вывод название поля 
	  echo"<td align=\"left\">";
	  if (strstr($ind, 'id_'))  require("script_php/edit_select.php"); // если имя колонки содержит id_ то ее содержимое черпаем из edit_select.php
	  else {echo"<div class=\"news_date\">".$zn."</div>";}
	  echo "<input type='hidden' name='text$k' value='".$zn."'>";
	  echo"</td>";
	  $no_editable = false; 
}

echo "</table>"; echo"</td>";

//// Запрос поставок для строки из ЛЗК //////////////////////////////////////////////////////////////////////////////////////////////////////////////
$querry_postavki_info = mysql_query("SELECT SQL_NO_CACHE * FROM `lzk`.`postavki` WHERE (`id_lzk`=".$num_row.") ORDER BY `id`")or die($error_message_on_query.mysql_error()); 
echo"<td valign=\"top\" align=\"center\">";
echo"<table border=0 cellpadding=\"3\" cellspacing=\"1\">";
echo"<tr><td align=\"center\" colspan=\"4\"><strong>Привязанные поставки</strong></td></tr>";
if (!mysql_num_rows($querry_postavki_info)) {echo"<tr><td align=\"center\" colspan=\"3\"><strong>Отсутствуют</strong></td></tr></table>";}
else 
{
    $i=0; $k=1; $itog=0; $itog2=0;
    while ($postavki_array = mysql_fetch_assoc($querry_postavki_info))
    {
        if ($i==0)
    	{
             echo"<tr class=\"table_fon\">";
			 echo "<td></td>";
		     echo "<td><strong>№пп</strong></td>";
		     foreach ($postavki_array as $ind => $zn)
		     {
		          if (($ind=='id')||($ind=='id_lzk')||($ind=='timestamp')) {continue;}
			      echo"<td><strong>";
			      $query_rusfield = mysql_query("SELECT `rus_field` FROM `engine`.`tables_fields` WHERE `eng_field` = '".$ind."'")or die($error_message_on_query.mysql_error()); 
		          $rusfield = @mysql_fetch_row($query_rusfield);   
		          if (!$rusfield) {$rusfield[0] = "<h1>".$ind."</h1>";}  // если русского аналога названия не находим, то выделяем его
		          echo $rusfield[0]; //вывод название поля;
			      echo"</strong></td>";
	         }
	    }
        $i=1;
	    echo"<tr class=\"table_fon\">";
		echo"<td align=center>";
		if ($delete_privilegies == true) 
		{ 
		?> 		  				   <!--кнопочка удаления строки-->
			 <img src='images/drop.png' border=0 style="cursor: pointer;" onclick="if (confirm('Вы уверены, что хотите удалить запись?')) 
             {parent.location='script_php/dop_info_script/lzk_del_postavki.php?action=dop_info&id_top_menu=<?php echo $id_top_menu;?>&id_sub_menu=<?php echo $id_sub_menu;?>&del_row=<?php echo $postavki_array['id'];?>&num_row=<?php echo $num_row;?>';}" title='Удалить'> 
		<?php
		} 
		else {echo"<img src='images/drop_none.png' border=0 title='Удалить'>";} 
		echo"</td>";
		echo "<td>".$k."</td>";
        foreach ($postavki_array as $ind=>$zn) // цикл создает элементы формы для редактирования и заносит в них значения из базы данных
        {			    
	         if (($ind=='id')||($ind=='id_lzk')||($ind=='timestamp')) {continue;}
		     echo"<td align=\"left\">".$zn."</td>";
        }
	    echo"</tr>";
	    ++$k;
		$itog = $itog + $postavki_array['num'];
	}
	echo"<tr class=\"table_fon\"><td align=\"left\" colspan=2><strong>Итого</strong></td><td align=\"left\"><strong>".$itog."</strong></td></tr>";
	$itog2 = ($itog / $edit_array['num']) * 100;
	$itog3 = $edit_array['num'] - $itog;
	echo"<tr class=\"table_fon\"><td align=\"left\" colspan=2>% вып.</td><td align=\"left\">".round($itog2, 2)."</td></tr>";
	echo"<tr class=\"table_fon\"><td align=\"left\" colspan=2>Остаток</td><td align=\"left\">".$itog3."</td></tr>";
echo "</table>";
}

echo"</td></tr>";
echo"<tr><td colspan=2 align=center>";
echo"</td></tr>";   



if ($insert_privilegies == true) 
{
	echo"<tr><td colspan=2 width=100%>";
	//// Форма ////////////////////////////////////////////////////////////////////////////////////////////
	echo"<form name='form_edit' id=\"form_edit\" method='post' action='script_php/dop_info_script/lzk_submit.php' onSubmit='return false'>";
	echo"<table border=0 cellpadding=\"3\" cellspacing=\"1\">";
	echo"<tr class=\"text\"><td align=\"center\" colspan=\"3\"><strong>Привязка поставок</strong></td></tr>";
	
	//-------------- вывод элементов формы на экран ----------------------------------------------------------------------------
	$k=0; $i=0;
	while ($add_array=mysql_fetch_array($query_add, MYSQL_ASSOC))
	{
	   foreach ($add_array as $ind => $zn) 
	   {
		  if ($ind == "Field")
		  {
			  if (($zn=='id')||($zn=='id_lzk')) {++$i; continue;}   
			  if ($zn=='timestamp') {$parametr[$k]=$zn; ++$k; ++$i; continue;}
			  //запись внесшего данные в таблицу
			  if ($zn=='id_users') 
			  {
					$query_users = mysql_query("SELECT `id` FROM `spravochnik`.`users` WHERE (`user_login` = '".$PHP_AUTH_USER."')") 
					or die($error_message_on_query.mysql_error());
					$users_id = mysql_fetch_row($query_users);
					echo "<input type='hidden' name='text$k' value=\"".$users_id[0]."\">"; $parametr[$k]=$zn; ++$i; ++$k; continue; 
			  }
			  
			  $query_rusfield = mysql_query("SELECT `rus_field` FROM `engine`.`tables_fields` WHERE `eng_field` = '".$zn."'")or die($error_message_on_query.mysql_error()); 
			  $rusfield = @mysql_fetch_row($query_rusfield);   
			  if (!$rusfield) {$rusfield[0] = "<h1>".$zn."</h1>";}  // если русского аналога названия не находим, то выделяем его	  
			  echo"<tr><td class=\"table_fon\" align=\"right\" width=\"200\"><div class=\"text\">".$rusfield[0]."</div></td>"; //вывод название поля
			  $type = $add_array['Type']; 
			  $str_pos = strrpos($type, "("); $field_length=substr($type, $str_pos+1, strlen($type)-$str_pos-2);
			  if (strstr($type, 'char')) {$type_show="текст (не более ".$field_length." символов)";}
			  if (strstr($type, 'int')) {$type_show="целое число (не более ".$field_length." цифр)";}
			  if (strstr($type, 'double')) {$str_pos = strrpos($type, "("); $n1=substr($type, $str_pos+1, strlen($type)-$str_pos-4); 
			  $str_pos = strrpos($type, ","); $n2=substr($type, $str_pos+1, strlen($type)-$str_pos-2);
			  $type_show="дробное число ".$n1." цифр (в т.ч. ".$n2." знака дробная часть)";}
			  if (strstr($type, 'date')) {$type_show='дата (ГГГГ-ММ-ДД)';} 
			  if (strstr($type, 'text')) {$type_show='текст';}
			  
			  echo"<td "; if (@$_SESSION['_column_name_error']==$zn) {echo"class=\"error_fon\"";} else {echo"class=\"table_fon\"";} echo ">"; // цвет поля ввода
			  if (strstr($zn, 'id_'))  require("script_php/add_select.php");
			  // отработка остальных полей с типом date
			  else if (strstr($type, 'date'))  echo "<input type='text' name='text$k' id='text$k' value='0000-00-00' class=\"edit_box\" onfocus='this.select()'>";
			  else if (($type_show == 'текст')&&(isset($_SESSION['_column_name_error']))) {echo "<TEXTAREA class=\"edit_box\" NAME='text$k' WRAP=physical COLS=30 ROWS=5 onfocus='this.select()'>".$_SESSION['_parametr_error'][$zn]."</TEXTAREA>";}
			  else if (($type_show == 'текст')&&(!isset($_SESSION['_column_name_error']))) {echo "<TEXTAREA class=\"edit_box\" NAME='text$k' WRAP=physical COLS=30 ROWS=5 onfocus='this.select()'></TEXTAREA>";}
			  else if (isset($_SESSION['_column_name_error'])) {echo "<input type='text' class=\"edit_box\" name='text$k' value=".$_SESSION['_parametr_error'][$zn]." maxlength=\"".$field_length."\" onfocus='this.select()'>";}    
			  else if ((strstr($type, 'int'))||(strstr($type, 'double')))  echo "<input type='text' class=\"edit_box\" name='text$k' value='' maxlength=\"".$field_length."\" onfocus=\"this.select();\" onkeypress=\"return  positive_number(event);\">";
			  else {echo "<input type='text' class=\"edit_box\" name='text$k' value='' maxlength=\"".$field_length."\" onfocus='this.select()'>";}
			  if (strstr($type, 'date'))  
			  {
				 ?><IMG style='cursor:pointer; display:inline;' onClick="bscal.show('<?php echo"text$k";?>');" height=16 vspace=0 src="images/date_selector.png" width=16 border=0 align=top>
				 <?php
			  }
			  echo"</td>";
			  if (@$_SESSION['_column_name_error']==$zn) {$err_text="<strong><font color=red> - Здесь ошибка!</font></strong>";} else {$err_text="";}	 
			  if (!strstr($zn, 'id_')) {echo"<td><div class=\"comment\">- ".$type_show." ".@$err_text."</div></td>";}
			  echo"</tr>";
			  $parametr[$k]=$zn;
			  ++$k;
			  ++$i; 		  	  
		  }	  
	   }
	}
	echo "</table>";
	echo"</td></tr>";
	
	/////////// ссылки на предыдущую и следующую записи ////////////////////////////////////////////////////////////////////////////
	echo"<tr valign=\"middle\" height=50><td colspan=2 align=\"center\"><div class=\"news_details\">";	
		if (isset($id_back)) {echo"<a href='index.php?action=dop_info&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&num_row=".$id_back."'><img src='images/back.png' border=0>Предыдущая запись</a>&nbsp;&nbsp;";}
		if (isset($id_next)) {echo"<a class=\"news_details\" href='index.php?action=dop_info&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&num_row=".$id_next."'>Следующая запись<img src='images/forward.png' border=0></a>";}
	echo"</div></td></tr>";
	
	echo"<tr><td align=\"center\" colspan=2 >";
	echo "<input type='submit' name='Apply_button' value='Применить' onClick='checkform(this.form,2,0)'>&nbsp;&nbsp;";
	?>
	
	&nbsp;&nbsp;<input type="button" name="cancel_button" value="Выход" onClick="parent.location='index.php?id_top_menu=<?php echo $id_top_menu; ?>&id_sub_menu=<?php echo $id_sub_menu; ?>';">
	
	<?php 
	echo "</td></tr>";
	unset($_SESSION['_parametr']);
	unset($_SESSION['_parametr_error']);
	unset($_SESSION['_column_name_error']);
	$_SESSION['_parametr']=$parametr;
}
echo "</table>";
echo "<input name='DB' type='hidden' value='lzk'><input name='table' type='hidden' value='postavki'><input name='id_top_menu' type='hidden' value='$id_top_menu'><input name='id_sub_menu' type='hidden' value='$id_sub_menu'><input name='num_row' type='hidden' value='$num_row'>";
echo "</form>";



?>