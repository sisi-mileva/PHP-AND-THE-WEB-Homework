<?php
session_start();

$errors = [];
$num1 = '';
$num2 = '';
$sign = 'no';
$result = 0 ;
if (!empty($_POST)) {
	$sign = empty($_POST["sign"]) ? 'no' :$_POST["sign"];
	$num1 = empty($_POST["number1"]) ? '' :$_POST["number1"];
	$num2 = empty($_POST["number2"]) ? '' :$_POST["number2"];
	
	
	if (!$num1 || !$num2) {
		$errors[] = 'Number 1 and Number 2 are required';
	}
	if (!is_numeric($num1) || !is_numeric($num2)) {
		$errors[] = 'Number 1 and Number 2 must be numbers';
	}
	if ($sign == 'no'){
		$errors[] = 'Choose operation';
	}
	
	if (!$errors) {
		if ($sign == '+') {
			$result = $num1 + $num2;
		} elseif ($sign == '-') {
			$result = $num1 - $num2;
		} elseif ($sign == '*') {
			$result = $num1 * $num2;
		} elseif ($sign == '/') {
			$result = $num1 / $num2;
		} 
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Task 1</title>
<style type="text/css">
	#container {
		border: 1px solid black;
		padding: 1em;
		width: 300px;
		font-weight: bold;
		margin: 5em;
	}
	label {
		display: inline-block;
	}	
	button {
		margin-top: 1em;
	}
	.radio {
		float: left;
		margin-left: 1em; 
	}
	#radio {
		display: inline-block;
		margin-top: 1em;
		margin-bottom: 1em;
	}
	.box {
		width: 20px;
		border: 1px solid red;
		text-align: center;
	}
</style>
</head>
<body>
	<div id="container">
		<form action="" method="post">
			<div>
				<label for="">Number 1:</label>
				<input type="text" name="number1" value="<?= htmlspecialchars($num1)?>"/>
			</div>
			<div id="radio">
				<div class="radio box">
					<?= $sign ?>
				</div>
				<div class="radio">
					<label for="plus">+ </label>
					<input type="radio" name="sign" value="+" id="plus"/>
				</div>
				<div class="radio">
					<label for="minus">- </label>
					<input type="radio" name="sign" value="-" id="minus"/>
				</div>
				<div class="radio">
					<label for="multiplication">* </label>
					<input type="radio" name="sign" value="*" id="multiplication"/>
				</div>
				<div class="radio">
					<label for="partition">/ </label>
					<input type="radio" name="sign" value="/" id="partition"/>
				</div>
			</div>
			<div>
				<label for="">Number 2:</label>
				<input type="text" name="number2" value="<?= htmlspecialchars($num2)?>"/>
			</div>
			<?php foreach ($errors as $e):?>
				<p style="color:red"><?= $e ?></p>
			<?php endforeach;?>
			<p>Result:</p>
			<p><?= $result ?></p>
			<div>
				<button type="submit" >Calculate</button>
			</div>
		</form>
	</div>
</body>
</html>