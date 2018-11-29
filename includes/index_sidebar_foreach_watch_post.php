<?php

$i = 0;

foreach($posts as $post):?>

	<?php if($post["category_id"] == 1) { ?>

              <li>
              	<a href="../views/single_post.php?post_id=<?=$post["id"]?>"><?=$post["title"]?></a>
              </li>

          <?php

      		}

	$i++;
	if($i==10) break;

	?>

<?php endforeach;?>
