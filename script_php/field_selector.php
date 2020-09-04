<a href="#" class="field_select" id="fieldTrigger"></a>
                 
<div id="field_selector" class="jqmWindow" align="left">
<a href="#" class="jqmClose" id="close"></a>
<hr>  
<?php			
echo"<form id=\"form_field_selector\" name=\"form_field_selector\" method=\"post\" onSubmit=\"return false\">";
echo"<div style=\"overflow:auto; height:220px; \">";
echo"<table border=0 cellpaging=1 cellspacing=1>";
echo"<tr><td>Выбор полей таблицы:</td><td width=150>Сортировка:</td></tr>";
$j=0; 
foreach ($tables_columns_list as $ind => $zn)	
{
     $checked_sort = ""; $checked_radio_asc = ""; $checked_radio_desc = ""; $style_div_sort = "style=\"display:none;\"";
	 echo"<tr>";
	 // помечаем отображенные колонки галкой
	 $array_key = array_search($zn, $_SESSION['_field_selector']);
     if ($array_key === false) {$checked = ""; $style_sel_sort = "style=\"display:none;\"";} 
     else
	 {
	      $checked = "CHECKED";
	      $style_sel_sort = "style=\"display:block;\"";
		  $str_pos = strrpos($array_key, "`"); 
		  $number_index = substr($array_key, $str_pos+1, strlen($array_key));
		  if (isset($_SESSION['_field_selector']["zxc".$number_index])) {$checked_sort = "CHECKED"; $style_div_sort = "style=\"display:block;\"";}
		  if ((isset($_SESSION['_field_selector']["vbn".$number_index]))&&($_SESSION['_field_selector']["vbn".$number_index] == 'asc')) {$checked_radio_asc = "CHECKED";}
		  if ((isset($_SESSION['_field_selector']["vbn".$number_index]))&&($_SESSION['_field_selector']["vbn".$number_index] == 'desc')) {$checked_radio_desc = "CHECKED";}
	 } 
	 
     // вычленяем имя колонки из строки БД.таблица.колонка
	 if (strstr($zn, " as "))
	 {
		 $str_pos = strrpos($zn, " "); 
		 $eng_field=substr($zn, $str_pos+1, strlen($zn)-$str_pos); 
	 }
	 else 
	 { 
		 $str_pos = strrpos($zn, "."); 
		 $eng_field=substr($zn, $str_pos+2, strlen($zn)-$str_pos-3);    
	 }
	 
	  foreach (@$_SESSION['_rusfield_array'] as $ind1 => $zn1)
		{
			if ($eng_field == $zn1['eng_field']) {$rusfield = $zn1['rus_field']; break;}//вывод русского название поля;	
		}  
	 // выводим чекбоксы с названиями колонок данной таблицы
	 $str_pos = strrpos($zn, "`"); 
	 $tbl_name=substr($zn, 0, $str_pos+1);
	 if (!strstr($ind, "`".$doc_array['DB']."`.`".$doc_array['table']."`")) {$fld_sel_class = "fld_sel1";} 
	 if (strstr($ind, "`".$doc_array['DB']."`.`".$doc_array['table']."`")) {$fld_sel_class = "fld_sel2";}
	 echo "<td class=\"".$fld_sel_class."\">";
	     echo"<input type=\"checkbox\" id=\"gjkt".$ind."\" name=\"gjkt".$ind."\" value=\"".$zn."\" onClick=\"unselect_sort('".$ind."',".$j.")\" ".$checked.">".$rusfield;  // колонка с выбором отображения полей
	 echo"</td>";
	 echo"<td class=\"".$fld_sel_class."\">";
	 echo"<input type=\"checkbox\" id=\"zxc".$j."\" name=\"zxc".$j."\" value=\"".$zn."\" onClick=\"show_hide_sort_field(".$j.")\" ".$checked_sort." ".$style_sel_sort.">";  // чек бокс сортировки
	 echo"<div id=\"divs".$j."\" ".$style_div_sort.">";
	 echo"<input type=\"radio\" id=\"asc".$j."\" name=\"vbn".$j."\" value=\"asc\" ".$checked_radio_asc.">Возр.";
	 echo"<input type=\"radio\" id=\"desc".$j."\" name=\"vbn".$j."\" value=\"desc\" ".$checked_radio_desc.">Убыв.";
	 echo "</div>";
	 echo"</td>";	 
	 echo"</tr>";
	 $j++;
}
echo"</table>";	
echo"</div>";
echo"<br><input name=\"select_button\" type=\"submit\" value=\"Отобразить\" onClick=\"checkform(this.form,3)\">&nbsp;
         <input name=\"mark_button\" type=\"button\" value=\"Выделить всё\" onClick=\"Select_all_chkbox(this.form)\">
         <input name=\"unmark_button\" type=\"button\" value=\"Снять все выделения\" onClick=\"unSelect_all_chkbox(this.form)\">
         <input type=\"hidden\" value=\"Отобразить\" name=\"select_field_button\">
         <input type=\"hidden\" value=\"".$doc_array['DB']."\" name=\"DB\">
         <input type=\"hidden\" value=\"".$doc_array['table']."\" name=\"table\">";		
echo"</form>
</div>";
?>