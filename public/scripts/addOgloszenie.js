let nextBtn = document.querySelectorAll(".next-step");
let prevBtn = document.querySelectorAll(".prev-step");
let box = document.querySelector(".szeroki");
let oglInfo = document.querySelector(".ogl-info");
let oglDane = document.querySelector(".ogl-dane");
let oglCena = document.querySelector(".ogl-cena");

let step = 0;

nextBtn.forEach(element => {
    element.addEventListener('click',()=>{
        step++;
        checkStep();
    })
});
prevBtn.forEach(element => {
    element.addEventListener('click',()=>{
        step--;
        checkStep();

    })
});
oglInfo.addEventListener('click',()=>{
    step = 0;
    checkStep();
})
oglDane.addEventListener('click',()=>{
    step = 1;
    checkStep();

})
oglCena.addEventListener('click',()=>{
    step = 2;
    checkStep();

})
function checkStep(){
    if(step==0){
        box.classList.remove('step-1');
        box.classList.remove('step-2');
        box.classList.add('step-0');
        oglInfo.classList.add('bg-green-400');
        oglDane.classList.add('bg-green-200');
        oglCena.classList.add('bg-green-200');
        oglDane.classList.remove('bg-green-400');
        oglCena.classList.remove('bg-green-400');
    }
    if(step==1){
        box.classList.remove('step-0');
        box.classList.remove('step-2');
        box.classList.add('step-1');
        oglInfo.classList.add('bg-green-200');
        oglDane.classList.add('bg-green-400');
        oglCena.classList.add('bg-green-200');
        oglInfo.classList.remove('bg-green-400');
        oglCena.classList.remove('bg-green-400');
    }
    if(step==2){
        box.classList.remove('step-1');
        box.classList.remove('step-0');
        box.classList.add('step-2');
        oglInfo.classList.add('bg-green-200');
        oglDane.classList.add('bg-green-200');
        oglCena.classList.add('bg-green-400');
        oglDane.classList.remove('bg-green-400');
        oglInfo.classList.remove('bg-green-400');
    }
}
//validacja

let title = document.querySelector('input[name="order_title]"');
console.log(title)