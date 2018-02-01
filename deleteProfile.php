<?php
	session_start(); 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
	if(isset($_SESSION['userid'])){
		$statement = $pdo->prepare("DELETE FROM users WHERE nickname = ?");
		$statement->execute(array($_SESSION['userid']));
		$statement = $pdo->prepare("DELETE FROM images WHERE userName = ?");
		$statement->execute(array($_SESSION['userid']));
	}
	
	header('Location:logout.php');
?>