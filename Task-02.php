<?php 
session_start();

$errors = [];

$name = empty($_POST["name"]) ? '' :$_POST["name"];
$password = empty($_POST["password"]) ? '' :$_POST["password"];
$rPassword = empty($_POST["rPassword"]) ? '' :$_POST["rPassword"];
if (!empty($_POST)) {
	
	if (!$name || !$password || !$rPassword) {
		$errors[] = 'User name, Password and Repeat password are required';
	} elseif (strlen($password) < 8) {
		$errors[] = 'Passward must be at least 8 characters';
	} elseif ($password != $rPassword){
		$errors[] = 'Password and Repeat password do not match.';
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Task 2</title>
<style type="text/css">
	body {
		font-family: 'Arial, Helevetica', sans-serif;
	}
	label {
		display: block;
		font-weight: bold;
		margin-top: 1em;
	}
	input {
		padding: 0.5em;
	    display: block;
	    width: 30%;
	    border-radius: 5px;
	    border: 1px solid grey;
	}	
	button {
		margin-top: 1em;
		padding: 0.5em;
	    display: block;
	    border-radius: 5px;
	}
</style>
</head>
<body>
	<div id="container">
		<?php foreach ($errors as $e):?>
			<p style="color:red"><?= $e ?></p>
		<?php endforeach;?>
		<form action="" method="post">
			<div>
				<label for="name">User name:</label>
				<input type="text" name="name" id="name" value="<?= htmlspecialchars($name)?>"/>
			</div>
			<div>
				<label for="password">Password:</label>
				<input type="text" name="password" id="password" value="<?= htmlspecialchars($password)?>"/>
			</div>
			<div>
				<label for="rPassword">Repeat passward</label>
				<input type="text" name="rPassword" id="rPassword" value="<?= htmlspecialchars($rPassword)?>"/>
			</div>
			<div>
				<button type="submit">Sign Up</button>
			</div>
			<div>
			<?php if (!$errors && $name != '' && $password != '' && $rPassword != '') :?>
				<p>Your username: <?= $name ?></p>
				<p>Your password: <?= crypt($password) ?></p>
			<?php endif;?>
		</div>
		</form>
		
	</div>
</body>
</html>