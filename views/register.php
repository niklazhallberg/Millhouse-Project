<?php
include '../includes/head.php';
?>

<body>

<?php include '../includes/header.php';?>

<div class="container">

	<main class="row justify-content-center">

			<div class="col-12 col-md-4 register-box">

				<h3>Welcome to Millhouse</h3>

			<form action="login_register_sql.php" method="POST">

				<label for="firstname">Firstname</label>
  				<input type="text" id="firstname" name="username">

  				<label for="lastname">Lastname</label>
  				<input type="text" id="lastname" name="username">

  				<label for="age">Age</label>
  				<input type="date" id="age" name="username">

  				<label for="username">Username</label>
  				<input type="text" id="username" name="username">

  				<label for="password">Password</label>
  				<input type="password" id="password" name="password"><br>

  				<label for="email">Email</label>
  				<input type="text" id="email" name="username"><br>

				<a href="login.php">Already member? Go to login</a><br>
  				<input type="submit" value="Register">
			</form>

		</div>

	</main>



</div>

 <?php include '../includes/javascript_tag.php';?>

</body>

</html>