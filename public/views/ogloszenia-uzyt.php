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

$sql = "SELECT * from user where mail = '$email'";
$result = $conn->query($sql);

$json = mysqli_fetch_all($result, MYSQLI_ASSOC);
// print_r($json);
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
include '../components/header.php';
?>
<div class="align-items-start mt-8 sm:flex">
  <div class="nav flex-column nav-pills me-3 md:w-3/12" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-scroll mr-4"></i>Twoje ogłoszenia</button>
    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-bullhorn mr-4"></i>Twoje zgłoszenia</button>
    <button class="nav-link" id="v-pills-profile-ogloszenia" data-bs-toggle="pill" data-bs-target="#v-pills-ogloszenia" type="button" role="tab" aria-controls="v-pills-ogloszenia" aria-selected="false"><i class="fas fa-plus-circle mr-4"></i>Dodaj ogłoszenie</button>
  </div>
  <div class="tab-content sm:w-8/12 sm:mt-0" id="v-pills-tabContent">
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
    </div>
    
    </div>
     <!-- Dodawanie ogłoszenia -->
     <div class="tab-pane fade mx-2 mt-8" id="v-pills-ogloszenia" role="tabpanel" aria-labelledby="v-pills-profile-ogloszenia">
    
      <?php
      include '../components/dodaj-ogl.php';
      ?>
    
    </div>
</div>
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