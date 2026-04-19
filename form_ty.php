<?php
	session_start();
	include("connection.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ฟอร์มเพิ่มข้อมูลปีการศึกษา</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" type="text/css" href="style/style.css">

<script type="text/javascript">
function count(){		//ชื่อฟังก์ชั่น
var getE = document.getElementById("year");	//ชื่อ id ของ textbox
var num = getE.value.length;
	if(num < 4){
		alert("กรุณาระบุปี พ.ศ. ให้ครบถ้วน");
	}	
}
</script>
</head>

<body>
<?php
	// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 3)
	{
?>
<br>
<form name="form_add" method="post" action="save_ty.php">
<table width="95%" border="0"  align="center" cellpadding="0" bgcolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td height="36" colspan="2" align="center" valign="middle" bgcolor="#3399FF"><font size="5" color="#FFFFFF" face="MS Sans Serif, Tahoma, sans-serif"><b>เพิ่มข้อมูลปีการศึกษา</b></font></td>
  </tr>
  <tr>
    <td width="31%" height="28" align="left" valign="middle" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b> ปีการศึกษา</b></font>&nbsp;</td>
    <td width="69%" height="28" valign="middle" bgcolor="#E8E8E8"><input name="year" type="text" class="txt_box" id="year" onchange="count()" { alert('กรุณากรอกตัวเลข'); this.value='';}" size="5" maxlength="6"/></td>
  </tr>
  <tr>
    <td height="40" align="left" valign="middle" bgcolor="#E8E8E8">&nbsp;</td>
    <td height="40" valign="middle" bgcolor="#E8E8E8">
    <button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/save.png" width="20" height="20" align="absmiddle" /> บันทึกข้อมูล</button></td>
  </tr>
</table><br>
</form>
<?php
	//ส่วนของ User Authentication 
}else{
	
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"close.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>