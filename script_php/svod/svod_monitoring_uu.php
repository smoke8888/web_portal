<?php
//___________________________���������� � �� $DB____________________________________________ 
$openConn2db = mysql_connect("localhost", "$PHP_AUTH_USER", "$PHP_AUTH_PW"); 
//___________________��������� ������������ ��������� ����� ���������� � ��_________________
  mysql_query ("set character_set_client='cp1251'");  
  mysql_query ("set character_set_results='cp1251'");  
  mysql_query ("set collation_connection='cp1251_general_ci'"); 

  //�������� ��� ������ ������������: ������ ��� ����� ����������������___________________________________________________________________
  if (@$select_center=='all')
{
  $podrazdelenie='center';
  $query0 = mysql_query("SELECT DISTINCT `center` FROM spravochnik.����������_������_�� ORDER BY `center` ASC")or die("������ ������ ����� (".mysql_error().")");
  $i=0;
  while ($CT=@mysql_fetch_assoc($query0))
  {           
    foreach ($CT as $index => $znach)
    {
        $CTE[$i]=$znach;
        ++$i;
    }
  }  
}

if (@$select_center!='all')
{ 
  $podrazdelenie='uzel_uu';       
  $query1 = mysql_query("SELECT DISTINCT `uzel_uu` FROM spravochnik.����������_������_�� WHERE `center`='$select_center' ORDER BY `uzel_uu` ASC")or die("������ ������ ����� (".mysql_error().")");  
  $i=0;
  while ($CT=@mysql_fetch_assoc($query1))
  {           
    foreach ($CT as $index => $znach)
    {
        $CTE[$i]=$znach;
        ++$i;
    }
  }  
}
//__________________________________________________________________________________________________________________________________________ 
?>

<strong><h2 align=center>&#171;���������� ��������� ���������� �� �� <?php $type=date("d-m-Y"); echo "$type"?>&#187;</h2></strong>
<table cellspacing="1" cellpadding="1" align=center width=70%>
  <tr align="center" valign="middle" bgcolor="#00568E">
    <td rowspan="3" class="st5"><p align="center"><strong>
    <?php 
    if ($podrazdelenie=="center") {echo"���";}         
    else {echo"$select_center";} ?>
    </strong></p></td>
    <td rowspan="3"><p align="center" class="st5"><strong>���������� ����������, ��. </strong></p></td>
    <td colspan="7" bgcolor="#00568E" class="st5"><p align="center"><strong>���������� ����������� ������������ �� �� 
    <?php $type=date("d-m-Y"); echo "$type"?>  </strong></p></td>
  </tr>
  <tr bgcolor="#00568E">
    <td rowspan="2" bgcolor="#00568E" class="st5"><p align="center"><strong>����������, ��. </strong></p></td>
    <td rowspan="2" class="st5"><p align="center"><strong>���, ����, ��. </strong></p></td>
    <td rowspan="2" class="st5"><p align="center"><strong>VSAT, ��. </strong></p></td>
    <td rowspan="2" class="st5"><p align="center"><strong>������ (���������� ����������, ��������������, ����. �����), ��. </strong></p></td>
    <td colspan="2" class="st5"><p align="center"><strong>����� </strong></p></td>
    <td rowspan="2" class="st5"><p align="center"><strong>� �.�. �� ������� ����������, ��. </strong></p></td>
  </tr>
  <tr bgcolor="#00568E">
    <td class="st5"><p align="center"><strong>��. </strong></p></td>
    <td class="st5"><p align="center"><strong>% </strong></p></td>
  </tr>

<?php

