<?php
	include "connection.php";

	session_start();
	$date = $_SESSION['date'];
	$date1 = explode('/', $date);
	$shift = $_SESSION['shift'];
	echo $_SESSION['count'];
	if ($_SESSION['count'] == 0) {
		$sql = "SELECT cdate, total FROM month WHERE year = '".$date1[2]."' AND month = '".$date1[0]."'";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
 		   while($row = mysqli_fetch_assoc($result)) {
        		if ($row["cdate"] != $date) {
        				$_SESSION['count'] = 1;
        				$total = $row["total"];
        				$total = $total + 1;
        				$dbdate =$row["cdate"];
						$sql = "UPDATE month SET cdate = '".$date."', total = '".$total."' WHERE cdate = '".$dbdate."'";
						mysqli_query($conn, $sql);        			
        		}
        }
}else{
	echo $sql = "INSERT INTO month (year, month, total, cdate) VALUES ('".$date1[2]."', '".$date1[0]."', '1', '$date')";
    mysqli_query($conn, $sql);
}

	}

	$sql = "INSERT INTO r".$_POST['roll']." (date, shift, topic) VALUES ('".$date."', '".$shift."', '".$_POST['topic']."')";
	if(mysqli_query($conn, $sql)){
		$sql = "SELECT comment FROM student WHERE roll = '".$_POST['roll']."'";
		$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        	$comment = $row["comment"];
        }
}
		if($comment != ''){
			include "comment.php";
		}
		else{
			header("Location: ../include/index.php");
		}
	}else{
		header("Location: ../include/index.php?id=1");
	}

?>