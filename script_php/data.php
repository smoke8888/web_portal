<?php
if (isset($id_sub_menu))
{
    $query_menu = mysql_query("SELECT * FROM `engine`.`menu` WHERE `id`=".$id_sub_menu);   
    while($menu = @mysql_fetch_assoc($query_menu)) 
	{
     	$menu_array = $menu;
	}
//print_r($menu_array);

///////////////// ЗАГРУЗКА данных  из PHP-файла напрямую ////////////////////////////////////////////////////////
    if ($menu_array['link'] != "") {include($menu_array['link']);}    

//////////////////////////////  DOC ////////////////////////////////////////////////////////////////////
    else
    {
        $query_doc = mysql_query("SELECT * FROM `engine`.`doc` WHERE `id`=".$menu_array['id_doc']);   
        while($doc = @mysql_fetch_assoc($query_doc)) 
        {
            $doc_array = $doc;
			//print_r($doc_array); echo "<br><br>";
        }
		include("privilegies.php"); // проверяем привилегии пользователя по работе с порталом
		if ($select_privilegies === true) // проверяем обощенные привилегии на просмотр базы данных
		{
			if (@$action == "edit") include("edit.php"); // редактирование записи
			if (@$action == "add") include("add.php");  // добавление записи			
			if (@$action == "dop_info") include($doc_array['dop_info_script']);  // доп. обработка записи
			if ((@$action != "add")&&(@$action != "edit")&&(@$action != "dop_info"))include("data_show_tables_left_join.php"); // отображение таблицы
		}
		else {echo "<p>У Вас нет прав на просмотр содержимого страницы.</p>";}
    }
}
?>    
