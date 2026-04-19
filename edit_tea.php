<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แก้ไขข้อมูลครูผู้สอน/เจ้าหน้าที่</title>
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
						window.location = 'edit_tea.php';
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
	$t_id 	= $_GET['t_id'];
	$tea_id = $_GET['tea_id'];
	
	$sql="SELECT * FROM  tb_teacher where t_id = '$t_id'";
	$db_query = mysql_query($sql);
	$result = mysql_fetch_array($db_query);	
	
	$t_id		= $result['t_id'];
	$tea_id		= $result['tea_id'];
	$pname		= $result['pname'];
	$fname		= $result['fname'];
	$lname		= $result['lname'];
	$idcard		= $result['idcard'];
	$cat_id		= $result['cat_id'];
	$tea_status	= $result['tea_status'];
?>
<form name="form_edit" method="post" action="save_edit_tea2.php">
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="52" colspan="2" align="center" valign="middle"><font size="5" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600"><b>แก้ไขข้อมูลครูผู้สอน/เจ้าหน้าที่</b></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" colspan="2" valign="middle" bgcolor="#91C8FF"><font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#000000"><b>ข้อมูลประจำตัว</b></font></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="27%" height="25" valign="middle" bgcolor="#FFFFCC"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว :</font></td>
    <td width="70%" height="25" valign="middle" bgcolor="#FFFFCC"><div align="left">
<input name="tea_id" type="text" class="txt_box" id="tea_id" onchange="JavaScript:doCallAjax();" value="<?php echo "$tea_id";?>" size="10" maxlength="10"/>&nbsp;&nbsp;
<button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/edit_id.gif" width="25" height="25" align="absmiddle" /> แก้ไขรหัสประจำตัว</button>&nbsp;<font size="2" face="MS Sans Serif, Tahoma, sans-serif">* กดปุ่มนี้เพื่อแก้ไขรหัสประจำตัวเท่านั้น</font>
<input name="t_id" type="hidden" id="t_id" value="<?php echo "$t_id";?>"><br><span id="mySpan"></span>
</div></td>
  </tr>
</table>
</form>

<form name="form_edit2" method="post" action="save_edit_tea.php">
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="27%" height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">หมายเลขประจำตัวประชาชน :</font></td>
    <td width="70%" height="25" valign="middle" bgcolor="#EEF1FD"><input name="idcard" type="text" class="txt_box" id="idcard" onchange="count()" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" value="<?php echo "$idcard";?>" size="10" maxlength="13"/></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="pname" type="text" class="txt_box" id="pname" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$pname";?>" size="10"/>&nbsp;<input name="fname" type="text" class="txt_box" id="fname" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$fname";?>" size="20"/>&nbsp;<input name="lname" type="text" class="txt_box" id="lname" onKeyUp="if(!(isNaN(this.value))) { alert('กรุณากรอกอักษร'); this.value='';}" value="<?php echo "$lname";?>" size="20"/></td>
  </tr>
  <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">กลุ่มสาระการเรียนรู้ :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD">
  <?php
	//ส่วนแปลงจาก id เป็น name
    $cat_id 	= $result['cat_id']; //เปรียบเทียบเพื่อแปลงค่า
		
	$sql2 		= "select * from tb_category where cat_id = '$cat_id';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query2	= mysql_query($sql2);	//ถอดข้อความให้เป็นคำสั่ง
	$result2	= mysql_fetch_array($db_query2);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
				
	$cat_name	= $result2['cat_name'];
			
			
	//ส่วนแสดง Option
	$sql3 = "SELECT * FROM tb_category WHERE status_cat ='1'";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$result3 = mysql_query($sql3);	//เปลี่ยนเป็นคำสั่ง
	$num3 = mysql_num_rows($result3);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
				
	print("<select name =\"cat_id\" class=\"styled-select\">");
						
	print("<option value='".$cat_id."'>".$cat_name."</option>");
							
	while($rs3 = mysql_fetch_array($result3))
	{
	print("<option value=$rs3[cat_id]>$rs3[cat_name]</option>");
	}
	print("</select>");
?></td>
  </tr>
    <tr>
    <td width="3%">&nbsp;</td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะผู้ใช้งาน :</font></td>
    <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
      <select name="tea_status" class="styled-select" id="tea_status">
        <option value="<?php echo "$tea_status";?>">
  <?php
	$s = '$tea_status';
	switch( $tea_status){
	case '1' :
		echo "ครูผู้สอน";
	break;
	case '2' :
		echo "เจ้าหน้าที่";	
	break;
	case '3' :
		echo "ยกเลิกใช้งาน";	
	break;
	}
?>
          </option>
        <option value="1">ครูผู้สอน</option>
        <option value="2">เจ้าหน้าที่</option>
        <option value="3">ยกเลิกใช้งาน</option>
        </select>
      </font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td height="61" valign="middle">&nbsp;</td>
    <td height="61" valign="middle"><button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/edit.png" width="24" height="24" align="absmiddle" /> แก้ไขข้อมูล</button>
      <input name="t_id" type="hidden" id="t_id" value="<?php echo $t_id;?>" />
    </td>
  </tr>
</table>
</form>
</body>
</html>
