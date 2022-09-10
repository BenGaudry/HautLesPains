<?php

// if($_SESSION['id'] !== 1) {
//   header("Location: $__path__ accueil");
// }


require_once '../../res/components/header.php';

?>

<section class="hero hero-splitted">
  <div class="content">
    <div class="side">
      <h1>This is h1</h1>
      <h2>This is h2</h2>
      <h3>This is h3</h3>
      <h4>This is h4</h4>
      <h5>This is h5</h5>
      <h6>This is h6</h6>
      <p>This is plain text : Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius nulla minima cumque quis minus exercitationem ipsa suscipit nemo ut sint, expedita adipisci et eaque velit quaerat numquam atque, architecto pariatur.</p>
    </div>

    <div class="side">
      <h1 class="handwritted-text">This is h1</h1>
      <h2 class="handwritted-text">This is h2</h2>
      <h3 class="handwritted-text">This is h3</h3>
      <h4 class="handwritted-text">This is h4</h4>
      <h5 class="handwritted-text">This is h5</h5>
      <h6 class="handwritted-text">This is h6</h6>
      <p class="handwritted-text">This is plain text : Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius nulla minima cumque quis minus exercitationem ipsa suscipit nemo ut sint, expedita adipisci et eaque velit quaerat numquam atque, architecto pariatur.</p>
    </div>
  </div>
</section>

<section class="hero">
  <div class="content">
    <div class="btn-container">
      <div class="btn">
        <a href="">Primary CTA</a>
      </div>
      
      <div class="btn btn-transparent">
        <a href="">Secondary CTA</a>
      </div>

      <div class="btn btn-noborder">
        <a href="">Tertiary CTA</a>
      </div>
    </div>
  </div>
</section>

<section class="hero hero-splitted" style="border-bottom: 1px solid #CCC">
    <div class="content">
      <div class="side">
        <div class="hero-text-content">
          <h1>This is a section</h1>
          <p>It's classes are <i>.hero</i> and <i>.hero-splitted</i>. Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti saepe doloribus quaerat, ad enim est maiores a, quas non aspernatur commodi.</p>
          </p>
        </div>

        <div class="btn-container">
          <div class="btn fadein">
            <a href="<?= $__path__ ?>templates/order.php">Button</a>
          </div>
          <div class="btn btn-transparent fadein">
            <a href="">Button</a>
          </div>
        </div>

      </div>

      <div class="side no-mobile">
        <img src="<?= $__path__ ?>/res/img/levainbread.png" alt="Le pain au levain" class="bread-img fadein">
      </div>
    </div>
  </section>

  <section class="hero hero-colored" style="border-bottom: 1px solid #CCC">
    <div class="content">
      <div>
        <h1>This is a section</h1>
        <p>And it's classes are <i>.hero</i> and <i>.hero-colored</i>. Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui sunt aut dignissimos velit at, doloremque veniam officia perferendis consequuntur vero provident possimus alias saepe, corrupti quisquam est, consequatur eligendi earum.</p>
      </div>

      <img src="<?= $__path__ ?>res/img/empty-img.png" alt="">
    </div>
  </section>

  <section class="hero hero-no-padding" style="border-bottom: 1px solid #CCC">
    <div class="content">
      <div>
        <h1>This is a section</h1>
        <p>And it's classes are <i>.hero</i> and <i>.hero-no-padding</i>. Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui sunt aut dignissimos velit at, doloremque veniam officia perferendis consequuntur vero provident possimus alias saepe, corrupti quisquam est, consequatur eligendi earum.</p>
      </div>

      <img src="<?= $__path__ ?>res/img/empty-img.png" alt="">
    </div>
  </section>

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin="" defer></script>
<script src="<?= $__path__ ?>res/scripts/map.js" defer></script>
<script>
  window.onload = () => {
    initMap('<?= $__path__ . 'res/img/map/' ?>')
  }
</script>

<?php require_once '../../res/components/footer.php'; ?>