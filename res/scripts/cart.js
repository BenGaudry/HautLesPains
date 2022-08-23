// Def des variables dans la page order.php

let leftCarouselBtn = document.getElementById('carousel-left')
let rightCarouselBtn = document.getElementById('carousel-right')
let quantityRemove = document.getElementById('quantity-remove')
let quantityAdd = document.getElementById('quantity-add')

let quantityDisplayer = document.getElementById('quantity-displayer')
let img = document.getElementById('carousel-bread-img')
let breadName = document.getElementById('carousel-bread-name')

let quantity = 0
var carousel = null

// Affichage du carousel des pains

fetch("http://localhost/HautLesPains2/config/apis/api-bread-types.php", {
  "method": "GET",
})
.then(response => response.json())
.then(data => {
  carousel = new BreadCarousel(data);
  carousel.changeBread()
})
.catch(err => {
  console.error(err)
})

leftCarouselBtn.addEventListener('click', () => {
  carousel.changeBread('l')
})

rightCarouselBtn.addEventListener('click', () => {
  carousel.changeBread('r')
})

quantityRemove.addEventListener('click', () => {
  carousel.quantitySet(-1)
})

quantityAdd.addEventListener('click', () => {
  carousel.quantitySet(1)
})



class BreadCarousel {

  constructor(breadTypes) {
    this.breadTypes = breadTypes
    this.index = 1
    this.arraySize = Object.keys(this.breadTypes).length
  }

  changeBread(method) {
    this.changeIndex(method)

    let bread = this.breadTypes[parseInt(this.index)]
    let newName = bread.name.replaceAll('&eacute;', 'é');
    breadName.textContent = newName
    let imgpath = 'http://localhost/HautLesPains2/' + bread.path;
    img.setAttribute('src', imgpath)
  }

  changeIndex(method) {
    if(method === 'l'){
      if(this.index === 1){
        this.index = this.arraySize
      } else {
        this.index = this.index - 1;
      }
    } else if (method === 'r') {
      if(this.index === this.arraySize){
        this.index = 1
      } else {
        this.index = this.index + 1;
      }
    } else {
      this.index = 1
    }

    return(this.index)
  }

  quantitySet(val){
    quantity = quantity + val;
    quantityDisplayer.textContent = quantity
  }
}