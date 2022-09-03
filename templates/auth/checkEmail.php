<?php 

require_once '../../res/components/header.php';
session_start();

// mail($_SESSION['email'], "Nouvelle connexion", "Nouvelle connexion détectée");

?>

<h1 class="page-title">Vérifier l'email</h1>
<p class="text-centered">Un code OTP a 6 chiffres vous a été envoyé par email</p>
<p class="text-centered">Vous pouvez le taper, ou le coller çi-dessous</p>

<div class="otp-field">
  <input type="text" name="" id="" maxlength="1">
  <input type="text" name="" id="" maxlength="1">
  <input class="space" type="text" name="" id="" maxlength="1">
  <input type="text" name="" id="" maxlength="1">
  <input type="text" name="" id="" maxlength="1">
  <input type="text" name="" id="" maxlength="1">
</div>

<?php require_once '../../res/components/footer.php'; ?>
