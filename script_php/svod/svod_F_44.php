<?php
//___________________________содеинение с БД $DB____________________________________________ 
$openConn2db = mysql_connect("localhost", "$PHP_AUTH_USER", "$PHP_AUTH_PW"); 
//___________________установка национальной кодировки после соединения с БД_________________
  mysql_query ("set character_set_client='cp1251'");  
  mysql_query ("set character_set_results='cp1251'");  
  mysql_query ("set collation_connection='cp1251_general_ci'"); 
?>

<table width="800" cellpadding="1" cellspacing="1" align=center>
  <tr bgcolor="#00568E" class="st2">
    <td colspan="5" class="xl31"><p align="center"><strong>Форма 44-связь. </strong></p>
    <p align="center"><strong>Сведения о технических средствах сетей местной телефонной связи за 2007 год</strong></p></td>
  </tr>
  <tr bgcolor="#00568E" class="st2">
    <td class="xl46"><div align="center">
      <p>Наименование показателя</p>
    </div></td>
    <td width="70" class="xl46"><div align="center">
      <p>№ строки </p>
    </div>      
      <div align="center"></div></td>
    <td width="116" class="xl46"><div align="center">
      <p>Предыдущ. отч. год </p>
    </div>      <div align="center"></div></td>
    <td width="116" class="xl46"><div align="center">
      <p>Отчетный год </p>
      </div></td>
    <td width="136" class="xl46"><div align="center">
      <p>Изменение за год </p>
      </div></td>
  </tr>
