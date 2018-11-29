<?php

$pdo = new PDO(
      "mysql:host=localhost;port=8889;dbname=millhouse;charset=utf8",
      "root",
      "root"
);

//this shows PDO errors
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//fetching as associative array
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


