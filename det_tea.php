<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายละเอียดข้อมูลครูผู้สอน/เจ้าหน้าที่</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

<style type="text/css" media="print">
input {
	display:none;
}
</style>
</head>

<body>
<?php
// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 3)
	{
?>
<?php
	$t_id = $_GET['t_id'];
	
	$sql="SELECT * FROM tb_teacher where t_id = '$t_id'";
	$db_query = mysql_query($sql);
	$result = mysql_fetch_array($db_query);	
	
	$t_id		= $result['t_id'];
	$tea_id		= $result['tea_id'];
	$pname		= $result['pname'];
	$fname		= $result['fname'];
	$lname		= $result['lname'];
	$idcard		= $result['idcard'];
	$cat_id		= $result['cat_id'];
	$tea_status	= $result['tea_status'];

?>
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td height="52" colspan="2" align="center"><font size="5" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600"><b>รายละเอียดข้อมูลครูผู้สอน/เจ้าหน้าที่</b></font></td>
  </tr>
  <tr>
    <td height="25" colspan="2" bgcolor="#91C8FF"><font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#000000"><b>ข้อมูลประจำตัว</b></font></td>
  </tr>
  <tr>
    <td height="25" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว :</font></td>
    <td width="70%" height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$tea_id";?></font></td>
  </tr>
  <tr>
    <td height="25" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เลขประจำตัวประชาชน :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$idcard";?></font></td>
  </tr>
  <tr>
    <td height="25" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$pname";?>&nbsp;<?php echo "$fname";?>&nbsp;<?php echo "$lname";?></font></td>
  </tr>
  <tr>
    <td height="25" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">กลุ่มสาระการเรียนรู้ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
		$sql2 		= "select * from tb_category where cat_id = '$cat_id';";		//session = id ในตาราง
		$db_query2	= mysql_query($sql2);
		$result2	= mysql_fetch_array($db_query2);
				
		$cat_name		= $result2['cat_name'];
		
		echo '&nbsp;'."$cat_name";?></font></td>
  </tr>
  <tr>
    <td height="25" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะผู้ใช้งาน :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$s = '$tea_status';
	switch( $tea_status){
	case '1' :
		echo '&nbsp;'."ครูผู้สอน";
	break;
	case '2' :
		echo '&nbsp;'."เจ้าหน้าที่";	
	break;
	case '3' :
		echo '&nbsp;'."ยกเลิกใช้งาน";	
	break;
	}
?>
    </font></td>
  </tr>
</table>
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
