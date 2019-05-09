<?php
	include "../database/connection.php";
	

	if(isset($_POST["import"]))
{

 $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("../excel/Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
   	$name = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $mobile = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $roll = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $date = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $shift = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $query = "INSERT INTO `student`(`roll`, `name`, `mobile`, `shift`, `adate`, `comment`, `extra`) VALUES ('".$roll."','".$name."','".$mobile."','".$shift."','".$date."','','0')";
    mysqli_query($conn, $query);
    $query = "CREATE TABLE IF NOT EXISTS r".$roll." (date VARCHAR(100), shift VARCHAR(100), topic VARCHAR(100))";
    mysqli_query($conn, $query);
   }
  } 
  header("Location: index.php");
 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>