<?php
	session_start();
	include("connection.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เปิด - ปิดระบบล็อกอินสำหรับนักเรียน</title>
<link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" href="calendar/jquery.datetimepicker.css">
<style type="text/css">
#startDate,  #endDate {
	text-align:center;
	width:100px;
}
#startTime,  #endTime {
	text-align:center;
	width:70px;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!--<script src="js/jquery-1.8.3.min.js"></script>-->
<script src="calendar/jquery.datetimepicker.js"></script>
<script type="text/javascript">
$(function(){
	
    var optsDate = {  
        format:'m-d-Y', // รูปแบบวันที่ 
        formatDate:'m-d-Y',
        timepicker:false,   
        closeOnDateSelect:true,
    } 
    var optsTime = {
        format:'H:i:00', // รูปแบบเวลา
        step:30,  // step เวลาของนาที แสดงค่าทุก 30 นาที 
        formatTime:'H:i',
        datepicker:false,
    }    
    var setDateFunc = function(ct,obj){
        var minDateSet = $("#startDate").val();
        var maxDateSet = $("#endDate").val();
        
        if($(obj).attr("id")=="startDate"){
            this.setOptions({
                minDate:false,
                maxDate:maxDateSet?maxDateSet:false
            })                   
        }
        if($(obj).attr("id")=="endDate"){
            this.setOptions({
                maxDate:false,
                minDate:minDateSet?minDateSet:false
            })                   
        }
    }
    
    var setTimeFunc = function(ct,obj){
        var minDateSet = $("#startDate").val();
        var maxDateSet = $("#endDate").val();        
        var minTimeSet = $("#startTime").val();
        var maxTimeSet = $("#endTime").val();
        
        if(minDateSet!=maxDateSet){
            minTimeSet = false;
            maxTime = false;
        }
        
        if($(obj).attr("id")=="startTime"){
            this.setOptions({
                maxDate:maxDateSet?maxDateSet:false,
                minTime:false,
                maxTime:maxTimeSet?maxTimeSet:false        
            })                   
        }
        if($(obj).attr("id")=="endTime"){
            this.setOptions({
                minDate:minDateSet?minDateSet:false,
                maxTime:false,
                minTime:minTimeSet?minTimeSet:false      
            })                   
        }
    }    
    
    $("#startDate,#endDate").datetimepicker($.extend(optsDate,{  
        onShow:setDateFunc,
        onSelectDate:setDateFunc,
    }));
    
    $("#startTime,#endTime").datetimepicker($.extend(optsTime,{  
        onShow:setTimeFunc,
        onSelectTime:setTimeFunc,
    }));    
    
    
    
});
</script>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<style>
.styled-select select {
   background: #333;
   padding: 5px;
   font-size: 16px;
   color: #FFF;
   line-height: 1;
   border: 0;
   border-radius: 0;
   height: 35px;
   }
</style>
</head>

<body>
<?php
if($_SESSION['lognum'] == 3)
	{
?>
<?php	
	$in_id = $_GET['in_id'];	
	
	$sql="SELECT * FROM  tb_log_index where in_id = '$in_id'";	
	$db_query = mysql_query($sql);
	$result = mysql_fetch_array($db_query);
	
	$in_id		=$result['in_id'];
	$name_in	=$result['name_in'];
	$date_log	=$result['date_log'];
	$time_log	=$result['time_log'];
	$status_in	=$result['status_in'];
	
	$time		= "$date_log $time_log";
?>
<br>
<form name="form_add" method="post" action="save_edit_id.php" onSubmit="JavaScript:return fncSubmit();">
  <table width="95%" border="0"  align="center" cellpadding="0" bgcolor="#FFFFFF">
    <tr>
      <td height="74" align="center" valign="middle"><font size="6" color="#FF6633" face="MS Sans Serif, Tahoma, sans-serif"><b>เปิด - ปิด<?php echo "$name_in";?></b></font></td>
    </tr>
    <tr>
      <td height="122" align="center" valign="middle"><font size="3" face="MS Sans Serif, Tahoma, sans-serif">
      <div align="center" style="margin:auto;"> เลือกชุมนุมได้ถึงวันที่&nbsp;
          <input name="endDate" type="text" id="endDate" value="<?php echo "$date_log";?>" readonly="readonly">
          &nbsp;เวลา:&nbsp;
          <input name="endTime" type="text" id="endTime" value="<?php echo "$time_log";?>" readonly="readonly">
          &nbsp;น.</div>
          (ด-ว-ป)<br>
<script type="text/javascript">
function countDown(){
	var timeA = new Date(); // วันเวลาปัจจุบัน
	var timeB = new Date("<?=$time;?>"); // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
	// วันเวลาสิ้นสุด รูปแบบ ปี,เดือน;วันที่,ชั่วโมง,นาที,วินาที,,มิลลิวินาที    เลขสองหลักไม่ต้องมี 0 นำหน้า
	// เดือนต้องลบด้วย 1 เดือนมกราคมคือเลข 0
	var timeDifference = timeB.getTime()-timeA.getTime();    //วันที่เลือก ลบ วันปัจจุบัน
	if(timeDifference>=0){
		timeDifference=timeDifference/1000;
		timeDifference=Math.floor(timeDifference);
		var wan=Math.floor(timeDifference/86400);
		var l_wan=timeDifference%86400;
		var hour=Math.floor(l_wan/3600);
		var l_hour=l_wan%3600;
		var minute=Math.floor(l_hour/60);
		var second=l_hour%60;
		var showPart=document.getElementById('showRemain');
		showPart.innerHTML="ขณะนี้เหลือเวลา "+wan+" วัน "+hour+" ชั่วโมง "
		+minute+" นาที "+second+" วินาที"; 
			if(wan==0 && hour==0 && minute==0 && second==0){
				clearInterval(iCountDown); // ยกเลิกการนับถอยหลังเมื่อครบ
				// เพิ่มฟังก์ชันอื่นๆ ตามต้องการ
				//window.location='index.php';	//เปิดเพจใหม่
			}
	}
}
// การเรียกใช้
var iCountDown=setInterval("countDown()",1000); 
</script>
        <div id="showRemain"></div>
        </font></td>
    </tr>
    <tr>
      <td height="92" align="center" valign="middle" bgcolor="#EFEFEF"><font size="3" face="MS Sans Serif, Tahoma, sans-serif"><b>สถานะระบบตอนนี้</b></font><br>
      	<div class="styled-select">
          <select name="status">
            <option value="<?php echo "$status_in";?>">
<?php
	if($status_in == 1)
	{
		echo '<font size="2">'."เปิดระบบ".'</font>';
		
	}else if($status_in == 2){
		
		echo '<font size="2">'."ปิดระบบ".'</font>';
	}
?>
            </option>
            <option value="1">เปิดระบบ</option>
            <option value="2">ปิดระบบ</option>
          </select>
      </div>
      </td>
    </tr>
    <tr>
      <td height="92" align="center" valign="middle"><button type="submit" name="button" id="button" style="height:30px; font-size:15px;"><img src="images/edit.png" width="20" height="20" align="absmiddle" /> ดำเนินการเปลี่ยนแปลง</button>
        <input type="hidden" name="in_id" value="<?php echo $in_id;?>" /></td>
    </tr>
  </table>
  <br>
</form>
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