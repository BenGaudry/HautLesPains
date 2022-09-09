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

    <input type="submit" class="btn" value="Modifier mes informations" name="edit-account">
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
        <label for="edited-password">Mot de passe</label>
        <input type="password" name="edited-password" id="edited-password" placeholder="*****">
      </div>

      <div class="form-group">
        <label for="edited-password-confirm">Confirmer le mot de passe</label>
        <input type="password" name="edited-password-confirm" id="edited-password-confirm" placeholder="*****">
      </div>
    </div>

    <input type="submit" value="Modifier mon mot de passe" name="edit-password" class="btn">
  </section>

  <section class="profile-content-section danger-zone">
    <h2><i class="fi fi-rr-shield-exclamation"></i>Danger zone</h2>
    <p>Vous n'êtes pas satisfaits du contenu du site ? Vous pouvez supprimer votre compte</p>
    <p><b>Attention cette opération est irréversible</b></p>

    <button type="button" class="btn btn-danger" name="delete-account" id="delete-acc-btn">Supprimer mon compte</button>
  </section>

  <div id="del-acc-confirm-window" class="danger-zone">
    <div class="content">
      <h2>Voulez-vous vraiment supprimer votre compte ?</h2>
      <p>Si oui, confirmez en tapant <b id="delete-acc-email-to-confirm"><?= $_SESSION['email'] ?></b> dans le champ çi-dessous</p>
      <div class="form-group">
        <label for="delete-acc-email-confirm">Confirmer l'email</label>
        <input type="email" id="delete-acc-email-confirm">
        <div class="btn-container">
          <button type="button" id="cancel-deleting-acc">Annuler</button>
          <input type="submit" value="Confirmer la suppression" name="delete-account" id="delete-acc-btn-confirm" class="btn btn-danger" disabled>
        </div>
      </div>

    </div>
  </div>

</form>