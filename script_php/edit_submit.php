<?php
session_start();
require("system_message.php"); 
$text='text';
//print_r($_FILES);
//========================= ���� ������ �������� ������ ===============================================================================
if ((isset($_FILES))&&(count($_FILES) > 0))
{
    if ($table == "tu")
	{
		foreach ($_SESSION['_parametr'] as $key1 => $znach1)      // � znach ��������� �������� ����� �������
		{     //����������� ����� �� � ��� �� ��� ����������� ����� ���� �� ����� �������
		   if ($znach1=='number_tu') 
		   {
			   $text_key1=$text.$key1; $text_filter1=$$text_key1;      
			   $number_tu = $text_filter1;
			   //echo "nomer_tu".$number_tu;
		   }
		   if ($znach1=='date_tu')
		   {
			   $text_key1=$text.$key1; $text_filter1=$$text_key1;      
			   $date_tu = $text_filter1;
			   //echo "date_tu".$date_tu;
			   $date_tu = substr($date_tu, 0, 4); // ���������� ��� � ���� "YYYY"
			   
		   }
		}
		$uploaddir = "files/".$table."/".$date_tu."/".$number_tu."/".$PHP_AUTH_USER;  //���� � ��
		if (!file_exists("../".$uploaddir)) //���� ���������� ���, ������� ��. mkdir �� ����� ����� ������� ��������� �����..... :((
		{
			 mkdir("../files/".$table."/".$date_tu,0777); mkdir("../files/".$table."/".$date_tu."/".$number_tu,0777); 
			 mkdir("../files/".$table."/".$date_tu."/".$number_tu."/".$PHP_AUTH_USER,0777);   
		} 
	}
	else 
	{
		$uploaddir = "files/".$table;  //����
		if (!file_exists("../".$uploaddir)) //���� ���������� ���, ������� ��. mkdir �� ����� ����� ������� ��������� �����..... :((
		{
			 mkdir("../files/".$table,0777);   
		}
	}
  for ($i=0; $i<count($_FILES['file']['name']); $i++)
  { 
    if ($_FILES['file']['error'][$i]==0)  // ���� ������ ��� �������� ������, ��
    {
      $file_name=$_FILES['file']['name'][$i];  // ��� ����� 
      $uploadfile = $uploaddir ."/". basename($file_name);    // ���������� �������� �����
      move_uploaded_file($_FILES['file']['tmp_name'][$i], "../".$uploadfile);    // ������ ����������� ����� � �������....
      //print_r($_FILES); echo"<br>"; print_r($uploadfile);
    } 
    else   //��������� ������ ��� �������� �����
    {
     if ($_FILES['file']['error'][0]==1) {exit("������ ��������� ����� �������� ����������� ���������� ������, ������� ����� � ���������������� �����.");}
     if ($_FILES['file']['error'][0]==2) {exit("������ ������������ ����� �������� �������� MAX_FILE_SIZE, ��������� � HTML-�����.");}
     if ($_FILES['file']['error'][0]==3) {exit("����������� ���� ��� ������� ������ ��������.");}
     //if ($_FILES['file']['error'][0]==4) {exit("���� �� ��� ��������.");}
    }
  }  
}

//========================= ���� ���������� ������ � �� ===============================================================================
//___________________________���������� � �� $DB____________________________________________ 
$openConn2db = mysql_connect("localhost", "$PHP_AUTH_USER", "$PHP_AUTH_PW"); 
$dbSelected = mysql_select_db($DB) or die("������ ���������� � ����� ������"); 
//___________________��������� ������������ ��������� ����� ���������� � ��_________________
mysql_query ("set character_set_client='cp1251'");  
mysql_query ("set character_set_results='cp1251'");  
mysql_query ("set collation_connection='cp1251_general_ci'");
	
