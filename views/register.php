<?php
include '../includes/head.php'; 
?>

<body>

<?php include '../includes/header.php';?>

<div class="container">

	<main class="row justify-content-center">

			<div class="col-12 col-md-4 register-box">

				<h3>Welcome to Millhouse</h3>

        <p class="error-message">
          <?php if (isset($_GET["error"])){
            echo $_GET["error"];
          } ?> </p>

			<form action="../includes/register_sql.php" method="POST">

				<label for="first_name">First name</label><br>
  				<input type="text" id="first_name" name="first_name" required="true">

  				<label for="last_name">Last name</label><br>
  				<input type="text" id="last_name" name="last_name" required="true">

				<label for="email">Email</label><br>
  				<input type="email" id="email" name="email" required="true"><br>

  				<label for="date_of_birth">Date of birth</label><br>
  				<input type="date" id="date_of_birth" name="date_of_birth" required="true">

  				<label for="username">Username</label><br>
  				<input type="text" id="username" name="username" required="true">

  				<label for="password">Password</label><br>
  				<input type="password" id="password" name="password" required="true"><br>

				<a href="login.php">Already a member? Go to login</a><br>
  				<input type="submit" value="Register">

			</form>

		</div>

	</main>



</div>

 <?php include '../includes/javascript_tag.php';?>

</body>

</html>
