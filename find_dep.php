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
<STYLE>
.btn{
	padding: 10px;
	background-color:#F2F2F2;	/*สีปุ่ม*/
	font-size:15px;
	color:#000;					/*สีตัวอักษร*/
	border-radius: 15px;		/*ความโค้ง*/
}
.btn:hover{							/*สีเมื่อเมาส์ไปโดน*/
	background-color: #E5E5E5;
}		
.btn:active{						/*สีเมื่อกด*/
	background-color: #336699;
}
.tbl:hover{							
	background-color: #D6E7D1;	/*สีเมื่อเมาส์ไปโดน*/
}
.color2:active{						/*สีเมื่อกด*/
	background-color: #F30;
}
</STYLE>
<!--จบควบคุม table-->

<script type="text/javascript">
function con_del(){
if (confirm("ยืนยันการลบข้อมูล") ==true){
return true;
}
return false;
}
</script>

<style type="text/css">
/*
css สำหรับกำหนดปุ่ม go to top แบบชิดขอบล่างขวา แบบ fixed ตำแหน่ง
*/
#gotoTop{
	position:fixed;
	margin:auto;
	right:0px;
	bottom:0px;
	border:0px;
	cursor:pointer;
	z-index: 99;
	display:none;
}
</style>
</head>

<body background="images/bg.gif" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<?php
if($_SESSION['lognum'] == 3)
	{
?>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" height="800" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
        <tr>
          <td height="289" valign="top" background="images/pic/banner.jpg"><table width="100%" height="50" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="5%" height="50">&nbsp;</td>
              <td width="68%" valign="middle"><a href="<?='http://'.config_url;?>" target="_blank"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#007BB7"><b><?=config_url;?></b></font></a></td>
              <td width="25%" align="right" valign="middle"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#FFFFFF"><b><a href="index_emp.php">กลับหน้าหลัก</a></b></font></td>
              <td width="2%" valign="middle">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="center" valign="top">
            
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>
<?php
    //session แสดงการเข้าสู่ระบบ
	$teacher_id 	= $_SESSION['teacher_id'];
	$tea_pname 		= $_SESSION['tea_pname'];
	$tea_fname 		= $_SESSION['tea_fname'];
	$tea_lname 		= $_SESSION['tea_lname'];
	$teacher_status = $_SESSION['teacher_status'];
			  
	$sql_ss 		= "select * from tb_teacher where tea_id = '$teacher_id';";		//session = id ในตาราง
	$db_query_ss	= mysql_query($sql_ss);
	$result_ss		= mysql_fetch_array($db_query_ss);
											
	$tea_id		= $result_ss['tea_id'];
	$pname		= $result_ss['pname'];
	$fname		= $result_ss['fname'];
	$lname		= $result_ss['lname'];
	$idcard		= $result_ss['idcard'];
	$cat_id		= $result_ss['cat_id'];
	$tea_status	= $result_ss['tea_status'];
?>
                  <font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><?php echo "$teacher_id".'&nbsp;'.":".'&nbsp;'."$pname".'&nbsp;'."$fname".'&nbsp;'."$lname";?></b></font><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><br />
                 <img src="images/horz_1.gif" /></b></font></td>
              </tr>
            </table><br>
            
            <form action="" method="get" name="form_search" id="form_search">
              <table width="50%" border="1" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                <tr>
                  <td><table width="100%" border="1" bordercolor="#FFFFFF" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                    <tr>
                      <td height="35" colspan="3" align="center" bgcolor="#F9F9F9"><font size="5" color="#FF6600" face="MS Sans Serif, Tahoma, sans-serif"><b>ตรวจสอบข้อมูลกิจกรรมชุมนุม</b></font></td>
                    </tr>
                    <tr>
                      <td width="40%" height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">รหัสกิจกรรมชุมนุม :</font></td>
                      <td width="2%" height="35" valign="middle">&nbsp;</td>
                      <td width="58%" height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;&nbsp;<input name="id" type="text" id="id" size="10" /></td>
                    </tr>
                    <tr>
                      <td height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ชื่อกิจกรรมชุมนุม :</font></td>
                      <td height="35" valign="middle">&nbsp;</td>
                      <td height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;
                        <input name="namedep" type="text" id="namedep" size="30" /></td>
                    </tr>
                    <tr>
                      <td height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ปีการศึกษา :</font></td>
                      <td height="35" valign="middle">&nbsp;</td>
                      <td height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;
  <?php 
		$sql3 = "SELECT * FROM tb_term_year";	//เปลี่ยนข้อความธรรมเป็นคำสั่ง	
		$result3 = mysql_query($sql3);	//เปลี่ยนเป็นคำสั่ง
		$num3 = mysql_num_rows($result3);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
			
		print("<select name =\"ty\" style =\"width: 100px\">");
										
		print("<option value=''>-ปีการศึกษา-</option>");
										
		while($rs3 = mysql_fetch_array($result3))
		{
		print("<option value=$rs3[ty_id]>$rs3[year]</option>");
		}
		print("</select>");
?>
  <font size="3" face="MS Sans Serif, Tahoma, sans-serif" color="#FF0000">*กรุณาระบุปีทุกครั้งก่อนค้นหา</font></td>
                    </tr>
                    <tr>
                      <td height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">ระดับชั้น :</font></td>
                      <td height="35" valign="middle">&nbsp;</td>
                      <td height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;
                        <select name="class_stu" id="class_stu">
                          <option value="">-เลือกระดับชั้น-</option>
                          <option value="1">มัธยมศึกษาปีที่ 1</option>
                          <option value="2">มัธยมศึกษาปีที่ 2</option>
                          <option value="3">มัธยมศึกษาปีที่ 3</option>
                          <option value="4">มัธยมศึกษาปีที่ 4</option>
                          <option value="5">มัธยมศึกษาปีที่ 5</option>
                          <option value="6">มัธยมศึกษาปีที่ 6</option>
                        </select></td>
                    </tr>
                    <tr>
                      <td height="35" align="right" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">สถานะ :</font></td>
                      <td height="35" valign="middle">&nbsp;</td>
                      <td height="35" valign="middle" bgcolor="#CCCCCC">&nbsp;
                        <select name="status" style="width: 150px">
                          <option value="">-เลือกสถานะ-</option>
                          <option value="1">เปิดรายวิชา</option>
                          <option value="2">ปิดรายวิชาหรือดำเนินการเสร็จสิ้น</option>
                        </select></td>
                    </tr>
                    <tr>
                      <td height="40" valign="middle">&nbsp;</td>
                      <td height="40" valign="middle">&nbsp;</td>
                      <td height="40" valign="middle">&nbsp;
                        <button type="submit" style="height:30px; font-size:15px;"><img src="images/search_icon.png" width="24" height="24" align="absmiddle" /> ค้นหาข้อมูล</button></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
            </form>
            <br>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="47%" height="35" align="left" valign="top"><font size="2"><b>หมายเหตุ :</b>&nbsp;&nbsp;<img src="images/true.png" width="13" height="13" />&nbsp;&nbsp;เปิดรายวิชา&nbsp;&nbsp;&nbsp;<img src="images/false.png" width="13" height="13" />&nbsp;&nbsp;ปิดรายวิชาหรือดำเนินการเสร็จสิ้น</font><br>
                <font size="2">หากต้องการเริ่มปีการศึกษาใหม่ ให้ท่านปรับสถานะรายวิชาของปีการศึกษาเดิมให้เป็น<br>"ปิดรายวิชาหรือดำเนินการเสร็จสิ้น" ทั้งหมด เพื่อเริ่มเพิ่มข้อมูลของปีการศึกษาใหม่</font></td>
                <td width="32%" align="right">
                  <a href="mgt_select_rally.php" target="_blank">
                  <button name="button" class="btn color2"><img src="images/list.png" width="25" height="25" align="absmiddle" /> เลือกรายงานข้อมูลตามระดับชั้น</button></a>
                </td>
                <td width="21%" align="right">
                <button type="submit" name="button" id="button" class="btn" onclick="window.open('form_dep.php','windowname2','width=750, \height=650, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/add3.png" width="20" height="20" align="absmiddle" /> เพิ่มข้อมูลกิจกรรมชุมนุม</button>
                </td>
              </tr>
            </table>
<?php	
		//ค่าจากตัวรับข้อมูลหน้าเว็บ
		$id	 		= $_GET['id'];
		$namedep	= $_GET['namedep'];
		$ty 		= $_GET['ty'];
		$class_stu	= $_GET['class_stu'];
		$status 	= $_GET['status'];
	
	
		$sql 		= "SELECT * FROM  tb_department where dep_id like '%$id%' and name_dep like '%$namedep%' and ty_id ='$ty' and status_dep like '%$status%' and class like '%$class_stu%' order by d_id desc";
		
		$db_query 	= mysql_query($sql);
		$num      	= mysql_num_rows($db_query);
?>
<?php
	if(empty($id)&&empty($namedep)&&empty($ty)&&empty($class_stu)&&empty($status))
	{
		echo "<br><br>";
		echo "<font size=3>**กรุณาระบุข้อมูลก่อนค้นหา**</font><br><br>";		//จะแสดงข้อความ
		
	} else if(empty($ty)){
		
		echo "<br><br>";
		echo "<font size=3>**กรุณาระบุปีการศึกษาก่อนค้นหา**</font><br><br>";		//จะแสดงข้อความ
		
	} else{
?>
<br>
<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">'."มีข้อมูลกิจกรรมชุมนุมทั้งหมด ";?><?php echo '<b>'.$num.'</b>'." รายการ".'</font>';?>
<br><br>
  <table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
    <tr align="center">
      <td width="4%" height="26" bgcolor="#EAEAEA"><font size="2">ลำดับ</font></td>
      <td width="27%" bgcolor="#EAEAEA"><font size="2">ชื่อกิจกรรมชุมนุม</font></td>
      <td width="9%" bgcolor="#EAEAEA"><font size="2">คาบเรียน</font></td>
      <td width="10%" bgcolor="#EAEAEA"><font size="2">คุณสมบัติ<br>ผู้เรียน</font></td>
      <td width="5%" bgcolor="#EAEAEA"><font size="2">จ.น.<br>ที่รับ</font></td>
      <td width="5%" bgcolor="#EAEAEA"><font size="2">รับแล้ว</font></td>
      <td width="22%" bgcolor="#EAEAEA"><font size="2">ครูผู้สอน</font></td>
      <td width="5%" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
      <td width="5%" bgcolor="#EAEAEA"><font size="2">ราย<br>ละเอียด</font></td>
      <td width="4%" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
      <td width="4%" bgcolor="#EAEAEA"><font size="2">ลบ</font></td>
      </tr>
<?php 
		$i =0;	//ตัวเช็ควนรอบ
		$a =1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
		while($i < $num)
		{
			$result = mysql_fetch_array($db_query);	
			
			$d_id		= $result['d_id'];
			$dep_id		= $result['dep_id'];
			$name_dep	= $result['name_dep'];
			$atd		= $result['atd'];
			$class		= $result['class'];
			$object		= $result['object'];
			$classroom	= $result['classroom'];
			$period		= $result['period'];
			$number		= $result['number'];
			$tea_id1	= $result['tea_id1'];
			$tea_id2	= $result['tea_id2'];
			$tea_id3	= $result['tea_id3'];
			$tea_id4	= $result['tea_id4'];
			$tea_id5	= $result['tea_id5'];
			$ty_id		= $result['ty_id'];
			$status_dep	= $result['status_dep'];
?>      
    <tr align="center" class="tbl">
      <td width="4%" height="26" align="center"><font size="2"><?php echo $a;?></font></td>
      <td width="27%" align="left">
<?php
	if($status_dep == 1)	//ถ้าจำนวนที่เบือกน้อยกว่าจำนวนจริง
	{
?>
<img src="images/true.png" width="13" height="13">
<?php
	}
	else if($status_dep == 2)	//ถ้าจำนวนที่เลือกเท่ากับจำนวนจริง
	{
?>
<img src="images/false.png" width="13" height="13">
<?php
	}
?>  
      <font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $dep_id;?> <?php echo $name_dep;?> <?php echo "("."ม.$class".")";?></font></td>
      <td align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $period;?></font></td>
      <td width="10%" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $atd;?></font></td>
      <td width="5%" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $number;?></font></td>
      <td width="5%" align="center">
<?php
	//ดึงค่าจำนวนออกมา
	$sql2 = mysql_query("SELECT COUNT(d_id) FROM tb_select_rally WHERE d_id='".$result['d_id']."' and ty_id='".$result['ty_id']."' ");
	$result2 = mysql_fetch_assoc($sql2);
	
	echo '<font size="2" face="MS Sans Serif, Tahoma, sans-serif">';
	print $result2['COUNT(d_id)'];
	echo '</font>';
?></td>
      <td width="22%" align="center">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id1	= $result['tea_id1'];
			  
	$sql5 		= "select * from tb_teacher where t_id = '$tea_id1';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query5	= mysql_query($sql5);	//ถอดข้อความให้เป็นคำสั่ง
	$result5	= mysql_fetch_array($db_query5);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result5['pname'];
	$fname	= $result5['fname'];
	$lname	= $result5['lname'];
	echo "$pname "."$fname "."$lname";
?>
          </font></td>
        </tr>
        <tr>
          <td align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id2	= $result['tea_id2'];
			  
	$sql4 		= "select * from tb_teacher where t_id = '$tea_id2';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query4	= mysql_query($sql4);	//ถอดข้อความให้เป็นคำสั่ง
	$result4	= mysql_fetch_array($db_query4);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result4['pname'];
	$fname	= $result4['fname'];
	$lname	= $result4['lname'];
	echo "$pname "."$fname "."$lname";
?>
          </font></td>
        </tr>
        <tr>
          <td align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id3	= $result['tea_id3'];
			  
	$sql6 		= "select * from tb_teacher where t_id = '$tea_id3';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query6	= mysql_query($sql6);	//ถอดข้อความให้เป็นคำสั่ง
	$result6	= mysql_fetch_array($db_query6);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result6['pname'];
	$fname	= $result6['fname'];
	$lname	= $result6['lname'];
	echo "$pname "."$fname "."$lname";
?>
          </font></td>
        </tr>
        <tr>
          <td align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id4		= $result['tea_id4'];
			  
	$sql7 		= "select * from tb_teacher where t_id = '$tea_id4';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query7	= mysql_query($sql7);	//ถอดข้อความให้เป็นคำสั่ง
	$result7	= mysql_fetch_array($db_query7);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result7['pname'];
	$fname	= $result7['fname'];
	$lname	= $result7['lname'];
	echo "$pname "."$fname "."$lname";
?>
          </font></td>
        </tr>
        <tr>
          <td align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id5	= $result['tea_id5'];
			  
	$sql8 		= "select * from tb_teacher where t_id = '$tea_id5';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
	$db_query8	= mysql_query($sql8);	//ถอดข้อความให้เป็นคำสั่ง
	$result8	= mysql_fetch_array($db_query8);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
								
	$pname	= $result8['pname'];
	$fname	= $result8['fname'];
	$lname	= $result8['lname'];
	echo "$pname "."$fname "."$lname";
?>
          </font></td>
        </tr>
      </table>
      </td>
      <td width="5%" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php
	if($result2['COUNT(d_id)'] < $number)	//ถ้าจำนวนที่เบือกน้อยกว่าจำนวนจริง
	{
		echo '<font color="#00CC00"><b>ว่าง</b></font>';
	}
	else if($result2['COUNT(d_id)'] == $number)	//ถ้าจำนวนที่เลือกเท่ากับจำนวนจริง
	{
		echo '<font color="#FF0000"><b>เต็ม</b></font>';
	}
	else if($result2['COUNT(d_id)'] > $number)	//ถ้าเกิน
	{
		echo '<font color="#FF9900"><b>เกิน</b></font>';
	}
?>
      </font></td>
      <td width="5%" align="center"><a href="javascript" onclick="window.open('det_dep.php?d_id=<?=$d_id?>','windowname2','width=800, \height=650, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
      <td width="4%" align="center"><a href="javascript" onclick="window.open('edit_dep.php?d_id=<?=$d_id?>','windowname2','width=950, \height=600, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
      <td width="4%" align="center"><a href="del_dep.php?d_id=<?=$d_id?>&id=<?=$id?>&namedep=<?=$namedep?>&ty=<?=$ty?>&class_stu=<?=$class_stu?>&status=<?=$status?>" onclick="return con_del()"><img src="images/delete.png" width="20" height="20" border="0" align="middle" /></a></td>
      </tr>
<?php
	$a++;
	$i++;
	}
?>      
  </table>

  <br>
  <table width="15%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="43%" align="center"><a href="report_all_dep.php?id=<?=$id?>&namedep=<?=$namedep?>&ty=<?=$ty?>&class_stu=<?=$class_stu?>&status=<?=$status?>" target="_blank">
        <img src="images/f2.png" width="30" height="30" border="0" /><br />
        <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ทั้งหมด</font></a></td>
      <td width="8%" align="center">&nbsp;</td>
      <td width="49%" align="center"><a href="report_all_dep_excel.php?id=<?=$id?>&namedep=<?=$namedep?>&ty=<?=$ty?>&class_stu=<?=$class_stu?>&status=<?=$status?>" target="_blank"><img src="images/exword.png" width="45" height="32" border="0" /><br />
        <font size="2" face="MS Sans Serif, Tahoma, sans-serif" color="#000000">ดาวน์โหลด</font></a></td>
      </tr>
</table>
<?php 
	}	//ปิดป้องกันข้อมูล
?>	
</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;</td>
        </tr>
      </table><br> 
      </td>
  </tr>
</table>
<?php include "tbl_text2.php";?>	<!--ส่วนล่างสุด-->
<!--เริ่ม top-->
<img id="gotoTop" src="images/icontop.png" width="100" height="100" border="0" />

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
$(function(){
	// เงื่อนไข event เมื่อมีการเลื่อน scrollbar ในหน้าเพจ
	 $(window).scroll(function(){
		 if($(document).scrollTop()>100){  // เงื่อนไขขอบบนสุดของ หน้าเพจ มากกว่า 100 pixels หรือไม่
			 $("#gotoTop").fadeIn(); // ถ้ามากกว่าให้แสดง ปุ่ม  go to top 
		 }else{
			 $("#gotoTop").hide(); // ถ้าน้อยกว่าให้ซ่อน ปุ่ม go to top 
		 }
	 });
	 // เงื่อนไขเมื่อมีการคลิกที่ปุ่ม go to top
	 $("#gotoTop").click(function(){
		$('html, body').animate({ // สร้างการเคลื่อนไหว
			scrollTop: $(document.body).offset().top // ให้หน้าเพจเลื่อนไปทำตำแหน่งบนสุด
		}, 500); // ภายในเวลา 0.5 วินาที ---- 1000 เท่ากับ 1 วินาที	 
	 });
});
</script>
<!--จบ top-->
<?php
	//ส่วนของ User Authentication 
}else{
	echo "<script langquage='javascript'>\n";
	echo "window.location=\"index.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>