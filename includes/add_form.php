<form enctype="multipart/form-data" class="add-post" action="../includes/add_post_sql.php" method="POST">
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
  <input type="text" name="title" placeholder="heading"><br>
    <textarea name="description" rows="10" cols="60"></textarea><br>

  <input type="file" name="image" id="image">
  <input type="submit" value="Send File">

</form>
