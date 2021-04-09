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
    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-user-edit mr-4"></i>Edytuj profil</button>
    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-shield-alt mr-4"></i>Hasła i bezpieczeństwo</button>
  </div>
  <div class="tab-content sm:w-8/12 sm:mt-0" id="v-pills-tabContent">
    <!-- Edycja profilu -->
    <div class="tab-pane fade show active w-full mt-8 sm:mt-0 mx-auto" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="w-full mx-auto  md:col-span-2">
      
        <div class="shadow overflow-hidden sm:rounded-md">
    <h2 class="p-4 text-3xl text-center font-light">Edytuj profil</h2>
    <div class="card w-11/12 p-4 mx-auto">
    <h2 class="text-center text-2xl">Dane osobowe</h2>
    <form action="../../back/change_setting.php" method="POST">
            <div class="mx-auto mt-4 w-1/2 flex flex-column items-center justify-center">
              <label class="block text-sm font-medium text-gray-700">
                Photo
              </label>
              <div class="mt-1 flex items-center">
                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                  <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                  </svg>
                </span>
               
                <label for="fileInput" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Change</label>
              </div>
              <input id="fileInput" type="file" class="invisible">

            </div>
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first_name" class="block text-sm font-medium text-gray-700">Imię</label>
                <input type="text" value="<?php echo $json[0]['fname']; ?>" name="first_name" id="first_name" autocomplete="given-name" class=" pl-2 mt-1 h-10 text-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Nazwisko</label>
                <input type="text" value="<?php echo $json[0]['lname']; ?>" name="last_name" id="last_name" autocomplete="family-name" class=" pl-2 mt-1 h-10 text-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6">
                <label for="street_address" class="block text-sm font-medium text-gray-700">Ulica</label>
                <input type="text" value="<?php echo $json[0]['street']; ?>" name="street" id="street_address" autocomplete="street-address" class="pl-2  mt-1 h-10 text-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6">
                <label for="street_address" class="block text-sm font-medium text-gray-700">Numer domu/mieszkania</label>
                <input type="text" value="<?php echo $json[0]['local']; ?>" name="number" id="street_number" autocomplete="street-address" class="pl-2  mt-1 h-10 text-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>


              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="city" class="block text-sm font-medium text-gray-700">Miasto</label>
                <input type="text" value="<?php echo $json[0]['city']; ?>" name="city" id="city" class="pl-2  mt-1 h-10 text-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

             
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Zapisz
            </button>
          </div>
        </div>
      </form>
      <div class="card w-11/12 p-4 mx-auto mt-8">
      <div class="col-span-6 sm:col-span-4">
      <h2 class="text-center text-2xl">Dane logowania</h2>
      <form action="../../back/change_setting.php" method="POST">
                <label for="email_address" class="block text-sm font-medium text-gray-700">Adres email</label>
                <input type="text" name="email_address" id="email_address" value="<?php echo $json[0]['mail']; ?>" autocomplete="email" class="pl-2  mt-1 h-10 text-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              <button type="submit" class="w-24 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Zapisz
            </button>
      </form>
      <form action="../../back/change_setting.php" method="POST">      
              <div class="col-span-6 sm:col-span-4 mt-8">
                <label for="login" class="block text-sm font-medium text-gray-700">Login</label>
                <input type="text" name="login" id="login" value="<?php echo $json[0]['login']; ?>"  class="  mt-1 pl-2 h-10 text-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>
              <button type="submit" class="w-24 mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Zapisz
              </button>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
      </form>
          </div>
      </div>
      
    </div>
    
     
    </div>
    </div>
    <!-- Hasło -->
    <div class="tab-pane fade mx-2 mt-8" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    <div class="alert alert-warning hidden " role="alert">
        Podane błędne hasło, konto nie zostało usunięte !
    </div>
    <div class="card p-4 shadow">
    <h2 class="p-4 text-3xl text-center font-light">Hasła i bezpieczeństwo</h2>

      <h2 class="my-2 font-bold">Zmiana hasła</h2>
      <form action="../../back/reset_password.php" method="POST">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Stare hasło</label>
            <input type="password" name="oldpassword" class="form-control" id="formGroupExampleInput" placeholder="********">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Nowe hasło</label>
            <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="********">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Powtórz</label>
            <input type="password" name="newpassword" class="form-control" id="formGroupExampleInput2" placeholder="********">
        </div>
        <button type="submit" class="sm:w-1/3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Zapisz
        </button>
        </form>
    </div>
    <div class="card shadow mt-8 p-2 text-center">
    <h2>Usuwanie konta</h2>
    <p class="fw-light text-dark">Pamiętaj ,że jest to czynność <span class="text-red-600">nieodwracalna</span> !</p>
    <button type="submit" class="show-reset-btn mt-4 sm:w-1/3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Usuń konto
    </button>
    </div>
    </div>
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