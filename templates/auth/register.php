<?php require_once '../../res/components/header.php'; ?>

<h1 class="page-title">S'inscrire</h1>

<form action="register-password.php" method="POST" class="auth-form">
  <label class="input-desc" for="prenom">Prénom</label>
  <input type="text" name="prenom" id="prenom" required>

  <label class="input-desc" for="nom">Nom de famille</label>
  <input type="text" name="nom" id="nom" required>

  <label class="input-desc" for="email">Email</label>
  <input type="email" name="email" id="email" required>

  <label class="input-desc" for="tel">Téléphone</label>
  <div class="tel-input">
    <!-- <select name="country-code" id="country-code"></select> -->
    <input type="text" name="dial-code" class="dial-code" value="+33" required>
    <input type="tel" name="tel" id="tel" required>
  </div>

  <button type="submit" class="auth-submit">Suivant</button>

  <?php
    $progressBarSections = 3;
    $activeSections = 1;
    require_once('../../res/components/progress-bar.php');
  ?>
</form>

<!-- <script>
  window.onload = () => {
    addCountryCodes('country-code');
  }
</script> -->

<?php require_once '../../res/components/footer.php'; ?>
