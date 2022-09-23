<?php 
require_once '../../res/components/header.php';
require_once('../../config/databaseConnect.php');
?>


<h1 class="page-title">S'inscrire</h1>

<form action="finir-inscription" method="POST" class="auth-form">
  <label class="input-desc" for="prenom">Prénom</label>
  <input type="text" name="prenom" id="prenom" required onchange="check.str(this)">

  <label class="input-desc" for="nom">Nom de famille</label>
  <input type="text" name="nom" id="nom" required onchange="check.str(this)">

  <label class="input-desc" for="email">Email</label>
  <input type="email" name="email" id="email" required onchange="check.email(this)">

  <label class="input-desc" for="tel">Téléphone</label>
  <div class="tel-input">
    <!-- <select name="country-code" id="country-code"></select> -->
    <input type="text" name="dial-code" class="dial-code" value="+33" required  required onchange="check.dialCode(this)">
    <input type="tel" name="tel" id="tel" required  required onchange="check.tel(this)">
  </div>

  <button type="submit" class="auth-submit">Suivant</button>

  <?php
    $progressBarSections = 3;
    $activeSections = 1;
    require_once('../../res/components/progress-bar.php');
  ?>

  <p class="change-auth-method">Déjà connecté ? <a href="login.php">Connectez-vous</a></p>

</form>

<!-- <script>
  window.onload = () => {
    addCountryCodes('country-code');
  }
</script> -->
<script src="../../res/scripts/auth-checkings.js"></script>

<?php require_once '../../res/components/footer.php'; ?>
