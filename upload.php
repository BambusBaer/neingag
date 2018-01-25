<?php
	$pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
	session_start();

	$newImage['userName'] = $_SESSION['userid'];
	$newImage['userImagenumber'] = 1;
	$newImage['boringCounter'] = 1; 
	$newImage['profilPic'] = $_GET['valueOfProfilPic'];


	$upload_folder = 'users/'.$newImage['userName'].'/'; //Das Upload-Verzeichnis
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
		
	//Individual IMG ID increment
	$sql = "SELECT * FROM images WHERE userName='$newImage[userName]' ORDER BY userImagenumber DESC";
	$lastImagenumber = $pdo->query($sql)->fetch(); 

	if(empty($lastImagenumber['userImagenumber'])){
		$newImage['userImagenumber'] = 1; 
	}else {
		$lastImagenumber['userImagenumber']++;
		$newImage['userImagenumber'] = $lastImagenumber['userImagenumber']; 
	}

	$newPath = $upload_folder.$newImage['userName'].'_'.$newImage['userImagenumber'].'.'.$extension; 

	//Move IMG to Userfolder
	move_uploaded_file($_FILES['datei']['tmp_name'], $newPath);
	$statement = $pdo->prepare("INSERT INTO images (userName, userImagenumber, datatype, boringCounter, profilPic) VALUES (:userName, :userImagenumber, :datatype, :boringCounter, :profilPic)");
	$result = $statement->execute($newImage); 
	chmod($newPath, 0640);

	$sql = "SELECT * FROM images WHERE userName = '$_SESSION[userid]' ORDER BY profilPic DESC";
			
	foreach($pdo->query($sql) as $row){

		//user has a profilpic
		if($row['profilPic'] == true){
			
			//change the value of profilPics, which shouldn´t be profilPics anymore 
			$statement = $pdo->prepare("UPDATE images SET profilPic = :profilPic WHERE userName = '$_SESSION[userid]' and imageId<".$row['imageId']."");		
			$statement->execute(array('profilPic' => 0));
		}
	}

	header('Location:'.$_SERVER['HTTP_REFERER']);
	echo 'Bild erfolgreich hochgeladen: <a href="users">'.$newPath.'</a>';

?>
