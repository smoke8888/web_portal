<?php 
session_start();
		  
// localhost is the default database hosf for most servers, you might need to change yours if it doesnt work
mysql_connect("localhost", "$PHP_AUTH_USER", "$PHP_AUTH_PW");  // This establishes the database connection
mysql_query ("set character_set_client='cp1251'");  
mysql_query ("set character_set_results='cp1251'");  
mysql_query ("set collation_connection='cp1251_general_ci'");  

$query_menu = mysql_query("SELECT * FROM `engine`.`menu` WHERE `id`=".$id_sub_menu);   
$menu = @mysql_fetch_assoc($query_menu);
  
$query_doc = mysql_query("SELECT * FROM `engine`.`doc` WHERE `id`=".$menu['id_doc']);   
$doc_array = @mysql_fetch_assoc($query_doc); 

header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=".$doc_array['table'].".xls");             
header("Pragma: no-cache"); 
header("Expires: 0"); 


///// ‘ункци€ экспортв в Ёксель ////////////////////////////////////////////////////////////////////////////
function display_db_table($doc_array)
{
	    // создание временной таблицы дл€ работы со спецтаблицами и заполнение ее предварит. данными
		if ($doc_array['smart_query'] == 1)
		{
			if (strstr(@$_SESSION['LEFT_JOIN_2'], 'centers'))	$login_center = @$_SESSION['_login_center'];   else $login_center = "";
			$random_tbl_name = rand();
			$query_create = mysql_query("CREATE TABLE `temporary`.`".$random_tbl_name."` 
										(`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,".$_SESSION['_CREATE_2'].") ENGINE = MYISAM")
										or die($error_message_on_query.mysql_error()." в export"); 
			$query_insert = mysql_query("INSERT INTO `temporary`.`".$random_tbl_name."` 
										 SELECT `".$doc_array['DB']."`.`".$doc_array['table']."`.`id`, ".$_SESSION['_SELECT_2']." 
										 FROM `".$doc_array['DB']."`.`".$doc_array['table']."`".$_SESSION['LEFT_JOIN_2']." ".$_SESSION['_WHERE_2'].$login_center);
			// мен€ем название исходной таблицы на название временной таблицы
			$_SESSION['_WHERE'] = str_replace("`".$doc_array['DB']."`.`".$doc_array['table']."`", "`temporary`.`".$random_tbl_name."`", $_SESSION['_WHERE']);
			$_SESSION['LEFT_JOIN'] = str_replace("`".$doc_array['DB']."`.`".$doc_array['table']."`", "`temporary`.`".$random_tbl_name."`", $_SESSION['LEFT_JOIN']);
			$_SESSION['_SELECT'] = str_replace("`temporary`.`virtual_tbl_name`", "`temporary`.`".$random_tbl_name."`", $_SESSION['_SELECT']);
			$_SESSION['_filter_string'] = str_replace("`temporary`.`virtual_tbl_name`", "`temporary`.`".$random_tbl_name."`", $_SESSION['_filter_string']);
			$_SESSION['_ORDER'] = str_replace("`temporary`.`virtual_tbl_name`", "`temporary`.`".$random_tbl_name."`", $_SESSION['_ORDER']);
			$from = "`temporary`.`".$random_tbl_name."`";
			//if (strstr(@$_SESSION['_FROM'], 'centers_2'))	$login_center = @$_SESSION['_login_center2']; else 
			$login_center = "";
		}
		else 
		{    
		     $from = "`".$doc_array['DB']."`.`".$doc_array['table']."`";    
			 if (strstr(@$_SESSION['LEFT_JOIN'], 'centers'))	$login_center = @$_SESSION['_login_center']; else $login_center = "";
	    }
   
	   $query_table = mysql_query("SELECT SQL_NO_CACHE ".$from.".`id`, ".$_SESSION['_SELECT']." FROM ".$from.$_SESSION['LEFT_JOIN']." ".$_SESSION['_WHERE'].@$_SESSION['_filter_string'].$login_center.$_SESSION['_ORDER'])
or die(mysql_error()); 
//уничтожение временной таблицы
if ($doc_array['smart_query'] == 1)
{
   $query_drop = mysql_query("DROP TABLE `temporary`.`".$random_tbl_name."`") or die($error_message_on_query.mysql_error()." в drop temporary tables в data_show_tables"); 
}
	   $p=1;
	   while($table = @mysql_fetch_assoc($query_table)) 
	   {
	       if ($p == 1) 
	   	   {
			   foreach ($table as $ind => $zn)
			   {
					   if (($ind!="id")&&($ind!='file')) 
					   {                                          //вывод заголовков столбцов                      
						foreach (@$_SESSION['_rusfield_array'] as $ind1 => $zn1)
							{
								if ($ind == $zn1['eng_field']) {@$data .= $zn1['rus_field'] . "\t"; break;}//вывод русского название поля;	
							}   
					   }
			   }
		   }	
		   $p=2;   
		   $data .= "\n";
		   $column_num = 0;
	 	   foreach ($table as $ind => $zn)
		   {       
				if (($ind=="id")||($ind=='file')) {++$column_num; continue;}
				$zn = str_replace("\n",@$lbChar,$zn);
				$zn = preg_replace('/([\r\n])/e',"ord('$1')==10?'':''",$zn);
				$zn = str_replace("\\","",$zn);			
				$type= mysql_field_type($query_table, $column_num);
				if ($type=='real') {$zn=str_replace(".",",",$zn);}
				$data .= "$zn\t";
				$column_num++;
		   }		   
	   }	
	   echo $data;	
}


display_db_table($doc_array); // You can have multiple tables in one excel spreadsheet, just copy the line to the left and change the table name.
mysql_close();
?>
