<form class="edit-post-form" action="../includes/edit_post_sql.php" method="POST" enctype="multipart/form-data">

    <p class="error-message"> <?php if (isset($_GET["error"])) { echo "* ". $_GET["error"]; } ?> </p>

    <?php foreach ($post_to_edit as $post) { ?>

        <label for="heading">Title</label>
        <input type="text" name="title" id="heading" value="<?= $post['title']; ?>" required>

        <label for="summernote">Description</label>
        <textarea class="textarea-add" id="summernote" name="description" required> <?= htmlspecialchars($post['description']); ?> </textarea>

        <div class="post-select">
        <label class="label" for="category">Current category: </label>
            <select name="category" id="category">
            <option value="1" <?php if ($post['category_id'] == 1) { echo 'selected'; } ?> >Watches</option>
            <option value="2" <?php if ($post['category_id'] == 2) { echo 'selected'; } ?> >Sunglasses</option>
            <option value="3" <?php if ($post['category_id'] == 3) { echo 'selected'; } ?> >Furnishing</option>
            </select>
            <p class="small">If you wish to <strong>change</strong> category, make a new choice above</p>
        </div>

        <h3 class="margin-top">Current image: </h3>
        <div class="edit-post-image"><img src="../images/<?= $post['image']; ?>" /></div>
        <label class="label" for="image">If you wish to <strong>change</strong> image, make a new choice below</label>
        <input type="file" name="image" id="image" accept="image/png, image/jpeg">
    


        <div class="button-container">
            <button class="button-static"><span>Edit post </span></button>
        </div>

    <?php } ?>
</form>