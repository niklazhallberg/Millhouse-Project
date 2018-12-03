<form enctype="multipart/form-data" class="add-post" action="../includes/add_post_sql.php" method="POST">
  <?php
    if (isset($_GET['error'])){
      echo "<span style='color:red;font-weight:bold'> *" . $_GET['error'] . "</span><br>";
  }
  ?>
  <p>Choose your category:</p>
  <div>
    <input type="radio" id="watches" name="drone" value="1"
           checked>
    <label for="watches">Watches</label>
  </div>

  <div>
    <input type="radio" id="sunglasses" name="drone" value="2">
    <label for="sunglasses">Sunglasses</label>
  </div>

  <div>
    <input type="radio" id="furnishing" name="drone" value="3">
    <label for="furnishing">Furnishing</label>
  </div>
  <input type="text" name="title" placeholder="Heading"><br>
    <textarea name="description" rows="10" cols="60"></textarea><br>
    <input type="file" name="image" id="image" accept="image/png, image/jpeg">
    <input type="submit" value="Create post">

</form>
