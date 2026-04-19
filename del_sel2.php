<?php
	include "connection.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>กำลังลบข้อมูล</title>
</head>

<body>
<?php 
	$sel_id = $_GET['sel_id'];
	
	$sql ="delete from tb_select_rally where sel_id = '$sel_id' ";
	$db_query = mysql_query($sql);
	
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"find_sel_rally.php\"\n";
	echo "</script>\n";
	
?>
</body>
</html>