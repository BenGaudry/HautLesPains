<form action="../../config/process/edit-profile-process.php">

<section class="profile-content-section">
  <h2><i class="fi fi-rr-pencil"></i>Mes informations</h2>

  <div class="form-group">
    <label for="prenom">Prénom</label>
    <input type="text" value="<?= $_SESSION['user'] ?>" id="prenom">
  </div>

  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" value="<?= $_SESSION['lastName'] ?>" id="nom">
  </div>
  
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" value="<?= $_SESSION['email'] ?>" id="email">
  </div>
  
  <div class="form-group">
    <label for="tel">Tel</label>
    <input type="tel" value="<?= $_SESSION['tel'] ?>" id="tel">
  </div>


  <input type="submit" name="edit-info" value="Modifier mes informations">
</section>

<section class="profile-content-section">
  <h2><i class="fi fi-rr-settings"></i>Préférences</h2>
  <section>
    <h5>Notifications</h5>
  </section>
</section>

<section class="profile-content-section">
  <h2><i class="fi fi-rr-lock"></i>Mot de passe</h2>
  <input type="password" placeholder="Nouveau mot de passe">
  <input type="password" placeholder="Confirmer le mot de passe">
</section>

<section class="profile-content-section danger-zone">
  <h2><i class="fi fi-rr-shield-exclamation"></i>Danger zone</h2>
  <input type="password" placeholder="Nouveau mot de passe">
  <input type="password" placeholder="Confirmer le mot de passe">
</section>

</form>