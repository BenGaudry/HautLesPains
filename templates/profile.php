<?php require_once '../res/components/header.php'; ?>

<?php

date_default_timezone_set('Europe/Paris');
$date_debut = $_SESSION['registerDate'];
$date_fin =  "2017-05-12 11:10:00";
$date1 = new DateTime($date_debut);
$date2 = $date1->diff(new DateTime($date_fin));
?>

<header class="profile-header">
  <h1><?= $_SESSION['user']." ".$_SESSION['lastName'] ?></h1>
  <p>Inscrit depuis <?php echo($date2->days) ?> jours</p>
  <p><?= $_SESSION['registerDate'] ?></p>
  <div class="btn"><a href="auth/register.php">S'inscrire</a></div>
  <div class="btn"><a href="auth/login.php">Se connecter</a></div>
</header>


<?php require_once '../res/components/footer.php'; ?>