<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เงื่อนไขในการอัพโหลดไฟล์ข้อมูลประเภท .CVS</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">

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
A:link	{
text-decoration:none;
}
A:visited	{
text-decoration:none;
}
</STYLE>
</head>

<body bgcolor="#666666">
<?php
	// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 3)
	{
?>
<table width="80%" bgcolor="#FFFFFF" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="49" colspan="2" align="center" bgcolor="#666666"><b><font color="#FFFFFF" size="6" face="MS Sans Serif, Tahoma, sans-serif">เงื่อนไขในการอัพโหลดไฟล์ข้อมูลประเภท .CSV</font></b></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="45" colspan="2" align="center"><font size="4" face="MS Sans Serif, Tahoma, sans-serif"><b>ขั้นตอนการอัพโหลดไฟล์</b></font> <u><font size="4" face="MS Sans Serif, Tahoma, sans-serif" color="#FF3366">(ข้อมูลครูผู้สอน/เจ้าหน้าที่)</font></u>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เมื่อต้องการดำเนินการอัพโหลดไฟล์ข้อมูล ให้ดำเนินการตามขั้นตอนดังต่อไปนี้<u>อย่างละเอียด</u></font></td>
  </tr>
  <tr>
    <td width="13%" align="center">&nbsp;</td>
    <td width="87%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="57" align="center" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><u>ขั้นตอนที่ 1.</u></font></td>
    <td valign="top"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">กรุณาเปิดใช้ Google Chrome <img src="images/chrome.jpg" width="41" height="40" border="0"/> ในการเข้าใช้งาน</font></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><u>ขั้นตอนที่ 2.</u></font></td>
    <td valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">แบบฟอร์มข้อมูลครูผู้สอน/เจ้าหน้าที่ ใช้ในการกำหนดคอลัมน์ของข้อมูล &gt;</font>
    <a href="files/Form-tea.xls"><font size="2" color="#000000" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/click.gif"></font></a></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><u>ขั้นตอนที่ 3.</u></font></td>
    <td valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">การกำหนดรหัสของข้อมูล มีดังนี้</font></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle"><table width="60%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>กลุ่มสาระการเรียนรู้</b></font></td>
      </tr>
<?php	
	$sql = "SELECT * FROM tb_category where status_cat ='1' ";
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);

	$i =0;	//ตัวเช็ควนรอบ
	$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
	while($i < $num)
	{
	$result = mysql_fetch_array($db_query);	
			
	$cat_id	 	= $result['cat_id'];
	$cat_name 	= $result['cat_name'];
	$status_cat	= $result['status_cat'];
?>
      <tr>
        <td width="17%" align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $cat_id;?></font></td>
        <td width="83%"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $cat_name;?></font></td>
      </tr>
<?php
	$a++;
	$i++;
	}
?>      
 </table>
    <table width="60%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="17%">&nbsp;</td>
        <td width="83%">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></td>
      </tr>
      <tr>
        <td align="center">1</td>
        <td><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ครูผู้สอน</font></td>
      </tr>
      <tr>
        <td align="center">2</td>
        <td><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เจ้าหน้าที่</font></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><u>ขั้นตอนที่ 4.</u></font></td>
    <td valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เมื่อทำการกรอกข้อมูลครูผู้สอน/เจ้าหน้าที่เรียบร้อยแล้ว ให้ทำการลบแถวด้านบนสุดทั้งแถว</font></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/tea.jpg" width="650" border="0"/></font></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><u>ขั้นตอนที่ 5.</u></font></td>
    <td valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เมื่อทำการลบเรียบร้อยไฟล์ข้อมูลจะได้ดังภาพ</font></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/pic2.jpg" width="650" border="0"/></font></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>หมายเหตุ :</b> กรุณาตรวจสอบ<u>ช่องรหัสประจำตัวประชาชน</u>ว่าถูกกำหนดให้เป็นประเภท<u>ตัวเลข</u> และไม่มีจุดทศนิยมแล้วหรือยัง</font></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/pic4.jpg" width="200" border="0"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/pic5.jpg" width="200" border="0"/></font></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><u>ขั้นตอนที่ 6.</u></font></td>
    <td valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">จากนั้นให้ทำการบันทึกข้อมูล ประเภท CSV (Comman delimited)</font></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><img src="images/pic1.jpg" width="400" border="0"/></font></td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
    <td valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เมื่อบันทึกเรียบร้อยแล้ว ลักษณะของไฟล์จะมีลักษณะดังนี้
    <img src="images/pic3.png" border="0"/></font></td>
  </tr>
  <tr>
    <td height="41" align="center" valign="middle">&nbsp;</td>
    <td valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle"><table width="50%" height="90" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="46" align="center" bgcolor="#A6BEFD"><font size="5" face="MS Sans Serif, Tahoma, sans-serif"><b>สำหรับเพิ่มไฟล์ประเภท CSV เท่านั้น</b></font></td>
        </tr>
      <tr>
        <td width="52%" height="35" align="left" bgcolor="#A6BEFD">
        <form action="save_csv_tea.php" method="post" enctype="multipart/form-data" name="formcsv" id="formcsv">
          <input name="fileCSV" type="file" id="fileCSV" style="height:25px; font-size:15px;" />
          <input name="btnSubmit" type="submit" id="btnSubmit" value="เพิ่มไฟล์ CSV" />
        </form></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle">&nbsp;</td>
  </tr>
</table>
<?php
}else{
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"index.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>