for ($i=0; $i<=count($CTE)-1; ++$i)
{ 
  
    //���������� ����������, ��. ___________________________
  $query1 = mysql_query("SELECT count(`tax_type`) FROM spravochnik.����������_������_�� WHERE `$podrazdelenie`='$CTE[$i]'")or die("������ ".mysql_error()); 
  $sum0[$i]=mysql_result($query1,0);
  if ($sum0[$i]==0) {continue;}
  
  echo"<tr align=center valign=middle bgcolor=#CDDBEB>";
  echo"<td><p>$CTE[$i]</p></td>";
  echo"<td><p>$sum0[$i]</p></td>";
  
  //����������, ��.________________________________________
  $query2 = mysql_query("SELECT count(`type_pv_uu`) FROM monitoring.uu WHERE `$podrazdelenie`='$CTE[$i]' AND (`type_pv_uu`='���������� ��������') AND (`otmetka`='-')")or die("������ ".mysql_error()); 
  $sum1[$i]=mysql_result($query2,0); 
  echo"<td><p>$sum1[$i]</p></td>";
  
  //���, ����, ��.___________________________________________
  $query3 = mysql_query("SELECT count(`type_pv_uu`) FROM monitoring.uu WHERE `$podrazdelenie`='$CTE[$i]' AND (`type_pv_uu`='�/�') AND (`otmetka`='-')")or die("������ ".mysql_error());
  $sum2[$i]=mysql_result($query3,0); 
  echo"<td><p>$sum2[$i]</p></td>";

  //VSAT, ��._______________________________________________ 
  $query4 = mysql_query("SELECT count(`type_pv_uu`) FROM monitoring.uu WHERE `$podrazdelenie`='$CTE[$i]' AND (`type_pv_uu`='������������ VSAT') AND (`otmetka`='-')")or die("������ ".mysql_error()); 
  $sum3[$i]=mysql_result($query4,0); 
  echo"<td><p>$sum3[$i]</p></td>";
  
  //������ (���������� ����������, ��������������, ����. �����), ��._____________________________ 
  $query5 = mysql_query("SELECT count(`type_pv_uu`) FROM monitoring.uu WHERE `$podrazdelenie`='$CTE[$i]' AND (`type_pv_uu`<>'���������� ��������') AND (`type_pv_uu`<>'�/�') AND (`type_pv_uu`<>'������������ VSAT') AND (`otmetka`='-')")or die("������ ".mysql_error());
  $sum4[$i]=mysql_result($query5,0); 
  echo"<td><p>$sum4[$i]</p></td>";

  //����� ��______________________________________________________
  $query6 = mysql_query("SELECT count(`type_pv_uu`) FROM monitoring.uu WHERE `$podrazdelenie`='$CTE[$i]' AND (`otmetka`='-')")or die("������ ".mysql_error());
  $sum5[$i]=mysql_result($query6,0); 
  echo"<td><p>$sum5[$i]</p></td>";


  //����� %______________________________________________________
  $sum6[$i]=$sum5[$i]/$sum0[$i];
  $sum6[$i]=round($sum6[$i],3);           
  echo"<td><p>$sum6[$i]</p></td>"; 
  
  //� �.�. �� ������� ����������, ��.______________________________ 
  $query7 = mysql_query("SELECT count(`type_pv_uu`) FROM monitoring.uu WHERE `$podrazdelenie`='$CTE[$i]' AND (`type_pv_uu`='���������') AND (`otmetka`='-')")or die("������ ".mysql_error());
  $sum7[$i]=mysql_result($query7,0); 
  echo"<td><p>$sum7[$i]</p></td>";
  echo"</tr>";
} 
  echo"<tr align=center valign=middle bgcolor=#00568E class=st5>";
  echo"<td><p><strong>�����:</strong></p></td>";

  foreach ($sum0 as $index => $znach) { $itog0=@$itog0+$znach;}
  echo"<td><p><strong>$itog0</strong></p></td>";  
  
  foreach ($sum1 as $index => $znach) { $itog1=@$itog1+$znach;}
  echo"<td><p><strong>$itog1</strong></p></td>";
  foreach ($sum2 as $index => $znach) { $itog2=@$itog2+$znach;}
  echo"<td><p><strong>$itog2</strong></p></td>";
  foreach ($sum3 as $index => $znach) { $itog3=@$itog3+$znach;}
  echo"<td><p><strong>$itog3</strong></p></td>";
  foreach ($sum4 as $index => $znach) { $itog4=@$itog4+$znach;}
  echo"<td><p><strong>$itog4</strong></p></td>";  
  foreach ($sum5 as $index => $znach) { $itog5=@$itog5+$znach;}
  echo"<td><p><strong>$itog5</strong></p></td>";
  foreach ($sum6 as $index => $znach) { $itog6=@$itog6+$znach;}
  echo"<td><p><strong>$itog6</strong></p></td>";
  foreach ($sum7 as $index => $znach) { $itog7=@$itog7+$znach;}
  echo"<td><p><strong>$itog7</strong></p></td>";
  echo"</tr>";   

mysql_close();
?>  
 
</table>
