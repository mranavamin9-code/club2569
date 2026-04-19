<?php
	$host		=	"localhost";
	$username	=	"phrschoolc_nbr";
	$password	=	"Krubig8972";
	$db		=	"phrschoolc_nbr";
	$connect	= 	mysql_connect ($host,$username,$password) or die ('No Connect DataBass'); //No Connect DataBass
	mysql_select_db($db) or die ("No select DataBass"); //No select DaBass
	mysql_query("SET NAMES utf8");
?>