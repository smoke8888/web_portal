<?php

$navi_string = "Cтраницы:";
if ($PHP_AUTH_USER == "smoke") {
//echo "SELECT COUNT(`".$doc_array['DB']."`.`".$doc_array['table']."`.`id`) FROM ".$from." ".$where.$filter.$login_center;
//echo "SELECT SQL_NO_CACHE ".$from.".`id` FROM ".$from.$left_join." ".$where.$filter.$login_center." ORDER BY `id` ASC";
}
$num_rows_query=mysql_query("SELECT SQL_NO_CACHE ".$from.".`id` FROM ".$from.$left_join." ".$where.$filter.$login_center." ORDER BY `id` ASC") or die($error_message_on_query.mysql_error()."во время процедуры paging");
while ($id_list = @mysql_fetch_row($num_rows_query)) {$id_array[] = $id_list[0];}
if (isset($id_array)) $_SESSION['_id_list_array'] = $id_array;  // массив id используем в edit.php для создания ссылок на след и пред строку 
$total_rows=mysql_num_rows($num_rows_query);				    // всего строк таблицы
$from_page = 0;												    // начальная страница
$per_page = 50;													// число строк на страницу
$num_page_to_block = 10;										// число страниц в блоке
$num_pages_total = ceil($total_rows/$per_page); 				// общее число страниц запроса
$num_block = ceil($num_pages_total/$num_page_to_block);         // количество блоков в которые группируем страницы



if (isset($from_page_sel)) {$_SESSION['_from_page'] = $from_page_sel; $current_page = $from_page_sel/$per_page;}
if (isset($_SESSION['_from_page'])) {$current_page = $_SESSION['_from_page']/$per_page;}
if (!isset($block)) {$block = 0;}
$n = 0;
for($i=0; $i<=$num_block; ++$i)
for($j=0; $j<$num_page_to_block; ++$j)
{  
   $page_massiv[$i][$j] = $n;       		// создаем массив страниц
   $quick_sel_page_maqssiv[] = $n;
   if ($n == @$current_page) {$block = $i;}
   ++$n;
   if ($n >= $num_pages_total) {$last_page_index = $j; break;}
}

if ($block > 0) 
{
    $from_page = $page_massiv[0][0]*$per_page; 
	$first_page = "&nbsp;<a href=index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&from_page_sel=".$from_page." class=mn7>Первая</a>&nbsp;";
    
    $from_page = $page_massiv[$block-1][0]*$per_page;
	$first_block = "&nbsp;<a href=index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&from_page_sel=".$from_page." class=mn7><<</a>&nbsp;"; 
}

for($j=0; $j<count($page_massiv[$block]); ++$j) // формирование списка страниц
{
    $from_page = $page_massiv[$block][$j]*$per_page;   
    $page = $page_massiv[$block][$j]+1;
    
    if ((@$_SESSION['_from_page'] == $from_page)||((!isset($from_page_sel))&&(!isset($_SESSION['_from_page']))&&($j==0))) 
    {
	     $page_link = @$page_link."&nbsp;<font size=3px><strong>".$page."</strong></font>&nbsp;";    // выделяем вномер выбранной страницы
    } 
    else  
	{
		 $page_link = @$page_link."&nbsp;<a href=index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&from_page_sel=".$from_page." class=mn7>".$page."</a>&nbsp;"; // номера остальных страниц
	}   

}    

//// если выбранный блок не последний, отрисовываем переход на следующий блок /////////////////////////////////////////////////////////////////////    
if ($block < $num_block-1) 
{
    $from_page = $page_massiv[$block+1][0]*$per_page; 
	$last_block = "&nbsp;<a href=index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&from_page_sel=".$from_page." class=mn7>>></a>&nbsp;";
	if (ceil($num_block)>1)
	{
	     $end_page = $page_massiv[$num_block][$last_page_index]; 
		 $from_page = ($end_page-1)*$per_page; 
		 $last_page = "&nbsp;<a href=index.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu."&from_page_sel=".$from_page." class=mn7>Последняя (".$end_page.")</a>&nbsp;";
	}
} 

if (isset($from_page_sel)) 
{
    $LIMIT = "LIMIT ".$from_page_sel.", ".$per_page;
    $_SESSION['_from_page'] = $from_page_sel;
} 
else 
{     
    if (isset($_SESSION['_from_page'])) 
    {     
      $current_page = $_SESSION['_from_page']/$per_page;
      if ($current_page < $num_pages_total) {$from_page = $_SESSION['_from_page']; $LIMIT = "LIMIT ".$from_page.", ".$per_page;}
    }  
    else {$LIMIT = "LIMIT 0, ".$per_page;}
}


@$paging = $navi_string.$first_page.$first_block.$page_link.$last_block.$last_page;

/*echo"from_page:"; print_r($from_page); echo"<br>";
echo"from_page_sel:"; print_r($from_page_sel);     echo"<br>";
echo"session:"; print_r($_SESSION['_from_page']);  echo"<br>";
echo"LIMIT:"; echo $LIMIT ;*/
//echo ceil($total_rows/$per_page); echo"<br>";
//echo $end_page; echo"<br>";
//echo $num_block; echo"<br>";
//echo $last_page_index; echo"<br>";
//print_r($page_massiv);
?>