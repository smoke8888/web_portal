<div class="left_menu">
<ul>

<?php
$query_child_menu = mysql_query("SELECT SQL_NO_CACHE * FROM engine.menu WHERE 1 ORDER BY `sort`") or die($error_message_on_query.mysql_error()); 
while($child_menu_assoc_array = @mysql_fetch_assoc($query_child_menu))
	{
	 $child_menu_array[] = $child_menu_assoc_array; // записываем в массив всю таблицу menu
	}

foreach($child_menu_array as $ind => $zn)
{    
   $have_sub_child = false;
   unset($sub_child_array);
   if ($child_menu_array[$ind]['id_parent']==$id_top_menu)
   if ($child_menu_array[$ind]['visible']==1)
   {
		if ($child_menu_array[$ind]['active']==1)
        { 			   
            
			 for ($i=0; $i<count($child_menu_array); $i++) //просмотр массива на предмет наличия субдеток данного пункта меню
			 {
				if ($child_menu_array[$i]['id_parent'] == $child_menu_array[$ind]['id']) 
				{
					$have_sub_child = true;
					$sub_child_array[] = $child_menu_array[$i];
					//print_r($child_menu_array[$i]);
				}
			 }				
			 if ($have_sub_child == false)
			 {  
			       echo "<li><a href='index.php?begin=1&id_top_menu=".$id_top_menu."&id_sub_menu=".$child_menu_array[$ind]['id']."' >".$child_menu_array[$ind]['name']."</a></li>";
				 
			 }
			 else  //class="context_menu_open" 
		     {
			       ?><li><a href="#"><strong><?php echo $child_menu_array[$ind]['name']; ?></strong>
			       <!--[if IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->

			       <?php
			            
			 echo"<ul>"; 
			 foreach($sub_child_array as $index => $znach) 
			 {       	           
		           if ($znach['visible']==1)
      			   {
           	   			if ($znach['active']==1)
           	   			{ 	                    
					 		  echo "<li><a href='index.php?begin=1&id_top_menu=".$id_top_menu."&id_sub_menu=".$znach['id']."'>".$znach['name']."</a></li>";
               		    }
               			else
           	   			{
                     		  echo "<li>".$znach['name']."</li>";
               			}
         		   }
              }
              echo"</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>";
			 }
	    }
        else
        {
              echo "<li>".$child_menu_array[$ind]['name']."</li>";
        }
    }
}
?>
</ul>
</div>