<!--///========================================1 раздел====================================================================================/-->
  <tr bgcolor="#4AB7FF">
    <td colspan="5" class="xl50"><p><strong>1. Телефонные станции в городской местности </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl33"><p>Телефонные станции - всего (шт) </p></td>
    <td class="xl34"><p>100_3</p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='100_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE (`net_type`='гтс') AND (`net_function`<>'ПСЭ') $AND")or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Монтированная емкость станций - всего (номеров) </p></td>
    <td class="xl34"><p>100_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='100_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='гтс') $AND")or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Использованная емкость станций - всего (номеров) </p></td>
    <td class="xl34"><p>100_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='100_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='гтс') $AND")or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl37"><p>в т.ч. автоматические телефонные станции (АТС) (шт) </p></td>
    <td class="xl34"><p>110_3 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='110_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE (`net_type`='гтс') AND (`net_function`<>'ПСЭ') $AND")or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Монтированная емкость АТС (номеров) </p></td>
    <td class="xl34"><p>110_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='110_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='гтс') $AND")or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Использованная емкость АТС (номеров) </p></td>
    <td class="xl34"><p>110_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='110_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='гтс') $AND")or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>из них: декадно-шаговые (шт) </p></td>
    <td class="xl34"><p>111_3 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='111_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p>0</p></td>
    <td width="136" class="xl35"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Монтированная емкость (номеров) </p></td>
    <td class="xl34"><p>111_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='111_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p>0</p></td>
    <td width="136" class="xl35"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Использованная емкость (номеров) </p></td>
    <td class="xl34"><p>111_5 </p></td>
    <td width="116" class="xl47"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='111_5'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl47"><p>0</p></td>
    <td width="136" class="xl35"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>координатные (шт) </p></td>
    <td class="xl34"><p>112_3 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='112_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE  (`net_type`='гтс') AND 
	(`oborud_type`='А') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Монтированная емкость (номеров) </p></td>
    <td class="xl34"><p>112_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='112_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='гтс') AND 
	(`oborud_type`='А') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Использованная емкость (номеров) </p></td>
    <td class="xl34"><p>112_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='112_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='гтс') AND 
	(`oborud_type`='А') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>квазиэлектронные (шт) </p></td>
    <td class="xl34"><p>113_3 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='113_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE  (`net_type`='гтс') AND 
	(`oborud_type`='КЭ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Монтированная емкость (номеров) </p></td>
    <td class="xl34"><p>113_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='113_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='гтс') AND 
	(`oborud_type`='КЭ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Использованная емкость (номеров)</p></td>
    <td class="xl34"><p>113_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='113_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='гтс') AND 
	(`oborud_type`='КЭ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl38"><p>электронные (шт) </p></td>
    <td class="xl34"><p>114_3 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='114_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE  (`net_type`='гтс') AND 
	(`oborud_type`='Ц') AND (`net_function`<>'ПСЭ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Монтированная емкость (номеров) </p></td>
    <td class="xl34"><p>114_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='114_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='гтс') AND 
	(`oborud_type`='Ц') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Использованная емкость (номеров) </p></td>
    <td class="xl34"><p>114_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='114_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='гтс') AND 
	(`oborud_type`='Ц') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl37"><p>Имеющие выход на междугородную телефонную станцию </p></td>       
    <td class="xl34"><p>116_3</p></td>
    <td width="116" class="xl39"> <p>&nbsp;</p></td>
    <td width="116" class="xl39"> <p>&nbsp;</p></td>
    <td width="136" class="xl39"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;монтированная емкость (номеров) </p></td>
    <td class="xl34"><p>116_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='116_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;использованная емкость (номеров) </p></td>
    <td class="xl34"><p>116_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='116_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>в том числе оборудованные аппаратурой автоматического определения номера (АОН) </p></td>
    <td class="xl34"><p>117_3 </p></td>
    <td width="116" class="xl39"> <p></p></p></td>
    <td width="116" class="xl39"> <p>&nbsp;</p></td>
    <td width="136" class="xl39"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;монтированная емкость (номеров) </p></td>
    <td class="xl34"><p>117_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='117_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;использованная емкость (номеров) </p></td>
    <td class="xl34"><p>117_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='117_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl37"><p>Оборудованные системами радиодоступа </p></td>
    <td class="xl34"><p>118_3</p></td>
    <td width="116" class="xl39"><p>&nbsp;</p></td>
    <td width="116" class="xl39"><p>&nbsp;</p></td>
    <td width="136" class="xl39"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;монтированная емкость (номеров) </p></td>
    <td class="xl34"><p>118_4</p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='118_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p><?php $sum2=0; ?>0</p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;использованная емкость (номеров) </p></td>
    <td class="xl34"><p>118_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='118_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p><?php $sum2=0; ?>0</p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>с функциями ISDN (комплекты BRI) </p></td>
    <td class="xl34"><p>119_3 </p></td>
    <td width="116" class="xl39"><p>&nbsp;</p></td>
    <td width="116" class="xl39"><p>&nbsp;</p></td>
    <td width="136" class="xl39"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;монтированная емкость (номеров) </p></td>
    <td class="xl34"><p>119_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='119_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_isdn`) FROM yearreport.ats WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;использованная емкость (номеров) </p></td>
    <td class="xl34"><p>119_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='119_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_isdn`) FROM yearreport.ats WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl37"><p>оборудованные аппаратурой повременного учета продолжительности соединений (АПУС) </p></td>
    <td class="xl34"><p>120_3 </p></td>
    <td width="116" class="xl39"> <p></p></p></td>
    <td width="116" class="xl39"> <p>&nbsp;</p></td>
    <td width="136" class="xl39"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;монтированная емкость (номеров) </p></td>
    <td class="xl34"><p>120_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='120_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_apus`) FROM yearreport.ats WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;использованная емкость (номеров) </p></td>
    <td class="xl34"><p>120_5 </p></td>
    <td width="116" class="xl48"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='120_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl48"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_apus`) FROM yearreport.ats WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl37"><p>Учрежденческие станции, имеющие выход на сеть данного оператора (шт) </p></td>
    <td class="xl34"><p>121_3 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='121_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p>&nbsp;</p></td>
    <td width="136" class="xl35"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;монтированная емкость (номеров) </p></td>
    <td class="xl34"><p>121_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='121_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`mont_capacity`) FROM yearreport.upats  WHERE (`net_type`='гтс') AND (`sposob_vkl_upats`='КСЛ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;использованная емкость (номеров) </p></td>
    <td class="xl34"><p>121_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='121_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity`) FROM yearreport.upats  WHERE (`net_type`='гтс') AND (`sposob_vkl_upats`='КСЛ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
<!--///========================================2 раздел====================================================================================/-->  
  <tr bgcolor="#4AB7FF">
    <td colspan="5" class="xl69"><p><strong>2. Телефонные станции в сельской местности</strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl29"><p>Телефонные станции - всего (шт) </p></td>
    <td class="xl30"><p>200_3 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='200_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE (`net_type`='стс') AND (`net_function`<>'ПСЭ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Монтированная емкость станций - всего (номеров) </p></td>
    <td class="xl30"><p>200_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='200_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='стс') $AND")or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Использованная емкость станций - всего (номеров) </p></td>
    <td class="xl30"><p>200_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='200_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='стс') $AND")or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>в т.ч. автоматические телефонные станции (АТС) (шт) </p></td>
    <td class="xl30"><p>210_3 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='210_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE (`net_type`='стс') AND (`net_function`<>'ПСЭ') $AND")or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Монтированная емкость АТС (номеров) </p></td>
    <td class="xl30"><p>210_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='210_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='стс') $AND")or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Использованная емкость АТС (номеров) </p></td>
    <td class="xl30"><p>210_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='210_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='стс') $AND")or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>из них: декадно-шаговые (шт) </p></td>
    <td class="xl30"><p>211_3 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='211_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl64"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Монтированная емкость (номеров) </p></td>
    <td class="xl30"><p>211_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='211_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl64"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Использованная емкость (номеров) </p></td>
    <td class="xl30"><p>211_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='211_5'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl64"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>координатные (шт) </p></td>
    <td class="xl30"><p>212_3</p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='212_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE  (`net_type`='стс') AND 
	(`oborud_type`='А') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Монтированная емкость (номеров) </p></td>
    <td class="xl30"><p>212_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='212_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='стс') AND 
	(`oborud_type`='А') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Использованная емкость (номеров) </p></td>
    <td class="xl30"><p>212_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='212_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='стс') AND 
	(`oborud_type`='А') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>квазиэлектронные (шт) </p></td>
    <td class="xl30"><p>213_3 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='213_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE (`net_type`='стс') AND 
	(`oborud_type`='КЭ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Монтированная емкость (номеров) </p></td>
    <td class="xl30"><p>213_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='213_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='стс') AND 
	(`oborud_type`='КЭ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Использованная емкость (номеров) </p></td>
    <td class="xl30"><p>213_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='213_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='стс') AND 
	(`oborud_type`='КЭ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl34"><p>электронные (шт) </p></td>
    <td class="xl30"><p>214_3 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='214_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE  (`net_type`='стс') AND 
	(`oborud_type`='Ц') AND (`net_function`<>'ПСЭ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Монтированная емкость (номеров) </p></td>
    <td class="xl30"><p>214_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='214_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='стс') AND 
	(`oborud_type`='Ц') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Использованная емкость (номеров) </p></td>
    <td class="xl30"><p>214_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='214_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='стс') AND 
	(`oborud_type`='Ц') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl33"><p>Имеющие выход на междугородную телефонную станцию </p></td>
    <td class="xl30"><p>216_3 </p></td>
    <td width="116" class="xl35"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='216_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl35"> <p>&nbsp;</p></td>
    <td width="136" class="xl35"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;монтированная емкость (номеров) </p></td>
    <td class="xl30"><p>216_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='216_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;использованная емкость (номеров) </p></td>
    <td class="xl30"><p>216_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='216_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>в том числе оборудованные аппаратурой автоматического определения номера (АОН) </p></td>
    <td class="xl30"><p>217_3 </p></td>
    <td width="116" class="xl35"> <p>&nbsp;</p></td>
    <td width="116" class="xl35"> <p>&nbsp;
    </p></td>
    <td width="136" class="xl35"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;монтированная емкость (номеров) </p></td>
    <td class="xl30"><p>217_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='217_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;использованная емкость (номеров) </p></td>
    <td class="xl30"><p>217_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='217_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl33"><p>Оборудованные системами радиодоступа </p></td>
    <td class="xl30"><p>218_3 </p></td>
    <td width="116" class="xl35"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='218_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl35"> <p>0</p></td>
    <td width="136" class="xl35"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;монтированная емкость (номеров) </p></td>
    <td class="xl30"><p>218_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='218_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl64"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;использованная емкость (номеров) </p></td>
    <td class="xl30"><p>218_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='218_5'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl64"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>с функциями ISDN (комплекты BRI) </p></td>
    <td class="xl30"><p>219_3 </p></td>
    <td width="116" class="xl35"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='219_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl35"> <p>&nbsp;</p></td>
    <td width="136" class="xl35"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;монтированная емкость (номеров) </p></td>
    <td class="xl30"><p>219_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='219_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_isdn`) FROM yearreport.ats WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;использованная емкость (номеров) </p></td>
    <td class="xl30"><p>219_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='219_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_isdn`) FROM yearreport.ats WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl33"><p>оборудованные аппаратурой повременного учета продолжительности соединений (АПУС) </p></td>
    <td class="xl30"><p>220_3 </p></td>
    <td width="116" class="xl35"> <p></p></p></td>
    <td width="116" class="xl35"> <p>&nbsp;</p></td>
    <td width="136" class="xl35"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;монтированная емкость (номеров) </p></td>
    <td class="xl30"><p>220_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='220_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_apus`) FROM yearreport.ats WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;использованная емкость (номеров) </p></td>
    <td class="xl30"><p>220_5 </p></td>
    <td width="116" class="xl65"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='220_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl65"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_apus`) FROM yearreport.ats WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl33"><p>Учрежденческие станции, имеющие выход на сеть данного оператора (шт) </p></td>
    <td class="xl30"><p>221_3 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='221_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl64"> <p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;монтированная емкость (номеров) </p></td>
    <td class="xl30"><p>221_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='221_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`mont_capacity`) FROM yearreport.upats  WHERE (`net_type`='стс') AND (`sposob_vkl_upats`='КСЛ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;использованная емкость (номеров) </p></td>
    <td class="xl30"><p>221_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='221_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity`) FROM yearreport.upats  WHERE (`net_type`='стс') AND (`sposob_vkl_upats`='КСЛ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#4AB7FF">
 <!--///======================================== 3 раздел ================================================================================/-->
    <td colspan="5" class="xl68"><p><strong>3. Изменение монтированной емкости, номеров </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>Прибыло за отчетный год - всего (сумма стр.301, 302, 303) </p></td>
    <td class="xl30"><p>300 </p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в городской местности </p></td>
    <td class="xl30"><p>300_3 </p></td>
    <td width="116" class="xl46"><p>&nbsp;</p></td>
    <td width="116" class="xl46"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в сельской местности </p></td>
    <td class="xl30"><p>300_4 </p></td>
    <td width="116" class="xl46"><p>&nbsp;</p></td>
    <td width="116" class="xl46"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl47"><p>в т.ч.: за счет нового строительства и расширения </p></td>
    <td class="xl30"><p>301 </p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в городской местности </p></td>
    <td class="xl30"><p>301_3 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в сельской местности </p></td>
    <td class="xl30"><p>301_4 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>за счет реконструкции </p></td>
    <td class="xl30"><p>302 </p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в городской местности </p></td>
    <td class="xl30"><p>302_3 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в сельской местности </p></td>
    <td class="xl30"><p>302_4 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>принято от других организаций </p></td>
    <td class="xl30"><p>303 </p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в городской местности </p></td>
    <td class="xl30"><p>303_3 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в сельской местности </p></td>
    <td class="xl30"><p>303_4 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>в том числе переведено : из городской местности </p></td>
    <td class="xl30"><p>304_4 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;из сельской местности </p></td>
    <td class="xl30"><p>305_3 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>Убыло за отчетный год - всего </p></td>
    <td class="xl48"><p>306 </p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в городской местности </p></td>
    <td class="xl30"><p>306_3 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в сельской местности </p></td>
    <td class="xl30"><p>306_4 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#4AB7FF">
   <!--///======================================== 4 раздел ================================================================================/-->
    <td colspan="5" class="xl70"><p><strong>4. Абонентские устройства и таксофоны в городской местности </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl50"><p>Абонентские устройства, подсоединенные к станциям данного оператора - всего (без таксофонов) </p></td>
    <td class="xl53"><p>400 </p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="136" class="xl54"> <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl50"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Всего </p></td>
    <td class="xl55"><p>400_3 </p></td>
    <td width="116" class="xl66"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='400_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl66"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_total`) FROM yearreport.abon_ustr  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl57"><p>400_4 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='400_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_osnovn`) FROM yearreport.abon_ustr  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Из гр.400_3 - квартирные </p></td>
    <td class="xl57"><p>400_5 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='400_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_kvart`) FROM yearreport.abon_ustr  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl57"><p>400_6 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='400_6'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_kvart_osn`) FROM yearreport.abon_ustr  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>из них : </p></td>
    <td class="xl58"> <p>&nbsp;</p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="136" class="xl54"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl50"><p>имеющие выход на междугородную телефонную сеть </p></td>
    <td class="xl58"><p>403 </p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="136" class="xl54"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Всего </p></td>
    <td class="xl57"><p>403_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='403_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_total`) FROM yearreport.abon_ustr  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl57"><p>403_4 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='403_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_osnovn`) FROM yearreport.abon_ustr  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Из гр.403_3 - квартирные </p></td>
    <td class="xl57"><p>403_5 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='403_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_kvart`) FROM yearreport.abon_ustr  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl57"><p>403_6 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='403_6'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_kvart_osn`) FROM yearreport.abon_ustr  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl59"><p>через оборудование абонентского радиодоступа </p></td>
    <td class="xl58"><p>404 </p></td>
    <td width="116" class="xl60"> <p>&nbsp;</p></td>
    <td width="116" class="xl60"> <p>&nbsp;</p></td>
    <td width="136" class="xl45"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Всего </p></td>
    <td class="xl57"><p>404_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='404_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_total`) FROM yearreport.abon_ustr  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl57"><p>404_4 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='404_4'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_osnovn`) FROM yearreport.abon_ustr  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Из гр.404_3 - квартирные </p></td>
    <td class="xl57"><p>404_5 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='404_5'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_kvart`) FROM yearreport.abon_ustr  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl57"><p>404_6 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='404_6'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_kvart_osn`) FROM yearreport.abon_ustr  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl50"><p>Таксофоны всех типов - всего: </p></td>
    <td class="xl55"><p>410_3 </p></td>
    <td width="116" class="xl66"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='410_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl66"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в т. ч. с карточной системой оплаты </p></td>
    <td class="xl55"><p>411_3 </p></td>
    <td width="116" class="xl66"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='411_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl66"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl50"><p>универсальные (междугородно-городские) - всего </p></td>
    <td class="xl57"><p>412_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='412_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в т.ч. с карточной системой оплаты </p></td>
    <td class="xl57"><p>413_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='413_3'")or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='гтс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl50"><p>местные в городской местности -всего </p></td>
    <td class="xl57"><p>414_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='414_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в т.ч. с карточной системой оплаты </p></td>
    <td class="xl57"><p>415_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='415_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl59"><p>таксофоны междугородные (международны) в городской местности -всего </p></td>
    <td class="xl57"><p>416_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='416_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в т.ч. с карточной системой оплаты </p></td>
    <td class="xl57"><p>417_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='417_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl61"><p>Абонентские устройства учрежденческих станций, имеющих выход на данную сеть </p></td>
    <td class="xl58"><p>418 </p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="136" class="xl54"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Всего </p></td>
    <td class="xl62"><p>418_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='418_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl57"><p>418_4 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='418_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl63"><p>Абонентские устройства, включенные в оборудование автоматизированных переговорных пунктов </p></td>
    <td class="xl57"><p>419_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='419_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl63"><p>Из строки 410 - количество таксофонов, установленных в рамках программы универсального обслуживания* </p></td>
    <td class="xl57"><p>420_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='420_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='гтс') AND (`tax_type`='УУ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#4AB7FF">
   <!--///======================================== 5 раздел ================================================================================/-->
    <td colspan="5" class="xl78"><p><strong>5. Абонентские устройства и таксофоны в сельской местности </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>Абонентские устройства, подсоединенные к станциям данного оператора - всего (без таксофонов) </p></td>
    <td class="xl45"><p>500 </p></td>
    <td width="116" class="xl46"> <p>&nbsp;</p></td>
    <td width="116" class="xl46"> <p>&nbsp;</p></td>
    <td width="136" class="xl46"> <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Всего </p></td>
    <td class="xl49"><p>500_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='500_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_total`) FROM yearreport.abon_ustr  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl49"><p>500_4 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='500_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_osnovn`) FROM yearreport.abon_ustr  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Из гр.500_3 - квартирные </p></td>
    <td class="xl49"><p>500_5 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='500_5'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_kvart`) FROM yearreport.abon_ustr  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl49"><p>500_6 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='500_6'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_kvart_osn`) FROM yearreport.abon_ustr  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>имеющие выход на междугородную телефонную сеть </p></td>
    <td class="xl50"><p>503 </p></td>
    <td width="116" class="xl46"> <p>&nbsp;</p></td>
    <td width="116" class="xl46"> <p>&nbsp;</p></td>
    <td width="136" class="xl46"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Всего </p></td>
    <td class="xl49"><p>503_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='503_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_total`) FROM yearreport.abon_ustr  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl49"><p>503_4 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='503_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_osnovn`) FROM yearreport.abon_ustr  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Из гр.503_3 - квартирные </p></td>
    <td class="xl49"><p>503_5 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='503_5'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_kvart`) FROM yearreport.abon_ustr  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl49"><p>503_6 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='503_6'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_kvart_osn`) FROM yearreport.abon_ustr  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl51"><p>через оборудование абонентского радиодоступа </p></td>
    <td class="xl50"><p>504 </p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Всего </p></td>
    <td class="xl49"><p>504_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='504_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_total`) FROM yearreport.abon_ustr  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl49"><p>504_4 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='504_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_osnovn`) FROM yearreport.abon_ustr  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Из гр.504_3 - квартирные </p></td>
    <td class="xl49"><p>504_5 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='504_5'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_kvart`) FROM yearreport.abon_ustr  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl49"><p>504_6 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='504_6'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_kvart_osn`) FROM yearreport.abon_ustr  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>Таксофоны всех типов - всего: </p></td>
    <td class="xl47"><p>510_3 </p></td>
    <td width="116" class="xl76"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='510_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в том числе с карточной системой оплаты </p></td>
    <td class="xl47"><p>511_3 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='511_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>универсальные (междугородно-сельские) -всего </p></td>
    <td class="xl49"><p>512_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='512_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в т.ч. с карточной системой оплаты </p></td>
    <td class="xl49"><p>513_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='513_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='стс') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>местные в сельской местности-всего </p></td>
    <td class="xl49"><p>514_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='514_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>0</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в т.ч. с карточной системой оплаты </p></td>
    <td class="xl49"><p>515_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='515_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>0</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl51"><p>таксофоны междугородные (международны) в городской местности -всего </p></td>
    <td class="xl49"><p>516_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='516_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>0</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в т.ч. с карточной системой оплаты </p></td>
    <td class="xl49"><p>517_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='517_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>0</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl53"><p>Абонентские устройства учрежденческих станций, имеющих выход на данную сеть</p></td>
    <td class="xl47"><p>518</p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Всего</p></td>
    <td class="xl49"><p>518_3</p></td>
    <td class="xl75"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='518_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td class="xl75"><p>&nbsp;</p></td>
    <td class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В том числе основные </p></td>
    <td class="xl49"><p>518_4 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='518_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl56"><p>Абонентские устройства,включенные в оборудование автоматизированных переговорных пунктов - всего </p></td>
    <td class="xl49"><p>519_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='519_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl54"><p>Из строки 510 - количество таксофонов,установленных в рамках программы универсального обслуживания* </p></td>
    <td class="xl49"><p>520_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='520_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='гтс') AND (`tax_type`='УУ') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#4AB7FF">
   <!--///======================================== 6 раздел ================================================================================/-->
    <td colspan="5" class="xl79"><p><strong>6. Телефонизация объектов сельской местности </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>Населенные пункты -всего </p></td>
    <td class="xl29"><p>600_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='600_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>из них: телефонизированные </p></td>
    <td class="xl29"><p>600_4 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='600_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в том числе малонаселенные (до 50 человек) - всего </p></td>
    <td class="xl29"><p>610_3 </p></td>
    <td width="116" class="xl77"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='610_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl77"><p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;из них: телефонизированные </p></td>
    <td class="xl29"><p>610_4 </p></td>
    <td width="116" class="xl77"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='610_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl77"><p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>Объекты социальной сферы - всего </p></td>
    <td class="xl29"><p>620_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='620_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;из них телефонизированные: </p></td>
    <td class="xl42"><p>620_4 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='620_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#4AB7FF">
   <!--///======================================== 7 раздел ================================================================================/-->
    <td colspan="5" class="xl82"><p><strong>7. Соединительные линии и линейное хозяйство </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>Число соединительных линий, единиц </p></td>
    <td class="xl29"><p>700_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='700_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_fiz_lines_sl`) FROM yearreport.mss WHERE (`num_fiz_lines_sl`<>0) $AND")
	or die("Ошибка ".mysql_error()); 
	$sum1=mysql_result($query,0);    
	$query1 = mysql_query("SELECT SUM(`num_lines`) FROM yearreport.specslujby WHERE (`num_lines`<>0) $AND")
	or die("Ошибка ".mysql_error()); 
	$sum2=mysql_result($query1,0);
	$sum=$sum1+$sum2;    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>Протяженность воздушных линий передачи - всего, км </p></td>
    <td class="xl29"><p>701_3 </p></td>
    <td width="116" class="xl77"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='701_3'") or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl77"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`line_length`) FROM yearreport.vls WHERE (`line_used`='да') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>Протяженность канализации, канало-км </p></td>
    <td class="xl29"><p>702_3 </p></td>
    <td width="116" class="xl77"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='702_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl77"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`length_truboprovod`) FROM yearreport.access_net WHERE (`length_truboprovod`<>0) $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>Число высокочастотных каналов связи, единиц </p></td>
    <td class="xl29"><p>703_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='703_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_vch_kanalov_slm`)+SUM(`zad_vch_kanalov_zsl`)+SUM(`zad_vch_kanalov_vx`)+SUM(`zad_vch_kanalov_isx`)+SUM(`zad_vch_kanalov_dvust`)+SUM(`zad_vch_kanalov_oks7`) FROM yearreport.mss WHERE (`zad_vch_kanalov_total`<>0) $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>из них: </p></td>
    <td class="xl37"> <p>&nbsp;</p></td>
    <td width="116" class="xl41"><p>&nbsp;</p></td>
    <td width="116" class="xl41"><p>&nbsp;</p></td>
    <td width="136" class="xl33"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl61"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;на металлическом кабеле </p></td>
    <td class="xl29"><p>704_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='704_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_vch_kanalov_slm`)+SUM(`zad_vch_kanalov_zsl`)+SUM(`zad_vch_kanalov_vx`)+SUM(`zad_vch_kanalov_isx`)+SUM(`zad_vch_kanalov_dvust`)+SUM(`zad_vch_kanalov_oks7`) FROM yearreport.mss WHERE (`line_type`='КЛС') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl61"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;на волоконно-оптическом кабеле </p></td>
    <td class="xl29"><p>705_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='705_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_vch_kanalov_slm`)+SUM(`zad_vch_kanalov_zsl`)+SUM(`zad_vch_kanalov_vx`)+SUM(`zad_vch_kanalov_isx`)+SUM(`zad_vch_kanalov_dvust`)+SUM(`zad_vch_kanalov_oks7`) FROM yearreport.mss WHERE (`line_type`='ВОЛС') $AND")
	or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl61"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в радио-релейных линиях (РРЛ) </p></td>
    <td class="xl29"><p>706_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='706_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_vch_kanalov_slm`)+SUM(`zad_vch_kanalov_zsl`)+SUM(`zad_vch_kanalov_vx`)+SUM(`zad_vch_kanalov_isx`)+SUM(`zad_vch_kanalov_dvust`)+SUM(`zad_vch_kanalov_oks7`) FROM yearreport.mss WHERE (`line_type`='РРЛ') $AND")
	or die("Ошибка ".mysql_error());                                                                             
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl61"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;цифровых-всего </p></td>
    <td class="xl29"><p>707_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='707_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_vch_kanalov_slm`)+SUM(`zad_vch_kanalov_zsl`)+SUM(`zad_vch_kanalov_vx`)+SUM(`zad_vch_kanalov_isx`)+SUM(`zad_vch_kanalov_dvust`)+SUM(`zad_vch_kanalov_oks7`) FROM yearreport.mss WHERE (`hierarchi_system_peredach`='ЦСП') $AND")
	or die("Ошибка ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>       
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>Протяженность кабеля - всего, км </p></td>
    <td class="xl29"><p>708_3 </p></td>
    <td width="116" class="xl77"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='708_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl77"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`mss_length`)+SUM(`uab_length`)+SUM(`m_length`)+SUM(`r_length`)+SUM(`zpp_length`)+SUM(`etth_length`) FROM yearreport.lks WHERE (`cable_type`<>'') $AND")
	or die("Ошибка ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl61"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в том числе волоконно-оптического - всего </p></td>
    <td class="xl29"><p>712_3 </p></td>
    <td width="116" class="xl77"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='712_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl77"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`mss_length`)+SUM(`uab_length`)+SUM(`m_length`)+SUM(`r_length`)+SUM(`zpp_length`)+SUM(`etth_length`) FROM yearreport.lks WHERE (`cable_type`='ВОЛС') $AND")
	or die("Ошибка ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#4AB7FF">
   <!--///======================================== 8 раздел ================================================================================/-->
    <td colspan="5" class="xl83"><p><strong>8. Реализация заявлений на установку квартирного телефона (единиц) </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl64"><p>Заявления - всего </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"> <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl65"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в городской местности </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"> <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;число заявлений, удовлетворенных за отчетный год </p></td>
    <td class="xl49"><p>800_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='800_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zayavleniy_total`)-SUM(`in_2007`) FROM yearreport.zayavleniya WHERE (`punkt_type`='город') $AND")
	or die("Ошибка ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;наличие заявлений неудовлетворенных на конец отчетного периода </p></td>
    <td class="xl49"><p>800_4 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='800_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`in_2007`) FROM yearreport.zayavleniya WHERE (`punkt_type`='город') $AND")
	or die("Ошибка ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в сельской местности </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;число заявлений, удовлетворенных за отчетный год </p></td>
    <td class="xl47"><p>800_5 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='800_5'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zayavleniy_total`)-SUM(`in_2007`) FROM yearreport.zayavleniya WHERE (`punkt_type`<>'город') $AND")
	or die("Ошибка ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;наличие заявлений неудовлетворенных на конец отчетного периода </p></td>
    <td class="xl47"><p>800_6 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='800_6'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`in_2007`) FROM yearreport.zayavleniya WHERE (`punkt_type`<>'город') $AND")
	or die("Ошибка ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl67"><p>в том числе от льготных категорий граждан - всего </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl65"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в городской местности </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;число заявлений, удовлетворенных за отчетный год </p></td>
    <td class="xl47"><p>801_3 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='801_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;наличие заявлений неудовлетворенных на конец отчетного периода </p></td>
    <td class="xl47"><p>801_4 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='801_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в сельской местности </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;число заявлений, удовлетворенных за отчетный год </p></td>
    <td class="xl47"><p>801_5 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='801_5'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;наличие заявлений неудовлетворенных на конец отчетного периода </p></td>
    <td class="xl47"><p>801_6 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='801_6'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl69"><p>из них инвалидов и участников Великой Отечественной войны </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl65"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в городской местности </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;число заявлений, удовлетворенных за отчетный год </p></td>
    <td class="xl47"><p>802_3 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='802_3'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;наличие заявлений неудовлетворенных на конец отчетного периода </p></td>
    <td class="xl47"><p>802_4 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='802_4'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;в сельской местности </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;число заявлений, удовлетворенных за отчетный год </p></td>
    <td class="xl47"><p>802_5 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='802_5'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td height="76" class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;наличие заявлений неудовлетворенных на конец отчетного периода</p></td>
    <td class="xl47"><p>802_6</p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `номер`='802_6'")or die("Ошибка ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
</table>
