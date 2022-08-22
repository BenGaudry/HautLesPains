<?php

  header('Content-Type: application/json; charset=utf-8');

  require_once('../databaseConnect.php');
  $recuptype = $bdd->prepare('SELECT * FROM depots');
	$recuptype->execute();
  $depots = $recuptype->fetchAll(PDO::FETCH_ASSOC);
 
  $result['depots'] = $depots;

  echo("{\n");
  foreach ($depots as $i => $depot) {
    $i++;
    $name = $depot['name'];
    $lat = $depot['lat'];
    $lon = $depot['lon'];
    // echo("\"$i\": {\"name\": \"$name\"");
    $length = count($depots);

    if($i !== $length){
      echo <<< JSON
  "$i": {"name": "$name", "lat" : $lat, "lon" : $lon},\n
JSON;
    } else {
      echo <<< JSON
  "$i": {"name": "$name", "lat" : $lat, "lon" : $lon}\n
JSON;
    }
  }
  echo("}");
?>