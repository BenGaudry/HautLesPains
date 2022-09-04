<?php

require_once('../../config/databaseConnect.php');

// On va récupérer la variable verified dans la table
$req = $bdd->prepare('SELECT emailVerified FROM users WHERE id = :id');
$req->execute([
  'id' => $_SESSION['id']
]);
$data = $req->fetch();

if ($data['emailVerified'] !== 1) {
  // L'email n'est pas vérifié
  if (isset($_POST['checkemail'])) {

    $req = $bdd->prepare('SELECT * FROM email_confirm WHERE email = :email ORDER BY id DESC ');
    $req->execute([
      'email' => $_SESSION['email']
    ]);
    $data = $req->fetch();
    $codeEntered = strval($_POST['one'] . $_POST['two'] . $_POST['three'] . $_POST['four'] . $_POST['five'] . $_POST['six']);
    
    if ($codeEntered === $data['otp']) {

      $req = $bdd->query('UPDATE users SET emailVerified = 1 WHERE id = "' . $_SESSION['id'] . '"');
      sendEmail('Inscription confirmee', 'Félicitations ' . $_SESSION['user'] . ' !', 'La vérification de votre compte Haut Les Pains à été faite, vous pouvez désormais commander en ligne.');
      header('Location: ../index.php?n=CESUC1');

    } else header('Location: checkEmail.php?n=CEERR1');

  } else {

    // Génération d'un code aléatoire à six chiffres
    $code = random_int(121569, 945863);
    // Définition de la date d'expiration
    $twoMinLater = intval(date('i')) + 2;
    $stopDate  = date('Y') . '-' . date('m') . '-' . date('d') . ' ' . date('h') . ':' . strval($twoMinLater) . ':' . date('s');

    // Insertion dans la table email_confirm
    $req = $bdd->prepare('INSERT INTO email_confirm(email, otp, validUntil) VALUES (:email, :otp, :validUntil)');
    $req->execute([
      'email' => $_SESSION['email'],
      'otp' => $code,
      'validUntil' => $stopDate
    ]);

    // Envoi de l'email contenant l'OTP
    sendEmail(
      'Veuillez valider l\'inscription',
      'Bonjour ' . $_SESSION['user'],
      'Nous avons bien pris en compte votre demande d\'inscription au service en ligne de Haut les Pains.<br>Il reste simplement une dernière étape : valider votre email. Pour cela, entrez le code çi-dessous sur la page de validation :<br><br><b style="font-size: 1.5em;text-align:center;">' . $code . '</b><br><br>Ce n\'était pas vous ? Ignorez ce mail.',
    );
  }
} else header('Location: ../index.php');

?>

<?php require_once '../../res/components/header.php'; ?>

<h1 class="page-title">Vérifier l'email</h1>
<p class="text-centered">Un code OTP a 6 chiffres vous a été envoyé par email</p>
<p class="text-centered">Vous pouvez le taper, ou le coller çi-dessous</p>

<form action="" method="POST">
  <div class="otp-field">
    <input type="text" name="one" maxlength="1">
    <input type="text" name="two" maxlength="1">
    <input class="space" type="text" name="three" maxlength="1">
    <input type="text" name="four" maxlength="1">
    <input type="text" name="five" maxlength="1">
    <input type="text" name="six" maxlength="1">
  </div>

  <input type="submit" value="Confirmer" name="checkemail">
</form>

<?php require_once '../../res/components/footer.php'; ?>