<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');

	$tmp = null;
	$tmpNicks = null;

	// load comments from database
	$sql = "SELECT * FROM comments WHERE imageID=".$image['imageId']."";
	foreach( $pdo->query($sql) as $row){
		$tmp[] = $row['comment'];
		$tmpNicks[] = $row['nickname'];
	}
	
	if(isset($tmp)){
	$cnt = 0;	
		foreach( $tmp as $comment)
			echo '<div class="singleComment"><b>'.$tmpNicks[$cnt++].":</b> ".$comment.'</div><br/>';
	}else
		echo "Noch sind keine Kommentare vorhanden. Sei der Erste!";
?>