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

<style type="text/css">
body,td {
	font-family: Arial, Helvetica, sans-serif;
	color: #000000;
}
</STYLE>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>

<body background="images/bg.gif" onload="document.form_login.uname.focus()" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
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
	if($_SESSION['lognum'] == 1)
	{
		echo "<script langquage='javascript'>\n";
		echo " window.location=\"index_stu.php\"\n";
		echo "</script>\n";
		
	}if($_SESSION['lognum'] == 2)
	{
		echo "<script langquage='javascript'>\n";
		echo " window.location=\"index_tea.php\"\n";
		echo "</script>\n";
		
	}if($_SESSION['lognum'] == 3)
	{
		echo "<script langquage='javascript'>\n";
		echo " window.location=\"index_emp.php\"\n";
		echo "</script>\n";
		
	}else	//ถ้าไม่มีค่า session จะให้แสดงหน้าแรกเพื่อล็อกอินเข้ามายังระบบ
	{
?>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td><table width="100%" bgcolor="#FFFFFF" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
      <tr>
        <td height="289" valign="top" background="images/pic/banner.jpg" bgcolor="#FFFFFF"><table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5%" height="50">&nbsp;</td>
            <td width="68%" valign="middle"><a href="<?='http://'.config_url;?>" target="_blank"><font size="3" color="#007BB7"><b><?=config_url;?></b></font></a></td>
            <td width="25%" align="right" valign="middle"><font size="3" color="#FFFFFF"><b><a href="index.php">กลับหน้าหลัก</a></b></font></td>
            <td width="2%" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td height="194">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right" valign="middle">&nbsp;</td>
            <td valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>
        <form name="form_login" method="post" action="check_tea.php">
        <table width="100%" height="495" border="0" cellspacing="0" cellpadding="0" background="images/pic/bg_tea.jpg">
          <tr>
            <td width="11%" height="90" valign="top">&nbsp;</td>
            <td width="29%" height="90" valign="top">&nbsp;</td>
            <td width="60%" valign="top">&nbsp;</td>
            </tr>
          <tr>
            <td height="65" valign="top">&nbsp;</td>
            <td height="65" valign="middle"><div class="form-group has-feedback" style="width:250px;">
            <input name="uname" type="text" placeholder="รหัสประจำตัว" class="form-control css-require" />
            </div></td>
            <td valign="top">&nbsp;</td>
            </tr>
          <tr>
            <td height="58" valign="top">&nbsp;</td>
            <td height="58" valign="middle"><div class="form-group has-feedback" style="width:250px;">
            <input name="pword" type="password" id="pass" placeholder="รหัสประจำตัวประชาชน" class="form-control css-require" />
            </div></td>
            <td valign="middle">&nbsp;</td>
            </tr>
          <tr>
            <td height="58" valign="top">&nbsp;</td>
            <td height="57" valign="top"><button type="submit" name="button" id="button" class="btn btn-primary"><img src="images/log.png" width="20" height="24" align="absmiddle" />&nbsp;&nbsp; เข้าสู่ระบบ &nbsp;&nbsp;</button></td>
            <td valign="middle">&nbsp;</td>
            </tr>
          <tr>
            <td height="53" valign="top">&nbsp;</td>
            <td height="53" valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            </tr>
          <tr>
            <td height="0" valign="top">&nbsp;</td>
            <td height="0" valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            </tr>
          </table></form></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php include "tbl_text.php";?>
<?php
	}	//ปิด session
?>
<?php
	}else if($o_status == 2){
	
	include "new.php";
	
	}	//ปิดประกาศข่าวระบบ
?>
</body>
</html>