<?php

session_start();
require '../../back/conn.php';

if(!isset($_GET['id'])){
    header("Location:error-page.php");
    exit();
}

$id=$_GET['id'];
$sql = "SELECT * from orders WHERE order_id=$id";
$result = $conn->query($sql);

$json = mysqli_fetch_all($result, MYSQLI_ASSOC);

@$email = $_SESSION['email'];

$sql = "SELECT * from user where mail = '$email'";
$result = $conn->query($sql);

$json2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<?php
include '../components/header.php';
?>
        <div class="w-11/12 card mx-auto shadow h-full mt-4">
           
           <!-- ładowane dynamicznie -->
           <div class="alert alert-success hidden" role="alert">
        Aplikacja przebiegła pomyślnie, <a class="text-green-600 cursor-pointer">zobacz status swoich zgłoszeń</a> !
    </div>
    <div class="alert alert-warning hidden" role="alert">
        Nie możesz zgłosić się do swojej oferty !
    </div>
    <div class="alert alert-danger hidden" role="alert">
    Już zgłosiłeś się do tej oferty <a class="text-green-600 cursor-pointer">zobacz status swoich zgłoszeń</a> !
    </div>
    <div class="alert alert-primary hidden" role="alert">
    Ogłoszenie zostało zgłoszone.
    </div>
    <div class="alert alert-warning forgot-pwd hidden" role="alert">
    Już zgłosiłeś to ogłoszenie. Prosimy o cierplilowość.
    </div>
    <div class="alert alert-danger not-email hidden" role="alert">
    Nie możesz zgłosić swojego ogłoszenia.
    </div>
            <div class="h-24 md:w-1/1 md:mt-6 md:ml-4 md:mr-4 shadow rounded text-3xl flex justify-center items-center">Edytuj ogłoszenie</div>
            <div class="md:flex w-full h-full pb-4">

           <?php 
           echo'
           <div class="h-96 md:w-1/2 bg-red-400 md:mt-6 md:ml-4 shadow rounded " style="background-image:url('.'../assets/img/sp1.jpg'.');background-size:cover;background-position:center">
            </div>

            <div class="md:w-1/2">
                <div class="card shadow w-11/12 mx-auto mt-4">
                <div class="flex">
                    <p class="my-2">Edytuj ogłoszenie</p>
                    <p class="font-bold my-2 ml-auto text-center">
                        <input class="border-1 rounded-md p-1" value='.$json[0]["title"].'>
                    </p>
                </div>
                <div class="flex">
                    <p class="my-2">Edytuj opis</p>
                    <p class="font-bold my-2 ml-auto text-center">
                        <input class="border-1 rounded-md p-1" value='.$json[0]["description"].'>
                    </p>
                </div>
                </div>
                
                <div class="card shadow mt-4 flex w-11/12 mx-auto p-2">
                    <div class="flex">
                        <p class="my-2">Edytuj datę</p>
                        <p class="font-bold my-2 ml-auto text-center">
                            <input class="border-1 rounded-md p-1" type="date" value='.$json[0]["date"].'>
                        </p>
                    </div>';

                    // temat ogłoszenia

                    echo "<p> Zlecenie obejmuje </p>";
                        if($json[0]["car_clean"]==1)
                        echo "<p>Mycie auta</p>";
                        if($json[0]["window_clean"]==1)
                        echo "<p>Mycie okien</p>";
                        if($json[0]["home_clean"]==1)
                        echo "<p>Sprzątanie domu</p>";
                    
                    echo '
                    <div class="flex">
                        <p class="text-2xl my-2">Edytuj cenę</p>
                        <p class="text-2xl my-2 ml-auto"><input class="border-1 rounded-md" type="number" value='.$json[0]["order_price"].'></p>
                    </div>
                    
                    <p class="font-light my-2">'.$json[0]["city"].','.$json[0]["street"].' '.$json[0]["number"].'</p>

                </div>'
            ?>
            <div class="h-12 mt-4 flex justify-center">
                <button class=" bg-green-400 rounded-md text-2xl text-white p-1 border-1 border-green-500 hover:bg-green-500">Zatwierdź</button>
            </div>
</body>
</html>