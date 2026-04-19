<?php
	session_start();
	include("connection.php");
	require_once("config.in.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=config_title;?></title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

<STYLE>
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
if($_SESSION['lognum'] == 3)
	{
?>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" height="800" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
        <tr>
          <td height="289" colspan="2" valign="top" background="images/pic/banner.jpg"><table width="100%" height="50" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="5%" height="50">&nbsp;</td>
              <td width="68%" valign="middle"><a href="<?='http://'.config_url;?>" target="_blank"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#007BB7"><b><?=config_url;?></b></font></a></td>
              <td width="25%" align="right" valign="middle"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#FFFFFF"><b><a href="index_emp.php">กลับหน้าหลัก</a></b></font></td>
              <td width="2%" valign="middle">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="23%" valign="top"><?php include "menu_emp.php";?></td>
          <td width="77%" align="center" valign="top">
          
          <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td>
<?php
     //session แสดงการเข้าสู่ระบบ
	$teacher_id 	= $_SESSION['teacher_id'];
	$tea_pname 		= $_SESSION['tea_pname'];
	$tea_fname 		= $_SESSION['tea_fname'];
	$tea_lname 		= $_SESSION['tea_lname'];
	$teacher_status = $_SESSION['teacher_status'];
			  
	$sql_ss 		= "select * from tb_teacher where tea_id = '$teacher_id';";		//session = id ในตาราง
	$db_query_ss	= mysql_query($sql_ss);
	$result_ss		= mysql_fetch_array($db_query_ss);
											
	$tea_id		= $result_ss['tea_id'];
	$pname		= $result_ss['pname'];
	$fname		= $result_ss['fname'];
	$lname		= $result_ss['lname'];
	$idcard		= $result_ss['idcard'];
	$cat_id		= $result_ss['cat_id'];
	$tea_status	= $result_ss['tea_status'];
?>
                <font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><?php echo "$teacher_id".'&nbsp;'.":".'&nbsp;'."$pname".'&nbsp;'."$fname".'&nbsp;'."$lname";?></b></font><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><br />
                 <img src="images/horz_1.gif" /></b></font></td>
            </tr>
          </table><br> 
<font size="6" color="#FF3300" face="MS Sans Serif, Tahoma, sans-serif"><b>เปิด - ปิดระบบ</b></font><br><br>
<table align="center" width="70%" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="48%" height="45" bgcolor="#E4E4E4"><font size="4" face="MS Sans Serif, Tahoma, sans-serif"><b>ระบบ</b></font></td>
    <td width="34%" bgcolor="#E4E4E4"><font size="4" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
    <td width="18%" bgcolor="#E4E4E4"><font size="4" face="MS Sans Serif, Tahoma, sans-serif"><b>ดำเนินการ</b></font></td>
  </tr>
</table>
<?php	
		$sql = "SELECT * FROM tb_log_index";
		
		$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
		$num      = mysql_num_rows($db_query);

		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$in_id	 	= $result['in_id'];
			$name_in 	= $result['name_in'];
			$status_in	= $result['status_in'];
?>

<table align="center" width="70%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="48%" height="48" align="left" bgcolor="#F4F4F4"><font size="4" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $name_in;?></font></td>
    <td width="34%" bgcolor="#F4F4F4"><font size="4" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	if($status_in == 1)
	{
?>
	<img src="images/true.png">
    <font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#009900">เปิดระบบ</font>
<?php	
	}if($status_in == 2){
?>
	<img src="images/false.png">
    <font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">ปิดระบบ</font>
<?php	
	}
?>
    </font></td>
    <td width="18%" bgcolor="#F4F4F4"><a href="javascript" onclick="window.open('edit_id.php?in_id=<?=$in_id?>','windowname2','width=700, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/gear.png" width="40" border="0" align="middle" /></a></td>
  </tr>
</table>
<?php
	$a++;
	$i++;
	}
?>
<?php	
		$sql2 = "SELECT * FROM tb_add_stu";
		
		$db_query2 = mysql_query($sql2);	//เปลี่ยนเป็นคำสั่ง
		$num2      = mysql_num_rows($db_query2);
 
		$i2 =0;	//ตัวเช็ควนรอบ
		$a2 =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i2 < $num2)
		{
			$result2 = mysql_fetch_array($db_query2);	
			
			$as_id	 	= $result2['as_id'];
			$name_as 	= $result2['name_as'];
			$start_new	= $result2['start_new'];
			$end_new 	= $result2['end_new'];
			$status_as	= $result2['status_as'];
?>
<table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="48%" height="48" align="left" bgcolor="#F4F4F4"><font size="4" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $name_as;?></font></td>
    <td width="34%" align="center" bgcolor="#F4F4F4"><font size="4" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	if($status_as == 1)
	{
?>
      <img src="images/true.png" /> <font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#009900">เปิดระบบ</font>
<?php	
	}if($status_as == 2){
?>
      <img src="images/false.png" /> <font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">ปิดระบบ</font>
<?php	
	}
?>
    </font></td>
    <td width="18%" align="center" bgcolor="#F4F4F4"><a href="javascript" onclick="window.open('edit_stu_new.php?as_id=<?=$as_id?>','windowname2','width=600, \height=360, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/gear.png" width="40" border="0" align="middle" /></a></td>
  </tr>
</table>
<?php
	$a2++;
	$i2++;
	}
?>
<br>
<font size="3" face="MS Sans Serif, Tahoma, sans-serif">* หมายเหตุ : ในการเปิดปิดระบบนั้น การตั้งค่าเวลาเป็นเพียงการตั้งค่าเพื่อแสดงเวลาที่เหลือ</font><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif">เจ้าหน้าที่ต้องทำการปิดระบบด้วยตนเองเสมอ หากต้องการปิดระบบ</font></td>
        </tr>
      </table>
      </td>
  </tr>
</table>
<?php include "tbl_text2.php";?>	<!--ส่วนล่างสุด-->
<?php
//ส่วนของ User Authentication 
}else{
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"index.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>