<?php
    session_start(); 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8" >
		<title>neingag</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css"/>
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
	?>
	
		<article>
			<section class="profilePic_profil">
			<?php
				$sql = "SELECT * FROM users WHERE nickname = '$_SESSION[userid]'";
				$profilePic = $pdo->query($sql)->fetch(); 

				//user has a profile pic
				if($profilePic['profilePic'])
					echo '<section>'.'<img src="users/'.$profilePic['nickname'].'/'.$profilePic['profilePic'].'"width="100%">'.'</section>';	
				
				//default profile pic
				else 
					echo '<section class="profilePic_profil">'.'<img src="users/noPic.jpg" width="20%">'.'</section>';
			?>
		
				<!--add profile Pic-->
				<a href="upload.php?profPic=1">+ neues Profilbild</a>
			</section>

			<!--user informations-->			
			<section class="userInformations">
				<form action="submitUserInformation.php" method="post"><br>
					Vorname:<br>
					<input type="text" name="firstName" value="<?php echo $profilePic['firstName'];?>"><br>
					Nachname:<br>
					<input type="text" name="lastName" value="<?php echo $profilePic['lastName'];?>"><br>
					Alter:<br>
					<input type="number" min="0" max="100" name="age" value="<?php echo $profilePic['age'];?>"><br>
					<input type="submit" value="Profil ändern">
				</form>
				<form action="deleteProfile.php" method="post"><br>
					<label><input type="checkbox" required name="confirmDelete">Zum Löschen des Profils bitte checkbox bestätigen und dann Button Klicken. Achtung nicht wiederherstellbar!</label>
					<input type="submit" value="Jetzt Löschen">
				</form>
			</section>
		</article>
	</body>
</html>
