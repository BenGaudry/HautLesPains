<?php 

require_once('../databaseConnect.php');

class Cart {

  public function addItem(string $item_name, int $item_quantity, array $item_options = NULL) {

    $req = $bdd->prepare('INSERT INTO cart(item_name, item_quantity, bread_mold) VALUES (:name, :qty, :mold)');
    $req->execute([
      'name' => $item_name,
      'qty' => $item_quantity,
      'mold' => $item_options['mold']
    ]);

  }

}