
          <h2 class="h2-sidebar">Blog categories<h2>

          <h3>Watches</h3>
          <ul>
            <?php 

            /* NUMBER OF WATCH POSTS DISPLAYED IN SIDEBAR */ 

            $number_of_watch_posts = 10;
            $watch_posts = $posts->getLatestWatchPosts($number_of_watch_posts);
            include 'includes/index_sidebar_foreach_watch_post.php'; ?>

          </ul>
          <h3>Sunglasses</h3>
          <ul>
            <?php 

            /* NUMBER OF SUNGLASSES POSTS DISPLAYED IN SIDEBAR */ 

            $number_of_sunglasses_posts = 10;
            $sunglasses_posts = $posts->getLatestSunglassesPosts($number_of_sunglasses_posts);
            include 'includes/index_sidebar_foreach_sunglasses_post.php'; ?>

          </ul>
          <h3>Furnishing articles</h3>
          <ul>
            <?php 

            /* NUMBER OF FURNISHING POSTS DISPLAYED IN SIDEBAR */

            $number_of_furnishing_posts = 10;
            $furnishing_posts = $posts->getLatestFurnishingPosts($number_of_furnishing_posts);
            include 'includes/index_sidebar_foreach_furnishing_post.php'; ?>

          </ul>
          
         <h3>Most recent</h3>
          <ul>
            <?php   

            /* NUMBER OF RECENT POSTS DISPLAYED IN SIDEBAR */ 

            $number_of_posts = 10;
            $aside_posts = $posts->getLatestPosts($number_of_posts);
            include 'includes/index_sidebar_foreach_recent_post.php'; ?>

          </ul>