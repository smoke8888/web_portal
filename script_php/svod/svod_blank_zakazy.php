
<div align=center class="table_name">Сводный отчет по движению бланк-заказов</div>
<table class="Table" align=center width=50%>
  <thead><tr align=center>
    <th><p>Показатель</p></th>
    <th><p>Канал VPN</p></th>
    <th><p>Цифровой канал</p></th>
    <th><p>Аналоговый канал</p></th>
    <th><p>Точка присоединения к сети ПД</p></th>
  </tr><thead>

<?php
$FROM = " FROM `spravochnik`.`type_kanala_bz`, `spravochnik`.`company`, `spravochnik`.`flag_garantiya`, `spravochnik`.`flag_last_mile`, `spravochnik`.`flag_bz`, `reestr`.`blank_zakazy`";
$WHERE = " WHERE (`spravochnik`.`type_kanala_bz`.`id` = `reestr`.`blank_zakazy`.`id_type_kanala_bz`) AND (`spravochnik`.`company`.`id` = `reestr`.`blank_zakazy`.`id_company`) AND (`spravochnik`.`flag_garantiya`.`id` = `reestr`.`blank_zakazy`.`id_flag_garantiya`) AND (`spravochnik`.`flag_last_mile`.`id` = `reestr`.`blank_zakazy`.`id_flag_last_mile`) AND (`spravochnik`.`flag_bz`.`id` = `reestr`.`blank_zakazy`.`id_flag_bz`)";

// VPN и цифровой канал связи
//всего
$WHERE1 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=1)";
$WHERE2 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=2)";
//из них в работе по определению ТВ
$WHERE3 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=1) AND (`date_postupl_TV_ot_CTE`='0000-00-00') AND (`date_pered_BZ_v_STPP`<>'0000-00-00')";
$WHERE4 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=2) AND (`date_postupl_TV_ot_CTE`='0000-00-00') AND (`date_pered_BZ_v_STPP`<>'0000-00-00')";
//из них на подписи в КБ
$WHERE5 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=1) AND (`date_naprav_BZ_v_KB`<>'0000-00-00') AND (`date_pered_BZ_v_STPP_install`='0000-00-00')"; 
$WHERE6 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=2) AND (`date_naprav_BZ_v_KB`<>'0000-00-00') AND (`date_pered_BZ_v_STPP_install`='0000-00-00')"; 
//из них не поступило БЗ от КБ
$WHERE7 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=1) AND (`date_pered_BZ_v_STPP`='0000-00-00')";
$WHERE8 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=2) AND (`date_pered_BZ_v_STPP`='0000-00-00')";
//из них в работе в УЭР
$WHERE9 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=1) AND (`date_peredachi_BZ_v_UR_gde_net_TV`<>'0000-00-00')";
$WHERE10 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=2) AND (`date_peredachi_BZ_v_UR_gde_net_TV`<>'0000-00-00')";
//из них СТТП ГЦТЭ не передал отработанные БЗ в КБ
$WHERE11 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=1) AND (`date_pered_BZ_v_STPP`<>'0000-00-00') AND (`date_postupl_TV_ot_CTE`<>'0000-00-00') AND (`date_naprav_BZ_v_KB`='0000-00-00') AND (`date_peredachi_BZ_v_UR_gde_net_TV`='0000-00-00')";
$WHERE12 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=2) AND (`date_pered_BZ_v_STPP`<>'0000-00-00') AND (`date_postupl_TV_ot_CTE`<>'0000-00-00') AND (`date_naprav_BZ_v_KB`='0000-00-00') AND (`date_peredachi_BZ_v_UR_gde_net_TV`='0000-00-00')";
//из них передано на инсталляцию
$WHERE13 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=1) AND (`date_pered_BZ_v_STPP_install`<>'0000-00-00')";
$WHERE14 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=2) AND (`date_pered_BZ_v_STPP_install`<>'0000-00-00')";
//из них отработано СТПП ГЦТЭ
$WHERE15 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=1) AND (LENGTH(`ord`)>5)";
$WHERE16 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=2) AND (LENGTH(`ord`)>5)";

