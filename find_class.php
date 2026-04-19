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
          
          <form action="check_class.php" method="get"  name="form_search" id="form_search" target="_blank">
          <table width="50%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
            <tr>
              <td><table width="100%" border="1" bordercolor="#FFFFFF" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                <tr>
                  <td height="35" colspan="3" align="center" bgcolor="#F9F9F9"><font size="5" color="#FF6600" face="MS Sans Serif, Tahoma, sans-serif"><b>ตรวจสอบข้อมูลระดับชั้น</b></font></td>
                </tr>
                <tr>
                  <td width="40%" height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ระดับชั้น :</font></td>
                  <td width="1%" height="35" valign="middle">&nbsp;</td>
                  <td width="59%" height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;
                    <select name="class" id="class">
                      <option value="">-เลือกระดับชั้น-</option>
                      <option value="1">มัธยมศึกษาปีที่ 1</option>
                      <option value="2">มัธยมศึกษาปีที่ 2</option>
                      <option value="3">มัธยมศึกษาปีที่ 3</option>
                      <option value="4">มัธยมศึกษาปีที่ 4</option>
                      <option value="5">มัธยมศึกษาปีที่ 5</option>
                      <option value="6">มัธยมศึกษาปีที่ 6</option>
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
          <table width="75%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="14%" align="center">&nbsp;</td>
              <td width="86%" align="center">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="center"><font size="5" face="MS Sans Serif, Tahoma, sans-serif"><b>เงื่อนไขในการเลื่อนชั้นนักเรียนมีดังนี้</b></font></td>
              </tr>
            <tr>
              <td align="center">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="33" align="center" valign="top"><font size="4" face="MS Sans Serif, Tahoma, sans-serif"> ข้อ 1.</font></td>
              <td align="left" valign="top"><font size="4" face="MS Sans Serif, Tahoma, sans-serif">ให้ทำการปรับสถานะนักเรียนชั้นม.3 และ 6 ให้เป็นสถานะจบการศึกษาก่อน</font></td>
            </tr>
            <tr>
              <td align="center" valign="top"><font size="4" face="MS Sans Serif, Tahoma, sans-serif">ข้อ 2.</font></td>
              <td align="left" valign="top"><font size="4" face="MS Sans Serif, Tahoma, sans-serif">เมื่อปรับสถานะนักเรียนชั้นม.3 และ 6 แล้ว ให้ทำการเลื่อนระดับชั้นนักเรียนดังนี้<br>
                ม.5 &gt; เป็น ม.6<br>
                ม.4 &gt; เป็น ม.5<br>
                ม.2 &gt; เป็น ม.3<br>
                ม.1 &gt; เป็น ม.2 ตามระดับชั้นมากไปน้อย<br>
                </font></td>
            </tr>
            <tr>
              <td height="42" align="center" valign="top">&nbsp;</td>
              <td align="left" valign="middle"><font size="4" face="MS Sans Serif, Tahoma, sans-serif"><b>หมายเหตุ :</b> กรุณาดำเนินการตามขั้นตอนนี้<u>อย่างละเอียด</u></font></td>
            </tr>
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