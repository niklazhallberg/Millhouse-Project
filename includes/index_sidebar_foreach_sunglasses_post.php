<?php

 $statement = $pdo->prepare("SELECT * FROM posts WHERE category_id = '2'");

    $statement->execute();

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

$i = 0;

foreach(array_reverse($posts) as $post):?>

              <li>
              	<a href="../views/single_post.php?post_id=<?=$post["id"]?>"><?=$post["title"]?></a>
              </li>

          <?php

	$i++;
	if($i==10) break;

	?>

<?php endforeach;?>