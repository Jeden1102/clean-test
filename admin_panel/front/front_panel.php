<?php

//ściąganie z bazy danych
require "../../back/conn.php";
$sql = "SELECT orders.*,notification.user_id_from FROM orders JOIN notification ON orders.order_id=notification.order_id WHERE orders.status=2";
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
    <link href="../../public/styles.css" rel="stylesheet"/>
    <link href="../../public/additionalcss.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <?php
    foreach ($json as $value) {
      echo "

   
      <div class='shadow w-11/12  mx-auto my-2 md:flex md:flex-row-reverse h-72 md:h-52'>
        <div class='md:w-1/3 md:h-full w-full mx-auto rounded  h-2/3' style='background-image:url( " . "../../public/assets/img/sp1.jpg" . " );background-size:cover;background-position:center'>
        
        </div>
        <div class='mt-4 md:w-2/3 h-1/3 md:h-full'>
          <div class='flex w-full  justify-between items-center md:h-3/5 '>
          <h2  class='ml-4 text-2xl md:text-3xl'>" .  $value['title'] . "</h2>
          <p class='font-bold mr-4 md:text-2xl'> " .  $value['order_price'] . "zł</p>
          
          </div>
         
          <div class='font-light mt-2 md:ml-4'>
           " .  $value['city'] . " ," .  $value['street'] . " " .  $value['number'] . "
           <p>". $value['fname'] . " ". $value['lname']."</p>
           <p>". $value['description']."</p>
           <p>". $value['car_clean']."</p>
           <p>". $value['window_clean']."</p>
           <p>". $value['home_clean']."</p>
           <p>". $value['order_price']."</p>
           <p>". $value['date']."</p>
           <p>". $value['status']."</p>
           <h1>". $value['order_id']."<h1>
           

           
          </div>
        </div>
        <form method='POST' action='../back/zmien_na_ok.php?id=". $value['order_id']."'"."'>
        <button class='bg-green-400 hover:bg-green-500 border-1 font-bold text-white mx-2 border-green-500 ml-2'><p class='shadowek'>OK</p></button>
        <input type='hidden' value='ok' id='change_status'/>
        </form>
        <form method='POST' action='../back/ban-ogl.php?id=". $value['order_id']."'"."'>
        <button class='bg-red-400 hover:bg-red-500 border-1 font-bold text-white mx-2 border-red-500 ml-2'><p class='shadowek'>ZBANUJ</p></button>
        </form>
        <form method='POST' action ='../../public/views/ogloszenie.php?id=". $value['order_id']."'".">
        <button class='bg-blue-400 hover:bg-blue-500 border-1 font-bold text-white mx-2 border-blue-500'><p class='shadowek'>POKAŻ</p></button>
        </form>
      </div>
      

  ";
  }
       
    ?>
 </body>
 </html>
