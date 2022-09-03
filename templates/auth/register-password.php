<?php 

require_once('../../config/databaseConnect.php');

// Checkings :

if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['tel'])) {
  sleep(1);
  $name = htmlspecialchars($_POST['prenom']);
	$lastName = htmlspecialchars($_POST['nom']);
	$email = htmlspecialchars($_POST['email']);
  $dialCode = htmlspecialchars($_POST['dial-code']);
	$phone = htmlspecialchars($_POST['tel']);

  $check = $bdd->prepare('SELECT prenom, email, pass FROM users WHERE email = :email');
  $check->execute(array('email' => $email));
  $data = $check->fetch();
  $row = $check->rowCount();

  if($row == 0){
    if(strlen($email) < 255){
      if(strlen($name) < 100){
        if(strlen($lastName) < 100){
          if(filter_var($email, FILTER_VALIDATE_EMAIL)){

          } else header('Location:register.php?n=FERR4');
        } else header('Location:register.php?n=FERR3');
      } else header('Location:register.php?n=FERR3');
    } else header('Location:register.php?n=FERR3');
  } else header('Location:register.php?n=FERR2');
} else header('Location:register.php?n=FERR1');

?>

<?php require_once '../../res/components/header.php'; ?>

<h1 class="page-title">S'inscrire</h1>

<form action="../../config/process/register-process.php" method="POST" class="auth-form">
  <input type="hidden" name="prenom" value="<?= $name ?>">
  <input type="hidden" name="nom" value="<?= $lastName ?>">
  <input type="hidden" name="email" value="<?= $email ?>">
  <input type="hidden" name="tel" value="<?= $dialCode.$phone ?>">


  <label class="input-desc" for="pass">Mot de passe</label>
  <input type="password" name="pass" id="pass">

  <label class="input-desc" for="pass-confirm">Confirmer le mot de passe</label>
  <input type="password" name="pass-confirm" id="pass-confirm">

  <button type="submit" class="auth-submit">Terminer l'inscription</button>

  <?php
    $progressBarSections = 3;
    $activeSections = 2;
    require_once('../../res/components/progress-bar.php');
  ?>
</form>

<!-- <script>
  window.onload = () => {
    addCountryCodes('country-code');
  }
</script> -->

<?php require_once '../../res/components/footer.php'; ?>
