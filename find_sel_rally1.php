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

<script type="text/javascript">
function con_del(){
if (confirm("ยืนยันการลบข้อมูล") ==true){
return true;
}
return false;
}
</script>

<STYLE>
.tbl:hover{							
	background-color: #D6E7D1;	/*สีเมื่อเมาส์ไปโดน*/
	cursor: pointer;		/*สร้างสัญลักเมาส์คลิ๊ก*/
}.tbl2:hover{							
	background-color: #D6E7D1;	/*สีเมื่อเมาส์ไปโดน*/
}
</STYLE>

<style type="text/css">
/*css สำหรับกำหนดปุ่ม go to top แบบชิดขอบล่างขวา แบบ fixed ตำแหน่ง*/
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
	$sql_o		= "select * FROM tb_on_off";
	$db_query_o = mysql_query($sql_o);
	$result_o 	= mysql_fetch_array($db_query_o);	

	$o_id			= $result_o['o_id'];
	$post		= $result_o['post'];
	$o_status	= $result_o['o_status'];

	if($o_status == 1)		//เงื่อนไขตรวจสอบสถานะประกาศปิดระบบ
	{
?>
<?php
	// ส่วนของการทำ User Authentication 
	if($_SESSION['lognum'] == 1)
	{
?>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr valign="top">
    <td valign="top">    
    <table width="100%" height="800" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
      <tr>
        <td height="289" colspan="2" valign="top" background="images/pic/banner.jpg"><table width="100%" height="50" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5%" height="50">&nbsp;</td>
            <td width="68%" valign="middle"><a href="<?='http://'.config_url;?>" target="_blank"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#007BB7"><b><?=config_url;?></b></font></a></td>
            <td width="25%" align="right" valign="middle"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#FFFFFF"><b><a href="index_stu.php">กลับหน้าหลัก</a></b></font></td>
            <td width="2%" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="23%" valign="top"><?php include "menu_stu.php";?></td>
        <td width="77%" align="center" valign="top">
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">
<?php
	//session แสดงการเข้าสู่ระบบ
	$student_id 	= $_SESSION['student_id'];
	$user_id		= $_SESSION['user_id'];
	$student_name 	= $_SESSION['student_name'];
	$student_room 	= $_SESSION['student_room'];
	$student_no 	= $_SESSION['student_no'];
				  
	$sql1 		= "select * from tb_student where stu_id = '$student_id';";		//session = id ในตาราง
	$db_query1	= mysql_query($sql1);
	$result1	= mysql_fetch_array($db_query1);
												
	$stu_id		= $result1['stu_id'];
	$stu_name	= $result1['stu_name'];
	$class_id	= $result1['class_id'];							
	$id_card	= $result1['id_card'];
	$room		= $result1['room'];
	$no			= $result1['no'];
	$status_stu	= $result1['status_stu'];
?>
              <font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><?php echo "$student_id".'&nbsp;'.":".'&nbsp;'."$stu_name".'&nbsp;'.'&nbsp;'."ชั้นมัธยมศึกษาปีที่".'&nbsp;'."$class_id".'&nbsp;'."/".'&nbsp;'."$room".'&nbsp;'."เลขที่".'&nbsp;'."$no";?></b></font><br>
              <img src="images/horz_1.gif"></td>
          </tr>
        </table>
        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="images/stuu_sel.jpg"></td>
          </tr>
        </table>
<br>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" colspan="2"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000"><b>ข้อตกลงในการเลือกชุมนุม</b></font></td>
  </tr>
  <tr>
    <td width="8%">&nbsp;</td>
    <td width="92%"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">- ให้นักเรียนทุกคนอ่านรายละเอียดชุมนุมก่อนลงทะเบียนกิจกรรมชุมนุมทุกครั้ง</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">- ใน 1 ปีการศึกษา นักเรียนจะมีกิจกรรมชุมนุมได้แค่ 1 กิจกรรมชุมนุมเท่านั้น ห้ามสมัครมากกว่า 1 ชุมนุมเด็ดขาด!</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">- หากต้องการยกเลิกกิจกรรมชุมนุมที่เลือกไว้แล้ว สามารถยกเลิกกิจกรรมชุมนุมนั้นได้ทันที โดยกดที่</font>&nbsp;<img src="images/delete.png" width="20" height="20" border="0" align="middle" />
    	<br>
    	&nbsp;&nbsp;<font size="2"face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">(สามารถยกเลิกได้เฉพาะปีการศึกษาที่ทำการเลือกเท่านั้น)</font></td>
  </tr>
</table>
<br>
<div align="right">
<?php 
	$sql	  	= "SELECT * FROM tb_select_rally where s_id ='$user_id' order by sel_id asc";
	$db_query 	= mysql_query($sql);
	$num      	= mysql_num_rows($db_query);
	
	echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลกิจกรรมชุมนุมที่เลือกทั้งหมด ";?><?php echo '<b>'.$num.'</b>'." รายการ".'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'</font>';
?>
</div>
<br>
<?php
	if ($num <> 0){	//ถ้าค่า num ไม่เท่ากับ o ให้แสดงข้อมูล
?>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td width="8%" height="30" align="center" bgcolor="#F3F3F3"><b><font size="4" face="MS Sans Serif, Tahoma, sans-serif">ลำดับ</font></b></td>
    <td width="49%" height="30" align="center" bgcolor="#F3F3F3"><b><font size="4" face="MS Sans Serif, Tahoma, sans-serif">ชื่อกิจกรรมชุมนุมที่สมัคร</font></b></td>
    <td width="15%" height="30" align="center" bgcolor="#F3F3F3"><b><font size="4" face="MS Sans Serif, Tahoma, sans-serif">ปีการศึกษา</font></b></td>
    <td width="19%" height="30" align="center" bgcolor="#F3F3F3"><b><font size="4" face="MS Sans Serif, Tahoma, sans-serif">ชั้น/เลขที่</font></b></td>
    <td width="9%" height="30" align="center" bgcolor="#F3F3F3"><b><font size="4" face="MS Sans Serif, Tahoma, sans-serif">ยกเลิก</font></b></td>
    </tr>
<?php	
	$ie =0;
	$a 	=1;
	while($ie < $num)
	{
	$result = mysql_fetch_array($db_query);	
		
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
  <tr class="tbl2">
    <td width="8%" height="27" align="center" class="tbl" onClick="window.open('report_show.php?d_id=<?=$d_id?>')"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a;?></font></td>
    <td width="49%" height="27" align="center" class="tbl" onClick="window.open('report_show.php?d_id=<?=$d_id?>')"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php 			  
	$sql2 		= "select * from tb_department where d_id = '$d_id';"; 	
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
								
	$d_id		= $result2['d_id'];
	$dep_id		= $result2['dep_id'];
	$name_dep	= $result2['name_dep'];
	echo "$name_dep";
?>
    </font></td>
    <td width="15%" align="center" class="tbl" onClick="window.open('report_show.php?d_id=<?=$d_id?>')"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php 			  
	$sql1 		= "select * from tb_term_year where ty_id = '$ty_id';"; 	
	$db_query1	= mysql_query($sql1);
	$result1	= mysql_fetch_array($db_query1);
								
	$year		= $result1['year'];
	echo "$year";
?></font>   
    </td>
    <td width="19%" align="center" class="tbl" onClick="window.open('report_show.php?d_id=<?=$d_id?>')"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "ม. $sel_class / $sel_room "."เลขที่".'&nbsp;'.$sel_no;?></font></td>
    <td width="9%" align="center" class="tbl2">
      
<?php		
	$sql_l		= "SELECT * FROM tb_log_index";
	$db_query_l = mysql_query($sql_l);
	$result_l	= mysql_fetch_array($db_query_l);	

	$in_id		= $result_l['in_id'];	
	$name_in	= $result_l['name_in'];
	$status_in	= $result_l['status_in'];
?>    
<?php
	if($status_in == 1) {		//ระบบเปิด
?>
  <a href="del_sel2.php?sel_id=<?=$sel_id?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a>
  <?php
	}else if ($status_in == 2) {		//ระบบปิด
		
	echo '<img src="images/x.png" width="21" height="25" border="0" align="middle">';
	}
?>
    </td>
    </tr>
<?php 
	$ie ++;
	$a ++;
	}
?>     
</table>
 <?php		
	}else{		//ถ้าค่า num = 0 ให้แสดงข้อความนี้
		
	echo '<div align="center">'.'<img src="images/alert.png">'.'&nbsp;'.'<font size="4" face="Tahoma">'."ยังไม่มีข้อมูลการลงทะเบียนกิจกรรมชุมนุมค่ะ".'</font>'.'</div>';
	}
?>   
      </td>
      </tr>
    </table></td>
  </tr>
</table>
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
<?php include "tbl_text2.php";?>
<?php
	//ส่วนของ User Authentication 
	}else{
		echo "<script langquage='javascript'>\n";
		echo " window.location=\"index.php\"\n";
		echo "</script>\n";
	}
?>
<?php
	}
	else if($o_status == 2){
			
	include "new.php";		//ปิดประกาศข่าวระบบ
	}	
?>
</body>
</html>