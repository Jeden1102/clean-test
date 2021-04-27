<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <?php
    if(empty($json4)){

    echo '<h2 class="text-center text-2xl my-4">Nie zgłosiłełeś się do wykonywania żadnych usług</h2>';
    }else{
      foreach ($json4 as $value) {
        echo "
        <a href='../views/ogloszenie.php?id=" .  $value['order_id'] . "' >
    
   
        <div class='shadow w-11/12  mx-auto my-2 md:flex md:flex-row-reverse h-96 md:h-72'>
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
            <div class='font-light mt-2 md:ml-4'>";
            if($json4[0]['user_id']==$json4[0]['chosen_user']){
              echo "Status : Zostałeś wybrany!
            
              </div>
               
             </div>
           </div>
           </a> ";
            }else{
              echo "Status : Zleceniodawca jeszcze nie wybrał wykonawcy
            
              </div>
               
             </div>
           </div>
           </a> ";
            }
      }
    }
      
        ?>
      </div>