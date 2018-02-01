<?php
    session_start(); 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');



	if (isset($_GET['login'])){
		$email = $_POST['email']; 
		$loginPassword = $_POST['loginPassword'];
		
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();
			
		//check password
		if (isset($user) && password_verify($loginPassword, $user['password'])) {
			$_SESSION['userid'] = $user['nickname'];
			echo('Login erfolgreich.');				
			header('location: index.php');
		} else {
			$errorMessage = "E-Mail oder Passwort war ungültig<br>";
		}
	}
?>