<?php
	$pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
	session_start(); 
	
	if(isset($_POST)){
		$comment = $_POST['text'];	
		
		$sql = "SELECT * FROM users WHERE nickname = '$_SESSION[userid]'"; 
		$userID = $pdo->query($sql)->fetch();  
		
		$statement = $pdo->prepare("INSERT INTO comments (imageID, userID, comment) VALUES (?, ?, ?)");
		$result = $statement->execute(array($_GET['imgID'], $userID['id'], $comment)); 
	}
	header('Location:'.$_SERVER['HTTP_REFERER']);
?>