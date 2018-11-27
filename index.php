<?php session_start();

if(empty($_SESSION["user_id"])){
  header('location: ../views/login.php');
}
?>

 <?php include 'includes/head.php'; ?>
<body>
  <?php include 'includes/header.php'; ?>


  <main class="container-fluid">
  <div class="row">
     <div class="col-12">
       <div class="row">
         <section class="col-12 col-md-8 blogpost-section">
           <div class="row">
             <div class="col-12 col-md-6">
               <img src="images/bildtest.jpg" alt="test">
             </div>
             <div class="col-12 col-md-6">
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
             </div>
           </div>
         </section>
          <aside class="col-12 col-md-4 index-sidebar">
            <h3>Recent posts</h3>
            <ul>
              <li>hej</li>
              <li>hej</li>
              <li>hej</li>
              <li>hej</li>
            </ul>
            <h3>Watches</h3>
            <ul>
              <li>hej</li>
              <li>hej</li>
              <li>hej</li>
              <li>hej</li>
            </ul>
            <h3>Sunglasses</h3>
            <ul>
              <li>hej</li>
              <li>hej</li>
              <li>hej</li>
              <li>hej</li>
            </ul>
            <h3>Furnishing articles</h3>
            <ul>
              <li>hej</li>
              <li>hej</li>
              <li>hej</li>
              <li>hej</li>
            </ul>
          </aside>
       </div>
     </div>
  </div>
</main>


  <?php include 'includes/javascript_tag.php'; ?>
</body>

</html>
