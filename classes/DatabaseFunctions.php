<?php
/*
*	@Project		Provider Appointment System
* 	@File 			Pasfunctions.php
*	@Owner			BSC PMO - healthcare
*	@Description	This class defines all the database and session related functions required for the Application.	 
*/

class DatabaseFunctions{
	
		
	# Defining the database connection required for all other functions in the constructor.
	function __construct(){
		$host = HOSTNAME;
		$user = DBUSER;
		$pswd = DBPASSWD;
		$dbname = DBNAME;
		
		//$this->conn = mysqli_connect($host,$user,$pswd);
		$conn = mysql_connect($host,$user,$pswd);
		mysql_select_db($dbname,$conn);
		
		
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	}
	
	#Function to save the registeration data in members table
	function addmember($name1  ,$relationship1  ,$dateofbirth1  ,$baptism1  ,$confirmation1  ,$married1  ,$marriagedate1  ,$name2  ,$relationship2  ,$dateofbirth2  ,$baptism2  ,$confirmation2  ,$married2  ,$marriagedate2  ,$name3  ,$relationship3  ,$dateofbirth3  ,$baptism3  ,$confirmation3  ,$married3  ,$marriagedate  ,$name4  ,$relationship4  ,$dateofbirth4  ,$baptism4  ,$confirmation4  ,$married4  ,$marriagedate4  ,$name5  ,$relationship5  ,$dateofbirth5  ,$baptism5  ,$confirmation5  ,$married5  ,$marriagedate5  ,$name6  ,$relationship6  ,$dateofbirth6  ,$baptism6  ,$confirmation6  ,$married6  ,$marriagedate6  ,$occupation  ,$address1  ,$address2  ,$city  ,$state  ,$country  ,$zipcode  ,$oaddress1  ,$oaddress2  ,$ocity  ,$ostate  ,$ocountry  ,$ozipcode  ,$telephone  ,$otelephone  ,$mobile  ,$email  ,$pchname  ,$pchaddress  ,$pchperiod  ,$transf  ,$fullmemdetails  ,$contribution){
		
		$status=0;
		$dt = "";
		$last_modified_dt = "";
		$recieved_by = "ITSG";
		$date_pc_approval = "";
		$date_presbyter_approval = "";
		
		
		//$stmt1 = "INSERT INTO `member_master`( `name`, `occupation`, `address1`, `address2`, `city`, `state`, `country`, `zip`, `oaddress1`, `oaddress2`, `ocity`, `ostate`, `ocountry`, `ozip`, `phone`, `ophone`, `mobile`, `email`, `pch_name`, `pch_address`, `pch_period_membership`, `transfer_cert_attached`, `full_member_details`, `contribution_to_church`, `submission_date`, `recieved by`, `date_pc_approval`, `date_presbyter_approval`, `membership_status`, `last_modified_date`) VALUES ('$name1','$occupation','$address1','$address2','$city','$state','$country',$zipcode,'$oaddress1','$oaddress2','$ocity','$ostate','$ocountry',$ozipcode,$telephone,$otelephone,$mobile,'$email','$pchname','$pchaddress','$pchperiod',$transf,'$fullmemdetails','$contribution','$dt','$recieved_by','$date_pc_approval','$date_presbyter_approval',$status,'$last_modified_dt')";
		
		mysql_query("INSERT INTO `member_master`( `name`, `occupation`, `address1`, `address2`, `city`, `state`, `country`, `zip`, `oaddress1`, `oaddress2`, `ocity`, `ostate`, `ocountry`, `ozip`, `phone`, `ophone`, `mobile`, `email`, `pch_name`, `pch_address`, `pch_period_membership`, `transfer_cert_attached`, `full_member_details`, `contribution_to_church`, `submission_date`, `recieved by`, `date_pc_approval`, `date_presbyter_approval`, `membership_status`, `last_modified_date`) VALUES ('$name1','$occupation','$address1','$address2','$city','$state','$country',$zipcode,'$oaddress1','$oaddress2','$ocity','$ostate','$ocountry',$ozipcode,$telephone,$otelephone,$mobile,'$email','$pchname','$pchaddress','$pchperiod',$transf,'$fullmemdetails','$contribution','$dt','$recieved_by','$date_pc_approval','$date_presbyter_approval',$status,'$last_modified_dt')");
				
		$member_id = mysql_insert_id();
		
		
		/*	
		if ( false===$stmt ) {
		  // and since all the following operations need a valid/ready statement object
		  // it doesn't make sense to go on
		  // you might want to use a more sophisticated mechanism than die()
		  // but's it's only an example
		  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
		}
		
		/*
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
		/*$rc = $stmt->execute();
		if ( false===$rc ) {
		  die('execute() failed: ' . htmlspecialchars($stmt->error));
		}	*/	
		
		
		
		$membername1 = $_POST['name1']; 
		$relationship1 = $_POST['relationship1']; 
		$dateofbirth1 = $_POST['dateofbirth1']; 
		$baptism1 = $_POST['baptism1']; 
		$confirmation1 = $_POST['confirmation1']; 
		$married1 = $_POST['married1']; 
		$marriage_date1 = $_POST['marriagedate1']; 
		$image_path1 = $_POST['imgpath1'];		
		
		$stmt2 = "INSERT INTO `member_details`(`member_id`, `membername`, `relationship`, `dateofbirth`, `baptism`, `confirmation`, `married`, `marriage_date`, `image_path`, `status`, `submission_date`, `last_modified_date`) VALUES ($member_id,'$membername1','$relationship1','$dateofbirth1',$baptism1,$confirmation1,$married1,'$marriage_date1','$image_path1',$status,'$dt','$last_modified_dt')";
		
		
		mysql_query($stmt2);
				
		/*
		if ( false===$stmt2 ) {
		  // and since all the following operations need a valid/ready statement object
		  // it doesn't make sense to go on
		  // you might want to use a more sophisticated mechanism than die()
		  // but's it's only an example
		  die('prepare() failed: ' . htmlspecialchars($mysqli->error));
		}
		
		
		$rc1 = $stmt2->bind_param('sssssssssisssi',$fname,$lname,$sex,$email,$add1,$add2,$city,$state,$country,$zip,$dob,$anniversary,$carol,$zero);   // bind $sample to the parameter
		
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

		if ( false===$rc1 ) {
		  // again execute() is useless if you can't bind the parameters. Bail out somehow.
		  die('bind_param() failed: ' . htmlspecialchars($stmt->error));
		}
		
		/* execute prepared statement */
		/*$rc1 = $stmt2->execute();
		if ( false===$rc1 ) {
		  die('execute() failed: ' . htmlspecialchars($stmt->error));
		}	*/	
		
		
		return(true);
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