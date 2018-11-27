<?php session_start();

if(empty($_SESSION["user_id"])){
  header('location: ../views/login.php');
}
else{
   include 'includes/head.php';


  include 'includes/header.php';


  include 'includes/javascript_tag.php';
}
?>

</html>
