<?php
	session_start();
	include("connection.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มข้อมูลกลุ่มสาระการเรียนรู้</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
<?php
	// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 3)
	{
?>
<br>
<form name="form_add" method="post" action="save_cat.php">
<table width="95%" border="0"  align="center" cellpadding="0" bgcolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td height="36" colspan="2" align="center" valign="middle" bgcolor="#3399FF"><font size="5" color="#FFFFFF" face="MS Sans Serif, Tahoma, sans-serif"><b>เพิ่มข้อมูลกลุ่มสาระการเรียนรู้</b></font></td>
  </tr>
  <tr>
    <td width="26%" height="28" align="left" valign="middle" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อกลุ่มสาระการเรียนรู้</b></font></td>
    <td width="74%" height="28" valign="middle" bgcolor="#E8E8E8"><input name="cat_name" type="text" class="txt_box" id="cat_name" size="50" /></td>
  </tr>
  <tr>
    <td width="26%" height="28" align="left" valign="middle" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font>&nbsp;</td>
    <td width="74%" height="28" valign="middle" bgcolor="#E8E8E8"><font size="3">
      <input type="radio" name="status_cat" value="1" />
      เพิ่มข้อมูลลงในระบบ</font></td>
  </tr>
  <tr>
    <td height="40" align="left" valign="middle">&nbsp;</td>
    <td height="40" valign="middle">
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