<?php
	define('BASE_PATH', dirname(__FILE__) );			//base >> filemanager/fm.php
	$BASE_PATH = str_replace('\\', '\\\\', BASE_PATH);
	
	//ไฟล์ใช้สำหรับแสดงส่วนข้อความของเว็บ
	//mysqli Connect
	define("DB_HOST","localhost");
	define("DB_NAME","phrschoolc_nbr");
	define("DB_USERNAME","phrschoolc_nbr");
	define("DB_PASSWORD","Krubig8972");
	define("ISO","utf-8");
	
	// ข้อมูลเว็บ
	mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysqli_select_db($db, DB_NAME);
	mysqli_query($db, "SET NAMES utf8");
	$strSQL1 = "SELECT * FROM tb_config order by t_id asc";
	$objQuery1 = mysqli_query($db, $strSQL1);
	$num_rows = mysqli_num_rows($objQuery1);
	while ($config = mysqli_fetch_array($objQuery1))
	{
		$posit = "config_".$config['posit'];		//แสดงส่วน posit
		define("$posit","$config[t_name]");		//แสดงเฉพาะชื่อ
	}
?>