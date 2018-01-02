<article>
		<?php
				
		// check for logged user
		if(isset($_SESSION['userid']))
			$loggedUser = $_SESSION['userid'];
		else $loggedUser = "";		
		
		switch ($sort) {
			case 1:
				$array = fetchImageIds("boringCounter", $loggedUser);
				break;
			case 2:
				$array = fetchImageIds("imageId DESC", $loggedUser);
				
				break;
			default:
				$array = fetchImageIds("imageId", $loggedUser);
				shuffle($array);
				break;
		}
		
		//display all images
		for($i=0; $i<count($array); $i++){
					
			// load images from database
			$sql = "SELECT * FROM images WHERE imageId = $array[$i]"; 
			$user = $pdo->query($sql)->fetch(); 
				
			// display
			echo '<section>';
			echo '<div class="images">'.'<img src="users/'.$user['userName'].'/'.$user['userName'].'_'.$user['userImagenumber'].'.'.$user['datatype'].'"width="100%">'.'</div>';
			echo '<div class="countComment"><div class="comment"><p>Lorem Ipsum</p></div><div class="counter">Boring: '.$user['boringCounter'].'<br/>';
			echo '<a href="upvote.php?imgID='.$array[$i].'">upvote</a> <a href="downvote.php?imgID='.$array[$i].'">downvote</a></div></div>';
			echo '</section><br/>';
		}	
		?>
</article>

		<?php		
			function fetchImageIds($sorting, $loggedUser) {
				$pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
				// fetch all image ids excluding those of a logged user
				$sql = "SELECT * FROM images ORDER BY ".$sorting."";
				foreach( $pdo->query($sql) as $row)
					if($row['userName'] != $loggedUser)
						$tmp[] = $row['imageId'];
				return $tmp;
		}
		?>