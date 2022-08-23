<?php require_once '../res/components/header.php'; ?>

  <section class="hero hero-splitted">
    <div class="content">
      <div class="side">
        <div class="hero-text-content">
          <h1>Pain au levain</h1>
          <p>Découvrez le pain au levain naturel,<br> façonné et pétri à la main,<br>
            et cuit au feu de bois.<br>
          </p>
        </div>

        <div class="btn-container">
          <div class="btn fadein">
            <a href="<?= $__path__ ?>templates/order.php">Commander</a>
          </div>
          <div class="btn btn-transparent fadein">
            <a href="">Découvrir</a>
          </div>
        </div>



      <div class="side no-mobile">
        <img src="<?= $__path__ ?>/res/img/levainbread.png" alt="Le pain au levain" class="bread-img fadein">
      </div>
    </div>
  </section>

  <section class="hero hero-splitted hero-colored hero-no-padding">
    <div class="content">
      <div id="map" style="height: 400px;" class="side"></div>

      <div class="side less-important-side">
        <h1>Points de vente</h1>
        <p>Je travaille au <a href="https://le-fournil.jimdosite.com/le-lieu/" target="_blank" rel="noopener noreferrer">fournil de Longessaigne</a><br>
        ou des ventes se tiennent, ou je propose<br>
        des livraisons à domicile, ou dans des dépôts<br>
        indiqués sur la carte.</p>
      </div>
    </div>
  </section>

  <section class="hero hero-splitted">
    <div class="content">
      <div class="side">
        <div class="hero-text-content">
          <h1>Nature & progrès</h1>
          <p>Cette certification garantit l'utilisation  de matières premières bios, locales, et une fabrication dans le respect de l'environnement et des consommateurs.</p>
        </div>
        <div class="btn-container">
          <div class="btn btn-noborder">
            <a href="https://www.natureetprogres.org/" target="_blank">Découvrir</a>
          </div>
        </div>
      </div>
      <div class="side">
        <img src="<?= $__path__ ?>res/img/Logo-Nature-et-progres.webp" alt="Logo nature et progrès" loading="lazy" class="nature-progrès-logo">
      </div>
    </div>
  </section>

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin="" defer></script>
<script src="<?= $__path__ ?>res/scripts/map.js" defer></script>
<script>
  window.onload = () => {
    initMap('<?= $__path__ . 'res/img/map/' ?>')
  }
</script>

<?php require_once '../res/components/footer.php'; ?>