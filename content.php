<article>
		<?php
				
		// check for logged user
		if(isset($_SESSION['userid']))
			$loggedUser = $_SESSION['userid'];
		else $loggedUser = "";		
		
		// grab image ids from db, sorted by $sort variable from start page. 
		//1 = sorted by boring, 2 = sorted by time, else sorted randomly
		switch ($sort) {
			case 1:
				$array = fetchImageIds("boringCounter DESC", $loggedUser);
				break;
			case 2:
				$array = fetchImageIds("imageId DESC", $loggedUser);				
				break;
			default:
				$array = fetchImageIds("imageId", $loggedUser);
				if($array !== null)
					shuffle($array);
				break;
		}

		if($array !== null)
			//display all images
			for($i=0; $i<count($array); $i++){
						
				// load images from database
				$sql = "SELECT * FROM images WHERE imageId = $array[$i]"; 
				$image = $pdo->query($sql)->fetch(); 
				// display
				echo '<div class="profileleader"><b>'.$image['userName'].'</b></div>';	
				echo '<section class="container">';	
				echo '<section class="images">'.'<img src="users/'.$image['userName'].'/'.$image['userName'].'_'.$image['userImagenumber'].'.'.$image['datatype'].'"width="100%">'.'</section>';	
				include('comment.php');
				echo '</section><br/>';
			}	
		else
			die("Hier scheinen noch keine Bilder zu sein.");
		?>
</article>

		<?php		
			// fetch all image ids excluding those of a logged user (argument 2), sorted by argument 1
			function fetchImageIds($sorting, $loggedUser) {
				$tmp = null;
				if($pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '')){
					$sql = "SELECT * FROM images ORDER BY ".$sorting."";
					foreach( $pdo->query($sql) as $row)
						if($row['userName'] != $loggedUser)
							$tmp[] = $row['imageId'];
				} else 
					die("Fehler bei Datenbankverbindung");
				return $tmp;
			}
		?>
		