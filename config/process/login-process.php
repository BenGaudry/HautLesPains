<?php
  require_once '../databaseConnect.php';

  // if(isset($_COOKIE['authToken']) && isset($_COOKIE['id'])){
  //   $req = $bdd->prepare('SELECT id, prenom, nom, email, tel, registerDate FROM users WHERE id = :id');
  //   $req->execute(array('id' => $_COOKIE['id']));
  //   $data = $req->fetch();
  //   if(!empty($data)){
  //     $token = hash('sha256',$data['prenom'] . $data['email']);
  //     if($token === $_COOKIE['authToken']){
  //      set_session_vars($data['id'], $data['prenom'], $data['nom'], $data['email'], $data['tel'], $data['registerDate']);

  //       setcookie("authToken", $token, time()+60*60*24*365); // le coookie expire dans 365 jours
  //       setcookie('id', $data['id'], time()+60*60*24*365);

  //       header('Location: ../../templates/index.php?n=FSUC2');
  //     }
  //   }
  // } else {

  if(isset($_POST['email']) && isset($_POST['pass'])){ // les champs sont renseignés
    sleep(1);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['pass']);

    $check = $bdd->prepare('SELECT id, prenom, nom, email, tel, pass, registerDate FROM users WHERE email = :email');
    $check->execute(['email' => $email]);
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row == 1){ //l'utilisateur existe
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){// format email valide
        $pass = hash('sha256', $pass);
        if($data['pass'] === $pass){

          set_session_vars($data['id'], $data['prenom'], $data['nom'], $email, $data['tel'], $data['registerDate']);

          $token = hash('sha256',$data['prenom'] . $data['email']);
          setcookie("authToken", $token, time()+60*60*24*365); // le coookie expire dans 365 jours
          setcookie('id', $data['id'], time()+60*60*24*365);


          // $req = $bdd->prepare('SELECT notifyWhenConnect FROM users WHERE id = ?');
          // $req->execute(array($_SESSION['id']));
          // $data = $req->fetch();
          // $notify = $data['notifyWhenConnect'];
          // if($notify == 1){
          //   sendMail('Connexion detectee', 'Bonjour '.$_SESSION['user'], 'Une nouvelle connexion à votre compte Haut les Pains a été détectée !<br><br><b>Si c\'était vous : </b>Ignorez cet email<br><br><b>Si ce n\'était pas vous : </b>Changez votre mot de passe');
          // }
          header('Location:../../templates/index.php?n=FSUC2');

        } else header('Location:../../templates/auth/login.php?n=FERR7');
      } else header('Location:../../templates/auth/login.php?n=FERR4');
    } else  header('Location:../../templates/auth/login.php?n=FERR6');
  } else header('Location:../../templates/auth/login.php?n=FERR1');
// }