<header>
  <div class="row header justify-content-end align-items-center mr-0 ml-0">
    <div class="header-logo">
      <a href="../index.php"><img src="../images/logo_light.png"  alt="Millhouse logo"></a>
    </div>

    <div class="header-buttons">
      <div>
       <!--shows logout button when user is logged in-->
        <?php if($user->isLoggedIn()) {
            include 'logout_button.php';
        } ?>
        <!--shows add post button when admin is logged in-->
        <?php if($user->isAdmin()){
           ?><button class="button d-lg-none"><a href="../includes/add_post.php"><span>add post </span></a></button>
         <?php }?>
      </div>

    </div>
  </div>
</header>
