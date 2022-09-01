<?php require_once '../../res/components/header.php'; ?>

<h1 class="page-title">Modifier le mot de passe</h1>

<form action="../../config/process/register-process.php" method="POST" class="auth-form">

  <label class="input-desc" for="pass">Nouveau mot de passe</label>
  <input type="password" name="pass" id="pass">

  <label class="input-desc" for="pass-confirm">Confirmer le mot de passe</label>
  <input type="password" name="pass-confirm" id="pass-confirm">

  <button type="submit" class="auth-submit">Réinitialiser</button>

</form>

<?php require_once '../../res/components/footer.php'; ?>
