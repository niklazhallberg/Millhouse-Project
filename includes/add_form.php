<form enctype="multipart/form-data" class="add-post" action="../includes/add_post_sql.php" method="POST">
<p class="error-message">
          <?php if (isset($_GET["error"])){
            echo "* ". $_GET["error"];
          } ?> </p>
    <div class="add-title">
      <label for="title">Title</label>
      <input type="text" name="title" required><br>
    </div>
    <div class="add-description">
      <label for="description">Description</label>
      <textarea id="summernote" name="description"></textarea><br>
    </div>
    <div>
      <label for="category">Choose your category:</label>
      <select name="category">
        <option value="1">Watches</option>
        <option value="2">Sunglasses</option>
        <option value="3">Furnishing</option>
      </select>
    </div>
    <br>
    <input type="file" name="image" id="image" accept="image/png, image/jpeg" required>
    <div class="add-post-submit">
      <input type="submit" value="Create post">
    </div>


</form>
