<?php 

$page_title = 'Haome&Leitu';
include ('includes/header.html');

?>

<div class="row">
	<div class="col-md-4 col-sm-12">
		<form class="form-horizontal" role="form" action="" method="post">
			<div class="form-group">
				<textarea class="form-control" rows="3" name="message"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success" value="Upload">
			</div>
		</form>
		<?php	 	
		require('mysqli_connect.php');
		if(!empty($_POST['message'])){
		 	$message = mysqli_real_escape_string($dbc, $_POST['message']);
		 	$q = "INSERT INTO haome (message_body, message_datetime) VALUES ('$message',NOW())";
		 	$r = @mysqli_query ($dbc, $q);
		 	if ($r){
		 		$message = NULL;
		 	}else {
	            echo '<p>'.mysqli_error($dbc). '<br /><br />Query: ' . $q . '</p>';
		 	}	
		 }else{
		 	$message = NULL;
	        }
		 echo '</div>';
		 echo '<div class="col-md-8 col-sm-12">';

		//require('mysqli_connect.php');
			$q2 = "SELECT  message_body AS ms , DATE_FORMAT(message_datetime, '%H:%i:%S %m-%d-%Y ')AS dt FROM haome ORDER BY message_datetime DESC;
		";
			$r2 = @mysqli_query ($dbc, $q2);
			$num = mysqli_num_rows($r2);
			if ( $num > 0 ) {
				echo '<div>';
		        while ($row2 = mysqli_fetch_array($r2, MYSQLI_ASSOC)) { 
			        echo '<h4>' . $row2 ['ms'] .'</h4>';
			        echo '<p>' . $row2 ['dt'] . '</p>';
			        echo '<hr />';
		        } 
		        echo '</div>';

		    } else {
		        echo "<p> none </p>";
		    } 
			mysqli_close($dbc); 
		?>
	</div>
</div>
<?php
  include ('includes/footer.html');
?>