<?php
	session_start();
	include("connection.php");

	function chkBrowser($nameBroser){	//เช็ค web-browcer
   	return preg_match("/".$nameBroser."/",$_SERVER['HTTP_USER_AGENT']);
	}
?>
<html>
<head>
<title>กำลังเข้าสู่ระบบ</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" language="JavaScript1.2" src="stmenu.js"></script>
</head>

<body>
<?php
  	$user	= $_POST["uname"];   //รับค่า uname ให้เท่ากับ user
 	$pwd 	= $_POST["pword"];	 //รับค่า pword ให้เท่ากับ pwd
	
	$user 		= mysql_real_escape_string($user);	//คำสั่งป้องกันใส่อักขระ - " '
 	$sql 		= "select s_id,stu_id,stu_name,id_card,class_id,room,no,status_stu from tb_student where stu_id = '$user';"; 
	$db_query	= mysql_query($sql);	//ถอดข้อความให้เป็นคำสั่ง
	$num_rows 	= mysql_num_rows($db_query);
	$result		= mysql_fetch_array($db_query);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
	
	$user		= $result['stu_id'];
	$pass		= $result['id_card'];
	$level		= $result['status_stu'];
	$stud_id	= $result['s_id'];
	$stud_name	= $result['stu_name'];
	$stud_class	= $result['class_id'];
	$stud_room	= $result['room'];
	$stud_no	= $result['no'];
	 

 switch ($level)	//เช็ดpasswprd
    {
      case  1 :		//student ดึงจาก status
		if ($pass == $pwd) //ให้password=pword ที่รับค่ามา
		{
										  
			$lognum 		= 1;								
			$student_id		= $user;
			$user_id		= $stud_id;
			$student_name	= $stud_name;	
			$student_class	= $stud_class;
			$student_room	= $stud_room;
			$student_no		= $stud_no;				
			
			//ประกาศ session			
			$_SESSION['lognum'] 		= $lognum;			//ประกาศค่า lognum
			$_SESSION['user_id'] 		= $user_id;
			$_SESSION['student_id'] 	= $student_id;
			$_SESSION['student_name'] 	= $student_name;
			$_SESSION['student_class'] 	= $student_class;
			$_SESSION['student_room'] 	= $student_room;
			$_SESSION['student_no'] 	= $student_no;
				
			if(chkBrowser("Chrome") == 1){	//1 = ใช่ , 2 = ไม่ใช่
				
				echo "<script langquage='javascript'>\n";
				echo "window.location=\"index_stu.php\"\n";	//ถ้าถูกต้องให้ไปหน้าหลัก
				echo "</script>\n";
			}
			else if(chkBrowser("MSIE") == 1){	//ถ้าใช่ IE
							
				echo "<script>alert('เราตรวจสอบพบว่า คุณใช้งานระบบด้วยโปรแกรม Internet Explorer เราจึงขอแนะนำให้คุณใช้งานด้วยโปรแกรม Google Chrome เท่านั้น');history.back();</script>";
				echo "<script langquage='javascript'>\n";
				session_destroy(); // ลบ Session ทั้งหมด
				echo "window.location=\"login_stu.php\"\n";	//ถ้าถูกต้องให้ไปหน้าหลัก
				echo "</script>\n";
			}
			else {	//อื่นๆ
							
				echo "<script>alert('เราตรวจสอบพบว่า คุณไม่ได้ใช้งานระบบด้วยโปรแกรม Google Chrome เราจึงขอแนะนำให้คุณใช้งานด้วยโปรแกรม Google Chrome เท่านั้น เพื่อให้เกิดประสิทธิภาพในการใช้งานระบบลงทะเบียนกิจกรรมชุมนุมมากขึ้น');</script>";
				echo "<script langquage='javascript'>\n";
				echo "window.location=\"index_stu.php\"\n";	//ถ้าถูกต้องให้ไปหน้าหลัก
				echo "</script>\n";
			}
				
		}else{
			
			echo "<script>alert('Username และ Password ไม่ถูกต้อง');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo "window.location=\"login_stu.php\"\n";	//ดีดกลับไปlogin
			echo "</script>\n";
			
			}				
      break; 
	  
	  default :
		echo "<script>alert('Username และ Password ไม่ถูกต้อง');history.back();</script>";
		echo "<script langquage='javascript'>\n";
		echo "window.location=\"login_stu.php\"\n";
		echo "</script>\n";
     }
?>
</body>
</html>
