class Checkings {

  checkEmpty(input) {
    let str = input.value
    if( !str.replace(/\s+/, '').length ) {
      this.notification({'type': 'error', 'message': 'Certains champs ne sont pas remplis'})
      return false
    } else {
      return true
    }
  }

  email(input) {
    let val = input.value
    let emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
    
    if(this.checkEmpty(input)) {
      let notif = (val.match(emailRegex)) ? {'type': 'success', 'message': 'Email valide'} : {'type': 'error', 'message': 'Le format de l\'email n\'est pas valide'}
      this.notification(notif)
    }
  }

  password(input) {
    let val = input.value
    let passRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/

    if(this.checkEmpty(input)) {
      let notif = (val.match(passRegex)) ? {'type': 'success', 'message': 'Mot de passe valide'} : {'type': 'error', 'message': 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre'}
      this.notification(notif)
    }
  }

  notification(n) {
    if(n.type === 'error') {
      console.warn(n.message)
    } else {
      console.info(n.message)
    }
  }

}

var check = new Checkings