<?php
	include "connection.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แก้ไขข้อมูลนักเรียน</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" type="text/css" href="style/style.css">
<style type="text/css" media="print">
input {
	display:none;
}
</style>

<script language="JavaScript">
	   var HttPRequest = false;

	   function doCallAjax() {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
		  var url = 'check_student_id.php';
		  var pmeters = "tStu_id=" + encodeURI( document.getElementById("stu_id").value);

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("mySpan").innerHTML = "..";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'edit_stu.php';
					}
					else
					{
						document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
					}
				}
				
			}

	   }
</script>

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

<body>
<?php
	$s_id = $_GET['s_id'];
	
	$sql="SELECT * FROM  tb_student where s_id = '$s_id'";
	$db_query = mysql_query($sql);
	$result = mysql_fetch_array($db_query);	
	
	$stu_id		= $result['stu_id'];
	$stu_name	= $result['stu_name'];
	$class_id	= $result['class_id'];							
	$id_card	= $result['id_card'];
	$room		= $result['room'];
	$no			= $result['no'];
	$old_school	= $result['old_school'];
	$province	= $result['province'];
	$nationality = $result['nationality'];							
	$religion	= $result['religion'];
	$bday		= $result['bday'];
	$father		= $result['father'];
	$mother		= $result['mother'];
	$status_stu	= $result['status_stu'];

?>
<form name="form_edit_stu" method="post" action="save_edit_stu2.php">
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td width="2%">&nbsp;</td>
    <td height="40" colspan="2" align="center" valign="middle"><font size="5" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600"><b>แก้ไขข้อมูลนักเรียน</b></font></td>
  </tr>
  <tr>
    <td width="2%" rowspan="2">&nbsp;</td>
    <td height="25" colspan="2" valign="middle" bgcolor="#91C8FF"><font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#000000"><b>ข้อมูลประจำตัว</b></font></td>
  </tr>
  <tr>
    <td width="28%" height="25" valign="middle" bgcolor="#FFFFCC"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว :</font></td>
    <td width="70%" height="25" valign="middle" bgcolor="#FFFFCC">
<div align="left">
<input name="stu_id" type="text" class="txt_box" id="stu_id" onchange="JavaScript:doCallAjax();" onkeyup="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" value="<?php echo "$stu_id";?>" size="15" maxlength="5" />&nbsp;&nbsp;
<button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/edit_id.gif" width="25" height="25" align="absmiddle"> แก้ไขรหัสประจำตัว</button><br><font size="2" face="MS Sans Serif, Tahoma, sans-serif">* กดปุ่มนี้เพื่อแก้ไขรหัสประจำตัวเท่านั้น</font>
<span id="mySpan"></span><input name="s_id" type="hidden" id="s_id" value="<?php echo "$s_id";?>">
</div></td>
  </tr>
</table>
</form>

<form name="form_edit" method="post" action="save_edit_stu.php">
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td width="2%" rowspan="12">&nbsp;</td>
    <td width="28%" height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน :</font></td>
    <td width="70%" height="25" valign="middle" bgcolor="#EEF1FD"><input name="id_card" type="text" class="txt_box" id="id_card" onchange="count()" onkeyup="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" value="<?php echo "$id_card";?>" size="15" maxlength="13"/></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
      <input name="stu_name" type="text" class="txt_box" id="stu_name" value="<?php echo "$stu_name";?>" size="40" />
      </font></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชั้นมัธยมศึกษาปีที่ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
      <?php
	//ส่วนแปลงจาก id เป็น name
    $class_id 	= $result['class_id']; //เปรียบเทียบเพื่อแปลงค่า
		
	$sql2 		= "select * from tb_class where class_id = '$class_id';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query2	= mysql_query($sql2);	//ถอดข้อความให้เป็นคำสั่ง
	$result2	= mysql_fetch_array($db_query2);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
				
	$class	= $result2['class'];
			
			
	//ส่วนแสดง Option
	$sql3 = "SELECT * FROM tb_class ";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$result3 = mysql_query($sql3);	//เปลี่ยนเป็นคำสั่ง
	$num3 = mysql_num_rows($result3);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
				
	print("<select name =\"class_id\" class=\"styled-select\">");
						
	print("<option value='".$class_id."'>".$class."</option>");
							
	while($rs3 = mysql_fetch_array($result3))
	{
	print("<option value=$rs3[class_id]>$rs3[class]</option>");
	}
	print("</select>");
?>
      &nbsp;ห้อง&nbsp;<input name="room" type="text" class="txt_box" id="room" value="<?php echo "$room";?>" size="3" />
      </font></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เลขที่ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
      <input name="no" type="text" class="txt_box" id="no" onkeyup="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" value="<?php echo "$no";?>" size="3"/>
    </font></td>
  </tr>
<tr>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">โรงเรียนเดิม :</font></td>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="old_school" type="text" class="txt_box" id="old_school" value="<?php echo "$old_school";?>" size="40"/></td>
    </tr>
    <tr>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">จังหวัด :</font></td>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="province" type="text" class="txt_box" id="province" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$province";?>" size="15"/></td>
    </tr>
    <tr>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สัญชาติ :</font></td>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="nationality" type="text" class="txt_box" id="nationality" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$nationality";?>" size="15"/></td>
    </tr>
    <tr>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ศาสนา :</font></td>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="religion" type="text" class="txt_box" id="religion" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$religion";?>" size="15"/></td>
    </tr>
    <tr>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">วัน/เดือน/ปีเกิด :</font></td>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="bday" type="text" class="txt_box" id="bday" value="<?php echo "$bday";?>" size="15"/></td>
    </tr>
    <tr>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล บิดา :</font></td>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="father" type="text" class="txt_box" id="father" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$father";?>"/></td>
    </tr>
    <tr>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล มารดา :</font></td>
      <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="mother" type="text" class="txt_box" id="mother" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$mother";?>"/></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
    <select name="status_stu" class="styled-select" id="status_stu">
      <option value="<?php echo "$status_stu";?>">
<?php
	if($status_stu == 1)
	{
		echo '<font size="3" color="#009900">'.'&nbsp;'."อยู่ในระบบ".'</font>';
		
	}if($status_stu == 2){
		
		echo '<font size="3" color="#0033FF">'.'&nbsp;'."จบการศึกษา".'</font>';
	}if($status_stu == 3){
		
		echo '<font size="3" color="#FF0000">'.'&nbsp;'."ยกเลิกใช้งาน".'</font>';
	}
?>
        </option>
      <option value="1">อยู่ในระบบ</option>
      <option value="2">จบการศึกษา</option>
      <option value="3">ยกเลิกใช้งาน</option>
    </select>
    </font></td>
  </tr>
  <tr>
    <td height="55" align="center">&nbsp;</td>
    <td height="55" align="center">&nbsp;</td>
    <td height="55"><button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/edit.png" width="24" height="24" align="absmiddle" /> แก้ไขข้อมูล</button>
      <input name="s_id" type="hidden" id="s_id" value="<?php echo "$s_id";?>"/></td>
  </tr>
</table>
</form>
</body>
</html>
