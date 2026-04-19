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

<!--cssเครื่องมือ-->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<style type="text/css">
     .form-group{ margin-bottom:0px !important;}
     .form-control-feedback{top:0px !important;}
div#mylayout_a {	display:block;
	width:810px;
	word-wrap:break-word;
}
div#mylayout_b {	display:block;
	width:810px;
	word-wrap:break-word;
}
</style>
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
            <td width="68%" valign="middle"><a href="<?='http://'.config_url;?>" target="_blank"><font size="3" color="#007BB7"><b><?=config_url;?></b></font></a></td>
            <td width="25%" align="right" valign="middle">&nbsp;</td>
            <td width="2%" valign="middle">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="23%" valign="top" bgcolor="#FFFFFF"><?php include "menu_tea.php";?></td>
        <td width="77%" align="center" valign="top" bgcolor="#FFFFFF">
        
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><marquee scrollamount="5" direction="left"><b>หน้าแรกส่วนของครูผู้สอน :: <?=config_title;?></b></marquee><br></td>
          </tr>
          <tr>
            <td height="40" align="left" valign="middle">&nbsp;&nbsp;<font size="5" color="#FF9900"><b><i>ยินดีต้อนรับเข้าสู่ระบบลงทะเบียนกิจกรรมชุมนุมออนไลน์</i></b></font>
            <br>&nbsp;&nbsp;<font size="3" color="#FF9900"><i>ผ่ า น เ ค รื อ ข่ า ย อิ น เ ท อ ร์ เ น็ ต . . . </i></font></td>
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
				$tea_status	= $result1['tea_status'];
?>
              <font size="3" ><b><?php echo '&nbsp;&nbsp;'."$teacher_id".'&nbsp;'.":".'&nbsp;'."$tea_pname".'&nbsp;'."$tea_fname".'&nbsp;'."$tea_lname";?></b></font><br>&nbsp;&nbsp;<img src="images/horz_1.gif" /></td>
          </tr>
        </table>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>&nbsp;&nbsp;<img src="images/new.jpg"/></td>
          </tr>
        </table>
        <br>
<?php		
		$sql	  = "SELECT * FROM tb_newupdate where status_new ='3' order by new_id DESC";
		$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
		$num      = mysql_num_rows($db_query);		

		$ie =0;	//ตัวเช็ควนรอบ
		while($ie < $num)	//ถ้าค่าiน้อยกว่าnum จะวนรอบต่อไป
		{
			$result = mysql_fetch_array($db_query);	
			$new_id		=$result['new_id'];	
			$sub_new	=$result['sub_new'];
			$det_new	=$result['det_new'];	
			$status_new	=$result['status_new'];
			$new_date	=$result['new_date'];
			$tea_id		=$result['tea_id'];
?>
<?php
	if($status_new == 3)	//เงื่อนไขตรวจสอบสถานะข่าว
	{
?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
          <tr>
            <td width="2%" height="25" valign="bottom">&nbsp;</td>
            <td width="96%" height="25" valign="bottom"><div id="mylayout_a"><font size="3"><b>เรื่อง</b> <?php echo "$sub_new";?></font></div></td>
            <td width="2%" height="25" valign="bottom">&nbsp;</td>
          </tr>
          <tr>
            <td height="50" valign="middle">&nbsp;</td>
            <td height="50" valign="middle"><div id="mylayout_b"><font size="3"><b>รายละเอียด</b>&nbsp; <?php echo nl2br($result["det_new"]);?></font></div><br>
            </td>
            <td height="50" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td height="20" valign="bottom">&nbsp;</td>
            <td height="20" align="right" valign="bottom" bgcolor="#EBEBEB"><font size="2">ประกาศเมื่อ<b>&nbsp;<?php echo "$new_date";?>&nbsp;&nbsp;</b>ประกาศโดย</font>
<?php
		$sqlt 		= "select * from tb_teacher where t_id = '$tea_id'";		//session = id ในตาราง
		$db_queryt	= mysql_query($sqlt);
		$resultt	= mysql_fetch_array($db_queryt);
											
		$tea_id		= $resultt['tea_id'];
		$pname		= $resultt['pname'];
		$fname		= $resultt['fname'];
		$lname		= $resultt['lname'];
		
?>
              <font size="2" color="#993300"><b><?php echo '&nbsp;'."$pname".'&nbsp;'."$fname".'&nbsp;'."$lname";?></b></font></td>
            <td height="20" valign="bottom">&nbsp;</td>
          </tr>
        </table>
        <hr size="1" width="95%" color="#666666">
<?php 
	$ie ++;
	}
?>
<?php
	}if($status_new != 3){	//ไม่เท่ากับ สถานะ 3
		
		echo '<font size="4" color="#000000">ยังไม่มีข่าวประกาศ</font>';		
	}
?>
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
	else if($o_status == 2)
	{
	
	include "new.php";
	
	}	//ปิดประกาศข่าวระบบ
?>
</body>
</html>