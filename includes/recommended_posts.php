
            <aside class="col-12 col-md-5 col-lg-4">
             <h2 class="text-center">Recommended</h2>
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
                            if( strlen($str) > 100) {
   				            $str = explode( "\n", wordwrap($str, 150));
   				            $str = $str[0] . '...'; 
                            }?>

                       <p class="card-text"><?= $str; ?></p>
                        </div>
                    </div>
                    </div>
                    
               <?php }
                ?>
                    
          </div>
          </aside>