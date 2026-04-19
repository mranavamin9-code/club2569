<?php include("connection.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ตรวจสอบ user ไม่ให้ซ้ำกัน</title>
</head>

<body>
<?php
	$strStu_id = trim($_POST["tStu_id"]);

	if(trim($strStu_id) == "")
	{
		echo "<img src='images/false.png'>";
		exit();
	}

	//*** Check Username (already exists) ***//

	$strSQL = "SELECT * FROM tb_student WHERE stu_id = '".$strStu_id."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
		echo '<font size="2" color="#FF0000" face="MS Sans Serif, Tahoma, sans-serif">';
		echo "<img src='images/false.png'> รหัสประจำตัวนี้มีอยู่ในระบบแล้ว";
		echo '</font>';
	}
	else
	{
		echo '<font size="2" color="#33CC00" face="MS Sans Serif, Tahoma, sans-serif">';
		echo "<img src='images/true.png'> รหัสประจำตัวนี้ยังไม่เคยถูกบันทึกข้อมูล สามารถใช้ได้";
		echo '</font>';
	}
?>
</body>
</html>