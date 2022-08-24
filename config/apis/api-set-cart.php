<?php 

require_once('../databaseConnect.php');

function add_item_to_cart(string $item_name, int $item_quantity, array $item_options = NULL) {

    $req = $bdd->prepare('INSERT INTO cart(item_name, item_quantity, bread_mold) VALUES (:name, :qty, :mold)');
    $req->execute([
      'name' => $item_name,
      'qty' => $item_quantity,
      'mold' => $item_options['mold']
    ]);

}


if(isset($_GET['name']) && isset($_GET['qty'])){
  
  $Cart.add_item_to_cart($_GET['name'], $_GET['qty'], ['mold' => 1]);

}