<?php

foreach($sunglasses_posts as $post):?>

              <li>
              	<a href="../views/single_post.php?post_id=<?=$post["id"]?>"><?=$post["title"]?></a>
              </li>

<?php endforeach;?>