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

<!--ควบคุม btn-->
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
</STYLE>
<!--จบควบคุม btn-->

<!--ควบคุม table-->
<STYLE>
.tbl:hover{							
	background-color: #D6E7D1;	/*สีเมื่อเมาส์ไปโดน*/
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
</head>

<body background="images/bg.gif" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">
<?php
// ส่วนของการทำ User Authentication 
if($_SESSION['lognum'] == 3)
	{
?>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" height="800" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
        <tr>
          <td height="289" colspan="2" valign="top" background="images/pic/banner.jpg"><table width="100%" height="50" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="5%" height="50">&nbsp;</td>
              <td width="68%" valign="middle"><a href="<?='http://'.config_url;?>" target="_blank"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#007BB7"><b><?=config_url;?></b></font></a></td>
              <td width="25%" align="right" valign="middle"><font size="3"face="MS Sans Serif, Tahoma, sans-serif" color="#FFFFFF"><b><a href="index_emp.php">กลับหน้าหลัก</a></b></font></td>
              <td width="2%" valign="middle">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="23%" valign="top"><?php include "menu_emp.php";?></td>
          <td width="77%" align="center" valign="top">
          
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
          <font size="6" color="#FF3300" face="MS Sans Serif, Tahoma, sans-serif"><b>ข้อมูลปีการศึกษา</b></font><br><br>        
          <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="48%" align="right"><font size="2" face="MS Sans Serif, Tahoma, sans-serif">* เพิ่มข้อมูลใหม่เมื่อเริ่มปีการศึกษาใหม่ทุกครั้ง</font>
              <button type="submit" name="button" id="button" class="btn" onclick="window.open('form_ty.php','windowname2','width=480, \height=200, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/add3.png" width="20" height="20" align="absmiddle" /> เพิ่มข้อมูลปีการศึกษา</button>
              </td>
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
	$q="select * from tb_term_year";
	$q.=" ORDER BY ty_id desc ";
	$qr=mysql_query($q);
	$total=mysql_num_rows($qr);
	$e_page = 5; 	// กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
	$num_a  = 1;		//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
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
<table width="50%" border="1"  align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
  <tr>
    <td width="72%" height="26" align="center" bgcolor="#EAEAEA"><font size="2"face="MS Sans Serif, Tahoma, sans-serif">ปีการศึกษา</font></td>
    <td width="28%" height="26" align="center" bgcolor="#EAEAEA"><font size="2">แก้ไข</font></td>
  </tr>
<?php
	while($rs = mysql_fetch_array($qr) ){	//คำสั่งใช่ในการวนลูป
	
	$ty_id	= $rs['ty_id'];
	$year	= $rs['year'];
?>
  <tr class="tbl">
    <td width="72%" height="26" align="center"><font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $year;?></font></td>
    <td width="28%" height="26" align="center"><a href="javascript" onClick="window.open('edit_ty.php?ty_id=<?=$ty_id?>','windowname2','width=480, \height=200, \directories=no, \location=no, \menubar=no, \resizable=no, \scrollbars=no, \status=no, \toolbar=no'); return false;"><img src="images/edit.png" width="20" height="20" border="0" align="middle" /></a></td>
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
</td>
        </tr>
      </table>
<?php		
	}else if ($total == 0){		//ถ้าค่า num = 0 ให้แสดงข้อความนี้
		
		echo '<div align="center">'.'<img src="images/alert.png">'.'&nbsp;'.'<font size="4" face="Tahoma">'."ยังไม่มีการเพิ่มข้อมูลปีการศึกษาค่ะ".'</font>'.'</div>';
	}
?>
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
	echo " window.location=\"index.php\"\n";
	echo "</script>\n";
}
?>
</body>
</html>