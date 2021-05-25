<?php
include '../components/forgotpwd.php';
?>
<?php
if(isset($_SESSION['admin'])){
include '../components/admins-view.php';
}
?>
<div class="w-4/5 mx-auto mb-20 lg:flex w-view items-center">
<img class="lg:w-1/2" src ="../../public/assets/img/login.png"   alt="test">

        <form  class="lg:w-1/2" method="POST" action="../../back/login.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adres e-mail</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="example@mail.pl" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Hasło</label>
                <input name="password" type="password" class="form-control" placeholder="********" id="exampleInputPassword1">
            </div>
            <p class="font-bold text-green-400 show-reset-btn cursor-pointer hover:text-green-500">Zapomniałeś hasła?</p>

            <div class="mb-3 mt-4 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Zapamiętaj mnie</label>
            </div>
            <button name="send" type="submit" class="btn bg-green-400 text-gray-50 hover:text-gray-50 hover:bg-green-600">Zaloguj</button>
        </form>
    </div>


<script>
 let showResetBtn = document.querySelector('.show-reset-btn');
 let resetPwdWindow = document.querySelector('.pwd-reset');
 let btnChange = document.querySelector('#btn-change');
 let btnCancel = document.querySelector('#btn-cancel');
 showResetBtn.addEventListener('click',()=>{
     resetPwdWindow.classList.remove('hidden');
 })
 btnCancel.addEventListener('click',()=>{
    resetPwdWindow.classList.add('hidden');
 })
</script>