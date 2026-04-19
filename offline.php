<?php include("connection.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php
	$s_id		= $_GET['s_id'];
	$class 		= $_GET['class'];
	$room_stu	= $_GET['room_stu'];
	$status 	= $_GET['status'];
	
	$sql 		= "UPDATE `tb_student` SET `status_stu` = '2' WHERE `s_id` ='$s_id'";
	$db_query 	= mysql_db_query($db,$sql);
	
	echo "<script langquage='javascript'>\n";	
	echo "window.location=\"det_mgt_stu.php?class=$class&room_stu=$room_stu&status=$status\"\n";
	echo "</script>\n";
?>
</body>
</html>