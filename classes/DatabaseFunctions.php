<?php
/*
*	@Project		Provider Appointment System
* 	@File 			Pasfunctions.php
*	@Owner			BSC PMO - healthcare
*	@Description	This class defines all the database and session related functions required for the Application.	 
*/

class DatabaseFunctions{
	
	private $mysqli;	
	
	# Defining the database connection required for all other functions in the constructor.
	function __construct(){
		$host = HOSTNAME;
		$user = DBUSER;
		$pswd = DBPASSWD;
		$dbname = DBNAME;
		
		//$this->conn = mysqli_connect($host,$user,$pswd);
		$this->mysqli = new mysqli($host,$user,$pswd,$dbname);
		
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	}
	
	#Function to save the registeration data in members table
	function addmember($fname,$lname,$sex,$email,$add1 ,$add2 ,$city ,$state,$country,$zip,$dob,$anniversary,$carol){
		$stmt = $this->mysqli->prepare("INSERT INTO `members`( `firstname`, `lastname`, `gender`, `email`, `address1`, `address2`, `city`, `state`, `country`, `zipcode`, `dob`, `anniversary`, `carolarea`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		
		if ( false===$stmt ) {
		  // and since all the following operations need a valid/ready statement object
		  // it doesn't make sense to go on
		  // you might want to use a more sophisticated mechanism than die()
		  // but's it's only an example
		  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
		}
		
		
		$rc = $stmt->bind_param('sssssssssisssi',$fname,$lname,$sex,$email,$add1,$add2,$city,$state,$country,$zip,$dob,$anniversary,$carol,$zero);   // bind $sample to the parameter
		
		// escape the POST data for added protection
		$id=null;
		$zero = 0;
		$this->fname=$fname;
		$this->lname=$lname;
		$this->sex=$sex;
		$this->email=$email;
		$this->add1=$add1;
		$this->add2=$add2;
		$this->city=$city;
		$this->state=$state;
		$this->country=$country;
		$this->zip=$zip;
		$this->dob=$dob;
		$this->anniversary=$anniversary;
		$this->carol=$carol;

		if ( false===$rc ) {
		  // again execute() is useless if you can't bind the parameters. Bail out somehow.
		  die('bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		
		/* execute prepared statement */
		$rc = $stmt->execute();
		if ( false===$rc ) {
		  die('execute() failed: ' . htmlspecialchars($stmt->error));
		}		
		return($stmt->affected_rows);
	}
	
	function searchMember($fname,$lname,$phone){
	
		$query = "select * from members where firstname = ? and lastname = ? amd phone = ?";
			$stmt = $this->mysqli->prepare($query);

				// Bind the variables and execute the statement
				
				$rc = $stmt->bind_param("ssd", $fname, $lname, $phone);
				
				$this->fname = $fname;
				$this->lname = $lname;
				$this->phone = $phone;
				
				$rc=$stmt->execute();

				// Bind the result and retrieve the data
				
				
				while ($stmt->fetch()) {
					echo $name;
					echo $email;
				}
				exit;

				// And close the statement
				mysqli_stmt_close($stmt);
				
	}
		
}