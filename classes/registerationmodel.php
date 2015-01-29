<?php
ob_start();
require_once("..\config\properties.php");
require_once("DatabaseFunctions.php");

$dbobj = new DatabaseFunctions();
if(isset($_POST['submitreg'])){
		$name1 =  $_POST['name1']; 
		$relationship1 =  $_POST['relationship1']; 
		$dateofbirth1 =  $_POST['dateofbirth1']; 
		$baptism1 =  $_POST['baptism1']; 
		$confirmation1 =  $_POST['confirmation1']; 
		$married1 =  $_POST['married1']; 
		$marriagedate1 =  $_POST['marriagedate1']; 
		$name2 =  $_POST['name2']; 
		$relationship2 =  $_POST['relationship2']; 
		$dateofbirth2 =  $_POST['dateofbirth2']; 
		$baptism2 =  $_POST['baptism2']; 
		$confirmation2 =  $_POST['confirmation2']; 
		$married2 =  $_POST['married2']; 
		$marriagedate2 =  $_POST['marriagedate2']; 
		$name3 =  $_POST['name3']; 
		$relationship3 =  $_POST['relationship3']; 
		$dateofbirth3 =  $_POST['dateofbirth3']; 
		$baptism3 =  $_POST['baptism3']; 
		$confirmation3 =  $_POST['confirmation3']; 
		$married3 =  $_POST['married3']; 
		$marriagedate =  $_POST['marriagedate3']; 
		$name4 =  $_POST['name4']; 
		$relationship4 =  $_POST['relationship4']; 
		$dateofbirth4 =  $_POST['dateofbirth4']; 
		$baptism4 =  $_POST['baptism4']; 
		$confirmation4 =  $_POST['confirmation4']; 
		$married4 =  $_POST['married4']; 
		$marriagedate4 =  $_POST['marriagedate4']; 
		
		$name5 =  $_POST['name5']; 
		$relationship5 =  $_POST['relationship5']; 
		$dateofbirth5 =  $_POST['dateofbirth5']; 
		$baptism5 =  $_POST['baptism5']; 
		$confirmation5 =  $_POST['confirmation5']; 
		$married5 =  $_POST['married5']; 
		$marriagedate5 =  $_POST['marriagedate5']; 
		$name6 =  $_POST['name6']; 
		$relationship6 =  $_POST['relationship6']; 
		$dateofbirth6 =  $_POST['dateofbirth6']; 
		$baptism6 =  $_POST['baptism6']; 
		$confirmation6 =  $_POST['confirmation6']; 
		$married6 =  $_POST['married6']; 
		$marriagedate6 =  $_POST['marriagedate6']; 
		$occupation =  $_POST['occupation']; 
		$address1 =  $_POST['address1']; 
		$address2 =  $_POST['address2']; 
		$city =  $_POST['city']; 
		$state =  $_POST['state']; 
		$country =  $_POST['country']; 
		$zipcode =  $_POST['zipcode']; 
		$oaddress1 =  $_POST['oaddress1']; 
		$oaddress2 =  $_POST['oaddress2']; 
		$ocity =  $_POST['ocity']; 
		$ostate =  $_POST['ostate']; 
		$ocountry =  $_POST['ocountry']; 
		$ozipcode =  $_POST['ozipcode']; 
		$telephone =  $_POST['telephone']; 
		$otelephone =  $_POST['otelephone']; 
		$mobile =  $_POST['mobile']; 
		$email =  $_POST['email']; 
		$pchname =  $_POST['pchname']; 
		$pchaddress =  $_POST['pchaddress']; 
		$pchperiod =  $_POST['pchperiod']; 
		$transf =  $_POST['transf']; 
		$fullmemdetails =  $_POST['fullmemdetails']; 
		$contribution =  $_POST['contribution']; 

	
	$memberadd = $dbobj->addmember($name1  ,$relationship1  ,$dateofbirth1  ,$baptism1  ,$confirmation1  ,$married1  ,$marriagedate1  ,$name2  ,$relationship2  ,$dateofbirth2  ,$baptism2  ,$confirmation2  ,$married2  ,$marriagedate2  ,$name3  ,$relationship3  ,$dateofbirth3  ,$baptism3  ,$confirmation3  ,$married3  ,$marriagedate  ,$name4  ,$relationship4  ,$dateofbirth4  ,$baptism4  ,$confirmation4  ,$married4  ,$marriagedate4  ,$name5  ,$relationship5  ,$dateofbirth5  ,$baptism5  ,$confirmation5  ,$married5  ,$marriagedate5  ,$name6  ,$relationship6  ,$dateofbirth6  ,$baptism6  ,$confirmation6  ,$married6  ,$marriagedate6  ,$occupation  ,$address1  ,$address2  ,$city  ,$state  ,$country  ,$zipcode  ,$oaddress1  ,$oaddress2  ,$ocity  ,$ostate  ,$ocountry  ,$ozipcode  ,$telephone  ,$otelephone  ,$mobile  ,$email  ,$pchname  ,$pchaddress  ,$pchperiod  ,$transf  ,$fullmemdetails  ,$contribution);
	if($memberadd==true){	
		$msg='s';
		header('Location:..\registeration.php?msg='.$msg);
	}else{
		header('Location:..\registeration.php');		
	}
}
?>