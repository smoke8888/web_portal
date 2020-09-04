<?php

////////////////  Ï Ð È Â È Ë Å Ã È È ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$select_privilegies = false;

// ÃËÎÁÀËÜÍÛÅ ÏÐÈÂÈËÅÃÈÈ
$privelegies_global_sel_query = mysql_query("SELECT `Select_priv` FROM `mysql`.`user` WHERE `User` = '".$PHP_AUTH_USER."'")or die("Îøèáêà îïðåäåëåíèÿ ãëîáàëüíûõ ïðèâåëåãèé: ".mysql_error()); // çàïðîñ ãëîáàëüíûõ ïðèâåëåãèé äîñòóïà íà ÷òåíèå âñåãî
$privelegies_global_sel = @mysql_fetch_assoc($privelegies_global_sel_query);

$privelegies_global_ins_query = mysql_query("SELECT `Insert_priv` FROM `mysql`.`user` WHERE `User` = '".$PHP_AUTH_USER."'")or die("Îøèáêà îïðåäåëåíèÿ ãëîáàëüíûõ ïðèâåëåãèé: ".mysql_error()); // çàïðîñ ãëîáàëüíûõ ïðèâåëåãèé äîñòóïà íà ÷òåíèå âñåãî
$privelegies_global_ins = @mysql_fetch_assoc($privelegies_global_ins_query);

$privelegies_global_upd_query = mysql_query("SELECT `Update_priv` FROM `mysql`.`user` WHERE `User` = '".$PHP_AUTH_USER."'")or die("Îøèáêà îïðåäåëåíèÿ ãëîáàëüíûõ ïðèâåëåãèé: ".mysql_error()); // çàïðîñ ãëîáàëüíûõ ïðèâåëåãèé äîñòóïà íà ÷òåíèå âñåãî
$privelegies_global_upd = @mysql_fetch_assoc($privelegies_global_upd_query);

$privelegies_global_del_query = mysql_query("SELECT `Delete_priv` FROM `mysql`.`user` WHERE `User` = '".$PHP_AUTH_USER."'")or die("Îøèáêà îïðåäåëåíèÿ ãëîáàëüíûõ ïðèâåëåãèé: ".mysql_error()); // çàïðîñ ãëîáàëüíûõ ïðèâåëåãèé äîñòóïà íà ÷òåíèå âñåãî
$privelegies_global_del = @mysql_fetch_assoc($privelegies_global_del_query);


