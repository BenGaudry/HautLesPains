<?php 
require_once '../../res/components/header.php';
require_once('../../config/databaseConnect.php');
?>


<h1 class="page-title">Se connecter</h1>

<form action="../../config/process/login-process.php" method="POST" class="auth-form">

  <label class="input-desc" for="email">Email</label>
  <input type="email" name="email" id="email">

  <label class="input-desc" for="pass">Mot de passe</label>
  <input type="password" name="pass" id="pass">

  <button type="submit" class="auth-submit">Connexion</button>

  <p class="change-auth-method">Pas encore de compte ? <a href="register.php">Inscrivez-vous</a></p>
  <p class="change-auth-method"><a href="forgot-pass.php">Mot de passe oublié ?</a></p>
</form>

<!-- <script>
  window.onload = () => {
    addCountryCodes('country-code');
  }
</script> -->

<?php require_once '../../res/components/footer.php'; ?>
