<?php
session_start();
# Valdiating member's active session or else redirect to login.
if(!isset($_SESSION['fullname'])){
  header("Location:index.php");
}else{
  $usern = $_SESSION['fullname'];
}
//print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memorial Church | Registration Form</title>

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
	<style>
		body{
			background:lightgoldenrodyellow;
		}
		h2{
			color:purple;
		}
		h3{
			color:green;
		}
		select#baptism.form-control.input-lg{			
			width:70px !important;
		}
		select#baptism.form-control.input-lg{
			width:70px !important;
		}
		select#baptism.form-control.input-lg{
			width:70px !important;
		}
		#myIframe{
			width:600px;
			height:600px;
		}
		.navbar{
			margin-bottom:0px !important;			
		}
	</style>
  </head>
  <body>
  <img src="media/images/Head.png" width="100%" />
 	<nav class="navbar navbar-default" style="background:azure;"/>
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<ul class="nav nav-pills">					
					<li role="presentation" class="active"><a href="registeration.php">Registration</a></li>
					<li role="presentation"><a href="members.php">Congregation members</a></li>
					<li role="presentation"><a href="subscription.php">Subscription</a></li>
					<li role="presentation"><a href="Sendmail.php">Email</a></li>
					<li role="presentation"><a href="help.php">Help</a></li>
					<li role="presentation"><a href="login.php?q=logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>

