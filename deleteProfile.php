<?php
	session_start(); 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
	
	if(isset($_SESSION['userid'])){
		
		// delete user from database
		$statement = $pdo->prepare("DELETE FROM users WHERE nickname = ?");
		$delUser = $statement->execute(array($_SESSION['userid']));
		// delete images from database
		$statement = $pdo->prepare("DELETE FROM images WHERE userName = ?");
		$delImages = $statement->execute(array($_SESSION['userid']));
		
		if($delUser && $delImages){
			
			if(!file_exists('users/archived/'))
				mkdir('users/archived/');
			
			if(file_exists('users/archived/'.$_SESSION['userid']))
				rrmdir('users/archived/'.$_SESSION['userid']);
			rename('users/'.$_SESSION['userid'], 'users/archived/'.$_SESSION['userid']);
			
			//format Ausgaben
			echo '<div style="border: 1px solid black; margin-left: auto; margin-right: auto; width: 400px;">Profil wurde erfolgreich gelöscht<br></div>'; //aufhübschen bitte
			header('Refresh: 3; URL=logout.php');
		} else{
			//format Ausgaben
			echo '<div style="border: 1px solid black; margin-left: auto; margin-right: auto; width: 400px;">Fehler!<br></div>'; //aufhübschen bitte
			header('Refresh: 3; URL=profile.php');
		}
	} else
		header('Location: profile.php');	
?>

<?php
// function for recursively deleting directories, found on http://www.php.net/rmdir
function rrmdir($src) {
    $dir = opendir($src);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            $full = $src . '/' . $file;
            if ( is_dir($full) ) {
                rrmdir($full);
            }
            else {
                unlink($full);
            }
        }
    }
    closedir($dir);
    rmdir($src);
}

?>