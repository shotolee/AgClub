<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="zh-CN"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>DailyAccount</title>
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
			<h5>Version 0.2.0</h5>
			<hr />
		</div>
		<div class="one-third column">
      <form action="" method="post">
        <div class="container column">
          <!--<textarea id="regularTextarea" name="amount"></textarea>-->
          <input type="text" name="account" size="20" maxlength="40">
        </div>
        <div class="container column">
          <input type="submit" value="upload">
        </div>
      </form>
      <!--phpupload-->
	 	<?php
	 	require('mysqli_connect.php');
	 		if(!empty($_POST['account'])){
	 			$account = mysqli_real_escape_string($dbc, $_POST['account']);
	 			$q = "INSERT INTO accounts (account, account_date) VALUES ('$account',NOW())";
	 			$r = @mysqli_query ($dbc, $q);
	 			if ($r){
	 				$message = NULL;
	 			}else {
                    echo '<p>'.mysqli_error($dbc). '<br /><br />Query: ' . $q . '</p>';
	 			}	
	 		}else{
	 			$message = NULL;
               }
//mysqli_close($dbc);
	 	?>
		</div>
		<div class="two-thirds column">
			<?php
			//require('mysqli_connect.php');
			$q2 = "SELECT  account AS ac , DATE_FORMAT(account_date, '%m-%d-%Y ')AS dt FROM accounts ORDER BY account_date DESC;
";
			$r2 = @mysqli_query ($dbc, $q2);
			$num = mysqli_num_rows($r2);
			if ( $num > 0 ) {
				echo '<div>';
               while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) { 
	               echo '<h4>' . $row2 ['ac'] .'</h4>';
	               echo '<p>' . $row2 ['dt'] . '</p>';
	               echo '<hr />';
               } 
               echo '</div>';
               /* mysqli_free_result ($r2); */
          } else {
               echo "<p> none </p>";
               } 
			mysqli_close($dbc); 
		?>
		</div>
	</div><!-- container -->
<!-- End Document
================================================== -->
</body>
</html>