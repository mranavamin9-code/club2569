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
<style>
.main{
	width: 50%;
	height: 300px;
	position: absolute;
	left: 35%;
	top: 40%;
	margin:-75px 0 0 -135px;
}

.select-style {
    padding: 0;
    margin: 0;
    border: 1px solid #ccc;
    width: 150px;
    border-radius: 3px;
    overflow: hidden;
    background-color: #fff;

    background: #fff url("http://www.scottgood.com/jsg/blog.nsf/images/arrowdown.gif") no-repeat 90% 50%;
}

.select-style select {
    padding: 5px 8px;
    width: 130px;
    border: none;
    box-shadow: none;
    background-color: transparent;
    background-image: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.select-style select:focus {
    outline: none;
}
</style>
</head>

<body bgcolor="#222">
<?php 
if($_SESSION['lognum'] == 3)
{
?>
<div class="main">
<form method="post" name="form_search" action="det_mgt_select_rally.php" target="_blank">
  <table width="60%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
    <tr>
      <td><table width="100%" border="1" bordercolor="#FFFFFF" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
          <tr>
            <td height="35" align="center" bgcolor="#D8D8D8"><font size="5" color="#FF6600" face="MS Sans Serif, Tahoma, sans-serif"><b>เลือกรายงานข้อมูลตามระดับชั้น</b></font></td>
          </tr>
          <tr>
            <td width="58%" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;
              <div class="select-style">
              <select name="class">
                <option value="">-เลือกระดับชั้น-</option>
                <option value="1">ม. 1</option>
                <option value="2">ม. 2</option>
                <option value="3">ม. 3</option>
                <option value="4">ม. 4</option>
                <option value="5">ม. 5</option>
                <option value="6">ม. 6</option>
              </select>
            <font size="2" color="#FF0000"><b>*</b></font></div>
            </td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;
              <div class="select-style">
              <select name="room">
                <option value="">-เลือกห้อง-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
				<option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
              </select>
            <font size="2" color="#FF0000"><b>*</b></font></div>
            </td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;
            <div class="select-style">
<?php 
		$sql3 = "SELECT * FROM tb_term_year";
		$result3 = mysql_query($sql3);
		$num3 = mysql_num_rows($result3);
			
		print("<select name =\"year\">");
										
		print("<option value=''>-ปีการศึกษา-</option>");
										
		while($rs3 = mysql_fetch_array($result3))
		{
		print("<option value=$rs3[ty_id]>$rs3[year]</option>");
		}
		print("</select>");
?>
            <font size="2" color="#FF0000"><b>*</b></font></div>
            </td>
          </tr>
          <tr>
            <td height="50" align="center" valign="middle" bgcolor="#FFFFFF">&nbsp;
              <button type="submit" style="height:30px; font-size:15px;"><img src="images/search_icon.png" width="24" height="24" align="absmiddle" />ค้นหาข้อมูล</button></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
</div>
<?php
}else{
	echo "<script langquage='javascript'>\n";
	echo "window.location=\"index.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>