<?php
//___________________________���������� � �� $DB____________________________________________ 
$openConn2db = mysql_connect("localhost", "$PHP_AUTH_USER", "$PHP_AUTH_PW"); 
//___________________��������� ������������ ��������� ����� ���������� � ��_________________
  mysql_query ("set character_set_client='cp1251'");  
  mysql_query ("set character_set_results='cp1251'");  
  mysql_query ("set collation_connection='cp1251_general_ci'"); 
?>

<table width="800" cellpadding="1" cellspacing="1" align=center>
  <tr bgcolor="#00568E" class="st2">
    <td colspan="5" class="xl31"><p align="center"><strong>����� 44-�����. </strong></p>
    <p align="center"><strong>�������� � ����������� ��������� ����� ������� ���������� ����� �� 2007 ���</strong></p></td>
  </tr>
  <tr bgcolor="#00568E" class="st2">
    <td class="xl46"><div align="center">
      <p>������������ ����������</p>
    </div></td>
    <td width="70" class="xl46"><div align="center">
      <p>� ������ </p>
    </div>      
      <div align="center"></div></td>
    <td width="116" class="xl46"><div align="center">
      <p>��������. ���. ��� </p>
    </div>      <div align="center"></div></td>
    <td width="116" class="xl46"><div align="center">
      <p>�������� ��� </p>
      </div></td>
    <td width="136" class="xl46"><div align="center">
      <p>��������� �� ��� </p>
      </div></td>
  </tr>
<!--///========================================1 ������====================================================================================/-->
  <tr bgcolor="#4AB7FF">
    <td colspan="5" class="xl50"><p><strong>1. ���������� ������� � ��������� ��������� </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl33"><p>���������� ������� - ����� (��) </p></td>
    <td class="xl34"><p>100_3</p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='100_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE (`net_type`='���') AND (`net_function`<>'���') $AND")or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� ������� - ����� (�������) </p></td>
    <td class="xl34"><p>100_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='100_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') $AND")or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� ������� - ����� (�������) </p></td>
    <td class="xl34"><p>100_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='100_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') $AND")or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl37"><p>� �.�. �������������� ���������� ������� (���) (��) </p></td>
    <td class="xl34"><p>110_3 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='110_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE (`net_type`='���') AND (`net_function`<>'���') $AND")or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� ��� (�������) </p></td>
    <td class="xl34"><p>110_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='110_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') $AND")or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� ��� (�������) </p></td>
    <td class="xl34"><p>110_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='110_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') $AND")or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>�� ���: �������-������� (��) </p></td>
    <td class="xl34"><p>111_3 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='111_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p>0</p></td>
    <td width="136" class="xl35"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl34"><p>111_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='111_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p>0</p></td>
    <td width="136" class="xl35"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl34"><p>111_5 </p></td>
    <td width="116" class="xl47"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='111_5'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl47"><p>0</p></td>
    <td width="136" class="xl35"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>������������ (��) </p></td>
    <td class="xl34"><p>112_3 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='112_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE  (`net_type`='���') AND 
	(`oborud_type`='�') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl34"><p>112_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='112_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='�') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl34"><p>112_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='112_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='�') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>���������������� (��) </p></td>
    <td class="xl34"><p>113_3 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='113_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE  (`net_type`='���') AND 
	(`oborud_type`='��') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl34"><p>113_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='113_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='��') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������)</p></td>
    <td class="xl34"><p>113_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='113_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='��') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl38"><p>����������� (��) </p></td>
    <td class="xl34"><p>114_3 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='114_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE  (`net_type`='���') AND 
	(`oborud_type`='�') AND (`net_function`<>'���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl34"><p>114_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='114_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='�') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl34"><p>114_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='114_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='�') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl37"><p>������� ����� �� ������������� ���������� ������� </p></td>       
    <td class="xl34"><p>116_3</p></td>
    <td width="116" class="xl39"> <p>&nbsp;</p></td>
    <td width="116" class="xl39"> <p>&nbsp;</p></td>
    <td width="136" class="xl39"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl34"><p>116_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='116_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl34"><p>116_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='116_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>� ��� ����� ������������� ����������� ��������������� ����������� ������ (���) </p></td>
    <td class="xl34"><p>117_3 </p></td>
    <td width="116" class="xl39"> <p></p></p></td>
    <td width="116" class="xl39"> <p>&nbsp;</p></td>
    <td width="136" class="xl39"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl34"><p>117_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='117_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl34"><p>117_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='117_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl37"><p>������������� ��������� ������������ </p></td>
    <td class="xl34"><p>118_3</p></td>
    <td width="116" class="xl39"><p>&nbsp;</p></td>
    <td width="116" class="xl39"><p>&nbsp;</p></td>
    <td width="136" class="xl39"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl34"><p>118_4</p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='118_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p><?php $sum2=0; ?>0</p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl34"><p>118_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='118_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p><?php $sum2=0; ?>0</p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl36"><p>� ��������� ISDN (��������� BRI) </p></td>
    <td class="xl34"><p>119_3 </p></td>
    <td width="116" class="xl39"><p>&nbsp;</p></td>
    <td width="116" class="xl39"><p>&nbsp;</p></td>
    <td width="136" class="xl39"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl34"><p>119_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='119_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_isdn`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl34"><p>119_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='119_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_isdn`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl37"><p>������������� ����������� ������������ ����� ����������������� ���������� (����) </p></td>
    <td class="xl34"><p>120_3 </p></td>
    <td width="116" class="xl39"> <p></p></p></td>
    <td width="116" class="xl39"> <p>&nbsp;</p></td>
    <td width="136" class="xl39"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl34"><p>120_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='120_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_apus`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl34"><p>120_5 </p></td>
    <td width="116" class="xl48"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='120_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl48"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_apus`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl37"><p>�������������� �������, ������� ����� �� ���� ������� ��������� (��) </p></td>
    <td class="xl34"><p>121_3 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='121_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl47"> <p>&nbsp;</p></td>
    <td width="136" class="xl35"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl34"><p>121_4 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='121_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`mont_capacity`) FROM yearreport.upats  WHERE (`net_type`='���') AND (`sposob_vkl_upats`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl34"><p>121_5 </p></td>
    <td width="116" class="xl47"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='121_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl47"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity`) FROM yearreport.upats  WHERE (`net_type`='���') AND (`sposob_vkl_upats`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl35"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
