<div align="center" class="table_name">Отчет по повреждениям на сети абонентского доступа</div>

<?php

if (!isset($date_otcheta)) $date_otcheta = date("Y-m-d");

echo"<form name='inter' method='post' action=''>";
echo"<p>&nbsp;Дата отчета: <input type=\"text\" name=\"date_otcheta\" id=\"date_otcheta\" value=\"".$date_otcheta."\">";
?><IMG style='cursor:pointer' onClick="bscal.show('date_otcheta');" height=16 vspace=0 
			src="images/date_selector.png" width=16 border=0><?php

echo"<br><input name='go' type='submit' value=Выбрать>";
echo"</form>";

$query = mysql_query("SELECT `centers`, `type_network`, `pv_total`, `pv_line`, `pv_kab`, `pv_total_ne_v_kontr_sroki`, `pv_line_ne_v_kontr_sroki`, `pv_kab_ne_v_kontr_sroki`
FROM `reestr`.`pv`,`spravochnik`.`centers`,`spravochnik`.`type_network` 
WHERE (`centers`.`id` = `pv`.`id_centers`) AND (`id_type_network` = `type_network`.`id`) AND (`date_otcheta` = '".$date_otcheta."') group by `centers`,`type_network` order by `centers`, `type_network`")or die("Ошибка запроса: ".mysql_error());
if (!mysql_num_rows($query)) 
{
	echo"<table border=1 align=center>
	<tr bgcolor=\"red\" align=\"center\"><td><strong>Внимание!</strong></td></tr>
	<tr><td><p align=center>На выбранную дату информации нет!</p></td></tr></table>";
	die;
}
else 
while ($massiv = @mysql_fetch_assoc($query))
{ 	       
	$array[$massiv['centers']][$massiv['type_network']][] = $massiv['pv_total'];
	$array[$massiv['centers']][$massiv['type_network']][] = $massiv['pv_line'];
	$array[$massiv['centers']][$massiv['type_network']][] = $massiv['pv_kab'];
	$array[$massiv['centers']][$massiv['type_network']][] = $massiv['pv_total_ne_v_kontr_sroki'];
	$array[$massiv['centers']][$massiv['type_network']][] = $massiv['pv_line_ne_v_kontr_sroki'];
	$array[$massiv['centers']][$massiv['type_network']][] = $massiv['pv_kab_ne_v_kontr_sroki'];
}
//print_r($array);

?>


<table align=center width=70% class="Table">
  <thead>
  <tr>
    <th rowspan="4">Наименование ЦТ</th>
    <th colspan="6">ГТС</th>
    <th colspan="6">СТС</th>
  </tr>
  <tr>
      <th rowspan="3">Всего повреждений</th>
	  <th colspan="5">из них</th>
      <th rowspan="3">Всего повреждений</th>
	  <th colspan="5">из них</th>
  </tr>
  <tr>
      <th rowspan="2">линейные</th>
	  <th rowspan="2">кабельные</th>
      <th rowspan="2">Число повреждений с превышением КС</th>
	  <th colspan="2">из них</th>
      <th rowspan="2">линейные</th>
	  <th rowspan="2">кабельные</th>
      <th rowspan="2">Число повреждений с превышением КС</th>
	  <th colspan="2">из них</th>
  </tr>
  <tr>
      <th>линейные</th>
	  <th>кабельные</th>
      <th>линейные</th>
	  <th>кабельные</th>
  </tr>  
  </thead>
  <tbody>
  <?php 
  foreach($array as $i => $ct) // ЦТ
  {
    echo"<tr>";
	echo"<td>".$i."</td>";
	if (isset($ct['ГТС'])) 
	{		   
	   foreach($ct['ГТС'] as $i => $z)
	   {
		    echo"<td>".$z."</td>";
	   }
    }
	else  {echo"<td></td><td></td><td></td><td></td><td></td><td></td>";}
    if (isset($ct['СТС'])) 
	{		   
		 foreach($ct['СТС'] as $i => $z)
	     {
		    echo"<td>".$z."</td>";
		 }
    }
	else  {echo"<td></td><td></td><td></td><td></td><td></td><td></td>";}
	echo"</tr>";
  }
  ?>
</table>