<?PHP
session_start();

unset($_SESSION['_filter_array']);
unset($_SESSION['_filter']);

if (@$Reset_filter) 
{
unset($_SESSION['_mat_operator']);
unset($_SESSION['_from_page']);
include ("redirect.php");
}
else 
{

$text='text';
$i=0; $r=0; $z=0;
//print_r($_SESSION['_field_selector']);
foreach ($_SESSION['_field_selector'] as $ind => $zn)			
{ 
   if ($ind === "select_field_button") {break;} // в $_SESSION['_field_selector'] есть 3 служебных поля. Если встречаем первое, то прекращаем цикл 
   if (strstr($ind, "zxc")) {continue;} // если в $_SESSION['_field_selector'] натыкаемся на признак сортировки zxc
   if (strstr($ind, "vbn")) {continue;} // или признак возр и убыв vbn, то пропускаем эти моменты. 
   if (strstr($zn, " as ")) // из строки uzel_2.uzel as uzel_2 делаем строку uzel_2.uzel
   {
	$str_pos = strrpos($zn, " "); 
	 $zn=substr($zn, 0, $str_pos-3); 
   }
   $text_z=$text.$z;
   $text_filter=$$text_z;
   echo $zn." ".$text_filter."<br>";
   if ($text_filter!="") 
   {
	 if (($mat_operator[$i]=='LIKE')||($mat_operator[$i]=='NOT LIKE')) {$filter[$zn]="(".$zn." ".$mat_operator[$i]." '%".$text_filter."%')";} 
	 else {$filter[$zn]="(".$zn." ".$mat_operator[$i]." '".$text_filter."')";}
	 $filter_array[$colname[$i]]=$text_filter;
	 $mat_operator_array[$colname[$i]]=$mat_operator[$i]; 
   }
   ++$z; 
   ++$i;
}
$_SESSION['_filter_array']=$filter_array;
$_SESSION['_filter']=$filter;
$_SESSION['_mat_operator']=$mat_operator_array;

/*if ($PHP_AUTH_USER == "smoke"){
echo "_SESSION['_field_selector']";
print_r($_SESSION['_field_selector']); 
echo "filter_array";
print_r($filter_array);
echo "filter";
print_r($filter);     
echo "mat_operator_array";
print_r($mat_operator_array);
}
else*/ 
include ("redirect.php");
}

?>



