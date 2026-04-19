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
	$s_id = $_GET['s_id'];
	
	$sql ="delete from tb_student where s_id = '$s_id' ";
	$db_query = mysql_query($sql);

	//โค้ดลิงค์กลับมาหน้าหลัก
	mysql_close();
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"find_stu.php\"\n";
	echo "</script>\n";
?>
</body>
</html>