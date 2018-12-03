<?php 

try
{
     $pdo = new PDO("mysql:host=localhost;port=8889;dbname=millhouse;charset=utf8","root","root");
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $error)
{
  echo $error->getMessage();
}
