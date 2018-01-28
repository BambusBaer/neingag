<section class="comments">

	<div class="commentsContent">
		<?php include('loadComments.php'); ?>
	</div>
	
	<?php 
		if(!isset($_SESSION['userid']))
			echo '<form name="comment" method="post" action="login.php">';
		else
			echo '<form name="comment" method="post" action="insertComment.php?imgID='.$image['imageId'].'">'; 
	?>
		<div>
			<label for="text">Kommentar</label>
				<textarea id="text" name="text" cols="35" rows="4" maxlength="200"></textarea>
		  <input type="submit" value="Senden" />
	   </div> 
	</form>
	<?php
		if(!isset($_SESSION['userid']))
			echo '<br/><br/><div class="counter">Boring: '.$image['boringCounter'].'<br/><a href="login.php">upvote</a> <a href="login.php">downvote</a></div>'; 
		else
			echo '<br/><br/><div class="counter">Boring: '.$image['boringCounter'].'<br/><a href="upvote.php?imgID='.$array[$i].'">upvote</a> <a href="downvote.php?imgID='.$array[$i].'">downvote</a></div>'; 
	?>
	
</section>
