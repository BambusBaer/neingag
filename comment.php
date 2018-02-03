<section class="comments">

	<?php
		//Up-/Downvoter 
		//Check in images/ for "boring" and "tooFunny"		
		
		if(!isset($_SESSION['userid']))
			echo '<div class="counterContainer"><a href="#"><img src="images/boring.png" title="Boring" width="50px" class="upvoter"/></a><br> <span class="boringCounter">Boring: '.$image['boringCounter'].'</span><a href="#"><img src="images/tooFunny.png" title="Too Funny" width="50px"class="downvoter"/></a></div>'; 
		else
			echo '<div class="counterContainer"><a href="upvote.php?imgID='.$array[$i].'"><img src="images/boring.png" title="Boring" width="50px" class="upvoter"/></a><br> <span class="boringCounter">Boring: '.$image['boringCounter'].'</span><a href="downvote.php?imgID='.$array[$i].'"><img src="images/tooFunny.png" title="Too Funny" width="50px"class="downvoter"/></a></div>'; 
	?>

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


	
</section>	
