let el = document.querySelector('.profile-dropdown');
let el2 = document.querySelector('.drop-profile');
let isHidden = true;
el.addEventListener('click',()=>{
    el2.classList.toggle("hidden");
    
})