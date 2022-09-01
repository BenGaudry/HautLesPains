<?php

require_once('../databaseConnect.php');
require_once('../functions.php');


if(isset($_POST['email'])){ // les champs sont renseignés
  $email = htmlspecialchars($_POST['email']);

  $check = $bdd->prepare('SELECT email FROM users WHERE email = :email');
  $check->execute(['email' => $email]);
  $data = $check->fetch();
  $row = $check->rowCount();

  if($row == 1){ //l'utilisateur existe
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){// format email valide
      sendEmail(
        "Demande de réinitialisation du mot de passe",
        "Votre compte à fait l'objet d'une demande de réinitialisation de mot de passe",
        "Pour recréer un mot de passe, cliquez ici : 
        <a href=\"".$__path__."templates/auth/reset-pass.php\">Recréer</a>",
        [
          'mailto' => $email
        ]
      );
    } else  header('Location:../../templates/auth/login.php?n=FERR6');
  } else header('Location:../../templates/auth/login.php?n=FERR1');
}

?>