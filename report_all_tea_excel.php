<?php
	session_start();
	include("connection.php");
	
	header("Content-type: application/vnd.ms-word");		//คำสั่งดาวน์โหลด
	header("Content-Disposition: attachment; filename=รายงานข้อมูลครู/เจ้าหน้าที่ สำหรับแปลงเป็นไฟล์ CSV.xls");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php
	$id	 		= $_GET['id'];
	$f_name		= $_GET['f_name'];
	$l_name 	= $_GET['l_name'];
	$name		= $_GET['name'];
	$status 	= $_GET['status'];
	
	$sql = "SELECT * FROM  tb_teacher where tea_id like '%$id%' and fname like '%$f_name%' and lname like '%$l_name%' and cat_id like '%$name%' and tea_status like '%$status%' order by t_id asc";
	
	$db_query = mysql_query($sql);	//เปลี่ยนเป็นคำสั่ง
	$num      = mysql_num_rows($db_query);	//เป็นตัวบอกว่า ตัวค้นหามีทั้งหมดกี่รายการ เมื่อได้ตัวแปรอออกมาให้เก็บในตัวแปรชื่อว่า $num
?>
<table width="600" border="1">
<?php
		$i = 0;
		$a = 1;
		while($i < $num)
		{
					
		$result 	= mysql_fetch_array($db_query);
					
		$t_id		= $result['t_id'];
		$tea_id		= $result['tea_id'];
		$pname		= $result['pname'];
		$fname		= $result['fname'];
		$lname		= $result['lname'];
		$idcard		= $result['idcard'];
		$cat_id		= $result['cat_id'];
		$tea_status	= $result['tea_status'];
?>
  <tr>
    <td width="79" align="center"><?php echo $tea_id;?></td>
    <td width="80" align="center"><?php echo $pname;?></td>
    <td width="90" align="center"><?php echo $fname;?></td>
    <td width="90" align="center"><?php echo $lname;?></td>
    <td width="115" align="center"><?php echo $idcard;?></td>
    <td width="50" align="center"><?php echo $cat_id;?></td>
    <td width="50" align="center"><?php echo $tea_status;?></td>
  </tr>
  <?php
	$i++;
	$a++;
	}				
?>
</table>
</body>
</html>