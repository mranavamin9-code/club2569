<?php
	session_start();
	include("connection.php");
?>
<html>
<head>
<title>กำลังตรวจสอบ</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" language="JavaScript1.2" src="stmenu.js"></script>
</head>

<body>
<?php
  	$class	= $_GET["class"]; 	 

	switch ($class)	
    {
      case  1 :	
								
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"class_1.php\"\n";	//ถ้าถูกต้องให้ไป admin
			echo "</script>\n";
			
      break;
	  	  
	  case  2 :		
			
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"class_2.php\"\n";	//ถ้าถูกต้องให้ไป admin
			echo "</script>\n";
								
      break; 
	  
	  case  3 :		
			
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"class_3.php\"\n";	//ถ้าถูกต้องให้ไป admin
			echo "</script>\n";
								
      break; 
	  
	  case  4 :		
			
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"class_4.php\"\n";	//ถ้าถูกต้องให้ไป admin
			echo "</script>\n";
								
      break; 
	  
	  case  5 :		
			
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"class_5.php\"\n";	//ถ้าถูกต้องให้ไป admin
			echo "</script>\n";
								
      break; 
	  
	  case  6 :		
			
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"class_6.php\"\n";	//ถ้าถูกต้องให้ไป admin
			echo "</script>\n";
								
      break; 
	  
	  default :
			echo "<script>alert('กรุณาระบุระดับชั้น');history.back();</script>";
			echo "<script langquage='javascript'>\n";
			echo " window.location=\"find_class.php\"\n";
			echo "</script>\n"; 
	   
	 }  
?>
</body>
</html>
