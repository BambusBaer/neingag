<section class="comments">

	<div class="commentsContent">
		<?php include('loadComments.php'); ?>
	</div>
	
	<?php 
		if(!isset($_SESSION['userid']))
			echo '<form name="comment" method="post" action="#">';
		else
			echo '<form name="comment" method="post" action="insertComment.php?imgID='.$image['imageId'].'">'; 
	?>
		<div>
			<!--<label for="text">Kommentar</label>-->
				<textarea id="text" name="text" cols="35" rows="4" maxlength="200" placeholder="Enter a comment..."></textarea>
		  <input class="submitComment" type="submit" value="Senden" />
	   </div> 
	</form>


	<?php
		//Up-/Downvoter 
		//Check in images/ for "boring" and "tooFunny"		
		
		if(!isset($_SESSION['userid']))
			echo '<br/><br/><div class="counter">Boring: '.$image['boringCounter'].'<br/><a href="#"><img src="images/boring.png" title="Boring" width="50px"/></a> <a href="#"><img src="images/tooFunny.png" title="Too Funny" width="50px"></a></div>'; 
		else
			echo '<br/><br/><div class="counter">Boring: '.$image['boringCounter'].'<br/><a href="upvote.php?imgID='.$array[$i].'"><img src="images/boring.png" title="Boring" width="50px"/></a> <a href="downvote.php?imgID='.$array[$i].'"><img src="images/tooFunny.png" title="Too Funny" width="50px"></a></div>'; 
	?>
</section>	
