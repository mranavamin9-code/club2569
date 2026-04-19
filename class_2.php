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

<style type="text/css" media="print">
input {
	display:none;
}
</style>

<style type="text/css">
@media print{
.no-print{ display:none;}
}
</style>

<script type="text/javascript">
function con_del(){
if (confirm("ยืนยันการเลื่อนระดับชั้น ?") ==true){
return true;
}
return false;
}
</script>

<!--ควบคุม table-->
<STYLE>
.tbl:hover{							
	background-color: #D6E7D1;	/*สีเมื่อเมาส์ไปโดน*/
}
</STYLE>
<!--จบควบคุม table-->
</head>
<body>
<?php
	// ส่วนของการทำ User Authentication 
	if($_SESSION['lognum'] == 3)
	{
?>
<div align="center"><font size="6" face="MS Sans Serif, Tahoma, sans-serif"><b>เลื่อนระดับชั้นนักเรียนมัธยมศึกษาปีที่ 2 &gt; 3</b></font></div>
<br>
<?php
//*** Update Condition ***//
if($_GET["Action"] == "Save")
{
	for($i=1;$i<=$_POST["hdnLine"];$i++)
	{
		$strSQL = "UPDATE tb_student SET ";
		//$strSQL .="stu_id = '".$_POST["txtstu_id$i"]."' ";
		//$strSQL .="stu_name = '".$_POST["txtstu_name$i"]."' ";
		$strSQL .="class_id = '3' ";									//ชั้น
		//$strSQL .=",room = '".$_POST["txtroom$i"]."' ";
		//$strSQL .=",no = '".$_POST["txtno$i"]."' ";
		//$strSQL .=",status_stu = '".$_POST["txtstatus_stu$i"]."' ";	//สถานะ
		$strSQL .="WHERE s_id = '".$_POST["hdns_id$i"]."' ";
		$objQuery = mysql_query($strSQL);
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
}

$strSQL = "SELECT * FROM tb_student where class_id ='2' and status_stu ='1' ORDER BY stu_id ASC";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>

<form name="frmMain" method="post" action="class_2.php?Action=Save">
<table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
  	<th width="9%"><div align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ลำดับ</font></div></th>
    <th width="14%" height="29"><div align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว</font></div></th>
    <th width="38%"><div align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ-นามสกุล</font></div></th>
    <th width="9%"><div align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ระดับชั้น</font></div></th>
    <th width="7%"><div align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ห้อง</font></div></th>
    <th width="7%"><div align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เลขที่</font></div></th>
    <th width="16%"><div align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะ</font></div></th>
  </tr>
<?php
$i =0;
while($objResult = mysql_fetch_array($objQuery))
{
	$i = $i + 1;
?>
  <tr class="tbl">
  	<td align="center"><?php echo $i;?></td>
    <td align="center"><div align="center"><input type="hidden" name="hdns_id<?php echo $i;?>" size="5" value="<?php echo $objResult["s_id"];?>">
    <?php echo $objResult["stu_id"];?></div></td>
    <td align="center">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="8%">&nbsp;</td>
        <td width="92%"><?php echo $objResult["stu_name"];?></td>
      </tr>
      </table>
      </td>
    <td align="center"><?php echo $objResult["class_id"];?></td>
    <td align="center"><div align="center"><?php echo $objResult["room"];?></div></td>
    <td align="center"><?php echo $objResult["no"];?></td>
    <td align="center">
<?php
	if($objResult["status_stu"] == 1)
	{
		echo '<font size="3" color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($objResult["status_stu"] == 2){
		
		echo '<font size="3" color="#0033FF">'."จบการศึกษา".'</font>';
	}if($objResult["status_stu"] == 3){
		
		echo '<font size="3" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?> 
    </td>
  </tr>
<?php
}
?>
</table>
<br>
<table width="20%" border="0" align="center" cellpadding="0" cellspacing="0" class="no-print">
  <tr>
    <td height="121" align="center" bgcolor="#AED1EE">
    <input type="submit" name="submit" value="เลื่อนระดับชั้น" id="submit" onclick="return con_del()" style="height: 30px; font-size: 15px; width: 150px;">
	<input type="hidden" name="hdnLine" value="<?php echo $i;?>"></td>
  </tr>
  </table>
</form>
<table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="3"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>หมายเหตุ</b> :</font></td>
  </tr>
  <tr>
    <td width="11%" height="25">&nbsp;</td>
    <td width="4%" height="25" align="center"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">-</font></td>
    <td width="85%" height="25"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เมื่อทำการเลื่อนระดับชั้นนักเรียนแล้ว และในกรณีที่มีนักเรียนที่ไม่สามารถเลื่อนระดับชั้นได้ <b>(กรณีซ้ำชั้น)</b></font></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td height="25" align="center">&nbsp;</td>
    <td height="25"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ให้ทำการแก้ไขระดับชั้นหรือสถานะนักเรียนกรณีดังกล่าวในภายหลังที่ <b>เมนูจัดการข้อมูลหลัก</b> &gt; <b>ข้อมูลนักเรียน</b></font></td>
  </tr>
</table>
<?php
	mysql_close;
?>
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