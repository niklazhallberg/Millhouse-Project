<?php 

	$i = 0;

foreach($posts as $post): ?>

<aside class="col-12 col-md-4 index-sidebar">
            <ul>
              <li><a href="../includes/single_post_sql.php?post_id=<?=$post["id"]?>"> <?=$post["title"]?></a></li>
            </ul>

	<?php
	$i++;
	if($i==10) break;
	?>

<?php endforeach; 

?>



