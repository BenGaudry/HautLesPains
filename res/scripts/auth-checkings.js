class Checkings {

  checkEmpty(input) {
    let str = input.value
    if( !str.replace(/\s+/, '').length ) {
      this.notification({'type': 'error', 'message': 'Certains champs ne sont pas remplis'}, input)
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
      this.notification(notif, input)
    }
  }

  password(input) {
    let val = input.value
    let passRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/

    if(this.checkEmpty(input)) {
      let notif = (val.match(passRegex)) ? {'type': 'success', 'message': 'Mot de passe valide'} : {'type': 'error', 'message': 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre'}
      this.notification(notif, input)
    }
  }

  str(input) {    
    if(this.checkEmpty(input)) {
      let notif = {
        'type': 'success',
        'message': 'Champ valide'
      }
      this.notification(notif, input)
    }
  }

  dialCode(input) {
    let dialRegex = /(?:(?:\+|00)33|0)/
    let val = input.value
    if(this.checkEmpty(input)) {
      let notif = (val.match(dialRegex)) ? {'type': 'success', 'message': 'Dial code valide'} : {'type': 'error', 'message': 'Le dial code est incorrect'}
      this.notification(notif, input)
    }
  }

  tel(input) {
    let telRegex = /[1-9][0-9]{8}/
    let val = input.value
    if(this.checkEmpty(input)) {
      let notif = (val.match(telRegex)) ? {'type': 'success', 'message': 'Tel valide'} : {'type': 'error', 'message': 'Le format du numéro de téléphone est incorrect'}
      this.notification(notif, input)
    }
  }

  notification(n, i) {
    let submitbtn = i.form.querySelector('.auth-submit')

    if(n.type === 'error') {
      console.warn(n.message)
      submitbtn.disabled = true
    } else {
      console.info(n.message)
      submitbtn.disabled = false
    }
  }

}


var check = new Checkings

window.onload = () => {
  let submitbtn = document.body.querySelector('.auth-submit')
  submitbtn.disabled = true
}