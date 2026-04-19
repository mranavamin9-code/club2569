<?php
	session_start();
	include("connection.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แก้ไขข้อมูลกลุ่มสาระการเรียนรู้</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
<?php
if($_SESSION['lognum'] == 3)
	{
?>
<?php	//ภาครับ
	$cat_id =$_GET['cat_id'];	

	$sql		="SELECT * FROM  tb_category where cat_id = '$cat_id'";	
	$db_query 	= mysql_query($sql);
	$result 	= mysql_fetch_array($db_query);
	
	$cat_id			= $result['cat_id'];
	$cat_name		= $result['cat_name'];
	$status_cat		= $result['status_cat'];
?>
<br>
<form name="form_add" method="post" action="save_edit_cat.php">
<table width="95%" border="0"  align="center" cellpadding="0" bgcolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td height="36" colspan="2" align="center" valign="middle" bgcolor="#3399FF"><font size="5" color="#FFFFFF" face="MS Sans Serif, Tahoma, sans-serif"><b>แก้ไขข้อมูลกลุ่มสาระการเรียนรู้</b></font></td>
  </tr>
  <tr>
    <td width="26%" height="28" align="left" valign="middle" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อกลุ่มสาระการเรียนรู้</b></font></td>
    <td width="74%" height="28" valign="middle" bgcolor="#E8E8E8"><input name="cat_name" type="text" class="txt_box" id="cat_name" value="<?php echo "$cat_name";?>" size="50"/></td>
  </tr>
  <tr>
    <td width="26%" height="28" align="left" valign="middle" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font>&nbsp;</td>
    <td width="74%" height="28" valign="middle" bgcolor="#E8E8E8"><select name="status_cat" class="styled-select" id="status_cat">
      <option value="<?php echo "$status_cat";?>">
<?php		
	$s = '$status_cat';	//หนดให้ตัวแปร s เท่ากับ status_cha
				
	switch( $status_cat){
	case '1' :
	echo "<font color=\"#0066FF\">ใช้งานอยู่</font>";	//status_... เท่ากับ 1 ให้แสดง ... สีฟ้า
	break;
	case '2' :
	echo "<font color=\"#FF0000\">ยกเลิกใช้งาน<font>";	//status_... เท่ากับ 2 ให้แสดง ... สีเขียว
	break;
	}
?>
        </option>
      <option value="1">ใช้งานอยู่</option>
      <option value="2">ยกเลิกใช้งาน</option>
    </select></td>
  </tr>
  <tr>
    <td height="37" align="left" valign="middle">&nbsp;</td>
    <td valign="middle"><button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/edit.png" width="20" height="20" align="absmiddle" /> แก้ไขข้อมูล</button><input type="hidden" name="cat_id" value="<?php echo $cat_id;?>" /></td>
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