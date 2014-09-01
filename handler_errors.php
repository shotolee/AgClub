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

	define('LIVE', FALSE);

	function my_error_handler ($e_number, $e_message, $e_file, $e_line, $e_vars) {

		$message = "An error occurred in script '$e_file' on line $e_message\n";

		$message .= print_r ($e_var, 1);

		if (!LIVE) {
			echo '<pre>' . $message . "\n";
			debug_print_backtrace();
			echo '</pre><br />';
		} else {
			echo '<div class="error"> A system error occurred. We apologize for the inconvenience. </div><br />';
		}
	}

	set_error_handler('my_error_handler');


	foreach($var as $v) {}
		$result = 1/0;

	?>
</body>
</html>
