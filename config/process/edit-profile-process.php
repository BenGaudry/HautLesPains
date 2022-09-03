<?php

require_once('../databaseConnect.php');

if(isset($_POST['edit-account'])) {
  if(
  isset($_POST['prenom']) && !empty($_POST['prenom']) &&
  isset($_POST['nom']) && !empty($_POST['nom']) &&
  isset($_POST['email']) && !empty($_POST['email']) &&
  isset($_POST['tel']) && !empty($_POST['tel'])
  ) {

    // déf des variables
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);

    $req = $bdd->prepare('UPDATE users SET prenom = :prenom, nom = :nom, email = :email, tel = :tel WHERE id = '.$_SESSION['id']);
    print_r($req);
    $req->execute([
      'prenom' => $prenom,
      'nom' => $nom,
      'email' => $email,
      'tel' => $tel
    ]);

    set_session_vars(1, 1, 1, 1, 1);

    // header('Location: ../../templates/profile.php?tab=informations&n=FSUC1');

  } else header('Location: ../../templates/profile.php?tab=informations&n=FERR1');
} else header('Location: ../../templates/profile.php?tab=informations');

?>