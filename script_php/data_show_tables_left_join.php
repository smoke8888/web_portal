<?php

/////////////////////  формируем сессионный массив названий колонок всех таблиц и используем в фильтрации, добавлении, редактировании и выводе таблицы ////////
if (!@$_SESSION['_rusfield_array']) 
{
	$query_rusfield = mysql_query("SELECT * FROM `engine`.`tables_fields`")or die($error_message_on_query.mysql_error()); 
	while ($rusfield = @mysql_fetch_assoc($query_rusfield))		//выгрузка в массив данных из базы с русскими названиями колонок
	{
		 @$_SESSION['_rusfield_array'][]=$rusfield;
	}
	//print_r($_SESSION['_rusfield_array']); 
}


///////// Функция рекурсивного вывода последовательности дочерних таблиц /////////////////////////////////////////////////////////////////////
function vetvlenie_down($x)
{
	global $interconnect_array_key;
	global $doc_array;
	global $interconnect_array;
	global $upd_interconnect_array;
	global $left_join;
	global $left_join_2;
	global $first_children;
	// получение массива таблиц увязанных с ключами индекс сортировки sort
	$upd_interconnect_array[$interconnect_array[$x]['sort']]['name'] = "`".$interconnect_array[$x]['DB']."`.`".$interconnect_array[$x]['table']."`";
	$upd_interconnect_array[$interconnect_array[$x]['sort']]['id'] = $interconnect_array[$x]['id'];  
	$upd_interconnect_array[$interconnect_array[$x]['sort']]['id_parent'] = $interconnect_array[$x]['id_parent'];  
	for($i=0; $i < count($interconnect_array); $i++)
	{
		// определяем прямых детей исходной таблицы, для выгрузки их по умолчанию
		if ((strstr($interconnect_array[$i]['id_parent'], " ".$doc_array['id'].","))&&
		    (!in_array("`".$interconnect_array[$i]['DB']."`.`".$interconnect_array[$i]['table']."`", $first_children, true)))
		{$first_children[] = "`".$interconnect_array[$i]['DB']."`.`".$interconnect_array[$i]['table']."`";}
		// поиск всех детей
		if (strstr($interconnect_array[$i]['id_parent'], " ".strval($interconnect_array[$x]['id']).",")) 
		{						
			// для спец таблиц обходим запись таблиц с именем _2 в Left_Join 
			if ($doc_array['smart_query'] == 1)
			{
				if (strstr($interconnect_array[$i]['table'], "_2"))
				{
					// убираем приставку _2 для формирования АЛИАСов 
					$tbl_name_bez_2 = substr($interconnect_array[$i]['table'], 0, strlen($interconnect_array[$i]['table'])-2); 
					
					// формируем LEFT_JOIN для таблиц со сдвоенными площадками вида (`ploshadki_2`.`id` = `temporary`.`4056`.`id_ploshadki_2`)
					if (($interconnect_array[$x]['DB'] == $doc_array['DB']) && ($interconnect_array[$x]['table'] == $doc_array['table']))
					$left_join = @$left_join." LEFT JOIN `".$interconnect_array[$i]['DB']."`.`".$tbl_name_bez_2."` as `".$interconnect_array[$i]['table']."` on (`".$interconnect_array[$i]['table']."`.`id` = `".$interconnect_array[$x]['DB']."`.`".$interconnect_array[$x]['table']."`.`id_".$interconnect_array[$i]['table']."`)";
					// для таблиц выше таблиц с двойными площадками формируем строку (`ploshadki_2`.`id` = `temporary`.`4056`.`id_ploshadki_2`)
					else if (($doc_array['advanced_query'] == 1) && (strstr($interconnect_array[$x]['id_parent'], $interconnect_array[$interconnect_array_key]['id'])))
					$left_join = @$left_join." LEFT JOIN `".$interconnect_array[$i]['DB']."`.`".$interconnect_array[$i]['table']."` on (`".$interconnect_array[$i]['table']."`.`id` = `".$doc_array['DB']."`.`".$doc_array['table']."`.`id_".$interconnect_array[$i]['table']."`)";
					// для остальных таблиц формируем обычную связь (`punkty_2`.`id` = `ploshadki_2`.`id_punkty)
					else
					$left_join = @$left_join." LEFT JOIN `".$interconnect_array[$i]['DB']."`.`".$tbl_name_bez_2."` as `".$interconnect_array[$i]['table']."` on (`".$interconnect_array[$i]['table']."`.`id` = `".$interconnect_array[$x]['table']."`.`id_".$tbl_name_bez_2."`)";
				}
				else 
				{
					$left_join_2 = @$left_join_2." LEFT JOIN `".$interconnect_array[$i]['DB']."`.`".$interconnect_array[$i]['table']."` on (`".$interconnect_array[$i]['DB']."`.`".$interconnect_array[$i]['table']."`.`id` = `".$interconnect_array[$x]['DB']."`.`".$interconnect_array[$x]['table']."`.`id_".$interconnect_array[$i]['table']."`)";
				}					  
			}
			else // для простых таблиц
			{
				$left_join = @$left_join." LEFT JOIN `".$interconnect_array[$i]['DB']."`.`".$interconnect_array[$i]['table']."` on (`".$interconnect_array[$i]['DB']."`.`".$interconnect_array[$i]['table']."`.`id` = `".$interconnect_array[$x]['DB']."`.`".$interconnect_array[$x]['table']."`.`id_".$interconnect_array[$i]['table']."`)";      
			}
			vetvlenie_down($i);		
		}	
	}
	return; 
}

