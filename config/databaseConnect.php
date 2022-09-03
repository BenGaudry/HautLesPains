<?php
  session_start();
  $username = "root";
  $password = "";

  try{
    $bdd = new PDO('mysql:host=localhost;dbname=hautlespains', $username, $password);
    //On définit le mode d'erreur de PDO sur Exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    require_once('functions.php');
  }
  

  catch(PDOException $e){
    die('Erreur : '.$e->getMessage());
  }
?>