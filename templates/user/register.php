<?php require_once '../../res/components/header.php'; ?>

<h1 class="page-title">S'inscrire</h1>

<form action="" method="POST" class="auth-form">
  <label class="input-desc" for="prenom">Prénom</label>
  <input type="text" name="prenom" id="prenom">

  <label class="input-desc" for="nom">Nom de famille</label>
  <input type="text" name="nom" id="nom">

  <label class="input-desc" for="email">Email</label>
  <input type="email" name="email" id="email">

  <label class="input-desc" for="tel">Téléphone</label>
  <div class="tel-input">
    <!-- <select name="country-code" id="country-code"></select> -->
    <input type="text" class="dial-code" value="+33">
    <input type="tel" name="tel" id="tel">
  </div>

  <button type="submit" class="auth-submit">Suivant</button>
</form>

<!-- <script>
  window.onload = () => {
    addCountryCodes('country-code');
  }
</script> -->

<?php require_once '../../res/components/footer.php'; ?>
