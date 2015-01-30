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
}


// connection with the database
include("../../config.php");
//require '..\..\PHPMailer\class.phpmailer.php';
if(mysql_select_db($dbname,$con)){
	//Database connected
}else{
 echo "Error in Database Name";
}

// simple query
if(isset($period)){
$query = "SELECT project,estimated_effort,actual_effort,eff_variance,planned_start,planned_end,actual_start,actual_end,sched_variance,estimated_days,actual_days,days_variance,
offshore_dr_comm,offshore_utc_comm,offshore_cr_comm,onshore_dr_comm,onshore_utc_comm,onshore_cr_comm,ut_defects,qa_reqm_defects,qa_design_defects,qa_code_defects,
total_defects,defectdensity FROM projectmetrics where monthyear = $period and status=1";
		/*$graphurl = "http://10.226.222.51:85/metrics_automation/graphtest.php?per=".$period;
		$graphrsi =  "http://10.226.222.51:85/metrics_automation/graph_rsi.php?per=".$period;
		$graphsched =  "http://10.226.222.51:85/metrics_automation/graph_schedvar.php?per=".$period;
		$revgraph = "http://10.226.222.51:85/metrics_automation/graph_revieweff.php?per=".$period;*/

}
if ($result = mysql_query($query) or die(mysql_error())) {
$data = array();
$i=0;
while ($row = mysql_fetch_array($result)) {
$col = 'D'; //start from column
$ime = $row['project']; //this is data from mysql
$jmbg = $row['estimated_effort']; //this is data from mysql
$grad = $row['actual_effort'];//example my excel formulas
$grad1 = $row['eff_variance'];//example my excel formulas
$grad2 = ($row['planned_start']);//example my excel formulas
$grad3 = ($row['planned_end']);//example my excel formulas
$grad4 = ($row['actual_start']);//example my excel formulas
$grad5 = ($row['actual_end']);//example my excel formulas
$grad6 = $row['sched_variance'];//example my excel formulas
$grad7 = $row['estimated_days'];//example my excel formulas
$grad8 = $row['actual_days'];//example my excel formulas
$grad9 = $row['offshore_dr_comm'];//example my excel formulas
$grad10 = $row['offshore_utc_comm'];//example my excel formulas
$grad11 = $row['offshore_cr_comm'];//example my excel formulas
$grad12 = $row['onshore_dr_comm'];//example my excel formulas
$grad13 = $row['onshore_utc_comm'];//example my excel formulas
$grad14 = $row['onshore_cr_comm'];//example my excel formulas
$grad15 = $row['ut_defects'];//example my excel formulas
$grad16 = $row['qa_reqm_defects'];//example my excel formulas
$grad17 = $row['qa_design_defects'];//example my excel formulas
$grad18 = $row['qa_code_defects'];//example my excel formulas
$grad19 = $row['days_variance'];

$data[$i] = array("ime"=>$ime,"jmbg"=>$jmbg,"grad"=>$grad,"grad1"=>$grad1,"grad2"=>$grad2,"grad3"=>$grad3,"grad4"=>$grad4,"grad5"=>$grad5,"grad6"=>$grad6,"grad7"=>$grad7,"grad8"=>$grad8,
"grad9"=>$grad9,"grad10"=>$grad10,"grad11"=>$grad11,"grad12"=>$grad12,"grad13"=>$grad13,"grad14"=>$grad14,"grad15"=>$grad15,"grad16"=>$grad16,"grad17"=>$grad17,"grad18"=>$grad18,"grad19"=>$grad19); //this I create custom array
$i++;
}

}

$reqqry = mysql_query("SELECT SUM(initial) as init,SUM(added) as aded,SUM(deleted) as deltd,SUM(changed) as chngd, SUM(npostshipdefects) as postshipdef, SUM(npostproddefects) as postproddef FROM `projectmetrics` where monthyear=$period and status=1");
	$row = mysql_fetch_assoc($reqqry);
	$db_init = $row['init'];
    $db_added = $row['aded'];
	$db_deleted = $row['deltd'];
	$db_changed = $row['chngd'];
	$db_postshipdef = $row['postshipdef'];
	$db_postproddef = $row['postproddef'];
	echo $db_postshipdef. " ".$db_postproddef;
	



