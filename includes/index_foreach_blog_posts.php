<?php 

foreach($posts as $post): ?>
	<div class="row">
             <div class="col-12 col-md-6">
               <img src="<?= $post["image"]; ?>"/>
             </div>
             <div class="col-12 col-md-6">
			   <h3><?= $post["title"]; ?></h3>
               <p><?= $post["description"]; ?></p>
               <input type="hidden" id="post-id" name="post-id" value="<?= $post["id"]; ?>">
             </div>
	</div>
<?php endforeach; 

?>