$text='text'; $change_data = false;
foreach (@$_SESSION['_parametr'] as $key => $znach)      // � znach ��������� �������� ����� �������
{	    
    if ($znach=='file') 
	{  
	  $link=''; $sum_size=0;
          for ($i=0; $i<count($_FILES['file']['name']); $i++)
  	  { 
 	     if ($_FILES['file']['size'][$i] == 0) {continue;}
	     $sum_size = $sum_size + $_FILES['file']['size'][$i];
	     $file_name = $_FILES['file']['name'][$i];
    	     $uploadfile = $uploaddir ."/". basename($file_name);
    	     $link =$link."<a href=\"".$uploadfile."\" class=mn2 target=_blank>".$file_name."</a><br>";
  	  }
 	   $text_key=$text.$key; $text_filter=$$text_key;
 	  if ($text_filter == "file_attachment") {$text_filter = "";}  //������ ��� ����������� ����������� ���� � ������ ����
  	  if (($sum_size == 0)&&($text_filter != ""))  {$link=$text_filter;}
  	  if (($sum_size != 0)&&($text_filter == "�������� ���"))  {$text_filter="";}
  	  if (($sum_size == 0)&&($text_filter == "")) {$link='�������� ���';}
  	  if (($sum_size != 0)&&($text_filter != ""))  {$link=$text_filter.$link;}
  	  $request_update=$request_update." `$znach`='".$link."',";  // ���� ���������� ����, �� ���������� � ���� ������ �� ����.....  
	  continue;
	}
    // ������ ������� ���� ���������� ������ � ��
	if ($znach=='timestamp')
	{ 
		$now = date("Y-m-d H:i:s"); // �������� ������� � ������� 2009-10-19 22:38:15
		@$request_update=$request_update." `".$znach."`='".$now."',";
		continue;
	}	
	$text_key=$text.$key; $text_filter=$$text_key;  //������ ������ ������ ���������� �� ���� ����
    //$text_filter=str_replace("_"," ",$text_filter); //������� _ �� �������� ���������� �������������, �.�. _ mysql �� ������������
	$text_filter=str_replace("\\","",$text_filter); // ������� ����� \, ������� POST ���������� �������, ��� ������ � ���������
	
	$_SESSION['_parametr_error'][$znach]=$text_filter;   //��������� ������ �������� ��������� ������������� ��� ����������� � ������ ������
 
   if (($_SESSION['_edit_array'][$znach] != $text_filter)&&($znach!='timestamp'))							// ���� ���� ���-�� �����, �� 
   { 
       $change_data = true;
	   //��������� ��������� ������ ���������� ������ � ���� ������
	   @$request_update=$request_update." `".$znach."`='".$text_filter."',";
   } 	
}
	
$request_update=substr($request_update, 0, strlen($request_update)-1); //������� ��������� ������� �� �������
//echo"request_update"; print_r($request_update);
//echo"<br>POST"; print_r($_POST);
//echo"<br>_parametr"; print_r($_SESSION['_parametr']);
//echo"<br>_edit_array"; print_r($_SESSION['_edit_array']);

if ($request_update != "")
{
    $queryResultID = mysql_query("UPDATE ".$DB.".".$table." SET ".$request_update." WHERE ".$DB.".".$table.".id=".$num_row." LIMIT 1");

	//// ���� ��������� ������, �� ���������� �� ���������... /////////////////////////////////////////////////////////////////////////////////////
	if (!$queryResultID)   
	{
	   $mysqlerror=mysql_error(); 
	   $name_col_err=stristr($mysqlerror, "for column");  
	   $name_col_err=substr($name_col_err, 12, strlen($name_col_err)-22); // ��� ������� � ������� ��������� ������!!! :))
	   $_SESSION['_column_name_error']=$name_col_err;  // ���������� � add.php ��� ������ � ������� ���� ����, ��� ������� ������!!!
	   header("location:../index.php?action=edit&id_top_menu=$id_top_menu&id_sub_menu=$id_sub_menu&num_row=$num_row");
	   //echo"<br><a href='../index.php?action=add&id_top_menu=$id_top_menu&id_sub_menu=$id_sub_menu'>������� � ����� ����� ������.</a><br>";
	   Die;
	}
	 $request=str_replace("'","",$request_update); $request=str_replace("`","",$request);
	 $ip=$_SERVER['REMOTE_ADDR'];
 	 // ������� � ���� ����� �������� �� ����������.........
	 $log_querry=mysql_query("INSERT INTO `engine`.`log` (`id`,`user`,`ip`,`action`,`db`,`table`,`id_row`,`data`) VALUES (NULL, '$PHP_AUTH_USER', '$ip', 'Update', '$DB', '$table','$num_row','$request')"); //or die ($error_message_on_query.mysql_error());
}
  
mysql_close();


unset($_SESSION['_parametr']);
unset($_SESSION['_edit_array']);
if (@$_POST['apply']) 
{
     if ((isset($from_top_menu))&&(isset($from_sub_menu))) {$from_menu = "&from_top_menu=".$from_top_menu."&from_sub_menu=".$from_sub_menu;}
     else $from_menu = ""; // ������������ ��� ����������� ������������� ������ � "������� � ������� �������� ��"
     header("location:../index.php?action=edit&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu.$from_menu."&num_row=".$num_row);
}
if ($_POST['save']) {include ("redirect.php");}


?>