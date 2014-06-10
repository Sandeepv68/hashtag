<?Php
require("connection.php");
$conn_error = 'Could not connect.';
$mysql_host = HOST;// 'localhost';
$mysql_user = USERNAME;//,'root';
$mysql_pass = PASSWORD;//,'';
$mysql_db   = DATABASENAME;//'mla_on_click';
if(!@mysql_connect ($mysql_host, $mysql_user, $mysql_pass )||!@mysql_select_db($mysql_db)){
	die($conn_error);
}
else{
  	//echo 'connected successfully<hr>';
}
?>