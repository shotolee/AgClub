<?php 

$page_title = 'Haome&Leitu'; //页面标题
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
		//输入message页面
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
	     //输入message页面完成
		 echo '</div>';
		 echo '<div class="col-md-8 col-sm-12">';

		 //分页显示

		 $display = 25; //每页显示25条
		 if (isset($_GET['p']) && is_numeric($_GET['p'])) {
		 	$pages = $_GET['p'];
		 } else {
		 	$q2 = "SELECT COUNT(message_id) FROM haome";
		 	
			$r2 = @mysqli_query ($dbc, $q2);
			//$num = mysqli_num_rows($r2);
			$row = @mysqli_fetch_array ($r2, MYSQLI_NUM);
			$records = $row[0];

			if ($records > $display) {
				$pages = ceil ($records/$display);
			} else {
				$pages = 1;
			}
		 }

		 if (isset($_GET['s']) && is_numeric($_GET['s'])) {
		 	$start = $_GET['s'];
		 } else {
		 	$start = 0;
		 }

		 $q2 = "SELECT  message_body AS ms , DATE_FORMAT(message_datetime, '%H:%i:%S %m-%d-%Y ')AS dt FROM haome ORDER BY message_datetime DESC LIMIT $start, $display";
		 $r2 = @mysqli_query ($dbc, $q2);

		 echo '<div>';
		 while ($row = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
			echo '<h4>' . $row ['ms'] .'</h4>';
			echo '<p>' . $row ['dt'] . '</p>';
			echo '<hr />';
		 } 
		 echo '</div>';

		 mysqli_free_result ($r2);
 		 mysqli_close($dbc);

 		 if ($pages >1) {
 				echo '<br /><p>';
 				$current_page = ($start/$display) + 1;

 				if ($current_page != 1) {
 					echo '<a href="index.php?s='. ($start - $display). '&p=' . $pages .'">Previous</a>
 					';
 				}

 				for ($i = 1; $i <= $pages; $i++) {
 					if ($i != $current_page){
 						echo '<a href="index.php?s=' .(($display*($i -1))).'&p=' .$pages. '">' . $i .' </a>';
 					} else {
 						echo $i .' ';
 					}
 				}

 				if ($current_page != $pages) {
 					echo '<a href="index.php?s='.($start + $display). '&p=' .$pages . '">Next</a>';
 				}
 			}
		?>
	</div>
</div>
<?php
  include ('includes/footer.html');
?>