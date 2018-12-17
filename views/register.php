<?php
session_start();
include '../classes/call.php';
if($val->isLoggedIn()) 
{
    $val->redirect('../index.php');
}
?>
<?php include '../includes/head.php'; ?>

<body>

<?php include '../includes/header.php';?>

<div class="container-fluid">
	<main class="row justify-content-center ml-0 mr-0">
		<div class="col-11 col-md-6 register-box">

			<h2>Register</h2>

			<p class="error-message"> <?php if (isset($_GET["error"])){ echo "* ". $_GET["error"]; } ?> </p>

			<form action="../includes/register_sql.php" method="POST">

				<label for="first_name">First name</label>
				<input type="text" id="first_name" name="first_name" required>

				<label for="last_name">Last name</label>
				<input type="text" id="last_name" name="last_name" required>

				<label for="email">Email</label>
				<input class="input" type="email" id="email" name="email" required>

				<label for="date_of_birth">Date of birth</label>
				<input class="input" type="date" id="date_of_birth" name="date_of_birth" required>

				<label for="username">Username</label>
				<input type="text" id="username" name="username" required>

				<label for="password">Password</label>
				<input class="input" type="password" id="password" name="password" required>

				<button class="button-static"><span>Register </span></button>
			</form>
  			<a href="login.php">Already a member? Go to login.</a><br>
		</div>
	</main>
</div>

 <?php include '../includes/javascript_tag.php';?>
 <?php include '../includes/footer.php'; ?>
