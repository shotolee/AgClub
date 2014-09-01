<!doctype html>
<html>
<head lang="zh-cn">
	<meta charset="UTF-8">
	<title>风险控制计算器</title>
</head>
<body>


<?php #股票计算器

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	if (isset($_POST['total_cash'], $_POST['v_price'], $_POST['buying_rate'], $_POST['stop_rate']) && 
		is_numeric($_POST['total_cash']) && is_numeric($_POST['v_price']) && is_numeric($_POST['buying_rate']) &&is_numeric($_POST['stop_rate'])) {

		//计算具体值
		$buy_cash = $_POST['buying_rate'];
		$r = $buy_cash - $_POST['stop_rate'];
		$r_cash = $_POST['total_cash'] * $_POST['v_price'];
		$numbers = $r_cash / $r;
		$R3_cash = $buy_cash + $r * 3;
		$R3_cash_limit = $buy_cash + $r * 3 * 0.7;
		$R4_cash = $buy_cash + $r * 4;
		$R4_cash_limit = $buy_cash + $r * 4 * 0.75;
		$R5_cash = $buy_cash + $r * 5;
		$R5_cash_limit = $buy_cash + $r * 5 * 0.8;
		$R6_cash = $buy_cash + $r * 6;
		$R6_cash_limit = $buy_cash + $r * 6 * 0.8;

		echo '<h2> 1R＝￥'.$r.'</h2>';
		echo '<h2> 在风险系统'.$_POST['v_price'].'下，可以买入:<b>'.number_format($numbers).'</b></h2>';
		echo '<h4> 3R利润位 ＝ ￥'.$R3_cash.'; 止损价：'.$R3_cash_limit.'<h4>';
		echo '<h4> 4R利润位 ＝ ￥'.$R4_cash.'; 止损价：'.$R4_cash_limit.'<h4>';
		echo '<h4> 5R利润位 ＝ ￥'.$R5_cash.'; 止损价：'.$R5_cash_limit.'<h4>';
		echo '<h4> 6R及以上利润位 ＝ ￥'.$R6_cash.'; 止损价：'.$R6_cash_limit.'<h4>';
	}else{
		echo '<h2> Error! </h2>';
	}
}

?>
-----------------------------
<h3> 风险控制计算 </h3>
<form action="" method="post">
	<p>总资本：<input type="text" name="total_cash" value="<?php if (isset($_POST['total_cash'])) echo $_POST['total_cash']; ?>" /></p>
	<p>风险系数:
		<span class="input">
			<input type="radio" name="v_price" value="0.005" <?php if (isset($_POST[v_price]) && ($_POST['v_price'] == '0.005')) echo 'checked="checked" '; ?> /> 0.5%
			<input type="radio" name="v_price" value="0.010" <?php if (isset($_POST[v_price]) && ($_POST['v_price'] == '0.010')) echo 'checked="checked" '; ?> /> 1.0%
			<input type="radio" name="v_price" value="0.015" <?php if (isset($_POST[v_price]) && ($_POST['v_price'] == '0.015')) echo 'checked="checked" '; ?> /> 1.5%
			<input type="radio" name="v_price" value="0.020" <?php if (isset($_POST[v_price]) && ($_POST['v_price'] == '0.020')) echo 'checked="checked" '; ?> /> 2.0%
		</span>
	</p>
	<p>买入价位：<input type="text" name="buying_rate" value="<?php if (isset($_POST['buying_rate'])) echo $_POST['buying_rate']; ?>" /></p>
	<p>止损价位：<input type="text" name="stop_rate" value="<?php if (isset($_POST['stop_rate'])) echo $_POST['stop_rate']; ?>" /></p>
	<p><input type="submit" name="submit" value="OK" /></p>
</form>	


</body>

</html>