<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2013 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2013 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.9, 2013-06-02
 */
 //error_reporting(0);
 session_start();
function mdy2mysql($input) {  
	$date_s=$input;
	$date_s=date("m/d/Y", strtotime($date_s));
	return $date_s;
}


 
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
// Set timezone
date_default_timezone_set('UTC');

/** PHPExcel */
require_once '../Classes/PHPExcel.php';

// Set value binder
PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

/** PHPExcel_IOFactory */
require_once '../Classes/PHPExcel/IOFactory.php';

//Getting period details for excel generation
if(isset($_GET['per'])){
	$period = $_GET['per'];
	$project = $_GET['proj'];
}


// connection with the database
require_once("..\..\config\properties.php");
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

// simple query
$query = "SELECT * FROM members";
		/*$graphurl = "http://10.226.222.51:85/metrics_automation/graphtest.php?per=".$period;
		$graphrsi =  "http://10.226.222.51:85/metrics_automation/graph_rsi.php?per=".$period;
		$graphsched =  "http://10.226.222.51:85/metrics_automation/graph_schedvar.php?per=".$period;
		$revgraph = "http://10.226.222.51:85/metrics_automation/graph_revieweff.php?per=".$period;*/

if ($result = mysql_query($query) or die(mysql_error())) {
$data = array();
$i=0;
while ($row = mysql_fetch_array($result)) {
$col = 'A'; //start from column

$id = $row['id']; //this is data from mysql
$fname = $row['firstname']; //this is data from mysql
$lname = $row['lastname'];
$gender = $row['gender'];
$email = $row['email'];
$add1 = $row['address1'];
$add2 = $row['address2'];
$city = $row['city'];
$state = $row['state'];
$country = $row['country'];
$zipcode = $row['zipcode'];
$dob = $row['dob'];
$anniversary = $row['anniversary'];
//$carolarea = $row['carolarea'];


$data[$i] = array("id"=>$id,"fname"=>$fname,"lname"=>$lname,"gender"=>$gender,"email"=>$email,"add1"=>$add1,"add2"=>$add2,"city"=>$city,"state"=>$state,"country"=>$country,"zipcode"=>$zipcode,"dob"=>$dob,"anniversary"=>$anniversary); //this I create custom array
$i++;
}

}

	
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("templates/templatemembers.xlsx");

$objPHPExcel->setActiveSheetIndex(0);

$baseRow = 3;
foreach($data as $r => $dataRow) {
	$row = $baseRow + $r;
	$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

	$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $dataRow['id'])
	                              ->setCellValue('B'.$row, $dataRow['fname'])
	                              ->setCellValue('C'.$row, $dataRow['lname'])
								  ->setCellValue('D'.$row, $dataRow['gender'])
	                              ->setCellValue('E'.$row, $dataRow['email'])  
								  ->setCellValue('F'.$row, $dataRow['add1'])
	                              ->setCellValue('G'.$row, $dataRow['add2'])
	                              ->setCellValue('H'.$row, $dataRow['city'])
	                              ->setCellValue('I'.$row, $dataRow['state'])
								  ->setCellValue('J'.$row, $dataRow['country'])
	                              ->setCellValue('K'.$row, $dataRow['zipcode'])
								  ->setCellValue('L'.$row, $dataRow['dob'])
	                              ->setCellValue('M'.$row, $dataRow['anniversary']);								  
}

$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);


//echo date('H:i:s') , " Write to Excel5 format" , EOL;
$generated=date('dmYHis');

header("Content-Type: application/vnd.openxmlformats");
header("Content-Disposition: attachment; filename=\"Members_".$generated.".xlsx\"");
header("Cache-Control: max-age=0");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
ob_clean();
$objWriter->save("php://output");
exit;
//$objWriter->save("C:/xampp/htdocs/metrics_automation/ExcelGen/Examples/proj_metrics_".$period."_".$generated.".xls");

  
 ?>