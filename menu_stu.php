<?php include("connection.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="menu/amazonmenu_stu_tea.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="menu/amazonmenu.js"></script>
<script>

jQuery(function(){
	amazonmenu.init({
		menuid: 'mysidebarmenu'
	})
})

</script>
</head>

<body>
<?php		
	$sql		= "SELECT * FROM tb_log_index";
	$db_query 	= mysql_query($sql);
	$result 	= mysql_fetch_array($db_query);	

	$in_id		= $result['in_id'];	
	$name_in	= $result['name_in'];
	$status_in	= $result['status_in'];
?>
<nav id="mysidebarmenu" class="amazonmenu">
  <ul>
    <a href="files/RallyOnline-stu.pdf" target="_blank"><img src="images/research.gif" width="100%" height="80" align="middle"></a>
    <li><a href="index_stu.php"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/home.png" width="40" height="40" />&nbsp;&nbsp;หน้าแรก</font></a></li>
    <li><a href="profile_stu.php"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/profile.png" width="40" height="40" />&nbsp;&nbsp;ตรวจสอบข้อมูลประจำตัว</font></a></li>
    <li><a href="edit_pro_stu.php"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/edit2.png" width="40" height="40" />&nbsp;&nbsp;แก้ไขข้อมูลประจำตัว</font></a></li>
    <li><a href="find_sel_rally.php"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/report_sel.png" width="40" height="40" />&nbsp;&nbsp;ชุมนุมที่ลงทะเบียนแล้ว</font></a></li>
<?php
	if($status_in == 1)		//เงื่อนไขตรวจสอบสถานะปิดการรับชุมนุม
	{
?>
	<li><a href="sel_rally.php"><font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#009900"><img src="images/open.png" width="40" height="40" />&nbsp;&nbsp;ระบบลงทะเบียนเปิดแล้ว</font></a></li>
<?php
	}else if($status_in == 2)
	{
?>
	<li><a href="#"><font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000"><img src="images/close.png" width="40" height="40" />&nbsp;&nbsp;หมดเวลาลงทะเบียนแล้ว</font></a></li>
<?php
	}
?>
    <li><a href="checklogout_stu.php"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/logout.png" width="40" height="40" />&nbsp;ออกจากระบบ</font></a></li>
  </ul>
</nav>
</body>
</html>