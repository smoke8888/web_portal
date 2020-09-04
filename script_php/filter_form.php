<a href="#" class="filter_show" id="filterTrigger"></a>
                 
<div class="jqmWindow"  id="filter" align="left">
<a href="#" class="jqmClose" id="close"></a>
<hr>
<?php
if (mysql_num_rows($query_table))
{
?>
<form name='form_filter' method='post' action='script_php/filter_submit.php' onSubmit='return false'>
<div style="overflow:auto; height:220px;">
<table border=0 cellpaging=1 cellspacing=1>
<?php
$k=0;    
$row = @mysql_fetch_assoc($query_table);
//print_r($_SESSION['_filter_array']); print_r($_SESSION['_mat_operator']); 
foreach ($row as $ind => $zn)
{ 
	$type_field = mysql_field_type($query_table, $k+1); // определение типа данных поля 
	if ($ind=="id") {continue;}
	if ($ind=="file") {continue;} 
	echo"<tr bgcolor='#CCCCCC'><td>";
	foreach (@$_SESSION['_rusfield_array'] as $ind1 => $zn1)
					{
						if ($ind == $zn1['eng_field']) {echo $zn1['rus_field']; break;}//вывод русского название поля;	
					}
	echo"</td>"; //название колонок перед каждым фильтром
			 	
	if (($type_field=='int')||($type_field=='real')||($type_field=='date')||($type_field=='timestamp'))
	{     
	   echo"<td >";
	   echo"<input name='colname[]' type='hidden' value=$ind>";
	   echo "<select name='mat_operator[]' size='1'>"; //select мат оператора
	   echo "<option value='='"; if (@$_SESSION['_mat_operator'][$ind]=='=') {echo"SELECTED";} echo">Равно</option>";
	   echo "<option value='<>'"; if (@$_SESSION['_mat_operator'][$ind]=='<>') {echo"SELECTED";} echo">Не равно</option>";
	   echo "<option value='>'"; if (@$_SESSION['_mat_operator'][$ind]=='>') {echo"SELECTED";} echo">Больше</option>";
	   echo "<option value='<'"; if (@$_SESSION['_mat_operator'][$ind]=='<') {echo"SELECTED";} echo">Меньше</option>";
	   echo "<option value='>='"; if (@$_SESSION['_mat_operator'][$ind]=='>=') {echo"SELECTED";} echo">Больше или равно</option>";
	   echo "<option value='<='"; if (@$_SESSION['_mat_operator'][$ind]=='<=') {echo"SELECTED";} echo">Меньше или равно</option>";
	   echo "<option value='LIKE'"; if (@$_SESSION['_mat_operator'][$ind]=='LIKE') {echo"SELECTED";} echo">Содержит</option>";
	   echo "<option value='NOT LIKE'"; if (@$_SESSION['_mat_operator'][$ind]=='NOT LIKE') {echo"SELECTED";} echo">Не содержит</option>";
	   echo "</select></td>";
	   echo"<td ><input name='text$k' type='text' size='30' value='"; //текстовое поле ввода фильтра
	   if (isset($_SESSION['_filter_array'][$ind])) { $echo=$_SESSION['_filter_array'][$ind]; echo "echo";}
	   echo"' size=10 id='text$k'></td>";
	   if (($type_field=='date')||($type_field=='timestamp'))  //если поле типа дата, то прикрепляем календарь к нему
	   {
			echo"<td >";
			?><IMG style='cursor:pointer' onClick="bscal.show('<?php echo"text$k";?>');" height=16 vspace=0 
			src="images/date_selector.png" width=16 border=0><?php
			echo"</td>";
	   }                         	 
	}
	else if ($type_field=='string')
	{
	   echo"<td >";
	   echo"<input name='colname[]' type='hidden' value=$ind>";
	   echo "<select name='mat_operator[]' size='1'>"; //select мат оператора
	   echo "<option value='LIKE'"; if (@$_SESSION['_mat_operator'][$ind]=='LIKE') {echo"SELECTED";} echo">Содержит</option>";
	   echo "<option value='NOT LIKE'"; if (@$_SESSION['_mat_operator'][$ind]=='NOT LIKE') {echo"SELECTED";} echo">Не содержит</option>";
	   echo "<option value='='"; if (@$_SESSION['_mat_operator'][$ind]=='=') {echo"SELECTED";} echo">Равно</option>";
	   echo "<option value='<>'"; if (@$_SESSION['_mat_operator'][$ind]=='<>') {echo"SELECTED";} echo">Не равно</option>";
	   echo "</select></td>"; 
	   echo"<td ><input name='text$k' type='text' size='30' value='";
	   if (isset($_SESSION['_filter_array'][$ind])) { $echo=$_SESSION['_filter_array'][$ind]; echo $echo;}
	   echo"' size=10></td>";      	   
	}
	else {echo"<td class=></td><td class=><input name='mat_operator[]' type='hidden' value=no><input name='colname[]' type='hidden' value=$ind></td>";}
	echo"</tr>";	                              
	++$k;      
}   
$k=$k-1;

/// возврат указателя запроса на начальную позицию.....///////////////////////////////////////////////////////////////////////////////
mysql_data_seek($query_table,0);
//-----------------------------------------------     
echo"</table>";
echo"</div>";
echo"<br><input name='Filter_button' type='submit' value='Фильтровать' onClick='checkform(this.form,1)'>"; 
echo"<input name='k' type='hidden' value=$k>"; 
echo"<input name='id_top_menu' type='hidden' value=$id_top_menu>";
echo"<input name='id_sub_menu' type='hidden' value=$id_sub_menu>";
?>
</form>
</div>
<?php
}
?>