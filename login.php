<?php
    session_start(); 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
	
	if (isset($_GET['login'])){
		$email = $_POST['email']; 
		$loginPassword = $_POST['loginPassword'];
		
		$sql = "SELECT * FROM users WHERE email = '$email' OR nickname = '$email'";
		$user = $pdo->query($sql)->fetch(); 
			
		//check password
		if (isset($user) && password_verify($loginPassword, $user['password'])) {
			$_SESSION['userid'] = $user['nickname'];
			//format Ausgaben
			echo '<div style="border: 1px solid black; margin-left: auto; margin-right: auto; width: 400px;">Login erfolgreich<br></div>'; //aufhübschen bitte
			header('Refresh: 3; URL=index.php');
		} else {
			//format Ausgaben
			echo '<div style="border: 1px solid black; margin-left: auto; margin-right: auto; width: 400px;">E-Mail oder Passwort ungültig<br></div>'; //aufhübschen bitte
			header('Refresh: 3; URL=index.php');
		}
	}
?>