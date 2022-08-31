<?php

  $getBills = $bdd->prepare('SELECT * FROM cart WHERE user_id = :id');
  $getBills->execute([
    'id' => $_SESSION['id'],
  ]);
  $bills = $getBills->fetch();

?>

<section class="profile-content-section">
  <h2><i class="fi fi-rr-wallet"></i>Factures</h2>
</section>