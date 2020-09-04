<ul class="solidblockmenu">
   <?php
   
   ///////////////////////      МЕНЮ     //////////////////////////////////////////////////////////////////////////////////////////   
   $query_main_menu = mysql_query("SELECT SQL_NO_CACHE * FROM engine.menu WHERE `id_parent`=0 ORDER BY `sort`");  //запрос главного меню
   // вывод главного меню     
   while($main_menu_assoc_array = @mysql_fetch_assoc($query_main_menu)) 
   {  //if($PHP_AUTH_USER=='smoke') {echo "<td>"; print_r($main_menu_assoc_array); echo "</td>";} 
      if ($main_menu_assoc_array['visible']==1)
      {
           if ($main_menu_assoc_array['active']==1)
           {
                 echo "<li><a href='index.php?begin=1&id_top_menu=".$main_menu_assoc_array['id']."' class=mn2>".$main_menu_assoc_array['name']."</a></li>";
		   }
           else   
           {
                 echo "<li>".$main_menu_assoc_array['name']."</li>";
           } 
      }
    }
   ?>
</ul>