///////// запись в массив interconnect_array таблицы связей между базами данных портала ////////////////////////////////////////////////////////
$query_interconnect = mysql_query("SELECT `id`,`DB`,`table`,`id_parent`,`sort` FROM `engine`.`doc` ORDER BY `sort` ASC") 
or die($error_message_on_query.mysql_error());
$i=0;
while ($interconnect = @mysql_fetch_assoc($query_interconnect))
{
    $interconnect_array[] = $interconnect;
	// определение индекса в interconnect_array где лежит родитель - запрошенная таблица
	if (($interconnect['DB'] == $doc_array['DB'])&&($interconnect['table'] == $doc_array['table'])) {$interconnect_array_key = $i;} 
	$i++;
}

$first_children = array(); // инициализация массива используемого в функции vetvlenie_down
$m = 0; // используется в ;tables_columns_list
// вызов функции рекурсивного вывода последовательности дочерних таблиц
vetvlenie_down($interconnect_array_key);  
// сортировка массива связанных таблиц согласно их индексам
ksort($upd_interconnect_array);


/////// обработка нажатой кнопки select_field_button выбора колонок таблицы ///////////////////////////////////////////////////////////////////////////////////////
// выгружаем из БД список колонок для данного пользователя, если он конечно там записан
$search_query = mysql_query("SELECT * FROM `engine`.`field_selector` WHERE (`user` = '".$PHP_AUTH_USER."') AND (`db` = '".$doc_array['DB']."') AND (`tbl` = '".$doc_array['table']."') AND (`field_list` <> '')");
if (isset($search_query)) $search_field_selector = mysql_fetch_assoc($search_query);

if (((isset($select_field_button))&&(count($_POST) >= 4))||(count(@$_SESSION['_field_selector'])>4)||(count($search_field_selector['field_list'])>0))    
{   // если в $_POST записаны данные (после отправки формы выбора колонок)  
	if (count($_POST) >= 4)  $_SESSION['_field_selector'] = $_POST;
	else
	{   // если сессии еще нет, то формируем массив _field_selector из БД
		if ((count($search_field_selector['field_list'])>0)&&((count(@$_SESSION['_field_selector'])<=4)||(!isset($_SESSION['_field_selector']))))
		{
			 $_SESSION['_field_selector'] = unserialize($search_field_selector['field_list']);
		}
	}
	//формирование СЕЛЕКТА из $_SESSION['_field_selector'] 
	$selected_tables_array[] = ""; // без этого ругается на array_search
	$select = "";
	foreach ($_SESSION['_field_selector'] as $ind => $zn)			
	{   
		if (($ind === 'select_field_button')||($ind === 'DB')||($ind === 'table')) {continue;}
		if (strstr($ind, 'zxc')) 
		{ 	 
			if (strstr($zn, " as "))
			{
				$str_pos = strrpos($zn, " "); 
				$znach=substr($zn, $str_pos+1, strlen($zn)-$str_pos);
				$order = @$order.$znach; continue; 
			}
			else $order = @$order.$zn; continue;
		}
		if (strstr($ind, 'vbn')) {$order = $order." ".$zn.", "; continue;}
		$select = $select.$zn.", ";	
	}
	if (@$order == "") {$order = "`id` ASC, ";} // если снята сортировка вообще и при этом не дефолтовский показ
}
else {$dflt_load = true; $order = "`id` ASC, "; unset($_SESSION['_field_selector']);}	 


