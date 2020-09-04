<?php
$query = mysql_query("SELECT * FROM engine.news WHERE id=$id")or die($error_message_on_query.mysql_error());
while($row = @mysql_fetch_assoc($query)) 
{
  foreach($row as $ind)
  {
    $news_massiv_full[]=$ind;    
  }
} 
//print_r($news_massiv_full);
?>
<p>&nbsp;</p>
<table width="640" border="0" cellpadding="0" cellspacing="0" style="background: top left url(images/news.png) no-repeat;">
  <tr>
    <td></td>
    <td valign="top"><div class="table_name" align=center>Новости портала</div></td>
  </tr>

<?php
echo"<tr>";
echo"<td></td>";
echo"<td>";
echo"&nbsp;";
echo"<div class=\"news_date\">".$news_massiv_full[1]."</div>";
echo"<div align=left class=\"news_title\">$news_massiv_full[2]</div>";
echo"<div align=left class=\"news_text\">$news_massiv_full[3]</div>";
echo"<div align=left class=\"news_text\">$news_massiv_full[4]</div>";
echo"<div class=\"news_details\" align=right><a href=";
                                       if ($archive == "yes") 
				       {echo"index.php?id_sub_menu=$id_sub_menu&id_top_menu=$id_top_menu&archive=yes";}
				       else {echo"index.php?id_sub_menu=$id_sub_menu&id_top_menu=$id_top_menu";}
echo" class=mn6><img src=\"images/back.png\" style=\"border:none;\"> Назад</a></div>";
echo"</td>";
echo"</tr>";
?>
  <tr>
    <td bgcolor="">&nbsp;</td>
    <td></td>
  </tr>
</table>
</body>
</html>  