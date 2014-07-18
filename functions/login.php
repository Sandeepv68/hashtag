<?php
require '../constants/connect.inc.php';
function getRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
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
$lghs = getRandomString();
if($count==1)
{
	header("location:../start.php?id=".$row['id']."&Version=2.1&token=".$lghs." ");
}
else if($count ==0)
{
	header("location:../index.html?error=1");
}
?>