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
<body>
<?php
include '../components/header.php';



?>


    <div class=" relative">
    <div class="hidden loading absolute top-0 left-0 w-full h-full bg-red-300 flex justify-center items-center" style="background:rgba(1, 1, 1, .3);">
    <i class="fas fa-spinner text-5xl text-white animate-spin opacity-1"></i>
    </div>
    <div class="alert alert-success hidden" role="alert">
        Aby zakończyc utworzenie konta potwierdź swój adres email - wiadomość została wysłana !
    </div>
    <div class="alert alert-success not-email hidden" role="alert">
        Do tego adresu e-mail nie przypisano żadnego konta
    </div>
    <div class="alert alert-warning hidden" role="alert">
        Do tego adresu e-mail nie jest przypisane żadne konto !
    </div>
    <div class="alert alert-primary hidden" role="alert">
        Błędne hasło lub konto nieaktywowane !
    </div>
    <div class="alert alert-primary hidden forgot-pwd" role="alert">
        Na Twoją skrzynkę e-mail wysłana została wiadomość dzięki której będziesz mógł ustawić nowe hasło!
    </div>
    <div class="alert alert-danger hidden" role="alert">
        Ten 
        <?php 
        @$message = $_GET["loginTaken"];
        @$message2 = $_GET["mailTaken"];  
        if($message && $message2){
            echo $message . 'i' .  $message2;
        }else if($message){
            echo $message;
        }else{
            echo $message2;
        }
        ?>
         został już zajęty !
    </div>
        <p class="text-center p-4 font-light">Utwórz konto i zaloguj się aby korzytać z pełni możliwości serwisu !</p>
        <ul class="nav nav-pills mb-3 mx-auto w-5/6 flex justify-center align-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active mr-2" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Zaloguj się</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Rejestracja</button>
        </li>
      
        </ul>
        <div class="tab-content" id="pills-tabContent">
            
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <!--LOGIN FORM -->
            
            <?php
                include './login.php';
            ?>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <!--REGISTER FORM -->
            <?php
                include './register.php';
            ?>
            
        </div>
        </div>
        
    </div>


    <?php
        include '../components/mobile-nav.php';
    ?>
    
</body>

<?php 
    if(isset($_GET["mailTaken"]) || isset($_GET["loginTaken"])){
        ?>
        <?php
        $script = file_get_contents('../scripts/changeToRegister.js');
        echo "<script>".$script."</script>";


        $script = file_get_contents('../scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertDanger,7000);
        </script>";
    }
    if(isset($_GET["register"])){
        ?>
        <?php
        $script = file_get_contents('../scripts/changeToRegister.js');
        echo "<script>".$script."</script>";
        $script = file_get_contents('../scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertSuccess,7000);
        
        </script>";
    }
    if(isset($_GET["mailNotExist"])){
        ?>
        <?php
        $script = file_get_contents('../scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertWarning,7000);
        
        </script>";
    }
    if(isset($_GET["badPwd"])){
        ?>
        <?php
        $script = file_get_contents('../scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertPrimary,7000);
        
        </script>";
    }
    if(isset($_GET["forgotPwdSend"])){
        ?>
        <?php
        $script = file_get_contents('../scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertForgotPwd,7000);
        
        </script>";
    }
    if(isset($_GET["notemail"])){
        ?>
        <?php
        $script = file_get_contents('../scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(noemail,7000);
        
        </script>";
    }    
?>

</html>
<script src="../scripts/registrationValidation.js"></script>
<script>
let btn = document.querySelector('.sign-btn');
btn.addEventListener('click',()=>{
    let load = document.querySelector('.loading');
    load.classList.remove('hidden');
})

</script>