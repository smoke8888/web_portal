<?php
if (isset($id_sub_menu))
{
    $query_menu = mysql_query("SELECT * FROM `engine`.`menu` WHERE `id`=".$id_sub_menu);   
    while($menu = @mysql_fetch_assoc($query_menu)) 
	{
     	$menu_array = $menu;
	}
//print_r($menu_array);

///////////////// �������� ������  �� PHP-����� �������� ////////////////////////////////////////////////////////
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
		include("privilegies.php"); // ��������� ���������� ������������ �� ������ � ��������
		if ($select_privilegies === true) // ��������� ��������� ���������� �� �������� ���� ������
		{
			if (@$action == "edit") include("edit.php"); // �������������� ������
			if (@$action == "add") include("add.php");  // ���������� ������			
			if (@$action == "dop_info") include($doc_array['dop_info_script']);  // ���. ��������� ������
			if ((@$action != "add")&&(@$action != "edit")&&(@$action != "dop_info"))include("data_show_tables_left_join.php"); // ����������� �������
		}
		else {echo "<p>� ��� ��� ���� �� �������� ����������� ��������.</p>";}
    }
}
?>    
