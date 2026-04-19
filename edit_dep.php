<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แก้ไขข้อมูลกิจกรรมชุมนุม</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" type="text/css" href="style/style.css">
<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.chkDel"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.chkDel"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('ยืนยันการลบข้อมูล ?')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
</head>
<body>
<?php
// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 3)
	{
?>
<?php
		$d_id 		= $_GET['d_id'];
		
		$sql		= "SELECT * FROM tb_department where d_id = '$d_id'";
		$db_query	= mysql_query($sql);
		$result		= mysql_fetch_array($db_query);	
		
		$d_id		= $result['d_id'];
		$dep_id		= $result['dep_id'];
		$name_dep 	= $result['name_dep'];
		$atd 		= $result['atd'];
		$class 		= $result['class'];
		$object 	= $result['object'];
		$classroom	= $result['classroom'];
		$period 	= $result['period'];
		$number		= $result['number'];
		$tea_id1	= $result['tea_id1'];
		$tea_id2	= $result['tea_id2'];
		$tea_id3	= $result['tea_id3'];
		$tea_id4	= $result['tea_id4'];
		$tea_id5	= $result['tea_id5'];
		$ty_id		= $result['ty_id'];
		$status_dep = $result['status_dep'];
?>
<form name="form_add" method="post" action="save_edit_dep.php">
<table width="80%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td>
    
    <table width="100%" border="1" bordercolor="#FFFFFF" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
      <tr>
        <td height="51" colspan="2" align="center" valign="middle" bgcolor="#F9F9F9"><font size="5" color="#FF6600" face="MS Sans Serif, Tahoma, sans-serif"><b>แก้ไขข้อมูลกิจกรรมชุมนุม</b></font></td>
        </tr>
       <tr>
        <td height="30" align="left" valign="top"><b><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสชุมนุม</font></b>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="dep_id" type="text" class="txt_box" id="dep_id" value="<?php echo $dep_id;?>" size="10" />
          <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="top"><b><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อชุมนุม</font></b>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="name_dep" type="text" class="txt_box" id="name_dep" value="<?php echo $name_dep;?>" size="40" />
          <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">* ห้ามใช้สัญลักษณ์ต่อไปนี้    !  ?  '  * @  #  $</font></td>
      </tr>
       <tr>
         <td width="26%" height="30" align="left" valign="top"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อครูที่ปรึกษา</b></font>&nbsp;</td>
         <td width="74%" height="30" valign="middle" bgcolor="#E6E6E6"><table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้สอน 1</font>
  <?php 
	$tea_id1	= $result['tea_id1'];
			  
	$sqlt1 		= "select * from tb_teacher where t_id = '$tea_id1';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_queryt1	= mysql_query($sqlt1);	//ถอดข้อความให้เป็นคำสั่ง
	$resultt1	= mysql_fetch_array($db_queryt1);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
	
	$t_id	= $resultt1['t_id'];
	$tea_id	= $resultt1['tea_id'];						
	$pname	= $resultt1['pname'];
	$fname	= $resultt1['fname'];
	$lname	= $resultt1['lname'];			
			
	//ส่วนแสดง Option
	$sql_ts1 	= "SELECT * FROM tb_teacher WHERE tea_status ='1' order by cat_id asc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$resul_ts1 	= mysql_query($sql_ts1);	//เปลี่ยนเป็นคำสั่ง
	$num_ts1 	= mysql_num_rows($resul_ts1);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
	
	print("<select name =\"tea1\" style =\"width: 300px\" class=\"styled-select\">");
						
	print("<option value='".$t_id."'>".$pname." ".$fname." ".$lname."</option>");
							
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
	$tea_id2	= $result['tea_id2'];
			  
	$sqlt2 		= "select * from tb_teacher where t_id = '$tea_id2';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_queryt2	= mysql_query($sqlt2);	//ถอดข้อความให้เป็นคำสั่ง
	$resultt2	= mysql_fetch_array($db_queryt2);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
	
	$t_id	= $resultt2['t_id'];
	$tea_id	= $resultt2['tea_id'];							
	$pname	= $resultt2['pname'];
	$fname	= $resultt2['fname'];
	$lname	= $resultt2['lname'];			
			
	//ส่วนแสดง Option
	$sql_ts2 	= "SELECT * FROM tb_teacher WHERE tea_status ='1' order by cat_id asc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$resul_ts2 	= mysql_query($sql_ts2);	//เปลี่ยนเป็นคำสั่ง
	$num_ts2 	= mysql_num_rows($resul_ts2);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
	
	print("<select name =\"tea2\" style =\"width: 300px\" class=\"styled-select\">");
						
	print("<option value='".$t_id."'>".$pname." ".$fname." ".$lname."</option>");
							
	while($rs_ts2 = mysql_fetch_array($resul_ts2))
	{
	print("<option value=$rs_ts2[t_id]>$rs_ts2[fname] $rs_ts2[lname]</option>");
	}
	print("<option value=>ยกเลิกครูผู้สอน</option>");
	print("</select>");
?>
               </td>
             </tr>
           <tr>
             <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้สอน 3</font>
  <?php 
	$tea_id3	= $result['tea_id3'];
			  
	$sqlt3 		= "select * from tb_teacher where t_id = '$tea_id3';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_queryt3	= mysql_query($sqlt3);	//ถอดข้อความให้เป็นคำสั่ง
	$resultt3	= mysql_fetch_array($db_queryt3);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
	
	$t_id	= $resultt3['t_id'];
	$tea_id	= $resultt3['tea_id'];							
	$pname	= $resultt3['pname'];
	$fname	= $resultt3['fname'];
	$lname	= $resultt3['lname'];			
			
	//ส่วนแสดง Option
	$sql_ts3 	= "SELECT * FROM tb_teacher WHERE tea_status ='1' order by cat_id asc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$resul_ts3 	= mysql_query($sql_ts3);	//เปลี่ยนเป็นคำสั่ง
	$num_ts3 	= mysql_num_rows($resul_ts3);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
	
	print("<select name =\"tea3\" style =\"width: 300px\" class=\"styled-select\">");
						
	print("<option value='".$t_id."'>".$pname." ".$fname." ".$lname."</option>");
							
	while($rs_ts3 = mysql_fetch_array($resul_ts3))
	{
	print("<option value=$rs_ts3[t_id]>$rs_ts3[fname] $rs_ts3[lname]</option>");
	}
	print("<option value=>ยกเลิกครูผู้สอน</option>");
	print("</select>");
?>
               </td>
             </tr>
           <tr>
             <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้สอน 4</font>
  <?php 
	$tea_id4	= $result['tea_id4'];
			  
	$sqlt4 		= "select * from tb_teacher where t_id = '$tea_id4';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_queryt4	= mysql_query($sqlt4);	//ถอดข้อความให้เป็นคำสั่ง
	$resultt4	= mysql_fetch_array($db_queryt4);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
	
	$t_id	= $resultt4['t_id'];					
	$tea_id	= $resultt4['tea_id'];
	$pname	= $resultt4['pname'];
	$fname	= $resultt4['fname'];
	$lname	= $resultt4['lname'];			
			
	//ส่วนแสดง Option
	$sql_ts4 	= "SELECT * FROM tb_teacher WHERE tea_status ='1' order by cat_id asc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$resul_ts4 	= mysql_query($sql_ts4);	//เปลี่ยนเป็นคำสั่ง
	$num_ts4 	= mysql_num_rows($resul_ts4);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
	
	print("<select name =\"tea4\" style =\"width: 300px\" class=\"styled-select\">");
						
	print("<option value='".$t_id."'>".$pname." ".$fname." ".$lname."</option>");
							
	while($rs_ts4 = mysql_fetch_array($resul_ts4))
	{
	print("<option value=$rs_ts4[t_id]>$rs_ts4[fname] $rs_ts4[lname]</option>");
	}
	print("<option value=>ยกเลิกครูผู้สอน</option>");
	print("</select>");
?>
               </td>
             </tr>
           <tr>
             <td valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">ผู้สอน 5</font>
  <?php 
	$tea_id5	= $result['tea_id5'];
			  
	$sqlt5 		= "select * from tb_teacher where t_id = '$tea_id5';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_queryt5	= mysql_query($sqlt5);	//ถอดข้อความให้เป็นคำสั่ง
	$resultt5	= mysql_fetch_array($db_queryt5);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
		
	$t_id	= $resultt5['t_id'];						
	$tea_id	= $resultt5['tea_id'];
	$pname	= $resultt5['pname'];
	$fname	= $resultt5['fname'];
	$lname	= $resultt5['lname'];			
			
	//ส่วนแสดง Option
	$sql_ts5 	= "SELECT * FROM tb_teacher WHERE tea_status ='1' order by cat_id asc";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
	$resul_ts5 	= mysql_query($sql_ts5);	//เปลี่ยนเป็นคำสั่ง
	$num_ts5 	= mysql_num_rows($resul_ts5);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
	
	print("<select name =\"tea5\" style =\"width: 300px\" class=\"styled-select\">");
						
	print("<option value='".$t_id."'>".$pname." ".$fname." ".$lname."</option>");
							
	while($rs_ts5 = mysql_fetch_array($resul_ts5))
	{
	print("<option value=$rs_ts5[t_id]>$rs_ts5[fname] $rs_ts5[lname]</option>");
	}
	print("<option value=>ยกเลิกครูผู้สอน</option>");
	print("</select>");
?>
               <br>&nbsp;&nbsp;<font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">* สามารถยกเลิกครูผู้สอน 2 - 5 ได้ โดยเลือก list ล่างสุด</font>
               </td>
             </tr>
           </table>
         </td>
       </tr>
      <tr>
        <td height="30" align="left" valign="top"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>จุดประสงค์กิจกรรม</b></font>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><textarea name="object" cols="60" rows="7" class="txt_box"><?php echo $object;?></textarea>
          <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>ปีการศึกษา</b></font>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6">
<?php 
		$ty_id	= $result['ty_id'];
			  
		$sqltty 		= "select * from tb_term_year where ty_id = '$ty_id';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
		$db_querytty	= mysql_query($sqltty);	//ถอดข้อความให้เป็นคำสั่ง
		$resulttty	= mysql_fetch_array($db_querytty);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
		
		$ty_id	= $resulttty['ty_id'];							
		$year	= $resulttty['year'];	
		
		$sql_ty = "SELECT * FROM tb_term_year";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
		$result_ty = mysql_query($sql_ty);	//เปลี่ยนเป็นคำสั่ง
		$num_ty = mysql_num_rows($result_ty);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
			
		print("<select name =\"ty_id\" class=\"styled-select\">");
										
		print("<option value='".$ty_id."'>".$year."</option>");
										
		while($rs_ty = mysql_fetch_array($result_ty))
		{
		print("<option value=$rs_ty[ty_id]>$rs_ty[year]</option>");
		}
		print("</select>");
?></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><b><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ระดับชั้น</font></b>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="class" type="text" class="txt_box" id="class" value="<?php echo $class;?>" size="8" maxlength="30" />
          <font size="3" color="#FF0000" face="MS Sans Serif, Tahoma, sans-serif">*</font><font size="2" face="MS Sans Serif, Tahoma, sans-serif">กรุณาระบุ เช่น 1 2 3 4 5 6 หรือบางชั้น 4 5 เป็นต้น (ให้เว้นวรรคระหว่างระดับชั้น)</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>คุณสมบัติผู้เรียน</b></font>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="atd" type="text" class="txt_box" id="atd" value="<?php echo $atd;?>" />
          <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานที่จัดกิจกรรม</b></font>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="classroom" type="text" class="txt_box" id="classroom" value="<?php echo $classroom;?>" />
          <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>คาบเรียน</b></font>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="period" type="text" class="txt_box" id="period" value="<?php echo $period;?>" />
          <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>จำนวนที่รับสมัคร</b></font>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6"><input name="number" type="text" class="txt_box" id="number" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" value="<?php echo $number;?>" size="5"/>&nbsp;<font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*</font>
<?php
	//ดึงค่าจำนวนออกมา
	$sqlc = mysql_query("SELECT COUNT(d_id) FROM tb_select_rally WHERE d_id='".$result['d_id']."' and ty_id='".$result['ty_id']."' ");
	$resultc = mysql_fetch_assoc($sqlc);
	
	echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'.'(สมัครแล้ว ';
	print $resultc['COUNT(d_id)'];
	echo ' คน)'.'</font>';
?>
&nbsp;&nbsp;
<?php
	if($resultc['COUNT(d_id)'] < $number)	//ถ้าจำนวนที่เบือกน้อยกว่าจำนวนจริง
	{
		echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#00CC00"><b>ว่าง</b></font>';
	}
	else if($resultc['COUNT(d_id)'] == $number)	//ถ้าจำนวนที่เลือกเท่ากับจำนวนจริง
	{
		echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000"><b>เต็มแล้ว</b></font>';
	}
	else if($resultc['COUNT(d_id)'] > $number)	//ถ้าเกิน
	{
		echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF9900"><b>เกิน</b></font>';
	}
?>
		</td>
      </tr>
      <tr>
        <td height="30" align="left" valign="middle"><b><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะ</font></b>&nbsp;</td>
        <td height="30" valign="middle" bgcolor="#E6E6E6">
        <select name="status_dep" class="txt_box" id="status_dep">
          <option value="<?php echo "$status_dep";?>">
<?php
	if($status_dep == 1)
	{
		echo "เปิดรายวิชา";
	}
	else if($status_dep == 2)
	{
		echo "ปิดรายวิชาหรือดำเนินการเสร็จสิ้น";
	}
?>
          </option>
          <option value="1">เปิดรายวิชา</option>
          <option value="2">ปิดรายวิชาหรือดำเนินการเสร็จสิ้น</option>
        </select>
        </td>
      </tr>
      <tr>
        <td height="60" align="left" valign="middle">&nbsp;</td>
        <td height="60" valign="middle"><button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/edit.png" width="24" height="24" align="absmiddle" /> แก้ไขข้อมูล</button>&nbsp;<font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">* ห้ามใช้สัญลักษณ์ต่อไปนี้ในการกรอกข้อมูลทุกครั้ง    !  ?  '  * @  #  $</font>
          <input type="hidden" name="d_id" value="<?php echo $d_id;?>"></td>
      </tr>
    </table>
    </td>
  </tr>
</table>
</form>
<br>

<form name="frmMain" action="del_sel.php" method="post" OnSubmit="return onDelete();">
<?php
	$d_id		= $_GET['d_id'];
	$strSQL 	= "SELECT * FROM tb_select_rally where d_id ='$d_id' order by sel_id asc";
	$objQuery	= mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table width="100%" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <th width="66" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ลำดับ</b></font></th>
    <th width="109" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>รหัสประจำตัว</b></font></th>
    <th width="408" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ชื่อ - นามสกุล</b></font></th>
    <th width="73" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>ห้อง</b></font></th>
    <th width="55" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>เลขที่</b></font></th>
    <th width="298" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><b>วันที่สมัคร</b></font></th>
    <th width="51" height="35" bgcolor="#EFEFEF"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);"><br>ทั้งหมด</font></th>
  </tr>
<?php
$i = 0;
while($objResult = mysql_fetch_array($objQuery))
{
$i++;

	$sel_id		= $objResult["sel_id"];
	$s_id		= $objResult["s_id"];
	$d_id		= $objResult["d_id"];
	$sel_class	= $objResult["sel_class"];
	$sel_room	= $objResult["sel_room"];	
		  
	$sql11 		= "select * from tb_student where s_id = '$s_id';";
	$db_query11	= mysql_query($sql11);
	$result11	= mysql_fetch_array($db_query11);
								
	$stu_id		= $result11['stu_id'];
	$stu_name	= $result11['stu_name'];
?>
  <tr>
    <td height="20" align="center" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $i;?></font></td>
    <td height="20" align="center" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $stu_id;?></font></td>
    <td height="20" align="center" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $stu_name;?></font></td>
    <td height="20" align="center" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo "$sel_class / $sel_room";?></font></td>
    <td height="20" align="center" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $objResult["sel_no"];?></font></td>
    <td height="20" align="center" valign="middle"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $objResult["date_add"];?></font></td>
    <td height="20" align="center" valign="middle"><input type="checkbox" name="chkDel[]" id="chkDel<?php echo $i;?>" value="<?php echo $sel_id;?>"></td>
  </tr>
<?php
}
?>
</table><br>
<div align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">*เรียงตามลำดับผู้สมัครก่อนหลัง</font>
<button type="submit" name="btnDelete" id="btnDelete" style="height:30px; font-size:15px;"><img src="images/remove-user.png" width="24" height="24" align="absmiddle"> ลบข้อมูล</button>
<input type="hidden" name="hdnCount" value="<?php echo $i;?>">
</div>
</form>
<br>
<?php
//ส่วนของ User Authentication 
}else{
	echo "<script langquage='javascript'>\n";
	echo "window.location=\"close.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>