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
	
	if (isset($_GET['login'])){
		$email = $_POST['email']; 
		$loginPassword = $_POST['loginPassword'];
		
		$sql = "SELECT * FROM users WHERE email = '$email' OR nickname = '$email'";
		$user = $pdo->query($sql)->fetch(); 
			
		//check password
		if (isset($user) && password_verify($loginPassword, $user['password'])) {
			$_SESSION['userid'] = $user['nickname'];
			header('Location:'.$_SERVER['HTTP_REFERER']);
		} else {
			//format Ausgaben
			echo '<div style="margin: 5% auto 0 auto; text-align: center; display: block; width: 600px; background-color: rgb(219, 219, 219); border-left: 1px solid rgb(179, 178, 178); border-right: 1px solid rgb(179, 178, 178);"><p style="background-color: black; padding: 2px; margin-bottom: 20px"/><p style="text-align: center;">E-Mail oder Passwort ungültig!</p><br/><p style="background-color: black; padding: 2px;"/></div>';
			header('Refresh: 3; URL=index.php');
		}
	}
?>
</body>
</html>