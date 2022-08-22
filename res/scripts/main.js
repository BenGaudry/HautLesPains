// Start scripting here

function toggleMenu() {
  let btn = document.getElementById('menu-btn');
  btn.classList.toggle('menu-btn-active');
}

window.onscroll = function() { //Fonction appelée quand on descend la page
  let btn = document.getElementById('scrollUp')
  let x = document.body.scrollTop || document.documentElement.scrollTop
  if (x > 80 ) {  // Quand on est à 200pixels du haut de page,
    btn.style.opacity = '1'
  } else { 
    btn.style.opacity = '0'
  }
}