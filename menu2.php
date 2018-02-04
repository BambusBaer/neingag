<nav class="nav">
	<ul>
	<li><button onclick="document.getElementById('upload').style.display='block'">Upload</button></li>
	<li><a href="profile.php">Profile</a></li>
	<li><a href="logout.php">Logout</a></li>
	</ul>
</nav>

<!--https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_login_form-->
<!-- The Modal -->
<div id="upload" class="modal">
			<span onclick="document.getElementById('upload').style.display='none'"
			class="close" >&times;</span>

			<!-- Modal Content -->
			<form class="modal-upload animate" method="post" enctype="multipart/form-data" action="upload.php?">
				

				<h1 class="formTitle"> Upload </h1>

				<div class="loginContainer" >
					<label for="loadImg"><img src="images/addImg.png" class="labelImg" width="100%"></label>
					<input class="addButton" id="loadImg" type="file" name="datei"><br>
				
				</div>

				<div class="loginContainer" ><input type="submit" value="Hochladen" class="formSubmit">
					<button type="button" onclick="document.getElementById('upload').style.display='none'" class="cancelbtn">Cancel</button>
				</div>
			</form>
		</div> 