<!--///========================================2 ������====================================================================================/-->  
  <tr bgcolor="#4AB7FF">
    <td colspan="5" class="xl69"><p><strong>2. ���������� ������� � �������� ���������</strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl29"><p>���������� ������� - ����� (��) </p></td>
    <td class="xl30"><p>200_3 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='200_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE (`net_type`='���') AND (`net_function`<>'���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� ������� - ����� (�������) </p></td>
    <td class="xl30"><p>200_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='200_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') $AND")or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� ������� - ����� (�������) </p></td>
    <td class="xl30"><p>200_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='200_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') $AND")or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl40"><p>� �.�. �������������� ���������� ������� (���) (��) </p></td>
    <td class="xl30"><p>210_3 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='210_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE (`net_type`='���') AND (`net_function`<>'���') $AND")or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� ��� (�������) </p></td>
    <td class="xl30"><p>210_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='210_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') $AND")or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� ��� (�������) </p></td>
    <td class="xl30"><p>210_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='210_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') $AND")or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>�� ���: �������-������� (��) </p></td>
    <td class="xl30"><p>211_3 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='211_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl64"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl30"><p>211_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='211_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl64"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl30"><p>211_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='211_5'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl64"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>������������ (��) </p></td>
    <td class="xl30"><p>212_3</p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='212_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE  (`net_type`='���') AND 
	(`oborud_type`='�') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl30"><p>212_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='212_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='�') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl30"><p>212_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='212_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='�') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>���������������� (��) </p></td>
    <td class="xl30"><p>213_3 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='213_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='��') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl30"><p>213_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='213_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='��') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl30"><p>213_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='213_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='��') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl34"><p>����������� (��) </p></td>
    <td class="xl30"><p>214_3 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='214_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT count(`ats_type`) FROM yearreport.ats WHERE  (`net_type`='���') AND 
	(`oborud_type`='�') AND (`net_function`<>'���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl30"><p>214_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='214_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
    	<?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='�') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl30"><p>214_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='214_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_total`) FROM yearreport.ats WHERE (`net_type`='���') AND 
	(`oborud_type`='�') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl33"><p>������� ����� �� ������������� ���������� ������� </p></td>
    <td class="xl30"><p>216_3 </p></td>
    <td width="116" class="xl35"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='216_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl35"> <p>&nbsp;</p></td>
    <td width="136" class="xl35"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl30"><p>216_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='216_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl30"><p>216_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='216_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>� ��� ����� ������������� ����������� ��������������� ����������� ������ (���) </p></td>
    <td class="xl30"><p>217_3 </p></td>
    <td width="116" class="xl35"> <p>&nbsp;</p></td>
    <td width="116" class="xl35"> <p>&nbsp;
    </p></td>
    <td width="136" class="xl35"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl30"><p>217_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='217_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl30"><p>217_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='217_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_amts_aon`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl33"><p>������������� ��������� ������������ </p></td>
    <td class="xl30"><p>218_3 </p></td>
    <td width="116" class="xl35"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='218_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl35"> <p>0</p></td>
    <td width="136" class="xl35"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl30"><p>218_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='218_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl64"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl30"><p>218_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='218_5'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl64"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>� ��������� ISDN (��������� BRI) </p></td>
    <td class="xl30"><p>219_3 </p></td>
    <td width="116" class="xl35"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='219_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl35"> <p>&nbsp;</p></td>
    <td width="136" class="xl35"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl30"><p>219_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='219_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_isdn`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl30"><p>219_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='219_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_isdn`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl33"><p>������������� ����������� ������������ ����� ����������������� ���������� (����) </p></td>
    <td class="xl30"><p>220_3 </p></td>
    <td width="116" class="xl35"> <p></p></p></td>
    <td width="116" class="xl35"> <p>&nbsp;</p></td>
    <td width="136" class="xl35"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl30"><p>220_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='220_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`mont_capacity_apus`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl30"><p>220_5 </p></td>
    <td width="116" class="xl65"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='220_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl65"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity_apus`) FROM yearreport.ats WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl33"><p>�������������� �������, ������� ����� �� ���� ������� ��������� (��) </p></td>
    <td class="xl30"><p>221_3 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='221_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl64"> <p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������������� ������� (�������) </p></td>
    <td class="xl30"><p>221_4 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='221_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`mont_capacity`) FROM yearreport.upats  WHERE (`net_type`='���') AND (`sposob_vkl_upats`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������������� ������� (�������) </p></td>
    <td class="xl30"><p>221_5 </p></td>
    <td width="116" class="xl64"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='221_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl64"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_capacity`) FROM yearreport.upats  WHERE (`net_type`='���') AND (`sposob_vkl_upats`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#4AB7FF">
 <!--///======================================== 3 ������ ================================================================================/-->
    <td colspan="5" class="xl68"><p><strong>3. ��������� ������������� �������, ������� </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>������� �� �������� ��� - ����� (����� ���.301, 302, 303) </p></td>
    <td class="xl30"><p>300 </p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��������� ��������� </p></td>
    <td class="xl30"><p>300_3 </p></td>
    <td width="116" class="xl46"><p>&nbsp;</p></td>
    <td width="116" class="xl46"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �������� ��������� </p></td>
    <td class="xl30"><p>300_4 </p></td>
    <td width="116" class="xl46"><p>&nbsp;</p></td>
    <td width="116" class="xl46"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl47"><p>� �.�.: �� ���� ������ ������������� � ���������� </p></td>
    <td class="xl30"><p>301 </p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��������� ��������� </p></td>
    <td class="xl30"><p>301_3 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �������� ��������� </p></td>
    <td class="xl30"><p>301_4 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>�� ���� ������������� </p></td>
    <td class="xl30"><p>302 </p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��������� ��������� </p></td>
    <td class="xl30"><p>302_3 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �������� ��������� </p></td>
    <td class="xl30"><p>302_4 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>������� �� ������ ����������� </p></td>
    <td class="xl30"><p>303 </p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��������� ��������� </p></td>
    <td class="xl30"><p>303_3 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �������� ��������� </p></td>
    <td class="xl30"><p>303_4 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl36"><p>� ��� ����� ���������� : �� ��������� ��������� </p></td>
    <td class="xl30"><p>304_4 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�� �������� ��������� </p></td>
    <td class="xl30"><p>305_3 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>����� �� �������� ��� - ����� </p></td>
    <td class="xl48"><p>306 </p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="116" class="xl45"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��������� ��������� </p></td>
    <td class="xl30"><p>306_3 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �������� ��������� </p></td>
    <td class="xl30"><p>306_4 </p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="116" class="xl64"><p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#4AB7FF">
   <!--///======================================== 4 ������ ================================================================================/-->
    <td colspan="5" class="xl70"><p><strong>4. ����������� ���������� � ��������� � ��������� ��������� </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl50"><p>����������� ����������, �������������� � �������� ������� ��������� - ����� (��� ����������) </p></td>
    <td class="xl53"><p>400 </p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="136" class="xl54"> <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl50"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� </p></td>
    <td class="xl55"><p>400_3 </p></td>
    <td width="116" class="xl66"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='400_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></td>
    <td width="116" class="xl66"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_total`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl57"><p>400_4 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='400_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_osnovn`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�� ��.400_3 - ���������� </p></td>
    <td class="xl57"><p>400_5 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='400_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_kvart`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl57"><p>400_6 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='400_6'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_kvart_osn`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>�� ��� : </p></td>
    <td class="xl58"> <p>&nbsp;</p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="136" class="xl54"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl50"><p>������� ����� �� ������������� ���������� ���� </p></td>
    <td class="xl58"><p>403 </p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="136" class="xl54"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� </p></td>
    <td class="xl57"><p>403_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='403_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_total`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl57"><p>403_4 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='403_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_osnovn`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�� ��.403_3 - ���������� </p></td>
    <td class="xl57"><p>403_5 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='403_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_kvart`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl57"><p>403_6 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='403_6'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_kvart_osn`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl59"><p>����� ������������ ������������ ������������ </p></td>
    <td class="xl58"><p>404 </p></td>
    <td width="116" class="xl60"> <p>&nbsp;</p></td>
    <td width="116" class="xl60"> <p>&nbsp;</p></td>
    <td width="136" class="xl45"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� </p></td>
    <td class="xl57"><p>404_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='404_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_total`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl57"><p>404_4 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='404_4'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_osnovn`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�� ��.404_3 - ���������� </p></td>
    <td class="xl57"><p>404_5 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='404_5'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_kvart`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl57"><p>404_6 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='404_6'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_kvart_osn`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl50"><p>��������� ���� ����� - �����: </p></td>
    <td class="xl55"><p>410_3 </p></td>
    <td width="116" class="xl66"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='410_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl66"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �. �. � ��������� �������� ������ </p></td>
    <td class="xl55"><p>411_3 </p></td>
    <td width="116" class="xl66"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='411_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl66"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl50"><p>������������� (������������-���������) - ����� </p></td>
    <td class="xl57"><p>412_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='412_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �.�. � ��������� �������� ������ </p></td>
    <td class="xl57"><p>413_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='413_3'")or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
        echo"$sum1";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query,0);    
        echo"$sum2";
    	?>
    </p></td>
    <td width="136" class="xl31"><p><?php $sum=$sum2-$sum1; echo"$sum";?></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl50"><p>������� � ��������� ��������� -����� </p></td>
    <td class="xl57"><p>414_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='414_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �.�. � ��������� �������� ������ </p></td>
    <td class="xl57"><p>415_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='415_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl59"><p>��������� ������������� (������������) � ��������� ��������� -����� </p></td>
    <td class="xl57"><p>416_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='416_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �.�. � ��������� �������� ������ </p></td>
    <td class="xl57"><p>417_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='417_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>0</p></td>
    <td width="136" class="xl31"><p>0</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl61"><p>����������� ���������� �������������� �������, ������� ����� �� ������ ���� </p></td>
    <td class="xl58"><p>418 </p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="116" class="xl54"> <p>&nbsp;</p></td>
    <td width="136" class="xl54"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� </p></td>
    <td class="xl62"><p>418_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='418_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl56"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl57"><p>418_4 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='418_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl63"><p>����������� ����������, ���������� � ������������ ������������������ ������������ ������� </p></td>
    <td class="xl57"><p>419_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='419_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>&nbsp;</p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl63"><p>�� ������ 410 - ���������� ����������, ������������� � ������ ��������� �������������� ������������* </p></td>
    <td class="xl57"><p>420_3 </p></td>
    <td width="116" class="xl67"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='420_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl67"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='���') AND (`tax_type`='��') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl31"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#4AB7FF">
   <!--///======================================== 5 ������ ================================================================================/-->
    <td colspan="5" class="xl78"><p><strong>5. ����������� ���������� � ��������� � �������� ��������� </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>����������� ����������, �������������� � �������� ������� ��������� - ����� (��� ����������) </p></td>
    <td class="xl45"><p>500 </p></td>
    <td width="116" class="xl46"> <p>&nbsp;</p></td>
    <td width="116" class="xl46"> <p>&nbsp;</p></td>
    <td width="136" class="xl46"> <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� </p></td>
    <td class="xl49"><p>500_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='500_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_total`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl49"><p>500_4 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='500_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_osnovn`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�� ��.500_3 - ���������� </p></td>
    <td class="xl49"><p>500_5 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='500_5'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_kvart`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl49"><p>500_6 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='500_6'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_kvart_osn`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>������� ����� �� ������������� ���������� ���� </p></td>
    <td class="xl50"><p>503 </p></td>
    <td width="116" class="xl46"> <p>&nbsp;</p></td>
    <td width="116" class="xl46"> <p>&nbsp;</p></td>
    <td width="136" class="xl46"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� </p></td>
    <td class="xl49"><p>503_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='503_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_total`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl49"><p>503_4 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='503_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_osnovn`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�� ��.503_3 - ���������� </p></td>
    <td class="xl49"><p>503_5 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='503_5'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_kvart`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl49"><p>503_6 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='503_6'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_mg_kvart_osn`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl51"><p>����� ������������ ������������ ������������ </p></td>
    <td class="xl50"><p>504 </p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� </p></td>
    <td class="xl49"><p>504_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='504_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_total`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl49"><p>504_4 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='504_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_osnovn`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�� ��.504_3 - ���������� </p></td>
    <td class="xl49"><p>504_5 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='504_5'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_kvart`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl49"><p>504_6 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='504_6'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_ab_ustr_radiodostup_kvart_osn`) FROM yearreport.abon_ustr  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>��������� ���� ����� - �����: </p></td>
    <td class="xl47"><p>510_3 </p></td>
    <td width="116" class="xl76"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='510_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� � ��������� �������� ������ </p></td>
    <td class="xl47"><p>511_3 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='511_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>������������� (������������-��������) -����� </p></td>
    <td class="xl49"><p>512_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='512_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �.�. � ��������� �������� ������ </p></td>
    <td class="xl49"><p>513_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='513_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl44"><p>������� � �������� ���������-����� </p></td>
    <td class="xl49"><p>514_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='514_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>0</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �.�. � ��������� �������� ������ </p></td>
    <td class="xl49"><p>515_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='515_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>0</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl51"><p>��������� ������������� (������������) � ��������� ��������� -����� </p></td>
    <td class="xl49"><p>516_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='516_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>0</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �.�. � ��������� �������� ������ </p></td>
    <td class="xl49"><p>517_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='517_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>0</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl53"><p>����������� ���������� �������������� �������, ������� ����� �� ������ ����</p></td>
    <td class="xl47"><p>518</p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����</p></td>
    <td class="xl49"><p>518_3</p></td>
    <td class="xl75"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='518_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td class="xl75"><p>&nbsp;</p></td>
    <td class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl48"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������� </p></td>
    <td class="xl49"><p>518_4 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='518_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl56"><p>����������� ����������,���������� � ������������ ������������������ ������������ ������� - ����� </p></td>
    <td class="xl49"><p>519_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='519_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td width="823" class="xl54"><p>�� ������ 510 - ���������� ����������,������������� � ������ ��������� �������������� ������������* </p></td>
    <td class="xl49"><p>520_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='520_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT COUNT(`tax_marka`) FROM yearreport.taxophones  WHERE (`net_type`='���') AND (`tax_type`='��') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#4AB7FF">
   <!--///======================================== 6 ������ ================================================================================/-->
    <td colspan="5" class="xl79"><p><strong>6. ������������� �������� �������� ��������� </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>���������� ������ -����� </p></td>
    <td class="xl29"><p>600_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='600_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>�� ���: ������������������ </p></td>
    <td class="xl29"><p>600_4 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='600_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� �������������� (�� 50 �������) - ����� </p></td>
    <td class="xl29"><p>610_3 </p></td>
    <td width="116" class="xl77"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='610_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl77"><p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�� ���: ������������������ </p></td>
    <td class="xl29"><p>610_4 </p></td>
    <td width="116" class="xl77"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='610_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl77"><p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>������� ���������� ����� - ����� </p></td>
    <td class="xl29"><p>620_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='620_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�� ��� ������������������: </p></td>
    <td class="xl42"><p>620_4 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='620_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#4AB7FF">
   <!--///======================================== 7 ������ ================================================================================/-->
    <td colspan="5" class="xl82"><p><strong>7. �������������� ����� � �������� ��������� </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>����� �������������� �����, ������ </p></td>
    <td class="xl29"><p>700_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='700_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`num_fiz_lines_sl`) FROM yearreport.mss WHERE (`num_fiz_lines_sl`<>0) $AND")
	or die("������ ".mysql_error()); 
	$sum1=mysql_result($query,0);    
	$query1 = mysql_query("SELECT SUM(`num_lines`) FROM yearreport.specslujby WHERE (`num_lines`<>0) $AND")
	or die("������ ".mysql_error()); 
	$sum2=mysql_result($query1,0);
	$sum=$sum1+$sum2;    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>������������� ��������� ����� �������� - �����, �� </p></td>
    <td class="xl29"><p>701_3 </p></td>
    <td width="116" class="xl77"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='701_3'") or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl77"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`line_length`) FROM yearreport.vls WHERE (`line_used`='��') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>������������� �����������, ������-�� </p></td>
    <td class="xl29"><p>702_3 </p></td>
    <td width="116" class="xl77"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='702_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl77"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`length_truboprovod`) FROM yearreport.access_net WHERE (`length_truboprovod`<>0) $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>����� ��������������� ������� �����, ������ </p></td>
    <td class="xl29"><p>703_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='703_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_vch_kanalov_slm`)+SUM(`zad_vch_kanalov_zsl`)+SUM(`zad_vch_kanalov_vx`)+SUM(`zad_vch_kanalov_isx`)+SUM(`zad_vch_kanalov_dvust`)+SUM(`zad_vch_kanalov_oks7`) FROM yearreport.mss WHERE (`zad_vch_kanalov_total`<>0) $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl31"><p>�� ���: </p></td>
    <td class="xl37"> <p>&nbsp;</p></td>
    <td width="116" class="xl41"><p>&nbsp;</p></td>
    <td width="116" class="xl41"><p>&nbsp;</p></td>
    <td width="136" class="xl33"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl61"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�� ������������� ������ </p></td>
    <td class="xl29"><p>704_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='704_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_vch_kanalov_slm`)+SUM(`zad_vch_kanalov_zsl`)+SUM(`zad_vch_kanalov_vx`)+SUM(`zad_vch_kanalov_isx`)+SUM(`zad_vch_kanalov_dvust`)+SUM(`zad_vch_kanalov_oks7`) FROM yearreport.mss WHERE (`line_type`='���') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl61"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�� ���������-���������� ������ </p></td>
    <td class="xl29"><p>705_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='705_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_vch_kanalov_slm`)+SUM(`zad_vch_kanalov_zsl`)+SUM(`zad_vch_kanalov_vx`)+SUM(`zad_vch_kanalov_isx`)+SUM(`zad_vch_kanalov_dvust`)+SUM(`zad_vch_kanalov_oks7`) FROM yearreport.mss WHERE (`line_type`='����') $AND")
	or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl61"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �����-�������� ������ (���) </p></td>
    <td class="xl29"><p>706_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='706_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_vch_kanalov_slm`)+SUM(`zad_vch_kanalov_zsl`)+SUM(`zad_vch_kanalov_vx`)+SUM(`zad_vch_kanalov_isx`)+SUM(`zad_vch_kanalov_dvust`)+SUM(`zad_vch_kanalov_oks7`) FROM yearreport.mss WHERE (`line_type`='���') $AND")
	or die("������ ".mysql_error());                                                                             
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl61"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������-����� </p></td>
    <td class="xl29"><p>707_3 </p></td>
    <td width="116" class="xl73"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='707_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl73"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`zad_vch_kanalov_slm`)+SUM(`zad_vch_kanalov_zsl`)+SUM(`zad_vch_kanalov_vx`)+SUM(`zad_vch_kanalov_isx`)+SUM(`zad_vch_kanalov_dvust`)+SUM(`zad_vch_kanalov_oks7`) FROM yearreport.mss WHERE (`hierarchi_system_peredach`='���') $AND")
	or die("������ ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>       
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl32"><p>������������� ������ - �����, �� </p></td>
    <td class="xl29"><p>708_3 </p></td>
    <td width="116" class="xl77"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='708_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl77"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`mss_length`)+SUM(`uab_length`)+SUM(`m_length`)+SUM(`r_length`)+SUM(`zpp_length`)+SUM(`etth_length`) FROM yearreport.lks WHERE (`cable_type`<>'') $AND")
	or die("������ ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl61"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��� ����� ���������-����������� - ����� </p></td>
    <td class="xl29"><p>712_3 </p></td>
    <td width="116" class="xl77"><p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='712_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl77"><p>
      <?php 
	$query = mysql_query("SELECT SUM(`mss_length`)+SUM(`uab_length`)+SUM(`m_length`)+SUM(`r_length`)+SUM(`zpp_length`)+SUM(`etth_length`) FROM yearreport.lks WHERE (`cable_type`='����') $AND")
	or die("������ ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#4AB7FF">
   <!--///======================================== 8 ������ ================================================================================/-->
    <td colspan="5" class="xl83"><p><strong>8. ���������� ��������� �� ��������� ����������� �������� (������) </strong></p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl64"><p>��������� - ����� </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"> <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl65"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��������� ��������� </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"> <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� ���������, ��������������� �� �������� ��� </p></td>
    <td class="xl49"><p>800_3 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='800_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zayavleniy_total`)-SUM(`in_2007`) FROM yearreport.zayavleniya WHERE (`punkt_type`='�����') $AND")
	or die("������ ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������� ��������� ����������������� �� ����� ��������� ������� </p></td>
    <td class="xl49"><p>800_4 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='800_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`in_2007`) FROM yearreport.zayavleniya WHERE (`punkt_type`='�����') $AND")
	or die("������ ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �������� ��������� </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� ���������, ��������������� �� �������� ��� </p></td>
    <td class="xl47"><p>800_5 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='800_5'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`zayavleniy_total`)-SUM(`in_2007`) FROM yearreport.zayavleniya WHERE (`punkt_type`<>'�����') $AND")
	or die("������ ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������� ��������� ����������������� �� ����� ��������� ������� </p></td>
    <td class="xl47"><p>800_6 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='800_6'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>
      <?php 
	$query = mysql_query("SELECT SUM(`in_2007`) FROM yearreport.zayavleniya WHERE (`punkt_type`<>'�����') $AND")
	or die("������ ".mysql_error());                                                                            
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl67"><p>� ��� ����� �� �������� ��������� ������� - ����� </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl65"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��������� ��������� </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� ���������, ��������������� �� �������� ��� </p></td>
    <td class="xl47"><p>801_3 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='801_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������� ��������� ����������������� �� ����� ��������� ������� </p></td>
    <td class="xl47"><p>801_4 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='801_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �������� ��������� </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� ���������, ��������������� �� �������� ��� </p></td>
    <td class="xl47"><p>801_5 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='801_5'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������� ��������� ����������������� �� ����� ��������� ������� </p></td>
    <td class="xl47"><p>801_6 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='801_6'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl69"><p>�� ��� ��������� � ���������� ������� ������������� ����� </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl65"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� ��������� ��������� </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� ���������, ��������������� �� �������� ��� </p></td>
    <td class="xl47"><p>802_3 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='802_3'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������� ��������� ����������������� �� ����� ��������� ������� </p></td>
    <td class="xl47"><p>802_4 </p></td>
    <td width="116" class="xl75"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='802_4'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl75"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl40"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;� �������� ��������� </p></td>
    <td class="xl50"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="116" class="xl52"> <p>&nbsp;</p></td>
    <td width="136" class="xl41"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����� ���������, ��������������� �� �������� ��� </p></td>
    <td class="xl47"><p>802_5 </p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='802_5'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#CDDBEB">
    <td height="76" class="xl66"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������� ��������� ����������������� �� ����� ��������� �������</p></td>
    <td class="xl47"><p>802_6</p></td>
    <td width="116" class="xl74"> <p><?php 
	$query = mysql_query("SELECT `$select_center` FROM f44.f44_2006 WHERE `�����`='802_6'")or die("������ ".mysql_error()); 
	$sum=mysql_result($query,0);    
        echo"$sum";
    	?>
    </p></p></td>
    <td width="116" class="xl74"> <p>&nbsp;</p></td>
    <td width="136" class="xl30"><p>&nbsp;</p></td>
  </tr>
</table>