$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load("templates/30projtemplate.xlsx");

$objPHPExcel->setActiveSheetIndex(0);
//$objPHPExcel->getActiveSheet()->setCellValue('D1', PHPExcel_Shared_Date::PHPToExcel(time()));

$baseRow = 10;
foreach($data as $r => $dataRow) {
	$row = $baseRow + $r;
	$objPHPExcel->getActiveSheet()->insertNewRowBefore($row,1);

	$objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $dataRow['ime'])
	                              ->setCellValue('B'.$row, $dataRow['jmbg'])
	                              ->setCellValue('C'.$row, $dataRow['grad'])
								  ->setCellValue('D'.$row, $dataRow['grad1'])
	                              ->setCellValue('D'.$row, "=((C$row) - (B$row))/(B$row)")
								  ->setCellValue('E'.$row, $dataRow['grad2'])
	                              ->setCellValue('F'.$row, $dataRow['grad3'])
	                              ->setCellValue('G'.$row, $dataRow['grad4'])
	                              ->setCellValue('H'.$row, $dataRow['grad5'])
								  ->setCellValue('I'.$row, $dataRow['grad6'])
	                              ->setCellValue('I'.$row, "=((H$row) - (F$row))/((F$row) - (E$row))")
								  ->setCellValue('J'.$row, $dataRow['grad7'])
	                              ->setCellValue('K'.$row, $dataRow['grad8'])
								  ->setCellValue('L'.$row, "=(K$row-J$row)/(J$row)")
	                              //->setCellValue('L'.$row, $dataRow['grad19'])
	                              ->setCellValue('M'.$row, $dataRow['grad9'])
	                              ->setCellValue('N'.$row, $dataRow['grad10'])
								  ->setCellValue('O'.$row, $dataRow['grad11'])
	                              ->setCellValue('P'.$row, $dataRow['grad12'])
	                              ->setCellValue('Q'.$row, $dataRow['grad13'])
	                              ->setCellValue('R'.$row, $dataRow['grad14'])
	                              ->setCellValue('S'.$row, $dataRow['grad15'])
								  ->setCellValue('T'.$row, $dataRow['grad16'])
	                              ->setCellValue('U'.$row, $dataRow['grad17'])
	                              ->setCellValue('V'.$row, $dataRow['grad18'])
	                              ->setCellValue('W'.$row, "=SUM(M$row:V$row)")
	                              ->setCellValue('X'.$row, "=(W$row)/(C$row)")
								  ->setCellValue('J4', $db_init)
								  ->setCellValue('L4', $db_added)
								  ->setCellValue('N4', $db_deleted)
								  ->setCellValue('P4', $db_changed);								  
								  //->setCellValue('M27', "=(((M24)/(M24+M25+M26))*100)");
}
	//->setCellValue('Z10', $db_postshipdef)
								  //->setCellValue('Z11', $db_postproddef);
	$objPHPExcel->getActiveSheet()->setCellValue('AY10', $db_postshipdef);
	$objPHPExcel->getActiveSheet()->setCellValue('AZ10', $db_postproddef);                      
	//$objPHPExcel->getActiveSheet()->setCellValue('M29', "=(((M26)/(M26+M27+M28))*100)");

$objPHPExcel->getActiveSheet()->removeRow($baseRow-1,1);


$generated=date('dmYHis');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objPHPExcel->getActiveSheet()->setTitle('Project Metric Information');



