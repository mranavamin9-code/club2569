<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มข้อมูลครูผู้สอน/เจ้าหน้าที่</title>
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
	
		  var url = 'check_teacher_id.php';
		  var pmeters = "tTea_id=" + encodeURI( document.getElementById("tea_id").value);

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
						window.location = 'form_tea.php';
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
var getE = document.getElementById("idcard");	//ชื่อ id ของ textbox
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
if($_SESSION['lognum'] == 3 || $_SESSION['lognum'] == 10)
	{
?>
<form name="formadd" method="post" action="save_teacher.php">
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td height="52" colspan="2" align="center" valign="middle"><font size="5" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600"><b>เพิ่มข้อมูลครูผู้สอน/เจ้าหน้าที่</b></font></td>
  </tr>
  <tr>
    <td height="25" colspan="2" valign="middle" bgcolor="#91C8FF"><font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#000000"><b>ข้อมูลประจำตัว</b></font></td>
  </tr>
  <tr>
    <td width="27%" height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว :</font></td>
    <td width="70%" height="25" valign="middle" bgcolor="#EEF1FD"><div align="left">
      <input name="tea_id" type="text" class="txt_box" id="tea_id" onchange="JavaScript:doCallAjax();" size="10" maxlength="10">
      <span id="mySpan"></span></div></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เลขประจำตัวประชาชน :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="idcard" type="text" class="txt_box" id="idcard" onchange="count()" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" size="10" maxlength="13"/></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="pname" type="text" class="txt_box" id="pname" placeholder="คำนำหน้าชื่อ" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" size="9"/>&nbsp;<input name="fname" type="text" class="txt_box" id="fname" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" size="20"/>&nbsp;<input name="lname" type="text" class="txt_box" id="lname" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" size="20"/></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">กลุ่มสาระการเรียนรู้ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">
  <?php 
		$sql3 = "SELECT * FROM tb_category where status_cat ='1' order by cat_id asc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
		$result3 = mysql_query($sql3);	//เปลี่ยนเป็นคำสั่ง
		$num3 = mysql_num_rows($result3);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
			
		print("<select name =\"cat_id\" style =\"width: 200px\" class=\"styled-select\">");
										
		print("<option value=''>-เลือกกลุ่มสาระการเรียนรู้-</option>");
										
		while($rs3 = mysql_fetch_array($result3))
		{
		print("<option value=$rs3[cat_id]>$rs3[cat_name]</option>");
		}
		print("</select>");
?></td>
  </tr>
  <tr>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะผู้ใช้งาน :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
      <select name="tea_status" class="styled-select" id="tea_status">
        <option value="">-เลือกสถานะผู้ใช้-</option>
        <option value="1">ครูผู้สอน</option>
        <option value="2">เจ้าหน้าที่</option>
        </select>
      </font></td>
  </tr>
  <tr>
    <td height="47" valign="middle">&nbsp;</td>
    <td height="47" valign="middle"><button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/save.png" width="24" height="24" align="absmiddle" /> บันทึกข้อมูล</button></td>
  </tr>
</table>
</form>
<br>
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
