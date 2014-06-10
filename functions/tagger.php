<?php
require '../constants/connect.inc.php';
if(isset($_POST['tagger']) and isset($_POST['user_id']) and isset($_POST['date']) and isset($_POST['username']))
{
	if(!empty($_POST['tagger']) and !empty($_POST['user_id']) and !empty($_POST['date']) and !empty($_POST['username']))
	{
		$text = mysql_real_escape_string($_POST['tagger']);
		$user_id = mysql_real_escape_string($_POST['user_id']);
		$date = mysql_real_escape_string($_POST['date']);
		$title = mysql_real_escape_string($_POST['username']);
	}
}

function get_hashtags($string, $str = 1)
{
	preg_match_all('/#(\w+)/u',$string,$matches);
	$i = 0;
	if ($str) 
	{
		foreach ($matches[0] as $match) 
		{
			$count = count($matches[0]);
			$keywords .= "$match";
			$i++;
			if ($count > $i) $keywords .= ", ";
		}
	} 
	else 
	{
	   foreach ($matches[0] as $match) 
	   {
			$keyword[] = $match;
	   }
	$keywords = $keyword;
}
return $keywords;
}
$meta_tags = get_hashtags($text);
$hashtag_regexp = '/#(\w+)/u';
$tagged_text = preg_replace($hashtag_regexp, '<span class="label label-default">#$1</span>',$text);
$sql="INSERT INTO hashtag_post (id, user_id, post_data, date, title, tag) 
		VALUES ('','$user_id', '$tagged_text', '$date', '$title', '$meta_tags')";
$insert = mysql_query($sql);
$new_exec = mysql_query($new_sql);
if($insert)
{
	header("location:../start.php?q=1&id=".$user_id."");
}
?>