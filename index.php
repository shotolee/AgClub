<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="zh-CN"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Leitu&Haome</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="stylesheets/base.css">
	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>

	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->

	<div class="container">
		<div class="sixteen columns">
			<h2 class="remove-bottom" style="margin-top: 40px">Leitu&Haome</h2>
			<h5>Version 0.1</h5>
			<hr />
		</div>
		<div class="one-third column">
      <form>
        <div class="container column">
          <textarea id="regularTextarea" name="message"></textarea>
        </div>
        <div class="container column">
          <input type="submit" value="Upload">
        </div>
      </form>
      <!--phpupload-->
	 	<?php
	 		if(!empty($_REQUEST['message'])){
	 			$message = $_REQUEST['message'];
	 			require('../mysqli_connect.php');
	 			$q = "INSERT INTO haome (message_body, message_datetime) VALUES ('$message',NOW() )";
	 			$r = @mysqli_query ($dbc, $q);
	 			if ($r){
	 				echo '<p>ok</p>';
	 			}else {
	 				echo '<p>'.mysqli_error($dbc). '<br /><br />Query: ' . $q . '</p>';
	 			}
	 			mysqli_close($dbc);
	 		}else{
	 			$message = NULL;
	 		}
	 	?>
	 	<div class="container column">
	 		<a href="slimit.php">风险计算器</a>
	 	</div>
		</div>
		<div class="two-thirds column">
			<h3>毫末和垒土</h3>
			<p>一场愉快的人生旅行</p>
		</div>
	</div><!-- container -->


<!-- End Document
================================================== -->
</body>
</html>