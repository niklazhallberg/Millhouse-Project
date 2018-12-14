<form enctype="multipart/form-data" class="add-post" action="../includes/add_post_sql.php" method="POST">
  <p class="error-message"> <?php if (isset($_GET["error"])){ echo "* ". $_GET["error"]; } ?> </p>

    <label for="title">Title</label>
    <input type="text" id="title" name="title" required>

    <label for="summernote">Description</label>
    <textarea id="summernote" name="description"></textarea>

    <div class="post-select">
      <label class="label" for="category">Choose category</label>
      <select id="category" name="category">
        <option value="1">Watches</option>
        <option value="2">Sunglasses</option>
        <option value="3">Furnishing</option>
      </select>
    </div>

    <div class="post-select">
      <label class="label" for="image">Choose image</label>
      <input type="file" name="image" id="image" accept="image/png, image/jpeg" required>
    </div>

    <div class="button-container">
      <button class="button-static"><span>Add post </span></button>
    </div>
</form>
