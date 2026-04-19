<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แก้ไขข้อมูลข่าวประกาศ</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" type="text/css" href="style/style.css">
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
<form name="formNew" method="post" action="save_edit_new.php">
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
          <tr bgcolor="#999999">
            <td height="37" colspan="2" align="center" bgcolor="#3399FF"><font size="5" face="MS Sans Serif, Tahoma, sans-serif" color="#FFFFFF"><b>แก้ไขข้อมูลข่าวประกาศ</b></font></td>
          </tr>
          <tr>
            <td height="25" colspan="2" align="center" bgcolor="#E8E8E8">&nbsp;</td>
          </tr>
          <tr>
            <td width="26%" height="25" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">วันที่ประกาศ </font>:</td>
            <td width="74%" height="25" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>
<?php
	//ส่วนของวันที่
	$d = date("d");	
				
	//ส่วนของเดือน
	$mount = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$m = $mount[date(" m ")-1];
	
	//ส่วขของปี
	$y = date("Y")+543;		
	echo " $d $m $y";
?>
            </b></font></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">เรื่อง</font> :</td>
            <td height="25" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
              <input name="sub_new" type="text" class="txt_box" id="sub_new" value="<?php echo "$sub_new";?>" size="73" />
            </font></td>
          </tr>
          <tr>
            <td height="25" valign="top" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รายละเอียดข่าว </font>:</td>
            <td height="25" bgcolor="#E8E8E8"><textarea name="det_new" cols="75" rows="9" wrap="off" class="txt_box"><?php echo "$det_new";?></textarea></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อผู้แจ้งข่าว </font>:</td>
            <td height="25" bgcolor="#E8E8E8">
<?php
     //session แสดงการเข้าสู่ระบบ
	$teacher_id 	= $_SESSION['teacher_id'];
	$tea_pname 		= $_SESSION['tea_pname'];
	$tea_fname 		= $_SESSION['tea_fname'];
	$tea_lname 		= $_SESSION['tea_lname'];
	$teacher_status = $_SESSION['teacher_status'];
			  
	$sql_ss 		= "select * from tb_teacher where tea_id = '$teacher_id';";		//session = id ในตาราง
	$db_query_ss	= mysql_query($sql_ss);
	$result_ss		= mysql_fetch_array($db_query_ss);
											
	$t_id		= $result_ss['t_id'];
	$tea_id		= $result_ss['tea_id'];
	$pname		= $result_ss['pname'];
	$fname		= $result_ss['fname'];
	$lname		= $result_ss['lname'];
?>
  <font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><?php echo "$pname".'&nbsp;'."$fname".'&nbsp;'."$lname";?></b></font></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#E8E8E8"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ประกาศถึง </font>:</td>
            <td height="25" bgcolor="#E8E8E8">
            <select name="status" class="styled-select" style="width: 150px">
      		<option value="<?php echo "$status_new";?>">
<?php
	if($status_new == 1)
	{
		echo '<font size="2">'."หน้าแรก".'</font>';
		
	}if($status_new == 2){
		
		echo '<font size="2">'."นักเรียน".'</font>';
		
	}if($status_new == 3){
		
		echo '<font size="2">'."ครูผู้สอน".'</font>';
		
	}if($status_new == 4){
		
	echo '<font size="2">'."รอประกาศ".'</font>';
	}
?>
              <option value="1">หน้าแรก</option>
              <option value="2">นักเรียน</option>
              <option value="3">ครูผู้สอน</option>
              <option value="4">รอประกาศ</option>
            </select></td>
          </tr>
          <tr>
            <td height="60">&nbsp;</td>
            <td><button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/edit.png" width="24" height="24" align="absmiddle" /> แก้ไขข้อมูล</button>
            <input type="hidden" name="new_id" value="<?php echo $new_id;?>" />
            <input type="hidden" name="t_id" value="<?php echo $t_id;?>" />
            <input type="hidden" name="d" value="<?php echo $d;?>" />
            <input type="hidden" name="m" value="<?php echo $m;?>" />
            <input type="hidden" name="y" value="<?php echo $y;?>" />
            <br></td>
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