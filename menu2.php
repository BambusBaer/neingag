<nav class="nav">
	<ul>
	<?php
		$sql = "SELECT * FROM images WHERE userName = '$_SESSION[userid]' and profilPic = '1'"; 
		$profilPic = $pdo->query($sql)->fetch(); 

		echo '<li><a href="profile.php"><section id="profilePic_menu">'.'<img src="users/'.$profilPic['userName'].'/'.$profilPic['userName'].'_'.$profilPic['userImagenumber'].'.'.$profilPic['datatype'].'" width="20px">'.'</section>';	
		echo "{$_SESSION['userid']}</a></li>"; 

	?>
		<li><a href="logout.php">Abmelden</a></li>
	</ul>
</nav>
