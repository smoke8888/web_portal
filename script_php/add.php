<?PHP
unset($parametr);

 
//// Запрос таблицы //////////////////////////////////////////////////////////////////////////////////////////////////////////////
$query_add = mysql_query("SHOW FULL COLUMNS FROM ".$doc_array['DB'].".".$doc_array['table']) or die($error_message_on_query.mysql_error());  

//// НАЗВАНИЕ ТАБЛИЦЫ ////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<div class=\"table_name\">Добавление записи в базу данных \"".$menu_array['name']."\"</div>
<div class=\"news_date\">В случае отсутствия в списках выбора нужных данных, просьба обращаться к администратору ресурса 
по эл. почте: <a href=mailto:sevs@kras.sibirtelecom.ru class=mn7>sevs@kras.sibirtelecom.ru</a></div>";

//// Форма добавления записей ////////////////////////////////////////////////////////////////////////////////////////////
echo"<form name='add_form' method='post' action='script_php/add_submit.php' onSubmit='return false' enctype='multipart/form-data' id='add_form'>";
echo"<table border=0 id='table_add_form'>";
echo"<tr><td width=100%>";
echo"<table border=0 cellpadding=\"3\" cellspacing=\"1\">";

//-------------- вывод элементов формы на экран ----------------------------------------------------------------------------
$k=0; $i=0;
while ($add_array=mysql_fetch_array($query_add, MYSQL_ASSOC))
{
   foreach ($add_array as $ind => $zn) 
   {
	  if ($ind == "Field")
	  {
	          // прячем дату устранения от глаз, заполняя ее нулями...
		  if ($zn=='end_pv_date') {echo "<input type='hidden' name='text$k' value='0000-00-00'>"; $parametr[$k]=$zn; ++$i; ++$k; continue;}	  
		  if ($zn=='id') {++$i; continue;}   
	  	  if (($zn=='timestamp')||($zn=='number_tu')||($zn=='date_tu')) {$parametr[$k]=$zn; ++$k; ++$i; continue;}
	  	  //запись внесшего данные в таблицу
                  if ($zn=='id_users') 
                  {
		        $query_users = mysql_query("SELECT `id` FROM `spravochnik`.`users` WHERE (`user_login` = '".$PHP_AUTH_USER."')") or die($error_message_on_query.mysql_error());
		        $users_id = mysql_fetch_row($query_users);
			echo "<input type='hidden' name='text$k' value=\"".$users_id[0]."\">"; $parametr[$k]=$zn; ++$i; ++$k; continue; 
		  }
		    
		  echo"<tr><td class=\"table_fon\" align=\"right\" width=\"200\"><div class=\"text\">";
		  foreach (@$_SESSION['_rusfield_array'] as $ind1 => $zn1)
					{
						if ($zn == $zn1['eng_field']) {echo $zn1['rus_field']; break;}//вывод русского название поля;	
					}
		  echo"</div></td>"; //вывод название поля
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
		  if ($zn=="file") {echo"<div id=attach_file>";}    // для присвоения полю где будет input file id'шника, исп. в  add_attach_file.js
		  if (strstr($zn, 'id_'))  require("add_select.php");
		  // блокируем возможность менять даты отказов
		  else if ($zn=='otkaz_date') {echo "<input type='text' class=\"edit_box\" name='text$k' value='".date("Y-m-d")."' readonly>"; $parametr[$k]=$zn; ++$i; ++$k; continue;}
		  // не даем заполнять руками и вставлять из буфера дату заявления и удовлетворения заявления в отказах
	  	  else if ($zn=='date_ispolneniya') {echo "<input type='text' class=\"edit_box\" name='text$k' id='text$k' value='0000-00-00' readonly>";}
	  	  else if ($zn=='date_zayavleniya') {echo "<input type='text' class=\"edit_box\" name='text$k' id='text$k' value='0000-00-00' readonly>";}
		  // отработка остальных полей с типом date
		  else if (strstr($type, 'date'))  echo "<input type='text' name='text$k' id='text$k' value='0000-00-00' class=\"edit_box\" onfocus='this.select()'>";
		  else if ($zn == 'file') // отображение поля загрузки файлов
		  {
				echo "<input type='hidden' name='MAX_FILE_SIZE' value='15000000'>
				<input type='file' name='file[]' value='' SIZE=30>
				<input type='button' name='attach_button' value='+' onClick='add_file()'>
				<input type='button' name='rem_button' value='-' onClick='rem_file()'>";
	          }
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
		  if ($zn=="file") {echo"</div>";} 
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
echo"<tr><td align=\"center\">";
echo "<input name='ADD_button' type='submit' value='Добавить' onClick='checkform(this.form,2)'>";
?>

&nbsp;&nbsp;<input type="button" name="cancel_button" value="Отмена" onClick="parent.location='index.php?id_top_menu=<?php echo $id_top_menu; ?>&id_sub_menu=<?php echo $id_sub_menu; ?>';">

<?php 
echo "</td></tr>";
echo "</table>";

echo "<input name='DB' type='hidden' value='".$doc_array['DB']."'>
<input name='table' type='hidden' value='".$doc_array['table']."'>
<input name='id_top_menu' type='hidden' value='".$id_top_menu."'>
<input name='id_sub_menu' type='hidden' value='".$id_sub_menu."'>";

echo "</form>";

unset($_SESSION['_parametr']);
unset($_SESSION['_parametr_error']);
unset($_SESSION['_column_name_error']);
$_SESSION['_parametr']=$parametr;


?>

