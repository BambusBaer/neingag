<nav class="sideNav">
	<ul>
		<li><a href="index.php">Start</a></li>
		<li><a href="lamest.php">Lamest</a></li>
		<li><a href="newest.php">Newest</a></li>
	</ul>

	<div class="upload_menu">
		<form method="post" action="upload.php?valueOfProfilPic=0" enctype="multipart/form-data" >
			<input type="file" name="datei" id="file" class="addButton"/>
			<label for="file"><img  src="users/addPic.png" width="100%"></label>
			<input type="submit" id="submits" value="Hochladen" class="addButton"/>
			<label for="submits">Upload it!</label>
		</form>
	</div>
</nav>

	