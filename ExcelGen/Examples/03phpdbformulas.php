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

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once '../Classes/PHPExcel.php';


// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();

//connect to the database 
$host = "localhost";
$user = "root";
$pswd = "";
$dbname = "mtdb_dev";
$con = mysql_connect($host,$user,$pswd) or die("Database Connection Error ".mysql_error());
if(mysql_select_db($dbname,$con)){
	//Database connected
}else{
 echo "Error in Database Name";
}
/* Select query for fetching some information */

$selqry = mysql_query("SELECT * FROM `projectmetrics`"); 

if(mysql_num_rows($selqry)>0){
		$numofrows = mysql_num_rows($selqry);
		//echo "Num rows : ".$numofrows;
		


// Set document properties
echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


// Add some data, we will use some formulas here
echo date('H:i:s') , " Add some data" , EOL;
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Sum:');
$col = {B,C,D,E,F,G,H};
$l=0;
while($row = mysql_fetch_array($selqry)){
		$objPHPExcel->getActiveSheet()->setCellValue($col[$l].'1', <?=$row['project'];?>);
			<td><?=$row['estimated_effort'];?></td>
			<td><?=$row['actual_effort'];?></td>
			<td><?=$row['eff_variance'];?></td>
			<td><?=$row['planned_start'];?></td>
			<td><?=$row['planned_end'];?></td>
			<td><?=$row['actual_start'];?></td>
			<td><?=$row['actual_end'];?></td>
			<td><?=$row['sched_variance'];?></td>
			<td><?=$row['estimated_days'];?></td>
			<td><?=$row['actual_days'];?></td>
			<td><?=$row['days_variance'];?></td>
			<td><?=$row['offshore_dr_comm'];?></td>
			<td><?=$row['offshore_utc_comm'];?></td>
			<td><?=$row['offshore_cr_comm'];?></td>
			<td><?=$row['onshore_dr_comm'];?></td>
			<td><?=$row['onshore_utc_comm'];?></td>
			<td><?=$row['onshore_cr_comm'];?></td>
			<td><?=$row['ut_defects'];?></td>
			<td><?=$row['qa_reqm_defects'];?></td>
			<td><?=$row['qa_design_defects'];?></td>
			<td><?=$row['qa_code_defects'];?></td>
			<td><?=$row['total_defects'];?></td>
			<td><?=$row['defect_density_ut'];?></td>
			<td><?=$row['defect_density_qa'];?></td>
		$l++;
}
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Sum:');

$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Range #1')
                              ->setCellValue('B2', 3)
                              ->setCellValue('B3', 7)
                              ->setCellValue('B4', 13)
                              ->setCellValue('B5', '=SUM(B2:B4)');
echo date('H:i:s') , " Sum of Range #1 is " ,
                     $objPHPExcel->getActiveSheet()->getCell('B5')->getCalculatedValue() , EOL;

$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Range #2')
                              ->setCellValue('C2', 5)
                              ->setCellValue('C3', 11)
                              ->setCellValue('C4', 17)
                              ->setCellValue('C5', '=SUM(C2:C4)');
echo date('H:i:s') , " Sum of Range #2 is " ,
                     $objPHPExcel->getActiveSheet()->getCell('C5')->getCalculatedValue() , EOL;

$objPHPExcel->getActiveSheet()->setCellValue('A7', 'Total of both ranges:');
$objPHPExcel->getActiveSheet()->setCellValue('B7', '=SUM(B5:C5)');
echo date('H:i:s') , " Sum of both Ranges is " ,
                     $objPHPExcel->getActiveSheet()->getCell('B7')->getCalculatedValue() , EOL;

$objPHPExcel->getActiveSheet()->setCellValue('A8', 'Minimum of both ranges:');
$objPHPExcel->getActiveSheet()->setCellValue('B8', '=MIN(B2:C4)');
echo date('H:i:s') , " Minimum value in either Range is " ,
                     $objPHPExcel->getActiveSheet()->getCell('B8')->getCalculatedValue() , EOL;

$objPHPExcel->getActiveSheet()->setCellValue('A9', 'Maximum of both ranges:');
$objPHPExcel->getActiveSheet()->setCellValue('B9', '=MAX(B2:C4)');
echo date('H:i:s') , " Maximum value in either Range is " ,
                     $objPHPExcel->getActiveSheet()->getCell('B9')->getCalculatedValue() , EOL;

$objPHPExcel->getActiveSheet()->setCellValue('A10', 'Average of both ranges:');
$objPHPExcel->getActiveSheet()->setCellValue('B10', '=AVERAGE(B2:C4)');
echo date('H:i:s') , " Average value of both Ranges is " ,
                     $objPHPExcel->getActiveSheet()->getCell('B10')->getCalculatedValue() , EOL;


// Rename worksheet
echo date('H:i:s') , " Rename worksheet" , EOL;
$objPHPExcel->getActiveSheet()->setTitle('Formulas');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;


// Save Excel 95 file
echo date('H:i:s') , " Write to Excel5 format" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " , str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;


// Echo memory peak usage
echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo done
echo date('H:i:s') , " Done writing files" , EOL;
echo 'Files have been created in ' , getcwd() , EOL;
