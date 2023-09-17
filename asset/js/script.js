// MENU BURGER

let menuBtn = document.querySelector('.menu-btn');
let menu = document.querySelector('.navi');
let menuItem = document.querySelectorAll('.nav__link');

menuBtn.addEventListener('click', function(){
    menuBtn.classList.toggle('active');
    menu.classList.toggle('active');
})
console.log(menuBtn)

menuItem.forEach (function(menuItem) {
  menuItem.addEventListener('click',function(){
          menuBtn.classList.toggle('active');
          menu.classList.toggle('active');
  })
})