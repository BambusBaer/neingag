<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');

	$tmp = null;

	// load comments from database
	$sql = "SELECT * FROM comments WHERE imageID=".$image['imageId']."";
	foreach( $pdo->query($sql) as $row)
		$tmp[] = $row['comment'];


	if(isset($tmp)){
		//load the commentator
		$sql = "SELECT * FROM users WHERE id = ".$row['userID'].""; 
		$nick = $pdo->query($sql)->fetch();

		foreach( $tmp as $comment)
			echo '<div class="singleComment"><b>'.$nick['nickname'].":</b> ".$comment.'</div><br/>';
	}else
		echo "Noch sind keine Kommentare vorhanden. Sei der Erste!";
		

		
		
	

?>