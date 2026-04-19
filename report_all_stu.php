<?php
	session_start();
	include("connection.php");
	require_once("config.in.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายงานข้อมูลนักเรียน <?=config_school;?></title>
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
	$id	 		= $_GET['id'];
	$namestu	= $_GET['namestu'];
	$name 		= $_GET['name'];
	$room_stu	= $_GET['room_stu'];
	$status 	= $_GET['status'];
?>
<?php		
	if($room_stu == 1){
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="67" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="517" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="46" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="49" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="65" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="296" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="174" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="67" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="517" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>       
    </font>
	</td>
    <td width="46" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="49" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="65" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="296" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="174" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 2){
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="67" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="517" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="46" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="49" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="65" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="296" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="174" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="67" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="517" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>       
    </font>
	</td>
    <td width="46" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="49" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="65" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="296" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="174" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 3){
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 4){
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 5){
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 6){
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";;
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 7){
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 8){
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{

		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 9){
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 10){
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 11)
	{
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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

	}elseif($room_stu == 12){
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 13){
	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 14){

?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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

	}elseif($room_stu == 15){	
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	
	}elseif($room_stu == 16){

?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
	}else{
?>
<?php
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' order by s_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<br>
<div align="center"><b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลนักเรียน</font><br>
  <font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b>
</div>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="51" height="30" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="224" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ-นามสกุล</b></font></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ชั้น</font></b></td>
    <td width="36" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></b></td>
    <td width="33" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="173" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน</font></b></td>
    <td width="100" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$s_id		= $result['s_id'];
			$stu_id		= $result['stu_id'];
			$class_id	= $result['class_id'];
			$stu_name	= $result['stu_name'];
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
  <tr>
    <td width="51" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="224" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
    รหัสประจำตัว<?php echo '&nbsp;'.$stu_id;?><br>
	<?php echo $stu_name;?><br>
     วัน/เดือน/ปีเกิด :<?php echo '&nbsp;'.$bday;?><br>
     สัญชาติ :<?php echo '&nbsp;'.$nationality;?><br>
     ศาสนา :<?php echo '&nbsp;'.$religion;?><br>
     โรงเรียน :<?php echo '&nbsp;'.$old_school;?><br>
     จังหวัด :<?php echo '&nbsp;'.$province;?><br>
     ชื่อ - นามสกุล บิดา :<?php echo '&nbsp;'.$father;?><br>
     ชื่อ - นามสกุล มารดา :<?php echo '&nbsp;'.$mother;?><br>
    </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql2 		= "select * from tb_class where class_id = '$class_id';";		//session = id ในตาราง
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
											
	$class	= $result2['class'];
	
	echo "ม.".'&nbsp;'.$class;
?>
      </font></td>
    <td width="36" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $room;?></font></td>
    <td width="33" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="173" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $id_card;?></font></td>
    <td width="100" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
  <?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
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
    }
?>
<?php
}else{
	echo "<script langquage='javascript'>\n";
	echo "window.location=\"index.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>