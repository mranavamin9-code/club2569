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

<STYLE>
.btn{
	padding: 10px;
	background-color:#F2F2F2;	/*สีปุ่ม*/
	font-size:15px;
	color:#000;					/*สีตัวอักษร*/
	border-radius: 15px;		/*ความโค้ง*/
}
.btn:hover{							/*สีเมื่อเมาส์ไปโดน*/
	background-color: #E5E5E5;
}		
.color1:active{						/*สีเมื่อกด*/
	background-color: #336699;
}
.color2:active{						/*สีเมื่อกด*/
	background-color: #F30;
}
.tbl:hover{							
	background-color: #D6E7D1;	/*สีเมื่อเมาส์ไปโดน*/
}
</STYLE>

<script type="text/javascript">
function con_del(){
if (confirm("ยืนยันการลบข้อมูล") ==true){
return true;
}
return false;
}
</script>

<style type="text/css">
/*
css สำหรับกำหนดปุ่ม go to top แบบชิดขอบล่างขวา แบบ fixed ตำแหน่ง
*/
#gotoTop{
	position:fixed;
	margin:auto;
	right:0px;
	bottom:0px;
	border:0px;
	cursor:pointer;
	z-index: 99;
	display:none;
}
</style>
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
          
          <form action="" method="post"  name="form_search_cus" id="form_search">
          <table width="60%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
            <tr>
              <td><table width="100%" border="1" bordercolor="#FFFFFF" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                <tr>
                  <td height="35" colspan="3" align="center" bgcolor="#F9F9F9"><font size="5" color="#FF6600" face="MS Sans Serif, Tahoma, sans-serif"><b>ตรวจสอบข้อมูลนักเรียน</b></font></td>
                </tr>
                <tr>
                  <td width="40%" height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสนักเรียน :</font></td>
                  <td width="2%" height="35" valign="middle">&nbsp;</td>
                  <td width="58%" height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;&nbsp;<input name="id" type="text" id="id" size="10" /></td>
                </tr>
                <tr>
                  <td height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ-นามสกุล :</font></td>
                  <td height="35" valign="middle">&nbsp;</td>
                  <td height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;
                    <input name="namestu" type="text" id="namestu" size="30" /></td>
                </tr>
                <tr>
                  <td height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ระดับชั้น :</font></td>
                  <td height="35" valign="middle">&nbsp;</td>
                  <td height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;
<?php 
		$sql3 = "SELECT * FROM tb_class order by class_id asc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
		$result3 = mysql_query($sql3);	//เปลี่ยนเป็นคำสั่ง
		$num3 = mysql_num_rows($result3);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
			
		print("<select name =\"name\" style =\"width: 150px\">");
										
		print("<option value=''>-เลือกระดับชั้น-</option>");
										
		while($rs3 = mysql_fetch_array($result3))
		{
		print("<option value=$rs3[class_id]>$rs3[class]</option>");
		}
		print("</select>");
?></td>
                </tr>
                <tr>
                  <td height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ห้อง :</font></td>
                  <td height="35" valign="middle">&nbsp;</td>
                  <td height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;
                    <select name="room_stu" style="width: 100px">
                      <option value="">-เลือกห้อง-</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                    </select></td>
                </tr>
                <tr>
                  <td height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะ :</font></td>
                  <td height="35" valign="middle">&nbsp;</td>
                  <td height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;
                    <select name="status" style="width: 150px">
                      <option value="">-เลือกสถานะ-</option>
                      <option value="1">อยู่ในระบบ</option>
                      <option value="2">จบการศึกษา</option>
                      <option value="3">ยกเลิกใช้งาน</option>
                    </select></td>
                </tr>
                <tr>
                  <td height="40" valign="middle">&nbsp;</td>
                  <td height="40" valign="middle">&nbsp;</td>
                  <td height="40" valign="middle">&nbsp;
                    <button type="submit" name="button" id="button2" style="height:30px; font-size:15px;"><img src="images/search_icon.png" width="24" height="24" align="absmiddle" /> ค้นหาข้อมูล</button></td>
                </tr>
              </table></td>
            </tr>
          </table>
          </form>
          <br>
          <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="37%" height="35" align="left"><a href="det_csv_stu.php" target="_blank"><img src="images/upload.png" width="240" /></a></td>
              <td width="41%" align="right">
              <a href="mgt_stu.php" target="_blank"><button name="button" class="btn color2"><img src="images/list_edit.png" width="20" height="20" align="absmiddle" /> จัดการข้อมูลนักเรียนเพิ่มเติม</button></a>               
              </td>
              <td width="22%" align="right"><button type="submit" name="button" id="button" class="btn color1" onclick="window.open('form_stu.php','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/add3.png" width="20" height="20" align="absmiddle" /> เพิ่มข้อมูลนักเรียน</button>              
              </td>
            </tr>
          </table><br>
