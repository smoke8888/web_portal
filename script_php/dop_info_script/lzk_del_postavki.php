<?php
require("../system_message.php");
//___________________________содеинение с БД $DB____________________________________________ 
$openConn2db = mysql_connect("localhost", "$PHP_AUTH_USER", "$PHP_AUTH_PW"); 
//___________________установка национальной кодировки после соединения с БД_________________
  mysql_query ("set character_set_client='cp1251'");  
  mysql_query ("set character_set_results='cp1251'");  
  mysql_query ("set collation_connection='cp1251_general_ci'");  

if ($num_row != 0)
{		  
        mysql_query("DELETE FROM `lzk`.`postavki` WHERE id=".$del_row) or die($error_message_on_query.mysql_error());

        $ip=$_SERVER['REMOTE_ADDR'];

        // заносим в базу логов действие по добавлению.........
        $log_querry=mysql_query("INSERT INTO `engine`.`log` (`id`,`user`,`ip`,`action`,`db`,`table`,`id_row`,`data`) 
	VALUES (NULL, '".$PHP_AUTH_USER."', '".$ip."', 'Delete', 'lzk', 'postavki','".$del_row."','-')")  or die($error_message_on_query.mysql_error());
}
mysql_close();

header("location: http://".$_SERVER[HTTP_HOST]."/index.php?action=dop_info&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu.$from_menu."&num_row=".$num_row);
?>