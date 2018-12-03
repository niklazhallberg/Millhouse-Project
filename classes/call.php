<?php

include 'db_con.php';
include 'User.php';
include 'Posts.php';

$user = new User($pdo);
$posts = new Posts($pdo);
