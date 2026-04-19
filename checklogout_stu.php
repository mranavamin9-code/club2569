<?php
	session_start();
	include("connection.php");
	session_destroy(); // ลบ Session ทั้งหมด
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>กำลังออกจากระบบ</title>
</head>

<body>
<?php
	echo "<script langquage='javascript'>\n";
	echo "window.location=\"login_stu.php\"\n";	//กำหนดให้กลับไปยังหน้าหลักอีกครั้ง
	echo "</script>\n";
?>
</body>
</html>