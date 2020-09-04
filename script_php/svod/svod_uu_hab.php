<div align="center" class="table_name">Состояние спутниковых терминалов по информации Иркутского HUB</div>

<?php

if (!isset($date_otcheta)) $date_otcheta = date("Y-m-d");

echo"<form name='inter' method='post' action=''>";
echo"<p>&nbsp;Дата отчета: <input type=\"text\" name=\"date_otcheta\" id=\"date_otcheta\" value=\"".$date_otcheta."\">";
?><IMG style='cursor:pointer' onClick="bscal.show('date_otcheta');" height=16 vspace=0 
			src="images/date_selector.png" width=16 border=0><?php

echo"<br><input name='go' type='submit' value=Выбрать>";
echo"</form>";

echo"<div align='right'><table cellspacing='1'>";
echo"<tr bgcolor=\"#dddfe2\" class='comment'><td colspan=2>Комментарий</td></tr>";
echo"<tr bgcolor=\"#dddfe2\" class='comment'><td>Critical</td><td>Спутниковый терминал не работает</td></tr>";
echo"<tr bgcolor=\"#dddfe2\" class='comment'><td>Normal</td><td>Спутниковый терминал работает</td></tr>";
echo"</table></div><br>";



$query = mysql_query("SELECT * FROM `reestr`.`uu_hab` WHERE (`date` = '".$date_otcheta."')")or die("Ошибка запроса: ".mysql_error());
if (!mysql_num_rows($query)) 
{
	echo"<table border=1 align=center>
	<tr bgcolor=\"red\" align=\"center\"><td><strong>Внимание!</strong></td></tr>
	<tr><td><p align=center>На выбранную дату информации нет!</p></td></tr></table>";
	die;
}
else
{
//print_r($array);

?>


<table align=center width=70% class="Table">
  <thead>
  <tr>
    <th>Наименование спутникового терминала</th>
    <th>Идентификатор спутникового терминала</th>
    <th>Состояние спутникового терминала</th>
  </tr>
  <tr>
  </thead>
  <tbody>
  <?php 
  while ($massiv = @mysql_fetch_assoc($query))
  { 
    if (strpos($massiv['name'],"GW")) {$GW = true;} else {$GW = false;}
    echo"<tr"; if ($GW) {echo" bgcolor=\"#0e920e\"";} echo">";
    echo"<td>"; if ($GW) {echo" <strong>";} echo $massiv['name']; if ($GW) {echo" </strong>";} echo"</td>";
    echo"<td>"; if ($GW) {echo" <strong>";} echo $massiv['nomer']; if ($GW) {echo" </strong>";} echo"</td>";
    echo"<td"; if ($massiv['status'] == "Critical") {echo" bgcolor=\"#df6b0e\"";} echo">"; if ($GW) {echo" <strong>";} echo $massiv['status']; if ($GW) {echo" </strong>";} echo"</td>";
    echo"</tr>";
  }
}
  ?>
</table>