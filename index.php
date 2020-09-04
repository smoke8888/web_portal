<?php 
session_start();
//echo $style;
//////////////////// ЗАГРУЗКА ТЕМЫ ОФОРМЛЕНИЯ ИЗ КУКСОВ  ////////////////////////////////////////////////////
if (strlen(@$stl) > 0) {setcookie("style_cookie", $stl, time()+360000000); header("location:index.php?begin=1&id_top_menu=1&id_sub_menu=92");}
if (isset($_COOKIE['style_cookie'])) {$style = $_COOKIE['style_cookie'];} else $style = "green";
//print_r($_COOKIE);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

$openConn2db = mysql_connect("localhost", "$PHP_AUTH_USER", "$PHP_AUTH_PW"); 
//___________________установка национальной кодировки после соединения с БД_________________
mysql_query ("set character_set_client='cp1251'");  
mysql_query ("set character_set_results='cp1251'");  
mysql_query ("set collation_connection='cp1251_general_ci'"); 	
 
// ОПРЕДЕЛЕНИЕ ПОЛЬЗОВАТЕЛЯ: ФИЛИАЛ ИЛИ ЦТ
$login_center = mysql_query("SELECT SQL_NO_CACHE `center` FROM `mysql`.`user` WHERE (`User` = '$PHP_AUTH_USER')"); 
$login_center = @mysql_fetch_assoc($login_center);

if (strstr($login_center['center'], "+")) // ЕСЛИ ПРОСМОТР ОТКРЫТ К ДВУМ ЦТ 
{
     $ct_arr = str_split($login_center['center']);
	 $ct1 = $ct_arr[0]; 
     $ct2 = $ct_arr[2];
     
     $_SESSION['_login_center'] = " AND ((`spravochnik`.`centers`.`id` = ".$ct1.") OR (`spravochnik`.`centers`.`id` = ".$ct2."))";
     $_SESSION['_login_center2'] = " AND ((`centers_2`.`id` = ".$ct1.") OR (`centers_2`.`id` = ".$ct2."))";
}
else 
{
     if (strlen($login_center['center'] > 0)) 
	 {
	      $_SESSION['_login_center'] = " AND (`spravochnik`.`centers`.`id` = ".$login_center['center'].")";
		  $_SESSION['_login_center2'] = " AND (`centers_2`.`id` = ".$login_center['center'].")";
	 }
     if (strlen($login_center['center'] = 0)) {$login_center = "";} 
}


if (isset($select_field_button))   // запись в БД выбранных для отображения выбранных пользователем колонок таблицы....
{	
	$field_selector=serialize($_POST); 
	// ищем в БД данные о составе колонок для данного юзера и данной таблицы
	$search_query = mysql_query("SELECT * FROM `engine`.`field_selector` WHERE (`user` = '".$PHP_AUTH_USER."') AND (`db` = '".$_POST['DB']."') AND (`tbl` = '".$_POST['table']."')");
	$search_field_selector = @mysql_fetch_assoc($search_query);
	 
	if (isset($search_field_selector['id'])) // если запрос вернул результат, то редактируем его 
	{
	     mysql_query("UPDATE `engine`.`field_selector` SET `field_list` = '".$field_selector."' WHERE `engine`.`field_selector`.`id` = '".$search_field_selector['id']."' LIMIT 1") 
	     or Die("Произошла ошибка записи выбранных колонок: ".mysql_error());
	}
	else // иначе добавляем новую запись в БД
	{
	     mysql_query("INSERT INTO `engine`.`field_selector` (`id`,`user`,`db`,`tbl`,`field_list`) 
		              VALUES (NULL, '".$PHP_AUTH_USER."', '".$_POST['DB']."', '".$_POST['table']."', '".$field_selector."')")
		 or Die("Произошла ошибка записи выбранных колонок: ".mysql_error());;
	}
}


require("script_php/system_message.php");
?>
      <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
      <html>
      <head>
      <?php include "script_php/title.php"; ?>
      <META http-equiv=Content-Type content="text/html; charset=windows-1251">
      <link rel="icon" href="favicon.ico" type="image/x-icon">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 
      <LINK href="style_<?php echo $style; ?>.css" type=text/css rel=stylesheet>
      
	  <?php if (isset($id_sub_menu)) { 
	           if (!isset($action)) { ?>
	                                     <script src="script/jquery-1.3.2.js" type="text/javascript"></script>     
                                         <script src="script/jquery_table.js" type="text/javascript"></script>
                                         <script src="script/jqModal.js" type="text/javascript"></script>
                                         <script src="script/window_size.js" type="text/javascript"></script>
                                         <script type="text/javascript">
		                                   $(document).ready(function()
		                                   {
		                                        $("#data_table").fixedHeader({width: window_size("w")-155, height: window_size("h")-280}); 
			                                    $('#filter').jqm({trigger: '#filterTrigger'}); 
			                                    $('#field_selector').jqm({trigger: '#fieldTrigger'}); 
		                                   })
                                          </script>
                <?php } 
	            else { ?>
                                         <script src="script/auto_select_frontend.js" type="text/javascript"></script>
                              	         <script src="script/JsHttpRequest.js" type="text/javascript"></script>
                                         <script src="script/add_attach_file.js" type="text/javascript"></script>
                <?php } ?>
	  <script src="script/Select_all_chkbox.js" type="text/javascript"></script>
      <script src="script/sortirovka.js" type="text/javascript"></script>
      <script src="script/calendar.js" type="text/javascript"></script>
      <script src="script/check_form.js" type="text/javascript"></script>
      <?php } ?>
 
      </head>

      <?php include('script_php/rotator.php'); ?>
      
      <body>
      <?php if (@$begin == 1) include("script_php/unset_session.php") ?>
        <div id="header" <?php showImage(); ?>><?php include("script_php/top_menu.php"); ?></div>
        <div id="left-sidebar"><?php 
		                       if (!isset($id_top_menu)) {$id_top_menu = 1; $id_sub_menu = 7;} // по умолчанию грузим новости при первой загрузке...
		                       include("script_php/left_menu.php"); ?></div>    
        <div id="content">
		<?php 
		     if (@$news_full == 1) include("script_php/news_full.php");  // вывод подробностей новостей
			 else include("script_php/data.php"); 
		?>
        </div>

      </body>
      </html> 
<?php mysql_close(); ?> 