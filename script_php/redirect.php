<?php     //данный редирект используется при фильтрации, после редактирования и после удаления строки

if ((isset($from_top_menu))&&(isset($from_sub_menu))) 
{$id_top_menu = "&id_top_menu=".$from_top_menu; $id_sub_menu = "&id_sub_menu=".$from_sub_menu;}


header("location: http://".$_SERVER[HTTP_HOST]."/index.php?id_top_menu=$id_top_menu&id_sub_menu=$id_sub_menu");
 
?>