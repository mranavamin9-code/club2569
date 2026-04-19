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
	// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 3)
	{
?>
<?php	
	//ภาครับ
	$id	 		= $_GET['id'];
	$f_name		= $_GET['f_name'];
	$l_name 	= $_GET['l_name'];
	$name		= $_GET['name'];
	$status 	= $_GET['status'];
	
	$sql = "SELECT * FROM  tb_teacher where tea_id like '%$id%' and fname like '%$f_name%' and lname like '%$l_name%' and cat_id like '%$name%' and tea_status like '%$status%' order by t_id asc";
	
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลครูผู้สอน/เจ้าหน้าที่</font><br><font size="5" face="MS Sans Serif, Tahoma, sans-serif"></font></b></div>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="no-print">
  <tr>
    <td width="1372" align="right">&nbsp;</td>
    <td width="128" align="center"><input name="image2" type="image" value="print" onclick="window.print()" src="images/printer2.png" width="52" height="52" />
      <br /></td>
  </tr>
</table>
<br>

<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="45" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="198" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="147" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>หมายเลข<br>ประจำตัวประชาชน</b></font></td>
    <td width="162" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">กลุ่มสาระ</font></b></td>
  </tr>
<?php

		$i=0;
		$a=1;
		while($i < $num)
		{
					
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
  <tr>
    <td width="45" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="198" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>รหัสประจำตัว</b><?php echo '&nbsp;'.$tea_id;?><br>
      <?php echo $pname.'&nbsp;'.$fname.'&nbsp;'.$lname;?></font></td>
    <td width="147" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $idcard;?></font></td>
    <td width="162" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_category where cat_id = '$cat_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$cat_name	= $result2['cat_name'];
	
	echo $cat_name;
?>
    </font></td>
  </tr>
<?php
	$i++;
	$a++;
	}				
?>  
</table>
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