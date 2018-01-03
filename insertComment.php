<?php
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
	
	if(isset($_POST)){
		$comment = $_POST['text'];		
		
		$statement = $pdo->prepare("INSERT INTO comments (imageID, comment) VALUES (?, ?)");
		$result = $statement->execute(array($_GET['imgID'], $comment)); 
	}
	header('Location:'.$_SERVER['HTTP_REFERER']);
?>