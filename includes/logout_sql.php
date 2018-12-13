<?php 
session_start();
include '../classes/call.php';

$user->logout();
$val->redirect('../index.php');