if(isset($period)){

# CHART 1

$selqry = mysql_query("select project, defectdensity from projectmetrics where monthyear = $period");
$lbl = array('Projects','DefectDensity','Benchmark');
while($row=mysql_fetch_array($selqry)){	
	$projects[] = $row['project'];
	$density[] = $row['defectdensity'];
	$bench[] = 0.19;
}

 $ar = array();
 $ar[0]=$lbl;
 for($i=0;$i<sizeof($projects);$i++){
	$ar[$i+1] = array($projects[$i],$density[$i],$bench[$i]);
 }

// Add some data to the second sheet, resembling some different data types

$objPHPExcel->createSheet(1);
$objPHPExcel->setActiveSheetIndex(1);
$objWorksheet = $objPHPExcel->getActiveSheet();

$objWorksheet->fromArray($ar);
$dataseriesLabels = array(
	new PHPExcel_Chart_DataSeriesValues('String', 'DefectDensity!$B$1', NULL, 1),	//	2010
	new PHPExcel_Chart_DataSeriesValues('String', 'DefectDensity!$C$1', NULL, 1),	//	2011
	//new PHPExcel_Chart_DataSeriesValues('String', 'DefectDensity!$D$1', NULL, 1),	//	2012
);

$objPHPExcel->getActiveSheet()->getStyle('A1:c1')->getFill()->applyFromArray(
    array(
        'type'       => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array('rgb' => '0082DE'),
    )
);

$xAxisTickValues = array(
	new PHPExcel_Chart_DataSeriesValues('String', 'DefectDensity!$A$2:$A$10', NULL, 9),	//	Q1 to Q4
);

$dataSeriesValues = array(
	new PHPExcel_Chart_DataSeriesValues('Number', 'DefectDensity!$B$2:$B$10', NULL, 9),
	new PHPExcel_Chart_DataSeriesValues('Number', 'DefectDensity!$C$2:$C$10', NULL, 9),
	//new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$D$2:$D$5', NULL, 4),
);

//	Build the dataseries
$series = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_BARCHART,		// plotType
	PHPExcel_Chart_DataSeries::GROUPING_STANDARD,	// plotGrouping
	range(0, count($dataSeriesValues)-1),			// plotOrder
	$dataseriesLabels,								// plotLabel
	$xAxisTickValues,								// plotCategory
	$dataSeriesValues								// plotValues
);
//	Set additional dataseries parameters
//		Make it a vertical column rather than a horizontal bar graph
$series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);

//	Set the series in the plot area
$plotarea = new PHPExcel_Chart_PlotArea(NULL, array($series));
//	Set the chart legend
$legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);

$title = new PHPExcel_Chart_Title('Defect Density Chart');
$yAxisLabel = new PHPExcel_Chart_Title('Defect Density(%)');
$xAxisLabel = new PHPExcel_Chart_Title('Projects');


//	Create the chart
$chart = new PHPExcel_Chart(
	'chart1',		// name
	$title,			// title
	$legend,		// legend
	$plotarea,		// plotArea
	true,			// plotVisibleOnly
	0,				// displayBlanksAs
	$xAxisLabel,			// xAxisLabel
	$yAxisLabel		// yAxisLabel
);

//	Set the position where the chart should appear in the worksheet
$chart->setTopLeftPosition('F1');
$chart->setBottomRightPosition('M13');

//	Add the chart to the worksheet
$objWorksheet->addChart($chart);

$objPHPExcel->getActiveSheet()->setTitle('DefectDensity');


# CHART 2

$selqry1 = mysql_query("select project,rsi from projectmetrics where monthyear = $period");
$lbl1 = array('Projects','RSI','Benchmark');
while($row1=mysql_fetch_array($selqry1)){
	$projects1[] = $row1['project'];
	$rsi[] = $row1['rsi'];
	$bench1[] = 1.13;
} 
 
 $ar1 = array();
 $ar1[0]=$lbl1;
 for($j=0;$j<sizeof($projects1);$j++){
	$ar1[$j+1] = array($projects1[$j],$rsi[$j],$bench1[$j]);
 }
// Add some data to the second sheet, resembling some different data types

$objPHPExcel->createSheet(1);
$objPHPExcel->setActiveSheetIndex(1);
$objWorksheet = $objPHPExcel->getActiveSheet();

$objWorksheet->fromArray($ar1);
$dataseriesLabels1 = array(
	new PHPExcel_Chart_DataSeriesValues('String', 'RSI!$B$1', NULL, 1),	//	2010
	new PHPExcel_Chart_DataSeriesValues('String', 'RSI!$C$1', NULL, 1),	//	2011
	//new PHPExcel_Chart_DataSeriesValues('String', 'RSI!$D$1', NULL, 1),	//	2012
	
);
//$objPHPExcel->getActiveSheet()->getStyle('B$1:C$1')->getFill()->getStartColor()->setRGB('FFFFFF');
$objPHPExcel->getActiveSheet()->getStyle('A1:c1')->getFill()->applyFromArray(
    array(
        'type'       => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array('rgb' => '0082DE'),
    )
);

