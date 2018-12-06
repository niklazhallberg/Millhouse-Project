<?php
session_start();
include '../classes/call.php';
if(!$user->isLoggedIn()) {
    $user->redirect('login.php');
} 
if(!$user->isAdmin()) {
    $user->redirect('../index.php');
}
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

                    <form class ="edit-post-form" action="../includes/add_post.inc.php" method="POST" enctype="multipart/form-data">
        
                    <label class="form-label" for="heading">Post title</label>
                    <input type="text" name="title" id="heading">
                    
                    <label class="form-label" for="post_content">Post description</label>
                    <textarea class="textarea-add" id="post_content" name="description"></textarea>

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
            
                        <div class="button-container">
                            <button class="button-edit">Add post</button>
                        </div>
                    </form>

                    
                    </section>
                </div>
            </div>
        </div>
    </main>

</body>
</html>


