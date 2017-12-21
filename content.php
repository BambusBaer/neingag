<article>
	<section>
		<?php

		// Get the first imageId
		$sql = "SELECT * FROM images ORDER BY imageId";
		$firstId = $pdo->query($sql)->fetch(); 
		echo '<br/>erste id:'.$firstId['imageId'].'<br/>'; 

		// Get the last imageId
		$sql = "SELECT * FROM images ORDER BY imageId DESC";
		$lastId = $pdo->query($sql)->fetch(); 
		echo 'letzte id:'.$lastId['imageId']; 
		
		// Create random number, which will choose the img
		$rand = mt_rand($firstId['imageId'], $lastId['imageId']);
		echo '<br/>random number:'.$rand.'<br/>';  

		// Check if rand nr is from logged user
		$sql = "SELECT * FROM images WHERE imageId = $rand"; 
		$user = $pdo->query($sql)->fetch(); 
		echo 'User:'.$user['userName'].'<br/>'; 
		echo '<img src="users/'.$user['userName'].'/'.$user['userName'].'_'.$user['userImagenumber'].'.jpg">';  
		?>
	</section>
</article>