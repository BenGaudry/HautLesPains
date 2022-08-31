<?php

  header('Content-Type: application/json; charset=utf-8');

  require_once('../databaseConnect.php');
  $recupProducts = $bdd->prepare('SELECT * FROM products ORDER BY name ASC');
	$recupProducts->execute();
  $types = $recupProducts->fetchAll(PDO::FETCH_ASSOC);
 
  echo("{\n");
  foreach ($types as $i => $type) {
    $i++;
    $name = $type['name'];
    $path = $type['imgName'];
    $price = $type['price'];
    $kiloPrice = $type['kiloPrice'];
    $weight = $type['weight'];
    // echo("\"$i\": {\"name\": \"$name\"");
    $length = count($types);

    if($i !== $length){
      echo <<< JSON
  "$i": {"name": "$name", "path" : "$path", "weight" : $weight, "price" : $price, "kiloPrice": $kiloPrice},\n
JSON;
    } else {
      echo <<< JSON
  "$i": {"name": "$name", "path" : "$path", "weight" : $weight, "price" : $price, "kiloPrice": $kiloPrice}\n
JSON;
    }
  }
  echo("}");
?>