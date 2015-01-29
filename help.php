<?php
session_start();
require_once("config\properties.php");
require_once("classes\DatabaseFunctions.php");

# Valdiating member's active session or else redirect to login.
if(!isset($_SESSION['fullname'])){
  header("Location:index.php");
}else{
  $usern = $_SESSION['fullname'];
}


$dbobj = new DatabaseFunctions();

if(isset($_POST['search'])){
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$phone = $_POST['phonenumber'];
	
	$dbobj->searchMember($fname,$lname,$phone);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memorial Church Whitefield | Member Search</title>

    <!-- Bootstrap -->
    <link href="media/css/bootstrap.css" rel="stylesheet">
	<link href="media/css/bootstrap-theme.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9] -->
      <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		body{
			background:lightgoldenrodyellow;
		}
		.navbar{
			margin-bottom:0px !important;
		}
	</style>
	
  </head>
  <body>
  <img src="media/images/Head.png" width="100%"/>
 	<nav class="navbar navbar-default" style="background:azure;"/>
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<ul class="nav nav-pills">
					<li role="presentation"><a href="registeration.php">Registration</a></li>
					<li role="presentation"><a href="members.php">Congregation members</a></li>
					<li role="presentation" ><a href="subscription.php">Subscription</a></li>
					<li role="presentation"><a href="Sendmail.php">Email</a></li>
					<li role="presentation" class="active"><a href="help.php">Help</a></li>
					<li role="presentation"><a href="login.php?q=logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
    <div class="container">  
	
	
	</div>
  </body>
 <?php
include_once("template_footer.php");
?>