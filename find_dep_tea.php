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

<!--css แสดงแบ่งหน้า-->
<style type="text/css">
.browse_page {
	clear:both;
	margin-left:12px;
	height:35px;
	margin-top:5px;
	display:block;
}
.browse_page a, .browse_page a:hover {
	display:block;
	height:18px;
	width:18px;
	font-size:10px;
	float:left;
	margin-right:2px;
	border:1px solid #CCCCCC;
	background-color:#F4F4F4;
	color:#333333;
	text-align:center;
	line-height:18px;
	font-weight:bold;
	text-decoration:none;
}
.browse_page a:hover {
	border:1px solid #0A85CB;
	background-color:#0A85CB;
	color:#FFFFFF;
}
.browse_page a.selectPage {
	display:block;
	height:18px;
	width:18px;
	font-size:10px;
	float:left;
	margin-right:2px;
	border:1px solid #0A85CB;
	background-color:#0A85CB;
	color:#FFFFFF;
	text-align:center;
	line-height:18px;
	font-weight:bold;
}
.browse_page a.SpaceC {
	display:block;
	height:18px;
	width:18px;
	font-size:10px;
	float:left;
	margin-right:2px;
	border:0px dotted #0A85CB;
	font-size:11px;
	background-color:#FFFFFF;
	color:#333333;
	text-align:center;
	line-height:18px;
	font-weight:bold;
}
.browse_page a.naviPN {
	width:50px;
	font-size:12px;
	display:block;
	height:18px;
	float:left;
	border:1px solid #0A85CB;
	background-color:#0A85CB;
	color:#FFFFFF;
	text-align:center;
	line-height:18px;
	font-weight:bold;
}
.browse_page a.naviPN:hover {
	width:50px;
	font-size:12px;
	display:block;
	height:18px;
	float:left;
	border:1px solid #0A85CB;
	background-color:#0A85CB;
	color:#FFFFFF;
	text-align:center;
	line-height:18px;
	font-weight:bold;
}
</style>

<style type="text/css">
/*
css สำหรับกำหนดปุ่ม go to top แบบชิดขอบล่างขวา แบบ fixed ตำแหน่ง
*/
#gotoTop {
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

<STYLE>
.tbl:hover{							
	background-color: #D6E7D1;	/*สีเมื่อเมาส์ไปโดน*/
}
</STYLE>
</head>

