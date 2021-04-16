<?php
session_start();
require './back/conn.php';

$sql = "SELECT * from orders order by order_id desc";
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
    <link href="./public/styles.css" rel="stylesheet"/>
    <link href="./public/additionalcss.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
</head>

<body >

<nav class="bg-white p-0 m-0 ">
  <div class="w-full">
    <div class="relative flex items-center justify-between h-20 border-b-2">
    
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
      <a href="index.php"> <div class="flex-shrink-0 flex items-center justify-center sm:m-auto md:m-0">
          <img class="block h-24 w-auto" src="./public/assets/img/logo.png" alt="Workflow">
        </div></a>
       
        <div class="hidden md:block sm:ml-6 my-auto">
          <div class="flex space-x-4 items-center">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Strona główna</a>
            <a href="./public/views/ogloszenia.php" class="text-gray-700 hover:bg-gray-800 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Ogłoszenia</a>
            <a href="#" class="text-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Użytkownicy</a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <button class="bg-green-400 p-1 rounded-full text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
          <span class="sr-only">View notifications</span>
          <!-- Heroicon name: outline/bell -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
        </button>
        <div><div class="relative ">
        <?php
        if(isset($_SESSION['email'])){
          echo '<div class="relative profile-dropdown ">
          <button type="button" class="mx-4 bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
          </button>
        </div>

        <!--MENU ON MD + TO GIT-->
        
        <div class="hidden z-20 drop-profile origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
          <a href="./public/views/profile-settings.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Twój profil</a>
          <a href="./public/views/ogloszenia-uzyt.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Twoje ogłoszenia i zgłoszenia</a>
          <a href="./back/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Wyloguj się</a>
        </div>';
        
        }else{
          echo '<a href="./public/views/login-register.php" class=" h-8 w-8 rounded-full bg-green-400 flex justify-center items-center mx-4 md:mr-8"><i class="fas fa-sign-in-alt text-white"></i></a>';
        
        }
        ?>
        <!-- Profile dropdown -->
        
          
        </div>
      </div>
    </div>
  </div>

</nav>

<div class="flex items-center justify-center flex-col">
<div class="alert alert-warning hidden w-full " role="alert">
        Twoje konto zostało usunięte !
</div>

<div class="w-full h-screen">
    <div class="h-3/5" class="grid place-content-center flex items-center" style="background-image:url('./public/assets/img/hello.jpg');background-size:cover;background-position:center">
    <div class="w-full h-2/5 bg-gray-300 opacity-80 absolute mt-24"></div>
    </div>
    <div class="h-2/5">
    <h2 class="text-center mt-6 text-2xl">Sprawdź najnowsze ogłoszenia !</h2>
