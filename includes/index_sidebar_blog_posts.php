<h2 class="h2-sidebar">Blog feed</h2>
<p>by product category</p>

<hr>

<div class="category-box">
  <h3><a href="views/watches.php">Watches</a></h3>
  <ul class="list-unstyled">
    <?php 
    /* NUMBER OF WATCH POSTS DISPLAYED IN SIDEBAR */ 
    $number_of_posts = 5;
    $category_id = 1;
    $category_posts = $posts->getLatestCategoryPosts($category_id, $number_of_posts);
    include 'includes/index_sidebar_foreach_category_post.php'; ?>

  </ul>
</div>

<div class="category-box">
  <h3><a href="views/sunglasses.php">Sunglasses</a></h3>
  <ul class="list-unstyled">
    <?php 
    /* NUMBER OF SUNGLASSES POSTS DISPLAYED IN SIDEBAR */ 
    $number_of_posts = 5;
    $category_id = 2;
    $category_posts = $posts->getLatestCategoryPosts($category_id, $number_of_posts);
    include 'includes/index_sidebar_foreach_category_post.php'; ?>

  </ul>
</div>

<div class="category-box">
  <h3><a href="views/furnishing.php">Furniture articles</a></h3>
  <ul class="list-unstyled">
    <?php 
    /* NUMBER OF FURNISHING POSTS DISPLAYED IN SIDEBAR */
    $number_of_posts = 5;
    $category_id = 3;
    $category_posts = $posts->getLatestCategoryPosts($category_id, $number_of_posts);
    include 'includes/index_sidebar_foreach_category_post.php'; ?>

  </ul>
</div>

<div class="category-box">
  <h3><a href="views/all_posts.php">View all posts</a></h3>
</div>