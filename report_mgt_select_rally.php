<?php
	session_start();
	include("connection.php");
?>
<?php
	$class	= $_GET['class'];
	$room	= $_GET['room'];
	$year	= $_GET['year'];
	
	$sql_y		= "SELECT * FROM tb_term_year where ty_id = '$year'";
	$db_query_y = mysql_query($sql_y);
	$result_y 	= mysql_fetch_array($db_query_y);	
	
	$year 		= $result_y['year'];
?>
<?php	
	header("Content-type: application/vnd.ms-word");		//คำสั่งดาวน์โหลด
	header("Content-Disposition: attachment; filename=ข้อมูลกิจกรรมชุมนุม ระดับชั้น ม. $class/$room ปีการศึกษา $year.doc");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?='ข้อมูลกิจกรรมชุมนุม ระดับชั้น ม.'."$class".'/'."$room".'ปีการศึกษา '."$year";?></title>
<!--กระดาษแนวนอน-->
<style>
@page Section {size:841.7pt 595.45pt;mso-page-orientation:landscape;margin:1.25in 1.0in 1.25in 1.0in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}
div.Section {page:Section;}
</style>
</head>

<body>
<div class=Section>
<?php	
	$class	= $_GET['class'];
	$room	= $_GET['room'];
	$year	= $_GET['year'];
	
	$sql		= "SELECT * FROM tb_select_rally where sel_class = '$class' and sel_room = '$room' and ty_id = '$year' order by sel_no asc";
	
	$db_query	= mysql_query($sql);
	$num      	= mysql_num_rows($db_query);
?>
<div align="center">
<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ข้อมูลกิจกรรมชุมนุม <br>
<?php	
	$sql4		= "SELECT * FROM tb_term_year where ty_id = '$year'";
	$db_query4 	= mysql_query($sql4);
	$result4 	= mysql_fetch_array($db_query4);	
	
	$year 		= $result4['year'];
?>
<?php echo "ระดับชั้น ม. ".$class." / ".$room." ปีการศึกษา $year";?></b></font>
</div><br>
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
</div>
</body>
</html>