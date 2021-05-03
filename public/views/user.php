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
<div class="container mt-4">
<div class="main-body">



      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 gutters-sm">
      <?php
      foreach($json3 as $value){
        echo '
        <div class="col mb-3 h-96">
        <div class="card h-full">
          <div class="w-full bg-red-200 h-20 bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500"></div>
          <div class="card-body text-center">
            <img src="../../uploads/user_avatars/' .  $value['image_url'] . '" style="width:100px;margin-top:-65px" alt="User" class="h-24 img-fluid img-thumbnail rounded-circle border-0 mb-3">
            <h5 class="card-title">' .  $value['login'] . '</h5>
            <p class="text-secondary mb-1">' .  $value['fname'] . ' ' .  $value['lname'] . '</p>
            <p class="text-muted font-size-sm">' .  $value['city'] . ' ' .  $value['street'] . '</p>
          </div>
          <div class="card-footer w-full flex items-center justify-center">
            <a href="href="./user.php?id=' .  $value['user_id'] . '"" class="inline-flex justify-center py-2 px-4  shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Sprawdź
            </a>
          </div>
          <div class="flex justify-center items-center mt-2 bg-gray-700 py-2  w-full">
          <span class="fa fa-star  text-yellow-400"></span>
<span class="fa fa-star  text-yellow-400"></span>
<span class="fa fa-star text-yellow-400"></span>
<span class="fa fa-star text-yellow-400"></span>
<span class="fa fa-star"></span>
          </div>
        </div>
      </div>
        ';
      }
      ?>
       
        </div>
      </div>
    </div>
    </div>
   
 
<?php
        include '../components/mobile-nav.php';
?>
