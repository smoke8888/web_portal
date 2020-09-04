<?php

if (@$begin==1) 
{
unset($_SESSION['_filter_array']); 
unset($_SESSION['_filter']); 
unset($_SESSION['_filter_string']);
unset($_SESSION['_id_list_array']);   // массив id для применения в Edit для перехода к следующей/предыдущей строке...
unset($_SESSION['_field_selector']); // выбор полей таблицы для отображения data_show_tables.php
unset($_SESSION['_secondary_field_selector']);  
unset($_SESSION['_mat_operator']);  // операторы сравнения в фильтре filter.php
unset($_SESSION['_from_page']); // номер записи с которой будет показана таблица, используется в paging.php
unset($_SESSION['_SELECT']);
unset($_SESSION['_WHERE']);
unset($_SESSION['_FROM']);
unset($_SESSION['_CREATE_2']); // _2 для спец таблиц
unset($_SESSION['_SELECT_2']);
unset($_SESSION['_WHERE_2']);
unset($_SESSION['_FROM_2']);
unset($_SESSION['_ORDER']);
unset($_SESSION['_parametr_error']);
unset($_SESSION['_column_name_error']);
unset($_SESSION['_filter_year']);
unset($_SESSION['_rusfield_array']);
unset($_SESSION['LEFT_JOIN']);
unset($_SESSION['LEFT_JOIN_2']);
}

$begin=0;
?>