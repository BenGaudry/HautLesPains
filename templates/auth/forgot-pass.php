<?php require_once '../../res/components/header.php'; ?>


<h1 class="page-title">Mot de passe oublié</h1>

<form action="../../config/process/forgot-pass-process.php" method="POST" class="auth-form">

  <label class="input-desc" for="email">Email</label>
  <input type="email" name="email" id="email">

  <button type="submit" class="auth-submit">Réinitialiser</button>

  <p class="change-auth-method" style="margin-top: 10px">Un éclair de génie ? <a href="login.php">Connectez-vous</a></p>
</form>

<?php require_once '../../res/components/footer.php'; ?>