//Аналоговый канал
$WHERE17 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=4)";
$WHERE18 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=4) AND (`date_postupl_TV_ot_CTE`='0000-00-00') AND (`date_pered_BZ_v_STPP`<>'0000-00-00')";
$WHERE19 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=4) AND (`date_naprav_BZ_v_KB`<>'0000-00-00') AND (`date_pered_BZ_v_STPP_install`='0000-00-00')"; 
$WHERE20 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=4) AND (`date_pered_BZ_v_STPP`='0000-00-00')";
$WHERE21 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=4) AND (`date_peredachi_BZ_v_UR_gde_net_TV`<>'0000-00-00')";
$WHERE22 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=4) AND (`date_pered_BZ_v_STPP`<>'0000-00-00') AND (`date_postupl_TV_ot_CTE`<>'0000-00-00') AND (`date_naprav_BZ_v_KB`='0000-00-00') AND (`date_peredachi_BZ_v_UR_gde_net_TV`='0000-00-00')";
$WHERE23 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=4) AND (`date_pered_BZ_v_STPP_install`<>'0000-00-00')";
$WHERE24 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=4) AND (LENGTH(`ord`)>5)";

// точка присоединения к сети ПД
$WHERE33 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=3)";
$WHERE34 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=3) AND (`date_postupl_TV_ot_CTE`='0000-00-00') AND (`date_pered_BZ_v_STPP`<>'0000-00-00')";
$WHERE35 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=3) AND (`date_naprav_BZ_v_KB`<>'0000-00-00') AND (`date_pered_BZ_v_STPP_install`='0000-00-00')"; 
$WHERE36 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=3) AND (`date_pered_BZ_v_STPP`='0000-00-00')";
$WHERE37 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=3) AND (`date_peredachi_BZ_v_UR_gde_net_TV`<>'0000-00-00')";
$WHERE38 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=3) AND (`date_pered_BZ_v_STPP`<>'0000-00-00') AND (`date_postupl_TV_ot_CTE`<>'0000-00-00') AND (`date_naprav_BZ_v_KB`='0000-00-00') AND (`date_peredachi_BZ_v_UR_gde_net_TV`='0000-00-00')";
$WHERE39 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=3) AND (`date_pered_BZ_v_STPP_install`<>'0000-00-00')";
$WHERE40 = " (`id_flag_bz`=3) AND (`id_type_kanala_bz`=3) AND (LENGTH(`ord`)>3)";

 
   $query1 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE1);
   $num1 = mysql_fetch_row($query1); $num1 = $num1[0];
   $query2 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE2);
   $num2 = mysql_fetch_row($query2); $num2 = $num2[0];
   $query3 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE3);
   $num3 = mysql_fetch_row($query3); $num3 = $num3[0]; 
   $query4 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE4);
   $num4 = mysql_fetch_row($query4); $num4 = $num4[0];
   $query5 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy`WHERE".$WHERE5); 
   $num5 = mysql_fetch_row($query5); $num5 = $num5[0];
   $query6 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE6);  
   $num6 = mysql_fetch_row($query6); $num6 = $num6[0]; 
   $query7 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE7);
   $num7 = mysql_fetch_row($query7); $num7 = $num7[0];
   $query8 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE8);
   $num8 = mysql_fetch_row($query8); $num8 = $num8[0];
   $query9 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE9);
   $num9 = mysql_fetch_row($query9); $num9 = $num9[0];
   $query10 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE10);
   $num10 = mysql_fetch_row($query10); $num10 = $num10[0];
   $query11 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE11);
   $num11 = mysql_fetch_row($query11); $num11 = $num11[0];
   $query12 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE12);
   $num12 = mysql_fetch_row($query12); $num12 = $num12[0];
   $query13 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE13);
   $num13 = mysql_fetch_row($query13); $num13 = $num13[0];
   $query14 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE14);
   $num14 = mysql_fetch_row($query14); $num14 = $num14[0];
   $query15 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE15);
   $num15 = mysql_fetch_row($query15); $num15 = $num15[0];
   $query16 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE16);
   $num16 = mysql_fetch_row($query16); $num16 = $num16[0];


   $query17 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE17);
   $num17 = mysql_fetch_row($query17); $num17 = $num17[0];
   $query18 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE18);
   $num18 = mysql_fetch_row($query18); $num18 = $num18[0];
   $query19 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE19);
   $num19 = mysql_fetch_row($query19); $num19 = $num19[0];   
   $query20 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE20);
   $num20 = mysql_fetch_row($query20); $num20 = $num20[0];
   $query21 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE21);
   $num21 = mysql_fetch_row($query21); $num21 = $num21[0];
   $query22 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE22);
   $num22 = mysql_fetch_row($query22); $num22 = $num22[0];
   $query23 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE23);
   $num23 = mysql_fetch_row($query23); $num23 = $num23[0];
   $query24 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE24);
   $num24 = mysql_fetch_row($query24); $num24 = $num24[0];
  
   $query33 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE33);
   $num33 = mysql_fetch_row($query33); $num33 = $num33[0];
   $query34 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE34);
   $num34 = mysql_fetch_row($query34); $num34 = $num34[0];
   $query35 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE35);
   $num35 = mysql_fetch_row($query35); $num35 = $num35[0];
   $query36 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE36);
   $num36 = mysql_fetch_row($query36); $num36 = $num36[0];
   $query37 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE37);
   $num37 = mysql_fetch_row($query37); $num37 = $num37[0];
   $query38 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE38);
   $num38 = mysql_fetch_row($query38); $num38 = $num38[0];
   $query39 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE39);
   $num39 = mysql_fetch_row($query39); $num39 = $num39[0];
   $query40 = mysql_query("SELECT COUNT(`id`) FROM `reestr`.`blank_zakazy` WHERE".$WHERE40);
   $num40 = mysql_fetch_row($query40); $num40 = $num40[0];   


  echo"<tbody><tr align=center height=30>";
    echo"<td><strong>Всего БЗ (Канал не вкл.)</strong></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=1\"><strong>$num1</strong></a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=2\"><strong>$num2</strong></a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=17\"><strong>$num17</strong></a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=33\"><strong>$num33</strong></a></td>";
  echo"</tr>";
  echo"<tr align=center height=30>";
    echo"<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;из них не поступило БЗ от КБ</td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=7\">$num7</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=8\">$num8</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=20\">$num20</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=36\">$num36</a></td>";
  echo"</tr>";   
  echo"<tr align=center height=30>";
    echo"<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;из них в работе по определению ТВ</td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=3\">$num3</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=4\">$num4</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=18\">$num18</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=34\">$num34</a></td>";
  echo"</tr>";
  echo"<tr align=center height=30>";
    echo"<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;из них на подписи в КБ</td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=5\">$num5</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=6\">$num6</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=19\">$num19</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=35\">$num35</a></td>";
  echo"</tr>";
  echo"<tr align=center height=30>";
    echo"<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;из них в работе в УЭР</td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=9\">$num9</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=10\">$num10</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=21\">$num21</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=37\">$num37</a></td>";
  echo"</tr>";   
  echo"<tr align=center height=30>";
    echo"<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;из них СТТП ГЦТЭ не передал отработанные БЗ в КБ</td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=11\">$num11</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=12\">$num12</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=22\">$num22</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=38\">$num38</a></td>";
  echo"</tr>";
    echo"<tr align=center height=30>";
    echo"<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;из них передано на инсталляцию</td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=13\">$num13</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=14\">$num14</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=23\">$num23</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=39\">$num39</a></td>";
  echo"</tr>";   
  echo"</tr>";
    echo"<tr align=center height=30>";
    echo"<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;из них отработано СТПП ГЦТЭ</td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=15\">$num15</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=16\">$num16</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=24\">$num24</a></td>";
    echo"<td><a href=\"index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&table=40\">$num40</a></td>";   
  echo"</tr></tbody>";   
      
echo"</table><br><br>";


if ((@$table>0)&&(@$table<41))
{
   if ($table == 1) {$WHERE = $WHERE." AND".$WHERE1;}
   if ($table == 2) {$WHERE = $WHERE." AND".$WHERE2;}
   if ($table == 3) {$WHERE = $WHERE." AND".$WHERE3;}
   if ($table == 4) {$WHERE = $WHERE." AND".$WHERE4;}
   if ($table == 5) {$WHERE = $WHERE." AND".$WHERE5;}
   if ($table == 6) {$WHERE = $WHERE." AND".$WHERE6;}  
   if ($table == 7) {$WHERE = $WHERE." AND".$WHERE7;}
   if ($table == 8) {$WHERE = $WHERE." AND".$WHERE8;}
   if ($table == 9) {$WHERE = $WHERE." AND".$WHERE9;}
   if ($table == 10) {$WHERE = $WHERE." AND".$WHERE10;}
   if ($table == 11) {$WHERE = $WHERE." AND".$WHERE11;}
   if ($table == 12) {$WHERE = $WHERE." AND".$WHERE12;}
   if ($table == 13) {$WHERE = $WHERE." AND".$WHERE13;}
   if ($table == 14) {$WHERE = $WHERE." AND".$WHERE14;}   
   if ($table == 15) {$WHERE = $WHERE." AND".$WHERE15;}
   if ($table == 16) {$WHERE = $WHERE." AND".$WHERE16;}
   if ($table == 17) {$WHERE = $WHERE." AND".$WHERE17;}
   if ($table == 18) {$WHERE = $WHERE." AND".$WHERE18;}
   if ($table == 19) {$WHERE = $WHERE." AND".$WHERE19;}
   if ($table == 20) {$WHERE = $WHERE." AND".$WHERE20;}
   if ($table == 21) {$WHERE = $WHERE." AND".$WHERE21;}   
   if ($table == 22) {$WHERE = $WHERE." AND".$WHERE22;}
   if ($table == 23) {$WHERE = $WHERE." AND".$WHERE23;}
   if ($table == 24) {$WHERE = $WHERE." AND".$WHERE24;}
   if ($table == 33) {$WHERE = $WHERE." AND".$WHERE33;}   
   if ($table == 34) {$WHERE = $WHERE." AND".$WHERE34;}
   if ($table == 35) {$WHERE = $WHERE." AND".$WHERE35;} 
   if ($table == 36) {$WHERE = $WHERE." AND".$WHERE36;}
   if ($table == 37) {$WHERE = $WHERE." AND".$WHERE37;}    
   if ($table == 38) {$WHERE = $WHERE." AND".$WHERE38;} 
   if ($table == 39) {$WHERE = $WHERE." AND".$WHERE39;}    
   if ($table == 40) {$WHERE = $WHERE." AND".$WHERE40;} 
   
$query_table = mysql_query("SELECT `reestr`.`blank_zakazy`.`id`, `spravochnik`.`company`.`company`, `spravochnik`.`flag_garantiya`.`flag_garantiya`, `spravochnik`.`flag_last_mile`.`flag_last_mile`, `reestr`.`blank_zakazy`.`project_name`, `reestr`.`blank_zakazy`.`blank_zakaz`, `reestr`.`blank_zakazy`.`fio_kb`, `reestr`.`blank_zakazy`.`ord`, `reestr`.`blank_zakazy`.`srok_ispolneniya`, `reestr`.`blank_zakazy`.`channel_speed`, `reestr`.`blank_zakazy`.`interface`, `reestr`.`blank_zakazy`.`centers_name`, `reestr`.`blank_zakazy`.`napravlenie`, `reestr`.`blank_zakazy`.`date_pered_BZ_v_STPP`, `reestr`.`blank_zakazy`.`date_postupl_TV_ot_CTE`, `reestr`.`blank_zakazy`.`date_peredachi_BZ_v_UR_gde_net_TV`, `reestr`.`blank_zakazy`.`date_naprav_BZ_v_KB`, `reestr`.`blank_zakazy`.`date_pered_BZ_v_STPP_install`, `reestr`.`blank_zakazy`.`date_predost_akt_install`, `reestr`.`blank_zakazy`.`primechanie`, `reestr`.`blank_zakazy`.`razovyi_platej`, `reestr`.`blank_zakazy`.`abon_plata`, `reestr`.`blank_zakazy`.`timestamp`".$FROM.$WHERE);

/////////// Если запрос вернул пустой результат ///////////////////////////////////////////////////////////////////////////////////
if (!mysql_num_rows($query_table)) 
{
	echo"<table border=1 align=center>
	<tr bgcolor=\"red\" align=\"center\"><td><strong>Внимание!</strong></td></tr>
	<tr>
		<td>
			<p align=center>По вашему запросу ничего не найдено!</p></td>
	</tr>";
}

//// Вывод таблицы на экран //////////////////////////////////////////////////////////////////////////////////////////////////////
$query_doc = mysql_query("SELECT * FROM `engine`.`doc` WHERE `id`='76'");   
while($doc = @mysql_fetch_assoc($query_doc)) 
{
    $doc_array = $doc;
}
include("script_php/privilegies.php");

echo"<table border=0 cellpadding=1 cellspacing=0 id='data_table' class='data Table'>";
$p=1; $N=1;
if (mysql_num_rows($query_table)) mysql_data_seek($query_table,0);
while($table = @mysql_fetch_assoc($query_table)) 
{
	if ($p == 1) 
	{       
		echo"<thead>";
		echo"<tr>";
		echo "<th></th>";    
		echo "<th>№пп</th>";
	 	foreach ($table as $ind => $zn)
		{
		       if ($ind!="id") {                                          //вывод заголовков столбцов                      
		       echo"<th>";
		       $query_rusfield = mysql_query("SELECT `rus_field` FROM `engine`.`tables_fields` WHERE `eng_field` = '".$ind."'")or die($error_message_on_query.mysql_error()); 
		       $rusfield = @mysql_fetch_row($query_rusfield);   
		       if (!$rusfield) {$rusfield[0] = "<h1>".$ind."</h1>";}  // если русского аналога названия не находим, то выделяем его
		       echo $rusfield[0]; //вывод название поля;
		       echo"</th>";
		       }
		} 
		echo"</tr>";
		echo"</thead>";		 
	}
	$p=2; $i=0;
	echo"<tbody>";
	echo"<tr>";	
	foreach ($table as $ind => $zn)
	{
		if ($i==0)
		{	
			echo"<td align=center >";
			if (($doc_array['edit_row'] == 1)&&($update_privilegies == true)&&($zn != 0)) 
			{		
			?>
			                                  <!--кнопочка редактирования строки-->
			<img src='images/edit.png' border=0 style="cursor: pointer;" onclick="if (confirm('Вы будете редактировать запись?')) {parent.location='index.php?action=edit&id_top_menu=3&id_sub_menu=71&from_top_menu=5&from_sub_menu=74&num_row=<?php echo $zn;?>';}" title='Редактировать'>  		
			<?php
			}
			else {echo"<img src='images/edit_none.png' border=0 title='Редактировать'>";} 
			echo"</td>";
			echo"<td align=center><p>".$N."</p></td>";
		}
		else {echo"<td><p>".$zn."</p></td>";}     
                     
		++$i;
	}
	echo"</tr>";
	echo"</tbody>";
	++$N;
}
echo"</table>";
}
?>