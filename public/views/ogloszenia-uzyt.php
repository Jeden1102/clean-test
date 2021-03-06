<?php
require '../../back/conn.php';

    //wyrzucenie ze strony
    session_start();
    if(isset($_SESSION["email"])){
    }else{
        header("Location:error-page.php");
        exit();
    }

$email = $_SESSION['email'];

//ogłoszenia aktywne
$sqlActiveOrders = "SELECT orders.street,orders.city,order_price,title,orders.number,order_id,orders.chosen_user from orders JOIN user ON user.user_id=orders.user_id where user.mail = '$email' AND (status=0 OR status=2)";
$resultActiveOrders = $conn->query($sqlActiveOrders);
@$jsonActiveOrders = mysqli_fetch_all($resultActiveOrders, MYSQLI_ASSOC);

//ogloszenia zakończone
$sqlEndedOrders = "SELECT orders.street,orders.city,order_price,title,orders.number,order_id from orders JOIN user ON user.user_id=orders.user_id where user.mail = '$email' AND status=1";
$resultEndedOrders = $conn->query($sqlEndedOrders);
@$jsonEndedOrders = mysqli_fetch_all($resultEndedOrders, MYSQLI_ASSOC);

//ogłoszenia zbanowane
$sqlBannedOrders = "SELECT orders.street,orders.city,order_price,title,orders.number,order_id from orders JOIN user ON user.user_id=orders.user_id where user.mail = '$email' AND status=3";
$resultBannedOrders = $conn->query($sqlBannedOrders);
@$jsonBannedOrders = mysqli_fetch_all($resultBannedOrders, MYSQLI_ASSOC);

//twoje zgloszenia
$sqlOffers = "SELECT orders.street,orders.city,order_price,title,orders.number,orders.order_id,user.user_id,chosen_user from offers JOIN user ON user.user_id=offers.user_id JOIN orders ON offers.order_id=orders.order_id where user.mail = '$email';";
$resultOffers = $conn->query($sqlOffers);
@$jsonOffers = mysqli_fetch_all($resultOffers, MYSQLI_ASSOC);

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
</head>
<body class="overflow-x-hidden">
<?php
if(isset($_SESSION['admin'])){
include '../components/admins-view.php';
}
?>
<?php
include '../components/header.php';
?>
<div class="align-items-start mt-8 sm:flex">
  <div class="nav flex-column nav-pills me-3 md:w-3/12" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-scroll mr-4"></i>Twoje ogłoszenia</button>
    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-bullhorn mr-4"></i>Twoje zgłoszenia</button>
    <button class="nav-link" id="v-pills-profile-ogloszenia" data-bs-toggle="pill" data-bs-target="#v-pills-ogloszenia" type="button" role="tab" aria-controls="v-pills-ogloszenia" aria-selected="false"><i class="fas fa-plus-circle mr-4"></i>Dodaj ogłoszenie</button>
  </div>
  <div class="tab-content sm:w-8/12 sm:mt-0" id="v-pills-tabContent">
  <div class="alert alert-success hidden" role="alert">
        Ogłoszenie  zostało dodane !
    </div>
    <div class="alert alert-primary hidden" role="alert">
        Użytkownik wybrany pomyślnie !
    </div>
    <!-- Edycja profilu -->
    <div class="tab-pane fade show active w-full mt-8 sm:mt-0 mx-auto" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="w-full mx-auto  md:col-span-2">
        <div class="shadow overflow-hidden sm:rounded-md">
        <?php
          include '../components/lista-ogl.php';
        ?>  
        </div>
    </div>
    </div>
    <!-- Zgłoszenia -->
    
    <div class="tab-pane fade mx-2 mt-8" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

    <div class="card p-4 shadow">
    <h2 class="p-4 text-3xl text-center font-light">Twoje zgłoszenia</h2>
      <?php
      include '../components/twoje-zgl.php';

      ?>
    </div>
    
    </div>
     <!-- Dodawanie ogłoszenia -->
     <div class="tab-pane fade mx-2 mt-8" id="v-pills-ogloszenia" role="tabpanel" aria-labelledby="v-pills-profile-ogloszenia">
     <div class="w-full  lg:w-full h-20  flex justify-center items-center relative">
       
       <div class="ogl-info cursor-pointer w-32 lg:w-72 absolute left-0 lg:left-0 top-0 h-full flex items-center bg-green-400 shadow-md step-one-visual text-white justify-center lg:justify-start">
         <i class="text-2xl fas fa-info-circle mr-2 lg:ml-1"></i>
         <p class="hidden lg:block">
         Informacje o ogłoszeniu
         </p> 
        </div>
       <div class="ogl-dane cursor-pointer w-32 lg:w-72 absolute left-20 lg:left-48 top-0  h-full flex items-center justify-center bg-green-200  step-two-visual text-white">
         <i class="text-2xl fas fa-user mr-2"></i>
         <p class="hidden lg:block">Dane osobowe</p>
        </div>
       <div class="ogl-cena cursor-pointer w-32 lg:w-72 absolute left-40 lg:left-96  h-full flex items-center justify-center shadow bg-green-200  step-three-visual text-white">
         <i class="text-2xl fas fa-tags mr-2"></i>
         <p class="hidden lg:block">Cena i data</p>
        </div>
     </div>
      <?php
      include '../components/dodaj-ogl.php';
      ?>
    
    </div>
</div>

<?php
  include '../components/footer.php';
?>

<?php
include '../components/deleteacc.php';

if(isset($_GET["badPwd"])){
  ?>
  <?php
  echo "<script>
  let btnRegister = document.querySelector('#v-pills-profile-tab');
  btnRegister.click();
  </script>";


  $script = file_get_contents('../scripts/showAlert.js');
  echo "<script>".$script."
  showAlert(alertWarning,5000);
  </script>";
}
if(isset($_GET["dodano"])){
  ?>
  <?php
  $script = file_get_contents('../scripts/showAlert.js');
  echo "<script>".$script."
  showAlert(alertSuccess,5000);
  
  </script>";
}
if(isset($_GET["userChosed"])){
  ?>
  <?php
  $script = file_get_contents('../scripts/showAlert.js');
  echo "<script>".$script."
  showAlert(alertPrimary,5000);
  
  </script>";
}
?>
</body>
</html>
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
<script src=""></script>
              
