
            <aside class="d-none d-md-block col-md-4 col-lg-3 border-left">
             <h3 class="text-center">Recommended posts</h3>
             <div class="card-deck">
              <?php
                 
                 

                $random_posts = $posts->getRandomPosts($category);
                foreach($random_posts as $rand)
                { 
                 
                    //calling method to get all comments with post id
                 $comments_to_print = $comments->getCommentsWithId($rand["id"]);
                 //calls method to count comments
                 $counter = $comments->countingComments($comments_to_print);
                 
                 ?>

                    <div class="col-12">
                    <div class="card">
                      <a href="../views/single_post.php?post_id=<?=$rand["id"]?>">
                       <img class="card-img-top" src="<?= $rand["image"]; ?>" alt="Card image cap">
                      </a>
                        <div class="card-body">
                            <h3 class="card-title"> <?= $rand["title"]; ?> </h3>
                            <?php $str = $rand["description"];
                            if( strlen($str) > 150) {
   				            $str = explode( "\n", wordwrap($str, 150));
   				            $str = $str[0] . '...';
                            }?>

                       <p class="card-text"><?= $str; ?></p>

                       <a href="../views/single_post.php?post_id=<?=$rand["id"]?>">Read more...</a>

                       <hr>
                       <small class="text-muted">
                       <?= "Posted: " . $rand["post_date"] . "<br>"; ?>
                       </small>
                       <p class="card-text"><small class="text-muted">By <?= $post["created_by"]; ?></small></p>
                       <a href="../views/single_post.php?post_id=<?=$rand["id"]?>#commentarea"><small class="text-muted"><i class="far fa-comment-alt d-inline"></i></small><p class="d-inline text-muted comment-number align-top"> <?= $counter; ?></p></a>
                        </div>
                    </div>
                    </div>

               <?php }
                ?>

          </div>
          </aside>
