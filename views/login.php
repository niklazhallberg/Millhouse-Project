<?php
session_start();
include '../classes/call.php';
if($val->isLoggedIn()) {
    $val->redirect('../index.php');
}
?>
<?php
include '../includes/head.php';
?>

<body>
	<?php include '../includes/header.php'; ?>

<div class="container-fluid">

	<main class="row main justify-content-center mr-0 ml-0">

			<div class="col-11 col-md-6 register-box">

				<h2>Welcome to Millhouse</h2>

				<p class="error-message">
				<?php if (isset($_GET["error"])){
					echo "* ". $_GET["error"];
				} ?> </p>

			<form action="../includes/login_sql.php" method="POST">
  				<label for="username">Username</label>
  				<input type="text" name="username" id="username" required>

  				<label for="password">Password</label>
  				<input class="input" type="password" name="password" id="password" required>
  				<button class="button-static"><span>Login </span></button>
			</form>

			<a href="register.php">Not already a member? Register here</a>

		</div>

	</main>



</div>

 <?php include '../includes/javascript_tag.php'; ?>
 <?php include '../includes/footer.php'; ?>
</body>
