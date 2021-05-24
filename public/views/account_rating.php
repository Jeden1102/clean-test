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
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- zmiana cały plik -->
<?php
session_start();
    require '../../back/conn.php';
    $sql = "SELECT * from user where active = 1;";
    $result = $conn->query($sql);
    $json3 = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php
    include '../components/header.php';
?>

<?php
foreach($json3 as $value){
    echo'
    <div>
    <div class="bg-red-200 w-full h-16 flex pt-3">
    <button class="text-2xl border-b-2 w-full accordion-button collapsed rate-rate" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">' .  $value['fname'] . ' ' .  $value['lname'] . '</button>
    </div>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
    <!-- tutaj rozwiń i wtedy wyświetlaj tabelę z ocenami (to co na dole) -->
    </div>


    <div class="box-border bg-green-400">
    <div class="flex">
        <div class="text-xl mr-8">Rating User</div>
        <div class="mt-1 text-xl">
            <span class="fa fa-star text-yellow-300"></span>
            <span class="fa fa-star text-yellow-300"></span>
            <span class="fa fa-star text-yellow-300"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </div>
    </div>
    <p>4.1 average based on 254 reviews.</p>
    <hr style="border:3px solid #f1f1f1">

    <div class="row table clear-both">
        <div class="float-left w-1/6 mt-2">
            <div>5 stars</div>
        </div>
        <div class="float-left w-5/6 mt-2">
            <div class="w-5/6 h-4 bg-indigo-600 text-center color-white">
            <div class="bar-5"></div>
            </div>
        </div>
        <div class="text-right">
            <div>150</div>
        </div>

        <div class="float-left w-1/6 mt-2">
            <div>4 stars</div>
        </div>
        <div class="float-left w-5/6 mt-2">
            <div class="w-5/6 h-4 bg-indigo-600 text-center color-white">
            <div class="bar-5"></div>
            </div>
        </div>
        <div class="text-right">
            <div>150</div>
        </div>

        <div class="float-left w-1/6 mt-2">
            <div>3 stars</div>
        </div>
        <div class="float-left w-5/6 mt-2">
            <div class="w-5/6 h-4 bg-indigo-600 text-center color-white">
            <div class="bar-5"></div>
            </div>
        </div>
        <div class="text-right">
            <div class="pt-2">150</div>
        </div>

        <div class="float-left w-1/6 mt-2">
            <div>2 stars</div>
        </div>
        <div class="float-left w-5/6 mt-2">
            <div class="w-5/6 h-4 bg-indigo-600 text-center color-white">
            <div class="bar-5"></div>
            </div>
        </div>
        <div class="text-right">
            <div>150</div>
        </div>

        <div class="float-left w-1/6 mt-2">
            <div>1 star</div>
        </div>
        <div class="float-left w-5/6 mt-2">
            <div class="w-5/6 h-4 bg-indigo-600 text-center color-white">
            <div class="bar-5"></div>
            </div>
        </div>
        <div class="text-right">
            <div>150</div>
        </div>
    </div>
</div>';
}
?>
</body>