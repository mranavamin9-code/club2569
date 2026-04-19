<?php
	session_start();
	include("connection.php");
	require_once("config.in.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=config_title;?></title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

<STYLE>
A:link {
	color:#FFF;
	text-docortion:none
}
A:visited {
	color:#FFF;
	text-docortion:none
}
A:hover {
	color:#007BB7;
}
A:link	{
text-decoration:none;
}
A:visited	{
text-decoration:none;
}
</STYLE>
</head>

<body background="images/bg.gif" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<?php
	// ส่วนของการทำ User Authentication 
	if($_SESSION['lognum'] == 1)
	{
?>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-collapse:collapse;">
<tr>
  <td valign="top">    
    <table width="100%" height="800" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
      <tr>
        <td height="289" colspan="2" valign="top" background="images/pic/banner.jpg"><table width="100%" height="50" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5%" height="50">&nbsp;</td>
            <td width="68%" valign="middle"><a href="<?='http://'.config_url;?>" target="_blank"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#007BB7"><b><?=config_url;?></b></font></a></td>
            <td width="25%" align="right" valign="middle"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#FFFFFF"><b><a href="index_stu.php">กลับหน้าหลัก</a></b></font></td>
            <td width="2%" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td valign="top"><?php include "menu_stu.php";?></td>
        <td width="77%" valign="top">
        
        <table width="80%" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
          <tr>
            <td width="3%">&nbsp;</td>
            <td colspan="2">
<?php
                //session แสดงการเข้าสู่ระบบ
				$student_id 	= $_SESSION['student_id'];
				$user_id		= $_SESSION['user_id'];
				$student_name 	= $_SESSION['student_name'];
				$student_room 	= $_SESSION['student_room'];
				$student_no 	= $_SESSION['student_no'];
			  
				$sql1 		= "select * from tb_student where stu_id = '$student_id';";		//session = id ในตาราง
				$db_query1	= mysql_query($sql1);
				$result1	= mysql_fetch_array($db_query1);
											
				$stu_id		= $result1['stu_id'];
				$stu_name	= $result1['stu_name'];
				$class_id	= $result1['class_id'];							
				$id_card	= $result1['id_card'];
				$room		= $result1['room'];
				$no			= $result1['no'];
				$old_school	= $result1['old_school'];
				$province	= $result1['province'];
				$nationality = $result1['nationality'];							
				$religion	= $result1['religion'];
				$bday		= $result1['bday'];
				$father		= $result1['father'];
				$mother		= $result1['mother'];
				$status_stu	= $result1['status_stu'];
?>
<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><?php echo "$student_id".'&nbsp;'.":".'&nbsp;'."$stu_name".'&nbsp;'.'&nbsp;'."ชั้นมัธยมศึกษาปีที่".'&nbsp;'."$class_id".'&nbsp;'."/".'&nbsp;'."$room".'&nbsp;'."เลขที่".'&nbsp;'."$no";?><br />
<img src="images/horz_1.gif"></b></font></td>
            </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="36" colspan="2" valign="bottom"><font size="5" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600"><b>ข้อมูลประจำตัวนักเรียน</b></font></td>
            </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="25" colspan="2" valign="middle" bgcolor="#91C8FF"><font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#000000"><b>ข้อมูลประจำตัว</b></font></td>
            </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td width="27%" height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว :</font></td>
            <td width="70%" height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$student_id";?></font></td>
          </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัวประชาชน :</font></td>
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
              <?php echo '&nbsp;'."$class".'&nbsp;'."/";?>
              <?php echo "$student_room";?></font></td>
          </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เลขที่ :</font></td>
            <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$student_no";?></font></td>
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
            <td height="40">&nbsp;</td>
            <td height="40" colspan="2" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">*หากข้อมูลผิดพลาด ให้นักเรียนแก้ไขให้ถูกต้อง</font></font></td>
          </tr>
          </table>
          
        </td>
      </tr>
    </table><br></td>
  </tr>
</table>
<?php include "tbl_text.php";?>	<!--ส่วนล่างสุด-->
<?php
	//ส่วนของ User Authentication 
}else{
	echo "<script>alert('กรุณาล็อกอินก่อนเข้าสู่ระบบ');</script>";
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"index.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>