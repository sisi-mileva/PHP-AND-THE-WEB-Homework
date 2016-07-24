<?php 

session_start();

$degrees = empty($_POST['degrees']) ? '' : $_POST['degrees'];
$convert = empty($_POST['convert']) ? '' : $_POST['convert'];
$degreesFrom = '';
$degreesTo = '';
$result = '';
$errors = [];
if (!empty($_POST)) {
	if ($degrees == 'choose') {
		$errors[] = 'Choose option to convert';
	}
 	if (!$convert) {
		$errors[] = 'Enter value';
	} elseif (!is_numeric($convert)) {
		$errors[] = 'Value must be a number';
	}

	if ($degrees == 'Celsius to Fahrenheit') {
		$degreesFrom = 'Celsius';
		$degreesTo = 'Fahrenheit';
		$result = 32 + (9/5) * $convert;
	} elseif ($degrees == 'Fahrenheit to Celsius') {
		$degreesFrom = 'Fahrenheit';
		$degreesTo = 'Celsius';
		$result = (5/9) * ($convert - 32);
	} else {
		$degreesFrom = '';
		$degreesTo = '';
		$result = '';
	}	
}	
?>
<!DOCTYPE html>
<html>
<head>
<title>Task 3</title>
<style type="text/css">
#container {
border: 1px solid black;
padding: 1em;
width: 500px;
font-weight: bold;
margin: 5em;
}

</style>
</head>
<body>
<div id="container">
	<h2>Convert:</h2>
	<form action="" method="post">
		<div>
			<select name="degrees">
				<option value="choose">--Choose--</option>
				<option value="Celsius to Fahrenheit">Celsius to Fahrenheit</option>
				<option value="Fahrenheit to Celsius">Fahrenheit to Celsius</option>
			</select>
		</div>
		<?php foreach ($errors as $e):?>
			<p style="color:red"><?= $e ?></p>
		<?php endforeach;?>
		<div>
			<p>Convert <?= $degreesFrom ?></p>
			<input type="text" name="convert" id="convert" value="<?= htmlspecialchars($convert)?>"/>
			
			
			
			<p>To <?= $degreesTo . ' :' . $result?></p>
		</div>
		<div>
			<button type="submit">Calculate</button>
		</div>
	</form>
</div>
</body>
</html>