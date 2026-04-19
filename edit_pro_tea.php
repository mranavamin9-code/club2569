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
<link rel="stylesheet" type="text/css" href="style/style.css">
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

<body background="images/bg.gif" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<?php
// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 2)
	{
?>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
  <td valign="top">    
    <table width="100%" height="800" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
      <tr>
        <td height="289" colspan="2" valign="top" background="images/pic/banner.jpg"><table width="100%" height="50" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="5%" height="50">&nbsp;</td>
            <td width="68%" valign="middle"><a href="<?='http://'.config_url;?>" target="_blank"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#007BB7"><b><?=config_url;?></b></font></a></td>
            <td width="25%" align="right" valign="middle"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#FFFFFF"><b><a href="index_tea.php">กลับหน้าหลัก</a></b></font></td>
            <td width="2%" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td width="23%" valign="top"><?php include "menu_tea.php";?></td>
        <td width="77%" valign="top">
        <form name="form_add" method="post" action="save_edit_pro_tea.php">
        <table width="80%" border="1" align="left" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" style="border-collapse:collapse;">
          <tr>
            <td width="3%">&nbsp;</td>
            <td colspan="2">
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
											
				$t_id		= $result1['t_id'];
				$tea_id		= $result1['tea_id'];
				$pname		= $result1['pname'];
				$fname		= $result1['fname'];
				$lname		= $result1['lname'];
				$idcard		= $result1['idcard'];
				$cat_id		= $result1['cat_id'];
				$tea_status	= $result1['tea_status'];

?>
            <font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><?php echo "$teacher_id".'&nbsp;'.":".'&nbsp;'."$tea_pname".'&nbsp;'."$tea_fname".'&nbsp;'."$tea_lname";?></b></font><br>
            <img src="images/horz_1.gif"></td>
            </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="36" colspan="2" valign="bottom"><font size="5" face="MS Sans Serif, Tahoma, sans-serif" color="#FF6600"><b>แก้ไขข้อมูลประจำตัวครูผู้สอน</b></font></td>
            </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="25" colspan="2" valign="middle" bgcolor="#91C8FF"><font size="4" face="MS Sans Serif, Tahoma, sans-serif"><b>ข้อมูลประจำตัว</b></font></td>
            </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td width="27%" height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัว :</font></td>
            <td width="70%" height="25" valign="middle" bgcolor="#EEF1FD">&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><?php echo "$tea_id";?></b></font></td>
          </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสประจำตัวประชาชน :</font></td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><input name="idcard" type="text" class="txt_box" id="idcard" onkeyup="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" value="<?php echo "$idcard";?>" size="20" maxlength="13">
            <font size="3" color="#FF0000">*</font></td>
          </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="25" valign="top" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อ - นามสกุล :</font></td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                  <td width="31%">
                    <input name="pname" type="text" class="txt_box" id="pname" value="<?php echo "$pname";?>" size="10" />&nbsp;<font size="3" color="#FF0000">*</font></td>
                  <td width="69%" height="30"><input name="fname" type="text" class="txt_box" id="fname" value="<?php echo "$fname";?>" size="20">&nbsp;<font size="3" color="#FF0000">*</font></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td height="30"><input name="lname" type="text" class="txt_box" id="lname" value="<?php echo "$lname";?>" size="20">&nbsp;<font size="3" color="#FF0000">*</font></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td width="3%">&nbsp;</td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">กลุ่มสาระการเรียนรู้ :</font></td>
            <td height="25" valign="middle" bgcolor="#EEF1FD">
<?php		
	$sql2 		= "select * from tb_category where cat_id = '$cat_id';";
	$db_query2	= mysql_query($sql2);
	$result2	= mysql_fetch_array($db_query2);
			
	$cat_name	= $result2['cat_name'];
	
	//ส่วนแสดง Option
	$sql3 = "SELECT * FROM tb_category WHERE status_cat ='1'";
	$result3 = mysql_query($sql3);
	$num3 = mysql_num_rows($result3);
				
	print("<select name =\"cat_id\" class=\"styled-select\">");
						
	print("<option value='".$cat_id."'>".$cat_name."</option>");
							
	while($rs3 = mysql_fetch_array($result3))
	{
	print("<option value=$rs3[cat_id]>$rs3[cat_name]</option>");
	}
	print("</select>");
?>
			<font size="3" color="#FF0000">*</font></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะ :</font></td>
            <td height="25" valign="middle" bgcolor="#EEF1FD"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	$s = '$tea_status';
	switch( $tea_status){
	case '1' :
		echo '&nbsp;'."ครูผู้สอน";
		echo "<font color=\"#00CC00\">";
		echo '&nbsp;'."(ยังอยู่ในระบบ)";
		echo "</font>".'&nbsp;';
		echo "<img src=\"images/true.png\">";
	break;
	case '2' :
		echo '&nbsp;'."เจ้าหน้าที่";
		echo "<font color=\"#00CC00\">";
		echo '&nbsp;'."(ยังอยู่ในระบบ)";
		echo "</font>".'&nbsp;';
		echo "<img src=\"images/true.png\">";
	break;
	case '3' :
		echo "<font color=\"#FF0000\">";
		echo '&nbsp;'."ยกเลิกใช้งาน";
		echo "</font>".'&nbsp;';
		echo "<img src=\"images/false.png\">";	
	break;
	}
?></font></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td height="51" colspan="2" valign="middle">
            <button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/edit.png" width="24" height="24" align="absmiddle"> แก้ไขข้อมูล</button>
            <input name="t_id" type="hidden" id="t_id" value="<?php echo $t_id;?>"></td>
          </tr>
          </table>
          </form>

        </td>
      </tr>
    </table></td>
  </tr>
</table>
<?php include "tbl_text.php";?>	<!--ส่วนล่างสุด-->
<?php
}else{
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"index.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>