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

				$sql = "SELECT * FROM images WHERE userName = '$_SESSION[userid]' AND profilPic = '1'";
				$profilePic = $pdo->query($sql)->fetch(); 

				//user has a profile pic
				if($profilePic['profilPic'] == true)
					echo '<section>'.'<img src="users/'.$profilePic['userName'].'/'.$profilePic['userName'].'_'.$profilePic['userImagenumber'].'.'.$profilePic['datatype'].'"width="100%">'.'</section>';	
				
				//default profile pic
				else 
					echo '<section class="profilePic_profil">'.'<img src="users/noPic.jpg" width="20%">'.'</section>';
			
			?>
		
				<!--add profile Pic-->
				<form method="post" action="upload.php?valueOfProfilPic=1" enctype="multipart/form-data" >
					<input type="file" name="datei" id="profil" class="addButton"/>
					<label for="profil">+ neues Profilbild</label>
					<input type="submit" value="Hochladen">
				</form>
			</section>

			<!--user informations-->
			<section class="userInformations">
				<p>Vorname: </p>
				<p>Nachname: </p>				
				<p>Alter: </p>
			</section>

			<!--Show images from logged user-->
			<section class="container_Profile">
				<?php 
					$sort = 3; 
					include 'content.php'
				?>
			</section>
		</article>
	</body>
</html>