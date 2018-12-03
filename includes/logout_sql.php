<?php 

session_start();

include '../classes/call.php';

$user->logout();
$user->redirect('../index.php');
