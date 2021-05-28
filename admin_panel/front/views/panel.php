<?php
session_start();

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
   include '../components/left-nav.php';
   ?>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
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
    
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
    
                <div class="w-full mt-12">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Dodaj administratora
                    </p>
                    <div class="alert alert-success not-email  hidden" role="alert">
                Administrator został dodany
            </div>
            <div class="alert alert-warning hidden" role="alert">
                Administrator o takim loginie już istnieje !
            </div>
                    <div class="bg-white overflow-auto">
                    <div class="leading-loose">
                            <form class="p-10 bg-white rounded shadow-xl" method="POST" action="../../back/add-admin.php">
                                <div class="">
                                    <label class="block text-sm text-gray-600" for="name">Login</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="login" type="text" required="" placeholder="Login123" aria-label="Name">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="email">Hasło</label>
                                    <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="password" type="text" required="" placeholder="*********" aria-label="Email">
                                </div>
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="email">Powtórz Hasło</label>
                                    <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email"  type="text" required="" placeholder="*********" aria-label="Email">
                                </div>

                                <div class="mt-6">
                                    <button name="send" class="px-4 py-1 text-white font-light tracking-wider bg-gray-700 hover:bg-gray-900 rounded" type="submit">Dodaj !</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
    

        </div>
        
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

</body>
<?php
    if(isset($_GET["adminAdded"])){
        ?>
        <?php
        $script = file_get_contents('../../../public/scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertSuccess,7000);
        
        </script>";
    }
    if(isset($_GET["loginTaken"])){
        ?>
        <?php
        $script = file_get_contents('../../../public/scripts/showAlert.js');
        echo "<script>".$script."
        showAlert(alertWarning,7000);
        
        </script>";
    }
?>
</html>
