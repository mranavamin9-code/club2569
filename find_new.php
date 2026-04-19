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
.btn:active{						/*สีเมื่อกด*/
	background-color: #336699;
}
</STYLE>

<STYLE>
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
          <table width="50%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
            <tr>
              <td><table width="100%" border="1" bordercolor="#FFFFFF" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                <tr>
                  <td height="35" colspan="3" align="center" bgcolor="#F9F9F9"><font size="5" color="#FF6600" face="MS Sans Serif, Tahoma, sans-serif"><b>ตรวจสอบข้อมูลประกาศ</b></font></td>
                </tr>
                <tr>
                  <td width="40%" height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะ :</font></td>
                  <td width="2%" height="35" valign="middle">&nbsp;</td>
                  <td width="58%" height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;
                    <select name="status" style="width: 150px">
                      <option value="">-เลือกสถานะ-</option>
                      <option value="1">หน้าแรก</option>
                      <option value="2">นักเรียน</option>
                      <option value="3">ครูผู้สอน</option>
                      <option value="4">รอประกาศ</option>
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
   	<td width="48%" height="35" align="right"><button type="submit" name="button" id="button" class="btn" onclick="window.open('form_new.php','windowname2','width=800, \height=450, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/add3.png" width="20" height="20" align="absmiddle" /> เพิ่มข้อมูลข่าวประกาศ</button></td>
  </tr>
</table><br>
<?php	
	//ค่าจากตัวรับข้อมูลหน้าเว็บ
	$status 	= $_POST['status'];
	
	$sql 		= "SELECT * FROM  tb_newupdate where status_new like '%$status%' order by new_id desc";
	$db_query 	= mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      	= mysql_num_rows($db_query);
?>
<?php echo '<div align="right">'.'<font size="3" face="Tahoma">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'</div>';?>
<?php
	if($num <> 0){	//ถ้าค่า num ไม่เท่ากับ o ให้แสดงข้อมูล
?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></td>
    <td width="47%" bgcolor="#EAEAEA"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เรื่อง</b></font></td>
    <td width="18%" bgcolor="#EAEAEA"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>วันที่ประกาศ</b></font></td>
    <td width="12%" bgcolor="#EAEAEA"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ประกาศถึง</b></font></td>
    <td width="6%" bgcolor="#EAEAEA"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ราย<br />
      ละเอียด</b></font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>แก้ไข</b></font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลบ</b></font></td>
  </tr>
<?php 
		$i = 0;	//ตัวเช็ควนรอบ
		$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
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
  <tr align="center" class="tbl">
    <td width="7%" height="26" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="47%" align="left"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $sub_new;?></font></td>
    <td width="18%" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $new_date;?></font></td>
    <td width="12%" align="center">
<?php
	if($status_new == 1)
	{
		echo '<font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#0000FF">'."หน้าแรก".'</font>';
		
	}else if($status_new == 2){
		
		echo '<font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600">'."นักเรียน".'</font>';
		
	}else if($status_new == 3){
		
		echo '<font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#009900">'."ครูผู้สอน".'</font>';
		
	}else{
		
		echo '<font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#6D2D95">'."รอประกาศ".'</font>';
	}
?></td>
    <td width="6%" align="center"><a href="javascript" onclick="window.open('det_new.php?new_id=<?=$new_id?>','windowname2','width=850, \height=400, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%" align="center"><a href="javascript" onclick="window.open('edit_new.php?new_id=<?=$new_id?>','windowname2','width=800, \height=450, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    <td width="5%" align="center"><a href="del_new.php?new_id=<?=$new_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
<?php
	$a++;
	$i++;
	}
?>  
</table><br>
<table width="10%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="43%" align="center"><a href="report_all_new.php?status=<?=$status?>" target="_blank"><img src="images/f2.png" width="30" height="30" border="0" /><br /><font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a></td>
    </tr>
</table>
<?php		
	}else{		//ถ้าค่า num = 0 ให้แสดงข้อความนี้
		
		echo '<div align="center">'.'<img src="images/alert.png">'.'&nbsp;'.'<font size="4" face="Tahoma">'."ยังไม่มีข่าวประกาศใหม่ค่ะ".'</font>'.'</div>';
	}
?>
</td>
        </tr>
      </table>
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
//ส่วนของ User Authentication 
}else{
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"index.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>