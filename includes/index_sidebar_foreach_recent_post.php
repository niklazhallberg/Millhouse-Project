<?php 

	$i = 0;

foreach($posts as $post): ?>
	
              <li><a href="../includes/single_post_sql.php?post_id=<?=$post["id"]?>"> <?=$post["title"]?></a></li>

	<?php
	$i++;
	if($i==10) break;
	?>

<?php endforeach; 

?>



