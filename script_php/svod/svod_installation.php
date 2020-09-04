<div align="center" class="table_name">Отчет по выполнению инсталляционных работ</div>


<?php

if (!isset($date_otcheta)) $date_otcheta = date("Y-m-d");

echo"<form name='inter' method='post' action=''>";
echo"<p>&nbsp;Дата отчета: <input type=\"text\" name=\"date_otcheta\" id=\"date_otcheta\" value=\"".$date_otcheta."\">";
?><IMG style='cursor:pointer' onClick="bscal.show('date_otcheta');" height=16 vspace=0 
			src="images/date_selector.png" width=16 border=0><?php

echo"<br><input name='go' type='submit' value=Выбрать>";
echo"</form>";

$query_uslugi = mysql_query("SELECT DISTINCT `type_uslugi`
FROM `reestr`.`installation`,`spravochnik`.`type_uslugi` 
WHERE (`id_type_uslugi` = `type_uslugi`.`id`) AND (`date_otcheta` = '".$date_otcheta."') order by `type_uslugi`")or die("Ошибка запроса: ".mysql_error());
if (mysql_num_rows($query_uslugi)) 
while ($massiv_uslugi = @mysql_fetch_assoc($query_uslugi))
{ 	       
	$uslugi[] = $massiv_uslugi['type_uslugi'];
}

$query = mysql_query("SELECT `centers`, `type_uslugi`, `install_yesterday`, `install_today`, `v_kontrol_sroki`, `kontrol_sroki_do3`, `konrol_sroki_more3`
FROM `reestr`.`installation`,`spravochnik`.`centers`,`spravochnik`.`type_uslugi` 
WHERE (`centers`.`id` = `installation`.`id_centers`) AND (`id_type_uslugi` = `type_uslugi`.`id`) AND (`date_otcheta` = '".$date_otcheta."') group by `centers`,`type_uslugi` order by `centers`, `type_uslugi`")or die("Ошибка запроса: ".mysql_error());
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
	$array[$massiv['centers']][$massiv['type_uslugi']][] = $massiv['install_yesterday'];
	$array[$massiv['centers']][$massiv['type_uslugi']][] = $massiv['install_today'];
	$array[$massiv['centers']][$massiv['type_uslugi']][] = $massiv['v_kontrol_sroki'];
	$array[$massiv['centers']][$massiv['type_uslugi']][] = $massiv['kontrol_sroki_do3'];
	$array[$massiv['centers']][$massiv['type_uslugi']][] = $massiv['konrol_sroki_more3'];
}
//print_r($array);
//print_r($uslugi);
?>

<table align=center width=70% class="Table">
  <thead>
  <tr>
    <th rowspan="3" scope="col">Наименование ЦТ</th>
    <?php 
	foreach($uslugi as $i => $zn)
    {
       echo"<th colspan=\"5\">".$zn."</th>";
	}
	?>
  </tr>
  <tr>
    <?php 
	foreach($uslugi as $i => $zn)
    {
       echo"<th rowspan=\"2\">выполнено нарядов ВЧЕРА</th>";
	   echo"<th rowspan=\"2\">всего нарядов на сегодня</th>";
	   echo"<th colspan=\"3\">Из них</th>";
	}
	?>
  </tr>
  <tr>
    <?php 
	foreach($uslugi as $i => $zn)
    {
       echo"<th>срок не подошел</th>";
	   echo"<th>превышение КС до 3 дней</th>";
	   echo"<th>превышение КС свыше 3 дней</th>";
	   
	}
	?>
  </tr>
  </thead>
  <tbody>
  <?php 
  foreach($array as $i => $ct)
  {
    echo"<tr>";
	echo"<td>".$i."</td>";
	
    foreach($uslugi as $ind => $znach)
	{
		$next = 0;
		foreach($ct as $i_usl => $usl)
		{
		   if ($i_usl == $znach)
		   {
			   foreach($usl as $i => $z)
			   {
				  echo"<td>".$z."</td>";
			   }
			   $next = 1;
		   }
		}
		if (@$next == 0) {echo"<td></td><td></td><td></td><td></td><td></td>"; }
	}
	echo"</tr>";
  }
  ?>
</table>