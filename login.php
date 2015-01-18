<?php
require_once("config/properties.php");

$con = mysql_connect(HOSTNAME,DBUSER,DBPASSWD);
if(mysql_select_db(DBNAME,$con)){
	if(isset($_POST['username'])){
		$login = $_POST['username'];
	}
	if(isset($_POST['password'])){
		$password = $_POST['password'];
	}
	$qry = "select fullname from admin where username='$login' and password = '$password'";
			$msqry = mysql_query($qry);
			$row = mysql_fetch_assoc($msqry);
			$name = $row['fullname'];
			echo $name;	
			header("Location:registeration.php");
}else{
	die("DB Connection Error ".mysql_error());
}

?>