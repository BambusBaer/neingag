<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
	
	$id = $image['imageId'];

	$tmp = null;
	
	// load comments from database
	$sql = "SELECT * FROM comments WHERE imageID=".$id."";
	foreach( $pdo->query($sql) as $row)
		$tmp[] = $row['comment'];
	
	if(isset($tmp))
		foreach( $tmp as $comment)
			echo "Kommentar: ".$comment."<br/>";

?>