<?php
session_start();

# Valdiating member's active session or else redirect to login.
if(!isset($_SESSION['fullname'])){
  header("Location:index.php");
}else{
  $usern = $_SESSION['fullname'];
}
	
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="media/css/bootstrap.min.css" rel="stylesheet">
	<link href="media/css/bootstrap-theme.css" rel="stylesheet">
	<link rel="stylesheet" href="media/css/datepicker.css">
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
					<li role="presentation"><a href="login.php?q=logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>

<div align="right"><br/><br/><br/></div>
<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form">
			<h2>Subscriber <small>registration.</small></h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<!--<input type="text" name="sex" id="sex" class="form-control input-lg" placeholder="Sex" tabindex="3">-->
						<select name="sex" id="sex" class="form-control input-lg" placeholder="Sex" tabindex="3">
							<option value="">Select</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="address1" id="address1" class="form-control input-lg" placeholder="Door Number, Street Address" tabindex="5">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="address2" id="address2" class="form-control input-lg" placeholder="Area, Landmark" tabindex="6">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="city" id="city" class="form-control input-lg" placeholder="City" tabindex="5">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="state" id="state" class="form-control input-lg" placeholder="State" tabindex="6">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="country" id="country" class="form-control input-lg" placeholder="Country" tabindex="5">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="zipcode" id="zipcode" class="form-control input-lg" placeholder="Postal Code" tabindex="6">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="dateofbirth" id="dateofbirth" class="form-control input-lg" placeholder="Date of Birth" tabindex="5">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="marriageanniversary" id="marriageanniversary" class="form-control input-lg" placeholder="Marriage Anniversary" tabindex="6">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">						
						<select name="carolarea" id="carolarea" class="form-control input-lg">
							<option value="">Please select the area for carol rounds</option>
							<option value="brookebond">brookebond</option>
							<option value="borewellroad">borewellroad</option>
							<option value="kadugodi">kadugodi</option>
							<option value="marthahalli">marthahalli</option>
							<option value="immadihalli">immadihalli</option>
							<option value="other">other</option>
						</select>
					</div>
				</div>				
			</div>
			<!--<div class="row">
				<div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox">
						<button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
					</span>
				</div>
				<div class="col-xs-8 col-sm-9 col-md-9">
					 By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
				</div>
			</div>-->
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-lg" tabindex="7">&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset" class="btn btn-primary  btn-lg" tabindex="7"></div>
				<!--<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>-->
			</div>
		</form>
	</div>
</div>
</div>
<br/><br/><br/>
		<script src="media/js/jquery-1.11.2.min.js"></script>
        <script src="media/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#dateofbirth').datepicker({
                    format: "dd/mm/yyyy"
                });  
				
				$('#marriageanniversary').datepicker({
                    format: "dd/mm/yyyy"
                });
            
            });
        </script>
<?php
include_once("template_footer.php");
?>