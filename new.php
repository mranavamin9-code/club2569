<?php include "connection.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script language="JavaScript1.2">
function disableselect(e){
return false
}
function reEnable(){
return true
}

document.onselectstart=new Function ("return false")

if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}
</script>

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

<body>
<?php		
	$sql_o		= "select * FROM tb_on_off";
	$db_query_o = mysql_query($sql_o);
	$result_o 	= mysql_fetch_array($db_query_o);	

	$o_id		= $result_o['o_id'];
	$post		= $result_o['post'];
	$o_status	= $result_o['o_status'];
?>
<br><br><br><br>
<table width="900" height="500" background="images/news.jpg" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="30%" height="115">&nbsp;</td>
    <td width="67%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr>
    <td height="19">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="245">&nbsp;</td>
    <td valign="top"><font size="5" face="tahoma"><?php echo nl2br($post);?></font></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>