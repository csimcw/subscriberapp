<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');
// connection with the database
$host = "localhost";
$user = "root";
$pswd = "";
$dbname = "metricsautomation";
$con = mysql_connect($host,$user,$pswd) or die("Database Connection Error ".mysql_error());
if(mysql_select_db($dbname,$con)){
	//Database connected
}else{
 echo "Error in Database Name";
}


/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE); 
ini_set('display_startup_errors', TRUE); 
date_default_timezone_set('Europe/London');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
// require the PHPExcel file
require_once '../Classes/PHPExcel.php';

//Date function to modify date formats from mm/dd/yy
function mdy2mysql($input) {
  //$output = false;
  /*$d = preg_split('#[-]#', $input);
  if (is_array($d) && count($d) == 3) {
    if (checkdate($d[0], $d[1], $d[2])) {
      $output = "$d[2]/$d[0]/$d[1]";
    }
  }*/
	$date_s=$input;
	$date_s=date("d-M-Y", strtotime($date_s));
	return $date_s;
}


//require_once 'functions.php'; //my functions for data
// simple query
$query = "SELECT project,estimated_effort,actual_effort,eff_variance,planned_start,planned_end,actual_start,actual_end,sched_variance,estimated_days,actual_days,days_variance
offshore_dr_comm,offshore_utc_comm,offshore_cr_comm,onshore_dr_comm,onshore_utc_comm,onshore_cr_comm,ut_defects,qa_reqm_defects,qa_design_defects,qa_code_defects,
total_defects,defect_density_qa FROM projectmetrics";
if ($result = mysql_query($query) or die(mysql_error())) {
// Create a new PHPExcel object
$objPHPExcel = new PHPExcel();
$objPHPExcel->getActiveSheet(0)->setTitle('Project Metrics');
$objPHPExcel->setActiveSheetIndex(0);



$sharedStyle1 = new PHPExcel_Style();
$sharedStyle2 = new PHPExcel_Style();
$sharedStyle1->applyFromArray(
	array('fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('argb' => 'CCBBAACC')
							),
		  'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
							)
		 ));
$sharedStyle2->applyFromArray(
	array('fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('argb' => 'FCCCFACC')
							),
		  'borders' => array(
								'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
								'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
							)
		 ));

$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "D1:N1");
$objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle2, "D9:N9");


// Loop through the result set
$rowNumber = 2;
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Projects');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Estimated Effort');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Actual Effort');
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Variance');
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Planned Start');
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Planned End');
$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Actual Start');
$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Actual End');
$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Variance');
$objPHPExcel->getActiveSheet()->setCellValue('M1', 'Estimated Schedule');
$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Actual Schedule');
while ($row = mysql_fetch_assoc($result)) {
$col = 'D'; //start from column
$ime = $row['project']; //this is data from mysql
$jmbg = $row['estimated_effort']; //this is data from mysql
$grad = $row['actual_effort'];//example my excel formulas
$grad1 = $row['eff_variance'];//example my excel formulas
$grad2 = mdy2mysql($row['planned_start']);//example my excel formulas
$grad3 = mdy2mysql($row['planned_end']);//example my excel formulas
$grad4 = mdy2mysql($row['actual_start']);//example my excel formulas
$grad5 = mdy2mysql($row['actual_end']);//example my excel formulas
$grad6 = $row['sched_variance'];//example my excel formulas
$grad7 = $row['estimated_days'];//example my excel formulas
$grad8 = $row['actual_days'];//example my excel formulas
$rows = array("$ime","$jmbg","$grad","$grad1","$grad2","$grad3","$grad4","$grad5","$grad6","$grad7","$grad8"); //this I create custom array

foreach($rows as $cell) {
$objPHPExcel->getActiveSheet(0)->setCellValue($col.$rowNumber,$cell);
$col++;
}
$rowNumber++;
}
$objPHPExcel->getActiveSheet()->setCellValue('D9', 'TOTAL');
$objPHPExcel->getActiveSheet()->setCellValue('E9', '=SUM(E2:E8)');
$objPHPExcel->getActiveSheet()->setCellValue('F9', '=SUM(F2:F8)');
$objPHPExcel->getActiveSheet()->setCellValue('G9', '=SUM(G2:G8)');
$objPHPExcel->getActiveSheet()->setCellValue('H9', '=Min(H2:H8)');
//$objPHPExcel->getActiveSheet()->setCellValue('I9', '=MIN(I2:I8)');
$objPHPExcel->getActiveSheet()->setCellValue('I9', PHPExcel_Shared_Date::PHPToExcel('=MIN(I2:I8)'));
//$objPHPExcel->getActiveSheet()->getStyle('I9')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATETIME);
$objPHPExcel->getActiveSheet()->setCellValue('J9', '=MIN(J2:J8)');
$objPHPExcel->getActiveSheet()->setCellValue('K9', '=MIN(K2:K8)');
$objPHPExcel->getActiveSheet()->setCellValue('L9', '=SUM(L2:L8)');
$objPHPExcel->getActiveSheet()->setCellValue('M9', '=SUM(M2:M8)');
$objPHPExcel->getActiveSheet()->setCellValue('N9', '=SUM(N2:N8)');
// Save as an Excel BIFF (xls) file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="myFile.xls"');
header('Cache-Control: max-age=0');
$objWriter->save('php://output');
exit();
}

?>