$have_table_2 = false;
foreach($upd_interconnect_array as $ind => $zn)
{		 
	 // $tables_columns_list содержит все колонки связанных таблиц, для возможности их выбора пользователем......
	 // убираем _2 из псевдоплощадок_2. устанавливаем флаг появления псевдотаблицы в истину....
	 if (strstr($zn['name'], '_2'))  
	 {
	      $dot_pos = strpos($zn['name'],".");
		  $tbl_name_2 = substr($zn['name'], $dot_pos+1, strlen($zn['name']));
		  //echo $tbl_name_2;
		  $zn['name'] = substr($zn['name'], 0, strlen($zn['name'])-3); 
		  $zn['name'] = $zn['name']."`";  
		  $have_table_2 = true;
	 }
	 
	 $query_show_columns = mysql_query("SHOW FULL COLUMNS FROM ".$zn['name']);
	 while ($columns = @mysql_fetch_assoc($query_show_columns))
	 {			
			// не показываем timestamp и primechanie других таблиц т.к. это не нужно (а также user_login, user_password из таблицы users)
			if ((($columns['Field']=='timestamp')||($columns['Field']=='primechanie')||($columns['Field']=='user_login')||($columns['Field']=='user_password'))&&($zn['name'] != "`".$doc_array['DB']."`.`".$doc_array['table']."`")) continue;	
			// для SMART_QUERY
			if ($doc_array['smart_query'] == 1) 
			{
				if (($columns['Field'] === 'id') || (($columns['Field'] === 'group'))) continue;
				// если имеет место псевдотаблица, то записываем ее колонки с алиасами......
				if (($have_table_2 == true)&&(!strstr($columns['Field'], 'id_'))) {$tables_columns_list[$zn['name'].$m++] = $tbl_name_2.".`".$columns['Field']."` as ".$columns['Field']."_2";}	 
				// остальные колонки входят в состав темпорари таблицы.....
				if (($have_table_2 == false)&&(!strstr($columns['Field'], 'id_'))&&(!strstr($columns['Field'], '_2'))) $tables_columns_list[$zn['name'].$m++] = "`temporary`.`virtual_tbl_name`.`".$columns['Field']."`"; 							
				// сохраняем в select все поля конечного запроса
				if ((@$dflt_load == true)&&($columns['Comment'] == 1)&&((in_array($zn['name'], $first_children))||(($zn['name'] == "`".$doc_array['DB']."`.`".$doc_array['table']."`"))))																
				{																								       		   			   			     
					if (!strstr($columns['Field'], 'id_'))
					{
						if ($have_table_2 == true) 
						{
							$select = @$select.$tbl_name_2.".`".$columns['Field']."` as ".$columns['Field']."_2, ";
							$_SESSION['_field_selector'][] = $tbl_name_2.".`".$columns['Field']."` as ".$columns['Field']."_2";	
						}
						else 
						{
							$select = @$select."`temporary`.`virtual_tbl_name`.`".$columns['Field']."`, ";
							$_SESSION['_field_selector'][] = "`temporary`.`virtual_tbl_name`.`".$columns['Field']."`";
						}
					}
				}
				// несохраняем в select_2 для запроса поля с именем без id_..._2 																							       		   			
				if (($have_table_2 == false)&&(((strstr($columns['Field'], '_2'))&&(strstr($columns['Field'], 'id_')))||
				((!strstr($columns['Field'], '_2'))&&(!strstr($columns['Field'], 'id_')))))
				{
				     $select_2 = @$select_2.$zn['name'].".`".$columns['Field']."`, ";	
				     $create_2 = @$create_2."`".$columns['Field']."` CHAR(255) NOT NULL, ";
			    }
			}
			else 
			{
				// простые запросы
				if (($columns['Field'] === 'id') || (strstr($columns['Field'], 'id_')) || (($columns['Field'] === 'group'))) continue;
				// запись в массив tables_columns_list названия полей таблиц окружения и запрошенной таблице 
				$tables_columns_list[$zn['name'].$m++] = $zn['name'].".`".$columns['Field']."`";
				// заносим в Select колонки с признаком 1 - default
				if ((@$dflt_load == true)&&($columns['Comment'] == 1)&&((in_array($zn['name'], $first_children))||(($zn['name'] == "`".$doc_array['DB']."`.`".$doc_array['table']."`"))))   
				{																								       		   			   // SELECT
					 $select = @$select.$zn['name'].".`".$columns['Field']."`, ";		   												   //
					 $_SESSION['_field_selector'][] = $zn['name'].".`".$columns['Field']."`";    										   //
				}
			}	
	 }
     $have_table_2 = false;	 	 
}

