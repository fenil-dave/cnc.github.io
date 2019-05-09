<?php
	session_start();
	session_destroy();
	header("Location: ../include/index.php");
?>