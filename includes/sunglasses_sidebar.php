
          <h2>Sunglasses</h2>

          <hr>

  <div class="category-box">
            <h3><a href="../index.php">Home page</a></h3>
          
          </div>
        

          <div class="category-box">
          <h3><a href="watches.php">Watches</a></h3>
          <ul class="list-unstyled">
            <?php 

            /* NUMBER OF WATCH POSTS DISPLAYED IN SIDEBAR */ 

            $number_of_posts = 5;
            $category_id = 1;
            $category_posts = $posts->getLatestCategoryPosts($category_id, $number_of_posts);
            include '../includes/index_sidebar_foreach_category_post.php'; ?>

          </ul>
          </div>


          <div class="category-box">
                <h3><a href="furnishing.php">Furnishing articles</a></h3>
                <ul class="list-unstyled">
                  <?php 

                  /* NUMBER OF FURNISHING POSTS DISPLAYED IN SIDEBAR */

                  $number_of_posts = 5;
                  $category_id = 3;
                  $category_posts = $posts->getLatestCategoryPosts($category_id, $number_of_posts);
                  include '../includes/index_sidebar_foreach_category_post.php'; ?>

                </ul>
          </div>

          <div class="category-box">
            <h3><a href="all_posts.php">View all posts</a></h3>
          
          </div>

          