//если загрузка по умолчанию, то вставляем в _field_selector 3 служебных поля (в конец массива)
if (@$dflt_load == true)	$_SESSION['_field_selector']["select_field_button"] = "on"; $_SESSION['_field_selector']["DB"] = $doc_array['DB']; $_SESSION['_field_selector']["table"] = $doc_array['table'];

// убираем последние запятые из select и from, а также последний AND в WHERE
$select=substr($select, 0, strlen($select)-2); 
$_SESSION['_SELECT']=$select;
$_SESSION['LEFT_JOIN']=$left_join;
if ((isset($where))&&(strlen($where) > 6))  {$where=substr($where, 0, strlen($where)-4); $where = "WHERE ".$where;} else $where = "WHERE 1";
$_SESSION['_WHERE']=$where;
if ((isset($order))&&(strlen($order) > 0))  {$order=substr($order, 0, strlen($order)-2);  $order = " ORDER BY ".$order;} else $order = "";
$_SESSION['_ORDER']=$order;




//// обработка содержания фильтра при изменении перечня выводимых столбцов таблицы ///////////////////////////////////////////////////////////////////
$filter = "";
if (isset($_SESSION['_filter'])) 
{	
	foreach($_SESSION['_filter'] as $ind => $zn)
	{
	    // если в SELECT присутствует фильтрованное поле, то оставляем его в фильтре, и в запросе
		if (strstr($select, $ind)) $filter = $filter." AND ". $zn;
		else 
		{
		    // иначе уничтожаем этот элемент из массивов фильтрации
			unset($_SESSION['_filter'][$ind]);
			$str_pos = strrpos($ind, ".`"); $fld_name=substr($ind, $str_pos+2, strlen($ind)-$str_pos-3);
			unset($_SESSION['_mat_operator'][$fld_name]);
			unset($_SESSION['_filter_array'][$fld_name]);
		}	 		
	}
}

//print_r($_SESSION['_login_center']);echo"<br><br>";
//print_r($_SESSION['_login_center2']);echo"<br><br>";
$_SESSION['_filter_string'] = $filter;



