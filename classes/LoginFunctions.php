<?php
/*
*	@Project		Provider Appointment System
* 	@File 			Pasfunctions.php
*	@Owner			BSC PMO - healthcare
*	@Description	This class defines all the database and session related functions required for the Application.	 
*/

class LoginFunctions{
	
	private $conn;	
	
	# Defining the database connection required for all other functions in the constructor.
	function __construct(){
		$host = HOSTNAME;
		$user = DBUSER;
		$pswd = DBPASSWD;
		$dbname = DBNAME;
		
		$this->conn = mysqli_connect($host,$user,$pswd);
		
		/* check connection */
		/*if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			//exit();
		}*/		
		if (!$this->conn) {			
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);			
		}else{
			mysqli_select_db($this->conn,$dbname);			
		}
	}
# Login function for validating the registered member.
	function login($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
		
		//$sha1pass = sha1($password);
		$sha1pass = $password;
		
		$sqlqry = "SELECT fullname FROM admin where username='$username' and password='$sha1pass'";
		
		$msqry = mysqli_query($this->conn,$sqlqry);
		
		$row = mysqli_fetch_assoc($msqry);
		
		$name = $row["fullname"];
			
		if($name !=""){
		//Login successfull
			session_start();
			$_SESSION['uname'] = $username;
			$_SESSION['fullname'] = $name;			
			return $name;		
		} 
		else {		
			/*$md5pass = md5($password);
			echo "3".$md5pass;
			$sqlqry1 = "SELECT count(*) as  NUMBER_OF_ROWS FROM dps_user where login='$username' and password='$md5pass'";
			$stmt1= oci_parse($this->conn, $sqlqry1);
			oci_define_by_name($stmt1, 'NUMBER_OF_ROWS', $number_of_rows2);
			oci_execute($stmt1);
			oci_fetch($stmt1);
			if($number_of_rows2 > 0){
			//Login successfull
				echo "4";
				session_start();
				$_SESSION['uname'] = $username;
				return $username;
			}*/
			return null;
		}
	}

	# Logout function to kill the session and clear the cookies.
	function logout()
	{
		session_start();
		// Unset all of the session variables.
		$_SESSION = array();

		// If it's desired to kill the session, also delete the session cookie.
		// Note: This will destroy the session, and not just the session data!
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}

		// Finally, destroy the session.
		session_destroy();
		return true;
	}
}
?>