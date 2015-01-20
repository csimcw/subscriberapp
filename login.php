<?php
/*
*	@Project		Provider Appointment System
* 	@File 			Login.php
*	@Owner			BSC PMO - healthcare
*	@Description	The Login page controls the login and logout flow of the Application
*/
require_once("config\properties.php");
include "classes\LoginFunctions.php";

$sessmngobj = new LoginFunctions(HOSTNAME,DBUSER,DBPASSWD,DBNAME);

	/*
	*	Login control and Redirection
	*/
	if (isset($_POST['submit'])) {
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
		}	
	
		if(!isset($username) || !isset($password)){
			$msg = "username or password is empty, Please provide!1";
			header("Location:index.php?msg=".$msg);
		}
		else if(empty($username) || empty($password)){
			$msg = "username or password is empty, Please provide!2";
			header("Location:index.php?msg=".$msg);
		}
		else {		
			$rusername = $sessmngobj->login($username, $password);
			if (isset($rusername) && !empty($rusername)) {
				header("Location:registeration.php");
			}
			else {
				$msg = "Invalid username or password, Please try again!3";
				header("Location:index.php?msg=".$msg);
			}
		}
	}
	
	/*
	*	Logout control and Redirection
	*/
	if (isset($_GET['q'])) {
	$q = $_GET['q'];
	if ($q == "logout") {
		$logret = $sessmngobj->logout();
		if ($logret == true) {			
			header("Location:index.php");
		}
	}

	}	
?>

