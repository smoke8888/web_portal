<?php
date_default_timezone_set('Europe/Moscow');
function getWeekDates($year, $week)
{ 
// ���������� ��� ��� ��� 
$L = date("L", mktime(1,1,1,1,1, $year)); // ������� ����� �������� ������ ���� ��� 
$months = array(31, 28+$L, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31); 
// ����� ������ * 7 ���� 
$total_days = ($week)*7; // -1 ����� �������� ������ ������ ������ 
$i = 0; 
while(@$sum <= $total_days){ @$sum += $months[$i++]; } 
// ����� ���� � ���� �������: 
$sum -= $months[$i-1]; 
// ����� ������ 
$month = $i; 
// ���� �� ���� � ���� ������ 
$day = $total_days - $sum; 
// ���� ������ ����� ��� 
$day_of_week = date("w", mktime(0,0,0, $month, $day, $year)); 
// ���� ��� ����������� 
if ($day_of_week==0) $day_of_week=7; 
// �������� ������ ������ 
$day = $day - ($day_of_week - 1) ; 
$dates = array(); 
$dates['start'] = date("Y-m-d", mktime(0,0,0, $month, $day, $year)); 
$dates['end'] = date("Y-m-d", mktime(1,1,1, $month, $day+6, $year)); 
return $dates; 
}

$week=date("W"); $last_week=$week-1;
$year=date("Y");

//$dates = getWeekDates($year, $week);
if (isset($nedelya)) {$last_dates = getWeekDates($year, $nedelya);} else {$last_dates = getWeekDates($year, $last_week);}
//print_r(@$nedelya);  
//print_r($last_dates);
//echo $last_week;
 
echo"<form name='inter' method='post' action=''>";
echo"<p>&nbsp;����� ������: <select name='nedelya' size='1'>";
for($i=0; $i<=$last_week; $i++)
{
    $dates = getWeekDates($year, $i);
    echo "<option value=\"".$i."\"";
    if (isset($nedelya)&&($nedelya==$i)) {echo" SELECTED";}
    if (!isset($nedelya)&&($last_week==$i)) {echo" SELECTED";}
    echo">".$i." (� ".$dates['start']." �� ".$dates['end'].")</option>";
}
echo"</select></p>";
echo"<input name='go' type='submit' value=�������>";
echo"</form>";

