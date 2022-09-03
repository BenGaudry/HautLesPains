<form action="<?= $__path__ ?>config/process/edit-profile-process.php" method="POST">

<section class="profile-content-section">
  <h2><i class="fi fi-rr-pencil"></i>Mes informations</h2>

  <div class="content">
    <div class="form-group">
      <label for="prenom">Prénom</label>
      <input type="text" value="<?= $_SESSION['user'] ?>" id="prenom" name="prenom" required>
    </div>

    <div class="form-group">
      <label for="nom">Nom</label>
      <input type="text" value="<?= $_SESSION['lastName'] ?>" id="nom" name="nom" required>
    </div>
    
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" value="<?= $_SESSION['email'] ?>" id="email" name="email" required>
    </div>
    
    <div class="form-group">
      <label for="tel">Tel</label>
      <input type="tel" value="<?= $_SESSION['tel'] ?>" id="tel" name="tel" required>
    </div>
  </div>

  <input type="submit" value="Modifier mes informations" name="edit-account">
</section>

<section class="profile-content-section">
  <h2><i class="fi fi-rr-settings"></i>Préférences</h2>
  <section>
    <h5>Notifications</h5>
  </section>
</section>

<section class="profile-content-section">
  <h2><i class="fi fi-rr-lock"></i>Mot de passe</h2>

  <div class="content">
    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" name="password" id="password" placeholder="*****">
    </div>

    <div class="form-group">
      <label for="password-confirm">Confirmer le mot de passe</label>
      <input type="password" name="password-confirm" id="password-confirm" placeholder="*****">
    </div>
  </div>
</section>

<section class="profile-content-section danger-zone">
  <h2><i class="fi fi-rr-shield-exclamation"></i>Danger zone</h2>
  <p>Vous n'êtes pas satisfaits du contenu du site ? Vous pouvez supprimer votre compte</p>
  <p><b>Attention cette opération est irréversible</b></p>

  <input type="submit" value="Supprimer mon compte" name="delete-account">
</section>

</form>