$xAxisTickValues1 = array(
	new PHPExcel_Chart_DataSeriesValues('String', 'RSI!$A$2:$A$10', NULL, 9),	//	Q1 to Q4
);

$dataSeriesValues1 = array(
	new PHPExcel_Chart_DataSeriesValues('Number', 'RSI!$B$2:$B$10', NULL, 9),
	new PHPExcel_Chart_DataSeriesValues('Number', 'RSI!$C$2:$C$10', NULL, 9),
	//new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$D$2:$D$5', NULL, 4),
);

//	Build the dataseries
$series1 = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_BARCHART,		// plotType
	PHPExcel_Chart_DataSeries::GROUPING_STANDARD,	// plotGrouping
	range(0, count($dataSeriesValues1)-1),			// plotOrder
	$dataseriesLabels1,								// plotLabel
	$xAxisTickValues1,								// plotCategory
	$dataSeriesValues1								// plotValues
);
//	Set additional dataseries parameters
//		Make it a vertical column rather than a horizontal bar graph
$series1->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);

//	Set the series in the plot area
$plotarea1 = new PHPExcel_Chart_PlotArea(NULL, array($series1));
//	Set the chart legend
$legend1 = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);

$title1 = new PHPExcel_Chart_Title('RSI Chart');
$yAxisLabel1 = new PHPExcel_Chart_Title('RSI(%)');
$xAxisLabel1 = new PHPExcel_Chart_Title('Projects');


//	Create the chart
$chart1 = new PHPExcel_Chart(
	'chart2',		// name
	$title1,			// title
	$legend1,		// legend
	$plotarea1,		// plotArea
	true,			// plotVisibleOnly
	0,				// displayBlanksAs
	$xAxisLabel1,			// xAxisLabel
	$yAxisLabel1		// yAxisLabel
);

//	Set the position where the chart should appear in the worksheet
$chart1->setTopLeftPosition('F1');
$chart1->setBottomRightPosition('M13');

//	Add the chart to the worksheet
$objWorksheet->addChart($chart1);

$objPHPExcel->getActiveSheet()->setTitle('RSI');

# CHART 3
$selqry2 = mysql_query("SELECT AVG(`sched_variance`) as sv FROM  `projectmetrics` WHERE monthyear = $period");
$lbl2 = array('Schedule Variance','Calc. Metrics','Benchmark');
	while($rowsched=mysql_fetch_array($selqry2)){
		$xaxis = "Schedule Variance";
		$schedvar[] = $rowsched['sv'];	
		$bench2[] = 3.31;
	} 
 
 
 $ar2 = array();
 $ar2[0]=$lbl2;
 $ar2[1] = array($xaxis,$schedvar[0],$bench2[0]);
 
// Add some data to the second sheet, resembling some different data types

$objPHPExcel->createSheet(1);
$objPHPExcel->setActiveSheetIndex(1);
$objWorksheet = $objPHPExcel->getActiveSheet();




$objWorksheet->fromArray($ar2);
$dataseriesLabels2 = array(
	new PHPExcel_Chart_DataSeriesValues('String', 'SchedVariance!$B$1', NULL, 1),	//	2010
	new PHPExcel_Chart_DataSeriesValues('String', 'SchedVariance!$C$1', NULL, 1),	//	2011
	//new PHPExcel_Chart_DataSeriesValues('String', 'SchedVariance!$D$1', NULL, 1),	//	2012
	
);
//$objPHPExcel->getActiveSheet()->getStyle('B$1:C$1')->getFill()->getStartColor()->setRGB('FFFFFF');
$objPHPExcel->getActiveSheet()->getStyle('A1:c1')->getFill()->applyFromArray(
    array(
        'type'       => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array('rgb' => '0082DE'),
    )
);

