<?php
	session_start();
	include("connection.php");
	require_once("config.in.php");
?>
<?php		
	$d_id 		= $_GET['d_id'];
		
	$sql		= "SELECT * FROM tb_department where d_id = '$d_id'";
	$db_query 	= mysql_query($sql);
	$result 	= mysql_fetch_array($db_query);	
		
	$d_id		= $result['d_id'];
	$dep_id		= $result['dep_id'];
	$name_dep 	= $result['name_dep'];
	$credit		= $result['credit'];
	$atd 		= $result['atd'];
	$class	 	= $result['class'];
	$object 	= $result['object'];
	$group_dep	= $result['group_dep'];
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?='ชุมนุม'.'&nbsp;'."$name_dep".'&nbsp;'."($dep_id)";?></title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

<style type="text/css" media="print">
input {
	display:none;
}
</style>
</head>

<body>
<?php
	// ส่วนของการทำ User Authentication 
	if($_SESSION['lognum'] == 2 || $_SESSION['lognum'] == 3)
	{
?>
<br>
<div align="center"><b><font size="5" face="MS Sans Serif, Tahoma, sans-serif"><?=config_school;?></font></b></div>
<br>
<div align="center">
<font size="4" face="MS Sans Serif, Tahoma, sans-serif"><b>
<?php echo 'ชุมนุม'.'&nbsp;'."$name_dep".'&nbsp;'."($dep_id)";?><br>
<?php 
	$ty_id	= $result['ty_id'];
	
	$sql1 		= "select * from tb_term_year where ty_id = '$ty_id';";
	$db_query1	= mysql_query($sql1);
	$result1	= mysql_fetch_array($db_query1);	
	
	$year	= $result1['year'];
	echo 'ปีการศึกษา'.'&nbsp;'."$year".'<br>';
	echo 'ระดับชั้นมัธยมศึกษาปีที่'.'&nbsp;'."$class";
?>
</b></font>
</div>
<br>
<table width="60%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="36%" height="25" align="right" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อครูที่ปรึกษา</b></font>&nbsp;</td>
    <td width="64%" height="25" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
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
          <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
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
          <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
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
          <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
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
          <td><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
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
    <td height="25" align="right" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>จุดประสงค์กิจกรรม</b></font>&nbsp;</td>
    <td height="25" valign="middle">&nbsp;<font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo nl2br($object);?></font></td>
  </tr>
  <tr>
    <td height="25" align="right" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>คุณสมบัติผู้เรียน</b></font>&nbsp;</td>
    <td height="25" valign="middle">&nbsp;<font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $atd;?></font></td>
  </tr>
  <tr>
    <td height="25" align="right" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานที่จัดกิจกรรม</b></font>&nbsp;</td>
    <td height="25" valign="middle">&nbsp;<font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $classroom;?>
    </font></td>
  </tr>
  <tr>
    <td height="25" align="right" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>จำนวนที่รับสมัคร</b></font>&nbsp;</td>
    <td height="25" valign="middle">&nbsp;<font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $number;?>&nbsp; คน
<?php
	//ดึงค่าจำนวนออกมา
	$sqlc 		= mysql_query("SELECT COUNT(d_id) FROM tb_select_rally WHERE d_id='".$result['d_id']."' and ty_id='".$result['ty_id']."' ");
	$resultc 	= mysql_fetch_assoc($sqlc);
	
	echo '<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'.'(สมัครแล้ว ';
	print $resultc['COUNT(d_id)'];
	echo ' คน)'.'</font>';
?>
    </font></td>
  </tr>
  <tr>
    <td height="25" align="right" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font>&nbsp;</td>
    <td height="25" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">
<?php
	if($status_dep == 1)
	{
		echo '&nbsp;<font size="2" color="#00CC00"><b>เปิดรายวิชา</b></font>';
	}
	else if($status_dep == 2)
	{
		echo '&nbsp;<font size="2" color="#FF0000"><b>ดำเนินการเสร็จสิ้นแล้ว</b></font>';
	}
?>
    </font></td>
  </tr>
</table><br>
<?php		
	$d_id		= $_GET['d_id'];
	
	$sql7 		= "SELECT * FROM tb_select_rally where d_id = '$d_id' order by sel_id asc";
	$db_query7	= mysql_query($sql7);
	$num7		= mysql_num_rows($db_query7);
?>
<?php
	if ($num7 <> 0){	//ถ้าค่า num ไม่เท่ากับ o ให้แสดงข้อมูล
?>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right">
    <input name="image" type="image" value="print" onclick="window.print()" src="images/printer2.png" width="50" height="52" />
    <a href="report_show_word.php?d_id=<?=$result['d_id']?>" target="_blank">
    <input name="image2" type="image" value="print" src="images/exword.png" width="52" height="48" /></a>
    <a href="report_list_name.php?d_id=<?=$result['d_id']?>" target="_blank">
    <input name="image3" type="image" value="print" src="images/list-name.png" width="52" height="48" /></a>
    </td>
  </tr>
</table>
<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="7%" height="29" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="15%" height="29" align="center" bgcolor="#EFEFEF"><b><font size="2" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว</font></b></td>
    <td width="37%" height="29" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ - สกุล</b></font></td>
    <td width="9%" height="29" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ห้อง</b></font></td>
    <td width="8%" height="29" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></td>
    <td width="24%" height="29" align="center" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>วันที่สมัคร</b></font></td>
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
    <td width="7%" height="20" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="15%" height="20" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$s_id		= $result7['s_id'];
			  
	$sql11 		= "select * from tb_student where s_id = '$s_id';";
	$db_query11	= mysql_query($sql11);
	$result11	= mysql_fetch_array($db_query11);
								
	$stu_id		= $result11['stu_id'];
	echo "$stu_id";
?>
     </font></td>
    <td width="37%" height="20" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$s_id		= $result7['s_id'];
			  
	$sql8 		= "select * from tb_student where s_id = '$s_id';";
	$db_query8	= mysql_query($sql8);
	$result8	= mysql_fetch_array($db_query8);
								
	$stu_name	= $result8['stu_name'];
	echo "$stu_name";
?>
    </font></td>
    <td width="9%" height="20" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$sel_class / $sel_room";?></font></td>
    <td width="8%" height="20" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$sel_no";?></font></td>
    <td width="24%" height="20" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$date_add";?></font></td>
  </tr>
<?php
	$i++;
	$a++;
		}				
?>   
</table>
<?php		
	}else if ($num7 == 0){		//ถ้าค่า num = 0 ให้แสดงข้อความนี้
		
		echo '<div align="center">'.'<img src="images/alert.png">'.'&nbsp;'.'<font size="3" face="Tahoma">'."ยังไม่มีข้อมูลการลงทะเบียนในรายวิชานี้".'</font>'.'</div>';
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
</body>
</html>