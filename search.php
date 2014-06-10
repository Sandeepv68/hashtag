<?php
require 'constants/connect.inc.php';
if(isset($_GET['id']))
{
	if(!empty($_GET['id']))
	{
		$user_id=$_GET['id'];
	}
	$sql = "SELECT * FROM hashtag_user WHERE id='$user_id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	$user_name = $row['fullname'];
}
$date = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" href="icons/favicon.ico">
<title>#HashTag | Home</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

<!-- Custom CSS -->
<link href="css/scrolling-nav.css" rel="stylesheet" type="text/css">

<!-- Timeline CSS -->
<link href="css/timeline.css" rel="stylesheet" type="text/css">

<!-- Toaster -->
<link href="toastr/toastr.css" rel="stylesheet" type="text/css">

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#page-top">#HashTag</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
        <li class="hidden"> <a href="#page-top"></a> </li>
        <li class="page-scroll"> <a href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-flag"></span> About</a> </li>
       
        <li class="page-scroll pull-right">
        <a href="" class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo $user_name;?> 
        <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="" data-toggle="modal" data-target="#logoutmodal"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
           
        </ul></li>
        <li class="page-scroll pull-right">
              <a href="start.php?id=<?php echo $user_id;?>&redirect=4"><span class="glyphicon glyphicon-remove"></span> Close Search</a>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container --> 
</nav>
<section id="intro" class="intro-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>#SearchResults</h1>
        <?php
if(isset($_POST['tags']))
{
	if(!empty($_POST['tags']))
	{
		$search_key=$_POST['tags'];
	}
}
$query="SELECT * FROM hashtag_post WHERE tag='$search_key'";
$result_exec = mysql_query($query);
while($rows = mysql_fetch_assoc($result_exec))
{
	echo "<div class=\"panel panel-info\">";
	echo "<div class=\"panel-heading\">";
	echo "<span class=\"badge pull-right\">".$search_key."</span>";
	echo "<h3 class=\"panel-title\">".$rows['title']."</h3>";
	echo "</div>";
	echo "<div class=\"panel-body\">";
	echo $rows['post_data'];
	echo "</div>";
	echo "</div>";
}
?>
        <br>
       </div>
    </div>
  </div>
</section>

<div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">About #HashTag</h4>
      </div>
      <div class="modal-body">
        <p>#HashTag is a web application that demonstrates the working of a hashtag system found in social networking applications like Twitter, Facebook, Google+ and so on. This demo uses a PHP - MySQL based server to generate the dynamics of the application. This software is developed and maintained by <a href="http://www.sandeepv.comze.com">Sandeep Vattapparambil</a>. Sourcecode for the application is maintained in Github - visit <a href="http://github.com/SandeepVattapparambil">github.com/SandeepVattapparambil</a></p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Ok !</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="logoutmodal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Logout</h4>
      </div>
      <div class="modal-body">
        <p>Do you wish to logout ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
        <a href="functions/logout.php" type="button" class="btn btn-danger">Logout</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- Core JavaScript Files --> 
<script src="js/jquery-1.10.2.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.easing.min.js"></script> 

<!-- Custom Theme JavaScript --> 
<script src="js/scrolling-nav.js"></script> 

<!-- Toaster -->
<script src="toastr/toastr.js"></script> 
</body>
</html>
