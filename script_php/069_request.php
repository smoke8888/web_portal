<?php
$oktazy = "`reestr`.`otkazy`";


$openConn2db = mysql_connect("localhost", "smoke", "FBIXFiles"); 
//___________________установка национальной кодировки после соединения с БД_________________
mysql_query ("set character_set_client='cp1251'");  
mysql_query ("set character_set_results='cp1251'");  
mysql_query ("set collation_connection='cp1251_general_ci'"); 



$query_last_record = mysql_query("SELECT `timestamp` FROM ".$oktazy." 
WHERE (`id_users` = '147') ORDER BY `timestamp` DESC LIMIT 1") or die (mysql_error()); 

// если запрос прошел, то получаем дату последней записи из БД 069 в 
if (mysql_num_rows($query_last_record)) {$r = @mysql_fetch_assoc($query_last_record); $last_date_069 = $r['timestamp']; }

print_r($last_date_069);

mysql_close();

$openConn2db = mysql_connect("195.112.238.40", "krasn", "Gph5c4"); 
//___________________установка национальной кодировки после соединения с БД_________________
mysql_query ("set character_set_client='cp1251'");  
mysql_query ("set character_set_results='cp1251'");  
mysql_query ("set collation_connection='cp1251_general_ci'"); 


$query_table = mysql_query("SELECT from_unixtime(`date2`), phone, fio, address, phis, services, ocomment, ids_tex, statmen 
FROM `069x`.`requests` 
WHERE (from_unixtime(`date2`)> '".$last_date_069."') AND ((`services` = 'a') OR (`services` = 'b') OR (`services` = 'k') OR (`services` = 'c')
OR (`services` = 'f') OR (`services` = 'c') OR (`services` = 'l') OR (`services` = 'p') OR (`services` = 'r') OR (`services` = 'n') 
OR (`services` = 'u') OR (`services` = 'x') OR (`services` = 'z')) AND (`statmen` = 'Нет технической возможности') ORDER BY `date2`") or die (mysql_error());

//// Вывод таблицы на экран //////////////////////////////////////////////////////////////////////////////////////////////////////
echo"<table border='1'>";
$p=1; $i=0;
while($table = @mysql_fetch_assoc($query_table)) 
{	
	if ($p == 1) 
	{       
		echo"<thead>";
		echo"<tr>";
	 	foreach ($table as $ind => $zn)
		{                                       //вывод заголовков столбцов                      
		       echo"<th>";
		       echo $ind;  // если русского аналога названия не находим, то выделяем его
		       echo"</th>";
		} 
		echo"</tr>";
		echo"</thead>";		 
	}
	$p=2;
	echo"<tbody>";
	echo"<tr>";	
	foreach ($table as $ind => $zn)
	{		
	              echo"<td>".$zn."</td>"; 
		      if (($ind == "phis")&&($zn == 0)) {$znachenie = 2;}  // юрики в нашей базе как 2, а в 069 0
		      else if ($ind == "services") // конвертация переченя услуг
		      {
	       	          if ($zn == "a") {$znachenie = 1;}
	       	          else if ($zn == "b") {$znachenie = 3;}
	       	          else if ($zn == "k") {$znachenie = 4;}
	       	          else if ($zn == "c") {$znachenie = 2;}
	       	          else if ($zn == "f") {$znachenie = 5;}
	       	          else if ($zn == "l") {$znachenie = 6;}
	       	          else if ($zn == "z") {$znachenie = 7;}
	       	          else if (($zn == "p")||($zn == "r")) {$znachenie = 2;}
			  else if (($zn == "n")||($zn == "u")||($zn == "x")) {$znachenie = 4;}	 	       	          
 		      }
 		      else if ($ind == "statmen") {continue;}
 		      else {$znachenie = $zn;}
	              $massiv_069[$i][$ind] = $znachenie;		          
	}
	$i++;
	echo"</tr>";
	echo"</tbody>";
} 
echo"</table>";
//print_r($massiv_069);

mysql_close();


$openConn2db = mysql_connect("localhost", "smoke", "FBIXFiles"); 
//___________________установка национальной кодировки после соединения с БД_________________
mysql_query ("set character_set_client='cp1251'");  
mysql_query ("set character_set_results='cp1251'");  
mysql_query ("set collation_connection='cp1251_general_ci'"); 


for($k=0; $k <= $i-1; ++$k)
{
    if ($massiv_069[$k]['ocomment'] == "") {$massiv_069[$k]['ocomment'] = "-";} // ставим - для пустых коментов, дабы можно было технарям нормально редактировать свои данные. не давал сохранять изменения.
    mysql_query("INSERT INTO $oktazy VALUES (NULL,'".substr($massiv_069[$k]['from_unixtime(`date2`)'], 0, 10)."',
    '".$massiv_069[$k]['from_unixtime(`date2`)']."',0,'".$massiv_069[$k]['address']."','".$massiv_069[$k]['phone']."','".$massiv_069[$k]['fio']."',
    '".$massiv_069[$k]['phis']."','".$massiv_069[$k]['services']."','16','-','-','-',0,'".$massiv_069[$k]['ocomment']."',
    '0000-00-00',147,'".$massiv_069[$k]['from_unixtime(`date2`)']."')") or die (mysql_error()); 
} 
mysql_close(); 

?>