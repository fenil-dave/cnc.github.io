<?php
	include("../excel/Classes/PHPExcel/IOFactory.php");
	include "../database/connection.php";
	$first = "A";
	$second = "1";

	$phpExcel = new PHPExcel();
	$phpExcel->setActiveSheetIndex(0);

	$sql = "SELECT roll FROM student";
	$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$cell = $first.$second;
    	//echo $cell;
    	$phpExcel->getActiveSheet()->SetCellValue($cell, $row["roll"]);
    	$second++;
    }
}
	$objWriter = new PHPExcel_Writer_Excel2007($phpExcel);
	$objWriter->save("student.xlsx");
	header("Location: index.php?id=2");
?>