<body background="images/bg.gif" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<?php
// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 2)
	{
?>
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
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" height="800" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
        <tr>
          <td height="289" valign="top" background="images/pic/banner.jpg"><table width="100%" height="50" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="5%" height="50">&nbsp;</td>
                <td width="68%" valign="middle"><a href="<?='http://'.config_url;?>" target="_blank"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#007BB7"><b><?=config_url;?></b></font></a></td>
                <td width="25%" align="right" valign="middle"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#FFFFFF"><b><a href="index_tea.php">กลับหน้าหลัก</a></b></font></td>
                <td width="2%" valign="middle">&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
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
											
	$t_id		= $result_ss['t_id'];
	$tea_id		= $result_ss['tea_id'];
	$pname		= $result_ss['pname'];
	$fname		= $result_ss['fname'];
	$lname		= $result_ss['lname'];
	$idcard		= $result_ss['idcard'];
	$cat_id		= $result_ss['cat_id'];
	$tea_status	= $result_ss['tea_status'];
?>
                <font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b><?php echo "$teacher_id".'&nbsp;'.":".'&nbsp;'."$pname".'&nbsp;'."$fname".'&nbsp;'."$lname";?></b></font><br>
                <img src="images/horz_1.gif" /></td>
              </tr>
            </table><br>
<div align="center"><font size="5" color="#FF6600" face="MS Sans Serif, Tahoma, sans-serif"><b>กิจกรรมชุมนุมที่เปิดสอน</b></font></div><br>
            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="48%" height="35" align="left"><font size="2"><b>หมายเหตุ :</b>&nbsp;&nbsp;<img src="images/true.png" width="13" height="13" />&nbsp;&nbsp;เปิดรายวิชา&nbsp;&nbsp;&nbsp;<img src="images/false.png" width="13" height="13" />&nbsp;&nbsp;ปิดรายวิชาหรือดำเนินการเสร็จสิ้น</font></td>
              </tr>
            </table>
            <br>
<?php   
	// สร้างฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
	function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page){   
	global $urlquery_str;
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;		
	$lt_page=$total_p-4;
	if($chk_page>0){  
		echo "<a  href='?s_page=$pPrev&urlquery_str=".$urlquery_str."' class='naviPN'>Prev</a>";
	}
	if($total_p>=11){
		if($chk_page>=4){
			echo "<a $nClass href='?s_page=0&urlquery_str=".$urlquery_str."'>1</a><a class='SpaceC'>. . .</a>";   
		}
		if($chk_page<4){
			for($i=0;$i<$total_p;$i++){  
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				if($i<=4){
				echo "<a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
				}
				if($i==$total_p-1 ){ 
				echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
				}		
			}
		}
		if($chk_page>=4 && $chk_page<$lt_page){
			$st_page=$chk_page-3;
			for($i=1;$i<=5;$i++){
				$nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
				echo "<a $nClass href='?s_page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";   	
			}
			for($i=0;$i<$total_p;$i++){  
				if($i==$total_p-1 ){ 
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
				}		
			}									
		}	
		if($chk_page>=$lt_page){
			for($i=0;$i<=4;$i++){
				$nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
				echo "<a $nClass href='?s_page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";   
			}
		}		 
	}else{
		for($i=0;$i<$total_p;$i++){  
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			echo "<a href='?s_page=$i&urlquery_str=".$urlquery_str."' $nClass  >".intval($i+1)."</a> ";   
		}		
	} 	
	if($chk_page<$total_p-1){
		echo "<a href='?s_page=$pNext&urlquery_str=".$urlquery_str."'  class='naviPN'>Next</a>";
	}
}   
?>
<?php
	$q="select * from tb_department where tea_id1 ='$t_id' or tea_id2 ='$t_id' or tea_id3 ='$t_id' or tea_id4 ='$t_id' or tea_id5 ='$t_id'";	//สถานะวิชา 1  และ ระดับชั้นที่เข้าเรียน ตามระดับชั้นของตัวเอง
	$q.="ORDER BY d_id desc";
	$qr=mysql_query($q);
	$total=mysql_num_rows($qr);
	$e_page=10; 	// กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
	$num_a =1;		//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
	$ie =1;
	if(!isset($_GET['s_page'])){   
		$_GET['s_page']=0;   
	}else{   
		$chk_page=$_GET['s_page'];     
		$_GET['s_page']=$_GET['s_page']*$e_page;   
	}   
	$q.=" LIMIT ".$_GET['s_page'].",$e_page";
	$qr=mysql_query($q);
	if(mysql_num_rows($qr)>=1){   
		$plus_p=($chk_page*$e_page)+mysql_num_rows($qr);   
	}else{   
		$plus_p=($chk_page*$e_page);       
	}   
	$total_p=ceil($total/$e_page);   
	$before_p=($chk_page*$e_page)+1;
