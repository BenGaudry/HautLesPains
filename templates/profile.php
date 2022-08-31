<?php

require_once '../res/components/header.php';
require_once('../config/databaseConnect.php');

if(!isset($_SESSION['user'])) {
  header('Location: auth/login.php');
}

function registered_since() {
  date_default_timezone_set('Europe/Paris');
  $date_debut = $_SESSION['registerDate'];
  $date_fin =  date('Y-m-d H:i:s');
  $date1 = new DateTime($date_debut);
  $date2 = $date1->diff(new DateTime($date_fin));

  if($date2->days <= 1) {
    return('hier');
  } else if ($date2->days > 1) {
    return($date2->days.' jours');
  } else {
    return('aujourd\'hui');
  }

}

function tabs() {
  if(isset($_GET['tab'])) {
    if($_GET['tab'] === 'informations'){
      $tab = "user/infos.php";
    } else if ($_GET['tab'] === 'factures'){
      $tab = "user/bills.php";
    } else {
      $tab = "user/infos.php";
    }
  }

  return $tab;
}

?>

<header class="profile-header">
  <h1><?= $_SESSION['user']." ".$_SESSION['lastName'] ?></h1>
  <p>Inscrit depuis <?= registered_since() ?></p>

  <nav>
    <ul>
      <li class="active-profile-tab"><a href="<?= $__path__ ?>templates/profile.php?tab=informations">
        <i class="fi fi-rr-file-invoice"></i>
        <span>Informations</span>
      </a></li>
      <li><a href="<?= $__path__ ?>templates/profile.php?tab=factures">
        <img src="<?= $__path__ ?>res/img/icons/bill.png" alt="">
        <span>Factures</span>
      </a></li>
    </ul>
  </nav>
</header>

<div id="profile-content-container">
  <?php require_once(tabs()) ?>
</div>

<?php require_once '../res/components/footer.php'; ?>