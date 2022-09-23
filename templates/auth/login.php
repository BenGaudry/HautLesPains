<?php 
require_once '../../res/components/header.php';
require_once('../../config/databaseConnect.php');
?>


<h1 class="page-title">Se connecter</h1>

<form action="<?= $__path__ ?>config/process/login-process.php" method="POST" class="auth-form">

  <label class="input-desc" for="email">Email</label>
  <input type="email" name="email" id="email" required onchange="check.email(this)">

  <label class="input-desc" for="pass">Mot de passe</label>
  <input type="password" name="pass" id="pass" required onchange="check.password(this)">

  <button type="submit" class="auth-submit">Connexion</button>

  <p class="change-auth-method">Pas encore de compte ? <a href="<?= $__path__ ?>profil/inscription">Inscrivez-vous</a></p>
  <p class="change-auth-method"><a href="forgot-pass.php">Mot de passe oublié ?</a></p>

</form>

<script src="../../res/scripts/auth-checkings.js"></script>

<?php require_once '../../res/components/footer.php'; ?>
