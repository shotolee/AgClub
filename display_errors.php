<<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="zh-CN"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Displaying Errors</title>
</head>
<body>
	<h2>Testing Display Errors</h2>
	<?php 

	ini_set('display_errors', 1);

	foreach($var as $v) {}
		$result = 1/0;

	?>
</body>
</html>
