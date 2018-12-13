<?php foreach($category_posts as $post): ?>
	<div class="card">
		<a href="single_post.php?post_id=<?=$post["id"]?>">
		<img class="card-img-top" src="../images/<?= $post["image"]; ?>" alt="Blogpost image">
		</a>

			<div class="card-body">
				<h2 class="card-title"><?= $post["title"]; ?></h2>

				<?php $str = $post["description"];
				if( strlen($str) > 150) {
				$str = explode( "\n", wordwrap($str, 150));
				$str = $str[0] . '...';
				} ?>

				<p class="card-text"><?= $str; ?></p>

				<a href="single_post.php?post_id=<?=$post["id"]?>">Read more...</a>
				<hr>

				<small class="text-muted">
				<?= "Posted: " . $post["post_date"] . "<br>"; ?>
				</small>
				<p class="card-text"><small class="text-muted">By <?= $post["created_by"]; ?></small></p>
				<a href="single_post.php?post_id=<?=$post["id"]?>#commentarea"><small class="text-muted"><i class="far fa-comment-alt"></i></small></a>


			</div>

			<?php if($val->isAdmin()){?>
				<div class="card-footer">
					<a href="edit_post.php?post_id=<?=$post["id"]?>" class="btn btn-default"><span><i class="fas fa-wrench"></i> Edit post</span></a>
					<a href="../index.php?delete_post=<?=$post["id"]?>" class="btn btn-default"><span><i class="far fa-trash-alt"></i> Delete post</span></a>
				</div>
			<?php } ?>
	</div>
<?php endforeach;?>
