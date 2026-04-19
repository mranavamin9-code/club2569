<?php
	$db= mysqli_connect("localhost","phrschoolc_nbr","Krubig8972","phrschoolc_nbr") or die("Error: " . mysqli_error($conn));
	mysqli_query($db, "SET NAMES 'utf8' ");
	error_reporting( error_reporting() & ~E_NOTICE );
	date_default_timezone_set('Asia/Bangkok'); 
?>