<div align="center" class="table_name">����� �� ������������ �� ���� ������������ �������</div>

<?php

if (!isset($date_otcheta)) $date_otcheta = date("Y-m-d");

echo"<form name='inter' method='post' action=''>";
echo"<p>&nbsp;���� ������: <input type=\"text\" name=\"date_otcheta\" id=\"date_otcheta\" value=\"".$date_otcheta."\">";
?><IMG style='cursor:pointer' onClick="bscal.show('date_otcheta');" height=16 vspace=0 
			src="images/date_selector.png" width=16 border=0><?php

echo"<br><input name='go' type='submit' value=�������>";
echo"</form>";

$query = mysql_query("SELECT `centers`, `type_network`, `pv_total`, `pv_line`, `pv_kab`, `pv_total_ne_v_kontr_sroki`, `pv_line_ne_v_kontr_sroki`, `pv_kab_ne_v_kontr_sroki`
FROM `reestr`.`pv`,`spravochnik`.`centers`,`spravochnik`.`type_network` 
WHERE (`centers`.`id` = `pv`.`id_centers`) AND (`id_type_network` = `type_network`.`id`) AND (`date_otcheta` = '".$date_otcheta."') group by `centers`,`type_network` order by `centers`, `type_network`")or die("������ �������: ".mysql_error());
if (!mysql_num_rows($query)) 
{
	echo"<table border=1 align=center>
	<tr bgcolor=\"red\" align=\"center\"><td><strong>��������!</strong></td></tr>
	<tr><td><p align=center>�� ��������� ���� ���������� ���!</p></td></tr></table>";
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
    <th rowspan="4">������������ ��</th>
    <th colspan="6">���</th>
    <th colspan="6">���</th>
  </tr>
  <tr>
      <th rowspan="3">����� �����������</th>
	  <th colspan="5">�� ���</th>
      <th rowspan="3">����� �����������</th>
	  <th colspan="5">�� ���</th>
  </tr>
  <tr>
      <th rowspan="2">��������</th>
	  <th rowspan="2">���������</th>
      <th rowspan="2">����� ����������� � ����������� ��</th>
	  <th colspan="2">�� ���</th>
      <th rowspan="2">��������</th>
	  <th rowspan="2">���������</th>
      <th rowspan="2">����� ����������� � ����������� ��</th>
	  <th colspan="2">�� ���</th>
  </tr>
  <tr>
      <th>��������</th>
	  <th>���������</th>
      <th>��������</th>
	  <th>���������</th>
  </tr>  
  </thead>
  <tbody>
  <?php 
  foreach($array as $i => $ct) // ��
  {
    echo"<tr>";
	echo"<td>".$i."</td>";
	if (isset($ct['���'])) 
	{		   
	   foreach($ct['���'] as $i => $z)
	   {
		    echo"<td>".$z."</td>";
	   }
    }
	else  {echo"<td></td><td></td><td></td><td></td><td></td><td></td>";}
    if (isset($ct['���'])) 
	{		   
		 foreach($ct['���'] as $i => $z)
	     {
		    echo"<td>".$z."</td>";
		 }
    }
	else  {echo"<td></td><td></td><td></td><td></td><td></td><td></td>";}
	echo"</tr>";
  }
  ?>
</table>