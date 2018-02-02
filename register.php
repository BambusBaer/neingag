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

			
			//check email 
			if(!filter_var($newUser['email'], FILTER_VALIDATE_EMAIL)){
				echo("Die E-Mail Adresse ist leider ungültig"); 
				$check = true; 
			}

			//check passwordterms
			if(strlen($newUser['password']) < 1 /*|| strpos($newUser['password'], '[A-Z]')===false 
			|| strpos($newUser['password'], '[0-9]') === false*/){
				echo("Das Passwort muss mindestens 8 Zeichen enthalten!");
				$check = true; 
			}

			//compare password1 & password2
			if($newUser['password'] != $password2){
				echo ("Die Passwörter stimmen leider nicht überein.");
				$check = true; 
			}
			
			//Check, if email address/nickname is been taken
			if(!$check) { 
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
			}
				
			//it´s alright
			if(!$check) { 
				
				$newUser['password'] = password_hash($newUser['password'], PASSWORD_DEFAULT);
				
				//write in database
				$statement = $pdo->prepare("INSERT INTO users (nickname, email, password) VALUES (:nickname, :email, :password)");
				$result = $statement->execute($newUser); 

				if($result) { 
					echo 'Du wurdest erfolgreich registriert.';
					
					//create individual folder
					mkdir('users/'.$newUser['nickname']);					
				} else {
					echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
				}

			header('Location:'.$_SERVER['HTTP_REFERER']);
			}
		}
	?>