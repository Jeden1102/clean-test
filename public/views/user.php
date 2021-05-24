<?php //zmiana CAŁY PLIK!!!
session_start();
require '../../back/conn.php';

@$email = $_SESSION['email'];
$sql = "SELECT * from user where mail = '$email'";
$result = $conn->query($sql);
$json2 = mysqli_fetch_all($result, MYSQLI_ASSOC);

//get all users
$user = $_GET['id'];
$sql = "SELECT * from user where user_id = $user;";
$result = $conn->query($sql);
$jsonCurrentShowedUser = mysqli_fetch_all($result, MYSQLI_ASSOC); //zmiana

$sql = "SELECT DISTINCT orders.*,notes.to_user_id from orders JOIN notes ON orders.chosen_user=notes.to_user_id WHERE orders.chosen_user = $user AND (status IN (1,3))";
$result = $conn->query($sql);
$jsonRecentUserOffer = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * from notes JOIN user ON user.user_id = notes.from_user_id WHERE to_user_id = $user";
$result = $conn->query($sql);
$jsonCurrentShowedUserNotes = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT COUNT(*) as 'sum' from notes WHERE to_user_id = $user";
$result = $conn->query($sql);
$jsonOpionionsCount = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
<div class="container mt-16 shadow card p-4">
    <div class="main-body">
    
          <?php
        echo '
        <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card shadow">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="../../uploads/user_avatars/' .  $jsonCurrentShowedUser[0]['image_url'] . '" class="h-40" alt="Admin" class="rounded-circle" >
                <div class="mt-3">
                  <h4>' .  $jsonCurrentShowedUser[0]['fname'] . ' ' .  $jsonCurrentShowedUser[0]['lname'] . '</h4>
                  <p class="text-muted font-size-sm">' .  $jsonCurrentShowedUser[0]['city'] . ' ' .  $jsonCurrentShowedUser[0]['street'] . '</p>
                  <div class="flex justify-center items-center mt-2  py-2  w-full ">';

                  $sql = "SELECT ROUND(AVG(score),1) AS 'avgScore' from notes WHERE to_user_id = $user";
                  $result = $conn->query($sql);
                  $jsonCurrentShowedUserAVGScore = mysqli_fetch_all($result, MYSQLI_ASSOC);
                  if(isset($jsonCurrentShowedUserAVGScore[0]['avgScore'])){
                    echo $jsonCurrentShowedUserAVGScore[0]['avgScore'] ."/5
                    <span class='fa fa-star text-yellow-400 ml-2'></span>
                    ";
                    }else{
                      echo "<p>Brak ocen użytkownika</p>";
                    }
                  echo '

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card  shadow mt-3">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <p class="font-bold">Imię</p><p>' .  $jsonCurrentShowedUser[0]['fname'] . '</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <p class="font-bold">Nazwisko</p><p>' .  $jsonCurrentShowedUser[0]['lname'] . '</p>

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <p class="font-bold">Miejscowość</p><p>' .  $jsonCurrentShowedUser[0]['city'] . '</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <p class="font-bold">Ulica</p><p>' .  $jsonCurrentShowedUser[0]['street'] . '</p>

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <p class="font-bold">Nazwa użytkownika</p><p>' .  $jsonCurrentShowedUser[0]['login'] . '</p>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="col-md-8">
        <div class="col-md-12 card shadow">';
          
          if($jsonOpionionsCount[0]['sum']>0){
          echo '
            <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Opinie o użytkowniku (' .  $jsonOpionionsCount[0]['sum'] . ')
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          '; 
          
          foreach($jsonCurrentShowedUserNotes as $value){
          echo ' 
          <div class="accordion-body">
            <div class="card my-2 p-4">
            <div class="flex items-center">
            <img class="w-20 h-20 rounded-xl" src="../../uploads/user_avatars/'. $value["image_url"] .'"/>
            <a href="./user.php?id='. $value["from_user_id"] .'" class="ml-8 text-2xl font-light">'. $value["login"] .'</a>
            </div>
            <div class="mt-4">
              <p><span class="fa fa-star text-yellow-400 ml-2"></span> '. $value["score"] .'/5</p>
              
              '. $value["description"] .'
            </div>

            </div>
          </div>
          ';
          }
        }
        else{
          echo '<h2 class="text-2xl text-center my-2">Ten użytkownik nie ma jeszcze opinii.</h2> <div><div>';
        }
          
          
          echo '</div>
        </div>
          <div class="card shadow mt-8">


        
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
          <h2 class="text-center text-2xl font-light">Ostatnio wykonane zlecenia przez użytkownika ' .  $jsonCurrentShowedUser[0]['login'] . ' </h2>
          ';
          foreach ($jsonRecentUserOffer as $value) {
            echo "
               <a href='./ogloszenie.php?id=".$value['order_id'] . "' >
    
    
               <div class='card w-11/12  mx-auto my-2 md:flex md:flex-row-reverse h-72 md:h-52'>
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
          echo '
          </div>
        </div>
          </div>
          
          </div>
          </div>
        </div>
      </div>
        ';
      
      ?>
       
        </div>
    </div>

 
<?php
        include '../components/mobile-nav.php';
?>
