<?php include "connection.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>กำลังลบข้อมูล</title>
</head>

<body>
<?php 
	$d_id		= $_GET['d_id'];
	$id	 		= $_GET['id'];
	$namedep	= $_GET['namedep'];
	$ty 		= $_GET['ty'];
	$class_stu	= $_GET['class_stu'];
	$status 	= $_GET['status'];
	
	$sql 		= "delete from tb_department where d_id = '$d_id' ";
	$db_query	= mysql_query($sql);
?>
<meta http-equiv=refresh content=1;URL=find_dep.php?id=<?=$id?>&namedep=<?=$namedep?>&ty=<?=$ty?>&class_stu=<?=$class_stu?>&status=<?=$status?>>
</body>
</html>