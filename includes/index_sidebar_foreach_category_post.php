<?php

foreach($category_posts as $post):?>

              <li>
              	<a href="../views/single_post.php?post_id=<?=$post["id"]?>"> <?=$post["title"]?></a>
              </li>
              <hr>

<?php endforeach;

?>


