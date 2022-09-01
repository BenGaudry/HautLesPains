<?php
  session_start();
    $username = "root";
    $password = "";

    try{
      $bdd = new PDO('mysql:host=localhost;dbname=hautlespains', $username, $password);
      //On définit le mode d'erreur de PDO sur Exception
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		function getIp(){
			if(!empty($_SERVER['HTTP_CLIENT_IP'])){
				  $ip = $_SERVER['HTTP_CLIENT_IP'];
				} elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				} else {
				  $ip = $_SERVER['REMOTE_ADDR'];
				}
			return $ip;
		}

    $__path__ = 'http://localhost/HautLesPains2/';

  }
  

    catch(PDOException $e){
      die('Erreur : '.$e->getMessage());
    }
?>