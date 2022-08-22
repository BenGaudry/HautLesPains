<?php require_once '../res/components/header.php'; ?>

<h1 class="page-title">Commander</h1>

<section class="hero hero-centered hero-no-padding carousel-container">
  <div class="content">
    <div id="carousel">
      <button id="carousel-left" class="btn-arrow">
        <img src="<?= $__path__ ?>res/img/icons/arrow-left.png" alt="<">
      </button>
      <div id="carousel-1" class="carousel-section">
        <img src="<?= $__path__ ?>res/img/levainbread.png" alt="">
        <div class="order-summary">
          <div class="left">
            <h2>Semi-complet</h2>
          </div>

          <div class="right">
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
            <button id="cart" class="btn btn-reveal">
              <span style="color: #000">Ajouter&nbsp;au&nbsp;panier</span>
              <img src="<?= $__path__ ?>res/img/icons/cart-add.png" alt="Panier">
            </button>
          </div>
        </div>
      </div>
      <button id="carousel-right" class="btn-arrow">
        <img src="<?= $__path__ ?>res/img/icons/arrow-right.png" alt=">">
      </button>
    </div>
  </div>
</section>

<?php require_once '../res/components/footer.php'; ?>