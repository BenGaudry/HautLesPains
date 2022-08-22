<?php

header('Content-Type: application/json');

  require_once('../databaseConnect.php');
  $recuptype = $bdd->prepare('SELECT * FROM depots');
	$recuptype->execute();
  $types = $recuptype->fetchAll(PDO::FETCH_ASSOC);
 
  $result['returned']['success'] = true;
  $result['returned']['message'] = 'SUC: Auth key valid';
  $result['returned']['nb'] = count($types);
  $result['types'] = $types;

echo(json_encode($result));

?>