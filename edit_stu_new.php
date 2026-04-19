<?php
	session_start();
	include("connection.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เปิด - ปิดระบบลงทะเบียนเรียน</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<style>
.styled-select select {
   background: #333;
   padding: 5px;
   font-size: 16px;
   color: #FFF;
   line-height: 1;
   border: 0;
   border-radius: 0;
   height: 35px;
   }
</style>
</head>

<body>
<?php
if($_SESSION['lognum'] == 3)
	{
?>
<?php	
	$as_id = $_GET['as_id'];	
	
	$sql="SELECT * FROM  tb_add_stu where as_id = '$as_id'";	
	$db_query = mysql_query($sql);
	$result = mysql_fetch_array($db_query);
	
	$as_id	 	= $result['as_id'];
	$name_as 	= $result['name_as'];
	$start_new	= $result['start_new'];
	$end_new 	= $result['end_new'];
	$status_as	= $result['status_as'];
?>
<?php
 	//session แสดงการเข้าสู่ระบบ
	$teacher_id 	= $_SESSION['teacher_id'];
	$tea_pname 		= $_SESSION['tea_pname'];
	$tea_fname 		= $_SESSION['tea_fname'];
	$tea_lname 		= $_SESSION['tea_lname'];
	$teacher_status = $_SESSION['teacher_status'];
	
	//ส่วนของวันที่
	$d = date("d");					
	//ส่วนของเดือน
	$mount = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$m = $mount[date(" m ")-1];
	//ส่วขของปี
	$y = date("Y")+543;	
		
	$day = "$d $m $y";
	//echo $day;
?>
<br>
<form name="form_add" method="post" action="save_edit_stu_new.php" onSubmit="JavaScript:return fncSubmit();">
<table width="95%" border="0"  align="center" cellpadding="0" bgcolor="#FFFFFF">
  <tr>
    <td height="74" align="center" valign="middle"><font size="6" color="#FF6633" face="MS Sans Serif, Tahoma, sans-serif"><b>เปิด - ปิด<?php echo $name_as;?></b></font></td>
  </tr>
  <tr>
    <td height="80" align="center" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="44%" height="35" align="center"><font size="4" face="MS Sans Serif, Tahoma, sans-serif">กำหนดระยะเวลาเปิดระบบ</font><font size="4" face="MS Sans Serif, Tahoma, sans-serif">&nbsp; </font></td>
        <td width="56%" height="35"><font size="4" face="MS Sans Serif, Tahoma, sans-serif">
          <input name="start_new" type="text" id="start_new" value="<?php echo $start_new;?>" size="20"/>
          ถึง
          
        </font></td>
      </tr>
      <tr>
        <td height="35" align="center">&nbsp;</td>
        <td height="35"><font size="4" face="MS Sans Serif, Tahoma, sans-serif">
          <input name="end_new" type="text" id="end_new" value="<?php echo $end_new;?>" size="20"/>
        </font></td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td height="92" align="center" valign="middle" bgcolor="#EFEFEF">
    <div class="styled-select">
      <select name="status">
        <option value="<?php echo "$status_as";?>">
<?php
	if($status_as == 1)
	{
		echo '<font size="2">'."เปิดระบบ".'</font>';
		
	}if($status_as == 2){
		
		echo '<font size="2">'."ปิดระบบ".'</font>';
	}
?>		
		</option>
        <option value="1">เปิดระบบ</option>
        <option value="2">ปิดระบบ</option>
      </select></div></td>
    </tr>
  <tr>
    <td height="66" align="center" valign="middle"><button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/edit.png" width="20" height="20" align="absmiddle" /> ดำเนินการเปลี่ยนแปลง</button>
      <input type="hidden" name="as_id" value="<?php echo $as_id;?>" />
      <input type="hidden" name="teacher_id" value="<?php echo $teacher_id;?>" />
      <input type="hidden" name="day" value="<?php echo $day;?>" /></td>
    </tr>
</table><br>
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