let alertSuccess = document.querySelector(".alert-success");
let alertDanger = document.querySelector(".alert-danger");
let alertWarning = document.querySelector(".alert-warning");
let alertPrimary = document.querySelector(".alert-primary");
let alertForgotPwd = document.querySelector(".forgot-pwd");
let noemail = document.querySelector('.not-email');

function showAlert(alert,time){
    alert.classList.remove("hidden");
    alert.classList.add("block");
    
    setTimeout(()=>{
    
        alert.classList.add("hidden");
        alert.classList.remove("block");
    },time)
}