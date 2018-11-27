<header class="row justify-content-center mr-0 ml-0">
      <div class="col-6 header-logo">
        <a href="../index.php"><img src="../images/logo_dark.png"  alt="Millhouse logo"></a>
      </div>

      <?php
      if(isset($_SESSION["user_id"])){
      include 'logout_button.php';
      }
      ?>
</header>
