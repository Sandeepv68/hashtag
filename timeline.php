<ul class="timeline">
<?php
$sql = "SELECT * FROM hashtag_post";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
	{
		if($row['id']%2 !==0)
		{
		echo "<li>";
		echo "<div class=\"timeline-badge default\"><i class=\"glyphicon glyphicon-edit\"></i></div>";
		$mystring = explode(',', $row['tag']);
		if(empty($mystring['1']))
		{
echo "<div class=\"timeline-panel\"><div><h6 class=\"hash\">".$mystring['0']."</h6></div>";
		}
		else
		{
			echo "<div class=\"timeline-panel\"><div><h6 class=\"hash\">".$mystring['0']."</h6><h6 class=\"hash1\">".$mystring['1']."</h6></div>";
		}
		echo "<div class=\"timeline-heading\">";
		echo  "<h4 class=\"timeline-title\">".$row['title']."</h4>";
		echo  "<p><small class=\"text-muted\"><i class=\"glyphicon glyphicon-time\"></i> ".$row['date']."</small></p>";
		echo "</div>";
		echo "<div class=\"timeline-body\">";
		echo "<p>".$row['post_data']."</p>";
		echo "<hr />";
		echo "<div class=\"btn-group\">";
		echo "<button type=\"button\" class=\"btn btn-primary btn-sm dropdown-toggle\" data-toggle=\"dropdown\">";
		echo  "<i class=\"glyphicon glyphicon-cog\"></i> <span class=\"caret\"></span>";
		echo "</button>";
		echo "<ul class=\"dropdown-menu\" role=\"menu\" style=\"text-align:left;\">";
		echo "<li><a href=\"#\" id=\"reshare\" value=\"share\"><i class=\"glyphicon glyphicon-share\"></i> Re-share</a></li>";
		echo "<li><a href=\"#\" id=\"blockshare\" value=\"block\"><i class=\"glyphicon glyphicon-ban-circle\"></i> Block re-share</a></li>";
		echo  "<li class=\"divider\"></li>";
		echo  "<li><a href=\"#\"><i class=\"glyphicon glyphicon-trash\"></i> Delete</a></li>";
		echo "</ul>";
		echo "</div>";
		echo "&nbsp";
		echo "<div class=\"btn-group\">";
		echo "<button type=\"button\" class=\"btn btn-default btn-sm\">";
		echo  "<i class=\"glyphicon glyphicon-plus\"></i> likes";
		echo "</button>";
		echo  "</div>";
		echo "</div>";
		echo "</div>";
		echo "</li>";
		}
	else 
	{	
	echo "<li class=\"timeline-inverted\">";
	echo  "<div class=\"timeline-badge default\"><i class=\"glyphicon glyphicon-edit\"></i></div>";
	$mystring = explode(',', $row['tag']);
if(empty($mystring['1']))
		{
echo "<div class=\"timeline-panel\"><div><h6 class=\"hash2\">".$mystring['0']."</h6></div>";
		}
		else
		{
			echo "<div class=\"timeline-panel\"><div><h6 class=\"hash2\">".$mystring['0']."</h6><h6 class=\"hash3\">".$mystring['1']."</h6></div>";
		}
	echo  "<div class=\"timeline-heading\">";
	echo    "<h4 class=\"timeline-title\">".$row['title']."</h4>";
	echo    "<p><small class=\"text-muted\"><i class=\"glyphicon glyphicon-time\"></i> ".$row['date']."</small></p>";
	echo  "</div>";
	echo  "<div class=\"timeline-body\">";
	echo    "<p> ".$row['post_data']."</p>";
	echo "<hr />";
	echo  "<div class=\"btn-group\">";
	echo  "<button type=\"button\" class=\"btn btn-primary btn-sm dropdown-toggle\" data-toggle=\"dropdown\">";
	echo   "<i class=\"glyphicon glyphicon-cog\"></i> <span class=\"caret\"></span>";
	echo "</button>";
	echo "<ul class=\"dropdown-menu\" role=\"menu\" style=\"text-align:left;\">";
	echo   "<li><a href=\"#\"><i class=\"glyphicon glyphicon-share\"></i> Re-share</a></li>";
	echo   "<li><a href=\"#\"><i class=\"glyphicon glyphicon-ban-circle\"></i> Block re-share</a></li>";
	echo   "<li class=\"divider\"></li>";
	echo  "<li><a href=\"#\"><i class=\"glyphicon glyphicon-trash\"></i> Delete</a></li>";
	echo "</ul>";
	echo "</div>";
	echo "&nbsp";
	echo "<div class=\"btn-group\">";
	echo "<button type=\"button\" class=\"btn btn-default btn-sm\">";
	echo  "<i class=\"glyphicon glyphicon-plus\"></i> likes";
	echo "</button>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</li>";
	}

}
?>
<?php
	echo "<li class=\"timeline-inverted\">";
	echo "<div class=\"timeline-label primary\"><i class=\"glyphicon glyphicon-off\"></i> Joined on 6/7/2014</div>";
	echo "<br /><br /><br />";
	echo "</li>";
	echo "</ul>";
?>
</script>