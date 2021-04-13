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
</head>
<body class="overflow-x-hidden">
<?php
include '../components/header.php';
?>
<div class="w-full">
    <button class="w-11/12 mx-auto bg-gray-50 text-white mt-4 rounded shadow p-2  flex items-center justify-end filter-btn">
        <img class="w-12" src="../assets/img/filter.png" alt="">
    </button>
    <div class="w-full mx-auto h-screen bg-white card shadow filter-box mx-auto absolute left-0 top-44">
        <div class="w-4/5 mx-auto">
            <h2 class="my-4 text-2xl font-light text-center">Filtruj swoje wyszukiwania</h2>
            <div>
                <label for="exampleInputEmail1" class="form-label">Lokalizcja</label>
                <input name="lokalizacja" type="text" class="form-control" id="exampleInputEmail1" placeholder="Opole" aria-describedby="emailHelp">
            </div>

        </div>
     
    </div>
    <!-- Content -->
    <div class="w-full shadow mt-4 py-4">
        <div class="shadow w-11/12 mx-auto my-2">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi aut inventore distinctio consectetur unde ea eum possimus dicta totam reprehenderit!
        </div>
        <div class="shadow w-11/12 mx-auto my-2">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi aut inventore distinctio consectetur unde ea eum possimus dicta totam reprehenderit!
        </div>
        <div class="shadow w-11/12 mx-auto my-2">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi aut inventore distinctio consectetur unde ea eum possimus dicta totam reprehenderit!
        </div>
    </div>
</div>
<?php
        include '../components/mobile-nav.php';
?>
</body>
</html>
<script src="../scripts/showFilter.js">

</script>