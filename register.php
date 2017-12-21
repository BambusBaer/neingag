<?php
    session_start(); 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>neingag</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
	<header>
		<?php
		include('menu.php');
		?>
	</header>	
	<?php
	include('menu3.php');	
	include('footer.php');
	?>
		
	<!--Registrieren-->
	<div id="register">
		<form method="post" action="?register=1">
			<p><label for="formNickname">Nickname: </label><input type="text" name="formNickname"></p>
			<p><label for="formMail">E-Mail: </label><input type="email" name="formMail" minlength="1"></p>
			<p><label for="formPassword">Passwort: </label><input type="password" name="formPassword"></p>
			<p><label for="formPassword2">Passwort: </label><input type="password" name="formPassword2"></p>
			<input type="submit" value="Senden">
		</form>
	</div>

	<?php
		if (isset($_GET['register'])){
			$newUser = array();

			/*check if database empty
			$result = $pdo->query("SELECT * FROM users"); 
			$numRows = $result->rowCount(); 
			if($numRows == ""){
				echo "leer"; 
				$newUser['id'] = '0'; 
			}*/

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
			if(strlen($newUser['password']) < 1 /*|| strpos($newUser['password'], '[A-Z]')===false || strpos($newUser['password'], '[0-9]') === false*/){
				echo("Das Passwort muss mindestens 8 Zeichen enthalten!");
				$check = true; 
			}

			//compare password1 & password2
			if($newUser['password'] != $password2){
				echo ("Die Passwörter stimmen leider nicht überein.");
				$check = true; 
			}
			
			//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
			if(!$check) { 
				$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
				$result = $statement->execute(array('email'=>$newUser['email']));
				$user = $statement->fetch();
				
				if($user !== false) {
					echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
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
					mkdir('users/'.$newUser['nickname'].'#'.$pdo->lastInsertId());					
				} else {
					echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
				}

				header('location: index.php');
			}
		}
	?>

</body>
</html>