$xAxisTickValues2 = array(
	new PHPExcel_Chart_DataSeriesValues('String', 'SchedVariance!$A$2:$A$5', NULL, 4),	//	Q1 to Q4
);

$dataSeriesValues2 = array(
	new PHPExcel_Chart_DataSeriesValues('Number', 'SchedVariance!$B$2:$B$5', NULL, 4),
	new PHPExcel_Chart_DataSeriesValues('Number', 'SchedVariance!$C$2:$C$5', NULL, 4),
	//new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$D$2:$D$5', NULL, 4),
);

//	Build the dataseries
$series2 = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_BARCHART,		// plotType
	PHPExcel_Chart_DataSeries::GROUPING_STANDARD,	// plotGrouping
	range(0, count($dataSeriesValues2)-1),			// plotOrder
	$dataseriesLabels2,								// plotLabel
	$xAxisTickValues2,								// plotCategory
	$dataSeriesValues2								// plotValues
);
//	Set additional dataseries parameters
//		Make it a vertical column rather than a horizontal bar graph
$series2->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);

//	Set the series in the plot area
$plotarea2 = new PHPExcel_Chart_PlotArea(NULL, array($series2));
//	Set the chart legend
$legend2 = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);

$title2 = new PHPExcel_Chart_Title('Schedule Variance Chart');
  
$yAxisLabel2 = new PHPExcel_Chart_Title('Schedule Variance(%)');
//$xAxisLabel2 = new PHPExcel_Chart_Title('');


//	Create the chart
$chart2 = new PHPExcel_Chart(
	'chart2',		// name
	$title2,			// title
	$legend2,		// legend
	$plotarea2,		// plotArea
	true,			// plotVisibleOnly
	0,				// displayBlanksAs
	null,			// xAxisLabel
	$yAxisLabel2		// yAxisLabel
);

//	Set the position where the chart should appear in the worksheet
$chart2->setTopLeftPosition('F1');
$chart2->setBottomRightPosition('M13');

//	Add the chart to the worksheet
$objWorksheet->addChart($chart2);

$objPHPExcel->getActiveSheet()->setTitle('SchedVariance');

