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

function addCountryCodes(selectId) {
  fetch("http://localhost/HautLesPains2/config/db/country-codes.json", {
		"method": "GET",
	})
	.then(response => response.json())
	.then(data => {
    for (i = 1; i < 242; i++) {
      var select = document.getElementById (selectId);
      let text = data[i].name + ' - ' + data[i].dial_code
      if(data[i].dial_code === '+33'){
        var newOption = new Option (text, data[i].dial_code, true)
      } else {
        var newOption = new Option (text, data[i].dial_code)
      }
      select.options.add (newOption);
    }
	})
	.catch(err => {
		console.error(err)
	});
}