<?php
	session_start();
	include("connection.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แก้ไขข้อมูลปีการศึกษา</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
<?php
if($_SESSION['lognum'] == 3)
	{
?>
<?php
	$ty_id =$_GET['ty_id'];	
	
	$sql="SELECT * FROM  tb_term_year where ty_id = '$ty_id'";	
	$db_query = mysql_query($sql);
	$result = mysql_fetch_array($db_query);
	
	$ty_id		=$result['ty_id'];
	$year		=$result['year'];
?>
<br>
<form name="form_add" method="post" action="save_edit_ty.php">
<table width="95%" border="0"  align="center" cellpadding="0" bgcolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td height="36" colspan="2" align="center" valign="middle" bgcolor="#3399FF"><font size="5" color="#FFFFFF" face="MS Sans Serif, Tahoma, sans-serif"><b>แก้ไขข้อมูลปีการศึกษา</b></font></td>
  </tr>
  <tr>
    <td width="31%" height="28" align="left" valign="middle" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b> ปีการศึกษา</b></font>&nbsp;</td>
    <td width="69%" height="28" valign="middle" bgcolor="#E8E8E8"><input name="year" type="text" class="txt_box" id="year" { alert('กรุณากรอกตัวเลข'); this.value='';}" value="<?php echo "$year";?>" size="5" maxlength="6"></td>
  </tr>
  <tr>
    <td height="37" align="left" valign="middle">&nbsp;</td>
    <td valign="middle"><button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/edit.png" width="20" height="20" align="absmiddle" /> แก้ไขข้อมูล</button><input type="hidden" name="ty_id" value="<?php echo $ty_id;?>" /></td>
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