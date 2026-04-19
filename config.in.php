<?php
	define('BASE_PATH', dirname(__FILE__) );			//base >> filemanager/fm.php
	$BASE_PATH = str_replace('\\', '\\\\', BASE_PATH);
	
	//ไฟล์ใช้สำหรับแสดงส่วนข้อความของเว็บ
	//MySQL Connect
	define("DB_HOST","localhost");
	define("DB_NAME","phrschoolc_nbr");
	define("DB_USERNAME","phrschoolc_nbr");
	define("DB_PASSWORD","Krubig8972");
	define("ISO","utf-8");
	
	// ข้อมูลเว็บ
	mysql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
	mysql_select_db(DB_NAME);
	mysql_query("SET NAMES utf8");
	$strSQL1 = "SELECT * FROM tb_config order by t_id asc";
	$objQuery1 = mysql_query($strSQL1);
	$num_rows = mysql_num_rows($objQuery1);
	while ($config = mysql_fetch_array($objQuery1))
	{
		$posit = "config_".$config[posit];		//แสดงส่วน posit
		define("$posit","$config[t_name]");		//แสดงเฉพาะชื่อ
	}
?>