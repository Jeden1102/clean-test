<?php
session_start();
@$email = $_SESSION['email'];
require '../../back/conn.php';


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
    <link href="../styles.css" rel="stylesheet"/>
    <link href="../additionalcss.css" rel="stylesheet"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<script>


  </script>
<body class="overflow-x-hidden relative">
<?php
if(isset($_SESSION['admin'])){
include '../components/admins-view.php';
}
?>
<?php
include '../components/header.php';
?>
    <div class="lg:flex min-h-screen">
    <!-- FILTRY -->
    <div class="w-full lg:w-1/3">
    
      <button class="w-11/12 mx-auto bg-gray-50 text-white mt-4 rounded shadow p-2  flex items-center justify-end filter-btn">
          <img class="w-12" src="../assets/img/filter.png" alt="">

      </button>
      <div class="w-full lg:w-1/5 h-1/5 lg:h-screen bg-white card shadow filter-box mx-auto absolute left-0 top-44 z-2">
          <div class="w-4/5 mx-auto">
              <h2 class="my-4 text-2xl font-light text-center">Filtruj swoje wyszukiwania</h2>
              <form action="../../back/ogl-filtr.php" method="POST">
              <div>
                  <label for="exampleInputEmail1" class="form-label">Lokalizcja</label>
                  <input name="lokalizacja" value="<?php if(isset($_GET['city'])){if($_GET['city'] != '0' ){echo $_GET['city'];}}?>" type="text" class="form-control lokalizacja" id="exampleInputEmail1" placeholder="Opole" aria-describedby="emailHelp">
              </div>
          <p class="w-4/5 mx-auto mt-4 mb-2">
          <label for="amount">Zakres cen:</label>
          <input name="min" type="number" value="<?php if(isset($_GET['minPrice'])){echo $_GET['minPrice'];}?>" type="text" class="form-control minimum" id="exampleInputEmail1" placeholder="min" aria-describedby="emailHelp">

          <input name="max" type="number" min="1" value="<?php if(isset($_GET['minPrice'])){echo $_GET['order_price'];}?>" type="text" class="form-control maximum" id="exampleInputEmail1" placeholder="max" aria-describedby="emailHelp">

          

          </p>
  
          
          <div class="mt-4">
          <p>Wybierz rodzaj us??ugi (mo??esz wybra?? wi??cej opcji na raz)</p>
          <div class="flex flex-wrap">
              <div>
              <label class="bg-green-400 item-check w-28 h-28 m-2 text-white rounded shadow cursor-pointer  flex items-center justify-center flex-column hover:bg-green-500 " for="ch1">
              <i class="fas fa-car text-5xl"></i>
                <p class="mt-2 text-center">Sprz??tanie samochodu</p>
              </label>
              <input name="car_clean" id="ch1" type="checkbox" hidden>
              </div>
              <div>
              <label class="bg-green-400 item-check w-28 h-28 m-2 text-white rounded shadow cursor-pointer flex items-center justify-center flex-column hover:bg-green-500 " for="ch2">
              <img src="../assets/img/window-cleaner_4.png" alt="" class="w-14 h-14" />
              
              <p class="mt-2 text-center">Sprz??tanie domu</p>
              </label>
              <input name="window_clean" id="ch2" type="checkbox" hidden >
              </div>
              <div>
              <label class="bg-green-400 item-check w-28 h-28 m-2 text-white rounded shadow cursor-pointer flex items-center justify-center flex-column hover:bg-green-500 " for="ch3">
              <i class="fas fa-th-large text-5xl "></i>

              <p class="mt-2 text-center">Mycie okie??</p>
              </label>
              <input name="home_clean" id="ch3" type="checkbox" hidden>
              </div>
              
          </div>
          </div>
          
          </form>
      </div>
    </div>

    </div>
    <!-- Content -->

    <div class="w-full shadow mt-4 py-2 orders ">
      <div class="shadow w-11/12  mx-auto my-2 md:flex md:flex-row-reverse flex items-center justify-center mb-4 bg-gray-100">
      <?php
        if(isset($_SESSION['email'])){
          echo '
          <a href="./ogloszenia-uzyt.php">
          <button type="button" class="my-2 next-step w-40 items-center justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Dodaj Og??oszenie
              </button>
              </a> 
          ';
        }else{
          echo '
          <p class="ml-4">Aby doda?? w??asne og??oszenie najpierw musisz si?? zalogowa??<p>
          <a href="./login-register.php">
          <button type="button" class="my-2 next-step w-40 items-center justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Zaloguj si??
              </button>
              </a> 
          ';
        }

      ?>
   
      </div>
      <div class="ogloszenia mb-12">
      <div class="alert alert-success hidden w-11/12 mx-auto" role="alert">
        Og??oszenie zosta??o zbanowane
    </div>
      </div>



    </div>

    </div>
    <?php
        include '../components/footer.php';

    ?>
 
<?php 
        include '../components/mobile-nav.php';
?>
</body>
</html>
<script src="../scripts/showFilter.js"></script>
<script src="../scripts/checkboxes.js"></script>
<script src="../scripts/getApiData.js"></script>
<?php
    if(isset($_GET["oglBan"])){
      ?>
      <?php
      $script = file_get_contents('../scripts/showAlert.js');
      echo "<script>".$script."
      showAlert(alertSuccess,8000);
      
      </script>";
  }
?>