# CHART 4

 $selqry3 = mysql_query("SELECT SUM(  `offshore_dr_comm` ) AS odr, SUM(  `offshore_utc_comm` ) AS outc, SUM(  `onshore_dr_comm` ) AS ondr, SUM(  `onshore_utc_comm` ) AS onutc, SUM(  `qa_design_defects` ) AS qa_des_def, SUM(  `offshore_cr_comm` ) AS ofcr, SUM(  `onshore_cr_comm` ) AS oncr, SUM(  `qa_code_defects` ) AS qacodedef, SUM(`npostshipdefects`) AS postship, SUM(`npostproddefects`) AS postprod, SUM(`ut_defects`) as utdef, SUM(`qa_reqm_defects`) as qareqdef
FROM  `projectmetrics` WHERE monthyear = $period");
	while($rowsched=mysql_fetch_array($selqry3)){
		$offdrc = $rowsched['odr'];
		$offutc = $rowsched['outc'];
		$ondrc = $rowsched['ondr'];
		$onutc = $rowsched['onutc'];
		$qadesdef = $rowsched['qa_des_def'];
		$ofcr = $rowsched['ofcr'];
		$oncr = $rowsched['oncr'];
		$qacodedef = $rowsched['qacodedef'];		
		$utdef = $rowsched['utdef'];
		$qareqdef = $rowsched['qareqdef'];
		
		$postship = $rowsched['postship'];
		$postprod = $rowsched['postprod'];
		
		
		$design_review_efficiency = (($offdrc+$offutc+$ondrc+$onutc)/($qadesdef+$offdrc+$offutc+$ondrc+$onutc))*100;
		$code_review_efficiency = (($ofcr+$oncr)/$qacodedef)*100;		
		$totdefs = $offdrc+$offutc+$ondrc+$onutc+$ofcr+$oncr+$utdef+$qadesdef+$qacodedef+$qareqdef;
		$defect_removal_efficiency = (($totdefs)/($totdefs+$postship+$postprod))*100;		
	}

$arr11[0] = 'Code Rev. Efficiency';
$arr11[1] = 'Defect Rem. Efficiency';
$arr11[2] = 'Desgn Rev. Efficiency';
$arr12[0] = round($code_review_efficiency,3);
$arr12[1] = round($defect_removal_efficiency,3);	
$arr12[2] = round($design_review_efficiency,3);	
$bench3[0] = 87.00;
$bench3[1] = 87.00;
$bench3[2] = 92.00;
 
 $lbl3 = array('Efficiency','Calc. Metrics','Benchmark');
 
 $ar3 = array();
 $ar3[0]=$lbl3;
  for($k=0;$k<sizeof($arr11);$k++){
	$ar3[$k+1] = array($arr11[$k],$arr12[$k],$bench3[$k]);
 } 
 
// Add some data to the second sheet, resembling some different data types

$objPHPExcel->createSheet(1);
$objPHPExcel->setActiveSheetIndex(1);
$objWorksheet = $objPHPExcel->getActiveSheet();




$objWorksheet->fromArray($ar3);
$dataseriesLabels3 = array(
	new PHPExcel_Chart_DataSeriesValues('String', 'ReviewEfficiency!$B$1', NULL, 1),	//	2010
	new PHPExcel_Chart_DataSeriesValues('String', 'ReviewEfficiency!$C$1', NULL, 1),	//	2011
	//new PHPExcel_Chart_DataSeriesValues('String', 'SchedVariance!$D$1', NULL, 1),	//	2012
	
);
//$objPHPExcel->getActiveSheet()->getStyle('B$1:C$1')->getFill()->getStartColor()->setRGB('FFFFFF');
$objPHPExcel->getActiveSheet()->getStyle('A1:c1')->getFill()->applyFromArray(
    array(
        'type'       => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array('rgb' => '0082DE'),
    )
);

$xAxisTickValues3 = array(
	new PHPExcel_Chart_DataSeriesValues('String', 'ReviewEfficiency!$A$2:$A$5', NULL, 4),	//	Q1 to Q4
);

$dataSeriesValues3 = array(
	new PHPExcel_Chart_DataSeriesValues('Number', 'ReviewEfficiency!$B$2:$B$5', NULL, 4),
	new PHPExcel_Chart_DataSeriesValues('Number', 'ReviewEfficiency!$C$2:$C$5', NULL, 4),
	//new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$D$2:$D$5', NULL, 4),
);

//	Build the dataseries
$series3 = new PHPExcel_Chart_DataSeries(
	PHPExcel_Chart_DataSeries::TYPE_BARCHART,		// plotType
	PHPExcel_Chart_DataSeries::GROUPING_STANDARD,	// plotGrouping
	range(0, count($dataSeriesValues3)-1),			// plotOrder
	$dataseriesLabels3,								// plotLabel
	$xAxisTickValues3,								// plotCategory
	$dataSeriesValues3								// plotValues
);
//	Set additional dataseries parameters
//		Make it a vertical column rather than a horizontal bar graph
$series3->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);

//	Set the series in the plot area
$plotarea3 = new PHPExcel_Chart_PlotArea(NULL, array($series3));
//	Set the chart legend
$legend3 = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);

$title3 = new PHPExcel_Chart_Title('Review Efficiency Chart');
$yAxisLabel3 = new PHPExcel_Chart_Title('Review Efficiency(%)');
//$xAxisLabel2 = new PHPExcel_Chart_Title('');


//	Create the chart
$chart3 = new PHPExcel_Chart(
	'chart3',		// name
	$title3,			// title
	$legend3,		// legend
	$plotarea3,		// plotArea
	true,			// plotVisibleOnly
	0,				// displayBlanksAs
	null,			// xAxisLabel
	$yAxisLabel3		// yAxisLabel
);

//	Set the position where the chart should appear in the worksheet
$chart3->setTopLeftPosition('F1');
$chart3->setBottomRightPosition('M13');

//	Add the chart to the worksheet
$objWorksheet->addChart($chart3);

$objPHPExcel->getActiveSheet()->setTitle('ReviewEfficiency');

$objPHPExcel->setActiveSheetIndex(0);

