btn = document.querySelector('.sign-btn');
//mail validation
let emailInput = document.querySelector('.email-register');
let emailError = document.querySelector('.email-register-error');
let emailValidated = false;
let loginValidated = false;
let pwdValidated = false;
let pwdRepeatValidated = false;

btn.disabled = true;
emailInput.addEventListener("keyup",()=>{
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(emailInput.value))
    {
        emailError.innerHTML = "";
        emailInput.classList.remove('bg-red-100');
        emailValidated = true;
    }else{
        emailError.innerHTML = "Wprowadzony e-mail jest niepoprawny";
        emailInput.classList.add('bg-red-100');
        emailValidated = false;

    }
    checkValidate()    
});
//login validation
let loginInput = document.querySelector('.login-input');
let loginError = document.querySelector('.login-register-error');
loginInput.addEventListener("keyup",()=>{
    if (loginInput.value.length>6)
    {
        loginError.innerHTML = "";
        loginInput.classList.remove('bg-red-100');
        loginValidated = true;
        
    }else{
        loginError.innerHTML = "Wprowadzony login jest zbyt krótki - min 6 znaków";
        loginInput.classList.add('bg-red-100');
        loginValidated = false;
    }
    checkValidate()
    
});
//pwd validation

let pwdInput = document.querySelector('.pwd-first');
let pwdError = document.querySelector('.password-register-error-first');
var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
pwdInput.addEventListener("keyup",()=>{
    if (strongRegex.test(pwdInput.value))
    {
        pwdError.innerHTML = "";
        pwdInput.classList.remove('bg-red-100');
        pwdValidated = true;
    }else{
        pwdError.innerHTML = "Wprowadzone hasło nie spełnia wymagań złożoności(8 znaków, wielka oraz mała litera oraz znak specjalny)";
        pwdInput.classList.add('bg-red-100');
        pwdValidated = false;
    }
    checkValidate()
    
});
//repeat vld 
let pwdRepeatInput = document.querySelector('.pwd-repeat');
let pwdRepeatError = document.querySelector('.password-register-error-repeat');
pwdRepeatInput.addEventListener("keyup",()=>{
    if (pwdRepeatInput.value == pwdInput.value)
    {
        pwdRepeatError.innerHTML = "";
        pwdRepeatInput.classList.remove('bg-red-100');
        pwdRepeatValidated = true;
    }else{
        pwdRepeatError.innerHTML = "Wprowadzone hasła muszą być takie same";
        pwdRepeatInput.classList.add('bg-red-100');
        pwdRepeatValidated = false;
    }
    checkValidate()
    
});
function checkValidate(){
    console.log('tak');
   
    if(emailValidated & pwdValidated & loginValidated & pwdRepeatValidated){
        btn.disabled = false;
        console.log('zwalidowana');
    }else{
        btn.disabled = true;
        console.log('niezwalidowa');

    }
}
