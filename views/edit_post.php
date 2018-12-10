<?php
session_start();
include '../classes/call.php';
if(!$user->isLoggedIn()) {
    $user->redirect('login.php');
} 
if(!$user->isAdmin()) {
    $user->redirect('../index.php');
}
$post_id = $_GET["post_id"];
$_SESSION["post_id"] = $post_id;
$post_to_edit = $posts->getPostWithId($post_id);
?>
<?php include '../includes/head.php' ?>

<body>
  
  <?php include '../includes/header.php' ?>

    <main class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <section class="col-9 edit-post-section">
                    <p class="error-message">

                    <?php if (isset($_GET["error"])){
                    echo $_GET["error"];
                    } ?> </p>
                    <?php foreach ($post_to_edit as $post) { ?>

                    
                    <form class ="edit-post-form" action="../includes/edit_post_sql.php" method="POST" enctype="multipart/form-data">
        
                    <label class="form-label" for="heading">Post title</label>
                    <input type="text" name="title" id="heading" value="<?php echo $post['title']; ?>" required="true">
                    
                    <label class="form-label" for="post_content">Post description</label>
                    <textarea class="textarea-add" id="post_content" name="description" > <?php echo htmlspecialchars($post['description']); ?> </textarea>

                    <div class="edit-post-image"><img src="../images/<?php echo $post['image']; ?>" /></div>
                    <label class="form-label" for="image">Choose image</label>
                    <input type="file" name="image" id="image" accept="image/png, image/jpeg">
                    
                    <h3>Choose category</h3>

                    <div class="radio-buttons">
                    <input class="radio" type="radio" name="category" id="watches" value="1" checked>
                    <label class="form-label" for="watches">Watches</label>

                    <input class="radio" type="radio" name="category" id="sunglasses" value="2">
                    <label class="form-label" for="sunglasses">Sunglasses</label>

                    <input class="radio" type="radio" name="category" id="furnishing" value="3">
                    <label class="form-label" for="furnishing">Furnishing</label>
                    </div>
            
                    <!-- <input type="hidden" name="post_id" value="<?php $post['id']; ?>"> -->
                    <!-- <input type="hidden" name="created_by" value="<?php $post['created_by']; ?>">
                    <input type="hidden" name="post_date" value="<?php $post['post_date']; ?>"> -->
                        <div class="button-container">
                            <button class="button-edit">Edit post</button>

                        
                        </div>
                    <?php } ?>
                    </form>

                    
                    </section>
                </div>
            </div>
        </div>
    </main>

</body>
</html>


