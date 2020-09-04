<?php
//___________________________содеинение с БД $DB____________________________________________ 
$openConn2db = mysql_connect("localhost", "$PHP_AUTH_USER", "$PHP_AUTH_PW"); 
//___________________установка национальной кодировки после соединения с БД_________________
  mysql_query ("set character_set_client='cp1251'");  
  mysql_query ("set character_set_results='cp1251'");  
  mysql_query ("set collation_connection='cp1251_general_ci'");  

$query_menu = mysql_query("SELECT * FROM `engine`.`menu` WHERE `id`=".$id_sub_menu);   
$menu = @mysql_fetch_assoc($query_menu);
  
$query_doc = mysql_query("SELECT `DB`,`table` FROM `engine`.`doc` WHERE `id`=".$menu['id_doc']);   
$doc = @mysql_fetch_assoc($query_doc); 

if ($num_row != 0)
{		  
        mysql_query("DELETE FROM `".$doc['DB']."`.`".$doc['table']."` WHERE id=".$num_row);

        $ip=$_SERVER['REMOTE_ADDR'];

        // заносим в базу логов действие по добавлению.........
        $log_querry=mysql_query("INSERT INTO `engine`.`log` (`id`,`user`,`ip`,`action`,`db`,`table`,`id_row`,`data`) 
	VALUES (NULL, '".$PHP_AUTH_USER."', '".$ip."', 'Delete', '".$doc['DB']."', '".$doc['table']."','".$num_row."','-')");
}
mysql_close();

include ("redirect.php");
?>