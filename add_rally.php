<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ลงทะเบียนกิจกรรมชุมนุม</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
</head>

<body>
<?php
if($_SESSION['lognum'] == 1)
	{
?>
<?php		
	$sql_log		="SELECT * FROM tb_log_index";
	$db_query_log	= mysql_query($sql_log);
	$result_log  	= mysql_fetch_array($db_query_log);	

	$in_id		= $result_log['in_id'];	
	$name_in	= $result_log['name_in'];
	$status_in	= $result_log['status_in'];

	if($status_in == 1)		//เงื่อนไขตรวจสอบสถานะปิดการรับชุมนุม
	{
?>
<?php
        //session แสดงการเข้าสู่ระบบ
		$student_id 	= $_SESSION['student_id'];
		$user_id		= $_SESSION['user_id'];
		$student_name 	= $_SESSION['student_name'];
		$student_room 	= $_SESSION['student_room'];
		$student_no 	= $_SESSION['student_no'];
		
		$sql_s 		= "select * from tb_student where stu_id = '$student_id';";		//session = id ในตาราง
		$db_query_s	= mysql_query($sql_s);
		$result_s	= mysql_fetch_array($db_query_s);
				
		$class_id	= $result_s['class_id'];
		$room		= $result_s['room'];
		$no			= $result_s['no'];
?>
<?php		
		//แสดงชื่อ
		$d_id 	= $_GET['d_id'];
		
		$sql="SELECT * FROM tb_department where d_id = '$d_id'";
		$db_query = mysql_query($sql);
		$result = mysql_fetch_array($db_query);	
		
		$d_id		= $result['d_id'];
		$dep_id		= $result['dep_id'];
		$name_dep 	= $result['name_dep'];
		$atd 		= $result['atd'];
		$class 		= $result['class'];
		$object 	= $result['object'];
		$classroom	= $result['classroom'];
		$period 	= $result['period'];
		$number		= $result['number'];
		$tea_id1	= $result['tea_id1'];
		$tea_id2	= $result['tea_id2'];
		$tea_id3	= $result['tea_id3'];
		$tea_id4	= $result['tea_id4'];
		$tea_id5	= $result['tea_id5'];
		$ty_id		= $result['ty_id'];
		$status_dep = $result['status_dep'];
		
		$d_m 		= date("d-m-");		//วัน-เดือน
		$y			= date(" Y ")+543;	//พ.ศ.
		$time		= date("H:i:s");	//เวลา
		$day		= "$d_m"."$y".'&nbsp;'."$time";
		//echo $day;
?>
<br>
<form name="form_addrally" method="post" action="save_add_rally.php">
<table width="80%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td>
  <table width="100%" border="1" bordercolor="#FFFFFF" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr>
    <td height="48" colspan="2" align="center" valign="middle" bgcolor="#F9F9F9"><font size="5" color="#FF6600" face="MS Sans Serif, Tahoma, sans-serif"><b>ลงทะเบียนกิจกรรมชุมนุม</b></font></td>
    </tr>
  <tr>
    <td width="32%" height="35" valign="middle"><b><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อกิจกรรมชุมนุม</font></b></td>
    <td height="35" valign="middle" bgcolor="#E6E6E6"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo '&nbsp;'."$name_dep".'&nbsp;'."($dep_id)";?>
      </font></td>
  </tr>
  <tr>
    <td height="35" valign="top"><b><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อครูที่ปรึกษาชุมนุม</font></b>&nbsp;</td>
    <td width="68%" height="35" valign="middle" bgcolor="#E6E6E6"><table width="99%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id1	= $result['tea_id1'];
			  
	$sql2 		= "select * from tb_teacher where t_id = '$tea_id1';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query2	= mysql_query($sql2);	//ถอดข้อความให้เป็นคำสั่ง
	$result2	= mysql_fetch_array($db_query2);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result2['pname'];
	$fname	= $result2['fname'];
	$lname	= $result2['lname'];
	echo "$pname "."$fname "."$lname";
?>
          </font></td>
        </tr>
      <tr>
        <td><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id2	= $result['tea_id2'];
			  
	$sql3 		= "select * from tb_teacher where t_id = '$tea_id2';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query3	= mysql_query($sql3);	//ถอดข้อความให้เป็นคำสั่ง
	$result3	= mysql_fetch_array($db_query3);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result3['pname'];
	$fname	= $result3['fname'];
	$lname	= $result3['lname'];
	echo "$pname "."$fname "."$lname";
?>
          </font></td>
        </tr>
      <tr>
        <td><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id3	= $result['tea_id3'];
			  
	$sql4 		= "select * from tb_teacher where t_id = '$tea_id3';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query4	= mysql_query($sql4);	//ถอดข้อความให้เป็นคำสั่ง
	$result4	= mysql_fetch_array($db_query4);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result4['pname'];
	$fname	= $result4['fname'];
	$lname	= $result4['lname'];
	echo "$pname "."$fname "."$lname";
?>
          </font></td>
        </tr>
      <tr>
        <td><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id4	= $result['tea_id4'];
			  
	$sql5 		= "select * from tb_teacher where t_id = '$tea_id4';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query5	= mysql_query($sql5);	//ถอดข้อความให้เป็นคำสั่ง
	$result5	= mysql_fetch_array($db_query5);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result5['pname'];
	$fname	= $result5['fname'];
	$lname	= $result5['lname'];
	echo "$pname "."$fname "."$lname";
?>
          </font></td>
        </tr>
      <tr>
        <td><font size="4" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id5	= $result['tea_id5'];
			  
	$sql6 		= "select * from tb_teacher where t_id = '$tea_id5';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query6	= mysql_query($sql6);	//ถอดข้อความให้เป็นคำสั่ง
	$result6	= mysql_fetch_array($db_query6);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result6['pname'];
	$fname	= $result6['fname'];
	$lname	= $result6['lname'];
	echo "$pname "."$fname "."$lname";
?>
          </font></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="35" valign="top"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>จุดประสงค์กิจกรรมชุมนุม</b></font>&nbsp;</td>
    <td height="35" valign="middle" bgcolor="#E6E6E6"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo nl2br($result["object"]);?></font></td>
  </tr>
  <tr>
    <td height="35" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ปีการศึกษา</b></font>&nbsp;</td>
    <td height="35" valign="middle" bgcolor="#E6E6E6"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$ty_id	= $result['ty_id'];
	
	$sql1 		= "select * from tb_term_year where ty_id = '$ty_id';";
	$db_query1	= mysql_query($sql1);
	$result1	= mysql_fetch_array($db_query1);	
	
	$year	= $result1['year'];
	echo "$year";
?>
    </font></td>
    </tr>
  <tr>
    <td height="35" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ระดับชั้น</b></font></td>
    <td height="35" valign="middle" bgcolor="#E6E6E6"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "ชั้นมัธยมศึกษาปีที่".'&nbsp;'.$class;?></font></td>
  </tr>
  <tr>
    <td height="35" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>คุณสมบัติผู้เรียน</b></font></td>
    <td height="35" valign="middle" bgcolor="#E6E6E6"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $atd;?></font></td>
  </tr>
  <tr>
    <td height="35" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานที่จัดกิจกรรม</b></font></td>
    <td height="35" valign="middle" bgcolor="#E6E6E6"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $classroom;?></font></td>
  </tr>
  <tr>
    <td height="35" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>คาบเรียน</b></font></td>
    <td height="35" valign="middle" bgcolor="#E6E6E6"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $period;?></font></td>
  </tr>
  <tr>
    <td height="35" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>จำนวนที่รับสมัคร</b></font></td>
    <td height="35" valign="middle" bgcolor="#E6E6E6"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $number;?>&nbsp; คน
<?php
	//ดึงค่าจำนวนออกมา
	$sqlc = mysql_query("SELECT COUNT(d_id) FROM tb_select_rally WHERE d_id='".$result['d_id']."' and ty_id='".$result['ty_id']."' ");
	$resultc = mysql_fetch_assoc($sqlc);
	//ค้นหาใน d_id โดย d_id กับกับ d_id และ ty_id เท่ากับ ty_id
	
	echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'.'(สมัครแล้ว ';
	print $resultc['COUNT(d_id)'];
	echo ' คน)'.'</font>';
?>
    </font></td>
    </tr>
  </table>
  </td>
  </tr>
</table>
  
  
<br>
<?php
	if($resultc['COUNT(d_id)'] < $result['number'])	//ถ้าจำนวนที่เบือกน้อยกว่าจำนวนจริง
	{
?>
<table width="40%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="28%" height="36" bgcolor="#C1E0FF">&nbsp;</td>
    <td width="72%" bgcolor="#C1E0FF"><input type="checkbox" name="status_sel" id="status_sel" value="1" style="height:18px; width:18px"/>
  &nbsp;<font size="4" color="#FF0000">*</font>&nbsp;<font size="4" face="Tahoma">ยืนยันการลงทะเบียนชุมนุม</font></td>
  </tr>
  <tr>
    <td height="64" bgcolor="#C1E0FF">&nbsp;</td>
    <td bgcolor="#C1E0FF"><button type="submit" name="button" id="button" style="height:40px; font-size:15px;"><img src="images/apply.png" width="24" height="24" align="absmiddle" /> ลงทะเบียน</button>
      <input name="d_id" type="hidden" id="d_id" value="<?php echo $d_id;?>" />
      <input name="day" type="hidden" id="day" value="<?php echo $day;?>" />
      <input name="ty_id" type="hidden" id="ty_id" value="<?php echo $ty_id;?>" />
      <input name="user_id" type="hidden" id="user_id" value="<?php echo $user_id;?>" />
    </td>
  </tr>
</table>
</form>
<?php
	}
	else if($resultc['COUNT(d_id)'] == $result['number'])	//ถ้าจำนวนที่เลือกเท่ากับจำนวนจริง
	{
?>
<br>
<div align="center"><font size="4" color="#FF0000" face="MS Sans Serif, Tahoma, sans-serif"><b>จำนวนผู้สมัครครบจำนวนแล้ว<br>ไม่สามารถสมัครได้</b></font></div>
<?php
	}
	else if($resultc['COUNT(d_id)'] > $result['number'])	//ถ้าเกิน
	{
?>
<br>
<div align="center"><font size="4" color="#FF9900" face="MS Sans Serif, Tahoma, sans-serif"><b>จำนวนผู้สมัครเกินจำนวนที่กำหนด</b></font></div>
<?php
	}	//ปิดการตรวจสอบ
?>
<br>
<?php
	$d_id	= $_GET['d_id'];
	
	$sql7 	= "SELECT * FROM tb_select_rally where d_id = '$d_id'";
	$db_query7	= mysql_query($sql7);	//เปลี่ยนเป็นคำสั่ง
	$num7		= mysql_num_rows($db_query7);
?>
<?php
	if ($num7 <> 0){	//ถ้าค่า num ไม่เท่ากับ o ให้แสดงข้อมูล
?>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="6%" height="31" align="center" bgcolor="#EFEFEF"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="10%" height="31" align="center" bgcolor="#EFEFEF"><b><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว</font></b></td>
    <td width="36%" height="31" align="center" bgcolor="#EFEFEF"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ - สกุล</b></font></td>
    <td width="7%" height="31" align="center" bgcolor="#EFEFEF"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ห้อง</b></font></td>
    <td width="7%" height="31" align="center" bgcolor="#EFEFEF"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="20%" height="31" align="center" bgcolor="#EFEFEF"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>วันที่สมัคร</b></font></td>
    <td width="14%" align="center" bgcolor="#EFEFEF"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
  </tr>
<?php
	$i = 0;	//ตัวเช็ควนรอบ
	$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		
	while($i < $num7)
	{
		
	$result7 = mysql_fetch_array($db_query7);	
			
	$sel_id		= $result7['sel_id'];
	$d_id		= $result7['d_id'];
	$ty_id 		= $result7['ty_id'];
	$s_id 		= $result7['s_id'];
	$sel_class 	= $result7['sel_class'];
	$sel_room 	= $result7['sel_room'];
	$sel_no 	= $result7['sel_no'];
	$date_add 	= $result7['date_add'];
	$status_sel	= $result7['status_sel'];
?>
  <tr>
    <td width="6%" height="30" align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="10%" height="30" align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$s_id		= $result7['s_id'];
			  
	$sql11 		= "select * from tb_student where s_id = '$s_id';";
	$db_query11	= mysql_query($sql11);
	$result11	= mysql_fetch_array($db_query11);
								
	$stu_id	= $result11['stu_id'];
	echo "$stu_id";
?>
    </font></td>
    <td width="36%" height="30" align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$s_id		= $result7['s_id'];
			  
	$sql8 		= "select * from tb_student where s_id = '$s_id';";
	$db_query8	= mysql_query($sql8);
	$result8	= mysql_fetch_array($db_query8);
								
	$stu_name	= $result8['stu_name'];
	echo "$stu_name";
?>
    </font></td>
    <td width="7%" height="30" align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$sel_class / $sel_room";?></font></td>
    <td width="7%" height="30" align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$sel_no";?></font></td>
    <td width="20%" height="30" align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$date_add";?></font></td>
    <td width="14%" align="center">
<?php
	if($status_sel	== 1)	//ถ้าจำนวนที่เบือกน้อยกว่าจำนวนจริง
	{
		echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#00CC00"><b>ลงทะเบียนแล้ว</b></font>';
	}
	else if($status_sel	== 2)	//ถ้าจำนวนที่เลือกเท่ากับจำนวนจริง
	{
		echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000"><b>ยกเลิก</b></font>';
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
<?php		
	}else if ($num7 == 0){		//ถ้าค่า num = 0 ให้แสดงข้อความนี้
		
		echo '<div align="center">'.'<img src="images/alert.png">'.'&nbsp;'.'<font size="4" face="Tahoma">'."ยังไม่มีข้อมูลการลงทะเบียนในรายวิชานี้".'</font>'.'</div>';
	}
?>
<?php
	}
	else if($status_in == 2){
		echo "<script>alert('ระบบลงทะเบียนกิจกรรมชุมนุมออนไลน์ปิดแล้ว');</script>";
		echo "<script langquage='javascript'>\n";
		echo " window.location=\"checklogout_stu.php\"\n";
		echo "</script>\n";
	}
?>
<?php
	//ส่วนของ User Authentication 
	}else{
		echo "<script langquage='javascript'>\n";
		echo " window.location=\"close.php\"\n";
		echo "</script>\n";
	}
?>
<br>
</body>
</html>