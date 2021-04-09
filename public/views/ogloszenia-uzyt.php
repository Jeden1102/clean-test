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
        <h2 class="p-4 text-3xl text-center font-light">Twoje ogłoszenia</h2>
        <div class="w-40 mx-auto ">
        <button type="submit" class=" w-40 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Dodaj ogłoszenie !
        </button>
        </div>
        
        
         
          
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
    
    <div class="card p-4 shadow">
    <h2 class="p-4 text-3xl text-center font-light">Dodaj ogłoszenie</h2>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="#" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="company_website" class="block text-sm font-medium text-gray-700">
                  Tytuł ogłoszenia
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
          
                  <input type="text" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Zlecę posprzątanie apartamentu">
                </div>
              </div>
            </div>

            <div>
              <label for="about" class="block text-sm font-medium text-gray-700">
                Opis
              </label>
              <div class="mt-1">
                <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
              </div>
             
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">
                Dodaj zdjęcie ogłoszenia
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <span>Wybierz zdjęcie z komputera</span>
                      <input id="file-upload" name="file-upload" type="file" class="sr-only">
                    </label>
                  </div>
                  <p class="text-xs text-gray-500">
                    PNG, JPG, GIF do 10MB
                  </p>
                </div>
              </div>
            </div>
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <fieldset>
              <legend class="text-base font-medium text-gray-900">Rodzaj usługi:</legend>
              <div class="mt-4 space-y-4">
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="comments" class="font-medium text-gray-700">Sprzątanie domu/mieszkania</label>
                    <p class="text-gray-500">W opisie prosimy podać jak najwięcej szczegółow, np. wielkość mieszkania itp.</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="candidates" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="candidates" class="font-medium text-gray-700">Sprzątanie samochodu</label>
                    <p class="text-gray-500">W opisie prosimy podać jak najwięcej szczegółow, np. jaki to samochód oraz oczekiwanie czynnności np. pranie dywanów, mycie tapicerki.</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="offers" name="offers" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="offers" class="font-medium text-gray-700">Mycie okien</label>
                    <p class="text-gray-500">W opisie prosimy podać jak najwięcej szczegółow, np. ilość okien.</p>
                  </div>
                </div>
              </div>
            </fieldset>
           
          </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Dodaj!
            </button>
          </div>
          
        </div>
      </form>
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