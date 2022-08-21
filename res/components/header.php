<?php 
function page_title() {
	if(isset($pageTitle)){
		$title = $pageTitle;
	} else {
		$title = 'Haut Les Pains';
	}

	return $title;
}

function nav_item(string $lien, string $titre, string $optionalClass = null):string {

  $class = ''; // Classe par défaut du menu
  if($_SERVER['SCRIPT_NAME'] === $lien){
    $class .= ' active';
  }

  return <<< HTML
  <li><a class="$class" href="$lien">$titre</a></li>
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
  <meta property="og:image" content="#">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <!-- Favicon -->
  <meta name="theme-color" content="#fff">
  <link rel="stylesheet" href="res/styles/app.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
  <script src="res/scripts/main.js" defer></script>
</head>

<body>

<header class="menu-bar">
    <nav>
      <div class="menu-bar-assets">
        <img src="images/icon.png" alt="Icone du site">
        <h1>Haut les pains</h1>
      </div>
    

      <ul id="links">
				<?= nav_item('/index.php', 'Accueil') ?>
				<li><a href="https://le-fournil.jimdosite.com/le-lieu/" target="_blank" rel="noopener noreferrer">Le fournil</a></li>
        <?= nav_item('/order.php', 'Commander') ?>
				<?= nav_item('/profile.php', 'Profil', 'btn') ?>
      </ul>

      <button type="button" onclick="toggleMenu()" id="menu-btn">
        <div></div>
        <div></div>
        <div></div>
      </button>
    </nav>
  </header>

<main>