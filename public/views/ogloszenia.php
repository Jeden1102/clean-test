<?php
session_start();
require '../../back/conn.php';
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<script>
    let min1 = 0;
    let max2 = 0;
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 1, 500 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "zł " + ui.values[ 0 ] + " - zł " + ui.values[ 1 ] );
        min1 = ui.values[0];
        min2 = ui.values[1];
//   let test = document.querySelector('.xyz').innerHTML= min1;

      }
    });
    $( "#amount" ).val( "zł " + $( "#slider-range" ).slider( "values", 0 ) +
      " - zł " + $( "#slider-range" ).slider( "values", 1 ) );

  } );

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
              <div>
                  <label for="exampleInputEmail1" class="form-label">Lokalizcja</label>
                  <input name="lokalizacja" type="text" class="form-control" id="exampleInputEmail1" placeholder="Opole" aria-describedby="emailHelp">
              </div>
          <p class="w-4/5 mx-auto mt-4 mb-2">
          <label for="amount">Zakres cen:</label>
          <input type="text" id="amount" readonly class="text-green-400 font-bold " >
          </p>
  
          <div id="slider-range"></div>

          <div class="mt-4">
          <p>Wybierz rodzaj usługi (możesz wybrać więcej opcji na raz)</p>
          <div class="flex flex-wrap justify-between">
              <div>
              <label class="bg-red-400 item-check w-24 h-24" for="ch1">xxx</label>
              <input id="ch1" type="checkbox" hidden>
              </div>
              <div>
              <label class="bg-red-400 item-check w-24 h-24" for="ch2">xxx</label>
              <input id="ch2" type="checkbox" hidden >
              </div>
              <div>
              <label class="bg-red-400 item-check w-24 h-24" for="ch3">xxx</label>
              <input id="ch3" type="checkbox" hidden>
              </div>
              
          </div>
          </div>

      </div>
    </div>
    </div>
    <!-- Content -->

    <div class="w-full shadow mt-4 py-4 orders">
      
       
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
<script src="../scripts/getApiData.js">


</script>
