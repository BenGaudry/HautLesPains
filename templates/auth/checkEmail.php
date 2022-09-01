<?php 

require_once '../../res/components/header.php';
session_start();

print(mail($_SESSION['email'], "Nouvelle connexion", "Nouvelle connexion détectée"));

?>

<h1 class="page-title">Checking email</h1>

<?php require_once '../../res/components/footer.php'; ?>
