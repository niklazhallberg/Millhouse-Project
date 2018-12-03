<?php
session_start();
include '../classes/call.php';
if(!$user->isLoggedIn()) {
    $user->redirect('login.php');
} 
if(!$user->isAdmin()) {
    $user->redirect('../index.php');
}
?>
<?php include '../includes/head.php' ?>

<body>
  
  <?php include '../includes/header.php' ?>


</body>
</html>


