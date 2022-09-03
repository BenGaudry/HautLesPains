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


const notifMessages = {
  'FERR1' : 'Certains champs sont incomplets',
  'FERR2' : 'Email ou mot de passe incorrect',
  'FERR3' : 'Certains champs dépassent la limitation de caractères',
  'FERR4' : 'Format de l\'email incorrect',
  'FERR5' : 'Les mots de passe ne correspondent pas',
  'FERR6' : 'Email ou mot de passe incorrect',
  'FERR7' : 'Email ou mot de passe incorrect',
  'FERR8' : 'Tel déjà utilisé',
  'FSUC1' : 'Données modifiées avec succès',
  'FSUC2' : 'Connexion réussie',
  'CEERR1' : 'Échec de la vérification',
  'CESUC1' : 'Vérification terminée',
  'DSUC1' : 'Déconnexion réussie',
  'OERR1' : 'Veuillez vérifier votre email pour passer une commande',
  'OERR2' : 'Nombre de pains doit être compris entre 0 et 5 inclus',
  'OSUC1' : 'Commande réussie',
  'FPSUC1' : 'Un email à été envoyé pour réinitialiser le mot de passe',
}

class Notification {
  
  constructor (message) {
    this.message = message
    this.notifDiv = document.getElementById("notification")
    this.notifContainer = document.getElementById("notification-container")
    this.timerDuration = 2000
    this.type = this.getType(message)
  }

  getType(message) {
    var type = ''
    if(message.includes("SUC")) {
      type = 'notif-success'
    } else if (message.includes("ERR")) {
      type = 'notif-error'
    }

    return type
  }

  add() {
    let div = '<div id="notification" class="notification ' + this.type + '">' + 
      '<p>' + notifMessages[this.message] + '</p>' +
      '<div class="timer" style="transition-duration: ' + this.timerDuration + 'ms"></div>'
    '</div>';

    this.notifContainer.innerHTML += div
    document.querySelector('.timer').style.width = 0
    setTimeout(this.hide(), this.timerDuration)
  }

  hide() {
    document.getElementById('notification').style.opacity = "0";
    setTimeout(() => {
      document.getElementById('notification').style.display = "none"
    }, 300);
  }

  showTypes() {
    console.log(notifMessages)
  }

}