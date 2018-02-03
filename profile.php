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
	?>
	
		<article class="profileContainer">
			<section class="profilePic_profil">
			<?php
				$sql = "SELECT * FROM users WHERE nickname = '$_SESSION[userid]'";
				$profilePic = $pdo->query($sql)->fetch(); 

				//user has a profile pic
				if($profilePic['profilePic']){
					echo '<section>'.'<label for="upProfile"><img class="fakeLbl" src="users/'.$profilePic['nickname'].'/'.$profilePic['profilePic'].'"width="100%"></label>'.'</section>';	
				}
				//default profile pic
				else 
					echo '<label for="upProfile"><section>'.'<img src="images/noPic.png" width="100%">'.'</section></label>';
			?>
		
				<!--add profile Pic-->
				<button class="upBtn" id="upProfile" onclick="document.getElementById('uploadProf').style.display='block'">Upload</button>
				</section>

					

			<!--user informations-->			
			<section class="userInformations">
				<form action="submitUserInformation.php" method="post"><br>
					Vorname:<br>
					<input type="text" name="firstName" value="<?php echo $profilePic['firstName'];?>"><br>
					Nachname:<br>
					<input type="text" name="lastName" value="<?php echo $profilePic['lastName'];?>"><br>
					Alter:<br>
					<input style="padding: 5px;" type="number" min="0" max="100" name="age" value="<?php echo $profilePic['age'];?>"><br>
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


<!-- The Modal -->
<div id="uploadProf" class="modal">
			<span onclick="document.getElementById('uploadProf').style.display='none'"
			class="close" >&times;</span>

			<!-- Modal Content -->
			<form class="modal-upload animate" method="post" enctype="multipart/form-data" action="upload.php?profPic=1">
				<h1 class="formTitle"> Upload </h1>

				<div class="loginContainer" >
					<label for="loadImgProf"><img src="images/addImg.png" class="labelImg" width="100%"></label>
					<input class="addButton" id="loadImgProf" type="file" name="datei"><br>
				
				</div>

				<div class="loginContainer" ><input type="submit" value="Hochladen" class="formSubmit">
					<button type="button" onclick="document.getElementById('uploadProf').style.display='none'" class="cancelbtn">Cancel</button>
				</div>
			</form>
		</div> 