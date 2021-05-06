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
           $description =  strval($json[0]['description']);
           $title = strval($json[0]["title"]);
           echo'
           <div class="h-96 md:w-1/2 md:mt-6 md:ml-4 shadow rounded flex justify-center items-center flex-column " >
           <form action="../../back/edit-ogl.php?id='.$id.'" method="POST">

           <h2 class="mb-4 text-2xl">Zmiana zdjęcia</h2>
           <div class="space-y-1 text-center">
           <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
             <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
           </svg>
           <div class="flex text-sm text-gray-600">
             <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
               <span>Wybierz zdjęcie z komputera</span>
               <input id="file-upload" name="file-upload" type="file" class="sr-only">
             </label>
           </div>
           <p class="text-xs text-gray-500">
             PNG, JPG, GIF do 10MB
           </p>
         </div>
            </div>

            <div class="md:w-1/2">
                <div class="card shadow w-11/12 mx-auto mt-4 p-2">
                <div class="flex">
                <p class="my-2">Imię</p>
                <p class="font-bold my-2 ml-auto text-center">
                    <input name="fname" class="border-1 rounded-md p-1" value='.$json[0]["fname"].'>
                </p>
            </div>
            <div class="flex">
            <p class="my-2">Nazwisko</p>
            <p class="font-bold my-2 ml-auto text-center">
                <input name="lname" class="border-1 rounded-md p-1" value='.$json[0]["lname"].'>
            </p>
        </div>
                <div class="flex">
                    <p class="my-2">Edytuj tytuł ogłoszenia</p>
                    <p class="font-bold my-2 ml-auto text-center">
                        <input name="title" type="text" class="border-1 rounded-md p-1" value="'.$title.'">
                    </p>
                </div>
                <div class="flex">
                    <p class="my-2">Edytuj opis</p>
                    <p class="font-bold my-2 ml-auto text-center">
                        <input name="description" type="text" class="border-1 rounded-md p-1" value="'.$description.'">
                    </p>
                </div>
                </div>
                
                <div class="card shadow mt-4 flex w-11/12 mx-auto p-2">
                    <div class="flex">
                        <p class="my-2">Edytuj datę ważności</p>
                        <p class="font-bold my-2 ml-auto text-center">
                            <input name="date" class="border-1 rounded-md p-1" type="date" value='.$json[0]["date"].'>
                        </p>
                    </div>
                ';

                        
                        if($json[0]["car_clean"]==1){
                            echo '
                                <div><input id="comments" checked name="car_clean" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded check-check"></div>
                                <div><p>Mycie auta</p></div>
                            
                            
                            ';
                        }else{
                            echo '
                            <input id="comments" name="car_clean" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded check-check">
                            mycie auta
                            ';
                        }
                        if($json[0]["window_clean"]==1){
                            echo '
                            <input id="comments" checked checked name="window_clean" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded check-check">
                            mycie okna
                            ';
                        }else{
                            echo '
                            <input id="comments"  name="window_clean" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded check-check">
                            mycie okna
                            ';
                        }
                        if($json[0]["home_clean"]==1){
                            echo '
                            <input id="comments" checked name="home_clean" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded check-check">
                            mycie domu
                            ';
                        }else{
                            echo '
                            <input id="comments" name="home_clean" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded check-check">
                            mycie domu
                            ';
                        }
                    
                    echo '

                    <div class="input-group">
                    <p class="text-2xl my-2 w-3/4">Edytuj cenę</p>
                    <input minlength="1" type="number" value='.$json[0]["order_price"].' name="order_price" class="form-control" aria-label="Amount (to the nearest dollar)" id="inputPrice">
                    <span class="input-group-text">zł</span>
                  </div>
                    
                    <div class="flex">
                    <p class="my-2">Edytuj Adres</p>
                    <p class="font-light my-2 ml-auto">
                    <input name="city" class="border-1 rounded-md" placeholder="miasto" value='.$json[0]["city"].'> <input name="street" class="border-1 rounded-md" placeholder="ulica" value=' .$json[0]["street"].'> <input name="number" placeholder="numer domu" class="border-1 rounded-md w-1/6 lg:w-1/4" value='.$json[0]["number"].'>
                    </p>
                    </div>
                </div>'
                
            ?>
            <div class="h-12 mt-4 flex justify-center">
                <button type="submit" class="ml-4 next-step  inline-flex justify-center py-2 px-4  shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Zatwierdź</button>

            </div>
            </form>

</body>
</html>