<form enctype="multipart/form-data" class="add-post" action="../includes/add_post_sql.php" method="POST">
  <?php
    if (isset($_GET['error'])){
      echo "<span style='color:red;font-weight:bold'> *" . $_GET['error'] . "</span><br>";
  }
  ?>
    <div class="add-title">
      <label for="title">Title</label><br>
      <input type="text" name="title" required><br>
    </div>
    <div class="add-description">
      <label for="description">Description</label><br>
      <textarea name="description" required></textarea><br>
    </div>
    <p>Choose your category:</p>
    <div>
      <input type="radio" id="watches" name="drone" value="1" checked>
      <label for="watches">Watches</label>
      <input type="radio" id="sunglasses" name="drone" value="2">
      <label for="sunglasses">Sunglasses</label>
      <input type="radio" id="furnishing" name="drone" value="3">
      <label for="furnishing">Furnishing</label>
    </div>
    <br>
    <input type="file" name="image" id="image" accept="image/png, image/jpeg" required>
    <input type="submit" value="Create post">


</form>
