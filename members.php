<?php
require_once("config\properties.php");
require_once("classes\DatabaseFunctions.php");

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
    <link href="media/css/bootstrap.min.css" rel="stylesheet">
	<link href="media/css/bootstrap-theme.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9] -->
      <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <img src="media/images/Head.png" />
 	<nav class="navbar navbar-default" />
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<ul class="nav nav-pills">
					<li role="presentation" class="active"><a href="registeration.php">Registeration</a></li>
					<li role="presentation"><a href="members.php">Congregation members</a></li>
					<li role="presentation"><a href="subscription.php">Subscription</a></li>
					<li role="presentation"><a href="help.php">Help</a></li>
				</ul>
			</div>
		</div>
	</nav>
    <div class="container">    
        <div id="loginbox" style="margin-top:20px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Member Search</div>                        
                    </div>     

                    <div style="padding-top:10px" class="panel-body" >

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
                            <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                                    <div class="col-sm-12 controls">
                                      <input type="submit" name="search" id="btn-login" class="btn btn-default"value="Search" />
                                      <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->
                                    </div>
                            </div>                                 
                        </form> 
						
						<div>
							<table>
								<tr>
									<th>First Name</th><th>Last Name</th><th>Gender</th><th>Email</th><th>Address</th><th>Birth Date</th><th>Anniversary</th>
								</tr>
								<tr>
									<td><?  ?></td><td><? ?></td><td><? ?></td><td><? ?></td><td><? ?></td><td><? ?></td><td><? ?></td>
								</tr>
							
							</table>
						
						
						</div>
					</div>                     
                </div>  
        </div>         
    </div>
    



<?php
include_once("template_footer.php");
?>