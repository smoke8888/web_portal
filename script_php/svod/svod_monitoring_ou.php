<?php
//___________________________содеинение с БД $DB____________________________________________ 
$openConn2db = mysql_connect("localhost", "$PHP_AUTH_USER", "$PHP_AUTH_PW"); 
//___________________установка национальной кодировки после соединения с БД_________________
  mysql_query ("set character_set_client='cp1251'");  
  mysql_query ("set character_set_results='cp1251'");  
  mysql_query ("set collation_connection='cp1251_general_ci'"); 

  //проверка что выбрал пользователь: Филиал или центр телекоммуникаций___________________________________________________________________
  if (@$select_center=='all')
{
  $podrazdelenie='center';
  $query0 = mysql_query("SELECT DISTINCT `center` FROM spravochnik.населенные_пункты_уу ORDER BY `center` ASC")or die("Ошибка вывода формы (".mysql_error().")");
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
  $podrazdelenie='uzel_ou';  
  $query1 = mysql_query("SELECT DISTINCT `uzel_ou` FROM spravochnik.населенные_пункты_оу WHERE `center`='$select_center' ORDER BY `uzel_ou` ASC")or die("Ошибка вывода формы (".mysql_error().")");  
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

<h2 align="center"><strong>&#171;Мониторинг состояния каналов до ОУ на <?php $type=date("d-m-Y"); echo "$type"?>&#187;</strong></h2>
<table cellspacing="1" cellpadding="1" align=center width=70%>
  <tr align="center" valign="middle" bgcolor="#00568E">
    <td rowspan="3" class="st5"><p align="center"><strong>
    <?php 
    if ($podrazdelenie=="center") {echo"ЦТЭ";}         
    else {echo"$select_center";} ?>
    </strong></p></td>
    <td rowspan="3"><p align="center" class="st5"><strong>Количество школ, шт. </strong></p></td>
    <td colspan="9" bgcolor="#00568E" class="st5"><p align="center"><strong>Количество повреждений оборудования ОУ на 
    <?php $type=date("d-m-Y"); echo "$type"?>  </strong></p></td>
  </tr>
  <tr bgcolor="#00568E">
    <td rowspan="2" bgcolor="#00568E" class="st5"><p align="center"><strong>Модем, шт</strong></p></td>
    <td rowspan="2" bgcolor="#00568E" class="st5"><p align="center"><strong>Оборудование DSLAM, шт</strong></p></td>   
    <td rowspan="2" class="st5"><p align="center"><strong>РРЛ, р/у, шт.</strong></p></td>
    <td rowspan="2" class="st5"><p align="center"><strong>Оборудование VSAT, шт.</strong></p></td>
    <td rowspan="2" class="st5"><p align="center"><strong>Оборудование АБ, шт.</strong></p></td>
    <td rowspan="2" class="st5"><p align="center"><strong>Оборудование МСС, шт.</strong></p></td>
    <td rowspan="2" class="st5"><p align="center"><strong>Причина не выявлена, шт.</strong></p></td>
    <td colspan="2" class="st5"><p align="center"><strong>Всего</strong></p></td>

  </tr>
  <tr bgcolor="#00568E">
    <td class="st5"><p align="center"><strong>Шт. </strong></p></td>
    <td class="st5"><p align="center"><strong>% </strong></p></td>
  </tr>

<?php

for ($i=0; $i<=count($CTE)-1; ++$i)
{ 
  
    //Количество школ, шт. ___________________________
  $query1 = mysql_query("SELECT count(`punkt_ou`) FROM spravochnik.населенные_пункты_оу WHERE `$podrazdelenie`='$CTE[$i]'")or die("Ошибка ".mysql_error()); 
  $sum1[$i]=mysql_result($query1,0);
  if ($sum1[$i]==0) {continue;}
  
  echo"<tr align=center valign=middle bgcolor=#CDDBEB>";
  echo"<td><p>$CTE[$i]</p></td>";
  echo"<td><p>$sum1[$i]</p></td>";
  
  //Модем, шт.________________________________________
  $query2 = mysql_query("SELECT count(`type_pv_ou`) FROM monitoring.ou WHERE `$podrazdelenie`='$CTE[$i]' AND (`type_pv_ou`='Модем') AND (`otmetka`='-')")or die("Ошибка ".mysql_error()); 
  $sum2[$i]=mysql_result($query2,0); 
  echo"<td><p>$sum2[$i]</p></td>";
  
  //DSLAМ, шт.________________________________________
  $query3 = mysql_query("SELECT count(`type_pv_ou`) FROM monitoring.ou WHERE `$podrazdelenie`='$CTE[$i]' AND (`type_pv_ou`='Оборудование DSLAM') AND (`otmetka`='-')")or die("Ошибка ".mysql_error()); 
  $sum3[$i]=mysql_result($query3,0); 
  echo"<td><p>$sum3[$i]</p></td>";
  
  //РРЛ, р/у, шт.___________________________________________
  $query4 = mysql_query("SELECT count(`type_pv_ou`) FROM monitoring.ou WHERE `$podrazdelenie`='$CTE[$i]' AND (`type_pv_ou`='РРЛ, р/у
') AND (`otmetka`='-')")or die("Ошибка ".mysql_error());
  $sum4[$i]=mysql_result($query4,0); 
  echo"<td><p>$sum4[$i]</p></td>";

  //VSAT, шт._______________________________________________ 
  $query5 = mysql_query("SELECT count(`type_pv_ou`) FROM monitoring.ou WHERE `$podrazdelenie`='$CTE[$i]' AND (`type_pv_ou`='Оборудование VSAT') AND (`otmetka`='-')")or die("Ошибка ".mysql_error()); 
  $sum5[$i]=mysql_result($query5,0); 
  echo"<td><p>$sum5[$i]</p></td>";
  
  //Оборудование АБ шт._____________________________ 
  $query6 = mysql_query("SELECT count(`type_pv_ou`) FROM monitoring.ou WHERE `$podrazdelenie`='$CTE[$i]' AND (`type_pv_ou`='Оборудование АБ') AND (`otmetka`='-')")or die("Ошибка ".mysql_error());
  $sum6[$i]=mysql_result($query6,0); 
  echo"<td><p>$sum6[$i]</p></td>";

  //Оборудование МСС______________________________________________________
  $query7 = mysql_query("SELECT count(`type_pv_ou`) FROM monitoring.ou WHERE `$podrazdelenie`='$CTE[$i]' AND (`type_pv_ou`='Оборудование МСС')  AND (`otmetka`='-')")or die("Ошибка ".mysql_error());
  $sum7[$i]=mysql_result($query7,0); 
  echo"<td><p>$sum7[$i]</p></td>";

  //не выявленно ______________________________________________________
  $query8 = mysql_query("SELECT count(`type_pv_ou`) FROM monitoring.ou WHERE `$podrazdelenie`='$CTE[$i]' AND (`type_pv_ou`='Не выявлено')  AND (`otmetka`='-')")or die("Ошибка ".mysql_error());
  $sum8[$i]=mysql_result($query8,0); 
  echo"<td><p>$sum8[$i]</p></td>";
  
  //Всего шт.______________________________________________________
  $query9 = mysql_query("SELECT count(`type_pv_ou`) FROM monitoring.ou WHERE `$podrazdelenie`='$CTE[$i]' AND (`otmetka`='-')")or die("Ошибка ".mysql_error());
  $sum9[$i]=mysql_result($query9,0); 
  echo"<td><p>$sum9[$i]</p></td>"; 
  
  //Всего %______________________________ 
  $sum10[$i]=$sum9[$i]/$sum1[$i];
  $sum10[$i]=round($sum10[$i],3);           
  echo"<td><p>$sum10[$i]</p></td>";
  echo"</tr>";
} 
  echo"<tr align=center valign=middle bgcolor=#00568E class=st5>";
  echo"<td><p><strong>ИТОГО:</strong></p></td>";

  foreach ($sum1 as $index => $znach) { $itog0=@$itog0+$znach;}
  echo"<td><p><strong>$itog0</strong></p></td>";  
  
  foreach ($sum2 as $index => $znach) { $itog1=@$itog1+$znach;}
  echo"<td><p><strong>$itog1</strong></p></td>";
  foreach ($sum3 as $index => $znach) { $itog2=@$itog2+$znach;}
  echo"<td><p><strong>$itog2</strong></p></td>";
  foreach ($sum4 as $index => $znach) { $itog3=@$itog3+$znach;}
  echo"<td><p><strong>$itog3</strong></p></td>";
  foreach ($sum5 as $index => $znach) { $itog4=@$itog4+$znach;}
  echo"<td><p><strong>$itog4</strong></p></td>";  
  foreach ($sum6 as $index => $znach) { $itog5=@$itog5+$znach;}
  echo"<td><p><strong>$itog5</strong></p></td>";
  foreach ($sum7 as $index => $znach) { $itog6=@$itog6+$znach;}
  echo"<td><p><strong>$itog6</strong></p></td>";
  foreach ($sum8 as $index => $znach) { $itog7=@$itog7+$znach;}
  echo"<td><p><strong>$itog7</strong></p></td>";
  foreach ($sum9 as $index => $znach) { $itog8=@$itog8+$znach;}
  echo"<td><p><strong>$itog8</strong></p></td>";
  foreach ($sum10 as $index => $znach) { $itog9=@$itog9+$znach;}
  echo"<td><p><strong>$itog9</strong></p></td>";  
  echo"</tr>";   

mysql_close();
?>  
 
</table>
