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

<style type="text/css" media="print">
input {
	display:none;
}
</style>

<style type="text/css">
@media print{
.no-print{ display:none;}
}
</style>
</head>

<body>
<?php	
	//ค่าจากตัวรับข้อมูลหน้าเว็บ
	$status = $_GET['status'];
	$sql 	= "SELECT * FROM  tb_newupdate where status_new like '%$status%' order by new_id desc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลข่าวประกาศ</font><br><font size="5" face="MS Sans Serif, Tahoma, sans-serif"></font></b></div><br>

<div align="right"><input name="image" type="image" value="print" onclick="window.print()" src="images/printer2.png" width="52" height="52" /></div><br>

<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="70" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="324" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เรื่อง</b></font></td>
    <td width="375" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รายละเอียด</font></b></td>
    <td width="136" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">วันที่ประกาศ</font></b></td>
    <td width="248" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ผู้ประกาศ</b></font></td>
    <td width="133" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ประกาศถึง</font></b></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$new_id		= $result['new_id'];
			$new_date	= $result['new_date'];
			$sub_new	= $result['sub_new'];
			$det_new	= $result['det_new'];
			$status_new	= $result['status_new'];
			$tea_id		= $result['tea_id'];
?>
  <tr>
    <td width="70" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="324" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo '&nbsp;'.$sub_new;?></font></td>
    <td width="375" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo nl2br($result["det_new"]);?></font></td>
    <td width="136" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $new_date;?></font></td>
    <td width="248" align="center" valign="top">
<?php			  
	$sql_ss 		= "select * from tb_teacher where t_id = '$tea_id';";		//session = id ในตาราง
	$db_query_ss	= mysql_query($sql_ss);
	$result_ss		= mysql_fetch_array($db_query_ss);
											
	$pname		= $result_ss['pname'];
	$fname		= $result_ss['fname'];
	$lname		= $result_ss['lname'];
?>
<font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b><?php echo '&nbsp;'."$pname".'&nbsp;'."$fname".'&nbsp;'."$lname";?></b></font></td>
    <td width="133" align="center" valign="top">
<?php
	if($status_new == 1)
	{
		echo '<font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#0000FF">'."หน้าแรก".'</font>';
		
	}if($status_new == 2){
		
		echo '<font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600">'."นักเรียน".'</font>';
		
	}if($status_new == 3){
		
		echo '<font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#009900">'."ครูผู้สอน".'</font>';
		
	}if($status_new == 4){
		
		echo '<font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#6D2D95">'."รอประกาศ".'</font>';
	}
?>
      </td>
  </tr>
<?php
	$i++;
	$a++;
	}				
?>  
</table>
</body>
</html>