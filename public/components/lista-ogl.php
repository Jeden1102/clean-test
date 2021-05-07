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
   <!--zgłoszone aktywne-->
   <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
     <?php
          if(empty($jsonActiveOrders)){

            echo '<h2 class="text-center text-2xl my-4">Nie masz żadnych aktywnych ofert</h2>';
            }else{
              foreach ($jsonActiveOrders as $value){
                $img = "&#039../assets/img/sp1.jpg&#039";
                $order_id = $value['order_id'];
                $sql_user_applied = "SELECT * from offers WHERE order_id='$order_id';";
                $result_user_applied = $conn->query($sql_user_applied);
                $json_user_applied = mysqli_fetch_all($result_user_applied, MYSQLI_ASSOC);
                echo "
             
                <div class=' w-11/12  mx-auto my-2 md:flex md:flex-row-reverse h-full'>
                  <!--ZDJĘCIE-->
                  <div class='md:w-1/3  w-full mx-auto rounded  h-60' style='background-image:url($img);background-size:cover;background-position:center'>
         
                  </div>
         
                  <div class='mt-4 md:w-2/3 h-1/3 md:h-full'>
                    <div class='flex w-full  justify-between items-center md:h-3/5 '>
                      <h2 class='ml-4 text-2xl md:text-3xl'>" . $value['title'] . "</h2>
                      <p class='font-bold mr-4 md:text-2xl'>" . $value['order_price'] . "zł</p>
                    </div>
         
                    <div class='font-light mt-2 md:ml-4'>
                    " .  $value['city'] . " ," .  $value['street'] . " " .  $value['number'] . "
                    </div>
                    <div class='buttons ml-4'>";
                    if(is_null($value['chosen_user'])){
                      echo "
                    <a href='../views/edit-ogl.php?id=" .  $value['order_id'] . "'><button class=' next-step  inline-flex justify-center py-2 px-4  shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>Edytuj</button></a>
 
                      ";
                    }
                    echo "
                    <a  href='../views/ogloszenie.php?id=" .  $value['order_id'] . "' class='mt-4 ml-4 next-step  inline-flex justify-center py-2 px-4  shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500' href='./public/views/ogloszenia.php'>Podglad oferty</a>
                    </div>";
                    echo "
                    <div class='accordion-item mt-4'>
                    ";

                    $order_id = $value['order_id'];
                    $sql_user_applied = "SELECT * from offers JOIN user ON offers.user_id=user.user_id WHERE order_id='$order_id';";
                    $result_user_applied = $conn->query($sql_user_applied);
                    $json_user_applied = mysqli_fetch_all($result_user_applied, MYSQLI_ASSOC);
                    $sql = "SELECT count(*) as 'licz' from offers WHERE order_id='$order_id';";
                    $howManyOffers = $conn->query($sql);
                    $howManyOffersJson = mysqli_fetch_all($howManyOffers, MYSQLI_ASSOC);
                    if(empty($json_user_applied)){
                        echo '
                        <div class="alert alert-danger w-5/6" role="alert">
                        Do tego zgłoszenia nie ma jeszcze żadnych chętnych
                      </div>
                        ';
                    }else{
                      if(is_null($value['chosen_user'])){
                        echo 
                        "<a class='btn btn-primary ml-4' data-bs-toggle='collapse' href='#collapseExample" .  $value['order_id'] . "' role='button' aria-expanded='false' aria-controls='collapseExample'>
                        <div class='flex'><p>Sprawdź chętnych do wykonania zlecenia</p> <p class='animate-bounce mx-2'>(" .  $howManyOffersJson[0]['licz'] . ")</p> </div>
                        </a>";
                       foreach($json_user_applied as $value2){
                            echo "
                          <div class='collapse' id='collapseExample".  $value['order_id'] . "'>
                            <div class='card card-body'>
                            <div class='flex'>
                            <p class='text-2xl font-light text-center'>" .  $value2['fname'] . " " .  $value2['lname'] . "</p>
                            </div>
                            
                            <div class='buttons ml-4 mt-4 flex'>
                            <a href='../views/user.php?id=" .  $value2['user_id'] . "'><button class=' next-step   py-2 px-4  shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>Sprawdź profil użytkownika</button></a>
                            <div>
                            <form method='POST' action='../../back/chose_user.php'>
                            <button name='chosenUser' class='ml-4 next-step  inline-flex justify-center py-2 px-4  shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500' value='". $value2['user_id']."'>Wybierz wykonawcę</button>
                            <input type='hidden' name='chose_order_id' value='". $value['order_id'] ."'/>
                            </form>
                            </div>
                            </div>
                            </div>
                          </div>";
                          }
                       
                      }else{
                        $id= $value['chosen_user'];
                        $sql = "SELECT * from user where user_id = $id";
                        $userInfo = $conn->query($sql);
                        $userInfoJson = mysqli_fetch_all($userInfo, MYSQLI_ASSOC);
                        echo "                 
                        Wybrałeś użytkownika <a href='../views/user.php?id=$id'>".  $userInfoJson[0]['fname'] . "  ".  $userInfoJson[0]['lname'] . "</a>       
                        <form method='POST' action='../../back/end_order.php'>
                        <button name='chosenUser' class='ml-4 next-step  inline-flex justify-center py-2 px-4  shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500' >Zakończ i oceń</button>
                        <input type='hidden' name='chose_order_id' value='". $value['order_id'] ."'/>
                        <input type='text' name='description' placeholder='Oceń użytkownika'/>
                        <input type='number' name='score' placeholder='Ocena'/>
                        <input type='hidden' name='from_user' value='".$_SESSION['email']."'/>
                        <input type='hidden' name='to_user' value='".  $value['chosen_user'] ."'/>
                        <input type='hidden' name='order_id' value='".  $value['order_id'] ."'/>
                        </form>
                        ";
                      }
                     }
                     echo "
                     </div>
                  </div>
                </div>
                
                ";
              }
            }
     ?>
    
   </div>
   <!--zgłoszone ogłoszone-->
   <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
   <?php
    if(empty($jsonEndedOrders)){

    echo '<h2 class="text-center text-2xl my-4">Nie masz zakonczonych ofert</h2>';
    }else{
      foreach ($jsonEndedOrders as $value) {
        echo "
           <a href='./ogloszenie.php?id=".$value['order_id'] . "' >


           <div class='shadow w-11/12  mx-auto my-2 md:flex md:flex-row-reverse h-72 md:h-52'>
             <div class='md:w-1/3 md:h-full w-full mx-auto rounded  h-2/3' style='background-image:url( " . "../assets/img/sp1.jpg" . " );background-size:cover;background-position:center'>
             </div>
             <div class='mt-4 md:w-2/3 h-1/3 md:h-full'>
               <div class='flex w-full  justify-between items-center md:h-3/5 '>
               <h2  class='ml-4 text-2xl md:text-3xl'>" .  $value['title'] . "</h2>
               <p class='font-bold mr-4 md:text-2xl'> " .  $value['order_price'] . "zł</p>
               </div>
       
               <div class='font-light mt-2 md:ml-4'>
                " .  $value['city'] . " ," .  $value['street'] . "" .  $value['number'] . "
               </div>
             </div>
          
           </div>
           </a> 
         ";
      }
    }
      
        ?>

   </div>
   <!-- ogłoszenia zbanowane -->
   <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

   <?php
    if(empty($jsonBannedOrders)){

    echo '<h2 class="text-center text-2xl my-4">Nie masz zakonczonych ofert</h2>';
    }else{
      foreach ($jsonBannedOrders as $value) {
        echo "
           <a href='./ogloszenie.php?id=".$value['order_id'] . "' >


           <div class='shadow w-11/12  mx-auto my-2 md:flex md:flex-row-reverse h-72 md:h-52'>
             <div class='md:w-1/3 md:h-full w-full mx-auto rounded  h-2/3' style='background-image:url( " . "../assets/img/sp1.jpg" . " );background-size:cover;background-position:center'>
             </div>
             <div class='mt-4 md:w-2/3 h-1/3 md:h-full'>
               <div class='flex w-full  justify-between items-center md:h-3/5 '>
               <h2  class='ml-4 text-2xl md:text-3xl'>" .  $value['title'] . "</h2>
               <p class='font-bold mr-4 md:text-2xl'> " .  $value['order_price'] . "zł</p>
               </div>
       
               <div class='font-light mt-2 md:ml-4'>
                " .  $value['city'] . " ," .  $value['street'] . "" .  $value['number'] . "
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