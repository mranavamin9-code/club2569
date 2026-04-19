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

.tbl:hover{							
	background-color: #D6E7D1;	/*สีเมื่อเมาส์ไปโดน*/
}
</STYLE>

<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.chkDel"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('ยืนยันการลบข้อมูล ?')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
</head>

<body>
<?php 
if($_SESSION['lognum'] == 3)
{
?>
<form name="frmMain" action="del_all_stu.php" method="post" OnSubmit="return onDelete();">
<?php	
	$class 		= $_GET['class'];
	$room_stu	= $_GET['room_stu'];
	$status 	= $_GET['status'];
	
	if(empty($class)&&empty($room_stu)&&empty($status))
	{		
		echo "<script>alert('**กรุณาระบุข้อมูลก่อนค้นหา**');history.back();</script>";
		echo "<Script Language='JavaScript'>window.close();</Script>";
	
	}else if(empty($class)){
		
		echo "<script>alert('**กรุณาระบุระดับชั้น**');history.back();</script>";
		echo "<Script Language='JavaScript'>window.close();</Script>";
		
	}else if(empty($room_stu)){
		
	echo "<script>alert('**กรุณาระบุห้องเรียน**');history.back();</script>";
	echo "<Script Language='JavaScript'>window.close();</Script>";

	}else if(empty($status)){
		
		echo "<script>alert('**กรุณาระบุสถานะ**');history.back();</script>";
		echo "<Script Language='JavaScript'>window.close();</Script>";
		
	}else {

	$strSQL 	= "SELECT * FROM tb_student where status_stu = '$status' and room = '$room_stu' and class_id like '%$class%' ORDER BY s_id ASC;";
	$objQuery	= mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$num     	= mysql_num_rows($objQuery);	
?>
    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="40" align="center"><font size="5" face="MS Sans Serif, Tahoma, sans-serif"><b>
        ข้อมูลนักเรียน ระดับชั้น <?php echo "ม. ".$class;?> / <?php echo $room_stu;?> สถานะ 
<?php
	if($status == 1)
	{
		echo '<font color="#009900">'."อยู่ในระบบ".'</font>';
		
	}if($status == 2){
		
		echo '<font color="#0033FF">'."จบการศึกษา".'</font>';
	}if($status == 3){
		
		echo '<font color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?>
        </b></font>
        </td>
      </tr>
      <tr>
        <td height="40" align="right">
        <?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลทั้งหมด ";?><?php echo '<b>'.$num.'</b>'." รายการ".'</font>'.'<br>'.'<br>';?>
        </td>
      </tr>
    </table>

  <table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
    <tr>
      <th width="7%" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></th>
      <th width="15%" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>รหัสประจำตัว</b></font></th>
      <th width="31%" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ - นามสกุล</b></font></th>
      <th width="11%" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ระดับชั้น/ห้อง</font></th>
      <th width="5%" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></th>
      <th width="15%" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะ</b></font></th>
      <th width="6%" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ราย<br>
        ละเอียด</font></th>
      <th width="5%" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">แก้ไข</font></th>
      <th width="5%" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
        <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
        <br>
        ลบทั้งหมด</font></th>
    </tr>
<?php
	$i = 0;
	$i < $num;		//นับจำนวนข้อมูล
	
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	
		$s_id		= $objResult['s_id'];
		$stu_id		= $objResult['stu_id'];
		$class_id	= $objResult['class_id'];
		$stu_name	= $objResult['stu_name'];
		$id_card	= $objResult['id_card'];
		$room		= $objResult['room'];
		$no			= $objResult['no'];
		$status_stu	= $objResult['status_stu'];
?>
    <tr class="tbl">
      <td height="26" align="center" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $i;?></font></td>
      <td height="26" align="center" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $stu_id;?></font></td>
      <td height="26" align="center" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $stu_name;?></font></td>
      <td height="26" align="center" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "ม.".'&nbsp;'."$class_id".'&nbsp;'."/".'&nbsp;'."$room";?></font></td>
      <td height="26" align="center" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $no;?></font></td>
      <td height="26" align="center" valign="middle">
<?php
	if($status_stu == 1)
	{
?>
<a href="offline.php?s_id=<?=$s_id?>&class=<?=$class?>&room_stu=<?=$room_stu?>&status=<?=$status?>">
<?php
		echo '<font size="2" color="#009900">'."อยู่ในระบบ".'</font>';
?>
</a>
<?php
	}else if($status_stu == 2){
?>
<a href="online.php?s_id=<?=$s_id?>&class=<?=$class?>&room_stu=<?=$room_stu?>&status=<?=$status?>">
<?php
		echo '<font size="2" color="#0033FF">'."จบการศึกษา".'</font>';
?>
</a>
<?php
	}else if($status_stu == 3){

		echo '<font size="2" color="#FF0000">'."ยกเลิกใช้งาน".'</font>';
	}
?></td>
      <td height="26" align="center" valign="middle"><a href="javascript" onclick="window.open('det_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=470, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
      <td height="26" align="center" valign="middle"><a href="javascript" onclick="window.open('edit_stu.php?s_id=<?=$s_id?>','windowname2','width=750, \height=500, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
      <td height="26" align="center" valign="middle"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $s_id;?>"></td>
    </tr>
    <?php
	}
?>
  </table>
  <br>
  <div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ข้อมูลเรียงลำดับตามการเพิ่มข้อมูลล่าสุด</font>&nbsp;
    <button type="submit" name="btnDelete" id="btnDelete" style="height:30px; font-size:15px;"><img src="images/remove-user.png" width="24" height="24" align="absmiddle" />ลบข้อมูล</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </div>
  <input type="hidden" name="hdnCount" value="<?php echo $i;?>">
  <input type="hidden" name="class" value="<?php echo $class;?>">
  <input type="hidden" name="room_stu" value="<?php echo $room_stu;?>">
  <input type="hidden" name="status" value="<?php echo $status;?>">
</form>
<br>
<?php
	}
?>
</div>
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