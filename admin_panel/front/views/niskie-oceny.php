<?php
session_start();
//ściąganie z bazy danych
require "../../back/conn.php";
$sql = "SELECT ban_time,to_user_id,ROUND(AVG(score),1) as 'score' ,user.login FROM notes JOIN user ON user.user_id=notes.to_user_id GROUP BY to_user_id HAVING score<=2 ORDER BY AVG(score) ASC LIMIT 10;";
$result = $conn->query($sql);
$json = mysqli_fetch_all($result, MYSQLI_ASSOC);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <title>Click&Clean Admin Panel</title>

    <script src="https://kit.fontawesome.com/193f3f2978.js" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<link href="./public/styles.css" rel="stylesheet"/>
<link href="./public/additionalcss.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">
<?php
?>
<?php
   include '../components/left-nav.php';
   ?>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                <?php
                include '../components/nav-desktop.php';
                ?>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <?php
       include '../components/mobile-nav.php'
       ?>
    
    
        <div class="w-full h-screen overflow-auto border-t flex flex-col">
            <main class="w-full flex-grow p-6">
            <div class="alert alert-success not-email hidden" role="alert">
                Ogłoszenie oznaczono jako "OK"
            </div>
            <div class="alert alert-warning hidden" role="alert">
                Ogłoszenie zostało zbanowane
            </div>
            <table class='min-w-full bg-white '>
      <thead class='bg-gray-800 text-white'>
          <tr>
              <th class='w-20 text-left py-3 px-4 uppercase font-semibold text-sm'>Dane osobowe</th>
              <th class='w-20 text-left py-3 px-4 uppercase font-semibold text-sm'>Ocena</th>
              <th class='w-20 text-left py-3 px-4 uppercase font-semibold text-sm'>Zbanowany do</th>
              <th class='w-20 text-left py-3 px-4 uppercase font-semibold text-sm text-center'>Akcja</th>
          </tr>
      </thead>
      <tbody class='text-gray-700 '>
            <?php
    foreach ($json as $value) {

      echo "

          <tr>
              <td class='w-20 text-left py-3 px-4'>". $value['login'] ."</td>
              <td class='w-20  text-left py-3 px-4'>". $value['score']."  </td>
              <td class='w-20  text-left py-3 px-4'>". $value['ban_time']."</td>
              <td class='w-20 text-left py-3 px-4'><a class='hover:text-blue-500' >
              <div class='flex items-center justify-center flex-column text-center'>
              <form class='flex flex-row' method='POST' action ='../../back/ban-uz.php?id=". $value['to_user_id']."'".">
              <div>
              <p>Czas zablokowania konta</p>
              <input required name='date' type='date' class='form-control mt-4' id='exampleFormControlInput1' >
              </div>
              <button  class='bg-red-400 show-reset-btn hover:bg-red-500 border-1 w-20 h-20 font-bold text-white  border-red-500 ml-8 rounded'><p class='shadowek'>ZBANUJ <i class='far fa-trash-alt text-2xl mx-2'></i></p></button>

                </form>
              <a href='../../../public/views/user.php?id=". $value['to_user_id']."'"." class='mt-2 w-48 flex items-center justify-center bg-blue-400 hover:bg-blue-500 border-1 w-20 h-20 font-bold text-white mx-2 border-blue-500 rounded'><p class='shadowek'>POKAŻ <i class='far fa-eye text-2xl mx-2'></i></p></a>
              </div>
              </td>
          </tr>


      

  ";
  }
    ?>
    
    </tbody>
  </table>
   

      
      </div>

            </main>
    
  
        </div>
        
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
<?php
    if(isset($_GET["oglOk"])){
        ?>
        <?php
        $script = file_get_contents('../../../public/scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertSuccess,7000);
        
        </script>";
    }
    if(isset($_GET["oglBan"])){
        ?>
        <?php
        $script = file_get_contents('../../../public/scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertWarning,7000);
        
        </script>";
    }


?>
</html>
