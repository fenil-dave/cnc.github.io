<?php
	include("../excel/Classes/PHPExcel/IOFactory.php");
	$phpExcel = new PHPExcel();
	$phpExcel->setActiveSheetIndex(0);

    	$phpExcel->getActiveSheet()->SetCellValue(A1, "Name");
    	$phpExcel->getActiveSheet()->SetCellValue(B1, "Mobile");
    	$phpExcel->getActiveSheet()->SetCellValue(C1, "Roll");
    	$phpExcel->getActiveSheet()->SetCellValue(D1, "Date");
    	$phpExcel->getActiveSheet()->SetCellValue(E1, "Shift");


	$objWriter = new PHPExcel_Writer_Excel2007($phpExcel);
	$objWriter->save("new_student.xlsx");
	header("Location: index.php?id=4");
?>