if ($privelegies_global_sel['Select_priv'] == "N")
{
	// ÏÐÈÂÈËÅÃÈÈ ÍÀ ÓÐÎÂÍÅ ÁÄ   
	@$privelegies_db_sel_query = mysql_query("SELECT `Db` FROM `mysql`.`db` WHERE (`User` = '".$PHP_AUTH_USER."') AND (`Select_priv` = 'Y') AND (`Db` = '".$doc_array['DB']."')")
	or die("Îøèáêà îïðåäåëåíèÿ ïðèâåëåãèé: ".mysql_error());   
	$privelegies_db_sel = @mysql_fetch_assoc($privelegies_db_sel_query);
	// ÏÐÈÂÈËÅÃÈÈ ÍÀ ÓÐÎÂÍÅ ÒÀÁËÈÖÛ
	if (!isset($privelegies_db_sel['Db']))
	{
		@$privelegies_table_sel_query = mysql_query("SELECT `Table_name` FROM `mysql`.`tables_priv` WHERE (`User` = '".$PHP_AUTH_USER."') AND (`Table_priv` LIKE '%Select%') AND 
		(`Table_name` = '".$doc_array['table']."') AND (`Db` = '".$doc_array['DB']."')")or die("Îøèáêà îïðåäåëåíèÿ ïðèâåëåãèé: ".mysql_error()); 
		$privelegies_table_sel = @mysql_fetch_assoc($privelegies_table_sel_query);		
	}
}
if ($privelegies_global_ins['Insert_priv'] == "N")
{
	// ÏÐÈÂÈËÅÃÈÈ ÍÀ ÓÐÎÂÍÅ ÁÄ   
	@$privelegies_db_ins_query = mysql_query("SELECT `Db` FROM `mysql`.`db` WHERE (`User` = '".$PHP_AUTH_USER."') AND (`Insert_priv` = 'Y') AND (`Db` = '".$doc_array['DB']."')")
	or die("Îøèáêà îïðåäåëåíèÿ ïðèâåëåãèé: ".mysql_error());   
	$privelegies_db_ins = mysql_fetch_assoc($privelegies_db_ins_query); 
	// ÏÐÈÂÈËÅÃÈÈ ÍÀ ÓÐÎÂÍÅ ÒÀÁËÈÖÛ
	if (!isset($privelegies_db_ins['Db']))
	{
		@$privelegies_table_ins_query = mysql_query("SELECT `Table_name` FROM `mysql`.`tables_priv` WHERE (`User` = '".$PHP_AUTH_USER."') AND (`Table_priv` LIKE '%Insert%') AND 
		(`Table_name` = '".$doc_array['table']."') AND (`Db` = '".$doc_array['DB']."')")or die("Îøèáêà îïðåäåëåíèÿ ïðèâåëåãèé: ".mysql_error());   
		$privelegies_table_ins = mysql_fetch_assoc($privelegies_table_ins_query);		
	}
}
if ($privelegies_global_upd['Update_priv'] == "N")
{
 	// ÏÐÈÂÈËÅÃÈÈ ÍÀ ÓÐÎÂÍÅ ÁÄ 		
	@$privelegies_db_upd_query= mysql_query("SELECT `Db` FROM `mysql`.`db` WHERE (`User` = '".$PHP_AUTH_USER."') AND (`Update_priv` = 'Y') AND (`Db` = '".$doc_array['DB']."')")
	or die("Îøèáêà îïðåäåëåíèÿ ïðèâåëåãèé: ".mysql_error());   
	$privelegies_db_upd = mysql_fetch_assoc($privelegies_db_upd_query); 
	// ÏÐÈÂÈËÅÃÈÈ ÍÀ ÓÐÎÂÍÅ ÒÀÁËÈÖÛ	
	if (!isset($privelegies_db_upd['Db']))
	{
		@$privelegies_table_upd_query = mysql_query("SELECT `Table_name` FROM `mysql`.`tables_priv` WHERE (`User` = '".$PHP_AUTH_USER."') AND (`Table_priv` LIKE '%Update%') AND 
		(`Table_name` = '".$doc_array['table']."') AND (`Db` = '".$doc_array['DB']."')")or die("Îøèáêà îïðåäåëåíèÿ ïðèâåëåãèé: ".mysql_error());   
		$privelegies_table_upd = mysql_fetch_assoc($privelegies_table_upd_query);		
	} 
}

if ($privelegies_global_del['Delete_priv'] == "N")
{
 	// ÏÐÈÂÈËÅÃÈÈ ÍÀ ÓÐÎÂÍÅ ÁÄ		
	@$privelegies_db_del_query = mysql_query("SELECT `Db` FROM `mysql`.`db` WHERE (`User` = '".$PHP_AUTH_USER."') AND (`Delete_priv` = 'Y') AND (`Db` = '".$doc_array['DB']."')")
	or die("Îøèáêà îïðåäåëåíèÿ ïðèâåëåãèé: ".mysql_error());  
	$privelegies_db_del = mysql_fetch_assoc($privelegies_db_del_query);   	 
	// ÏÐÈÂÈËÅÃÈÈ ÍÀ ÓÐÎÂÍÅ ÒÀÁËÈÖÛ
	if (!isset($privelegies_db_del['Db']))
	{
		@$privelegies_table_del_query = mysql_query("SELECT `Table_name` FROM `mysql`.`tables_priv` WHERE (`User` = '".$PHP_AUTH_USER."') AND (`Table_priv` LIKE '%Delete%') AND 
		(`Table_name` = '".$doc_array['table']."') AND (`Db` = '".$doc_array['DB']."')")or die("Îøèáêà îïðåäåëåíèÿ ïðèâåëåãèé: ".mysql_error());   
		$privelegies_table_del = mysql_fetch_assoc($privelegies_table_del_query);		
	}
}

	if ((!isset($privelegies_table_upd['Table_name']))&&(!isset($privelegies_db_upd['Db'])))
	{	
		// ÏÐÈÂÈËÅÃÈÈ ÍÀ ÓÐÎÂÍÅ ÊÎËÎÍÊÈ
		@$privelegies_column_upd_query = mysql_query("SELECT `Column_name` FROM `mysql`.`columns_priv` WHERE (`User` = '".$PHP_AUTH_USER."') AND 
		(`Column_priv` LIKE '%Update%') AND (`Table_name` = '".$doc_array['table']."') AND (`Db` = '".$doc_array['DB']."')")or die("Îøèáêà îïðåäåëåíèÿ ïðèâåëåãèé: ".mysql_error());   
		$i=1;
		while ($privelegies_column_upd = mysql_fetch_assoc($privelegies_column_upd_query))
		{$privelegies_column_upd_array[$i] = $privelegies_column_upd['Column_name']; ++$i;}		
	}

	// ÎÁÎÁÙÅÍÍÛÅ ÏÐÈÂÈËÅÃÈÈ ÏÐÎÑÌÎÒÐÀ
	if (($privelegies_global_sel['Select_priv']=="Y")||($privelegies_db_sel['Db'] == $doc_array['DB'])||($privelegies_table_sel['Table_name'] == $doc_array['table'])) {$select_privilegies = true;}

$insert_privilegies = false;
$update_privilegies = false;
$delete_privilegies = false;
if ((@$privelegies_global_ins['Insert_priv'] == "Y")||(@$privelegies_db_ins['Db'])||(@$privelegies_table_ins['Table_name'])) $insert_privilegies = true;
if ((@$privelegies_global_upd['Update_priv'] == "Y")||(@$privelegies_db_upd['Db'])||(@$privelegies_table_upd['Table_name'])||(isset($privelegies_column_upd_array))) $update_privilegies = true;
if ((@$privelegies_global_del['Delete_priv'] == "Y")||(@$privelegies_db_del['Db'])||(@$privelegies_table_del['Table_name'])) $delete_privilegies = true;
/*
if ($PHP_AUTH_USER == "uer_chernova")
{ 
echo"privelegies_global_sel: "; print_r($privelegies_global_sel);echo"<br>";
echo"privelegies_global_ins: "; print_r($privelegies_global_ins);echo"<br>";
echo"privelegies_global_upd: "; print_r($privelegies_global_upd);echo"<br>";
echo"privelegies_db_sel: "; print_r($privelegies_db_sel);echo"<br>";
echo"privelegies_db_ins: "; print_r($privelegies_db_ins);echo"<br>";
echo"privelegies_db_upd: "; print_r($privelegies_db_upd);echo"<br>";
echo"privelegies_db_del: "; print_r($privelegies_db_del);echo"<br>";
echo"privelegies_table_sel: "; print_r($privelegies_table_sel);echo"<br>";
echo"privelegies_table_ins: "; print_r($privelegies_table_ins);echo"<br>";
echo"privelegies_table_del: "; print_r($privelegies_table_del);echo"<br>";
echo"privelegies_table_upd: "; print_r($privelegies_table_upd);echo"<br>";
echo"privelegies_column_upd_array: "; print_r(@$privelegies_column_upd_array);echo"<br>";

echo"insert_privilegies: "; print_r($insert_privilegies);echo"<br>";
echo"update_privilegies: "; print_r($update_privilegies);echo"<br>";
echo"delete_privilegies: "; print_r($delete_privilegies);echo"<br>";
echo"select_privilegies: "; print_r($select_privilegies);echo"<br>";
} */

?>