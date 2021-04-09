<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/193f3f2978.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="../styles.css" rel="stylesheet"/>
    <link href="../additionalcss.css" rel="stylesheet"/>
</head>
<body class="h-screen w-screen flex justify-center items-center">
    <div class="card p-4 mx-auto my-auto w-full md:w-2/3">
    <form method="POST" action="../../back/reset_password.php">
    <div class="h-1/5 bg-white justify-center flex items-center"><img src="../assets/img/logo.png" class="h-28" alt="">
            </div>
        <h2 class="text-center my-8 text-2xl">Ustaw nowe hasło</h2>
        <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Nowe hasło</label>
                <input type="password" class="pwd-first form-control" id="formGroupExampleInput2" placeholder="********">
                <div class="form-text pwd-register-error"></div>
        </div>
        <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Powtórz</label>
                <!-- Dane dla backendu -->
                <input type="password" name="newpassword" class="pwd-second form-control" id="formGroupExampleInput2" placeholder="********">
                <div class="form-text pwdRepeat-register-error"></div>
                <input type="hidden" value="<?=$_GET["a"]?>" name="active_code"/>
        </div>
        <div class="flex space-around">
        <div>
          <button type="submit" class="send-btn btn bg-green-400 text-white sign-btn">Ustaw</button>
        </div>
        <a href="./login-register.php" class="w-full md:w-1/3">
        <div class="ml-8">
          <button type="submit" class="send-btn btn bg-red-400 text-white sign-btn">Wróc</button>
        </div>
        </a>
        </div></form>
       
    </div>
    
</body>
</html>
<script src="../scripts/resetPwdValidation.js"></script>