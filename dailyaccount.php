<?php 

$page_title = 'Haome&Leitu'; //页面标题
include ('includes/header.html'); 
?>

<div class="row">
	<div class="col-md-4 col-sm-12">
		<form class="form-horizontal" role="form" action="" method="post">
			<div class="form-group">
				<input class="form-control" type="text" name="account" size="20" maxlength="40">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success" value="Upload">
			</div>
		</form>
		<?php	 	
		//输入message页面
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
	     
	     //输入完成
		 echo '</div>';
		 echo '<div class="col-md-8 col-sm-12">';
/*
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
          } else {
               echo "<p> none </p>";
               } 
               */
			mysqli_close($dbc); 
		?>

	</div>
</div>
<?php
  include ('includes/footer.html');
?>
