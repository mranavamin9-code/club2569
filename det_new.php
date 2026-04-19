<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายละเอียดข่าวประกาศ</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
</head>

<body>
<?php
// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 3)
	{
?>
<?php
	$new_id = $_GET['new_id'];
	
	$sql="SELECT * FROM  tb_newupdate where new_id = '$new_id'";
	$db_query = mysql_query($sql);
	$result = mysql_fetch_array($db_query);	
	
	$new_id		= $result['new_id'];
	$new_date	= $result['new_date'];
	$sub_new	= $result['sub_new'];
	$det_new	= $result['det_new'];
	$status_new	= $result['status_new'];
	$tea_id		= $result['tea_id'];
?>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
          <tr bgcolor="#999999">
            <td height="37" colspan="2" align="center" bgcolor="#3399FF"><font size="5" face="MS Sans Serif, Tahoma, sans-serif" color="#FFFFFF"><b>รายละเอียดข่าวประกาศ</b></font></td>
          </tr>
          <tr>
            <td height="25" colspan="2" align="center" bgcolor="#E8E8E8">&nbsp;</td>
          </tr>
          <tr>
            <td width="24%" height="25" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">วันที่ประกาศ </font>:</td>
            <td width="76%" height="25" bgcolor="#E8E8E8">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$new_date";?></font></td>
          </tr>
          <tr>
            <td height="25" valign="top" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง</font> :</td>
            <td height="25" valign="top" bgcolor="#E8E8E8">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$sub_new";?></font></td>
          </tr>
          <tr>
            <td height="25" valign="top" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รายละเอียดข่าว </font>:</td>
            <td height="25" valign="top" bgcolor="#E8E8E8">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><?php echo nl2br($result["det_new"]);?></font></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อผู้แจ้งข่าว </font>:</td>
            <td height="25" bgcolor="#E8E8E8">
<?php			  
	$sql_ss 		= "select * from tb_teacher where t_id = '$tea_id';";		//session = id ในตาราง
	$db_query_ss	= mysql_query($sql_ss);
	$result_ss		= mysql_fetch_array($db_query_ss);
											
	$pname		= $result_ss['pname'];
	$fname		= $result_ss['fname'];
	$lname		= $result_ss['lname'];
?>
  <font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><?php echo '&nbsp;'."$pname".'&nbsp;'."$fname".'&nbsp;'."$lname";?></b></font></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ประกาศถึง </font>:</td>
            <td height="25" bgcolor="#E8E8E8">&nbsp;<?php
	if($status_new == 1)
	{
		echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#0000FF">'."หน้าแรก".'</font>';
		
	}if($status_new == 2){
		
		echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600">'."นักเรียน".'</font>';
		
	}if($status_new == 3){
		
		echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#009900">'."ครูผู้สอน".'</font>';
		
	}if($status_new == 4){
		
		echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#6D2D95">'."รอประกาศ".'</font>';
	}
?> 
            </td>
          </tr>
        </table>

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