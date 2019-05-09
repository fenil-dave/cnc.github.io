<?php
include "connection.php";
$rn = $_POST['old'];
$rn1 = $_POST["roll"];
if($_POST["shift"] == "select"){
	header("Location: ../include/edit.php?id=1");
}else{

	$sql = "UPDATE `student` SET `roll`='".$_POST["roll"]."',`name`='".$_POST["name"]."',`mobile`='".$_POST["mobile"]."',`shift`='".$_POST["shift"]."',`adate`='".$_POST["date"]."',`comment`='".$_POST["comment"]."' WHERE roll = '".$rn."' ";

if (mysqli_query($conn, $sql)) {
	if ($rn != $rn1) {
		$sql = "RENAME TABLE r".$rn." TO r".$rn1;
		mysqli_query($conn, $sql);	
	}
	header("Location: ../include/index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>