<div align="right"><br/><br/><br/></div>
<div class="container">


		<form role="form" action="classes/registerationmodel.php" method="POST">
			<h2>Subscriber <small>registration.</small></h2>
			<hr class="colorgraph">
			<?php
			if(isset($_GET['msg']) && ($_GET['msg']=='s')){
			?>
				<h3>Member addition successfull!</h3>
			<?php
			}
			?>
			<div class="panel panel-info">
				<div class="panel-heading">Family Details</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-2">
							<div class="form-group">
							    <label class="control-label col-xs-12 label label-primary" for="name1">Full Name</label>
								<input type="text" name="name1" id="name1" class="form-control input-lg" placeholder="Name of the family member" tabindex="1" />
								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label class="control-label col-xs-12 label label-primary" for="relationship1">Relationship</label>
								<input type="text" name="relationship1" id="relationship1" class="form-control input-lg" placeholder="Relationship" tabindex="2"/>
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label class="control-label col-xs-12 label label-primary" for="dateofbirth1">Date of Birth</label>
								<input type="text" name="dateofbirth1" id="dateofbirth1" class="form-control input-lg" placeholder="Date of Birth" tabindex="3"/>
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<label class="control-label col-md-12 label label-primary" for="baptism1">Baptism</label>
								<select name="baptism1" id="baptism1" class="form-control input-lg" tabindex="4">
									<option value="">Select</option>
									<option value="0">Y</option>
									<option value="1">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<label class="control-label col-md-12 label label-primary" for="confirmation1">Confirmation</label>
								<select name="confirmation1" id="confirmation1" class="form-control col-xs-2 input-lg" tabindex="5">
									<option value="">Select</option>
									<option value="0">Y</option>
									<option value="1">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<label class="control-label col-xs-12 label label-primary" for="married1">Married</label>
								<select name="married1" id="married1" class="form-control input-lg" tabindex="6">
									<option value="">Select</option>
									<option value="0">Y</option>
									<option value="1">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								<label class="control-label col-xs-12 label label-primary" for="marriagedate1">Marriage Date</label>
								<input type="text" name="marriagedate1" id="marriagedate1" class="form-control input-lg" placeholder="Marriage Date" tabindex="7" />
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<label class="control-label col-md-12 label label-primary" for="imgupload">Photo</label>
								<input name="imgupload" id="up1" type="button" class="imgupload form-control btn btn-success" value="Upload" tabindex="8" />
								<input type="hidden" name="imgpath1" id="imgpath1" value="" />
																
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="form-group">
							    
								<input type="text" name="name2" id="name2" class="form-control input-lg" placeholder="Name of the family member" tabindex="9" />
								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								
								<input type="text" name="relationship2" id="relationship2" class="form-control input-lg" placeholder="Relationship" tabindex="10"/>
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								
								<input type="text" name="dateofbirth2" id="dateofbirth2" class="form-control input-lg" placeholder="Date of Birth" tabindex="11"/>
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="baptism2" id="baptism2" class="form-control input-lg" tabindex="12">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="confirmation2" id="confirmation2" class="form-control col-xs-2 input-lg" tabindex="13">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="married2" id="married2" class="form-control input-lg" tabindex="14">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">								
								<input type="text" name="marriagedate2" id="marriagedate2" class="form-control input-lg" placeholder="Marriage Date" tabindex="15" />
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">								
								<input name="imgupload" id="up2" type="button" class="imgupload form-control btn btn-success" value="Upload" tabindex="16" />								
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="form-group">
							    
								<input type="text" name="name3" id="name3" class="form-control input-lg" placeholder="Name of the family member" tabindex="17">
								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								
								<input type="text" name="relationship3" id="relationship3" class="form-control input-lg" placeholder="Relationship" tabindex="18">
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								
								<input type="text" name="dateofbirth3" id="dateofbirth3" class="form-control input-lg" placeholder="Date of Birth" tabindex="19">
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="baptism3" id="baptism3" class="form-control input-lg" tabindex="20">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="confirmation3" id="confirmation3" class="form-control col-xs-2 input-lg" tabindex="21">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="married3" id="married3" class="form-control input-lg" tabindex="22">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">								
								<input type="text" name="marriagedate3" id="marriagedate3" class="form-control input-lg" placeholder="Marriage Date" tabindex="23">
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">								
								<input name="imgupload" id="up3" type="button" class="imgupload form-control btn btn-success" value="Upload" tabindex="24" />	
							</div>
						</div>						
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="form-group">
							    <input type="text" name="name4" id="name4" class="form-control input-lg" placeholder="Name of the family member" tabindex="25">								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">								
								<input type="text" name="relationship4" id="relationship4" class="form-control input-lg" placeholder="Relationship" tabindex="26">
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">								
								<input type="text" name="dateofbirth4" id="dateofbirth4" class="form-control input-lg" placeholder="Date of Birth" tabindex="27">
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="baptism4" id="baptism4" class="form-control input-lg" tabindex="28">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="confirmation4" id="confirmation4" class="form-control col-xs-2 input-lg" tabindex="29">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="married4" id="married4" class="form-control input-lg" tabindex="30">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">								
								<input type="text" name="marriagedate4" id="marriagedate4" class="form-control input-lg" placeholder="Marriage Date" tabindex="31">
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">								
								<input name="imgupload" id="up4" type="button" class="imgupload form-control btn btn-success" value="Upload" tabindex="32"/>
																
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="form-group">
							    
								<input type="text" name="name5" id="name5" class="form-control input-lg" placeholder="Name of the family member" tabindex="33">
								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								
								<input type="text" name="relationship5" id="relationship5" class="form-control input-lg" placeholder="Relationship" tabindex="34">
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								
								<input type="text" name="dateofbirth5" id="dateofbirth5" class="form-control input-lg" placeholder="Date of Birth" tabindex="35">
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="baptism5" id="baptism5" class="form-control input-lg" tabindex="36">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="confirmation5" id="confirmation5" class="form-control col-xs-2 input-lg" tabindex="37">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="married5" id="married5" class="form-control input-lg" tabindex="38">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">								
								<input type="text" name="marriagedate5" id="marriagedate5" class="form-control input-lg" placeholder="Marriage Date" tabindex="39">
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">								
								<input name="imgupload" id="up5" type="button" class="imgupload form-control btn btn-success" value="Upload" tabindex="40" />	
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-xs-2">
							<div class="form-group">
							    
								<input type="text" name="name6" id="name6" class="form-control input-lg" placeholder="Name of the family member" tabindex="41">
								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								
								<input type="text" name="relationship6" id="relationship6" class="form-control input-lg" placeholder="Relationship" tabindex="42">
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">
								
								<input type="text" name="dateofbirth6" id="dateofbirth6" class="form-control input-lg" placeholder="Date of Birth" tabindex="43">
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="baptism6" id="baptism6" class="form-control input-lg" tabindex="44">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="confirmation6" id="confirmation6" class="form-control col-xs-2 input-lg" tabindex="45">
									<option value="">Select</option>
									<option value="yes">Y</option>
									<option value="no">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">
								<select name="married6" id="married6" class="form-control input-lg" tabindex="46">
									<option value="">Select</option>
									<option value="0">Y</option>
									<option value="1">N</option>
								</select>								
							</div>
						</div>
						<div class="col-xs-2">
							<div class="form-group">								
								<input type="text" name="marriagedate6" id="marriagedate6" class="form-control input-lg" placeholder="Date of Birth" tabindex="47">
							</div>
						</div>
						<div class="col-xs-1">
							<div class="form-group">								
								<input name="imgupload" id="up6" type="button" class="imgupload form-control btn btn-success" value="Upload" tabindex="48"/>
																
							</div>
						</div>
						
					</div>					
				</div>
			</div>
			
			<div class="panel panel-info">
				<div class="panel-heading">Occupation</div>
				<div class="panel-body">
					<div class="col-xs-6">
							<div class="form-group">
								
								<input type="text" name="occupation" id="occupation" class="form-control input-lg" placeholder="Occupation" tabindex="49">
							</div>
						</div>
				
				</div>
			</div>
			
			<div class="panel panel-info">
				<div class="panel-heading">Residential Address</div>
				<div class="panel-body">
					<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="address1" id="address1" class="form-control input-lg" placeholder="Door Number, Street Address" tabindex="50">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="address2" id="address2" class="form-control input-lg" placeholder="Area, Landmark" tabindex="51">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="city" id="city" class="form-control input-lg" placeholder="City" tabindex="52">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="state" id="state" class="form-control input-lg" placeholder="State" tabindex="53">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="country" id="country" class="form-control input-lg" placeholder="Country" tabindex="54">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="zipcode" id="zipcode" class="form-control input-lg" placeholder="Postal Code" tabindex="55">
					</div>
				</div>
			</div>
							
				
				</div>
			</div>
			
			<div class="panel panel-info">
				<div class="panel-heading">Official Address</div>
				<div class="panel-body">
					<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="oaddress1" id="oaddress1" class="form-control input-lg" placeholder="Door Number, Street Address" tabindex="56">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="oaddress2" id="oaddress2" class="form-control input-lg" placeholder="Area, Landmark" tabindex="57">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="ocity" id="ocity" class="form-control input-lg" placeholder="City" tabindex="58">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="ostate" id="ostate" class="form-control input-lg" placeholder="State" tabindex="59">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="ocountry" id="ocountry" class="form-control input-lg" placeholder="Country" tabindex="60">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="ozipcode" id="ozipcode" class="form-control input-lg" placeholder="Postal Code" tabindex="61">
					</div>
				</div>
			</div>
							
				
				</div>
			</div>
			
			<div class="panel panel-info">
				<div class="panel-heading">Contact Details</div>
				<div class="panel-body">
			
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="telephone" id="telephone" class="form-control input-lg" placeholder="Telephone(Home)" tabindex="62">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="otelephone" id="otelephone" class="form-control input-lg" placeholder="Telephone(Office)" tabindex="63">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="mobile" id="mobile" class="form-control input-lg" placeholder="Mobile" tabindex="64">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email" tabindex="65">
					</div>
				</div>
			</div>
			
			
			
				</div>
			</div>
			
			<div class="panel panel-info">
				<div class="panel-heading">Previous Church Details</div>
				<div class="panel-body">
			
				<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-3">
					<div class="form-group">
						<input type="text" name="pchname" id="pchname" class="form-control input-lg" placeholder="Name" tabindex="66">
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<div class="form-group">
						<input type="text" name="pchaddress" id="pchaddress" class="form-control input-lg" placeholder="Address" tabindex="67">
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-3">
					<div class="form-group">
						<input type="text" name="pchperiod" id="pchperiod" class="form-control input-lg" placeholder="Period of Membership" tabindex="68">
					</div>
				</div>
			</div>
			<div class="row">
								
				<div class="col-xs-3">
					<div class="form-group">
						<label class="control-label col-xs-12 label label-primary" for="baptism">Transfer Certificate attached</label>
						<select name="transf" id="transf" class="form-control input-lg" tabindex="69">
							<option value="">Select</option>
							<option value="0">Yes</option>
							<option value="1">No</option>
						</select>								
					</div>
				</div>
			
								
				<div class="col-xs-4">
					<div class="form-group">
						<label class="control-label col-xs-12 label label-primary" for="baptism">Are you full member of another church. Details</label>
						<textarea name="fullmemdetails" id="fullmemdetails" class="form-control input-lg" tabindex="70"></textarea>								
					</div>
				</div>
			</div>
			
			
			
				</div>
			</div>
			
			<div class="panel panel-info">
				<div class="panel-heading">Contribution towards Ministry</div>
				<div class="panel-body">
			
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<textarea name="contribution" id="contribution" class="form-control input-lg" placeholder="Suggestions/Remarks" tabindex="71"></textarea>
					</div>
				</div>
				</div>
			</div>
			</div>			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-12"><input type="submit" name="submitreg" value="Register" class="btn btn-primary btn-lg" tabindex="7">&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset" class="btn btn-primary  btn-lg" tabindex="7"></div>
				<!--<div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>-->
			</div>
			<div id="dialog">
				<iframe id="myIframe" src=""></iframe>
			</div>			
		</form>
		
	
