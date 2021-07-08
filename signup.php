<?php
	require 'database.php';

	$message = '';

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$sql = "INSERT INTO usuario (email,password) VALUES (:email, :password)";
		$stmt = $conn->prepare($sql); 
		$stmt->bindParam (':email',$_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$stmt->bindParam (':password',$password);
		if ($stmt->execute()) {
			$message = 'Creado exitosamente nuevo usuario';
		} else {
			$message = 'Lo siento...Ha ocurrido un error';
		}
	}

?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="ulf-8">
			<title>Signup</title>
			<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
		</head>
		<body>
			<?php require 'partials/header.php';?>

			<?php if(!empty($message)): ?>
			<p><?=$message?></p>
		<?php endif;?>
			<h1>Signup</h1>
			<span>or <a href="login.php">Login</a> </span>
			<form action="signup.php" method="post"> 
				<input type="text" name="email" placeholder="escriba su correo">
				<input type="password" name="password" placeholder="escriba su password">
				<input type="password" name="confirm_password" placeholder="confirme su password">
				<input type="submit" value="Enviar">
			</form>
		</body>
</html>