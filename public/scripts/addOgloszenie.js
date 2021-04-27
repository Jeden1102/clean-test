let nextBtn = document.querySelectorAll(".next-step");
let prevBtn = document.querySelectorAll(".prev-step");
let box = document.querySelector(".szeroki");
let oglInfo = document.querySelector(".ogl-info");
let oglDane = document.querySelector(".ogl-dane");
let oglCena = document.querySelector(".ogl-cena");
let checkboxes = document.querySelectorAll('input[type="checkbox"]');
console.log(checkboxes);

let step = 0;

nextBtn.forEach(element => {
    element.addEventListener('click',()=>{
        step++;
        checkStep();
    checkValidation();

    })
});
prevBtn.forEach(element => {
    element.addEventListener('click',()=>{
        step--;
        checkStep();
    checkValidation();


    })
});
oglInfo.addEventListener('click',()=>{
    step = 0;
    checkStep();
    checkValidation();

})
oglDane.addEventListener('click',()=>{
    step = 1;
    checkStep();
    checkValidation();


})
oglCena.addEventListener('click',()=>{
    step = 2;
    checkStep();
    checkValidation();


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
        checkValidation();
    }
}
//validacja

let title = document.querySelector('#company_website');
let about = document.querySelector('#about');
let imie = document.querySelector("#inputEmail4");
let password = document.querySelector("#inputPassword4");
let ulica = document.querySelector("#inputAddress");
let nrdom = document.querySelector("#inputAddress2");
let miasto = document.querySelector("#inputCity");
let cena = document.querySelector("#inputPrice");
let data = document.querySelector("#inputDate");
let err = document.querySelector('#err-info');
let btn = document.querySelector('#send-Btn');

btn.disabled = true;



checkboxes.forEach(element => {
    element.addEventListener('change',()=>{
        if(element.checked==true){
            console.log('ok')
        }else{
            console.log('nie ok')

        }
    })
});
title.addEventListener('keyup',()=>{
    checkValidation();
});
about.addEventListener('keyup',()=>{
    checkValidation();
});
imie.addEventListener('keyup',()=>{
    checkValidation();
});
password.addEventListener('keyup',()=>{
    checkValidation();
});
ulica.addEventListener('keyup',()=>{
    checkValidation();
});
nrdom.addEventListener('keyup',()=>{
    checkValidation();
});
miasto.addEventListener('keyup',()=>{
    checkValidation();
});
cena.addEventListener('keyup',()=>{
    checkValidation();
});
data.addEventListener('change',()=>{
    checkValidation();
});

//THE ELDER SCROLS ODKOMENTUJ GDY WSZYSTKO ZAWIEDZIE

// setInterval(()=>{
//     checkValidation();
// },100)
function checkValidation(){
    if(title.value.length>0&&about.value.length>0&&imie.value.length>0&&password.value.length>0&&ulica.value.length>0&&nrdom.value.length>0&&miasto.value.length>0&&cena.value.length>0&&data.value.length>0){
        console.log('Okejka');
        btn.disabled = false;
        err.innerHTML = ""

    }else{
        err.innerHTML = "Wszystkie pola muszą być uzupełnione"
        console.log('nie okejka')
        btn.disabled = true;

    }
}
