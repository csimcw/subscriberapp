<?php
ob_start();
require_once("..\config\properties.php");
require_once("DatabaseFunctions.php");

$dbobj = new DatabaseFunctions();
if(isset($_POST['submitreg'])){
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$sex = $_POST['sex'];
	$email = $_POST['email'];
	$add1 = $_POST['address1'];
	$add2 = $_POST['address2'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$zip = $_POST['zipcode'];
	$dob = $_POST['dateofbirth'];
	$anniversary = $_POST['marriageanniversary'];
	$carol = $_POST['carolarea'];	
	$memberadd = $dbobj->addmember($fname,$lname,$sex,$email,$add1 ,$add2 ,$city ,$state,$country,$zip,$dob,$anniversary,$carol);
	if($memberadd==1){	
		$msg='s';
		header('Location:..\registeration.php?msg='.$msg);
	}else{
		header('Location:..\registeration.php');		
	}
}
?>