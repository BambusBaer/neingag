<article>
	<section>
		<?php

		$randArray[] = 0; 

		// Get the first imageId
		$sql = "SELECT * FROM images ORDER BY imageId";
		$firstId = $pdo->query($sql)->fetch(); 
		// echo '<br/>erste id:'.$firstId['imageId'].'<br/>'; 

		// Get the last imageId
		$sql = "SELECT * FROM images ORDER BY imageId DESC";
		$lastId = $pdo->query($sql)->fetch(); 
		// echo 'letzte id:'.$lastId['imageId']; 
		
		//Show me the pictures without repeats and without pics from logged user
		for($i=$firstId['imageId']; $i<=$lastId['imageId'] ; $i++){

			//Create randoms untill there is no match with randArray
			do{

				// Create random number, which will choose the img
				$rand = mt_rand($firstId['imageId'], $lastId['imageId']);

			}while(in_array($rand, $randArray) === true);
			
			//Save the randNumber in randArray
			$randArray[] = $rand;

			// Check if rand nr is from logged user
			$sql = "SELECT * FROM images WHERE imageId = $rand"; 
			$user = $pdo->query($sql)->fetch(); 

			// Show the pictures without logged user
			if(!isset($_SESSION['userid'])){
				echo '<img src="users/'.$user['userName'].'/'.$user['userName'].'_'.$user['userImagenumber'].'.'.$user['datatype'].'" height="90%" width="80%">'.'<br/>';  
			}
			//Show me the picture
			else if($user['userName'] != $_SESSION['userid']){
				echo '<img src="users/'.$user['userName'].'/'.$user['userName'].'_'.$user['userImagenumber'].'.'.$user['datatype'].'" height="90%" width="80%">'.'<br/>';  
			}
			
		}
		?>
	</section>
</article>