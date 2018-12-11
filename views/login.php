<?php
session_start();
include '../classes/call.php';
if($user->isLoggedIn()) {
    $user->redirect('../index.php');
}
?>
<?php
include '../includes/head.php';
?>

<body>
	<?php include '../includes/header.php'; ?>

<div class="container-fluid">

	<main class="row justify-content-center ml-0 mr-0">

			<div class="col-11 col-md-6 register-box">

				<h3>Welcome to Millhouse</h3>

				<p class="error-message">
					<?php if (isset($_GET["error"])){
   					echo $_GET["error"];
 					} ?> </p>

			<form action="../includes/login_sql.php" method="POST">
  				<label for="username">Username</label>
  				<input type="text" name="username" id="username" required>

  				<label for="password">Password</label>
  				<input class="input" type="password" name="password" id="password" required>
  				<input type="submit" value="Login">
			</form>

			<a href="register.php">Not already a member? Register here</a>

		</div>

	</main>



</div>

 <?php include '../includes/javascript_tag.php'; ?>
 <?php include '../includes/footer.php'; ?>
</body>
