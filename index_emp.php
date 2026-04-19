<?php
	session_start();
	include("connection.php");
	require_once("config.in.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<title><?=config_title;?></title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" type="text/css" href="style/style.css">
<style type="text/css">
body,td {
	font-family: Arial, Helvetica, sans-serif;
	color: #000000;
}
</STYLE>

<STYLE>
.tbl:hover{							
	background-color: #D6E7D1;	/*สีเมื่อเมาส์ไปโดน*/
}
</STYLE>
</head>

<body background="images/bg.gif" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<?php		
	$sql_o		= "select * from tb_on_off";
	$db_query_o = mysql_query($sql_o);
	$result_o 	= mysql_fetch_array($db_query_o);	

	$o_id		= $result_o['o_id'];
	$post		= $result_o['post'];
	$o_status	= $result_o['o_status'];

	if($o_status == 1)		//เงื่อนไขตรวจสอบสถานะประกาศปิดระบบ
	{
?>
<?php
	// ส่วนของการทำ User Authentication 
	if($_SESSION['lognum'] == 3)
	{
?>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr valign="top">
    <td valign="top">    
    <table width="100%" height="800" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
      <tr>
        <td height="289" colspan="2" valign="top" background="images/pic/banner.jpg"><table width="100%" height="50" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5%" height="50">&nbsp;</td>
            <td width="68%" valign="middle"><a href="<?='http://'.config_url;?>" target="_blank"><font size="3" color="#007BB7"><b><?=config_url;?></b></font></a></td>
            <td width="25%" align="right" valign="middle"><font size="3" color="#FFFFFF"><b><a href="index_emp.php">กลับหน้าหลัก</a></b></font></td>
            <td width="2%" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="23%" valign="top"><?php include "menu_emp.php";?></td>
        <td width="77%" valign="top">
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><marquee scrollamount="5" direction="left"><b>หน้าแรกส่วนของเจ้าหน้าที่ :: <?=config_title;?></b></marquee><br></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top">
<?php
                //session แสดงการเข้าสู่ระบบ
				$teacher_id 	= $_SESSION['teacher_id'];
				$tea_pname 		= $_SESSION['tea_pname'];
				$tea_fname 		= $_SESSION['tea_fname'];
				$tea_lname 		= $_SESSION['tea_lname'];
				$teacher_status	= $_SESSION['teacher_status'];
				
				$sql1 		= "select * from tb_teacher where tea_id = '$teacher_id';";		//session = id ในตาราง
				$db_query1	= mysql_query($sql1);
				$result1	= mysql_fetch_array($db_query1);
											
				$tea_id		= $result1['tea_id'];
				$pname		= $result1['pname'];
				$fname		= $result1['fname'];
				$lname		= $result1['lname'];
				$idcard		= $result1['idcard'];
				$cat_id		= $result1['cat_id'];
				$tea_status	= $result1['tea_status'];

?>
              <font size="3"><b><?php echo '&nbsp;&nbsp;'."$teacher_id".'&nbsp;'.":".'&nbsp;'."$tea_pname".'&nbsp;'."$tea_fname".'&nbsp;'."$tea_lname";?></b></font><br>&nbsp;&nbsp;<img src="images/horz_1.gif">
            </td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;&nbsp;<font size="3" color="#FF9900"><b>ยินดีต้อนรับเข้าสู่ระบบลงทะเบียนกิจกรรมชุมนุมออนไลน์</b></font></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="5" color="#FF9900"><b>ระบบลงทะเบียนกิจกรรมชุมนุมออนไลน์</b></font></td>
          </tr>
          <tr>
            <td height="33" align="left" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="4" color="#FF9900"><i>ผ่ า น เ ค รื อ ข่ า ย อิ น เ ท อ ร์ เ น็ ต . . .
</i></font></td>
          </tr>
        </table>      
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<?php include "tbl_text2.php";?>
<?php
	//ส่วนของ User Authentication 
	}else{
		echo "<script langquage='javascript'>\n";
		echo "window.location=\"index.php\"\n";
		echo "</script>\n";
	}
?>
<?php
	}
	else if($o_status == 2){
	
	include "new.php";
	}	//ปิดประกาศข่าวระบบ
?>
</body>
</html>