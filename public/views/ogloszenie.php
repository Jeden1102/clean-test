<?php

session_start();
require '../../back/conn.php';

if(!isset($_GET['id'])){
    header("Location:error-page.php");
    exit();
}

$id=$_GET['id'];
$sql = "SELECT * from orders WHERE order_id=$id";
$result = $conn->query($sql);

$json = mysqli_fetch_all($result, MYSQLI_ASSOC);

@$email = $_SESSION['email'];

$sql = "SELECT * from user where mail = '$email'";
$result = $conn->query($sql);

$json2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
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
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<?php
include '../components/header.php';
?>
        <div class="w-11/12 card mx-auto shadow h-full mt-4  ">
           
           <!-- ładowane dynamicznie -->
           <div class="alert alert-success hidden" role="alert">
        Aplikacja przebiegła pomyślnie, <a class="text-green-600 cursor-pointer">zobacz status swoich zgłoszeń</a> !
    </div>
    <div class="alert alert-warning hidden" role="alert">
        Nie możesz zgłosić się do swojej oferty !
    </div>
    <div class="alert alert-danger hidden" role="alert">
    Już zgłosiłeś się do tej oferty <a class="text-green-600 cursor-pointer">zobacz status swoich zgłoszeń</a> !
    </div>
    <div class="alert alert-primary hidden" role="alert">
    Ogłoszenie zostało zgłoszone.
    </div>
    <div class="alert alert-warning forgot-pwd hidden" role="alert">
    Już zgłosiłeś to ogłoszenie. Prosimy o cierplilowość.
    </div>
    <div class="alert alert-danger not-email hidden" role="alert">
    Nie możesz zgłosić swojego ogłoszenia.
    </div>
           <div class="md:flex w-full h-full pb-4">

           <?php 
           echo'
           <div class="h-96 md:w-1/2 bg-red-400 md:mt-6 md:ml-4 shadow rounded " style="background-image:url('.'../assets/img/sp1.jpg'.');background-size:cover;background-position:center">
            </div>

            <div class="md:w-1/2 ">
                <div class="card shadow w-11/12 mx-auto mt-4">
                <h2 class="font-bold text-3xl my-2 text-center">'.$json[0]["title"].'</h2>
                <p class="p-2">'.$json[0]["description"].'</p>
                </div>
                
                <div class="card shadow mt-4 flex w-11/12 mx-auto p-2">
                    <p> Oferta ważna do: '.$json[0]["date"].' </p>';

                    // temat ogłoszenia

                    echo "<p> Zlecenie obejmuje </p>";
                         if($json[0]["car_clean"]==1)
                        echo "<p>Mycie auta</p>";
                        if($json[0]["window_clean"]==1)
                        echo "<p>Mycie okien</p>";
                        if($json[0]["home_clean"]==1)
                        echo "<p>Sprzątanie domu</p>";
                    
                    echo '
                    <p class="text-2xl my-2">'.$json[0]["order_price"].' zł</p>
                    <p class="font-light my-2">'.$json[0]["city"].','.$json[0]["street"].' '.$json[0]["number"].'</p>

                </div>
                <div class="card shadow w-11/12 mx-auto mt-4 p-2">'
            ?>
                    <!-- jesli zalogowany -->

                    <?php

                    if(isset($_SESSION['email'])){
                    echo '<div>
                    <a href="../../back/user_applies.php?order_id='.$id.'"><button type="button" class="ml-4 next-step  inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Aplikuj
                    </button></a>
                    <button type="button" class="show-reset-btn mt-4 w-40 ml-4  inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Zgłoś ogłoszenie
                    </button>
                    </div>
                    ';
                    }else{
                        echo '<p>Aby aplikować do tego ogłoszenia lub zgłosić nieprawidłowość zawartość utwórz konto lub zaloguj się.</p>
                        <a href="./login-register.php">
                        <button type="button" class="show-reset-btn mt-4 w-40 ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Zaloguj się
                         </button>
                         </a>
                        ';

                    }
                    include '../components/reportOgl.php';
                    ?>
                </div>

            </div>

           </div>
           <!-- ładowane na stałe -->
           <div class="shadow mb-8">
           <h2 class="text-center mt-6 text-2xl">Sprawdź podobne ogłoszenia !</h2>
            <div class="bg-red-200 mt-4 h-72  w-full md:w-11/12 mx-auto">
            <div class="splide md:h-2/3" id="splide">
                <div class="splide__track  mt-4">
                    <ul class="splide__list  h-72 mt-4">

                <?php

                    $sql = "SELECT * from orders;";
                    $result = $conn->query($sql);

                    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    foreach ($json as $value) {
                    
                    echo '
                        
                        <li class="splide__slide  h-full card">
                        <a href="./ogloszenie.php?id=' .  $value['order_id'] . '" class="w-full h-full">
                    <img class="w-full h-5/6"  src="../assets/img/sp1.jpg" alt="">
                    <div class="flex items-center h-1/6">
                        <h2 class="ml-2">Zlecę mycie podłogi</h2>
                        <p class="ml-2 font-bold">    ' .  $value['order_price'] . 'zł</p>
                        <button type="button" class="ml-4 next-step  inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sprawdź
                    </button>
                    </div>
                    </a>
                    </li>

                    
                    ';
                    }
                ?>

                    </ul>
                </div>
            </div>
            </div>
           </div>

        </div>


</body>
</html>
<?php
//aplikowanie do zgłoszenia
    if(isset($_GET["dodano"])){
        ?>
        <?php
        $script = file_get_contents('../scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertSuccess,12000);
        
        </script>";
    }
    if(isset($_GET["alreadyapplied"])){
        ?>
        <?php
        $script = file_get_contents('../scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertDanger,12000);
        
        </script>";
    }
    if(isset($_GET["ouroffer"])){
        ?>
        <?php
        $script = file_get_contents('../scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertWarning,12000);
        
        </script>";
    }
    //zgłaszanie ogłoszenia
    if(isset($_GET["zgloszono"])){
        ?>
        <?php
        $script = file_get_contents('../scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertPrimary,7000);
        
        </script>";
    }
    if(isset($_GET["juzzgloszono"])){
        ?>
        <?php
        $script = file_get_contents('../scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertForgotPwd,7000);
        
        </script>";
    }
    if(isset($_GET["swoje"])){
        ?>
        <?php
        $script = file_get_contents('../scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(noemail,7000);
        
        </script>";
    }
?>
<script>
  document.addEventListener( 'DOMContentLoaded', function () {
	new Splide( '#splide', {
		perPage    : 4,
    perMove: 1,
		breakpoints: {
			1200: {
				perPage: 4,
            },
            1024: {
                perPage:3,
            },
            840:{
                perPage:2,
            },
            550:{
                perPage:1,
            }
		}
	} ).mount();
} );


</script>
<script src="../scripts/showAlert.js"></script>
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