// создание временной таблицы для работы со спецтаблицами и заполнение ее предварит. данными (с учетом логинов ЦТ)
if ($doc_array['smart_query'] == 1)
{
    // убираем последние запятые из select, а также последний AND в WHERE
	$create_2 = substr($create_2, 0, strlen($create_2)-2); 
	$_SESSION['_CREATE_2']=$create_2;
	$select_2 = substr($select_2, 0, strlen($select_2)-2); 
	$_SESSION['_SELECT_2']=$select_2;
	$_SESSION['LEFT_JOIN_2']=$left_join_2;
	if ((isset($where_2))&&(strlen($where_2) > 6))  {$where_2 = substr($where_2, 0, strlen($where_2)-4); $where_2 = "WHERE ".$where_2;} else $where_2 = "WHERE 1";
	$_SESSION['_WHERE_2']=$where_2;
   
    // получение ссылки на центр доступный пользователю //////////////////////////////////////////////////////////////////////////////
	if (strstr($left_join_2, 'centers'))	$login_center = @$_SESSION['_login_center'];   else $login_center = "";
	$random_tbl_name = rand();
	
	$query_create = mysql_query("CREATE TABLE `temporary`.`".$random_tbl_name."` (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,".$create_2.") ENGINE = MYISAM")
	or die($error_message_on_query.mysql_error()." в temporary tables в data_show_tables"); 
	
	$query_insert = mysql_query("INSERT INTO `temporary`.`".$random_tbl_name."` 
 	SELECT `".$doc_array['DB']."`.`".$doc_array['table']."`.`id`, ".$select_2." FROM `".$doc_array['DB']."`.`".$doc_array['table']."`".$left_join_2." ".$where_2.$login_center)
	or die($error_message_on_query.mysql_error()." в temporary tables в data_show_tables"); ;
	// меняем название исходной таблицы на название временной таблицы
	$where = str_replace("`".$doc_array['DB']."`.`".$doc_array['table']."`", "`temporary`.`".$random_tbl_name."`", $where);
	$left_join = str_replace("`".$doc_array['DB']."`.`".$doc_array['table']."`", "`temporary`.`".$random_tbl_name."`", $left_join);
	$select = str_replace("`temporary`.`virtual_tbl_name`", "`temporary`.`".$random_tbl_name."`", $select);
	$filter = str_replace("`temporary`.`virtual_tbl_name`", "`temporary`.`".$random_tbl_name."`", $filter);
	$order = str_replace("`temporary`.`virtual_tbl_name`", "`temporary`.`".$random_tbl_name."`", $order);
	$from = "`temporary`.`".$random_tbl_name."`";
	//if (strstr($from, 'centers_2'))	{$login_center = @$_SESSION['_login_center2'];}        // вышестоящая АТС видит нижестоящую из другого ЦТ
	//else 
	$login_center = "";
}
else 
{    
	$from = "`".$doc_array['DB']."`.`".$doc_array['table']."`";    
    // получение ссылки на центр доступный пользователю //////////////////////////////////////////////////////////////////////////////
    if (strstr($left_join, 'centers'))	$login_center = @$_SESSION['_login_center']; else $login_center = "";
}
$_SESSION['_FROM']=$from;
/*

// обработка выбора фильтра "ГОД"
/*if (strlen($doc_array['filter_year']) > 1)
{
echo $filter_year[0];
print_r($_SESSION['_filter_year']); 

if ((isset($filter_year[0]))&&(!isset($_SESSION['_filter_year'])))   //если входим первый раз в таблицу, показываем данные последнего года   
{       
    $_SESSION['_filter_year'] = $filter_year[0];
    // если выбрали год, формируем строку фильтра
    $from_page_sel = 0; // обнуляем номер начальной страницы таблицы, дабы не попасть в несуществующую страницу
    if ($filter_year[0] != 'all') {$filter = $filter." AND (YEAR(`".$doc_array['filter_year']."`) = ".$filter_year[0].")";}
} 
   $query_filter_year = mysql_query("SELECT DISTINCT YEAR(`".$doc_array['filter_year']."`) 
   FROM ".$bd_table_name.",`spravochnik`.`centers` AS `centers_2`, `spravochnik`.`centers` WHERE 1".$login_center." 
   ORDER BY ".$doc_array['filter_year']." DESC") or die($error_message_on_query.mysql_error()." в data_show_tables в fiter_year");
   $n=0;         
   while ($filter_year1 = @mysql_fetch_row($query_filter_year))
   {
     $filter_year[$n] = $filter_year1[0]; $n++;
   } 
}
// если был переход на другую страницу таблицы
if ((strlen($doc_array['filter_year']) > 1)&&(isset($_SESSION['_filter_year']))&&($_SESSION['_filter_year'] != 'all')) 
{$filter = $filter." AND (YEAR(`".$doc_array['filter_year']."`) = ".$_SESSION['_filter_year'].")";}
if (@$filter_year[0] == "all") {$_SESSION['_filter_year'] = "all"; $from_page_sel = 0;}
*/






if ($PHP_AUTH_USER == "smoke") {
//print_r($_SESSION['_filter']);
//print_r($first_children);echo"<br><br>";
//print_r($interconnect_array); echo"<br><br>"; 
//print_r($upd_interconnect_array); echo"<br><br>";
//print_r($where_array); echo"<br><br>";

//print_r($tables_columns_list); echo"<br><br>";
//print_r($_SESSION['_field_selector']);echo"<br><br>";
//echo"select: ";
//print_r($select); echo"<br>";echo"<br>";
//echo"from: ";
//print_r($from); echo"<br>";echo"<br>";
//echo"left_join: ";
//print_r($left_join); echo"<br>";echo"<br>";
//echo"where: ";
//print_r($where); echo"<br>";echo"<br>";
//echo"create_2: ";
//print_r($create_2); echo"<br>";echo"<br>";
//echo"select_2: ";
//print_r($select_2); echo"<br>";echo"<br>";
//echo"from_2: ";
//print_r($from_2); echo"<br>";echo"<br>";
//echo"left_join_2: ";
//print_r($left_join_2); echo"<br>";echo"<br>";
//echo"where_2: ";
//print_r($where_2); echo"<br>";echo"<br>";
//echo"filter: ";
//print_r($filter); echo"<br>";echo"<br>";
//echo"login_center: ";
//print_r($login_center); echo"<br>";echo"<br>";
//echo"order: ";
//print_r($order); echo"<br>";echo"<br>";
//echo"post: "; print_r($_POST); echo"<br>";

//echo"<br>";echo "SELECT ".$from.".`id`, ".$select." FROM ".$from.$left_join." ".$where.$filter.$login_center.$order." ".$LIMIT;
}

//// расчет постраничной разбивки текста /////////////////////////////////////////////////////////////////////////////////////////
if ($doc_array['paging'] == 1)  require ("paging.php"); 

//// SQL ЗАПРОС ВЫВОДА ТАБЛИЦЫ ///////////////////////////////////////////////////////////////////////////////////////////////////
$query_table = mysql_query("SELECT ".$from.".`id`, ".$select." FROM ".$from.$left_join." ".$where.$filter.$login_center.$order." ".@$LIMIT)
or die($error_message_on_query.mysql_error()." в запросе вывода таблицы data_show_tables"); 

//уничтожение временной таблицы
if ($doc_array['smart_query'] == 1)
{
   $query_drop = mysql_query("DROP TABLE ".$from) or die($error_message_on_query.mysql_error()." в drop temporary tables в data_show_tables"); 
}

//////////// НАЗВАНИЕ ТАБЛИЦЫ ////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<div class=\"table_name\">".$menu_array['name']."</div>";


//// ФИЛЬТРЫ, ОПЦИИ /////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo"<table border=0 width=\"100%\">";
  echo"<tr>"; 
	if (($doc_array['add_row'] == 1)&&($insert_privilegies == true)) {echo"<td valign=\"middle\" align=\"center\" width=\"70\">
	<a href=index.php?action=add&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu." id=\"add_row\"></a></td>";}     			
	if ($doc_array['export_excel'] == 1) {echo"<td valign=\"middle\" align=\"center\" width=\"70\"><a href=script_php/export.php?id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu." id=\"export_excel\"></a></td>";} 	
	if ($doc_array['filter'] == 1)  {echo"<td valign=\"middle\" align=\"center\" width=\"70\">"; include("filter_form.php"); echo"</td>";} 	
	if (count($tables_columns_list) > 1) {echo"<td valign=\"middle\" align=\"center\" width=\"70\">"; include("field_selector.php"); echo"</td>";} 
	if (count(@$_SESSION['_filter'])>0) {echo"<td align=\"left\" class=\"text\"></td>";}
    /*echo "<td>";
	   if (strlen($doc_array['filter_year']) > 1) 
	   {
		  echo "<div id=\"paging\"><form id='form_filter_year' name='form_filter_year' method='post' action=''>";
		  echo "Данные за <select name='filter_year[0]' size='1' onchange='this.form.submit();'>";
		  echo "<option value='all'"; if (@$_SESSION['_filter_year']=="all") {echo"SELECTED";} 
		  echo">все года</option>";
		  foreach ($filter_year as $ind => $zn)
		  {
		      echo "<option value='".$zn."'"; if (@$_SESSION['_filter_year']==$zn) {echo"SELECTED";} 
		      echo">".$zn." год</option>"; 
		      //print_r($filter_year[0]);
		  }
		  echo "</select>";
		  echo"<input type='hidden' value='".$id_top_menu."' name='id_top_menu'>
	          <input type='hidden' value='".$id_sub_menu."' name='id_sub_menu'>";	
		  echo"</form></div>";    
        } 
	echo"</td>";*/	
  echo"</tr>";
  echo"<tr>"; 
	if (($doc_array['add_row'] == 1)&&($insert_privilegies == true)) {echo"<td align=\"center\"><div class=\"hint_button\">Добавить запись</div></td>";}     	
	if ($doc_array['export_excel'] == 1) {echo"<td align=\"center\"><div class=\"hint_button\">Экспорт в Excel</div></td>";}	
	if ($doc_array['filter'] == 1)  {echo"<td align=\"center\"><div class=\"hint_button\">Фильтр</div></td>";} 	
	if (count($tables_columns_list) > 1) {echo"<td align=\"center\"><div class=\"hint_button\">Параметры таблицы</div></td>";} 	
	if (count(@$_SESSION['_filter'])>0) {echo"<td align=\"center\" bgcolor=\"#EDF13A\" class=\"text\"><a href=script_php/filter_submit.php?Reset_filter=true&id_top_menu=".$id_top_menu."&id_sub_menu=".$id_sub_menu.">Убрать фильтрацию</a></td>";}
	echo"<td align=\"right\" width=\"100%\">"; 
		if ($doc_array['paging'] == 1)   // отображение постраничной разбивки на экране
		{	   
			echo "<div id=\"paging\">"; 
			echo "<form id='form_page_selector' name='form_page_selector' method='post' action=''>";
			echo $paging."&nbsp;&nbsp;";  
			echo "<select name='from_page_sel' size='1' onchange='this.form.submit();'>";
			for($z=1; $z<count($quick_sel_page_maqssiv); ++$z) // формирование списка страниц 
			{     
				 $quick_from_page = $quick_sel_page_maqssiv[$z-1]*$per_page; 
				 echo"<option value=".$quick_from_page; 
				 if (($quick_from_page==@$from_page_sel)||($quick_from_page==@$_SESSION['_from_page'])) {echo " SELECTED";}
				 echo">".$z."</option>"; 
			} 
			echo "</select>";
			echo"<input type='hidden' value='".$id_top_menu."' name='id_top_menu'>
			<input type='hidden' value='".$id_sub_menu."' name='id_sub_menu'>";	
			echo"</form>";
			echo "</div>";
		}
  echo"</td>";	
  echo"</tr>";
echo"</table>"; 

/////////// Если запрос вернул пустой результат ///////////////////////////////////////////////////////////////////////////////////
if (!mysql_num_rows($query_table)) 
{
echo"<table border=1 align=center>
<tr bgcolor=\"red\" align=\"center\"><td><strong>Внимание!</strong></td></tr>
<tr>
	<td>
		<p align=center>";
					if ($filter != "") echo "Отсутствуют данные удовлетворяющие критерию фильтрации, заданному Вами.<br>";
					else echo "База данных не заполнена.";
		echo "</p></td>
</tr>";}


//// Вывод таблицы на экран //////////////////////////////////////////////////////////////////////////////////////////////////////

echo"<table id='data_table' class='dataTable'>";
$p=1; $N=@$_SESSION['_from_page']+1;
if (mysql_num_rows($query_table)) mysql_data_seek($query_table,0);
while($table = @mysql_fetch_assoc($query_table)) 
{
	if ($p == 1) 
	{       
		echo"<thead>";
		echo"<tr>";
		// если в таблице есть dop_info то обрабатваем появление 3 колонки
		if (strlen($doc_array['dop_info_script']) > 1) 	{echo "<th colspan=3></th>";}
		else {echo "<th colspan=2></th>";}
		echo "<th>№пп</th>";
	 	foreach ($table as $ind => $zn)
		{
		       if ($ind!="id") {                                          //вывод заголовков столбцов                      
					echo"<th>";
					foreach (@$_SESSION['_rusfield_array'] as $ind1 => $zn1)
					{
						if ($ind == $zn1['eng_field']) {echo $zn1['rus_field']; break;}//вывод русского название поля;	
					}
					echo"</th>";
		       }
		} 
		echo"</tr>";
		echo"</thead>";		 
	}
	$p=2; $i=0;
	echo"<tbody>";
	echo"<tr>";	
	foreach ($table as $ind => $zn)
	{
		if ($i==0)
		{	
			echo"<td align=center >";
			if (($doc_array['edit_row'] == 1)&&($update_privilegies == true)&&($zn != 0)) 
			{		
			?>
			                                  <!--кнопочка редактирования строки-->
			<img src='images/edit.png' border=0 style="cursor: pointer;" onclick="if (confirm('Вы будете редактировать запись?')) {parent.location='index.php?action=edit&id_top_menu=<?php echo $id_top_menu;?>&id_sub_menu=<?php echo $id_sub_menu;?>&num_row=<?php echo $zn;?>';}" title='Редактировать'>  		
			<?php
			}
			else {echo"<img src='images/edit_none.png' border=0 title='Редактировать'>";} 
			echo"</td>";
			echo"<td align=center>";
			if (($doc_array['del_row'] == 1)&&($delete_privilegies == true)&&($zn != 0)) 
			{ 
			?>  
			  				   <!--кнопочка удаления строки-->
			<img src='images/drop.png' border=0 style="cursor: pointer;" onclick="if (confirm('Вы уверены, что хотите удалить запись?')) {parent.location='script_php/del.php?id_top_menu=<?php echo $id_top_menu;?>&id_sub_menu=<?php echo $id_sub_menu;?>&num_row=<?php echo $zn;?>';}" title='Удалить'> 
			<?php
			} 
			else {echo"<img src='images/drop_none.png' border=0 title='Удалить'>";} 
			echo"</td>";
			if (strlen($doc_array['dop_info_script']) > 1) 
			{ 
			echo"<td align=center>";
			?>  
			  				   <!--кнопочка доп обработки строки-->
			<img src='images/dop_info.png' border=0 style="cursor: pointer;" onclick="if (confirm('Вы уверены?')) {parent.location='index.php?action=dop_info&id_top_menu=<?php echo $id_top_menu;?>&id_sub_menu=<?php echo $id_sub_menu;?>&num_row=<?php echo $zn;?>';}" title='Редактировать'> 
			<?php 			 
			echo"</td>";
			}
			echo"<td align=center>".$N."</td>";
		}
		else {echo"<td";
		      if (count(@$_SESSION['_filter_array'])>0) 
		      {  $sovpalo=false;
                         foreach($_SESSION['_filter_array'] as $ind2 => $znach) 
		           {
			    if ($ind2==$ind) {echo" class=\"filter_color\">".$zn."</td>"; $sovpalo=true;}
                           }
                          if ($sovpalo==false) {echo">$zn</td>";} 
                      }
		      else {echo">".$zn."</td>";}     
                     }
		++$i;
	}
	echo"</tr>";
	echo"</tbody>";
	++$N;
}
echo"</table>";

//if ($doc_array['paging'] == 1)   echo $paging;   // отображение постраничной разбивки на экране



?>

