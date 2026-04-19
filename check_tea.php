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
 	$sql 		= "select tea_id,pname,fname,lname,idcard,tea_status from tb_teacher where tea_id = '$user';"; 
	$db_query	= mysql_query($sql);	//ถอดข้อความให้เป็นคำสั่ง
	$num_rows 	= mysql_num_rows($db_query);
	$result		= mysql_fetch_array($db_query);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb
	
	//ตารางครู
	$user		= $result['tea_id'];
	$password	= $result['idcard'];
	$level		= $result['tea_status'];
	
	$pname		= $result['pname'];
	$fname		= $result['fname'];
	$lname		= $result['lname'];
	 

	switch ($level)	//เช็ดpasswprd
    {
      case  1 :		//ครู
		
		if ($password == $pwd) //ให้password=pword ที่รับค่ามา
		{						  
			$lognum 	= 2;									
			$teacher_id	= $user;
			$tea_pname	= $pname;	
			$tea_fname	= $fname;
			$tea_lname	= $lname;
			$teacher_status	= $level;
			
			$_SESSION['lognum'] 	= $lognum;				//ประกาศค่า lognum
			$_SESSION['teacher_id'] = $teacher_id;
			$_SESSION['tea_pname'] 	= $tea_pname;
			$_SESSION['tea_fname'] 	= $tea_fname;
			$_SESSION['tea_lname'] 	= $tea_lname;
			$_SESSION['teacher_status'] = $teacher_status;
				
			if(chkBrowser("Chrome") == 1){	//1 = ใช่ , 2 = ไม่ใช่
				
				echo "<script langquage='javascript'>\n";
				echo "window.location=\"index_tea.php\"\n";	//ถ้าถูกต้องให้ไป tea
				echo "</script>\n";
			}
			else if(chkBrowser("MSIE") == 1){	//ถ้าใช่ IE
							
				echo "<script>alert('เราตรวจสอบพบว่า คุณใช้งานระบบด้วยโปรแกรม Internet Explorer เราจึงขอแนะนำให้คุณใช้งานด้วยโปรแกรม Google Chrome เท่านั้น');history.back();</script>";
				echo "<script langquage='javascript'>\n";
				session_destroy(); // ลบ Session ทั้งหมด
				echo "window.location=\"login_tea.php\"\n";	//ถ้าถูกต้องให้ไปหน้าหลัก
				echo "</script>\n";
			}
			else {	//อื่นๆ
							
				echo "<script>alert('เราตรวจสอบพบว่า คุณไม่ได้ใช้งานระบบด้วยโปรแกรม Google Chrome เราจึงขอแนะนำให้คุณใช้งานด้วยโปรแกรม Google Chrome เท่านั้น เพื่อให้เกิดประสิทธิภาพในการใช้งานระบบลงทะเบียนกิจกรรมชุมนุมมากขึ้น');</script>";
				echo "<script langquage='javascript'>\n";
				echo "window.location=\"index_tea.php\"\n";	//ถ้าถูกต้องให้ไปหน้าหลัก
				echo "</script>\n";
			}
				
		}else{
		
			echo "<script>alert('Username และ Password ไม่ถูกต้อง');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo "window.location=\"index.php\"\n";	//ดีดกลับไปlogin
			echo "</script>\n";
		}				
      break;
	  	  
	  case  2 :		//เจ้าหน้าที่
		if ($password == $pwd) 
		{
							
			$lognum 	= 3;									
			$teacher_id	= $user;
			$tea_pname	= $pname;	
			$tea_fname	= $fname;
			$tea_lname	= $lname;
			$teacher_status	= $level;
			
			$_SESSION['lognum'] 	= $lognum;				//ประกาศค่า lognum
			$_SESSION['teacher_id'] = $teacher_id;
			$_SESSION['tea_pname'] 	= $tea_pname;
			$_SESSION['tea_fname'] 	= $tea_fname;
			$_SESSION['tea_lname'] 	= $tea_lname;
			$_SESSION['teacher_status'] = $teacher_status;
				
			if(chkBrowser("Chrome") == 1){	//1 = ใช่ , 2 = ไม่ใช่
				
				echo "<script langquage='javascript'>\n";
				echo "window.location=\"index_emp.php\"\n";	//ถ้าถูกต้องให้ไป emp
				echo "</script>\n";
			}
			else if(chkBrowser("MSIE") == 1){	//ถ้าใช่ IE
							
				echo "<script>alert('เราตรวจสอบพบว่า คุณใช้งานระบบด้วยโปรแกรม Internet Explorer เราจึงขอแนะนำให้คุณใช้งานด้วยโปรแกรม Google Chrome เท่านั้น');history.back();</script>";
				echo "<script langquage='javascript'>\n";
				session_destroy(); // ลบ Session ทั้งหมด
				echo "window.location=\"login_tea.php\"\n";	//ถ้าถูกต้องให้ไปหน้าหลัก
				echo "</script>\n";
			}
			else {	//อื่นๆ
							
				echo "<script>alert('เราตรวจสอบพบว่า คุณไม่ได้ใช้งานระบบด้วยโปรแกรม Google Chrome เราจึงขอแนะนำให้คุณใช้งานด้วยโปรแกรม Google Chrome เท่านั้น เพื่อให้เกิดประสิทธิภาพในการใช้งานระบบลงทะเบียนกิจกรรมชุมนุมมากขึ้น');</script>";
				echo "<script langquage='javascript'>\n";
				echo "window.location=\"index_emp.php\"\n";	//ถ้าถูกต้องให้ไปหน้าหลัก
				echo "</script>\n";
			}
								
		}else{
						
			echo "<script>alert('Username และ Password ไม่ถูกต้อง');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo "window.location=\"index.php\"\n";
			echo "</script>\n";
		}
      break; 
	   
	  default :
			echo "<script>alert('Username และ Password ไม่ถูกต้อง');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo "window.location=\"index.php\"\n";
			echo "</script>\n";
     }  
?>
</body>
</html>
