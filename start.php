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
        <li class="page-scroll"> <a href="#about"><span class="glyphicon glyphicon-align-center"></span> Timeline</a> </li>
        <li class="page-scroll"> <a href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-flag"></span> About</a> </li>
        <li class="page-scroll">
          <form class="navbar-form navbar-left" role="search" method="POST" action="search.php?id=<?php echo $user_id;?>">
            <div class="form-group">
              <input type="text" name="tags" required class="form-control" placeholder="Search #tags"  style="width:500px;" pattern="(^|\s|\b)(#(\w+))\b" autocomplete="on">
              <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
            </div>
          </form>
        </li>
        <li class="page-scroll pull-right">
        <a href="" class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo $user_name;?> 
        <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="" data-toggle="modal" data-target="#logoutmodal"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
        </ul></li>
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
        <h1>#HashTag</h1>
        <br>
        <p style="font-size:16px;"><span class="label label-default">#HashTag</span> is a web application that demonstrates the working of a hashtag system found in social networking applications like Twitter, Facebook, Google+ and so on. This demo uses a PHP - MySQL based server to generate the dynamics of the application. A hashtag is a word or an unspaced phrase prefixed with the number sign ("#"). It is a form of metadata tag. Words in messages on microblogging and social networking services such as Twitter, Facebook, Google+ or Instagram may be tagged by putting "#" before them, either as they appear in a sentence, (e.g., "New artists announced for <span class="label label-default">#SXSW2014MusicFestival</span>")or appended to it.
          
          Hashtags make it possible to group such messages, since one can search for the hashtag and get the set of messages that contain it. A hashtag is only connected to a specific medium and can therefore not be linked and connected to pictures or messages from different platforms. Users can post their comments with hashtags which will be detected by the app and will be marked as Hashtags within the app. Users can search the app with hashtags which will result out posts with corresponding hashtags. Happy Hashtagging !</p>
        <div class="page-scroll"> <a class="btn btn-success" href="#about">Go #HashTag</a> </div>
        <br />
        <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
        <g:plusone></g:plusone>
      </div>
    </div>
  </div>
</section>
<section id="about" class="services-section">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <form method="POST" action="functions/tagger.php">
              <textarea required class="textarea form-control" style="width: 715px; height: 100px" placeholder="Enter text ...you can use '#' to create hashtags" id="tagger" name="tagger"></textarea>
              <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
              <input type="hidden" name="date" value="<?php echo $date;?>">
              <input type="hidden" name="username" value="<?php echo $user_name;?>">
              <br />
              <div class="pull-right">
                <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-remove-sign"></span> Clear</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-share"></span> Share</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <h1>Timeline</h1>
        <?php include 'timeline.php'; ?>
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
<script type="text/javascript">
toastr.options = {
				  "closeButton": true,
				  "debug": false,
				  "positionClass": "toast-bottom-full-width",
				  "onclick": null,
				  "showDuration": "300",
				  "hideDuration": "1000",
				  "timeOut": "5000",
				  "extendedTimeOut": "5000",
				  "showEasing": "swing",
				  "hideEasing": "linear",
				  "showMethod": "fadeIn",
				  "hideMethod": "fadeOut"
}
function GetURLParameter(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
var trigger = GetURLParameter('id');
var toast = GetURLParameter('q');
var redirect = GetURLParameter('redirect');
if(trigger.length > 0 && toast.length > 0)
{
	toastr.success("post saved to stream successfully !");
}
else if(trigger.length > 0 && redirect.length > 0)
{
	toastr.info("Welcome back !");
}
else if(trigger.length > 0)
{
	toastr.success("You have logged in successfully !");
}

</script>
</body>
</html>
