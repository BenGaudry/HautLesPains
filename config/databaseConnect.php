<?php
    session_start();
    $username = "root";
    $password = "";

    try{
        $bdd = new mysqli("localhost", $username, $password, "hautlespains");
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

    function transformSpecialChars($string){
      $chars = array('é', 'è', 'É', 'È', 'à', '€', 'ç');
      $replaceBy = array('&#233;','&#232;','&#201;','&#200;','&#224;', '&#8364;', '&#231;');
      return(str_replace($chars, $replaceBy, $string));
    }

    
  }
  

    catch(PDOException $e){
      die('Erreur : '.$e->getMessage());
    }
?>