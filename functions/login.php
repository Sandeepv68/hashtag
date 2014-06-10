<?php
require '../constants/connect.inc.php';
if(isset($_POST['email']) && isset($_POST['password']))
{
	if($_POST['email']!= NULL and $_POST['password']!= NULL)
	{		
		  $email = strtolower(htmlentities($_POST['email']));
		  $password = htmlentities($_POST['password']);
	}
}
$sql = "SELECT * FROM hashtag_user WHERE email = '$email' AND password = '$password' ";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
$count = mysql_num_rows($result);
if($count==1)
{
	header("location:../start.php?id=".$row['id']." ");
}
else if($count ==0)
{
	header("location:../index.html?error=1");
}
?>