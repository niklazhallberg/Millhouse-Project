<?php foreach($index_posts as $post): ?>
		<div class="col-12 col-md-6 col-lg-4 post-box">
             <div class="card">
               <a href="../views/single_post.php?post_id=<?=$post["id"]?>">
			   <img class="card-img-top" src="../images/<?= $post["image"]; ?>" alt="Blogpost image">
               </a>

             <div class="card-body">
			   <h3 class="card-title"><?= $post["title"]; ?></h3>

			   <?php $str = $post["description"];
				if( strlen($str) > 150) {
   				$str = explode( "\n", wordwrap($str, 150));
   				$str = $str[0] . '...';
				} ?>

				<p class="card-text"><?= $str; ?></p>

				<a href="../views/single_post.php?post_id=<?=$post["id"]?>">Read more...</a>

				<hr>
				<div class="date-text">
				<?php echo "Posted: " . date("Y/m/d") . "<br>"; ?>
				</div>
				<p class="card-text"><small class="text-muted">By <?= $_SESSION["username"]; ?></small></p>

				<?php if($user->isAdmin()){?>

				<div class="card-footer">

      			<button class="go-to-edit-page" type="button"><a href="../views/edit_post.php" class="btn btn-default">Edit post</a></button>

      			<button class="go-to-edit-page" type="button"><a href="../views/edit_post.php" class="btn btn-default">Delete post</a></button>

    	     	</div>

				<?php } ?>

               <input type="hidden" id="post-id" name="post-id" value="<?= $post["id"]; ?>">
               
             </div>
             </div>
         </div>
  


<?php endforeach;?>
