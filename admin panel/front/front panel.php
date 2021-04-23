<?php

//ściąganie z bazy danych
require "../../back/conn.php";
$sql = "SELECT * from orders JOIN notification ON orders. WHERE status IN(3,4)";
$result = $conn->query($sql);
$json = mysqli_fetch_all($result, MYSQLI_ASSOC);
 var_dump($json);
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     
 </head>
 <body>
 <?php
 foreach ($json as $value) {
        echo "

   
        <div class='shadow w-11/12  mx-auto my-2 md:flex md:flex-row-reverse h-72 md:h-52'>
          <div class='md:w-1/3 md:h-full w-full mx-auto rounded  h-2/3' style='background-image:url( " . "../assets/img/sp1.jpg" . " );background-size:cover;background-position:center'>
          
          </div>
          <div class='mt-4 md:w-2/3 h-1/3 md:h-full'>
            <div class='flex w-full  justify-between items-center md:h-3/5 '>
            <h2  class='ml-4 text-2xl md:text-3xl'>" .  $value['title'] . "</h2>
            <p class='font-bold mr-4 md:text-2xl'> " .  $value['order_price'] . "zł</p>
            
            </div>
           
            <div class='font-light mt-2 md:ml-4'>
             " .  $value['city'] . " ," .  $value['street'] . " " .  $value['number'] . "
            </div>
          </div>
          <button class='bg-green-400'>POKAZ JAKO DOBRE</button>
          <button>ZBANUJ</button>
          <button>POKAŻ</button>
        </div>";
        
  
  
      }
    ?>
 </body>
 </html>
