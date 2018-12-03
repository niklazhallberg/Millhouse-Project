<?php

foreach($index_posts as $post): ?>

	<div class="row post-row">

             <div class="col-12 col-md-6 image-row">
               <img src="../images/<?= $post["image"]; ?>">
             </div>

             <div class="col-12 col-md-6">
			   <h3><?= $post["title"]; ?></h3>

			   <?php $str = $post["description"];
				if( strlen($str) > 150) {
   				$str = explode( "\n", wordwrap($str, 150));
   				$str = $str[0] . '...';
				}

				echo $str;
				?><br><br>

				<a href="../views/single_post.php?post_id=<?=$post["id"]?>">Read more...</a>

				<hr>

				<?php echo "Posted: " . date("Y/m/d") . "<br>"; ?>
				<p>Created by: <?= $_SESSION["username"]; ?> from Millhouse</p>
				<?php if($user->isAdmin()){?>
				<button class="go-to-edit-page" type="button"><a href="../views/edit_post.php" class="btn btn-default">Edit post</a></button>
				<?php } ?>

               <input type="hidden" id="post-id" name="post-id" value="<?= $post["id"]; ?>">
             </div>
	</div>

<?php endforeach;

?>