echo"<div align=center class=\"table_name\">������� ����� �� ������� � �������������� �����</div>";
echo"<div align=center class=\"news_date\">(�������� ������: � ".$last_dates['start']." �� ".$last_dates['end'].")</div>";
/*
echo"<table width=1000 border=0 cellpadding=0 cellspacing=1 align=center>";
echo"<tr bgcolor=#9c9c99 class=st2>
<td align=center class=st2><p>������� ������</p></td>
<td align=center class=st2><p>����� ������� � ������� ��������</p></td>
<td align=center class=st2><p>������������� ��������� �� ����� ��������� (�� �������� ������)</p></td>
<td align=center class=st2><p>����� �������� �� �������� ������</p></td>
<td align=center class=st2><p>���� ������� �� �������� ������</p></td>
</tr>";

$query_group = mysql_query("SELECT DISTINCT `group` FROM `spravochnik`.`type_otkazy_uslugi` ORDER BY `group`") or die("������ �������: ".mysql_error());
while ($group = @mysql_fetch_row($query_group))
{   
    echo"<tr bgcolor=#9c9c99 class=st2><td colspan=5><p>".$group[0]."</p></td></tr>";
    $query_otkazy = mysql_query("SELECT `id`,`type_otkazy_uslugi` FROM `spravochnik`.`type_otkazy_uslugi` WHERE (`group` = '".$group[0]."')")or die("������ �������: ".mysql_error());
    
    $num_otkaza_sum = 0; $num_otkaza_last_sum = 0;
    
    $query_sum_otkazy = mysql_query("SELECT COUNT(`otkazy`.`id`) FROM `reestr`.`otkazy`,`spravochnik`.`type_otkazy_uslugi` WHERE (`group` = '".$group[0]."') AND (`spravochnik`.`type_otkazy_uslugi`.`id` = `reestr`.`otkazy`.`id_type_otkazy_uslugi`) AND (`otkaz_date` >= '".$last_dates['start']."') AND (`otkaz_date` <= '".$last_dates['end']."')")or die("������ �������: ".mysql_error());
    $sum_otkazy = mysql_result($query_sum_otkazy,0); 
    
    while ($prichina_otkaza = @mysql_fetch_row($query_otkazy)) 
    {
        $query_num_otkaza_last = mysql_query("SELECT COUNT(`otkazy`.`id`) FROM `reestr`.`otkazy`,`spravochnik`.`type_otkazy_uslugi` WHERE (`group` = '".$group[0]."') AND (`spravochnik`.`type_otkazy_uslugi`.`id` = `reestr`.`otkazy`.`id_type_otkazy_uslugi`) AND (`id_type_otkazy_uslugi` = '".$prichina_otkaza[0]."') AND (`otkaz_date` < '".$last_dates['start']."')")or die("������ �������: ".mysql_error());
        $num_otkaza_last = mysql_result($query_num_otkaza_last,0);
        $num_otkaza_last_sum = @$num_otkaza_last_sum + $num_otkaza_last;
        
        $query_num_udovl = mysql_query("SELECT COUNT(`otkazy`.`id`) FROM `reestr`.`otkazy`,`spravochnik`.`type_otkazy_uslugi` WHERE (`group` = '".$group[0]."') AND (`spravochnik`.`type_otkazy_uslugi`.`id` = `reestr`.`otkazy`.`id_type_otkazy_uslugi`) AND (`id_type_otkazy_uslugi` = '".$prichina_otkaza[0]."') AND (`otkaz_date` >= '".$last_dates['start']."') AND (`otkaz_date` <= '".$last_dates['end']."') AND (`date_ispolneniya` <> '0000-00-00')")or die("������ �������: ".mysql_error());
        $num_udovl = mysql_result($query_num_udovl,0);
        $num_udovl_sum = @$num_udovl_sum + $num_udovl;
        
        $query_num_otkaza = mysql_query("SELECT COUNT(`otkazy`.`id`) FROM `reestr`.`otkazy`,`spravochnik`.`type_otkazy_uslugi` WHERE (`group` = '".$group[0]."') AND (`spravochnik`.`type_otkazy_uslugi`.`id` = `reestr`.`otkazy`.`id_type_otkazy_uslugi`) AND (`id_type_otkazy_uslugi` = '".$prichina_otkaza[0]."') AND (`otkaz_date` >= '".$last_dates['start']."') AND (`otkaz_date` <= '".$last_dates['end']."')") or die("������ �������: ".mysql_error());
        $num_otkaza = mysql_result($query_num_otkaza,0);
        $num_otkaza_sum = @$num_otkaza_sum + $num_otkaza;
        
	@$proc_otkaza = round($num_otkaza/$sum_otkazy,3);
        
        echo"<tr bgcolor=#CDDBEB>";
        echo"<td align=center><p>".$prichina_otkaza[1]."</p></td>";
        echo"<td align=center><p>".$num_otkaza_last."</p></td>";
        echo"<td align=center><p>".$num_udovl."</p></td>";
        echo"<td align=center><p>".$num_otkaza."</p></td>";
        echo"<td align=center><p>".$proc_otkaza."</p></td>";
        echo"</tr>"; 
    } 
    echo"<tr bgcolor=#9c9c99 class=st2>";
    echo"<td align=center><p></p></td>";
    echo"<td align=center><p>".$num_otkaza_last_sum."</p></td>";
    echo"<td align=center><p>".$num_udovl_sum."</p></td>";
    echo"<td align=center><p>".$num_otkaza_sum."</p></td>";
    echo"<td align=center><p></p></td>";	
}      
echo"</table><br><br>";
*/

