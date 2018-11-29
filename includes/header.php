<header class="row justify-content-center mr-0 ml-0">
      <div class="col-6 col-lg-4 header-logo">
        <a href="../index.php"><img src="../images/logo_dark.png"  alt="Millhouse logo"></a>
      </div>

      <?php
      if(isset($_SESSION["user_id"])){
      include 'logout_button.php';
      }
      ?>

      <?php
if (isset($_SESSION["admin"])) {
    echo "Congratulations! You have special privileges. Use them wisely.";
}
?>
</header>
