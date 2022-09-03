<?php

require_once('../../config/functions.php');


if(!isset($_SESSION)) {
  session_start();
}

print(sendEmail(
  'Nouvelle connexion détectée',
  "Bonjour ".$_SESSION['user'].", une nouvelle connexion à été détectée sur votre compte Haut Les Pains",
  "<b>C'était vous ?</b><br>Ignorez ce message...<br><br><b>Ce n'était pas vous ?</b><br>Nous vous conseillons de changer de mot de passe <a href=\"\">ici</a>",
  ["mailto" => "bengaudry@outlook.fr"]
));

?>