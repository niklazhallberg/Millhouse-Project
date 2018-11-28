<?php 
session_start();
include '../includes/database_connection.php';
?>

<?php include '../includes/head.php'; ?>
<body>
<?php include '../includes/header.php'; ?>

<main class="container-fluid">
  <div class="row">

    <?php 
      
      include '../includes/single_post_sql.php';
      
      //looping through array and printing post
      foreach($post_to_print as $post){ ?>
          
           <div class="col-12">
           <img  class="card-img-top" src="../images/<?= $post["image"]; ?>" alt="image not found">
           </div>
           
           <div class="col-12">
           <h2 class="card-title"> <?= $post["title"]; ?> </h2>
           <p class="card-text"> <?= $post["description"]; ?> </p>
           </div>
           
           
           <?php } ?>
             
            <div class="col-12">
              
              <form action="../includes/add_comment_sql.php" method="POST">
              <label for="comment-field">Leave a comment as <?= $_SESSION["username"]; ?></label>
              <input type="text-area" id="comment-field" name="comment-field" required>
              <input type="submit" value="Comment">
              </form>
              
            </div> 
   </div>
</main>




<?php include '../includes/javascript_tag.php'; ?>
</body>

</html>