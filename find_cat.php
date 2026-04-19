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

<!--ควบคุม btn-->
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
<!--จบควบคุม btn-->

<!--ควบคุม table-->
<STYLE>
.tbl:hover{							
	background-color: #D6E7D1;	/*สีเมื่อเมาส์ไปโดน*/
}
</STYLE>
<!--จบควบคุม table-->

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
											
	$t_id		= $result_ss['t_id'];
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
          
          <form action="" method="post"  name="form_cat" id="form_search">
          <table width="60%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
            <tr>
              <td><table width="100%" border="1" bordercolor="#FFFFFF" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                <tr>
                  <td height="35" colspan="3" align="center" bgcolor="#F9F9F9"><font size="5" color="#FF6600" face="MS Sans Serif, Tahoma, sans-serif"><b>ตรวจสอบข้อมูลกลุ่มสาระการเรียนรู้</b></font></td>
                </tr>
                <tr>
                  <td width="40%" height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อกลุ่มสาระการเรียนรู้ :</font></td>
                  <td width="2%" height="35" valign="middle">&nbsp;</td>
                  <td width="58%" height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;
<?php 
	$sql3 = "SELECT * FROM tb_category order by cat_id asc";	
	$result3 = mysql_query($sql3);	
	$num3 = mysql_num_rows($result3);
							
	print("<select name =\"name\" style =\"width: 150px\">");
										
	print("<option value=''>-เลือกกลุ่มสาระ-</option>");
										
	while($rs3 = mysql_fetch_array($result3))
	{
	print("<option value=$rs3[cat_id]>$rs3[cat_name]</option>");
	}
	print("</select>");
?></td>
                </tr>
                <tr>
                  <td height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะ :</font></td>
                  <td height="35" valign="middle">&nbsp;</td>
                  <td height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;
                    <select name="status2" style="width: 150px">
                      <option value="">-เลือกสถานะ-</option>
                      <option value="1">ใช้งานอยู่</option>
                      <option value="2">ยกเลิกใช้งาน</option>
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
              <td width="48%" align="right"><button type="submit" name="button" id="button" class="btn" onclick="window.open('form_cat.php','windowname2','width=750, \height=200, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/add3.png" width="20" height="20" align="absmiddle" /> เพิ่มข้อมูลกลุ่มสาระการเรียนรู้</button></td>
            </tr>
          </table>
          <br>
<?php	
	$name 		= $_POST['name'];
	$status 	= $_POST['status'];
	
	$sql = "SELECT * FROM  tb_category where cat_id like '%$name%' and status_cat like '%$status%' order by cat_id asc";
		
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);
?>
<?php echo '<div align="right">'.'<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ".'<b>'.$num.'</b>'." รายการ".'</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'</div>';?>
<table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
  <tr align="center">
    <td width="7%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
    <td width="11%" bgcolor="#EAEAEA"><font size="2">รหัส</font></td>
    <td width="44%" bgcolor="#EAEAEA"><font size="2">ชื่อกลุ่มสาระการเรียนรู้</font></td>
    <td width="28%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="5%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
    </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$cat_id		= $result['cat_id'];
			$cat_name	= $result['cat_name'];
			$status_cat	= $result['status_cat'];
?>  
  <tr align="center" class="tbl">
    <td width="7%" height="26"><font size="2"><?php echo $a;?></font></td>
    <td width="11%"><font size="2"><?php echo $cat_id;?></font></td>
    <td width="44%"><font size="2"><?php echo $cat_name;?></font></td>
    <td width="28%"><font size="2">
<?php
	if($status_cat == 1)
	{
		echo '<font size="2" color="#009900">'."ใช้งานอยู่".'</font>';
		
	}if($status_cat == 2)
	{
		
		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></font></td>
    <td width="5%"><a href="javascript" onclick="window.open('edit_cat.php?cat_id=<?=$cat_id?>','windowname2','width=750, \height=200, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
    </tr>
<?php
	$a++;
	$i++;
	}
?>  
</table>

<br></td>
        </tr>
      </table> 
      </td>
  </tr>
</table>
<?php include "tbl_text2.php";?>	<!--ส่วนล่างสุด-->
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