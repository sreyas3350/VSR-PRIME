let menu = document.querySelector('.menu')
let burger = document.querySelector('.b')
let b1 = document.querySelector('.b1')
let b3 = document.querySelector('.b3')
let burg2 = document.querySelector('.b2')
burger.addEventListener('click',()=>{
  b1.classList.toggle('on-click')
  b3.classList.toggle('on-click')
  burg2.classList.toggle('on-click')
  menu.classList.toggle('is-active')
});