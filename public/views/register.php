

<div class="w-3/4 mx-auto mb-24 lg:flex w-view items-center">
    <img class="lg:w-1/2" src="../assets/img/register.png" alt="">
    <form class="row g-3 lg:w-1/2 register-form" method="POST" action="../../back/register.php">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Adres e-mail</label>
          <input name="mail" type="email" maxlength="30" placeholder="example@mail.pl" class="form-control email-register" >
          <div class="form-text email-register-error"></div>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Hasło</label>
          <input name="password" maxlength="40" placeholder="******" type="password" class="form-control pwd-first">
          <div class="form-text password-register-error-first"></div>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Powtórz hasło</label>
          <input placeholder="******" maxlength="40" type="password" class="form-control pwd-repeat" >
          <div class="form-text password-register-error-repeat"></div>
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Login</label>
          <input name="login" maxlength="30" placeholder="TwojLogin123" type="text" class="form-control login-input">
          <div class="form-text login-register-error"></div>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Akcpetuję <a href="" class="font-bold text-green-400">regulamin</a> serwisu i zgadzam się z jego warunkami.
            </label>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn bg-green-400 text-white sign-btn">Zarejestruj</button>
        </div>
        
       
      
    </form>
</div>

