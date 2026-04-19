<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มข้อมูลกิจกรรมชุมนุม</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" type="text/css" href="style/style.css">

<script type="text/javascript">
function con_del(){
if (confirm("ยืนยันการลบข้อมูล") ==true){
return true;
}
return false;
}
</script>

<style type="text/css" media="print">
input {
	display:none;
}
</style>
</head>

<body>
<?php
	// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 3)
	{
?>
<form name="form_add" method="post" action="save_dep.php">
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td>
    
    <table width="100%" border="1" bordercolor="#FFFFFF" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
      <tr>
        <td height="51" colspan="2" align="center" valign="middle" bgcolor="#F9F9F9"><font size="5" color="#FF6600" face="MS Sans Serif, Tahoma, sans-serif"><b>เพิ่มข้อมูลกิจกรรมชุมนุม</b></font></td>
        </tr>
       <tr>
        <td height="30" align="left" valign="top"><b><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสวิชา</font></b>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="dep_id" type="text" class="txt_box" id="dep_id" size="10" />
          <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="top"><b><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อวิชา</font></b>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="name_dep" type="text" class="txt_box" id="name_dep" size="40" />
        <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">* ห้ามใช้สัญลักษณ์ต่อไปนี้    !  ?  '  * @  #  $</font></td>
      </tr>
      <tr>
        <td width="26%" height="30" align="left" valign="top"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อครูที่ปรึกษา</b></font>&nbsp;</td>
        <td width="74%" height="30" valign="middle" bgcolor="#E6E6E6"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้สอน 1</font>
<?php 
	$sql_ts1 	= "SELECT * FROM tb_teacher WHERE tea_status ='1' order by cat_id asc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$resul_ts1 	= mysql_query($sql_ts1);	//เปลี่ยนเป็นคำสั่ง
	$num_ts1 	= mysql_num_rows($resul_ts1);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
	
	print("<select name =\"tea1\" style =\"width: 300px\" class=\"styled-select\">");
						
	print("<option value=''>-เลือกครูผู้สอน 1-</option>");
							
	while($rs_ts1 = mysql_fetch_array($resul_ts1))
	{
	print("<option value=$rs_ts1[t_id]>$rs_ts1[fname] $rs_ts1[lname]</option>");
	}
	print("</select>");
?>
            <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
          </tr>
          <tr>
            <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้สอน 2</font>
<?php
	$sql_ts2 	= "SELECT * FROM tb_teacher WHERE tea_status ='1' order by cat_id asc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$resul_ts2 	= mysql_query($sql_ts2);	//เปลี่ยนเป็นคำสั่ง
	$num_ts2 	= mysql_num_rows($resul_ts2);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
	
	print("<select name =\"tea2\" style =\"width: 300px\" class=\"styled-select\">");
						
	print("<option value=''>-เลือกครูผู้สอน 2-</option>");
							
	while($rs_ts2 = mysql_fetch_array($resul_ts2))
	{
	print("<option value=$rs_ts2[t_id]>$rs_ts2[fname] $rs_ts2[lname]</option>");
	}
	print("</select>");
?>
            </td>
          </tr>
          <tr>
            <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้สอน 3</font>
<?php
	$sql_ts3 	= "SELECT * FROM tb_teacher WHERE tea_status ='1' order by cat_id asc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$resul_ts3 	= mysql_query($sql_ts3);	//เปลี่ยนเป็นคำสั่ง
	$num_ts3 	= mysql_num_rows($resul_ts3);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
	
	print("<select name =\"tea3\" style =\"width: 300px\" class=\"styled-select\">");
						
	print("<option value=''>-เลือกครูผู้สอน 3-</option>");
							
	while($rs_ts3 = mysql_fetch_array($resul_ts3))
	{
	print("<option value=$rs_ts3[t_id]>$rs_ts3[fname] $rs_ts3[lname]</option>");
	}
	print("</select>");
?>
            </td>
          </tr>
          <tr>
            <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้สอน 4</font>
<?php
	$sql_ts4 	= "SELECT * FROM tb_teacher WHERE tea_status ='1' order by cat_id asc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$resul_ts4 	= mysql_query($sql_ts4);	//เปลี่ยนเป็นคำสั่ง
	$num_ts4 	= mysql_num_rows($resul_ts4);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
	
	print("<select name =\"tea4\" style =\"width: 300px\" class=\"styled-select\">");
						
	print("<option value=''>-เลือกครูผู้สอน 4-</option>");
							
	while($rs_ts4 = mysql_fetch_array($resul_ts4))
	{
	print("<option value=$rs_ts4[t_id]>$rs_ts4[fname] $rs_ts4[lname]</option>");
	}
	print("</select>");
?>
            </td>
          </tr>
          <tr>
            <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้สอน 5</font>
<?php
	$sql_ts5 	= "SELECT * FROM tb_teacher WHERE tea_status ='1' order by cat_id asc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$resul_ts5 	= mysql_query($sql_ts5);	//เปลี่ยนเป็นคำสั่ง
	$num_ts5 	= mysql_num_rows($resul_ts5);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
	
	print("<select name =\"tea5\" style =\"width: 300px\" class=\"styled-select\">");
						
	print("<option value=''>-เลือกครูผู้สอน 5-</option>");
							
	while($rs_ts5 = mysql_fetch_array($resul_ts5))
	{
	print("<option value=$rs_ts5[t_id]>$rs_ts5[fname] $rs_ts5[lname]</option>");
	}
	print("</select>");
?>
            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="top"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>จุดประสงค์กิจกรรม</b></font>&nbsp;</td>
        <td height="30" valign="top" bgcolor="#E6E6E6"><textarea name="object" cols="60" rows="7" class="txt_box"></textarea>
  		<font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ปีการศึกษา</b></font>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6">
<?php 			  
		$sqltty 		= "select * from tb_term_year ;"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
		$db_querytty	= mysql_query($sqltty);	//ถอดข้อความให้เป็นคำสั่ง
		$resulttty	= mysql_fetch_array($db_querytty);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
		
		$ty_id	= $resulttty['ty_id'];							
		$year	= $resulttty['year'];	
		
		$sql_ty = "SELECT * FROM tb_term_year order by ty_id desc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
		$result_ty = mysql_query($sql_ty);	//เปลี่ยนเป็นคำสั่ง
		$num_ty = mysql_num_rows($result_ty);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
			
		print("<select name =\"ty_id\" class=\"styled-select\">");
										
		print("<option value=''>-ปีการศึกษา-</option>");
										
		while($rs_ty = mysql_fetch_array($result_ty))
		{
		print("<option value=$rs_ty[ty_id]>$rs_ty[year]</option>");
		}
		print("</select>");
?>&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="top"><b><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ระดับชั้น</font></b>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
        <input type="checkbox" name="class1" value="1" />&nbsp;ม.1<br>
        <input type="checkbox" name="class2" value="2" />&nbsp;ม.2<br>
        <input type="checkbox" name="class3" value="3" />&nbsp;ม.3<br>
        <input type="checkbox" name="class4" value="4" />&nbsp;ม.4<br>
        <input type="checkbox" name="class5" value="5" />&nbsp;ม.5<br>
        <input type="checkbox" name="class6" value="6" />&nbsp;ม.6<br>
        </font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>คุณสมบัติผู้เรียน</b></font>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="atd" type="text" class="txt_box" id="atd" size="40" />
          <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานที่จัดกิจกรรม</b></font>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="classroom" type="text" class="txt_box" id="classroom" size="40" />
          <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>คาบเรียน</b></font>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="period" type="text" class="txt_box" id="period" size="15" />
          <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>จำนวนที่รับสมัคร</b></font>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="number" type="text" class="txt_box" id="number" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" size="5"/>
          &nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif">คน</font><font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000"> *</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><b><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะ</font></b>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input type="checkbox" name="status_dep" id="status_dep" value="1" />
          <font size="3" face="MS Sans Serif, Tahoma, sans-serif">เปิดรายวิชา</font></td>
      </tr>
      <tr>
        <td height="60" align="left" valign="middle">&nbsp;</td>
        <td height="60" valign="middle"><button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/save.png" width="24" height="24" align="absmiddle" /> บันทึกข้อมูล</button>&nbsp;<font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">* ห้ามใช้สัญลักษณ์ต่อไปนี้ในการกรอกข้อมูลทุกครั้ง    !  ?  '  * @  #  $</font></td>
      </tr>
    </table>
    </td>
  </tr>
</table>
</form><br>
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