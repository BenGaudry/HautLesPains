<?php require_once '../../res/components/header.php'; ?>

<h1 class="page-title">Se connecter</h1>

<form action="../../config/process/login-process.php" method="POST" class="auth-form">

  <label class="input-desc" for="email">Email</label>
  <input type="email" name="email" id="email">

  <label class="input-desc" for="pass">Mot de passe</label>
  <input type="password" name="pass" id="pass">

  <button type="submit" class="auth-submit">Connexion</button>

</form>

<!-- <script>
  window.onload = () => {
    addCountryCodes('country-code');
  }
</script> -->

<?php require_once '../../res/components/footer.php'; ?>
