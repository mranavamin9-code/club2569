<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มข้อมูลนักเรียน</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" type="text/css" href="style/style.css">

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
						window.location = 'form_stu.php';
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
	// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 3)
	{
?>
<form name="form_edit" method="post" action="save_student.php">
  <table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td height="36" colspan="2" align="center" valign="bottom"><font size="5" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600"><b>เพิ่มข้อมูลนักเรียน</b></font></td>
  </tr>
  <tr>
    <td height="25" colspan="2" valign="middle" bgcolor="#91C8FF"><font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#000000"><b>ข้อมูลประจำตัว</b></font></td>
  </tr>
  <tr>
    <td width="29%" height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว :</font></td>
    <td width="70%" height="25" valign="middle" bgcolor="#EEF1FD"><div align="left">
      <input name="stu_id" type="text" class="txt_box" id="stu_id" placeholder="ใช้เป็น username" onchange="JavaScript:doCallAjax();" onkeyup="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" size="13" maxlength="5" />
      <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font><span id="mySpan"></span></div></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="id_card" type="text" class="txt_box" id="id_card" placeholder="ใช้เป็น password" onchange="count()" onkeyup="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" size="13" maxlength="13"/>
      <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><select name="pname" class="styled-select" id="pname">
      <option value="">-เลือกคำนำหน้าชื่อ-</option>
      <option value="เด็กชาย">เด็กชาย</option>
      <option value="เด็กหญิง">เด็กหญิง</option>
      <option value="นาย">นาย</option>
      <option value="นางสาว">นางสาว</option>
    </select>
      <input name="fname" type="text" class="txt_box" id="fname" placeholder="ชื่อ" onkeyup="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" size="18"/>
      <input name="lname" type="text" class="txt_box" id="lname" placeholder="นามสกุล" onkeyup="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" size="18"/>
      <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชั้นมัธยมศึกษาปีที่ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$sql3 = "SELECT * FROM tb_class ";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$result3 = mysql_query($sql3);	//เปลี่ยนเป็นคำสั่ง
	$num3 = mysql_num_rows($result3);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
				
	print("<select name =\"class_id\" style =\"width: 120px\" class=\"styled-select\">");
										
	print("<option value=''>-เลือกระดับชั้น-</option>");
							
	while($rs3 = mysql_fetch_array($result3))
	{
	print("<option value=$rs3[class_id]>$rs3[class]</option>");
	}
	print("</select>");
?>
      <select name="room" class="styled-select" id="room" style="width: 100px">
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
        </select>
      </font><font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เลขที่ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
      <input name="no" type="text" class="txt_box" id="no" onkeyup="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" size="3" maxlength="3"/>
    </font><font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">โรงเรียนเดิม :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="old_school" type="text" class="txt_box" id="old_school" size="40"/></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">จังหวัด :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="province" type="text" class="txt_box" id="province" onkeyup="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" size="15"/></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สัญชาติ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="nationality" type="text" class="txt_box" id="nationality" onkeyup="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" size="15"/></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ศาสนา :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="religion" type="text" class="txt_box" id="religion" onkeyup="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" size="15"/></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">วัน/เดือน/ปีเกิด :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">
<select name="d" class="styled-select">
  <option value="">-วัน-</option>
  <option value="01">01</option>
  <option value="02">02</option>
  <option value="03">03</option>
  <option value="04">04</option>
  <option value="05">05</option>
  <option value="06">06</option>
  <option value="07">07</option>
  <option value="08">08</option>
  <option value="09">09</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>
  <option value="31">31</option>
</select>
<select name="m" class="styled-select">
  <option value="">-เดือน-</option>
  <option value="มกราคม">มกราคม</option>
  <option value="กุมภาพันธ์">กุมภาพันธ์</option>
  <option value="มีนาคม">มีนาคม</option>
  <option value="เมษายน">เมษายน</option>
  <option value="พฤษภาคม">พฤษภาคม</option>
  <option value="มิถุนายน">มิถุนายน</option>
  <option value="กรกฎาคม">กรกฎาคม</option>
  <option value="สิงหาคม">สิงหาคม</option>
  <option value="กันยายน">กันยายน</option>
  <option value="ตุลาคม">ตุลาคม</option>
  <option value="พฤศจิกายน">พฤศจิกายน</option>
  <option value="ธันวาคม">ธันวาคม</option>
</select>
<input name="y" type="text" size="4" maxlength="4" placeholder="ปี พ.ศ." onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" class="txt_box"></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล บิดา :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="father" type="text" class="txt_box" id="father" onkeyup="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}"/></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล มารดา :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="mother" type="text" class="txt_box" id="mother" onkeyup="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}"/></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
    <input type="radio" name="status_stu" value="1" />ยืนยันการเพิ่มข้อมูล</font>
    <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td height="58" align="center">&nbsp;</td>
    <td height="58"><button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/save.png" width="24" height="24" align="absmiddle" /> บันทึกข้อมูล</button></td>
  </tr>
</table>
</form>
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
