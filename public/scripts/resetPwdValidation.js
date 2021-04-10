let pwdFirst = document.querySelector('.pwd-first');
let pwdFirstError = document.querySelector('.pwd-register-error');
let pwdRepeatError = document.querySelector('.pwdRepeat-register-error');

let pwdSecond = document.querySelector('.pwd-second');
let sendBtn = document.querySelector('.send-btn');
let pwdValidated = false;
let pwdRepeatValidated = false;
let pwdMatch = false;
var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
sendBtn.disabled = true;
pwdFirst.addEventListener('keyup',()=>{
    if (strongRegex.test(pwdFirst.value))
    {
        pwdFirstError.innerHTML = "";
        pwdFirst.classList.remove('bg-red-100');
        pwdValidated = true;
    }else{
        pwdFirstError.innerHTML = "Wprowadzone hasło nie spełnia wymagań złożoności(8 znaków, wielka oraz mała litera oraz znak specjalny)";
        pwdFirst.classList.add('bg-red-100');
        pwdValidated = false;
    }
    checkValidate();
})
pwdSecond.addEventListener('keyup',()=>{
    if (strongRegex.test(pwdSecond.value))
    {
        pwdRepeatError.innerHTML = "";
        pwdSecond.classList.remove('bg-red-100');
        pwdRepeatValidated = true;
    }else{
        pwdRepeatError.innerHTML = "Wprowadzone hasło nie spełnia wymagań złożoności(8 znaków, wielka oraz mała litera oraz znak specjalny)";
        pwdSecond.classList.add('bg-red-100');
        pwdRepeatValidated = false;
    }
    checkValidate();
})
pwdSecond.addEventListener("keyup",()=>{
    if (pwdSecond.value == pwdFirst.value)
    {
        pwdRepeatError.innerHTML = "";
        pwdSecond.classList.remove('bg-red-100');
        pwdMatch = true;
    }else{
        pwdRepeatError.innerHTML = "Wprowadzone hasła muszą być takie same";
        pwdSecond.classList.add('bg-red-100');
        pwdMatch= false;
    }
    checkValidate()
    
});

function checkValidate(){   
    if(pwdValidated & pwdRepeatValidated & pwdMatch){
        sendBtn.disabled = false;
    }else{
        sendBtn.disabled = true;
    }
}