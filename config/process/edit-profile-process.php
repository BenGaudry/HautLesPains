<?php

require_once('../databaseConnect.php');

if(isset($_POST['edit-account'])) { // Demande de modifications d'informations
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

    // Requête pour mettre les données à jour
    $req = $bdd->prepare('UPDATE users SET prenom = :prenom, nom = :nom, email = :email, tel = :tel WHERE id = '.$_SESSION['id']);
    print_r($req);
    $req->execute([
      'prenom' => $prenom,
      'nom' => $nom,
      'email' => $email,
      'tel' => $tel
    ]);

    // On update les données de $_SESSION
    set_session_vars(NULL, $prenom, $nom, $email, $tel);
    header('Location: ../../templates/profile.php?tab=informations&n=FSUC1');

  } else header('Location: ../../templates/profile.php?tab=informations&n=FERR1');

} else if (isset($_POST['delete-account'])) { // Demande de suppression du compte

  // Requête pour insérer toutes les infos dans la base des utilisateurs supprimés
  $insertReq = $bdd->prepare('INSERT INTO deleted_users(old_user_id, prenom, nom, email, tel, registerDate, ip) VALUES (:id, :prenom, :nom, :email, :tel, :registerDate, :ip)');
  $insertReq->execute([
    'id' => $_SESSION['id'],
    'prenom' => $_SESSION['user'],
    'nom' => $_SESSION['lastName'],
    'email' => $_SESSION['email'],
    'tel' => $_SESSION['tel'],
    'registerDate' => $_SESSION['registerDate'],
    'ip' => getIp()
  ]);


  // Requête pour supprimer l'utilisateur de la table des utilisateurs actifs
  $deleteReq = $bdd->prepare('DELETE FROM users WHERE id = '.$_SESSION['id']);
  $deleteReq->execute();

  // On déconnecte l'utilisateur pour éviter les bugs
  header('Location: logout.php');

} else if (isset($_POST['edit-password'])) {
  
  if(
    isset($_POST['edited-password']) && !empty($_POST['edited-password']) &&
    isset($_POST['edited-password-confirm']) && !empty($_POST['edited-password-confirm'])
  ) {
    
    if($_POST['edited-password'] === $_POST['edited-password-confirm']) {

      // Hash du nouveau mot de passe 
      $newpass = hash('sha256', $_POST['edited-password']);

      // Insertion dans la base
      $insertReq = $bdd->prepare('UPDATE users SET pass = :pass WHERE id = :id');
      $insertReq->execute([
        'id' => $_SESSION['id'],
        'pass' => $newpass
      ]);

      // Redirection
      header('Location: ../../templates/profile.php?tab=informations&n=FSUC1');

    } else header('Location: ../../templates/profile.php?tab=informations&n=FERR5');
  } else header('Location: ../../templates/profile.php?tab=informations&n=FERR1');

} else header('Location: ../../templates/profile.php?tab=informations');


?>