?>
<?php
	if ($total <> 0){	//ถ้าค่า num ไม่เท่ากับ o ให้แสดงข้อมูล
?>
<table width="95%" border="1"  align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="5%" height="26" align="center" bgcolor="#EAEAEA"><font size="2"face="MS Sans Serif, Tahoma, sans-serif">ลำดับ</font></td>
    <td width="30%" height="26" align="center" bgcolor="#EAEAEA"><font size="2">ชื่อกิจกรรมชุมนุม</font></td>
    <td width="5%" height="26" align="center" bgcolor="#EAEAEA"><font size="2">ปีการ<br>ศึกษา</font></td>
    <td width="10%" height="26" align="center" bgcolor="#EAEAEA"><font size="2">คาบเรียน</font></td>
    <td width="12%" height="26" align="center" bgcolor="#EAEAEA"><font size="2">คุณสมบัติ<br>ผู้เรียน</font></td>
    <td width="5%" height="26" align="center" bgcolor="#EAEAEA"><font size="2"face="MS Sans Serif, Tahoma, sans-serif">จ.น.<br>ที่รับ</font></td>
    <td width="5%" height="26" align="center" bgcolor="#EAEAEA"><font size="2"face="MS Sans Serif, Tahoma, sans-serif">รับแล้ว</font></td>
    <td width="19%" height="26" align="center" bgcolor="#EAEAEA"><font size="2"face="MS Sans Serif, Tahoma, sans-serif">ครูผู้สอน</font></td>
    <td width="5%" height="26" align="center" bgcolor="#EAEAEA"><font size="2">สถานะ</font></td>
    <td width="4%" height="26" align="center" bgcolor="#EAEAEA"><font size="2">ราย<br>ละเอียด</font></td>
  </tr>
<?php
	while($rs=mysql_fetch_array($qr)){	//คำสั่งใช่ในการวนลูป
	
	$d_id		= $rs['d_id'];
	$dep_id		= $rs['dep_id'];
	$name_dep	= $rs['name_dep'];
	$atd		= $rs['atd'];
	$class		= $rs['class'];
	$object		= $rs['object'];
	$classroom	= $rs['classroom'];
	$period		= $rs['period'];
	$number		= $rs['number'];
	$tea_id1	= $rs['tea_id1'];
	$tea_id2	= $rs['tea_id2'];
	$tea_id3	= $rs['tea_id3'];
	$tea_id4	= $rs['tea_id4'];
	$tea_id5	= $rs['tea_id5'];
	$ty_id		= $rs['ty_id'];
	$status_dep	= $rs['status_dep']
?>
  <tr class="tbl">
    <td width="5%" height="26" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $num_a;?></font></td>
    <td height="26">
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
    <td width="5%" height="26" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 			  
	$sqly 		= "select * from tb_term_year where ty_id = '$ty_id';";
	$db_queryy	= mysql_query($sqly);
	$resulty	= mysql_fetch_array($db_queryy);
								
	$year	= $resulty['year'];
	echo "$year";
?>
    </font></td>
    <td width="10%" height="26" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $period;?></font></td>
    <td width="12%" height="26" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $atd;?></font></td>
    <td width="5%" height="26" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $number;?></font></td>
    <td width="5%" height="26" align="center">
<?php
	//ดึงค่าจำนวนออกมา
	$sql2 = mysql_query("SELECT COUNT(d_id) FROM tb_select_rally WHERE d_id='".$rs['d_id']."' and ty_id='".$rs['ty_id']."' ");
	$result2 = mysql_fetch_assoc($sql2);
	
	echo '<font size="2" face="MS Sans Serif, Tahoma, sans-serif">';
	print $result2['COUNT(d_id)'];
	echo '</font>';
?></td>
    <td width="19%" height="26" align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
<?php 
	$tea_id1	= $rs['tea_id1'];
			  
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
	$tea_id2	= $rs['tea_id2'];
			  
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
	$tea_id3	= $rs['tea_id3'];
			  
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
	$tea_id4	= $rs['tea_id4'];
			  
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
	$tea_id5	= $rs['tea_id5'];
			  
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
    </table></td>
    <td width="5%" height="26" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">
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
    <td width="4%" height="26" align="center"><a href="javascript" onclick="window.open('det_dep.php?d_id=<?=$d_id?>','windowname2','width=800, \height=650, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/doc.png" width="20" height="20" border="0" align="middle" /></a></td>
  </tr>
<?php 
	$num_a++;
	} 
?>
</table>
<?php if($total>0){ ?>
<div class="browse_page">
<?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
  page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);    
?>
</div>
<?php } ?>
<?php		
	}else if ($total == 0){		//ถ้าค่า num = 0 ให้แสดงข้อความนี้
		
		echo '<div align="center">'.'<img src="images/alert.png">'.'&nbsp;'.'<font size="4" face="Tahoma">'."ยังไม่มีข้อมูลรายวิชาของท่าน".'</font>'.'</div>';
	}
?>
</td>
        </tr>
        <tr>
          <td valign="top">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
<?php include "tbl_text2.php";?>	<!--ส่วนล่างสุด-->
<?php
	//ส่วนของ User Authentication 
}else{
	echo "<script langquage='javascript'>\n";
	echo " window.location=\"index.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>