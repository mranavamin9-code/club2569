<?php
	session_start();
	include("connection.php");
	require_once("config.in.php");
	
	function chkBrowser($nameBroser){	//&#3648;&#3594;&#3655;&#3588; web-browcer
   		return preg_match("/".$nameBroser."/",$_SERVER['HTTP_USER_AGENT']);
	}
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

<!--css&#3648;&#3588;&#3619;&#3639;&#3656;&#3629;&#3591;&#3617;&#3639;&#3629;-->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<style type="text/css">
     .form-group{ margin-bottom:0px !important;}
     .form-control-feedback{top:0px !important;}
</style>

<style type="text/css">
/*&#3585;&#3619;&#3629;&#3610;&#3586;&#3656;&#3634;&#3623;*/
div#mylayout_sub{
	display:block;
	width:770px;
	word-wrap:break-word;
}
div#mylayout_det{
	display:block;
	width:770px;
	word-wrap:break-word;
}
</style>

<script language=JavaScript>

var message="";
///////////////////////////////////
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")

</script>
</head>

<body background="images/bg.gif" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<?php		
	$sql_o		= "select * FROM tb_on_off";
	$db_query_o = mysql_query($sql_o);
	$result_o 	= mysql_fetch_array($db_query_o);	

	$o_id		= $result_o['o_id'];
	$post		= $result_o['post'];
	$o_status	= $result_o['o_status'];

	if($o_status == 1)		//&#3648;&#3591;&#3639;&#3656;&#3629;&#3609;&#3652;&#3586;&#3605;&#3619;&#3623;&#3592;&#3626;&#3629;&#3610;&#3626;&#3606;&#3634;&#3609;&#3632;&#3611;&#3619;&#3632;&#3585;&#3634;&#3624;&#3611;&#3636;&#3604;&#3619;&#3632;&#3610;&#3610;
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
		
	}else	//&#3606;&#3657;&#3634;&#3652;&#3617;&#3656;&#3617;&#3637;&#3588;&#3656;&#3634; session &#3592;&#3632;&#3651;&#3627;&#3657;&#3649;&#3626;&#3604;&#3591;&#3627;&#3609;&#3657;&#3634;&#3649;&#3619;&#3585;&#3648;&#3614;&#3639;&#3656;&#3629;&#3621;&#3655;&#3629;&#3585;&#3629;&#3636;&#3609;&#3648;&#3586;&#3657;&#3634;&#3617;&#3634;&#3618;&#3633;&#3591;&#3619;&#3632;&#3610;&#3610;
	{
?>
<?php
	include "check_date_time.php";		//&#3605;&#3619;&#3623;&#3592;&#3626;&#3629;&#3610;&#3623;&#3633;&#3609;&#3648;&#3623;&#3621;&#3634;&#3627;&#3617;&#3604;&#3648;&#3586;&#3605;&#3648;&#3621;&#3639;&#3629;&#3585;
?>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr valign="top">
    <td valign="top">    
    <table width="100%" height="800" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
      <tr>
        <td height="289" colspan="2" valign="top" background="images/pic/banner.jpg"><table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="5%" height="50">&nbsp;</td>
            <td width="68%" valign="middle"><a href="<?='http://'.config_url;?>" target="_blank"><font size="3" color="#007BB7"><b><?=config_url;?></b></font></a></td>
            <td width="25%" align="right" valign="middle">&nbsp;</td>
            <td width="2%" valign="middle">&nbsp;</td>
          </tr>
          <tr>
            <td height="186">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right" valign="middle">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="67%" align="right">
<?php

	if($status_in == 1)		//&#3648;&#3591;&#3639;&#3656;&#3629;&#3609;&#3652;&#3586;&#3605;&#3619;&#3623;&#3592;&#3626;&#3629;&#3610;&#3626;&#3606;&#3634;&#3609;&#3632;&#3611;&#3636;&#3604;&#3585;&#3634;&#3619;&#3619;&#3633;&#3610;&#3594;&#3640;&#3617;&#3609;&#3640;&#3617;
	{
?>
	<div id="showRemain"></div>		<!--&#3626;&#3656;&#3623;&#3609;&#3586;&#3629;&#3591;&#3585;&#3634;&#3619;&#3648;&#3623;&#3621;&#3634;&#3609;&#3633;&#3610;&#3606;&#3629;&#3618;&#3627;&#3621;&#3633;&#3591;-->
<?php
	}else if($status_in == 2){
		
		echo '<font size="3" color="#FF0000">'."&#3652;&#3617;&#3656;&#3629;&#3618;&#3641;&#3656;&#3651;&#3609;&#3594;&#3656;&#3623;&#3591;&#3586;&#3629;&#3591;&#3585;&#3634;&#3619;&#3621;&#3591;&#3607;&#3632;&#3648;&#3610;&#3637;&#3618;&#3609;&#3594;&#3640;&#3617;&#3609;&#3640;&#3617;".'</font>';
	}
?></td>
    <td width="33%" align="right"><a href="login_stu.php"><button type="submit" name="button" id="button" style="height:35px; font-size:15px;" class="btn btn-primary"><img src="images/login1.png" width="20" height="20" align="absmiddle" /> &#3609;&#3633;&#3585;&#3648;&#3619;&#3637;&#3618;&#3609; &#3621;&#3655;&#3629;&#3585;&#3629;&#3636;&#3609;&#3648;&#3586;&#3657;&#3634;&#3626;&#3641;&#3656;&#3619;&#3632;&#3610;&#3610;</button>
      </a>&nbsp;&nbsp;</td>
  </tr>
</table>
            </td>
            <td valign="middle">&nbsp;&nbsp;<a href="login_tea.php"><button type="submit" name="button" id="button2" style="height:35px; font-size:15px;" class="btn btn-primary"><img src="images/login2.png" width="20" height="20" align="absmiddle" /> &#3648;&#3592;&#3657;&#3634;&#3627;&#3609;&#3657;&#3634;&#3607;&#3637;&#3656;/&#3588;&#3619;&#3641; &#3621;&#3655;&#3629;&#3585;&#3629;&#3636;&#3609;&#3648;&#3586;&#3657;&#3634;&#3626;&#3641;&#3656;&#3619;&#3632;&#3610;&#3610;</button></a></td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td width="23%" valign="top" bgcolor="#eaeaea"><table width="100%" height="166" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="97"><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;" bordercolor="#CCCCCC">
              <tr>
                <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="22" colspan="2" align="center" bgcolor="#F7F7F7"><?php include "time.php";?></td>
                  </tr>
                   <tr>
                    <td height="25" colspan="2" align="center" bgcolor="#D6D6D6"><font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#e4433c"><b>&#3626;&#3606;&#3634;&#3609;&#3632;&#3586;&#3629;&#3591;&#3619;&#3632;&#3610;&#3610;</b></font></td>
                  </tr>
                  <tr>
                    <td height="10" align="right" bgcolor="#E0E0E0">&nbsp;</td>
                    <td height="10" align="center" bgcolor="#E0E0E0">&nbsp;</td>
                  </tr>
                  <tr>
<?php		
	$sql_l		= "SELECT * FROM tb_log_index";
	$db_query_l = mysql_query($sql_l);
	$result_l	= mysql_fetch_array($db_query_l);	

	$in_id		= $result_l['in_id'];	
	$name_in	= $result_l['name_in'];
	$status_in	= $result_l['status_in'];
?>
                    <td height="22" align="right" bgcolor="#E0E0E0"><font size="2"><?php echo $name_in." ::";?></font></td>
                    <td height="22" align="center" bgcolor="#E0E0E0">
<?php
	if($status_in == 1)		//&#3648;&#3591;&#3639;&#3656;&#3629;&#3609;&#3652;&#3586;&#3605;&#3619;&#3623;&#3592;&#3626;&#3629;&#3610;&#3626;&#3606;&#3634;&#3609;&#3632;&#3611;&#3636;&#3604;&#3585;&#3634;&#3619;&#3619;&#3633;&#3610;&#3594;&#3640;&#3617;&#3609;&#3640;&#3617;
	{
		echo '<font size="2" color="#009900">&#3648;&#3611;&#3636;&#3604;&#3619;&#3632;&#3610;&#3610;</font>';
	}
	else if($status_in == 2)
	{
		echo '<font size="2" color="#FF0000">&#3611;&#3636;&#3604;&#3619;&#3632;&#3610;&#3610;</font>';
	}
?></td>
                  </tr>
                  <tr>
<?php
	$sql_as		= "SELECT * FROM tb_add_stu";
	$db_query_as = mysql_query($sql_as);
	$result_as 	= mysql_fetch_array($db_query_as);	

	$as_id		= $result_as['as_id'];	
	$name_as	= $result_as['name_as'];
	$start_new	= $result_as['start_new'];
	$end_new 	= $result_as['end_new'];
	$tea_id		= $result_as['tea_id'];
	$date_up	= $result_as['date_up'];	
	$status_as	= $result_as['status_as'];
?>
                    <td height="10" align="right" bgcolor="#E0E0E0"><font size="2"><?php echo $name_as." ::";?></font></td>
                    <td height="10" align="center" bgcolor="#E0E0E0">
<?php
	if($status_as == 1)		//&#3648;&#3591;&#3639;&#3656;&#3629;&#3609;&#3652;&#3586;&#3605;&#3619;&#3623;&#3592;&#3626;&#3629;&#3610;&#3626;&#3606;&#3634;&#3609;&#3632;&#3611;&#3636;&#3604;&#3585;&#3634;&#3619;&#3619;&#3633;&#3610;&#3594;&#3640;&#3617;&#3609;&#3640;&#3617;
	{
		echo '<font size="2" color="#009900">&#3648;&#3611;&#3636;&#3604;&#3619;&#3632;&#3610;&#3610;</font>';
	}
	else if($status_as == 2)
	{
		echo '<font size="2" color="#FF0000">&#3611;&#3636;&#3604;&#3619;&#3632;&#3610;&#3610;</font>';
	}
?>
                    </td>
                  </tr>
                  <tr>
                    <td height="10" align="right" bgcolor="#E0E0E0">&nbsp;</td>
                    <td height="10" align="center" bgcolor="#E0E0E0">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
            </tr>
          <tr>
            <td height="22" valign="top"><?php include "menu_index.php";?></td>
          </tr>
          </table> 
<br><br><br><br><br><br>
<div align="center">
<!-- Inizio Codice ShinyStat -->
<script src="//codice.shinystat.com/cgi-bin/getcod.cgi?USER=stunbr"></script>
<noscript>
<a href="https://www.shinystat.com/it/" target="_top">
<img src="//www.shinystat.com/cgi-bin/shinystat.cgi?USER=stunbr" alt="Statistiche web" style="border:0px" /></a>
</noscript>
<!-- Fine Codice ShinyStat -->



<!-- End ShinyStat Free code -->
<br>
<font size="2">&#3626;&#3606;&#3636;&#3605;&#3636;&#3612;&#3641;&#3657;&#3648;&#3586;&#3657;&#3634;&#3651;&#3594;&#3657;</font>
</div>       
          </td>
        <td width="77%" align="center" valign="top" bgcolor="#FFFFFF">
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
    	<td width="52%"><img src="images/new.jpg"/></td>
    </tr>
</table>

<?php
	if($status_as == 1)		//&#3648;&#3591;&#3639;&#3656;&#3629;&#3609;&#3652;&#3586;&#3605;&#3619;&#3623;&#3592;&#3626;&#3629;&#3610;&#3626;&#3606;&#3634;&#3609;&#3632;&#3611;&#3636;&#3604;&#3585;&#3634;&#3619;&#3619;&#3633;&#3610;&#3594;&#3640;&#3617;&#3609;&#3640;&#3617;
	{
?>
<br>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="2%" height="20" valign="bottom">&nbsp;</td>
    <td height="20" colspan="3" valign="bottom"><u><font size="3"><b>&#3648;&#3619;&#3639;&#3656;&#3629;&#3591;</b></font>&nbsp;&nbsp;<font size="3">&#3649;&#3592;&#3657;&#3591;&#3585;&#3634;&#3619;&#3648;&#3611;&#3636;&#3604;&#3619;&#3632;&#3610;&#3610;<?php echo $name_as;?>&#3626;&#3635;&#3627;&#3619;&#3633;&#3610;&#3609;&#3633;&#3585;&#3648;&#3619;&#3637;&#3618;&#3609; &#3617;.1-&#3617;.6</font></u>
    </td>
  </tr>
  <tr>
    <td height="20" valign="middle">&nbsp;</td>
    <td height="20" colspan="3" valign="middle"><font size="3"><b>&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;</b>&nbsp;&nbsp;&#3649;&#3592;&#3657;&#3591;&#3585;&#3634;&#3619;&#3648;&#3611;&#3636;&#3604;&#3619;&#3632;&#3610;&#3610;<?php echo $name_as;?>&#3626;&#3635;&#3627;&#3619;&#3633;&#3610;&#3609;&#3633;&#3585;&#3648;&#3619;&#3637;&#3618;&#3609; &#3617;.1-&#3617;.6 &#3586;&#3603;&#3632;&#3609;&#3637;&#3657;&#3619;&#3632;&#3610;&#3610;&#3652;&#3604;&#3657;&#3607;&#3635;&#3585;&#3634;&#3619;&#3648;&#3611;&#3636;&#3604;&#3651;&#3627;&#3657;&#3648;&#3614;&#3636;&#3656;&#3617;&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3611;&#3619;&#3632;&#3592;&#3635;&#3605;&#3633;&#3623;&#3609;&#3633;&#3585;&#3648;&#3619;&#3637;&#3618;&#3609;&#3648;&#3614;&#3639;&#3656;&#3629;&#3651;&#3594;&#3657;&#3651;&#3609;&#3585;&#3634;&#3619;&#3621;&#3655;&#3629;&#3585;&#3629;&#3636;&#3609;&#3648;&#3586;&#3657;&#3634;&#3626;&#3641;&#3656;&#3619;&#3632;&#3610;&#3610; &#3650;&#3604;&#3618;&#3592;&#3632;&#3607;&#3635;&#3585;&#3634;&#3619;&#3648;&#3611;&#3636;&#3604;&#3651;&#3627;&#3657;<?php echo $name_as;?>&#3619;&#3632;&#3627;&#3623;&#3656;&#3634;&#3591;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656; <?php echo '<b>'.$start_new.'</b>';?> &#3606;&#3638;&#3591; <br><?php echo '&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;'.'&nbsp;'.'<b>'.$end_new.'</b>';?>&nbsp;&#3648;&#3607;&#3656;&#3634;&#3609;&#3633;&#3657;&#3609; </font><br><br>
      <font size="3"><b>&#3627;&#3617;&#3634;&#3618;&#3648;&#3627;&#3605;&#3640; : </b>สอบถามเพิ่มเติมได้ที่ คุณครูณัฐรดา ไชยสมร	 </font>
    </td>
  </tr>
  <tr>
    <td height="50" valign="middle">&nbsp;</td>
    <td width="35%" height="50" valign="middle"><font size="3">&#3604;&#3635;&#3648;&#3609;&#3636;&#3609;&#3585;&#3634;&#3619;<?php echo $name_as;?> &gt;&gt;&gt;&gt;</font>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width="61%" height="50" valign="middle"><button type="submit" name="button" id="button3" style="height:35px; font-size:15px;" class="btn btn-primary" onClick="window.open('form_stu_new.php','windowname2','width=750, \height=400, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/cli.gif" width="38" height="16" align="absmiddle" /> <?php echo $name_as;?></button></td>
    <td width="2%" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td height="20" valign="middle" bgcolor="#EBEBEB">&nbsp;</td>
    <td height="20" colspan="2" align="right" valign="middle" bgcolor="#EBEBEB"><font size="2">&#3611;&#3619;&#3632;&#3585;&#3634;&#3624;&#3648;&#3617;&#3639;&#3656;&#3629;<b>&nbsp;<?php echo "$date_up";?>&nbsp;&nbsp;</b>&#3611;&#3619;&#3632;&#3585;&#3634;&#3624;&#3650;&#3604;&#3618;</font>
<?php
		$sqlt_n 		= "select * from tb_teacher where tea_id = '$tea_id';";		//session = id &#3651;&#3609;&#3605;&#3634;&#3619;&#3634;&#3591;
		$db_queryt_n	= mysql_query($sqlt_n);
		$resultt_n		= mysql_fetch_array($db_queryt_n);
											
		$tea_id		= $resultt_n['tea_id'];
		$pname		= $resultt_n['pname'];
		$fname		= $resultt_n['fname'];
		$lname		= $resultt_n['lname'];
?>
      <font size="2" color="#993300"><b><?php echo '&nbsp;'."$pname".'&nbsp;'."$fname".'&nbsp;'."$lname";?></b></font></td>
    <td valign="middle" bgcolor="#EBEBEB">&nbsp;</td>
  </tr>
</table>
<hr size="1" width="95%">
<?php
	}
	else if($status_as == 2){
		
		//echo '<font size="4" color="#FF0000">&#3619;&#3632;&#3610;&#3610;&#3648;&#3614;&#3636;&#3656;&#3617;&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3626;&#3635;&#3627;&#3619;&#3633;&#3610;&#3609;&#3633;&#3585;&#3648;&#3619;&#3637;&#3618;&#3609;&#3651;&#3627;&#3617;&#3656;&#3611;&#3636;&#3604;&#3649;&#3621;&#3657;&#3623;</font>';
	}
?>

<?php		
		//&#3648;&#3611;&#3621;&#3637;&#3656;&#3618;&#3609;&#3605;&#3633;&#3623;&#3648;&#3621;&#3586;&#3648;&#3611;&#3655;&#3609;&#3586;&#3657;&#3629;&#3588;&#3623;&#3634;&#3617;&#3592;&#3634;&#3585;&#3605;&#3634;&#3619;&#3634;&#3591;&#3629;&#3639;&#3656;&#3609;
		$sql	  = "select * from tb_newupdate where status_new ='1' order by new_id desc";	//DESC &#3588;&#3639;&#3629;&#3648;&#3619;&#3637;&#3618;&#3591;&#3592;&#3634;&#3585;&#3617;&#3634;&#3585;&#3652;&#3611;&#3627;&#3634;&#3609;&#3657;&#3629;&#3618;
		$db_query = mysql_query($sql);	//&#3648;&#3611;&#3621;&#3637;&#3656;&#3618;&#3609;&#3648;&#3611;&#3655;&#3609;&#3588;&#3635;&#3626;&#3633;&#3656;&#3591;
		$num      = mysql_num_rows($db_query);		

		$ie = 0;	
		while($ie < $num)
		{
			$result 	= mysql_fetch_array($db_query);	
			$new_id		= $result['new_id'];	
			$sub_new	= $result['sub_new'];
			$det_new	= $result['det_new'];	
			$status_new	= $result['status_new'];
			$new_date	= $result['new_date'];
			$tea_id		= $result['tea_id'];
?>
<?php
	if($status_new == 1)	//&#3648;&#3591;&#3639;&#3656;&#3629;&#3609;&#3652;&#3586;&#3605;&#3619;&#3623;&#3592;&#3626;&#3629;&#3610;&#3626;&#3606;&#3634;&#3609;&#3632;&#3586;&#3656;&#3634;&#3623;
	{
?>
          <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
            <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
              <tr>
                <td width="2%" height="25" valign="bottom">&nbsp;</td>
                <td width="1000" height="25" valign="bottom"><div id="mylayout_sub"><u><font size="3"><b>&#3648;&#3619;&#3639;&#3656;&#3629;&#3591;</b>&nbsp;&nbsp;<?php echo "$sub_new";?></font></u></div></td>
                <td width="2%" height="25" valign="bottom">&nbsp;</td>
              </tr>
              <tr>
                <td height="50" valign="middle">&nbsp;</td>
                <td height="50" valign="middle"><div id="mylayout_det"><font size="3"><b>&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;</b>&nbsp;&nbsp;<?php echo nl2br($result["det_new"]);?></font></div></td>
                <td valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td height="20" valign="bottom" bgcolor="#EBEBEB">&nbsp;</td>
                <td height="20" align="right" valign="bottom" bgcolor="#EBEBEB"><font size="2">&#3611;&#3619;&#3632;&#3585;&#3634;&#3624;&#3648;&#3617;&#3639;&#3656;&#3629;<b>&nbsp;<?php echo "$new_date";?>&nbsp;&nbsp;</b>&#3611;&#3619;&#3632;&#3585;&#3634;&#3624;&#3650;&#3604;&#3618;</font>
<?php
		$sqlt 		= "select * from tb_teacher where t_id = '$tea_id';";		//session = id &#3651;&#3609;&#3605;&#3634;&#3619;&#3634;&#3591;
		$db_queryt	= mysql_query($sqlt);
		$resultt	= mysql_fetch_array($db_queryt);
											
		$tea_id		= $resultt['tea_id'];
		$pname		= $resultt['pname'];
		$fname		= $resultt['fname'];
		$lname		= $resultt['lname'];
		
?>
                  <font size="2" color="#993300"><b><?php echo '&nbsp;'."$pname".'&nbsp;'."$fname".'&nbsp;'."$lname";?></b></font></td>
                <td height="20" valign="bottom" bgcolor="#EBEBEB">&nbsp;</td>
              </tr>
          </table></td>
          </tr>
    </table>
<hr size="1" width="95%" color="#666666">
<?php 
	$ie ++;
	}
?>
<?php
	}if($status_new <> 1){	//&#3652;&#3617;&#3656;&#3648;&#3607;&#3656;&#3634;&#3585;&#3633;&#3610; &#3626;&#3606;&#3634;&#3609;&#3632; 1
	
		echo '<br><br>'.'<img src="images/alert.png" width="25" height="25">'.'&nbsp;&nbsp;'.'<font size="4">'."&#3618;&#3633;&#3591;&#3652;&#3617;&#3656;&#3617;&#3637;&#3586;&#3656;&#3634;&#3623;&#3611;&#3619;&#3632;&#3585;&#3634;&#3624;&#3629;&#3639;&#3656;&#3609; &#3654;".'</font>';	
	}
?>
		
        </td>
      </tr>
    </table>
    
    </td>
  </tr>
</table>
<?php include "tbl_text2.php";?>
<?php
	if(chkBrowser("Chrome") == 1){	//1 = &#3651;&#3594;&#3656; , 0 = &#3652;&#3617;&#3656;&#3651;&#3594;&#3656;
	
	}else if(chkBrowser("Chrome") == 0){	
						
		include "pic_index.php";	//&#3626;&#3656;&#3623;&#3609;&#3586;&#3629;&#3591;&#3649;&#3626;&#3604;&#3591; pop up 
	}
?>
<?php
	}	//&#3611;&#3636;&#3604; session
?>
<?php
	}else if($o_status == 2){
		
	include "new.php";//&#3611;&#3636;&#3604;&#3611;&#3619;&#3632;&#3585;&#3634;&#3624;&#3586;&#3656;&#3634;&#3623;&#3619;&#3632;&#3610;&#3610;
	}	
?>
</body>
</html>