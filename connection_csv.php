<?php
	$objConnect = mysql_connect("localhost","phrschoolc_nbr","Krubig8972") or die("Error Connect to Database"); // Conect to MySQL
	$objDB 	= mysql_select_db("phrschoolc_nbr");
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET NAMES TIS620");	//ภาษาใช่อัพไฟล์
?>