<?php session_start();

if(empty($_SESSION["user_id"])){
  header('location: ../views/login.php');
}
?>

<?php include 'includes/head.php'; ?>

<body>
<?php include 'includes/header.php'; ?>


 <?php include 'includes/javascript_tag.php'; ?>
</body>
</html>
