<header>
  <div class="row justify-content-center mr-0 ml-0">
    <div class="col-sm-6 col-md-6 col-lg-4 header-logo">
      <a href="../index.php"><img src="../images/logo_dark.png"  alt="Millhouse logo"></a>
    </div>
  </div>
    <div class="row">
      <div class="col-8">
        <?php


        if($user->isAdmin()){
          echo "Congratulations! You have special privileges. Use them wisely.";
        }
        ?>
        </div>
        <div class="col-4 logout-button">
          <?php
          if($user->isLoggedIn()) {
            include 'logout_button.php';
        } ?>
      </div>
    </div>
</header>
