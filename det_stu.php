<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายละเอียดข้อมูลนักเรียน</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
</head>

<body>
<?php
	// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 3)
	{
?>
<?php
	$s_id = $_GET['s_id'];
	
	$sql="SELECT * FROM  tb_student where s_id = '$s_id'";
	$db_query = mysql_query($sql);
	$result = mysql_fetch_array($db_query);	
	
	$stu_id		= $result['stu_id'];
	$stu_name	= $result['stu_name'];
	$class_id	= $result['class_id'];							
	$id_card	= $result['id_card'];
	$room		= $result['room'];
	$no			= $result['no'];
	$old_school	= $result['old_school'];
	$province	= $result['province'];
	$nationality = $result['nationality'];							
	$religion	= $result['religion'];
	$bday		= $result['bday'];
	$father		= $result['father'];
	$mother		= $result['mother'];
	$status_stu	= $result['status_stu'];

?>
<table width="95%" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="36" colspan="2" align="center" valign="bottom"><font size="5" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600"><b>รายละเอียดข้อมูลนักเรียน</b></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" colspan="2" valign="middle" bgcolor="#91C8FF"><font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#000000"><b>ข้อมูลประจำตัว</b></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="27%" height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว :</font></td>
    <td width="70%" height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$stu_id";?></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เลขบัตรประชาชน :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$id_card";?></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$stu_name";?></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชั้นมัธยมศึกษาปีที่ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
		$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
		$db_query2	= mysql_query($sql2);
		$result2	= mysql_fetch_array($db_query2);
				
		$class		= $result2['class'];
?>
<?php echo '&nbsp;'."$class".'&nbsp;'."/";?> <?php echo "$room";?></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เลขที่ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$no";?></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">โรงเรียนเดิม :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$old_school";?></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">จังหวัด :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$province";?></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สัญชาติ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$nationality";?></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ศาสนา :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$religion";?></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">วัน/เดือน/ปีเกิด :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$bday";?></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล บิดา :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$father";?></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล มารดา :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$mother";?></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	if($status_stu == 1)
	{
		echo '<font size="3" color="#009900">'.'&nbsp;'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="3" color="#0033FF">'.'&nbsp;'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="3" color="#FF0000">'.'&nbsp;'."ยกเลิกใช้งาน".'</font>';
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
