<?php
session_start();
require("../system_message.php");
$text='text';

$openConn2db = mysql_connect("localhost", "$PHP_AUTH_USER", "$PHP_AUTH_PW"); 
$dbSelected = mysql_select_db($DB); 
//___________________��������� ������������ ��������� ����� ���������� � ��_________________
mysql_query ("set character_set_client='cp1251'");  
mysql_query ("set character_set_results='cp1251'");  
mysql_query ("set collation_connection='cp1251_general_ci'"); 	 


//========================= ���� ������� ������ � ������� �� ==========================================================================  
$request_str='';
foreach ($_SESSION['_parametr'] as $key => $znach)      // � znach ��������� �������� ����� �������
{     	
	// ������ ������� ���� ���������� ������ � ��
	if ($znach=='timestamp') 
	{ 
		$now = date("Y-m-d H:i:s"); // �������� ������� � ������� 2009-10-19 22:38:15
		$request_str=$request_str." '".$now."',";
		continue;
	}
    $text_key=$text.$key; $text_filter=$$text_key;      //������ ������ ������ ���������� �� ���� ����
    $text_filter=str_replace("_"," ",$text_filter);     //������� _ �� �������� ���������� �������������, �.�. _ mysql �� ������������
    $request_str=$request_str." '".$text_filter."',";   //��������� ���������� ������ ���������� ������ � ���� ������

    $_SESSION['_parametr_error'][$znach]=$text_filter;   //��������� ������ �������� ��������� ������������� ��� ����������� � ������ ������
}
    
$request_str=substr($request_str, 0, strlen($request_str)-1);     //�������� ��������� �������
//print_r($_SESSION['parametr1']);
//print_r($request_str);	
   

$queryResultID = mysql_query("INSERT INTO ".$table." VALUES (NULL,".$num_row.",".$request_str.")"); 

//// ���� ��������� ������, �� ���������� �� ���������... /////////////////////////////////////////////////////////////////////////////////////
if (!$queryResultID)   
{
   $mysqlerror=mysql_error(); 
   $name_col_err=stristr($mysqlerror, "for column");  
   $name_col_err=substr($name_col_err, 12, strlen($name_col_err)-22); // ��� ������� � ������� ��������� ������!!! :))
   $_SESSION['_column_name_error']=$name_col_err;  // ���������� � add.php ��� ������ � ������� ���� ����, ��� ������� ������!!!   
   header("location: http://".$_SERVER[HTTP_HOST]."/index.php?action=dop_info&id_top_menu=$id_top_menu&id_sub_menu=$id_sub_menu&num_row=$num_row");
   Die;
}


$request=str_replace("'","",$request_str); $request=str_replace("`","",$request);
$ip=$_SERVER['REMOTE_ADDR'];
// ������� � ���� ����� �������� �� ����������.........
$log_querry=mysql_query("INSERT INTO `engine`.`log` (`id`,`user`,`ip`,`action`,`db`,`table`,`id_row`,`data`) VALUES (NULL, '$PHP_AUTH_USER', '$ip', 'Insert', '$DB', '$table','0','$request')");


mysql_close();
unset($_SESSION['_parametr_error']);
unset($_SESSION['_column_name_error']);

if (@$_POST['apply']) 
{
     header("location: http://".$_SERVER[HTTP_HOST]."/index.php?action=dop_info&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu.$from_menu."&num_row=".$num_row);
}
if ($_POST['save']) {include ("../redirect.php");}

     
?>