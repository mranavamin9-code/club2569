<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>กำลังลบข้อมูล</title>
</head>

<body>
<?php
	if($_SESSION['lognum'] == 3)
	{
?>
<?php	
	$class 		= $_POST['class'];
	$room_stu	= $_POST['room_stu'];
	$status 	= $_POST['status'];
	
	for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = "DELETE FROM tb_student ";
			$strSQL .="WHERE s_id = '".$_POST["chkDel"][$i]."' ";		//ค่าที่เลือกรันให้เท่ากับ sel_id แล้วจะลบข้อมูล
			$objQuery = mysql_query($strSQL);
		}
	}
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center">
    <td><br><br><img src="images/checkmark.png" width="60" height="60"></td>
  </tr>
  <tr align="center">
    <td height="37">
    <font size="3" face="MS Sans Serif, Tahoma, sans-serif">ลบข้อมูลเรียบร้อยแล้ว</font><br>     
    <meta http-equiv=refresh content=1;URL=det_mgt_stu.php?id=<?=$id?>&class=<?=$class?>&room_stu=<?=$room_stu?>&status=<?=$status?>>
    </td>
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