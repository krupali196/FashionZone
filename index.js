const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const buttonLogin = document.querySelector('.button-login');
const iconClose = document.querySelector('.icon-close');

registerLink.addEventListener('click', ()=> {
    wrapper.classList.add('active')
});

loginLink.addEventListener('click', ()=> {
    wrapper.classList.remove('active')
});

buttonLogin.addEventListener('click', ()=> {


    wrapper.classList.add('active-popup')
});

iconClose.addEventListener('click', ()=> {

    wrapper.classList.remove('active-popup')
});


// load more button.........

let loadMoreBtn = document.querySelector('#women-collection #load-more');
let currentItem = 4;
loadMoreBtn.onclick = () =>{
  let boxes = [...document.querySelectorAll('#women-collection .container .box-container .box')];
  for (var i = currentItem; i < currentItem+4; i++) {
    boxes[i].style.display = 'inline-block';
  }
  currentItem += 4;

  if (currentItem >= boxes.length) {
    loadMoreBtn.style.display = 'none';
  }
}

let men_loadMoreBtn = document.querySelector('#men-collection #load-more');
let men_currentItem = 4;
men_loadMoreBtn.onclick = () =>{
  let boxes = [...document.querySelectorAll('#men-collection .container .box-container .box')];
  for (var i = men_currentItem; i < men_currentItem+4; i++) {
    boxes[i].style.display = 'inline-block';
  }
  men_currentItem += 4;

  if (men_currentItem >= boxes.length) {
    men_loadMoreBtn.style.display = 'none';
  }
}

let couple_loadMoreBtn = document.querySelector('#couple-collection #load-more');
let couple_currentItem = 4;
couple_loadMoreBtn.onclick = () =>{
  let boxes = [...document.querySelectorAll('#couple-collection .container .box-container .box')];
  for (var i = couple_currentItem; i < couple_currentItem+4; i++) {
    boxes[i].style.display = 'inline-block';
  }
  couple_currentItem += 4;

  if (couple_currentItem >= boxes.length) {
    couple_loadMoreBtn.style.display = 'none';
  }
}

// function validateLogin() { 
//   var username = document.getElementById("username").value; 
//   var password = document.getElementById("password").value; 
//   var errorMessage = document.getElementById("error-message"); 

  // Check if the username and password are correct (you would replace this with actual authentication logic) 
//   if (username === "example" && password === "password") { 
//       errorMessage.style.color = "green"; 
//       errorMessage.textContent = "Login successful!"; 
//   } else { 
//       errorMessage.style.color = "red"; 
//       errorMessage.textContent = "Invalid username or password. Please try again."; 
//   } 
// } 