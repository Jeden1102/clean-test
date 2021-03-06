<?php
session_start();
require './back/conn.php';

$sql = "SELECT * from orders WHERE status IN(0,2) AND date>CURRENT_DATE order by order_id desc LIMIT 7";
$result = $conn->query($sql);

$json = mysqli_fetch_all($result, MYSQLI_ASSOC);

@$email = $_SESSION['email'];

$sql = "SELECT * from user where mail = '$email'";
$result = $conn->query($sql);

$json2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
@$img  = $json2[0]["image_url"];
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
</head>

<body class="overflow-x-hidden" >
<?php
if(isset($_SESSION['admin'])){
echo '
<div class="alert alert-danger fixed bottom-4 right-4 z-10" role="alert">
<button type="button" class="" data-toggle="tooltip" data-placement="top" title="Jeste?? zalogowany jako adminstartor - po przej??ciu w pojedyncze og??oszenie, masz mo??liwo???? zbanowania og??oszenia.">
Sesja administartora
</button>
<i class="fas fa-info"></i>
<a href="./back/logout.php" class="btn btn-danger ml-4">Wyloguj</a>
<a href="./admin_panel/front/views/panel.php" class="btn btn-primary ml-4">Powr??t do panelu</a>

</div>
';
}
?>



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
            <a href="" class="nav-link   px-3 py-2 rounded-md text-sm font-medium">Strona g????wna</a>
            <a href="./public/views/ogloszenia.php" class="nav-link text-gray-700  px-3 py-2 rounded-md text-sm font-medium">Og??oszenia</a>
            <a href="./public/views/users.php" class=" nav-link text-gray-700 px-3 py-2 rounded-md text-sm font-medium">U??ytkownicy</a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <div><div class="relative ">
        <?php
        if(isset($_SESSION['email'])){
          echo '<div class="relative profile-dropdown ">
          <button type="button" class="mx-4 bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>
            ';
            if($json2[0]["image_url"] != ""){
              echo '<img class="h-8 w-8 rounded-full" src="./uploads/user_avatars/'.$img.'" alt="">';
            }else{
              echo '<img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">';
            } echo '
          </button>
        </div>

        <!--MENU ON MD + TO GIT-->
        
        <div class="hidden z-20 drop-profile origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
          <a href="./public/views/profile-settings.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Tw??j profil</a>
          <a href="./public/views/ogloszenia-uzyt.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Twoje og??oszenia i zg??oszenia</a>
          <a href="./back/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Wyloguj si??</a>
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
        Twoje konto zosta??o usuni??te !
</div>

<div class="w-full h-screen">


    <div class="h-4/5 sm:h-3/5   blur relative flex items-center justify-center"  style="background-image:url('./public/assets/img/wave2.svg');background-size:cover;background-position:center">

      <div class="w-full h-4/5  absolute">
      <div id="background-wrap">
        <div class="bubble x1"></div>
    <div class="bubble x2"></div>
    <div class="bubble x3"></div>
    <div class="bubble x4"></div>
    <div class="bubble x5"></div>
    <div class="bubble x6"></div>
    <div class="bubble x7"></div>
    <div class="bubble x8"></div>
    <div class="bubble x9"></div>
    <div class="bubble x10"></div>
      </div>
        <h1 class="text-center  text-black  font-bold text-5xl mt-8 head-witamy">Click<span class="text-green-400">&</span>Clean</h1>
        <p class="text-center text-black mt-8 font-light px-2 text-xl  sm:w-3/4 mx-auto">Click&Clean to sprawdzona firma, dzia??aj??ca na rynku ju?? od lat. Naszej firmie zaufa??y setki klient??w ??? zar??wno prywatnych u??ytkownik??w jak i firmy prowadz??ce w??asne dzia??alno??ci gospodarcze. Sprawd?? poni??ej dlaczego warto skorzysta?? z naszych us??ug! Platforma ????cz??ca ludzi posiadaj??cych srogie hacjendy z lud??mi maj??cymi r??ce i minimum zdolno??ci manualnych, ??eby posprz??ta??.<p>
        <div class="flex w-full items-center justify-center mt-4 ">
        <?php
        if(isset($_SESSION['email'])){
          echo '

      <a class="ml-4 z-10 next-step  inline-flex justify-center py-2 px-4  shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="./public/views/ogloszenia-uzyt.php">Zosta?? zleceniodawc??</a>
          ';
        }else{
          echo '

      <a class="ml-4 z-10 next-step  inline-flex justify-center py-2 px-4  shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="./public/views/login-register.php">Zosta?? zleceniodawc??</a>
          ';
        }
        ?>
        <p class="text-black mx-4">LUB</p>


        <a class="z-10 next-step  inline-flex justify-center py-2 px-4  shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="./public/views/ogloszenia.php">Szukaj ofert</a>

        </div>
      </div>
    </div>
    <div class="h-2/5">
    <h2 class="text-center mt-6 text-2xl">Sprawd?? najnowsze og??oszenia !</h2>
<div class=" mt-4 h-72 w-full md:w-11/12 mx-auto">
<div class="splide" id="splide">
	<div class="splide__track  mt-4">
		<ul class="splide__list  h-72 mt-4">

      <?php
        foreach ($json as $value) {
          
          echo '
			  <li class="splide__slide  h-full card">
          <a href="./public/views/ogloszenie.php?id=' .  $value['order_id'] . '" class="w-full h-full">
          <img class="w-full h-5/6"  src="./public/assets/img/sp1.jpg" alt="">
          <div class="flex items-center h-1/6">
            <h2 class="ml-2">' .  $value['title'] . '</h2>
            <p class="ml-2 font-bold">    ' .  $value['order_price'] . 'z??</p>
            <button type="button" class="ml-4 next-step  inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Sprawd??
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
      
</div>
<!-- carousel -->

<div class="py-12 bg-white mt-40">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="lg:text-center">
      <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        Dlaczego warto wybra?? Click&Clean?
      </p>
      <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
      Click&Clean to sprawdzona firma, dzia??aj??ca na rynku ju?? od lat. Naszej firmie zaufa??y setki klient??w ??? zar??wno prywatnych u??ytkownik??w jak i firmy prowadz??ce w??asne dzia??alno??ci gospodarcze. Sprawd?? poni??ej dlaczego warto skorzysta?? z naszych us??ug!
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
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Darmowa rejestracja i u??ytkowanie</p>
            <!-- darmowe -->
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
          Zar??wno rejestracja jak i korzystanie z naszego serwisu s?? ca??kowicie bezp??atne! Pozwala to m.in. na zamieszczanie og??osze??, wyszukiwanie ofert pracy bez wydawania ani z??ot??wki.
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
            <!-- brak ukrytych koszt??w -->
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Brak ukrytych koszt??w</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
          B??d??c naszym klientem, nie masz si?? o co martwi??, gdy?? nie oferujemy ??adnych us??ug, kt??re posiada??yby ukryte koszty. Stawiamy na uczciwo???? oraz zaufanie wobec klient??w.
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
            <!-- dzia??amy na rynku x lat -->
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Dzia??amy na rynku od 10 lat</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
          Click&Clean to firma do??wiadczona, dzia??aj??ca na rynku ju?? od dekady. Zadowolili??my setki klient??w, dzi??ki nam prac?? uzyska??o wielu ludzi oraz posiadamy same dobre opinie. Ty te?? zaufaj firmie Click&Clean!
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
            <!-- x zadowoloonych klient??w -->
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Zaufa??o nam ju?? ponad 1000 klient??w, zaufaj i ty</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
          Wraz z up??ywem lat obs??u??yli??my ju?? ponad 1000 klient??w. Liczba ta robi wra??enie oraz sama w sobie pokazuje, i?? naszej firmie warto zaufa??. Zar??wno nasza oferta, jak i strona jest przejrzysta, oferujemy szybki kontakt z nami -  mailowo lub telefonicznie oraz warto zobaczy?? opinie na nasz temat.
          </dd>
        </div>
      </dl>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>


    </section>
    <!-- Section: Social media -->

    <!-- Section: Text -->
    <section class="mb-4">
      <p>
      Click&Clean to sprawdzona firma, dzia??aj??ca na rynku ju?? od lat. Naszej firmie zaufa??y setki klient??w ??? zar??wno prywatnych u??ytkownik??w jak i firmy prowadz??ce w??asne dzia??alno??ci gospodarcze. Sprawd?? poni??ej dlaczego warto skorzysta?? z naszych us??ug!
      </p>
    </section>
    <!-- Section: Text -->

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Przydatne linki</h5>

          <ul class="list-unstyled mb-0 font-light ">
            <li>
              <a href="#!" class="text-white text-light">Regulamin</a>
            </li>
            <li>
              <a href="#!" class="text-white">FAQ</a>
            </li>
            <li>
              <a href="#!" class="text-white">Dummy</a>
            </li>
            <li>
              <a href="#!" class="text-white">Wi??cej</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">O firmie</h5>

          <ul class="list-unstyled mb-0 font-light">
            <li>
              <a href="#!" class="text-white">O nas</a>
            </li>
            <li>
              <a href="#!" class="text-white">Kontakt z nami</a>
            </li>
            <li>
              <a href="#!" class="text-white">Kariera</a>
            </li>
            <li>
              <a href="#!" class="text-white">Wi??cej</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Strona</h5>

          <ul class="list-unstyled mb-0 font-light">
            <li>
              <a href="#!" class="text-white">Og??oszenia</a>
            </li>
            <li>
              <a href="#!" class="text-white">U??ytkownicy</a>
            </li>
            <li>
              <a href="#!" class="text-white">API</a>
            </li>
            <li>
              <a href="#!" class="text-white">Wi??cej</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0 font-light">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    Szmitu x JPG x Kristof x Skryba 2021 &copy;
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<nav class="bg-green-400 w-full h-12 fixed bottom-0 left-0 border-t-2 border-green-500  md:hidden">
        
        <div class="flex h-full bg-green-400 ">
            <a href="index.php" class="w-1/4 h-full  flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500"><i class="fas fa-home text-2xl text-white hover:text-gray-100"></i></a>
            <a href="./public/views/ogloszenia.php" class="w-1/4 h-full  flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500"><i class="fas fa-bullhorn text-2xl text-white hover:text-gray-100"></i></a>
            <a href="./public/views/users.php" class="w-1/4 h-full  flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500"><i class="fas fa-users text-2xl text-white hover:text-gray-100"></i></a>
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
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>