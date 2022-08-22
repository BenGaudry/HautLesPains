<?php

  header('Content-Type: application/json; charset=utf-8');

  require_once('../databaseConnect.php');
  $recuptypes = $bdd->prepare('SELECT * FROM bread_types ORDER BY name ASC');
	$recuptypes->execute();
  $types = $recuptypes->fetchAll(PDO::FETCH_ASSOC);
 
  echo("{\n");
  foreach ($types as $i => $type) {
    $i++;
    $name = $type['name'];
    $path = 'res/img/breads/'.$type['img_path'];
    $weight = $type['weight'];
    // echo("\"$i\": {\"name\": \"$name\"");
    $length = count($types);

    if($i !== $length){
      echo <<< JSON
  "$i": {"name": "$name", "path" : "$path", "weight" : $weight},\n
JSON;
    } else {
      echo <<< JSON
  "$i": {"name": "$name", "path" : "$path", "weight" : $weight}\n
JSON;
    }
  }
  echo("}");
?>