</div>
<br/><br/><br/>		
	
		<link href="media/css/jquery-ui.css" rel="stylesheet" type="text/css" />
		
		<script src="media/js/jquery-1.11.2.min.js"></script>
		<script src="media/js/jquery-ui.min.js"></script>
        <script src="media/js/bootstrap-datepicker.js"></script>
		
		
		
        <script type="text/javascript">
		
            // When the document is ready
            $(document).ready(function () {
                
                $('#dateofbirth1,#marriagedate1,#dateofbirth2,#marriagedate2,#dateofbirth3,#marriagedate3,#dateofbirth4,#marriagedate4,#dateofbirth5,#marriagedate5,#dateofbirth6,#marriagedate6').datepicker({
                    format: "yyyy-mm-dd"
                });  
				
				/*$('#marriageanniversary').datepicker({
                    format: "yyyy-dd-mm"
                })*/
				
				
				$('#dialog').dialog({
					autoOpen: false,
					modal: true,
					resizable: true,
					width: "auto",
					height: "auto",
					open: function(ev, ui){
							 $('#myIframe').attr('src','cropimage/index.php');
						  }
				});
				
				$(".imgupload").click(function(){					
					 $('#dialog').dialog('open');
				});
            
            });
			function closeIframe()
			{
				$('#dialog').dialog('close');
				return false;
			}

        </script>
	<nav class="navbar navbar-default" style="text-align:center; background:palegoldenrod;"/>
		<div>
			&copy;All rights reserved 2015, CSI Memorial Church, Whitefield, Bangalore
		</div>		
</nav>	
</body>
</html>