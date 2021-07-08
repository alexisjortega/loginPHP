<?php

	session_start();

	require 'database.php';

	$message = '';

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$records = $conn->prepare('SELECT id, email, password FROM usuario WHERE email=:email'); 
		$records->bindParam (':email',$_POST['email']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
			$_SESSION['user_id']= $results['id']; 
			header('location: /projecto_alex');
		} else {
			$message = 'Lo siento, su informacion no es correcta';
		}
	}

?>
 
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
	</head>
	<body>
		<?php require 'partials/header.php';?>
		<h1>Login</h1>
		<span>or <a href="signup.php">Signup</a> </span>
		<?php if(!empty($message)): ?>
		<p><?=$message?></p>
	<?php endif;?>
		<form action="login.php" method="post"> 
			<input type="text" name="email" placeholder="escriba su correo">
			<input type="password" name="password" placeholder="escriba su password">
			<input type="submit" value="Enviar">
		</form>
	</body>
</html>