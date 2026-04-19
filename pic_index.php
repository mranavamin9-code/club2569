<?php
	session_start();
	include("connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript" src="fancybox/lib/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="fancybox/source/jquery.fancybox-buttons.js?v=1.0.5"></script>
<link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="fancybox/source/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="fancybox/source/jquery.fancybox-media.js?v=1.0.6"></script>

<script type="text/javascript">
	$(document).ready(function() {
	$("#various").fancybox({
	'titlePosition'		: 'inside',
	'transitionIn'		: 'none',
	'transitionOut'		: 'none'
	}).trigger('click');
	});
</script>  
</head>

<body>
<a id="various" href="#inline"></a>	
<div style="display:" id="inline" overflow:auto;"><a href="https://support.google.com/chrome/answer/95346?hl=th" target="_new"><img src="images/pic_index.jpg" border="0" width="650" height="400" ></a></div>
</body>
</html>