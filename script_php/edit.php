<?php                         
//// ������ ������� //////////////////////////////////////////////////////////////////////////////////////////////////////////////
$query_edit = mysql_query("SELECT SQL_NO_CACHE * FROM ".$doc_array['DB'].".".$doc_array['table']." WHERE (`".$doc_array['table']."`.`id`=".$num_row.")")or die($error_message_on_query.mysql_error()); 
$edit_array = mysql_fetch_assoc($query_edit);

//////////// �������� ������� ////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<div class=\"table_name\">�������������� ������ � ���� ������ \"".$menu_array['name']."\"</div>
<div class=\"news_date\">� ������ ���������� � ������� ������ ������ ������, ������� ���������� � �������������� ������� 
�� ��. �����: <a href=mailto:sevs@kras.sibirtelecom.ru class=mn7>sevs@kras.sibirtelecom.ru</a></div>";

//////////// ����� �������������� ������� /////////////////////////////////////////////////////////////////////////////////////// 
echo"<form name='form_edit' id='form_edit' method='post' action='script_php/edit_submit.php' onSubmit='return false' enctype='multipart/form-data'>";
echo"<table border=0>";
echo"<tr valign=\"middle\" height=50><td width=100% align=\"center\"><div class=\"news_details\">";
	/////////// ������ �� ���������� � ��������� ������ ////////////////////////////////////////////////////////////////////////////
		  
	$id_back = @$_SESSION['_id_list_array'][array_search($num_row, $_SESSION['_id_list_array'])-1];
	$id_next = @$_SESSION['_id_list_array'][array_search($num_row, $_SESSION['_id_list_array'])+1];
	
	if (isset($id_back)) {echo"<a href='index.php?action=edit&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&num_row=".$id_back."'><img src='images/back.png' border=0>���������� ������</a>&nbsp;&nbsp;";}
	if (isset($id_next)) {echo"<a class=\"news_details\" href='index.php?action=edit&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&num_row=".$id_next."'>��������� ������<img src='images/forward.png' border=0></a>";}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo"</div></td></tr>";
echo"<tr><td width=100%>";
echo"<table border=0 cellpadding=\"3\" cellspacing=\"1\">";

$i=0; $k=0;
//_________________________________________________________________________________________________________________________

