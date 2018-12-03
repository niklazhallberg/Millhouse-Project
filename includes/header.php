<header>
  <div class="row header justify-content-end align-items-center mr-0 ml-0">
    <div class="header-logo">
      <a href="../index.php"><img src="../images/logo_dark.png"  alt="Millhouse logo"></a>
    </div>

    <div class="header-buttons">
      <div>
        <?php if($user->isLoggedIn()) {
            include 'logout_button.php';
        } ?>
      </div>

      <div>
        <?php if($user->isAdmin()){
          include 'add_post_button.php';
        } ?>
      </div>

    </div>
  </div>
</header>