header("Content-Type: application/vnd.openxmlformats");
header("Content-Disposition: attachment; filename=\"".$period."_".$generated.".xlsx\"");
header("Cache-Control: max-age=0");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->setIncludeCharts(TRUE);
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
ob_clean();
$objWriter->save("php://output");
exit;
}
 
  
 
 ?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Healthcare Metrics Automation</title>
<link href="../../css/home.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script src="../../js/custom.js" type="text/javascript" ></script>
<script src="../../js/login.js" type="text/javascript" ></script>
<style>
	#pghead{
		padding:0px;
		font-size:20px;
	}
	.content{
		padding-top:30px;
		border-radius
	}
	#menus{
		padding:30px;
	}
	.contentContainer{
		margin-left:20px;
		min-height:400px;
	}
	.cont{
		font-size:16px;
		color:#0082DE;		
	}
	#pghead1{
		padding:10px;
		font-size:22px;
		color:#0082DE;
	}
	.content{
		margin-top:40px;
		padding-top:30px;		
	}
	#menus{
		padding:30px;
	}
	.contentContainer{
		margin-left:0px;
		width:1020px;
		min-height:550px;
	}
	/* MAIN NAVIGATION 
	-------------------------*/
	#nav{ 
		float: right;
		width: 600px;
		height: 25px;
		padding-bottom: 80px;
		margin: 0px;
	}

	#nav ul {
		list-style: none;
		padding: 0px;
		margin: 0px;
	}

	#nav ul li {
		float: right;
		width: auto;
		padding: 0px;
		margin: 0px;
	}

	#nav a {
		display: block;
		width: auto;
		height: 25px;
		background-color: #fbfbfb;
		font-family: arial, helvetica, sans-serif;
		font-size: 1.2em;
		line-height: 25px;
		font-weight: bold;
		color: #bbb;
		text-decoration: none;
		padding: 0 35px 0 0;
		margin: 0px;
	}

	#nav ul li a:hover {
		color: #000;
	}


	/* DROPDOWN MENU - MAIN NAVIGATION
	-------------------------------------- */
	#nav li ul { 
		width: 200px;
		position: absolute;
			left: -999em; /* using left instead of display to hide menus because display: none isn't read by screen readers */
		background-color: #fff;
	}

	#nav li ul li a {
		width: 130px;
		height: 20px;
		font-weight: normal;
		background-color: #fff;
		border-bottom: 1px solid #ccc;	
		text-align:center;	
	}

	#nav li:hover ul, #nav li.sfhover ul { /* javascript IE fix */
		left: auto;
		width: 200px;
	}


	</style>
	<script type="text/javascript">
		sfHover = function() {
			var sfEls = document.getElementById("nav").getElementsByTagName("LI");
			for (var i=0; i<sfEls.length; i++) {
				sfEls[i].onmouseover=function() {
					this.className+=" sfhover";
				}
				sfEls[i].onmouseout=function() {
					this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
				}
			}
		}
		if (window.attachEvent) window.attachEvent("onload", sfHover);
	</script>
</head>
<body>
<div class="wrapper">
	<div class="header">
		<div class="hrline"></div>		
			<div class="hrlineBottom"></div>
		<div class="centerAlign">
			<p id="pghead">Healthcare Metrics Automation</p>
		</div>
			
	</div>	
	<div class="centerAlign">		
		<div class="content">
			<div class="contentContainer">
			<div id="nav">
			  <ul>
				<li><a href="http://10.226.222.51:85/metrics_automation/Logout.php">Logout</a></li>				
				<li><a href="http://10.226.222.51:85/metrics_automation/reports.php">Back to Reports</a></li>								
			  </ul>
			</div>
			<div style="clear:both;"></div>
		<?php
				echo '<p class="cont">The Excel file has been successully generated.</p>';
				echo '<p class="cont">File  <strong>proj_metrics_', $period,'_',$generated ,'.xls </strong> has been created in ' , getcwd() , '</p>';	
				if(isset($msg)){ echo $msg; }
		?>
			</div>
		</div>
	</div>
	<div class="footer">
	<div class="centerAlign">
		<hr />
		<span>&copy; Healthcare Cognizant. All rights reserved. </span>
	</div>
  </div>
</div>
</body>
</html>