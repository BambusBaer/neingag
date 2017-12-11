<?php
    session_start(); 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
?>

<html>
<head>
<title>Exchangagram</title>
	<link href="./css/style.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="./js/registrateWindow.js"></script>
</head>


<body>
<header>
<img src="./upload/me.jpg" id="logo">
<img src="./upload/me.jpg" id="profile">
<img src="./images/addButton.png" class="addImages">

<!--Registrieren-->
<button>Registrieren</button>
<h2>Registration</h2> 
<form method="post" action="?register=1">
    <label for="formNickname">Nickname: </label><input type="text" name="formNickname">
    <label for="formMail">E-Mail Adresse: </label><input type="email" name="formMail" minlength="1">
    <label for="formPassword">Passwort: </label><input type="password" name="formPassword">
    <label for="formPassword2">Passwort wiederholen: </label><input type="password" name="formPassword2"><br>
    <input type="submit" value="Senden">
</form>

<?php
    if (isset($_GET['register'])){
        $newUser = array();

        /*check if database empty
        $result = $pdo->query("SELECT * FROM users"); 
        $numRows = $result->rowCount(); 
        if($numRows == ""){
            echo "leer"; 
            $newUser['id'] = '0'; 
        }*/

        //save data from formular in newUser
        $check = false; 
        $newUser['nickname']= $_POST['formNickname'];
        $newUser['email']= $_POST['formMail'];
        $newUser['password']= $_POST['formPassword']; 
        $password2 = $_POST['formPassword2'];

        
        //check email 
        if(!filter_var($newUser['email'], FILTER_VALIDATE_EMAIL)){
            echo("Die E-Mail Adresse ist leider ungültig"); 
            $check = true; 
        }

        //check passwordterms
        if(strlen($newUser['password']) < 8 /*|| strpos($newUser['password'], '[A-Z]')===false || strpos($newUser['password'], '[0-9]') === false*/){
            echo("Das Passwort erfüllt leider nicht unseren Bedingungen!");
            $check = true; 
        }

        //compare password1 & password2
        if($newUser['password'] != $password2){
            echo ("Die Passwörter stimmen leider nicht überein.");
            $check = true; 
        }
        
        //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
        if(!$check) { 
            $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $result = $statement->execute(array('email'=>$newUser['email']));
            $user = $statement->fetch();
            
            if($user !== false) {
                echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
                $check = true;
            } 
        }
            
        //it´s alright
        if(!$check) { 
            
			$newUser['password'] = password_hash($newUser['password'], PASSWORD_DEFAULT);
			
            //write in database
            $statement = $pdo->prepare("INSERT INTO users (nickname, email, password) VALUES (:nickname, :email, :password)");
            $result = $statement->execute($newUser); 

            if($result) { 
                echo 'Du wurdest erfolgreich registriert.';
            } else {
                echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
            }

            //create individual folder
            mkdir('users/'.$newUser['nickname'].'#'.$pdo->lastInsertId());
        }
    }
?>

<!--Login-->
<div id="login">
<form method="post" action="?login=1">
    <label for="loginMail">E-Mail: </label><input type="email" name="loginMail"><br>
    <label for="loginPassword">Passwort: </label><input type="password" name="loginPassword"><br>
    <input type="submit" value="Anmelden">
</form>
</div>

<?php
    if (isset($_GET['login'])){
        $loginMail = $_POST['loginMail']; 
        $loginPassword = $_POST['loginPassword'];

        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $loginMail));
        $user = $statement->fetch();
        
        //check password
        if ($user !== false && password_verify($loginPassword, $user['password'])) {
            $_SESSION['userid'] = $user['nickname']."#".$user['id'];
            echo('Login erfolgreich.');
        } else {
            $errorMessage = "E-Mail oder Passwort war ungültig<br>";
        }

        echo $user['nickname']."#".$user['id']."<br/>";
    }
?>

</header>

<!--Registrieren-->
<button id="open-dialog">reg</button>
<dialog role="dialog">
    <button id="close-dialog">X</button>
    <h2>Registration</h2> 
    <form method="post" action="?register=1">
        <label for="formNickname">Nickname: </label><input type="text" name="formNickname">
        <label for="formMail">E-Mail Adresse: </label><input type="email" name="formMail" minlength="1">
        <label for="formPassword">Passwort: </label><input type="password" name="formPassword">
        <label for="formPassword2">Passwort wiederholen: </label><input type="password" name="formPassword2"><br>
        <input type="submit" value="Senden">
    </form>
</dialog>

<?php
    if (isset($_GET['register'])){
        $newUser = array();

        /*check if database empty
        $result = $pdo->query("SELECT * FROM users"); 
        $numRows = $result->rowCount(); 
        if($numRows == ""){
            echo "leer"; 
            $newUser['id'] = '0'; 
        }*/

        //save data from formular in newUser
        $check = false; 
        $newUser['nickname']= $_POST['formNickname'];
        $newUser['email']= $_POST['formMail'];
        $newUser['password']= $_POST['formPassword']; 
        $password2 = $_POST['formPassword2'];

        
        //check email 
        if(!filter_var($newUser['email'], FILTER_VALIDATE_EMAIL)){
            echo("Die E-Mail Adresse ist leider ungültig"); 
            $check = true; 
        }

        //check passwordterms
        if(strlen($newUser['password']) < 8 /*|| strpos($newUser['password'], '[A-Z]')===false || strpos($newUser['password'], '[0-9]') === false*/){
            echo("Das Passwort erfüllt leider nicht unseren Bedingungen!");
            $check = true; 
        }

        //compare password1 & password2
        if($newUser['password'] != $password2){
            echo ("Die Passwörter stimmen leider nicht überein.");
            $check = true; 
        }
        
        //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
        if(!$check) { 
            $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $result = $statement->execute(array('email'=>$newUser['email']));
            $user = $statement->fetch();
            
            if($user !== false) {
                echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
                $check = true;
            } 
        }
            
        //it´s alright
        if(!$check) { 
            
            //write in database
            $statement = $pdo->prepare("INSERT INTO users (nickname, email, password) VALUES (:nickname, :email, :password)");
            $result = $statement->execute($newUser); 

            if($result) { 
                echo 'Du wurdest erfolgreich registriert.';
            } else {
                echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
            }

            //create individual folder
            mkdir('users/'.$newUser['nickname'].'#'.$pdo->lastInsertId());
        }
    }
?>

<div id="activities">
</div>

<div id="friends">
</div>

<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="image"><br>
<input type="submit" value="Hochladen">
</form>
</body>
</html>