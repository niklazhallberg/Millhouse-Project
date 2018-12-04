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
      <select name="category">
        <option value="1">Watches</option>
        <option value="2">Sunglasses</option>
        <option value="3">Furnishing</option>
      </select>
    </div>
    <br>
    <input type="file" name="image" id="image" accept="image/png, image/jpeg" required>
    <input type="submit" value="Create post">


</form>
