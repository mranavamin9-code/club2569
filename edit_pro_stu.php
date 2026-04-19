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
<link rel="stylesheet" type="text/css" href="style/style.css">
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
A:link {
	text-decoration:none;
}
A:visited {
	text-decoration:none;
}
</STYLE>

<script type="text/javascript">
function count(){		//ชื่อฟังก์ชั่น
var getE = document.getElementById("id_card");	//ชื่อ id ของ textbox
var num = getE.value.length;
	if(num < 13){
		alert("กรุณาระบุหมายเลขประจำตัวประชาชนให้ครบทั้ง 13 หลัก");
	}	
}
</script>
</head>

<body background="images/bg.gif" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<?php
// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 1)
	{
?>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td valign="top"><table width="100%" height="800" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
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
          <td width="77%" valign="top">
<form name="form_add" method="post" action="save_edit_pro_stu.php">
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
    <tr>
      <td width="3%">&nbsp;</td>
      <td colspan="2">
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
				
	$s_id		= $result1['s_id'];
	$stu_id		= $result1['stu_id'];
	$stu_name	= $result1['stu_name'];
	$class_id	= $result1['class_id'];							
	$id_card	= $result1['id_card'];
	$room		= $result1['room'];
	$no			= $result1['no'];
	$old_school	= $result1['old_school'];
	$province	= $result1['province'];
	$nationality = $result1['nationality'];							
	$religion	= $result1['religion'];
	$bday		= $result1['bday'];
	$father		= $result1['father'];
	$mother		= $result1['mother'];
	$status_stu	= $result1['status_stu'];
?>
<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><?php echo "$student_id".'&nbsp;'.":".'&nbsp;'."$stu_name".'&nbsp;'.'&nbsp;'."ชั้นมัธยมศึกษาปีที่".'&nbsp;'."$class_id".'&nbsp;'."/".'&nbsp;'."$room".'&nbsp;'."เลขที่".'&nbsp;'."$no";?><br />
<img src="images/horz_1.gif"></b></font></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td height="36" colspan="2" valign="bottom"><font size="5" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600"><b>แก้ไขข้อมูลประจำตัวนักเรียน</b></font></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td height="25" colspan="2" valign="middle" bgcolor="#91C8FF"><font size="4" face="MS Sans Serif, Tahoma, sans-serif"><b>ข้อมูลประจำตัว</b></font></td>
    </tr>
    <tr>
      <td width="3%" height="30">&nbsp;</td>
      <td width="24%" height="30" valign="middle" bgcolor="#FFFFCC"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว :</font></td>
      <td width="73%" height="30" valign="middle" bgcolor="#FFFFCC"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo '&nbsp;'."$stu_id";?></font></td>
    </tr>
  </table>

  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
    <tr>
      <td width="3%" height="30">&nbsp;</td>
      <td width="24%" height="30" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัวประชาชน :</font></td>
      <td width="73%" height="30" valign="middle" bgcolor="#EEF1FD"><input name="id_card" type="text" class="txt_box" id="id_card" onchange="count()" onkeyup="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" value="<?php echo "$id_card";?>" size="15" maxlength="13">
        <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
    </tr>
    <tr>
      <td width="3%" height="30">&nbsp;</td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล :</font></td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><input name="stu_name" type="text" class="txt_box" value="<?php echo "$stu_name";?>" size="40" /><font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
    </tr>
    <tr>
      <td width="3%" height="30">&nbsp;</td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">มัธยมศึกษาปีที่ :</font></td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><select name="class" disabled="disabled" class="styled-select" id="class">
        <option value="<?php echo "$class_id";?>">
<?php
	if($class_id == 1){
		echo "ม. 1";
	}elseif($class_id == 2){
		echo "ม. 2";
	}elseif($class_id == 3){
		echo "ม. 3";
	}elseif($class_id == 4){
		echo "ม. 4";
	}elseif($class_id == 5){
		echo "ม. 5";
	}elseif($class_id == 6){
		echo "ม. 6";
	}
?>
          </option>
        <option value="1">ม. 1</option>
        <option value="2">ม. 2</option>
        <option value="3">ม. 3</option>
        <option value="4">ม. 4</option>
        <option value="5">ม. 5</option>
        <option value="6">ม. 6</option>
        </select>
        &nbsp;/&nbsp;
        <input name="student_room" type="text" disabled="disabled" class="txt_box"  onkeyup="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" value="<?php echo "$student_room";?>" size="3" maxlength="2"/></td>
    </tr>
    <tr>
      <td width="3%" height="30">&nbsp;</td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เลขที่ :</font></td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><input name="no" type="text" disabled="disabled" class="txt_box" onkeyup="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" value="<?php echo "$no";?>" size="3" maxlength="2"/></td>
    </tr>
    <tr>
      <td width="3%" height="30">&nbsp;</td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">โรงเรียนเดิม :</font></td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><input name="old_school" type="text" class="txt_box" id="old_school" value="<?php echo "$old_school";?>" size="40"/>
        <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
    </tr>
    <tr>
      <td width="3%" height="30">&nbsp;</td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">จังหวัด :</font></td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><input name="province" type="text" class="txt_box" id="province" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$province";?>" size="15"/>
        <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
    </tr>
    <tr>
      <td width="3%" height="30">&nbsp;</td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สัญชาติ :</font></td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><input name="nationality" type="text" class="txt_box" id="nationality" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$nationality";?>" size="15"/>
        <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
    </tr>
    <tr>
      <td width="3%" height="30">&nbsp;</td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ศาสนา :</font></td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><input name="religion" type="text" class="txt_box" id="religion" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$religion";?>" size="15"/>
        <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
    </tr>
    <tr>
      <td width="3%" height="30">&nbsp;</td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">วัน/เดือน/ปีเกิด :</font></td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><input name="bday" type="text" class="txt_box" id="bday" value="<?php echo "$bday";?>" size="15"/>
        <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
    </tr>
    <tr>
      <td width="3%" height="30">&nbsp;</td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล บิดา :</font></td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><input name="father" type="text" class="txt_box" id="father" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$father";?>"/>
        <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
    </tr>
    <tr>
      <td width="3%" height="30">&nbsp;</td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล มารดา :</font></td>
      <td height="30" valign="middle" bgcolor="#EEF1FD"><input name="mother" type="text" class="txt_box" id="mother" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$mother";?>"/>
        <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
    </tr>
    <tr>
      <td width="3%">&nbsp;</td>
      <td height="39" colspan="2" valign="middle"><button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/edit.png" width="24" height="24" align="absmiddle" /> แก้ไขข้อมูล</button>
        <input name="s_id" type="hidden" id="s_id" value="<?php echo "$s_id";?>" /></td>
    </tr>
  </table>
</form>
          </td>
        </tr>
      </table></td>
  </tr>
</table>
<?php include "tbl_text.php";?>	<!--ส่วนล่างสุด-->
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