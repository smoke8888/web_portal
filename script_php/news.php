<?php 
$query = mysql_query("SELECT * FROM engine.news ORDER BY news.data")or die($error_message_on_query.mysql_error());
$NumRows = mysql_num_rows($query);

$i=0; $k=$NumRows;
while($row = @mysql_fetch_assoc($query)) 
{
    $k-=1;
    if (($k<4)||(@$archive=="yes")) 
    {
      $j=0;
      foreach($row as $ind)
      {
          $news_massiv[$i][$j]=$ind;   //создаем массив содержащий последние 4 новости и ее параметры (id, data, title и тд.) 
          ++$j;
      }
      ++$i;
    }
}      //style="background: top left url(images/news.png) no-repeat;" фон новостей
?>
<p></p>
<table width="640" border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td></td>
    <td valign="top"><div class="table_name" align=center><?php echo $menu_array['name']; if (@$archive=="yes") echo" (архив)";?></div></td>
  </tr>
  <tr>
    <td width="20"></td>
    <td align="right">
    <?php 
    if (@$archive=="yes")  {echo"<a href=\"index.php?id_sub_menu=$id_sub_menu&id_top_menu=$id_top_menu\" ><img src=\"images/back_button.png\" title=\"Выйти из архива\" style=\"border:none;\"></a>";}
	else {echo"<a href=\"index.php?archive=yes&id_top_menu=$id_top_menu&id_sub_menu=$id_sub_menu\" ><img src=\"images/archiv_news.png\" title=\"Архив новостей\" style=\"border:none;\"></a>";}
    ?>
    </td>
  </tr>

<?php
$y=$i-1;
while ($y>=0)
{
   echo"<tr>";
   echo"<td></td>";
   echo"<td>";
   echo"&nbsp;";   
   $data=$news_massiv[$y][1];
   list($year, $month, $day) = sscanf($data, "%04s-%02s-%02s"); 
   $data="$day.$month.$year"; 
   echo"<div class=\"news_date\">".$data."</div>";
   $title=$news_massiv[$y][2];
   echo"<div align=left class=\"news_title\">".$title."</div>";
   $brief=$news_massiv[$y][3];  
   echo"<div align=left class=\"news_text\">".$brief."</div>";
   $full=$news_massiv[$y][4]; 
   $id=$news_massiv[$y][0];
   if ($full != "")
   {
        if (!isset($archive)) {$archive = "";}
	echo"<div class=\"news_details\" align=right><a href=index.php?news_full=1&id=$id&id_top_menu=$id_top_menu&id_sub_menu=$id_sub_menu&archive=$archive>Подробнее <img src=\"images/forward.png\" style=\"border:none;\"></a></p>";
   }
   echo"<hr></td>";
   echo"</tr>";
                  
   $y-=1;   
}
  
  echo"<tr>";
    echo"<td width=1>&nbsp;</td>";
    echo"<td align=\"right\">";
	if (@$archive=="yes")  {echo"<a href=\"index.php?id_sub_menu=$id_sub_menu&id_top_menu=$id_top_menu\" ><img src=\"images/back_button.png\" title=\"Выйти из архива\" style=\"border:none;\"></a>";}
	echo"</td>";
  echo"</tr>";
echo"</table>"; 


?>
