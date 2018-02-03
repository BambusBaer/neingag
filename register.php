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
		<link rel="icon" type="image/png" href="images/logo.png">
	</head>
	<body>
	<header>	
		<!-- check if the user is logged in, then display either menu with login/register or logout/profile/upload -->
		<?php
		if(!isset($_SESSION['userid']))
			include('menu.php');
		else 
			include('menu2.php');
		?>
	</header>
	<?php
	include('menu3.php');
	include('footer.php');
	if (isset($_GET['register'])){
		$newUser = array();
		//save data from formular in newUser
		$check = false; 
		$newUser['nickname']= $_POST['formNickname'];
		$newUser['email']= $_POST['formMail'];
		$newUser['password']= $_POST['formPassword']; 
		$password2 = $_POST['formPassword2'];
		
		//format Ausgaben
		echo '<div style="margin: 5% auto 5% auto; text-align: center; display: block; width: 600px; background-color: rgb(219, 219, 219); border-left: 1px solid rgb(179, 178, 178); border-right: 1px solid rgb(179, 178, 178);"><p style="background-color: black; padding: 2px; margin-bottom: 20px; "/>';
		
		//check email 
		if(!filter_var($newUser['email'], FILTER_VALIDATE_EMAIL)){
			echo '<p style="text-align: center;">Die E-Mail-Adresse ist ungültig!</p>';
			$check = true; 
		}
		//check passwordterms
		if(strlen($newUser['password']) < 1 /*|| strpos($newUser['password'], '[A-Z]')===false || strpos($newUser['password'], '[0-9]') === false*/){
			echo '<p style="text-align: center;">Das Passwort entspricht leider nicht den Vorgaben!</p>';
			$check = true; 
		}
		//compare password1 & password2
		if($newUser['password'] != $password2){
			echo '<p style="text-align: center;">Die Passwörter stimmen leider nicht überein!</p>';
			$check = true; 
		}
			
		//Check, if email address/nickname is already taken
		$sql = "SELECT * FROM users WHERE email = '$newUser[email]' OR nickname = '$newUser[nickname]'";
		$user = $pdo->query($sql)->fetch(); 
				
		if($user['email'] == $newUser['email']) {
			echo '<p style="text-align: center;">Die E-Mail-Adresse ist bereits vergeben!</p>';
			$check = true;
		}		
		if($user['nickname'] == $newUser['nickname']){
			echo '<p style="text-align: center;">Der Nickname ist bereits vergeben!</p>';
			$check = true;
		}
				
		//it´s alright
		if(!$check) { 
			$newUser['password'] = password_hash($newUser['password'], PASSWORD_DEFAULT);
			//write in database
			$statement = $pdo->prepare("INSERT INTO users (nickname, email, password) VALUES (:nickname, :email, :password)");
			$result = $statement->execute($newUser); 
			if($result) { 
				echo '<p style="text-align: center; ">Du wurdest erfolgreich registriert!</p>';
				header('Refresh: 2; URL=index.php');
				//create individual folder
				if(!file_exists('users/'.$newUser['nickname']))
					mkdir('users/'.$newUser['nickname']);					
			} else {
				echo '<p style="text-align: center;">Beim Registrieren ist ein Fehler aufgetreten!</p>';
				header('Refresh: 3; URL=index.php');
			}
		} else 
			header('Refresh: 3; URL=index.php');
		echo '<p style="background-color: black; padding: 2px; margin-top: 20px;"/></div>';
	}
?>
</body>
</html>