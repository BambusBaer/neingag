<?php 

    session_start(); 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
	
	if(isset($_POST['firstName']) && !empty($_POST['firstName']))
		if(isset($_POST['lastName']) && !empty($_POST['lastName']))
			if(isset($_POST['age']) && !empty($_POST['age'])){
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$age = $_POST['age'];
				$statement = $pdo->prepare("UPDATE users SET firstName = ?, lastName = ?, age = ? WHERE nickname = ?");
				$statement->execute(array($firstName, $lastName, $age, $_SESSION['userid']));
			}
	
	header('Location:'.$_SERVER['HTTP_REFERER']);

?>