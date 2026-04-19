<?php
	session_start();
	include("connection.php");
	require_once("config.in.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายงานข้อมูลกิจกรรมชุมนุม</title>
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
<?php	
		$id	 		= $_GET['id'];
		$namedep	= $_GET['namedep'];
		$ty 		= $_GET['ty'];
		$class_stu	= $_GET['class_stu'];
		$status 	= $_GET['status'];
	
		$sql = "SELECT * FROM  tb_department where dep_id like '%$id%' and name_dep like '%$namedep%' and ty_id = '$ty' and class like '%$class_stu%' and status_dep like '%$status%' order by d_id desc";
		
		$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
		$num      = mysql_num_rows($db_query);
?>
<div align="center">
<img src="images/logo-school.png" width="120"><br>
<b><font size="6" face="MS Sans Serif, Tahoma, sans-serif">รายงานข้อมูลกิจกรรมชุมนุม</font><br><font size="5" face="MS Sans Serif, Tahoma, sans-serif"></font></b></div><br>

<div align="left"><input name="image" type="image" value="print" onclick="window.print()" src="images/printer2.png" width="52" height="52" /></div><br>
<table align="center" width="1500" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="50" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="373" bgcolor="#EAEAEA"><font size="2">ชื่อกิจกรรมชุมนุม</font></td>
    <td width="88" bgcolor="#EAEAEA"><font size="2">คาบเรียน</font></td>
    <td width="142" bgcolor="#EAEAEA"><font size="2">คุณสมบัติ<br />
      ผู้เรียน</font></td>
    <td width="50" bgcolor="#EAEAEA"><font size="2">จ.น.<br />
      ที่รับ</font></td>
    <td width="50" bgcolor="#EAEAEA"><font size="2">รับแล้ว</font></td>
    <td width="311" bgcolor="#EAEAEA"><font size="2">ครูผู้สอน</font></td>
    <td width="206" bgcolor="#EAEAEA"><font size="2">สถานที่<br />
    จัดกิจกรรม</font></td>
    <td width="59" bgcolor="#EAEAEA"><font size="2">ระดับ<br>ชั้น</font></td>
    <td width="40" bgcolor="#EAEAEA"><font size="2">ปีการ<br>ศึกษา</font></td>
    <td width="107" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
  </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$d_id		= $result['d_id'];
			$dep_id		= $result['dep_id'];
			$name_dep	= $result['name_dep'];
			$atd		= $result['atd'];
			$class		= $result['class'];
			$object		= $result['object'];
			$classroom	= $result['classroom'];
			$period		= $result['period'];
			$number		= $result['number'];
			$tea_id1	= $result['tea_id1'];
			$tea_id2	= $result['tea_id2'];
			$tea_id3	= $result['tea_id3'];
			$tea_id4	= $result['tea_id4'];
			$tea_id5	= $result['tea_id5'];
			$ty_id		= $result['ty_id'];
			$status_dep	= $result['status_dep'];
?>
  <tr>
    <td width="50" height="30" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $dep_id;?> <?php echo $name_dep;?></font></td>
    <td width="88" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $period;?></font></td>
    <td width="142" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $atd;?></font></td>
    <td width="50" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $number;?></font></td>
    <td width="50" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	//ดึงค่าจำนวนออกมา
	$sql2 = mysql_query("SELECT COUNT(d_id) FROM tb_select_rally WHERE d_id='".$result['d_id']."' and ty_id='".$result['ty_id']."' ");
	$result2 = mysql_fetch_assoc($sql2);
	
	echo '<font size="2" face="MS Sans Serif, Tahoma, sans-serif">';
	print $result2['COUNT(d_id)'];
	echo '</font>';
?>
    </font></td>
    <td width="311" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id1	= $result['tea_id1'];
			  
	$sql5 		= "select * from tb_teacher where t_id = '$tea_id1';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
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
            <td align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id2	= $result['tea_id2'];
			  
	$sql4 		= "select * from tb_teacher where t_id = '$tea_id2';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
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
            <td align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id3	= $result['tea_id3'];
			  
	$sql6 		= "select * from tb_teacher where t_id = '$tea_id3';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query6	= mysql_query($sql6);	//ถอดข้อความให้เป็นคำสั่ง
	$result6	= mysql_fetch_array($db_query6);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result6['pname'];
	$fname	= $result6['fname'];
	$lname	= $result6['lname'];
	echo "$pname "."$fname "."$lname";
?>
            </font></td>
          </tr>
          <tr>
            <td align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id4		= $result['tea_id4'];
			  
	$sql7 		= "select * from tb_teacher where t_id = '$tea_id4';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query7	= mysql_query($sql7);	//ถอดข้อความให้เป็นคำสั่ง
	$result7	= mysql_fetch_array($db_query7);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result7['pname'];
	$fname	= $result7['fname'];
	$lname	= $result7['lname'];
	echo "$pname "."$fname "."$lname";
?>
            </font></td>
          </tr>
          <tr>
            <td align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id5	= $result['tea_id5'];
			  
	$sql8 		= "select * from tb_teacher where t_id = '$tea_id5';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query8	= mysql_query($sql8);	//ถอดข้อความให้เป็นคำสั่ง
	$result8	= mysql_fetch_array($db_query8);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result8['pname'];
	$fname	= $result8['fname'];
	$lname	= $result8['lname'];
	echo "$pname "."$fname "."$lname";
?>
            </font></td>
          </tr>
        </table>
    </font></td>
    <td width="206" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $classroom;?></font></td>
    <td width="59" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $class;?></font></td>
    <td width="40" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$ty_id	= $result['ty_id'];
			  
	$sqlty 		= "select * from tb_term_year where ty_id = '$ty_id';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_queryty	= mysql_query($sqlty);	//ถอดข้อความให้เป็นคำสั่ง
	$resultty	= mysql_fetch_array($db_queryty);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$year	= $resultty['year'];
	echo "$year";
?>
    </font></td>
    <td width="107" align="center" valign="top"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	if($result2['COUNT(d_id)'] < $number)	//ถ้าจำนวนที่เบือกน้อยกว่าจำนวนจริง
	{
		echo '<font color="#00CC00"><b>ว่าง</b></font>';
	}
	else if($result2['COUNT(d_id)'] == $number)	//ถ้าจำนวนที่เลือกเท่ากับจำนวนจริง
	{
		echo '<font color="#FF0000"><b>เต็ม</b></font>';
	}
	else if($result2['COUNT(d_id)'] > $number)	//ถ้าเกิน
	{
		echo '<font color="#FF9900"><b>เกิน</b></font>';
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
	//ส่วนของ User Authentication 
}else{
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"index.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>