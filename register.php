<?php
    session_start(); 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');

	if (isset($_GET['register'])){
		$newUser = array();

		//save data from formular in newUser
		$check = false; 
		$newUser['nickname']= $_POST['formNickname'];
		$newUser['email']= $_POST['formMail'];
		$newUser['password']= $_POST['formPassword']; 
		$password2 = $_POST['formPassword2'];
		
		//format Ausgaben
		echo '<div style="border: 1px solid black; margin-left: auto; margin-right: auto; width: 400px;">';
		
		//check email 
		if(!filter_var($newUser['email'], FILTER_VALIDATE_EMAIL)){
			echo("Die E-Mail Adresse ist leider ungültig<br>"); 
			$check = true; 
		}

		//check passwordterms
		if(strlen($newUser['password']) < 1 /*|| strpos($newUser['password'], '[A-Z]')===false || strpos($newUser['password'], '[0-9]') === false*/){
			echo("Das Passwort entspricht nicht den Vorgaben!<br>");
			$check = true; 
		}

		//compare password1 & password2
		if($newUser['password'] != $password2){
			echo ("Die Passwörter stimmen leider nicht überein.<br>");
			$check = true; 
		}
			
		//Check, if email address/nickname is already taken
		$sql = "SELECT * FROM users WHERE email = '$newUser[email]' OR nickname = '$newUser[nickname]'";
		$user = $pdo->query($sql)->fetch(); 
				
		if($user['email'] == $newUser['email']) {
			echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
			$check = true;
		}		
		if($user['nickname'] == $newUser['nickname']){
			echo 'Dieser Nickname ist bereits vergeben<br>';
			$check = true;
		}
				
		//it´s alright
		if(!$check) { 

			$newUser['password'] = password_hash($newUser['password'], PASSWORD_DEFAULT);

			//write in database
			$statement = $pdo->prepare("INSERT INTO users (nickname, email, password) VALUES (:nickname, :email, :password)");
			$result = $statement->execute($newUser); 

			if($result) { 
				echo 'Du wurdest erfolgreich registriert.<br>';
				header('Refresh: 3; URL=index.php');

				//create individual folder
				mkdir('users/'.$newUser['nickname']);					
			} else {
				echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
				header('Refresh: 5; URL=index.php');
			}
		} else 
			header('Refresh: 5; URL=index.php');
		echo '</div>';
	}
?>

