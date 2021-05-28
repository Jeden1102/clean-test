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
                <h1 class="w-full text-3xl text-black pb-6">Użytkownicy</h1>

                <div class="flex flex-wrap ">
                    <div class="w-full  my-6 pr-0 lg:pr-2">
                        <p class="text-xl pb-6 flex items-center">
                            <i class="fas fa-list mr-3"></i> Lista użytkowników
                        </p>
                        <div class="leading-loose card">
                            <form class="p-10 bg-white rounded shadow-xl">
                                    <label class="block text-sm text-gray-600" for="name">Szukaj po id użytkownika</label>
                                    <input class="w-full mt-2 lg:w-1/2 px-5 py-1 text-gray-700 bg-gray-200 rounded lokalizacja" id="name" name="name" type="text" required="" placeholder="201" aria-label="Name"> 
                                    <h2 class="font-bold text-blue-400">Lub</h2>
                                    <label class="block text-sm text-gray-600" for="name">Szukaj po loginie użytkownika</label>
                                    <input class="w-full mt-2 lg:w-1/2 px-5 py-1 text-gray-700 bg-gray-200 rounded login" id="name" name="name" type="text" required="" placeholder="Login123" aria-label="Name">                                 </div>
                            </form>
                            <div class="card">
                            <table class='min-w-full bg-white table table-hover'>
                                <thead class='bg-gray-800 text-white'>
                                    <tr>
                                        <th class='w-20 text-left py-3 px-4 uppercase font-semibold text-sm'>Login</th>
                                        <th class='w-20  text-left py-3 px-4 uppercase font-semibold text-sm'>ID użytkownika</th>
                                        <th class='w-20  text-left py-3 px-4 uppercase font-semibold text-sm'>Założenie konta</th>
                                        <th class='w-20 text-left py-3 px-4 uppercase font-semibold text-sm text-center'>Ilość ogłoszeń</th>
                                        <th class='w-20 text-left py-3 px-4 uppercase font-semibold text-sm text-center'>Ilość wykonanych zleceń</th>
                                        <th class='w-20 text-left py-3 px-4 uppercase font-semibold text-sm text-center'>Średnia ocen</th>
                                    </tr>
                                </thead>
                                <tbody class='text-gray-700 admin-users-list'>
                                   
                                </tbody>
                            </table>
                            </div>
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
</body>
</html>
<script src="./getApiData.js"></script>