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

				<a href="../views/single_post.php?post_id=<?=$post["id"]?>">Read more...</a>

               <input type="hidden" id="post-id" name="post-id" value="<?= $post["id"]; ?>">
             </div>
	</div>

	<?php
	$i++;
	if($i==5) break;
	?>

<?php endforeach;

?>
