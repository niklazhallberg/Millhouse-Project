<form class="edit-post-form" action="../includes/edit_post_sql.php" method="POST" enctype="multipart/form-data">

    <p class="error-message"> <?php if (isset($_GET["error"]))
    { 
    echo "* ". $_GET["error"];
    } ?> </p>

    <?php foreach ($post_to_edit as $post) { ?>

    <label class="form-label" for="heading">Post title</label>
    <input type="text" name="title" id="heading" value="<?php echo $post['title']; ?>" required>

    <label class="form-label" for="post_content">Post description</label>
    <textarea class="textarea-add" id="summernote" id="post_content" name="description" required> <?php echo htmlspecialchars($post['description']); ?> </textarea>

    <h3>Current image</h3>
    <div class="edit-post-image"><img src="../images/<?php echo $post['image']; ?>" /></div>
    <label class="form-label" for="image">Choose new image</label>
    <input type="file" name="image" id="image" accept="image/png, image/jpeg">
    

    <div>
        <label for="category">Current category for post:</label>
        <select name="category" id="category">
        <option value="1" <?php if ($post['category_id'] == 1) { echo 'selected'; } ?> >Watches</option>
        <option value="2" <?php if ($post['category_id'] == 2) { echo 'selected'; } ?> >Sunglasses</option>
        <option value="3" <?php if ($post['category_id'] == 3) { echo 'selected'; } ?> >Furnishing</option>
        </select>
    </div>


    <!-- <input type="hidden" name="post_id" value="<?php $post['id']; ?>"> -->
    <!-- <input type="hidden" name="created_by" value="<?php $post['created_by']; ?>">
    <input type="hidden" name="post_date" value="<?php $post['post_date']; ?>"> -->
        <div class="button-container">
            <button id="button" class="button-edit">Edit post</button>


        </div>
    <?php } ?>
</form>