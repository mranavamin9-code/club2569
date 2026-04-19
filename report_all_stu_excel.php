<?php
	session_start();
	include("connection.php");
	
	header("Content-type: application/vnd.ms-word");		//คำสั่งดาวน์โหลด
	header("Content-Disposition: attachment; filename=รายงานข้อมูลนักเรียน สำหรับแปลงเป็นไฟล์ CSV.xls");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
<?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
<?php
	$i++;
	$a++;
	}				
?>
</table>

<?php
	
	}else if($room_stu == 2){
	
?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
<?php	
	
	}else if($room_stu == 3){
	
?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
<?php	
	
	}else if($room_stu == 4){
	
?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
<?php	
	
	}else if($room_stu == 5){
	
?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
<?php	
	
	}else if($room_stu == 6){
	
?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
<?php	
	
	}else if($room_stu == 7){
	
?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
<?php	
	}else if($room_stu == 8){
?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
<?php
	
	}else if($room_stu == 9){
	
?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
<?php	
	
	}else if($room_stu == 10){
	
?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
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
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
<?php

	}else if($room_stu == 12){
	
?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
<?php	
	
	}else if($room_stu == 13){
	
?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
<?php	
	
	}else if($room_stu == 14){

?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
<?php	

	}else if($room_stu == 15){	
?>
<?php
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
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
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and room ='$room_stu' and status_stu like '%$status%' order by s_id , stu_id asc";
		
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
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
	$sql		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' order by stu_id asc";
		
	$db_query	= mysql_query($sql);
	$num		= mysql_num_rows($db_query);
?>
<table width="95%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result		= mysql_fetch_array($db_query);	
			
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
    <td align="center"><?php echo $stu_id;?></td>
    <td width="20%" align="left"><?php echo $stu_name;?></td>
    <td width="10%" align="center"><?php echo $id_card;?></td>
    <td align="center"><?php echo $class_id;?></td>
    <td align="center"><?php echo $room;?></td>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $old_school;?></td>
    <td align="center"><?php echo $province;?></td>
    <td align="center"><?php echo $nationality;?></td>
    <td align="center"><?php echo $religion;?></td>
    <td align="center"><?php echo $bday;?></td>
    <td width="20%" align="center"><?php echo $father;?></td>
    <td width="20%" align="center"><?php echo $mother;?></td>
    <td align="center"><?php echo $status_stu;?></td>
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