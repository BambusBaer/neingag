﻿<?php
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
	
			$newImage['userName'] = $_SESSION['userid'];
			$newImage['userImagenumber'] = 1;
			$newImage['boringCounter'] = 0;
			$upload_folder = 'users/'.$newImage['userName'].'/'; //Das Upload-Verzeichnis
			
			//Upload Quelle https://www.php-einfach.de/php-tutorial/dateiupload/

			if(!isset($_FILES['datei']))
				die("Keine Datei ausgewählt");
			
			$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));
			$newImage['datatype'] = $extension;
										
			//Check IMG Type
			$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
			if(!in_array($extension, $allowed_extensions)) {
				
				echo '<div style="margin: 5% auto 5% auto; text-align: center; display: block; width: 600px; 
					background-color: rgb(219, 219, 219); border-left: 1px solid rgb(179, 178, 178); 
					border-right: 1px solid rgb(179, 178, 178);">
					<p style="background-color: black; padding: 2px; margin-bottom: 20px; "/>';
				echo '<p style="text-align: center;">Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt</p>';
				echo '<p style="background-color: black; padding: 2px; margin-top: 20px;"/></div>';
				header('Refresh: 1; URL=index.php');
				die();
			}
				
			//Check IMG size
			$max_size = 500*1024; //500 KB
			if($_FILES['datei']['size'] > $max_size) {
				echo '<div style="margin: 5% auto 5% auto; text-align: center; display: block; width: 600px; background-color: rgb(219, 219, 219); border-left: 1px solid rgb(179, 178, 178); border-right: 1px solid rgb(179, 178, 178);"><p style="background-color: black; padding: 2px; margin-bottom: 20px; "/>';
				echo '<p style="text-align: center;">Bitte keine Dateien größer 500kb hochladen</p>';
				echo '<p style="background-color: black; padding: 2px; margin-top: 20px;"/></div>';
				header('Refresh: 1; URL=index.php');
				die();
			}
				
			//Check IMG
			if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
				$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
				$detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
				if(!in_array($detected_type, $allowed_types)) {
					echo '<div style="margin: 5% auto 5% auto; text-align: center; display: block; width: 600px; background-color: rgb(219, 219, 219); border-left: 1px solid rgb(179, 178, 178); border-right: 1px solid rgb(179, 178, 178);"><p style="background-color: black; padding: 2px; margin-bottom: 20px; "/>';
					echo '<p style="text-align: center;">Nur der Upload von Bilddateien ist gestattet</p>';
					echo '<p style="background-color: black; padding: 2px; margin-top: 20px;"/></div>';
					header('Refresh: 1; URL=index.php');
					die();
				}
			}
			
			//Individual IMG ID increment
			$sql = "SELECT * FROM images WHERE userName='$newImage[userName]' ORDER BY userImagenumber DESC";
			$lastImagenumber = $pdo->query($sql)->fetch(); 
			echo '<br />'.$lastImagenumber['userImagenumber']; 
			if(empty($lastImagenumber['userImagenumber'])){
				$newImage['userImagenumber'] = 1; 
			}else {
				$lastImagenumber['userImagenumber']++;
				$newImage['userImagenumber'] = $lastImagenumber['userImagenumber']; 
			}
			
			
			if(isset($_GET['profPic'])){
				$statement = $pdo->prepare("UPDATE users SET profilePic = ? WHERE nickname = ?");
				$statement->execute(array($newImage['userName'].'_0.'.$extension, $_SESSION['userid']));
				$newImage['userImagenumber'] = 0; 
				header('Refresh: 1; URL=profile.php');
			} else {
				$statement = $pdo->prepare("INSERT INTO images (userName, userImagenumber, datatype, boringCounter) VALUES (:userName, :userImagenumber, :datatype, :boringCounter)");
				$result = $statement->execute($newImage); 
				header('Refresh: 1; URL=index.php');
			}
			
			$newPath = $upload_folder.$newImage['userName'].'_'.$newImage['userImagenumber'].'.'.$extension; 

			//Move IMG to Userfolder
			move_uploaded_file($_FILES['datei']['tmp_name'], $newPath);
			echo '<div style="margin: 5% auto 0 auto; text-align: center; display: block; width: 600px; background-color: rgb(219, 219, 219)"><p style="background-color: black; color: white; padding: 10px;"> Bild erfolgreich hochgeladen! </p><br/><img src='.$newPath.' style="padding: 10px; width: 30%; margin-top: 0"><br/><p style="background-color: black; color: white; padding: 10px;"/></div>';
		?>
	</body>
</html>