foreach ($edit_array as $ind=>$zn) // ���� ������� �������� ����� ��� �������������� � ������� � ��� �������� �� ���� ������
{		
	// �������� ������ �� ���������� �� �������, ���� ���, �� ����, ����� 
	if ((!isset($privelegies_column_upd_array))||((isset($privelegies_column_upd_array))&&(array_search($ind,$privelegies_column_upd_array))))
	{	  
	  if ($ind=='id') {++$i; continue;}
	  if ($ind=='timestamp') {$parametr[$k]=$ind; ++$k; ++$i; continue;}
	  if ($ind=='id_users') 
          {
		echo "<input type='hidden' name='text$k' value=\"".$zn."\">"; $parametr[$k]=$ind; ++$i; ++$k; continue; 
	  }
	  
	  echo"<tr><td class=\"table_fon\" align=\"right\" width=\"200\"><div class=\"text\">";
	  foreach (@$_SESSION['_rusfield_array'] as $ind1 => $zn1)
		{
			if ($ind == $zn1['eng_field']) {echo $zn1['rus_field']; break;}//����� �������� �������� ����;	
		}
	  echo"</div></td>"; //����� �������� ����
	  $type=mysql_field_type($query_edit, $i);
	  $field_length=mysql_field_len($query_edit, $i);
	  if ($type=='string') {$type_show="����� (�� ����� ".$field_length." ��������)";}
	  if ($type=='int') {$type_show="����� ����� (�� ����� ".$field_length." ����)";}
	  if ($type=='real') {$type_show="������� ����� (�� ����� ".$field_length." ��������)";}
	  if ($type=='date') {$type_show='���� (����-��-��)';} 
	  if ($type=='blob') {$type_show='�����';}

          echo"<td "; if (@$_SESSION['_column_name_error']==$ind) {echo"class=\"error_fon\"";} else {echo"class=\"table_fon\"";} echo ">"; // ���� ���� �����
	  if (strstr($ind, 'id_'))  require("edit_select.php"); // ���� ��� ������� �������� id_ �� �� ���������� ������� �� edit_select.php
   	  else if ($ind == 'file') // ����������� ���� �������� ������
	  {
			echo $zn."<br>";
			if ($zn=="") {$zn = "file_attachment";}
			echo "<input type='hidden' name='text$k' value='".$zn."'>
			<input type='hidden' name='MAX_FILE_SIZE' value='50000000'>
			<input type='file' name='file[]' value='' SIZE=30>";
	  }
	  else if($type=='blob') {echo "<TEXTAREA class=\"edit_box\" NAME='text$k' WRAP=physical COLS=30 ROWS=5 onfocus='this.select()'>".$zn."</TEXTAREA>";}
	  // �� ���� ��������� ������ � ��������� �� ������ ���� ��������� � �������������� ��������� � �������
	  else if ($ind == 'date_ispolneniya') {echo "<input type='text' class=\"edit_box\" name='text$k' id='text$k' value='".$zn."' readonly>";}
	  else if ($ind == 'date_zayavleniya') {echo "<input type='text' class=\"edit_box\" name='text$k' id='text$k' value='".$zn."' readonly>";}
	  else if (($type=='int')||($type=='real'))  echo "<input type='text' class=\"edit_box\" name='text$k' value='".$zn."' maxlength=\"".$field_length."\" onfocus=\"this.select();\" onkeypress=\"return  positive_number(event);\">";
	  else {echo "<input type='text' id='text$k' name='text$k' class=\"edit_box\" value='".$zn."' maxlength=\"".$field_length."\" onfocus='this.select()'>";}
	  if (($type=='date')&&($ind != 'start_pv_date'))
	  {
	     ?><IMG style='cursor:pointer; display:inline;' onClick="bscal.show('<?php echo"text$k";?>');" height=16 vspace=3 src="images/date_selector.png" width=16 border=0 align=top>
	     <?php
	  }
	  echo"</td>";
	  if (@$_SESSION['_column_name_error']==$ind) {$err_text="<strong><font color=red> - ����� ������!</font></strong>";} else {$err_text="";}
	   if (!strstr($ind, 'id_')) {echo"<td><div class=\"comment\">- ".$type_show." ".@$err_text."</div></td>";}
	  echo"</tr>";
	  $parametr[$k]=$ind;
	  ++$k;
	  ++$i;
    }      
////////////////// ���� ��� ������� � ���������� ��������///////////////////////////////////////////////////////////////////////////////////////////////////	
    if ((isset($privelegies_column_upd_array))&&(!array_search($ind,$privelegies_column_upd_array)))   
    {
	  if ($ind=='id') {++$i; continue;}
	  if ($ind=='id_users') {++$i; continue;}
	  $no_editable = true;
	  $query_rusfield = mysql_query("SELECT `rus_field` FROM `engine`.`tables_fields` WHERE `eng_field` = '".$ind."'")or die($error_message_on_query.mysql_error()); 
	  $rusfield = @mysql_fetch_row($query_rusfield);   
	  if (!$rusfield) {$rusfield[0] = "<h1>".$ind."</h1>";}  // ���� �������� ������� �������� �� �������, �� �������� ���
	  echo"<tr><td class=\"table_fon\" align=\"right\" width=\"200\"><div class=\"news_date\">".$rusfield[0]."</div></td>"; //����� �������� ���� 
	  echo"<td class=\"table_fon\" align=\"left\">";
	  if (strstr($ind, 'id_'))  require("edit_select.php"); // ���� ��� ������� �������� id_ �� �� ���������� ������� �� edit_select.php
	  else {echo"<div class=\"news_date\">".$zn."</div>";}
	  echo "<input type='hidden' name='text$k' value='".$zn."'>";
	  echo"</td>";
	  $parametr[$k]=$ind;
	  ++$k;
	  ++$i;
	  $no_editable = false;
    }    
}
echo "</table>";
echo"</td></tr>";
echo"<tr valign=\"middle\" height=50><td width=100% align=\"center\"><div class=\"news_details\">";	
	if (isset($id_back)) {echo"<a href='index.php?action=edit&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&num_row=".$id_back."'><img src='images/back.png' border=0>���������� ������</a>&nbsp;&nbsp;";}
	if (isset($id_next)) {echo"<a class=\"news_details\" href='index.php?action=edit&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&num_row=".$id_next."'>��������� ������<img src='images/forward.png' border=0></a>";}
echo"</div></td></tr>";
echo"<tr><td colspan=2 align=center>";


echo"<input type='submit' name='Edit_button' value='���������' onClick='checkform(this.form,2,1)'>&nbsp;&nbsp;
<input type='submit' name='Edit_button_apply' value='���������' onClick='checkform(this.form,2,0)'>&nbsp;&nbsp;";

echo "<input name='DB' type='hidden' value='".$doc_array['DB']."'><input name='table' type='hidden' value='".$doc_array['table']."'><input name='id_top_menu' type='hidden' value='$id_top_menu'><input name='id_sub_menu' type='hidden' value='$id_sub_menu'><input name='num_row' type='hidden' value='$num_row'>";

if ((isset($from_top_menu))&&(isset($from_sub_menu))) // ������������ ��� ����������� ������������� ������ � "������� � ������� �������� ��"
{echo"<input name='from_top_menu' type='hidden' value='$from_top_menu'><input name='from_sub_menu' type='hidden' value='$from_sub_menu'>";
$id_top_menu = "&id_top_menu=".$from_top_menu; $id_sub_menu = "&id_sub_menu=".$from_sub_menu;}
?>

<input type="button" name="cancel_button" value="������" onClick="parent.location='index.php?id_top_menu=<?php echo $id_top_menu; ?>&id_sub_menu=<?php echo $id_sub_menu; ?>';">

<?php
echo"</td></tr>";   
echo"</table>";  
echo"</form>";

unset($_SESSION['_parametr']);
unset($_SESSION['_edit_array']);
unset($_SESSION['_parametr_error']);
unset($_SESSION['_column_name_error']);
$_SESSION['_parametr']=@$parametr;
$_SESSION['_edit_array']=@$edit_array;

//if ($PHP_AUTH_USER == 'smoke') {print_r($parametr);print_r($edit_array);}

?>