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
					<li role="presentation" class="active"><a href="members.php">Congregation members</a></li>
					<li role="presentation"><a href="subscription.php">Subscription</a></li>
					<li role="presentation"><a href="Sendmail.php">Email</a></li>
					<li role="presentation"><a href="help.php">Help</a></li>
					<li role="presentation"><a href="login.php?q=logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
    <div class="container">    
        <div id="loginbox" style="margin-top:20px;" class="mainbox col-md-6 col-sm-8">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Member Search</div>                        
                    </div>     

                    <div style="padding-top:10px" class="panel-body" >
						<div>
							<p>
								<input type="radio" name="srchtype" id="srchtype1" checked="checked">General search</input>
							</p>
							<p>
								<input type="radio" name="srchtype" id="srchtype2">Birthday search</input>
							</p>
							<p>
								<input type="radio" name="srchtype" id="srchtype3">Anniversary search</input>
							</p>
							<p>
								<input type="radio" name="srchtype" id="srchtype4">Carol List</input>
							</p>							
						</div>
					
					
						<div id="generalsearch">
                        <div style="display:block" id="login-info" class="alert alert-warning col-sm-12">Please enter the following details to search for the member</div>
                            
                        <form id="searchform" class="form-horizontal" role="form" method="POST" action="members.php">
                                    
                            <div style="margin-bottom: 25px;display:inline-block;" class="input-group">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="" placeholder="First Name">         
                            </div>
							<div style="margin-bottom: 25px;display:inline-block;" class="input-group">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="" placeholder="Last Name">         
                            </div>
							<div style="margin-bottom: 25px;display:inline-block;" class="input-group">
                                <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="" placeholder="Phone Number">         
                            </div> 
							<div style="margin-bottom: 25px;display:inline-block;" class="input-group">
                                <input id="email" type="text" class="form-control" name="email" value="" placeholder="Email">         
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
						<div id="birthdaysearch">
							<div style="display:block" id="login-info" class="alert alert-warning col-sm-12">Please enter the following details to search for the member</div>
                            
                        <form id="searchform" class="form-horizontal" role="form" method="POST" action="members.php">
                                    
                            <div style="margin-bottom: 25px;display:inline-block;" class="input-group">
                                <input id="startbdate" type="text" class="form-control date" name="startbdate" value="" placeholder="Start Date">         
                            </div>
							
							<div style="margin-bottom: 25px;display:inline-block;" class="input-group">
                                <input id="endbdate" type="text" class="form-control date" name="endbdate" value="" placeholder="End Date">         
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
						
						<div id="anniversarysearch">
							<div style="display:block" id="login-info" class="alert alert-warning col-sm-12">Please enter the following details to search for the member</div>
                            
                        <form id="searchform" class="form-horizontal" role="form" method="POST" action="members.php">
                                    
                            <div style="margin-bottom: 25px;display:inline-block;" class="input-group">
                                <input id="startadate" type="text" class="form-control date" name="startbdate" value="" placeholder="Start Date">         
                            </div>
							
							<div style="margin-bottom: 25px;display:inline-block;" class="input-group">
                                <input id="endadate" type="text" class="form-control date" name="endbdate" value="" placeholder="End Date">         
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
						
						<div id="carolsearch">
							<div style="display:block" id="login-info" class="alert alert-warning col-sm-12">Please enter the following details to search for the member</div>
                            
                        <form id="searchform" class="form-horizontal" role="form" method="POST" action="members.php">
                                             
							<select name="carolselect" id="carolselect" class="form-control">
								<option value="">Select Area</option>
								<option value="">Mayura Bakery</option>
								<option value="">Borewell Road</option>
								<option value="">whitefield main road</option>
								<option value="">ramagondanahalli</option>
								<option value="">kadugodi</option>
								<option value="">Brookebond</option>
							
							</select>
							
							<div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                      <input type="submit" name="search" id="btn-login" class="btn btn-default"value="Search" />
                                      <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->
                                    </div>
                            </div>                                 
                        </form> 					
						</div>
						
						<div>
							<!--<table>
								<tr>
									<th>First Name</th><th>Last Name</th><th>Gender</th><th>Email</th><th>Address</th><th>Birth Date</th><th>Anniversary</th>
								</tr>
								<tr>
									<td><?  ?></td><td><? ?></td><td><? ?></td><td><? ?></td><td><? ?></td><td><? ?></td><td><? ?></td>
								</tr>
							
							</table>-->
						
						
						</div>
					</div>                     
                </div>  
        </div>         
    </div>

	<link href="media/css/jquery-ui.css" rel="stylesheet" type="text/css" />
		
		<script src="media/js/jquery-1.11.2.min.js"></script>
		<script src="media/js/jquery-ui.min.js"></script>
        <script src="media/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                $("#carolsearch").hide();
				$("#anniversarysearch").hide();				
				$("#birthdaysearch").hide();
                $('#dateofbirth').datepicker({
                    format: "yyyy-mm-dd"
                });  
				
				$('#marriageanniversary').datepicker({
                    format: "yyyy-dd-mm"
                });
				
				$('#srchtype1').click(function(){
					$('#carolsearch').hide(1000);
					$('#anniversarysearch').hide(1000);
					$('#birthdaysearch').hide(1000);
					$('#generalsearch').show(1000);					
				});

				$("#srchtype2").click(function(){
					
					$("#carolsearch").hide(1000);
					$("#anniversarysearch").hide(1000);
					$("#generalsearch").hide(1000);
					$("#birthdaysearch").show(1000);					
				});
				
				$('#srchtype3').click(function(){
					$('#carolsearch').hide(1000);
					$('#birthdaysearch').hide(1000);
					$('#generalsearch').hide(1000);
					$('#anniversarysearch').show(1000);					
				});
				
				$('#srchtype4').click(function(){
					$('#birthdaysearch').hide(1000);
					$('#anniversarysearch').hide(1000);
					$('#generalsearch').hide(1000);
					$('#carolsearch').show(1000);					
				});
				
			});
				
			

        </script>
    



<?php
include_once("template_footer.php");
?>