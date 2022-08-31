<?php

  $getBills = $bdd->prepare('SELECT * FROM cart WHERE user_id = :id');
  $getBills->execute([
    'id' => $_SESSION['id'],
  ]);
  $bills = $getBills->fetchAll();

?>

<section class="profile-content-section">
  <h2><i class="fi fi-rr-wallet"></i>Factures</h2>
  <ul class="bills">
  <?php
    foreach ($bills as $i => $bill) {
      $n = $i + 1;
      $phpdate = strtotime($bill['validation_date']);
      $date = date('\L\e d/m/Y \à H:i', $phpdate);
      print('
    <li class="bill">
      <div class="bill-infos">
        <p class="bill-title">Facture '.$n.'</p>
        <p class="bill-date">'.$date.'</p>
      </div>
      <div class="bill-actions">
        <p class="bill-price">'.$bill['price'].'€</p>
        <a href="../../config/process/download-bill.php?billId="'.$bill['id'].'>
          <i class="fi fi-rr-download"></i>
        </a>
      </div>
    </li>
      ');
    }

  ?>
  </ul>
</section>