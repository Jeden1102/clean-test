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
<body class="overflow-x-hidden">
<?php
include '../components/header.php';
?>
    <div class="lg:flex">
    <!-- FILTRY -->
    <div class="w-full lg:w-1/3">
    
      <button class="w-11/12 mx-auto bg-gray-50 text-white mt-4 rounded shadow p-2  flex items-center justify-end filter-btn">
          <img class="w-12" src="../assets/img/filter.png" alt="">

      </button>
      <div class="w-full lg:w-1/5 mx-auto h-screen bg-white card shadow filter-box mx-auto absolute left-0 top-44">
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

          <!-- <input type="text" id="amount" readonly class="text-green-400 font-bold " > -->

          </p>
  
          <!-- <div id="slider-range"></div> -->
          <div class="mt-4">
          <p>Wybierz rodzaj usługi (możesz wybrać więcej opcji na raz)</p>
          <div class="flex flex-wrap">
              <div>
              <label class="bg-green-400 item-check w-24 h-24 m-2 text-white rounded shadow cursor-pointer  flex items-center justify-center flex-column " for="ch1">
              <i class="fas fa-car text-5xl"></i>
                <p class="mt-2">Sprzątanie samochodu</p>
              </label>
              <input name="car_clean" id="ch1" type="checkbox" hidden>
              </div>
              <div>
              <label class="bg-green-400 item-check w-24 h-24 m-2 text-white rounded shadow cursor-pointer flex items-center justify-center flex-column " for="ch2">
              <img src="../assets/img/window-cleaner_4.png" alt="" class="w-16 h-16" />
              
              <p>Sprzątanie domu</p>
              </label>
              <input name="window_clean" id="ch2" type="checkbox" hidden >
              </div>
              <div>
              <label class="bg-green-400 item-check w-24 h-24 m-2 text-white rounded shadow cursor-pointer flex items-center justify-center flex-column " for="ch3">
              <i class="fas fa-th-large text-5xl "></i>

              <p class="mt-2">Mycie okień</p>
              </label>
              <input name="home_clean" id="ch3" type="checkbox" hidden>
              </div>
              
          </div>
          </div>
          <!-- <button type="submit" class="mt-4 next-step w-40 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Filtruj
          </button> -->
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
                  Dodaj Ogłoszenie
              </button>
              </a> 
          ';
        }else{
          echo '
          <p class="ml-4">Aby dodać własne ogłoszenie najpierw musisz się zalogować<p>
          <a href="./login-register.php">
          <button type="button" class="my-2 next-step w-40 items-center justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Zaloguj się
              </button>
              </a> 
          ';
        }

      ?>
   
      </div>
      <div class="ogloszenia mb-12">
      
      </div>
      <?php
      
        // if(empty($json)){

        //   echo '<h2 class="text-center text-2xl">Brak dostępnych wyszukiwań</h2>';
        // }else{
        //   foreach ($json as $value) {
          
        //     echo "
        //     <a href='./ogloszenie.php?id=".$value['order_id'] . "' >
        
       
        //     <div class='shadow w-11/12  mx-auto my-2 md:flex md:flex-row-reverse h-72 md:h-52'>
        //       <div class='md:w-1/3 md:h-full w-full mx-auto rounded  h-2/3' style='background-image:url( " . "../assets/img/sp1.jpg" . " );background-size:cover;background-position:center'>
      
        //       </div>
        //       <div class='mt-4 md:w-2/3 h-1/3 md:h-full'>
        //         <div class='flex w-full  justify-between items-center md:h-3/5 '>
        //         <h2  class='ml-4 text-2xl md:text-3xl'>" .  $value['title'] . "</h2>
        //         <p class='font-bold mr-4 md:text-2xl'> " .  $value['order_price'] . "zł</p>
        //         </div>
               
        //         <div class='font-light mt-2 md:ml-4'>
        //          " .  $value['city'] . " ," .  $value['street'] . "" .  $value['number'] . "
        //         </div>
        //       </div>
                  
        //     </div>
        //     </a> 
      
        //     ";
        //   }
        // }

      ?>
      <!-- ogloszenie -->

      <!-- <a href="" class="my-2">
      
     
      <div class="shadow w-11/12  mx-auto my-2 md:flex md:flex-row-reverse h-72 md:h-52">
        <div class="md:w-1/3 md:h-full w-full mx-auto rounded  h-2/3" style="background-image:url('../assets/img/sp2.jpg');background-size:cover;background-position:center">

        </div>
        <div class="mt-4 md:w-2/3 h-1/3 md:h-full">
          <div class="flex w-full  justify-between items-center md:h-3/5 ">
          <h2  class="ml-4 text-2xl md:text-3xl">Zlecę sprzatanie domu</h2>
          <p class="font-bold mr-4 md:text-2xl">199,99zł</p>
          </div>
         
          <div class="font-light mt-2 md:ml-4">
            Opole, 14 Maja 47-180
          </div>
        </div>
            
      </div>
      </a>  -->
    </div>
    </div>
   
 
<?php
        include '../components/mobile-nav.php';
?>
</body>
</html>
<script src="../scripts/showFilter.js">

</script>
<script src="../scripts/checkboxes.js"></script>


</script>
<script src="../scripts/getApiData.js"></script>


</script>