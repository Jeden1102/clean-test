let btn = document.querySelector('.filter-btn');
let filterBox = document.querySelector('.filter-box');
let active = false;
btn.addEventListener('click',()=>{
    if(!active){
        filterBox.classList.add('filter-translate');
        active = true;
    }else{
        filterBox.classList.remove('filter-translate');

        active = false;
    }
})