<?php	
	//ค่าจากตัวรับข้อมูลหน้าเว็บ
	$id	 		= $_POST['id'];
	$namestu	= $_POST['namestu'];
	$name 		= $_POST['name'];
	$room_stu	= $_POST['room_stu'];
	$status 	= $_POST['status'];

	if(empty($id)&&empty($namestu)&&empty($name)&&empty($room_stu)&&empty($status))
	{
		echo "<br>";
		echo "<font size=3>**กรุณาระบุข้อมูลก่อนค้นหา**</font><br><br>";		//จะแสดงข้อความ
		
	}else if($room_stu == 1)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br>ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%"><?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}else if($room_stu == 2)
	{
	
	$sql 		= "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num		= mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br>ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
  </tr>
  <?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}else if($room_stu == 3)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br>ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}else if($room_stu == 4)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br>ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$id_card	= $result['id_card'];;
			$room		= $result['room'];
			$no			= $result['no'];
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}else if($room_stu == 5)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>

<?php
	}else if($room_stu == 6)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=5000, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=5000, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>

<?php
	}else if($room_stu == 7)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>

<?php
	}else if($room_stu == 8)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}else if($room_stu == 9)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}else if($room_stu == 10)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>

<?php
	}else if($room_stu == 11)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}else if($room_stu == 12)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
<?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}else if($room_stu == 13)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
<?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}else if($room_stu == 14)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
<?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}else if($room_stu == 15)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
<?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}else if($room_stu == 16)
	{
	
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' and room ='$room_stu' order by s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
		
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
<?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}else{
		
	$sql = "SELECT * FROM  tb_student where stu_id like '%$id%' and stu_name like '%$namestu%' and class_id like '%$name%' and status_stu like '%$status%' order by  s_id , stu_id asc";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	
?>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'<font size="2" face="MS Sans Serif, Tahoma, sans-serif">'." (เรียงลำดับตามรหัสประจำตัว)".'</font>'.'<br>'.'<br>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">รหัสประจำตัว</font></td>
    <td width="31%" bgcolor="#EAEAEA"><font size="2">ชื่อ-นามสกุล</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">ระดับชั้น/ห้อง</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">เลขที่</font></td>
    <td width="15%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2">ราย<br />
      ละเอียด</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
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
			$status_stu	= $result['status_stu'];
?>
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="15%"><font size="2"><?php echo $stu_id;?></font></td>
    <td width="31%"><font size="2"><?php echo $stu_name;?></font></td>
    <td width="11%"><font size="2">
<?php
	$class_id	= $result['class_id'];
	
	$sql3 		= "select * from tb_class where class_id = '$class_id' ;";		//session = id ในตาราง
	$db_query3	= mysql_query($sql3);
	$result3	= mysql_fetch_array($db_query3);
											
	$class		= $result3['class'];
	
	echo "ม.".'&nbsp;'."$class".'&nbsp;'."/".'&nbsp;'."$room";
?>
      </font></td>
    <td width="5%"><font size="2"><?php echo $no;?></font></td>
    <td width="15%">
<?php
	if($status_stu == 1)
	{
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
    <td width="6%"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%"><a href="del_stu.php?s_id=<?=$s_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
  <?php
	$a++;
	$i++;
	}
?>
</table>
<br>
<table width="30%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" align="center"><a href="report_all_stu.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"> <img src="images/f2.png" width="30" height="30" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_word.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Word</font></a>
    </td>
    <td width="10%" align="center"><a href="report_all_stu_excel.php?id=<?=$id?>&namestu=<?=$namestu?>&name=<?=$name?>&room_stu=<?=$room_stu?>&status=<?=$status?>" target="_blank"><img src="images/exexcel.png" width="45" height="32" border="0" /><br>
    <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด<br>Excel สำหรับ แปลงไฟล์ CSV</font></a>
    </td>
  </tr>
</table>
<?php
	}
?>
</td>
        </tr>
      </table><br>
      </td>
  </tr>
</table>
<?php include "tbl_text2.php";?>	<!--ส่วนล่างสุด-->
<!--เริ่ม top-->
<img id="gotoTop" src="images/icontop.png" width="100" height="100" border="0" />
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
$(function(){
	// เงื่อนไข event เมื่อมีการเลื่อน scrollbar ในหน้าเพจ
	 $(window).scroll(function(){
		 if($(document).scrollTop()>100){  // เงื่อนไขขอบบนสุดของ หน้าเพจ มากกว่า 100 pixels หรือไม่
			 $("#gotoTop").fadeIn(); // ถ้ามากกว่าให้แสดง ปุ่ม  go to top 
		 }else{
			 $("#gotoTop").hide(); // ถ้าน้อยกว่าให้ซ่อน ปุ่ม go to top 
		 }
	 });
	 // เงื่อนไขเมื่อมีการคลิกที่ปุ่ม go to top
	 $("#gotoTop").click(function(){
		$('html, body').animate({ // สร้างการเคลื่อนไหว
			scrollTop: $(document.body).offset().top // ให้หน้าเพจเลื่อนไปทำตำแหน่งบนสุด
		}, 500); // ภายในเวลา 0.5 วินาที ---- 1000 เท่ากับ 1 วินาที	 
	 });
});
</script>
<!--จบ top-->
<?php
}else{
	echo "<script langquage='javascript'>\n";
	echo "window.location=\"index.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>