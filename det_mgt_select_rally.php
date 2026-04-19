<?php
	session_start();
	include("connection.php");
?>
<?php
	$class	= $_POST['class'];
	$room	= $_POST['room'];
	$year	= $_POST['year'];
	
	$sql_y		= "SELECT * FROM tb_term_year where ty_id = '$year'";
	$db_query_y = mysql_query($sql_y);
	$result_y 	= mysql_fetch_array($db_query_y);	
	
	$year 		= $result_y['year'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?="ข้อมูลกิจกรรมชุมนุม ระดับชั้น ม. $class / $room ปีการศึกษา $year";?></title>
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

<STYLE>
.tbl:hover{							
	background-color: #D6E7D1;	/*สีเมื่อเมาส์ไปโดน*/
}
</STYLE>
</head>

<body>
<?php 
if($_SESSION['lognum'] == 3)
{
?>
<?php	
	$class	= $_POST['class'];
	$room	= $_POST['room'];
	$year	= $_POST['year'];
	
	if(empty($class)&&empty($room)&&empty($year))
	{		
		echo "<script>alert('**กรุณาระบุข้อมูลก่อนค้นหา**');history.back();</script>";
		echo "<Script Language='JavaScript'>window.close();</Script>";
	
	}else if(empty($class)){
		
		echo "<script>alert('**กรุณาระบุระดับชั้น**');history.back();</script>";
		echo "<Script Language='JavaScript'>window.close();</Script>";
		
	}else if(empty($room)){
		
	echo "<script>alert('**กรุณาระบุห้องเรียน**');history.back();</script>";
	echo "<Script Language='JavaScript'>window.close();</Script>";

	}else if(empty($year)){
		
		echo "<script>alert('**กรุณาระบุปีการศึกษา**');history.back();</script>";
		echo "<Script Language='JavaScript'>window.close();</Script>";
		
	}else {
	
	$sql		= "SELECT * FROM tb_select_rally where sel_class = '$class' and sel_room = '$room' and ty_id = '$year' order by sel_no asc";
	
	$db_query	= mysql_query($sql);
	$num      	= mysql_num_rows($db_query);
?>
<div align="center">
<font size="5" face="MS Sans Serif, Tahoma, sans-serif"><b>ข้อมูลกิจกรรมชุมนุม <br>
<?php	
	$sql4		= "SELECT * FROM tb_term_year where ty_id = '$year'";
	$db_query4 	= mysql_query($sql4);
	$result4 	= mysql_fetch_array($db_query4);	
	
	$year 		= $result4['year'];
?>
<?php echo "ระดับชั้น ม. ".$class." / ".$room." ปีการศึกษา $year";?></b></font>
</div><br>
<?php
	if ($num <> 0){	//ถ้าค่า num ไม่เท่ากับ o ให้แสดงข้อมูล
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right">
    <a href="report_mgt_select_rally.php?class=<?=$class?>&room=<?=$room?>&year=<?=$_POST["year"]?>" target="_blank">
    <input name="image2" type="image" value="print" src="images/exword.png" width="52" height="48" /></a>
    </td>
  </tr>
</table>
<table align="center" width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="5%" height="26" bgcolor="#EAEAEA"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="15%" bgcolor="#EAEAEA"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว</font></b></td>
    <td width="24%" bgcolor="#EAEAEA"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ - นามสกุล</b></font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชั้น</b></font></td>
     <td width="4%" bgcolor="#EAEAEA"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">เลขที่</font></b></td>
    <td width="25%" bgcolor="#EAEAEA"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>กิจกรรมชุมนุม</b></font></td>
    <td width="22%" bgcolor="#EAEAEA"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ครูผู้สอน</b></font></td>
  </tr>
  <?php 
		$i = 0;
		$a = 1;
		while($i < $num)
		{
		$result 	= mysql_fetch_array($db_query);	
			
		$sel_id		= $result['sel_id'];
		$d_id		= $result['d_id'];
		$ty_id 		= $result['ty_id'];
		$s_id 		= $result['s_id'];
		$sel_class 	= $result['sel_class'];
		$sel_room 	= $result['sel_room'];
		$sel_no 	= $result['sel_no'];
		$date_add 	= $result['date_add'];
		$status_sel	= $result['status_sel'];
?>
  <tr align="center" class="tbl">
    <td width="5%" height="26" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="15%" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$s_id		= $result['s_id'];
			  
	$sql2 		= "select * from tb_student where s_id = '$s_id';";
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
								
	//$s_id		= $result2['s_id'];
	$stu_id		= $result2['stu_id'];
	$class_id	= $result2['class_id'];
	$stu_name	= $result2['stu_name'];
	$id_card	= $result2['id_card'];
	//$room		= $result2['room'];
	$no			= $result2['no'];
	$status_stu	= $result2['status_stu'];
	
	echo "$stu_id";
?>
    </font></td>
    <td width="24%" align="left"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $stu_name;?></font></td>
    <td width="5%" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$sel_class / $sel_room";?></font></td>
    <td width="4%" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
    <td width="25%" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php	
	$d_id		= $result['d_id'];
	
	$sql3		= "SELECT * FROM tb_department where d_id = '$d_id'";
	$db_query3 	= mysql_query($sql3);
	$result3 	= mysql_fetch_array($db_query3);	
	
	$dep_id		= $result3['dep_id'];
	$name_dep 	= $result3['name_dep'];
	$tea_id1	= $result3['tea_id1'];
	$tea_id2	= $result3['tea_id2'];
	$tea_id3	= $result3['tea_id3'];
	$tea_id4	= $result3['tea_id4'];
	$tea_id5	= $result3['tea_id5'];
	
	echo $name_dep;
?>
	</font>
    </td>
    <td width="22%" align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="8%"></td>
    <td width="92%"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id1	= $result3['tea_id1'];
			  
	$sql_t1 	= "select * from tb_teacher where t_id = '$tea_id1';";
	$db_query_t1 = mysql_query($sql_t1);
	$result_t1	= mysql_fetch_array($db_query_t1);
								
	$pname	= $result_t1['pname'];
	$fname	= $result_t1['fname'];
	$lname	= $result_t1['lname'];
	echo "$pname "."$fname "."$lname";
?>
    </font></td>
  </tr>
  <tr>
    <td></td>
    <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id2	= $result3['tea_id2'];
			  
	$sql_t2 	= "select * from tb_teacher where t_id = '$tea_id2';";
	$db_query_t2 = mysql_query($sql_t2);
	$result_t2	= mysql_fetch_array($db_query_t2);
								
	$pname	= $result_t2['pname'];
	$fname	= $result_t2['fname'];
	$lname	= $result_t2['lname'];
	echo "$pname "."$fname "."$lname";
?>
    </font></td>
  </tr>
  <tr>
    <td></td>
    <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id3	= $result3['tea_id3'];
			  
	$sql_t3 	= "select * from tb_teacher where t_id = '$tea_id3';";
	$db_query_t3 = mysql_query($sql_t3);
	$result_t3	= mysql_fetch_array($db_query_t3);
								
	$pname	= $result_t3['pname'];
	$fname	= $result_t3['fname'];
	$lname	= $result_t3['lname'];
	echo "$pname "."$fname "."$lname";
?>
    </font></td>
  </tr>
  <tr>
    <td></td>
    <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id4	= $result3['tea_id4'];
			  
	$sql_t4 	= "select * from tb_teacher where t_id = '$tea_id4';";
	$db_query_t4 = mysql_query($sql_t4);
	$result_t4	= mysql_fetch_array($db_query_t4);
								
	$pname	= $result_t4['pname'];
	$fname	= $result_t4['fname'];
	$lname	= $result_t4['lname'];
	echo "$pname "."$fname "."$lname";
?>
    </font></td>
  </tr>
  <tr>
    <td></td>
    <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id5	= $result3['tea_id5'];
			  
	$sql_t5 	= "select * from tb_teacher where t_id = '$tea_id5';";
	$db_query_t5 = mysql_query($sql_t5);
	$result_t5	= mysql_fetch_array($db_query_t5);
								
	$pname	= $result_t5['pname'];
	$fname	= $result_t5['fname'];
	$lname	= $result_t5['lname'];
	echo "$pname "."$fname "."$lname";
?>
    </font></td>
  </tr>
</table>

    </td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<?php		
	}else if ($num == 0){		//ถ้าค่า num = 0 ให้แสดงข้อความนี้
		
		echo '<div align="center">'.'<img src="images/alert.png">'.'&nbsp;'.'<font size="4" face="Tahoma">'."ยังไม่มีข้อมูลการลงทะเบียนในรายวิชานี้".'</font>'.'</div>';
	}
?>
<?php
	}	//ปิดค่าว่าง
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