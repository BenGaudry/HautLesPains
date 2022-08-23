<?php require_once '../res/components/header.php'; ?>

<section class="hero hero-no-padding">
  <div class="content">

    <button id="carousel-left" class="btn-arrow">
      <img src="<?= $__path__ ?>res/img/icons/arrow-left.png" alt="<">
    </button>
    <button id="carousel-right" class="btn-arrow">
      <img src="<?= $__path__ ?>res/img/icons/arrow-right.png" alt=">">
    </button>

    <div id="carousel">

      <div class="carousel-section">
        <img src="<?= $__path__ ?>res/img/levainbread.png" alt="" id="carousel-bread-img">
        <div class="order-summary">
          <div class="content">
            <div class="left">
              <h2 id="carousel-bread-name">Semi-complet</h2>
            </div>

            <div class="right">
              <div class="quantity-selector">
                <button id="quantity-remove">
                  <img src="<?= $__path__ ?>res/img/icons/remove.png" alt="-">
                </button>
                <div class="quantity-displayer">
                  <p id="quantity-displayer">0</p>  
                </div>
                <button id="quantity-add">
                  <img src="<?= $__path__ ?>res/img/icons/add.png" alt="+">
                </button>
              </div>
              <button id="cart" class="btn-img">
                <img src="<?= $__path__ ?>res/img/icons/cart-add.png" alt="Panier">
              </button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<section class="hero">
  <!-- <h1>Autres produits</h1> -->
  <div class="content">
    <div class="card">
      <div class="img" style="background: url(<?= $__path__ ?>res/img/brioche.webp);"></div>
      <h3>Brioche</h3>
      <div class="quantity-selector">
              <button id="remove">
                <img src="<?= $__path__ ?>res/img/icons/remove.png" alt="-">
              </button>
              <div class="quantity-displayer">
                <p id="quantity-displayer">0</p>  
              </div>
              <button id="add">
                <img src="<?= $__path__ ?>res/img/icons/add.png" alt="+">
              </button>
            </div>
            <button id="cart" class="btn-img">
              <img src="<?= $__path__ ?>res/img/icons/cart-add.png" alt="Panier" style="width:40px">
            </button>
    </div>
  </div>
</section>

<script src="<?= $__path__ ?>res/scripts/cart.js"></script>

<?php require_once '../res/components/footer.php'; ?>