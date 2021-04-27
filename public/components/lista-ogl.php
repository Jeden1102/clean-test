 <h2 class="p-4 text-3xl text-center font-light">Twoje ogłoszenia</h2>

        <div class="lg:flex">
        <div class="flex justify-center items-center">
        <p class="text-center">Znajdziesz tutaj swoje ogłoszenia umieszczone na naszej stronie. Jeśli nie widzisz tutaj żadnych ogłoszeń umieść ogłoszenie za darmo aby pozyskać fachowców do pomocy.</p>
        
        </div>
        <img src="../assets/img/twoje_ogloszenia.png" class="h-60 mx-auto md:h-80" alt="">

        </div>

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Ogłoszenia aktywne</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Ogłoszenia zakończone</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Ogłoszenia zbanowane</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

      <!-- aktywne ogłoszenia -->

      <?php
    if(empty($json)){

    echo '<h2 class="text-center text-2xl my-4">Nie masz żadnych ogłoszeń</h2>';
    }else{
      foreach ($json as $value) {
        echo "
        <a href='../views/ogloszenie.php?id=" .  $value['order_id'] . "' >
    
   
        <div class='shadow w-11/12  mx-auto my-2 md:flex md:flex-row-reverse '>
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
            <div class='font-light mt-2 md:ml-4'>
           <a href='../views/edit-ogl.php?id=" .  $value['order_id'] . "'><button class='ml-4 border-2 p-0.5 border-green-500 text-white bg-green-400 hover:bg-green-500 rounded-md w-24'>Edytuj</button></a>
           <div class='accordion-item mt-4'>
           <a class='btn btn-primary' data-bs-toggle='collapse' href='#collapseExample" .  $value['order_id'] . "' role='button' aria-expanded='false' aria-controls='collapseExample'>
           <div class='flex'><p>Sprawdź chętnych do wykonania zlecenia</p> <p class='animate-bounce mx-2'>(1)</p> <p class='animate-ping mx-2 text-red-700'>!</p></div>
         </a>
  
       </p>
       <div class='collapse' id='collapseExample" .  $value['order_id'] . "'>
         <div class='card card-body'>
         " .  $value['order_id'] . "'
         </div>
       </div>
         </div>

           </div>
          </div>
        </div>
        </a> 
        
  
        ";
      }
    }
        ?>
      </div>
      
    </div>
  </div>
</div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          
          <?php
          
    if(empty($json5)){
    echo '<h2 class="text-center text-2xl my-4">Nie masz żadnych zakończonych ogłoszeń</h2>';
    }else{
      foreach ($json5 as $value) {
        echo "
        <a href='../views/ogloszenie.php?id=" .  $value['order_id'] . "' >
    
   
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
             <button class='ml-12'>Edytuj</button>
            </div>
            
          </div>
        </div>
        </a> 
        
        
        ";
      }
    }
      
        ?>


          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

    <!-- ogłoszenia zbanowane -->
    <?php
    if(empty($json3)){

    echo '<h2 class="text-center text-2xl my-4">Nie masz żadnych zbanowanych ogłoszeń</h2>';
    }else{
      foreach ($json3 as $value) {
        echo "
        <a href='../views/ogloszenie.php?id=" .  $value['order_id'] . "' >


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
        </div>
        </a> 
        ";
      }
    }
    ?>
          </div>
        </div>