<div class="bg-red-200 mt-4 h-72 w-full md:w-11/12 mx-auto">
<div class="splide" id="splide">
	<div class="splide__track  mt-4">
		<ul class="splide__list  h-72 mt-4">

      <?php
        foreach ($json as $value) {
          
          echo '
			  <li class="splide__slide  h-full card">

          <img class="w-full h-5/6"  src="./public/assets/img/sp1.jpg" alt="">
          <div class="flex items-center h-1/6">
            <h2 class="ml-2">' .  $value['title'] . '</h2>
            <p class="ml-2 font-bold">    ' .  $value['order_price'] . 'zł</p>
            <button type="button" class="ml-4 next-step  inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Sprawdź
        </button>
          </div>
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
      
</div>
<!-- carousel -->

<div class="py-12 bg-white mt-4">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="lg:text-center">
      <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        Dlaczego warto wybrać Click&Clean?
      </p>
      <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
      Click&Clean to sprawdzona firma, działająca na rynku już od lat. Naszej firmie zaufały setki klientów – zarówno prywatnych użytkowników jak i firmy prowadzące własne działalności gospodarcze. Sprawdź poniżej dlaczego warto skorzystać z naszych usług!
      </p>
    </div>

    <div class="mt-10">
      <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-400 text-white">
              <!-- Heroicon name: outline/globe-alt -->
              <i class="fas fa-funnel-dollar"></i>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Darmowa rejestracja i użytkowanie</p>
            <!-- darmowe -->
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
          Zarówno rejestracja jak i korzystanie z naszego serwisu są całkowicie bezpłatne! Pozwala to m.in. na zamieszczanie ogłoszeń, wyszukiwanie ofert pracy bez wydawania ani złotówki.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-400 text-white">
              <!-- Heroicon name: outline/scale -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
              </svg>
            </div>
            <!-- brak ukrytych kosztów -->
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Brak ukrytych kosztów</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
          Będąc naszym klientem, nie masz się o co martwić, gdyż nie oferujemy żadnych usług, które posiadałyby ukryte, koszty. Stawiamy na uczciwość oraz zaufanie wobec klientów.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-400 text-white">
              <!-- Heroicon name: outline/lightning-bolt -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <!-- działamy na rynku x lat -->
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Działamy na runku od 10 lat</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
          Click&Clean to firma doświadczona, działająca na rynku już od dekady. Zadowoliliśmy setki klientów, dzięki nam pracę uzyskało wielu ludzi oraz posiadamy same dobre opinie. Ty też zaufaj firmie Click&Clean!
          </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-green-400 text-white">
              <!-- Heroicon name: outline/annotation -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
              </svg>
            </div>
            <!-- x zadowoloonych klientów -->
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Zaufało nam już ponad 1000 klientów, zaufaj i ty</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
          Wraz z upływem lat obsłużyliśmy już ponad 1000 klientów. Liczba ta robi wrażenie oraz sama w sobie pokazuje, iż naszej firmie warto zaufać. Zarówno nasza oferta, jak i strona jest przejrzysta, oferujemy szybki kontakt z nami -  mailowo lub telefonicznie oraz warto zobaczyć opinie na nasz temat.
          </dd>
        </div>
      </dl>
    </div>
  </div>
</div>

<div class="min-h-0 w-full" style="color:#f2f2f2;">
  <div class="h-3/4 w-full flex border-b border-black bg-purple-800">
  <div class="flex-1">
  <div class="text-xl font-bold">About Us</div>
  <p>Click&Clean to firma zajmująca się tworzeniem ogłoszeń dla użytkowników, którzy poszukują ofert pracy z zakresu usług sprzątania oraz użytkowników, którzy pragną wynająć profesjonalny sektor usług utrzymania czystości. Gwarantujemy najwyższą jakość usług, posiadamy duże doświadczenie oraz same pozytywne opinie zadowolonych klientów. Zaufało nam już ponad 1000 klientów, zaufaj i ty!</p>
  </div>
    <div class="flex-1 justify-center flex">
      <ul class="list-none text-xl font-bold">Links
        <li class="font-normal pt-4"><a href="#" class="hover:text-gray-400">Link</a></li>
        <li class="font-normal pt-2"><a href="#" class="hover:text-gray-400">Link</a></li>
        <li class="font-normal pt-2"><a href="#" class="hover:text-gray-400">Link</a></li>
        <li class="font-normal pt-2"><a href="#" class="hover:text-gray-400">Link</a></li>
        <li class="font-normal pt-2"><a href="#" class="hover:text-gray-400">Link</a></li>
        <li class="font-normal pt-2"><a href="#" class="hover:text-gray-400">Link</a></li>
      </ul>
    </div>
    <div class="flex-1 justify-center h-full">
      <div class="font-bold text-xl flex justify-center">Contact Us</div>
        <div class="mt-4">
          <div class="flex justify-center">
            <textarea class="border-1 flex my-4 border-purple-600 w-1/2 outline-none rounded-md text-black"></textarea>
          </div>
          <div class="flex justify-center">
            <input type="text" class="border-1 border-purple-600 flex w-1/2 outline-none rounded-md text-black" />
          </div>
          <div class="flex justify-center">
            <button class="border-1 bg-purple-500 my-2 p-2 rounded-md border-purple-600 hover:bg-purple-600">Prześlij</button>
          </div>
        </div>
      </div>
    </div>
  <div class="h-1/4 w-full flex justify-center bg-purple-900"><i class="far fa-copyright mr-1.5 mt-1"></i> 2020 Copyright: MDBootstrap.com</div>
</div>
   
<nav class="bg-green-400 w-full h-12 fixed bottom-0 left-0 border-t-2 border-green-500  md:hidden">
        
        <div class="flex h-full bg-green-400 ">
            <a href="index.php" class="w-1/4 h-full  flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500"><i class="fas fa-home text-2xl text-white hover:text-gray-100"></i></a>
            <a href="./public/views/ogloszenia.php" class="w-1/4 h-full  flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500"><i class="fas fa-bullhorn text-2xl text-white hover:text-gray-100"></i></a>
            <a href="" class="w-1/4 h-full  flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500"><i class="fas fa-users text-2xl text-white hover:text-gray-100"></i></a>
            <?php
            if(isset($_SESSION['email'])){
            echo ' <a href="./public/views/profile-settings.php" class="w-1/4 h-full  flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500">
            <i class="fas fa-user-circle text-3xl text-white hover:text-gray-100"></i>
            </a>
            ';
            }else{
                echo '<a href="./public/views/login-register.php" class="w-1/4 h-full  flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500">
                <i class="fas fa-sign-in-alt text-3xl text-white hover:text-gray-100"></i>
                </a>';

            }
            ?>
            </a>
        </div>
    </nav>
</body>
</html>
<script src="./public/scripts/dropdownProfile.js"></script>
<?php
if(isset($_GET["accDeleted"])){
 
 $script = file_get_contents('./public/scripts/showAlert.js');
  echo "<script>".$script."
  showAlert(alertWarning,5000);
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
				perPage: 3,
            },
            1024: {
                perPage:2,
            },
            840:{
                perPage:1,
            }
		}
	} ).mount();
} );
</script>