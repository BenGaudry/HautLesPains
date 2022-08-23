<?php

  header('Content-Type: application/json; charset=utf-8');

  require_once('../databaseConnect.php');
  $recupPrices = $bdd->prepare('SELECT * FROM prices');
	$recupPrices->execute();
  $produits = $recupPrices->fetchAll(PDO::FETCH_ASSOC);
 
  echo("{\n");
  foreach ($produits as $i => $produit) {
    $i++;
    $name = $produit['product_name'];
    $price = $produit['price'];
    $kiloPrice = $produit['kilo_price'];
    // echo("\"$i\": {\"name\": \"$name\"");
    $length = count($produits);

    if($i !== $length){
      echo <<< JSON
  "$i": {"name": "$name", "price" : $price, "kiloPrice" : $kiloPrice},\n
JSON;
    } else {
      echo <<< JSON
  "$i": {"name": "$name", "price" : $price, "kiloPrice" : $kiloPrice}\n
JSON;
    }
  }
  echo("}");
?>