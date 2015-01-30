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
 	<nav class="navbar navbar-default" style="background:azure;" />
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<ul class="nav nav-pills">
					<li role="presentation"><a href="registeration.php">Registration</a></li>
					<li role="presentation"><a href="members.php">Congregation members</a></li>
					<li role="presentation" class="active"><a href="subscription.php">Subscription</a></li>
					<li role="presentation"><a href="Sendmail.php">Email</a></li>
					<li role="presentation"><a href="help.php">Help</a></li>
					<li role="presentation"><a href="login.php?q=logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
    <div class="container">
		<div class="row" style="margin-top:20px;margin-left:20px;">
			<input type="radio" name="rd1" id="subsentry" checked>Subscription Entry</input>
			<input type="radio" name="rd1" id="subsdetails">Subscription Details</input>
		</div>
		
		<div class="row">
        <div id="entrybox"  class="mainbox col-md-8 col-sm-8 " style="margin-top:20px;">                  
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Subscription Entry</div>                        
                    </div>     

                    <div style="padding-top:10px" class="panel-body" >

                        <div style="display:block" id="login-info" class="alert alert-warning col-sm-12">Please enter the subscription details for the member and click on submit</div>
                            
                        <form id="entryform" class="form-horizontal" role="form" method="POST" action="subscription.php">
                            <div class="row" style="padding-left:20px;">        
                            <div style="margin-bottom: 25px;display:inline-block;" class="input-group">
                                <input id="membname" type="text" class="form-control" name="Member name" value="" placeholder="Member Name">         
                            </div>
							<div style="margin-bottom: 25px;display:inline-block;" class="input-group">
                                <input id="subscription" type="text" class="form-control" name="subscription" value="" placeholder="Subscription Amount(INR)">         
                            </div>
							</div>
							<div class="row" style="padding-left:20px;">        
								  <div style="margin-bottom: 25px;display:inline-block;" class="input-group">
									<input id="subperiod" type="text" class="form-control" name="Member name" value="" placeholder="Subscription period">         
								</div>
								<div style="margin-bottom: 25px;display:inline-block;" class="input-group">
									<select id="offeringtype" class="form-control" name="offeringtype">
										<option value="">Select a Type</option>
										<option value="sub">Subscription</option>
										<option value="tg">Thanks Giving</option>
										<option value="hf">Harvest Festival</option>
										<option value="co">Carol Offering</option>
										<option value="cf">Children fund</option>
										<option value="wf">Womens fellowship</option>
										<option value="yf">Youth fellowship</option>
									</select>
								</div>
							</div>
							                     
                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                      <input type="submit" name="submit" id="btn-login" class="btn btn-default"value="Submit" />
									  <input type="reset" name="reset" id="btn-login" class="btn btn-default"value="Reset" />
                                      <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->
                                    </div>
                            </div>                                 
                        </form> 
						
						
					</div> 					
                </div>
			</div>
		</div>
		<div id="detailsbox" style="display:none;"> 
		<div class="row">
			<div id="loginbox"  class="mainbox col-md-4 col-sm-4 " style="margin-top:20px;"> 				
				<div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Subscription Details</div>                        
                    </div>     

                    <div style="padding-top:10px" class="panel-body" >

                        <div style="display:block" id="login-info" class="alert alert-warning col-sm-12">Please select the period to view the subscription details</div>
                            
                        <form id="searchform" class="form-horizontal" role="form" method="POST" action="members.php">
                                    
                            <div style="margin-bottom: 25px;display:inline-block;" class="input-group">
                                <input id="datestart" type="text" class="form-control" name="firstname" value="" placeholder="Start date">         
                            </div>
							<div style="margin-bottom: 25px;display:inline-block;" class="input-group">
                                <input id="dateend" type="text" class="form-control" name="lastname" value="" placeholder="end date">         
                            </div>
							                     
                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                      <input type="submit" name="search" id="btn-login" class="btn btn-default"value="Search" />
                                      <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->
                                    </div>
                            </div>                                 
                        </form> 
						
						
					</div> 					
                </div>
			</div>
			<div  class="mainbox col-md-4 col-sm-4"  style="margin-top:20px;">
				<div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Subscription Details</div>                        
                    </div>     

                    <div style="padding-top:10px" class="panel-body" >
							<table class="table">
								<tr>
									<th>Period</th><th>Amount(INR)</th>
								</tr>
								<tr>
									<td>Jan 2015</td><td>23000</td>
								</tr>
								<tr>
									<td>Dec 2014</td><td>31000</td>
								</tr>
								<tr>
									<td>Nov 2014</td><td>19000</td>
								</tr>
								<tr>
									<td>Oct 2014</td><td>20500</td>
								</tr>
								<tr>
									<td>Sep 2014</td><td>21000</td>
								</tr>
								<tr>
									<td>Aug 2014</td><td>18400</td>
								</tr>								
							</table>									
					</div>
				</div>
			</div>		
        </div> 
		</div>
    </div>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
		
		<script src="media/js/jquery-1.11.2.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <script src="media/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                $('#subsentry').click(function(){
					$('#detailsbox').hide(1000);
					$('#entrybox').show(1000);
				});
				
				$('#subsdetails').click(function(){
					$('#entrybox').hide(1000);
					$('#detailsbox').show(1000);
				});
				
				
				
                $('#subperiod').datepicker({
                    format: "yyyy-mm-dd"
                });  
				
				$('#dateend').datepicker({
                    format: "yyyy-dd-mm"
                });
			});
		</script>
<?php
include_once("template_footer.php");
?>