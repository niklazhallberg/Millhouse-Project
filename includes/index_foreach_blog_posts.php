<?php

	$i = 0;

foreach(array_reverse($posts) as $post): ?>

	<div class="row post-row">

             <div class="col-12 col-md-6">
               <img src="../images/<?= $post["image"]; ?>">
             </div>

             <div class="col-12 col-md-6">
			   <h3><?= $post["title"]; ?></h3>

			   <?php $str = $post["description"];
				if( strlen($post["description"]) > 150) {
   				$str = explode( "\n", wordwrap( $post["description"], 150));
   				$str = $str[0] . '...';
				}

				echo $str;
				?><br><br>


			   <?php if( strlen($post["description"]) > 150) {?>
				<a href="../views/single_post.php?post_id=<?=$post["id"]?>">Read more...</a>
				<?php } ?><br>

				<hr>

				<?php echo "Posted: " . date("Y/m/d") . "<br>"; ?>
				<p>Created by: <?= $_SESSION["username"]; ?> from Millhouse</p>
				<?php if(isset($_SESSION["admin"])){?>
				<button class="go-to-edit-page" type="button"><a href="../views/edit_post.php" class="btn btn-default">Edit post</a></button>
				<?php } ?>

               <input type="hidden" id="post-id" name="post-id" value="<?= $post["id"]; ?>">
             </div>
	</div>

	<?php
	$i++;
	if($i==5) break;
	?>

<?php endforeach;

?>
