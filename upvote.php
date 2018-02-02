<?php
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
	
	$sql = "SELECT * FROM images WHERE imageId = $_GET[imgID]"; 
	$image = $pdo->query($sql)->fetch();
	
	$count = $image['boringCounter'];
	$count++;
	
	$statement = $pdo->prepare("UPDATE images SET boringCounter = ? WHERE imageId = ?");
	$statement->execute(array($count, $_GET['imgID']));
	
	header('Location:'.$_SERVER['HTTP_REFERER']);
?>