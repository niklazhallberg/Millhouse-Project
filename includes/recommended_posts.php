
            <aside class="col-12 col-md-5 col-lg-3">
             <h2 class="text-center-related">Recommended posts</h2>
             <div class="card-deck">
              <?php
    
                $random_posts = $posts->getRandomPosts($category);     
                foreach($random_posts as $rand)
                { ?>
                
                    <div class="col-12">
                    <div class="card">
                       <img class="card-img-top" src="<?= $rand["image"]; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h3 class="card-title"> <?= $rand["title"]; ?> </h3>
                            <?php $str = $rand["description"];
                            if( strlen($str) > 150) {
   				            $str = explode( "\n", wordwrap($str, 150));
   				            $str = $str[0] . '...'; 
                            }?>

                       <p class="card-text"><?= $str; ?></p>
                       
                       <a href="/single_post.php?post_id=<?=$post["id"]?>">Read more...</a>
                        </div>
                    </div>
                    </div>
                    
               <?php }
                ?>
                    
          </div>
          </aside>