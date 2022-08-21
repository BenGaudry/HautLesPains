<?php require_once '../res/components/header.php'; ?>

<h1>Home</h1>

<section class="hero-banner">
    <div class="left">
      <div>
        <h1>Pain au levain</h1>
        <p>Découvrez le pain au levain naturel,<br> façonné et pétri à la main,<br>
          et cuit au feu de bois.<br>
        </p>
      </div>

      <div class="btn-container">
        <div class="btn btn-transparent fadein">
          <a href="">Découvrir</a>
        </div>
        <div class="btn fadein">
          <a href="order">Commander</a>
        </div>
      </div>

    </div>

    <div class="right">
      <img src="<?= $__path__ ?>/res/img/levainbread.png" alt="Le pain au levain" class="image fadein">
    </div>
  </section>

  <section class="hero hero-splitted">
    <div class="left">
      <h1>Où me trouver ?</h1>
      <p>Je travaille au <a href="https://le-fournil.jimdosite.com/le-lieu/" target="_blank" rel="noopener noreferrer">fournil de Longessaigne</a><br>
      ou des ventes se tiennent, ou je propose<br>
      des livraisons à domicile, ou dans des dépôts<br>
      indiqués sur la carte.</p>
    </div>

    <div id="map" style="width: 100%; height: 400px;" class="right"></div>

  </section>

  <section class="hero">
    <h1>This is h1</h1>
    <h2>This is h2</h2>
    <h3>This is h3</h3>
    <h4>This is h4</h4>
    <h5>This is h5</h5>
    <h6>This is h6</h6>
  </section>

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin="" defer></script>
<script src="http://localhost:8000/res/scripts/map.js" defer></script>
<script>
  window.onload = () => {
    initMap('<?= $__path__ . 'res/img/map/' ?>')
  }
</script>

<?php require_once '../res/components/footer.php'; ?>