<?php
	$pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
	session_start(); 
		
	if(isset($_POST['text']) && !empty($_POST['text'])){
		$comment = $_POST['text'];	
		
		$sql = "SELECT * FROM users WHERE nickname = '$_SESSION[userid]'"; 
		$userID = $pdo->query($sql)->fetch();  
		
		$statement = $pdo->prepare("INSERT INTO comments (imageID, nickname, comment) VALUES (?, ?, ?)");
		$result = $statement->execute(array($_GET['imgID'], $userID['nickname'], $comment)); 
	}
	header('Location:'.$_SERVER['HTTP_REFERER']);
		
?>