<?php

try

{

       // On se connecte à MySQL

       $bdd = new PDO('mysql:host=localhost;dbname=db', 'root', '');

}

catch(Exception $e)

{

       // En cas d'erreur, on affiche un message et on arrête tout

       die('Erreur : '.$e->getMessage());

}

       

// Si tout va bien, on peut continuer



// On récupère tout le contenu de la table jeux_video

$reponse = $bdd->query('SELECT * FROM depots');



// On affiche chaque entrée une à une

while ($donnees = $reponse->fetch())

{

  print($donnees['name']);

}

       

$reponse->closeCursor(); // Termine le traitement de la requête



?>