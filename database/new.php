<?php
	include "connection.php";
    if($_POST["shift"] == "select"){
    header("Location: ../include/new.php?id=1");
}else{

	$extra = 0;
	$date1 = $_POST['adate'];
	$date = explode('/', $date1); 

	$sql = "SELECT total FROM month WHERE year = '".$date[2]."' AND month = '".$date[0]."'";
	$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        	$extra = $row["total"];
        }
} else {
    $sql = "INSERT INTO month (year, month, total, cdate) VALUES ('".$date[2]."', '".$date[0]."', '0', '')";
    mysqli_query($conn, $sql);
}



	$sql = "INSERT INTO student (roll, name, mobile, shift, adate, comment, extra)
VALUES ('$_POST[roll]', '$_POST[name]','$_POST[mob]','$_POST[shift]','$_POST[adate]','$_POST[comment]', ".$extra.")";

if (mysqli_query($conn, $sql)) {
   $sql = "CREATE TABLE IF NOT EXISTS r".$_POST['roll']." (date VARCHAR(100), shift VARCHAR(100), topic VARCHAR(100))";
   mysqli_query($conn, $sql);
   header("Location: ../include/index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>