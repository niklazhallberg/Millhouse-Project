<?php

include 'db_con.php';
include 'User.php';
include 'Posts.php';
include 'Comments.php';
include 'Validation.php';

$user = new User($pdo);
$posts = new Posts($pdo);
$comments = new Comments($pdo);
$val = new Validation($pdo);
