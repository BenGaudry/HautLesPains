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

function closeNotification(){
  document.getElementById("notification").style.opacity = "0";
  setTimeout(() => {
      document.getElementById("notification").style.display = "none"
  }, 300);
}

// OTP verif
const inputs = document.querySelectorAll(".otp-field input")
inputs.forEach((input, index) => {
  input.dataset.index = index
  input.addEventListener("paste", handleOnPasteOtp)
  input.addEventListener("keyup", handleOtp)
})

function handleOnPasteOtp(e) {
  const data = e.clipboardData.getData("text")
  const value = data.split("")
  if(value.length === inputs.length) {
    inputs.forEach((input, index) => (input.value = value[index]));
    submit()
  }
}

function handleOtp(e) {
  const input = e.target
  let value = input.value
  input.value = ""
  input.value = value ? value[0] : ""

  let fieldIndex = input.dataset.index
  if(value.length > 0 && fieldIndex < inputs.length) {
    input.nextElementSibling.focus()
  }

  if(e.key == "Backspace" && fieldIndex > 0) {
    input.previousElementSibling.focus()
  }

  if(fieldIndex === inputs.length) {
    submit()
  }
}

function submit() {
  let otp = ""
  inputs.forEach((input) => {
    otp += input.value
  })

  console.log(otp)
}