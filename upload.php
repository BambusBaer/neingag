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
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="datei"><br>
			<input type="submit" value="Hochladen">
		</form>
	</article>
		<?php
			$newImage['userName'] = $_SESSION['userid'];
			$newImage['userImagenumber'] = 1;
			$newImage['boringCounter'] = 0;
			$upload_folder = 'users/'.$newImage['userName'].'/'; //Das Upload-Verzeichnis
			
			if(!isset($_FILES['datei']))
				die("Keine Datei ausgewählt");
			
			$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));
			$newImage['datatype'] = $extension;
										
			//Check IMG Type
			$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
			if(!in_array($extension, $allowed_extensions)) {
				die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
			}
				
			//Check IMG size
			$max_size = 500*1024; //500 KB
			if($_FILES['datei']['size'] > $max_size) {
				die("Bitte keine Dateien größer 500kb hochladen");
			}
				
			//Check IMG
			if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
				$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
				$detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
				if(!in_array($detected_type, $allowed_types)) {
					die("Nur der Upload von Bilddateien ist gestattet");
				}
			}
			
			// cehck if we're trying to upload a new profile picture or a new normal picture 
			if(isset($_GET['profPic']))
				$isProfPic = true;
			else $isProfPic = false;
			
			if($isProfPic)
				$newImage['userImagenumber'] = 0;
			else {
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
			}
			
			$newPath = $upload_folder.$newImage['userName'].'_'.$newImage['userImagenumber'].'.'.$extension; 
			
			//Move IMG to Userfolder
			move_uploaded_file($_FILES['datei']['tmp_name'], $newPath);
			
			if($isProfPic){
				$statement = $pdo->prepare("UPDATE users SET profilePic = ? WHERE nickname = ?");
				$statement->execute(array($newImage['userName'].'_0.'.$extension, $_SESSION['userid']));
			} else {
				$statement = $pdo->prepare("INSERT INTO images (userName, userImagenumber, datatype, boringCounter) VALUES (:userName, :userImagenumber, :datatype, :boringCounter)");
				$result = $statement->execute($newImage); 
			}
			
			echo 'Bild erfolgreich hochgeladen: <a href="users">'.$newPath.'</a>';
		?>
	</body>
</html>
