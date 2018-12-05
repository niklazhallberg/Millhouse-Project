<div class="card-deck justify-content-center post-row">
          <div class="col-12 col-md-6 col-lg-4">
             <div class="card">
               <img class="card-img-top" src="images/Iris.png" alt="Blogpost image">

             <div class="card-body">
         <h3 class="card-title">Add Title</h3>

        <p class="card-text">Add Description</p>

        <a href="../views/single_post.php?post_id=<?=$post["id"]?>">Read more...</a>

        <hr>
        <div class="date-text">
        <?php echo "Posted: " . "Date" . "<br>"; ?>
        </div>
        <p class="card-text"><small class="text-muted">Created by: YourName from Millhouse</small></p>

        <div class="card-footer">

            <button class="go-to-edit-page" type="button"><a href="../views/edit_post.php" class="btn btn-default">Edit post</a></button>

            <button class="go-to-edit-page" type="button"><a href="../views/edit_post.php" class="btn btn-default">Delete post</a></button>

            </div>

               <input type="hidden" id="post-id" name="post-id" value="<?= $post["id"]; ?>">
               
             </div>
             </div>
         </div>