	<!-- Ruft ueber onclick() ein div auf, der wie ein extra Fenster erscheint-->
		<nav class="nav">
			<ul>
				<li><button onclick="document.getElementById('login1').style.display='block'">Login</button></li>
				<li><button onclick="document.getElementById('register1').style.display='block'">Register</button></li>
			</ul>
		</nav>

		
		<!--Login-->
		<!-- The Modal -->
		<div id="login1" class="modal">
			<span onclick="document.getElementById('login1').style.display='none'"
			class="close" >&times;</span>

			<!-- Modal Content -->
			<form class="modal-content animate" method="post" action="login.php?login=1">
				

				<h1 class="formTitle"> Login </h1>


				<div class="loginContainer"  style="background-color:#f1f1f1">
					<label for="email"><b>E-Mail:</b></label>
					<input type="text" placeholder="Enter E-Mail" name="email" margin-left="100px" required>
					<br/>
					
					<label for="loginPassword"><b>Password:</b></label>
					<input type="password" placeholder="Enter Password" name="loginPassword" required>
					<br/>					

				</div>

				<div class="loginContainer" ><button class="formSubmit" type="submit">Login</button>
					<button type="button" onclick="document.getElementById('login1').style.display='none'" class="cancelbtn">Cancel</button>
				</div>
			</form>
		</div> 


		<!--Register-->
		<!-- The Modal -->
		<div id="register1" class="modal">

			<!-- Modal Content -->
			<form class="modal-content animate" method="post" action="register.php?register=1">
				
				<h1 class="formTitle"> Register </h1>
				<div class="loginContainer"  style="background-color:#f1f1f1">
					<label for="formNickname"><b>Nickname: </b></label>
					<input type="text" placeholder="Enter Nickname" name="formNickname" required>
					<br/>

					<label for="formMail"><b>E-Mail:</b></label>
					<input type="text" placeholder="Enter E-Mail" name="formMail" margin-left="100px" required>
					<br/>
					
					<label for="formPassword"><b>Password:</b></label>
					<input type="password" placeholder="Enter Password" name="formPassword" required>
					<br/>

					<p class="passRules">*Your password must be at least 8 characters long!<br/>
					*Your password must obtain at least 1 number!<br/>
					*Your password must obtain at least 1 uppercase!<br/>
					</p>

					<label for="formPassword2"><b>Password:</b></label>
					<input type="password" placeholder="Enter Password Again" name="formPassword2" required>
				</div> 
				
				<div class="loginContainer">
					<button class="formSubmit" type="submit">Register</button>
					<button type="button" onclick="document.getElementById('register1').style.display='none'" class="cancelbtn">Cancel</button>
				</div>			
			</form>
		</div>