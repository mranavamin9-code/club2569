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
	if($_SESSION['lognum'] == 2)
	{
?>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <td valign="top">    
    <table width="100%" height="800" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
      <tr>
        <td height="289" colspan="2" valign="top" background="images/pic/banner.jpg"><table width="100%" height="50" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5%" height="50">&nbsp;</td>
            <td width="68%" valign="middle"><a href="<?='http://'.config_url;?>" target="_blank"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#007BB7"><b><?=config_url;?></b></font></a></td>
            <td width="25%" align="right" valign="middle"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#FFFFFF"><b><a href="index_tea.php">กลับหน้าหลัก</a></b></font></td>
            <td width="2%" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td width="23%" valign="top"><?php include "menu_tea.php";?></td>
        <td width="77%" valign="top">
        
        <table width="80%" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
          <tr>
            <td width="3%">&nbsp;</td>
            <td colspan="2">
<?php
                //session แสดงการเข้าสู่ระบบ
				$teacher_id 	= $_SESSION['teacher_id'];
				$tea_pname 		= $_SESSION['tea_pname'];
				$tea_fname 		= $_SESSION['tea_fname'];
				$tea_lname 		= $_SESSION['tea_lname'];
				$teacher_status	= $_SESSION['teacher_status'];
				
				$sql1 		= "select * from tb_teacher where tea_id = '$teacher_id';";		//session = id ในตาราง
				$db_query1	= mysql_query($sql1);
				$result1	= mysql_fetch_array($db_query1);
					
				$t_id		= $result1['t_id'];						
				$tea_id		= $result1['tea_id'];
				$pname		= $result1['pname'];
				$fname		= $result1['fname'];
				$lname		= $result1['lname'];
				$idcard		= $result1['idcard'];
				$cat_id		= $result1['cat_id'];
				$tea_status	= $result1['tea_status'];

?>
			<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><?php echo "$teacher_id".'&nbsp;'.":".'&nbsp;'."$tea_pname".'&nbsp;'."$tea_fname".'&nbsp;'."$tea_lname";?></b></font><br>
            <img src="images/horz_1.gif"></td>
          </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="36" colspan="2" valign="bottom"><font size="5" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600"><b>ข้อมูลประจำตัวครูผู้สอน</b></font></td>
            </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="25" colspan="2" valign="middle" bgcolor="#91C8FF"><font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#000000"><b>ข้อมูลประจำตัว</b></font></td>
            </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td width="27%" height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว :</font></td>
            <td width="70%" height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$tea_id";?></font></td>
          </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัวประชาชน :</font></td>
            <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$idcard";?></font></td>
          </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล :</font></td>
            <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$pname";?>&nbsp;<?php echo "$fname";?>&nbsp;<?php echo "$lname";?></font></td>
          </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">กลุ่มสาระการเรียนรู้ :</font></td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
  <?php 
		$sql2 		= "select * from tb_category where cat_id = '$cat_id';";		//session = id ในตาราง
		$db_query2	= mysql_query($sql2);
		$result2	= mysql_fetch_array($db_query2);
				
		$cat_name		= $result2['cat_name'];
?>		
              <?php echo '&nbsp;'."$cat_name";?></font></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะ :</font></td>
            <td height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;
<?php
	if($tea_status == 1)
	{
		echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."ครูผู้สอน".'</font>';
		
	}if($tea_status == 2){
		
		echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."เจ้าหน้าที่".'</font>';
	}if($tea_status == 3){
		
		echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."ยกเลิกใช้งาน".'</font>';
	}
?>
            </td>
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