$query_type_otkazy = mysql_query("SELECT `type_uslugi`,`type_otkazy_uslugi`
FROM `reestr`.`otkazy`,`spravochnik`.`type_otkazy_uslugi`,`spravochnik`.`type_uslugi` 
WHERE (`type_otkazy_uslugi`.`id` = `otkazy`.`id_type_otkazy_uslugi`) AND (`id_type_uslugi` = `type_uslugi`.`id`) AND (`otkaz_date` >= '".$last_dates['start']."') AND (`otkaz_date` <= '".$last_dates['end']."') group by `type_uslugi`,`type_otkazy_uslugi`")or die("������ �������: ".mysql_error());
while ($type_otkazy = @mysql_fetch_assoc($query_type_otkazy))
{ 	       
		  $otkazy[$type_otkazy['type_uslugi']][] = $type_otkazy['type_otkazy_uslugi'];
}
$query_type_otkazy = mysql_query("SELECT `type_uslugi`,`group`,`type_otkazy_uslugi`,`uzly`,`punkty`,COUNT(`otkazy`.`id`) as 'number'
FROM `reestr`.`otkazy`,`spravochnik`.`type_otkazy_uslugi`,`spravochnik`.`punkty`,`spravochnik`.`uzly`,`spravochnik`.`centers`,`spravochnik`.`type_uslugi` 
WHERE (`centers`.`id` = `uzly`.`id_centers`) AND (`uzly`.`id` = `punkty`.`id_uzly`) AND (`punkty`.`id` = `otkazy`.`id_punkty`) AND (`type_otkazy_uslugi`.`id` = `otkazy`.`id_type_otkazy_uslugi`) AND (`id_type_uslugi` = `type_uslugi`.`id`) AND (`otkaz_date` >= '".$last_dates['start']."') AND (`otkaz_date` <= '".$last_dates['end']."') group by `type_uslugi`,`uzly`,`punkty`,`type_otkazy_uslugi`")or die("������ �������: ".mysql_error());
while ($type_otkazy = @mysql_fetch_assoc($query_type_otkazy))
{ 	       
		  $otkazy_array[$type_otkazy['type_uslugi']][$type_otkazy['group']][$type_otkazy['uzly']][$type_otkazy['punkty']][$type_otkazy['type_otkazy_uslugi']] = $type_otkazy['number'];
}
//print_r($type_otkazy);	 
$summ_otkazy[0] = 0; // ����� ��� ������ ��������
$summ_otkazy_punkt[0] = 0; // ����� ����� ������ ������
$ITOGO = 0;

if (isset($otkazy_array)) 
{
foreach ($otkazy_array as $usl => $z)// ������
{
   echo"<table width=800 align=\"center\" cellpadding=0 cellspacing=0 class=\"Table\">";
   echo"<thead><tr><td colspan=2 class=\"text\">������: ".$usl."</td></tr>"; 
   foreach ($otkazy_array[$usl] as $tech => $z)// ����������
   {
      echo"<tr><td colspan=2 class=\"text\">����������: ".$tech."</td></tr>";   
      
	  echo"<tr><th>���</th><th>���. �����</th>";      
      foreach($otkazy[$usl] as $m => $znach)  // ��� ������ ��� �����
      {
         echo"<th>".$znach."</th>";      
      }
	  echo"<th>�����:</th>";      
      echo"</tr></thead><tbody>";
	  
      foreach ($otkazy_array[$usl][$tech] as $uzel => $z) // ���
      foreach ($otkazy_array[$usl][$tech][$uzel] as $punkt => $z)  // ���. ������
      {
          echo"<tr><td align=center>".$uzel."</td><td align=center>".$punkt."</td>";
		  foreach ($otkazy[$usl] as $m => $znach)  // ��� ������ ������ ���
          {
			  foreach ($otkazy_array[$usl][$tech][$uzel][$punkt] as $otkz => $z)
			  {
				   if ($otkz == $znach) 
				   {
				       $result = $otkazy_array[$usl][$tech][$uzel][$punkt][$otkz]; 
				       $summ_otkazy[$otkz] = @$summ_otkazy[$otkz] + $result;  
				       $summ_otkazy_punkt[$punkt] = @$summ_otkazy_punkt[$punkt] + $result;
				   } 
			  }
			  if (isset($result)) {echo"<td align=center>".$result."</td>";} else {echo"<td></td>";}
			  unset($result);
		  }
		  echo"<td>".$summ_otkazy_punkt[$punkt]."</td>";
          echo"</tr>";
		  unset($summ_otkazy_punkt); 
      }
	  
	  echo"<tr><td></td><td align=center>�����:</td>";
	  foreach($otkazy[$usl] as $m => $znach)  // ��� ������ ��� �����
      {
           if (isset ($summ_otkazy[$znach])) echo"<td>".$summ_otkazy[$znach]."</td>"; else echo"<td>0</td>"; 
	   $ITOGO = $ITOGO + @$summ_otkazy[$znach];
      }
	  echo"<td>".$ITOGO."</td>";
	  $ITOGO = 0;
	  echo"</tr>";
      unset($summ_otkazy);
   }
   echo"</tbody></table><br><br>";
}
}
else 
{echo "�� ��������� ������ ���������� �� ������� �����������";}

 //print_r($otkazy_array);

//__________________________________________________________________________________________________________________________________________ 
?>