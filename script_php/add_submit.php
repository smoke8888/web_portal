<?php
session_start();
require("system_message.php"); 
$text='text';

$openConn2db = mysql_connect("localhost", "$PHP_AUTH_USER", "$PHP_AUTH_PW"); 
$dbSelected = mysql_select_db($DB); 
//___________________установка национальной кодировки после соединения с БД_________________
mysql_query ("set character_set_client='cp1251'");  
mysql_query ("set character_set_results='cp1251'");  
mysql_query ("set collation_connection='cp1251_general_ci'"); 	 

// определение номера и года ТУ автоматически --------------------------------------------------------------------------------------
if ($table == "tu")
{		
		$to_year = date("Y"); 
		$number_tu_querry = mysql_query("SELECT `number_tu` FROM `".$DB."`.`".$table."` WHERE (YEAR(`date_tu`)='".$to_year."') ORDER BY `number_tu` DESC LIMIT 0,1");  
		if (!mysql_num_rows($number_tu_querry)) {$number_tu = 1;}
		else 
		{
			$last_number = @mysql_fetch_assoc($number_tu_querry); 
			$number_tu = ++$last_number['number_tu'];
		}    
}

if ($PHP_AUTH_USER == "smoke") {echo $last_number['number_tu']."<br>".$date_tu;}

//========================= БЛОК ЗАПИСИ ПРИНЯТЫХ ФАЙЛОВ ===============================================================================
if ((isset($_FILES))&&(count($_FILES) > 0))
{
	if ($table == "tu")
	{		
		$uploaddir = "files/".$table."/".$to_year."/".$number_tu."/".$PHP_AUTH_USER;  //путь к ТУ
		if (!file_exists("../".$uploaddir)) //если директории нет, создаем ее. mkdir не может разом создать вложенные папки..... :((
		{
			 mkdir("../files/".$table."/".$to_year,0777); mkdir("../files/".$table."/".$to_year."/".$number_tu,0777); 
			 mkdir("../files/".$table."/".$to_year."/".$number_tu."/".$PHP_AUTH_USER,0777);   
		} 
	}
	else 
	{
		$uploaddir = "files/".$table;  //путь к папке
		if (!file_exists("../".$uploaddir)) //если директории нет, создаем ее. mkdir не может разом создать вложенные папки..... :((
		{
			 mkdir("../files/".$table,0777);   
		}
	}	
	for ($i=0; $i<count($_FILES['file']['name']); $i++)
	{ 
		if ($_FILES['file']['error'][$i]==0)  // если ошибок при загрузке небыло, то
		{
	  
			  $file_name=$_FILES['file']['name'][$i];  // имя файла 
			  $uploadfile = $uploaddir ."/". basename($file_name);    // директория загрузки файла
			  move_uploaded_file($_FILES['file']['tmp_name'][$i], "../".$uploadfile);    // запись полученного файла в папочку....
			  //print_r($_FILES); echo"<br>"; print_r($uploadfile);
		} 
		else   //обработка ошибок при загрузке файла
		{
			 if ($_FILES['file']['error']==1) {die("Размер принятого файла превысил максимально допустимый размер, который задан в конфигурационном файле.");}
			 if ($_FILES['file']['error']==2) {die("Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме.");}
			 if ($_FILES['file']['error']==3) {die("Загружаемый файл был получен только частично.");}
			 if ($_FILES['file']['error']==4) {die("Файл не был загружен.");}
		}
	}  
}

//========================= БЛОК ВСТАВКИ СТРОКИ В ТАБЛИЦУ БД ==========================================================================
$znach_file=false;   
$request_str='';
foreach ($_SESSION['_parametr'] as $key => $znach)      // в znach храниться название полей таблицы
{     
    if ($znach=='file') 
    {  
	  $link=''; $sum_size=0;
          for ($i=0; $i<count($_FILES['file']['name']); $i++)
  	  { 
 	     if ($_FILES['file']['size'][$i] == 0) {continue;}
	     $sum_size = $sum_size + $_FILES['file']['size'][$i];
	     $file_name = $_FILES['file']['name'][$i];
    	     $uploadfile = $uploaddir."/".basename($file_name);
    	     $link = $link."<a href=\"".$uploadfile."\" class=mn2 target=_blank>".$file_name."</a><br>";
  	  }
  	  if ($sum_size == 0) {$link='Вложений нет';}
  	  $request_str=$request_str." '".$link."',";  // если пересылали файл, то записываем в базу ссылку на него.....  
	  continue;
    }
	// для таблицы тех условия вставляем номер и дату полученные автоматически по алгоритму выше...................
	if (($znach == 'number_tu')&&($table == 'tu')) {$request_str=$request_str." '".$number_tu."',"; continue;}
	if (($znach == 'date_tu')&&($table == 'tu')) {$request_str=$request_str." '".date("Y-m-d")."',"; continue;}
	
	// запись времени даты добавления строки в БД
	if ($znach=='timestamp') 
	{ 
		$now = date("Y-m-d H:i:s"); // выборака времени в формате 2009-10-19 22:38:15
		$request_str=$request_str." '".$now."',";
		continue;
	}
    $text_key=$text.$key; $text_filter=$$text_key;      //хитрый способ сборки переменной из двух слов
    $text_filter=str_replace("_"," ",$text_filter);     //убираем _ из значения введенного пользователем, т.к. _ mysql не проглатывает
    $request_str=$request_str." '".$text_filter."',";       //формируем обобщенный запрос добавления записи в базу данных

    $_SESSION['_parametr_error'][$znach]=$text_filter;   //формируем массив значений введенных пользователем для исправления в случае ошибки
}
    
$request_str=substr($request_str, 0, strlen($request_str)-1);     //удаление последней запятой
//print_r($_SESSION['parametr1']);
//print_r($request_str);	
//print_r($_FILES);     

$queryResultID = mysql_query("INSERT INTO $table VALUES (NULL,$request_str)"); 

//// если произошла ошибка, то предлагаем ее исправить... /////////////////////////////////////////////////////////////////////////////////////
if (!$queryResultID)   
{
   $mysqlerror=mysql_error(); 
   $name_col_err=stristr($mysqlerror, "for column");  
   $name_col_err=substr($name_col_err, 12, strlen($name_col_err)-22); // имя колонки в которой произошла ошибка!!! :))
   $_SESSION['_column_name_error']=$name_col_err;  // используем в add.php для окраса в красный цвет поля, где найдена ошибка!!!   
   header("location:../index.php?action=add&id_top_menu=$id_top_menu&id_sub_menu=$id_sub_menu");
   Die;
}



$request=str_replace("'","",$request_str); $request=str_replace("`","",$request);
$ip=$_SERVER['REMOTE_ADDR'];
// заносим в базу логов действие по добавлению.........
if ($PHP_AUTH_USER != "smoke") {
$log_querry=mysql_query("INSERT INTO `engine`.`log` (`id`,`user`,`ip`,`action`,`db`,`table`,`id_row`,`data`) VALUES (NULL, '$PHP_AUTH_USER', '$ip', 'Insert', '$DB', '$table','0','$request')");
}

mysql_close();
unset($_FILES);
unset($_SESSION['_parametr_error']);
unset($_SESSION['_column_name_error']);
include ("redirect.php");
     
?>