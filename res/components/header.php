<?php
session_start();
$__path__ = 'http://localhost/HautLesPains2/';

function page_title() {
	if(isset($pageTitle)){
		$title = $pageTitle;
	} else {
		$title = 'Haut Les Pains';
	}

	return $title;
}

function nav_item(string $lien, string $titre, string $optionalClass = NULL):string {

  $__path__ = 'http://localhost/HautLesPains2/';
  $class = ''; // Classe par défaut du menu

  $l = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/HautLesPains2/' . $lien;
  $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];

  if($url === $l){
    $class .= ' active';
  }

  return <<< HTML
    <li class="$class"><a href="$l">$titre</a></li>
HTML;
}
?>

<!DOCTYPE html>
<html>
	<title><?php print(page_title()) ?></title>
  <meta charset="utf-8">

  <!-- Device -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5">
  <meta name="format-detection" content="telephone=no">
  <!-- Description -->
  <meta name="description" content="Le site web Haut Les Pains permet de commander, de consulter les points de livraison et les dates de fournée de Lison Loup au fournil de Longessaigne.">
  <!-- Social -->
  <!-- Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php print(page_title()) ?>">
  <meta property="og:description" content="Le site web Haut Les Pains permet de commander, de consulter les points de livraison et les dates de fournée de Lison Loup au fournil de Longessaigne.">
  <meta property="og:image" content="res/img/favicon/favicon.png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <!-- Favicon -->
  <meta name="theme-color" content="#fff">
  <link rel="icon" href="<?= $__path__ ?>res/img/favicon/favicon.png" type="image/png">
  <link rel="stylesheet" href="<?= $__path__ ?>res/styles/app.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
  <script src="<?= $__path__ ?>res/scripts/main.js" defer></script>
</head>

<body>

<?php require_once('notification.php') ?>

<header class="menu-bar">
    <nav>
      <div class="menu-bar-assets">
        <img src="<?= $__path__ ?>res/img/favicon/favicon.png" alt="Icone du site">
        <h3>Haut les pains</h3>
      </div>
    

      <ul id="links">
				<?= nav_item('templates/index.php', 'Accueil') ?>
				<li><a href="https://le-fournil.jimdosite.com/le-lieu/" target="_blank" rel="noopener noreferrer">Le fournil</a></li>
        <?= nav_item('templates/order.php', 'Commander') ?>
				<?= nav_item('templates/profile.php', 'Profil', 'btn') ?>
      </ul>

      <button type="button" onclick="toggleMenu()" id="menu-btn" class="menu-btn">
        <div></div>
        <div></div>
      </button>
    </nav>
  </header>

  <div id="scrollUp">
    <a href="#"><img src="<?= $__path__ ?>res/img/icons/arrow-top-page.png" alt=""></a>
  </div>

<main>