<?php
session_start();
require '../../back/conn.php';

  $sql = "SELECT * from orders";
  $result = $conn->query($sql);

$json = mysqli_fetch_all($result, MYSQLI_ASSOC);
$email = $_SESSION['email'];

$sql = "SELECT * from user where mail = '$email'";
$result = $conn->query($sql);

$json2 = mysqli_fetch_all($result, MYSQLI_ASSOC);

//get all users
$user = $_GET['id'];
$sql = "SELECT * from user where user_id = $user;";
$result = $conn->query($sql);

$json3 = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
      foreach($json3 as $value){
        echo '
        <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card shadow">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="../../uploads/user_avatars/' .  $value['image_url'] . '" class="h-40" alt="Admin" class="rounded-circle" >
                <div class="mt-3">
                  <h4>' .  $value['fname'] . ' ' .  $value['lname'] . '</h4>
                  <p class="text-muted font-size-sm">' .  $value['city'] . ' ' .  $value['street'] . '</p>
                  <div class="flex justify-center items-center mt-2  py-2  w-full ">
                  <span class="fa fa-star  text-yellow-400"></span>
                  <span class="fa fa-star  text-yellow-400"></span>
                  <span class="fa fa-star text-yellow-400"></span>
                  <span class="fa fa-star text-yellow-400"></span>
                  <span class="fa fa-star"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card  shadow mt-3">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <p class="font-bold">Imię</p><p>' .  $value['fname'] . '</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <p class="font-bold">Nazwisko</p><p>' .  $value['lname'] . '</p>

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <p class="font-bold">Miejscowość</p><p>' .  $value['city'] . '</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <p class="font-bold">Ulica</p><p>' .  $value['street'] . '</p>

              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <p class="font-bold">Nazwa użytkownika</p><p>' .  $value['login'] . '</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card shadow mb-3">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Ostatnie ogłoszenia użytkownika</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Ostatnie zgłoszenia użytkownika</button>
          </li>

        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
          <h2 class="text-center text-2xl font-light">Ogłoszenia użytkownika ' .  $value['login'] . ' </h2>
          </div>
          <div class="tab-pane fade p-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <h2 class="text-center text-2xl font-light">Zgłoszenia użytkownika ' .  $value['login'] . ' </h2>

          </div>
        </div>
          </div>
          <div class="col-md-12 card shadow">
          <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              Opinie o użytkowniku (3)
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first items accordion body.</div>
          </div>
        </div>
          </div>
          </div>
        </div>
      </div>
        ';
      }
      ?>
       
        </div>
    </div>

 
<?php
        include '../components/mobile-nav.php';
?>
