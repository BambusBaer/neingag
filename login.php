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
	
	<!--Login-->
	<div id="login">
		<form method="post" action="?login=1">
			<p><label for="email">E-Mail: </label><input type="email" name="email"></p>
			<p><label for="loginPassword">Passwort: </label><input type="password" name="loginPassword"></p>
			<input type="submit" value="Anmelden">
		</form>
	</div>

	<?php
		if (isset($_GET['login'])){
			$email = $_POST['email']; 
			$loginPassword = $_POST['loginPassword'];
			
			$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
			$result = $statement->execute(array('email' => $email));
			$user = $statement->fetch();
				
			//check password
			if ($user !== false && password_verify($loginPassword, $user['password'])) {
				$_SESSION['userid'] = $user['nickname'].$user['id'];
				echo('Login erfolgreich.');
				echo("{$_SESSION['userid']}"."<br />"); // reine testausgabe
				
				header('location: index.php');
			} else {
				$errorMessage = "E-Mail oder Passwort war ungültig<br>";
			}
		}
	?>
	</body>
</html>