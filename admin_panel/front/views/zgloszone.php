<?php

//ściąganie z bazy danych
require "../../back/conn.php";
$sql = "SELECT orders.*,notification.user_id_from FROM orders JOIN notification ON orders.order_id=notification.order_id WHERE orders.status=2";
$result = $conn->query($sql);
$json = mysqli_fetch_all($result, MYSQLI_ASSOC);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

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
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="index.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Blank Page
                </a>
                <a href="tables.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Tables
                </a>
                <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Forms
                </a>
                <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Tabbed Content
                </a>
                <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Calendar
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
                <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                </button>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>
    
        <div class="w-full h-screen overflow-auto border-t flex flex-col">
            <main class="w-full flex-grow p-6">
            <table class='min-w-full bg-white'>
      <thead class='bg-gray-800 text-white'>
          <tr>
              <th class='w-20 text-left py-3 px-4 uppercase font-semibold text-sm'>Dane osobowe</th>
              <th class='w-20 text-left py-3 px-4 uppercase font-semibold text-sm'>Status</th>
              <th class='w-20  text-left py-3 px-4 uppercase font-semibold text-sm'>ID ogłoszenia</th>
              <th class='w-20 text-left py-3 px-4 uppercase font-semibold text-sm'>Akcja</th>
          </tr>
      </thead>
      <tbody class='text-gray-700'>
            <?php
    foreach ($json as $value) {
      echo "

          <tr>
              <td class='w-20 text-left py-3 px-4'>". $value['fname'] . " ". $value['lname']."</td>
              <td class='w-20  text-left py-3 px-4'>". $value['status']."</td>
              <td class='w-20 text-left py-3 px-4'><a class='hover:text-blue-500' >". $value['order_id']."</td>
              <td class='w-20 text-left py-3 px-4'><a class='hover:text-blue-500' >
              <div class='flex items-center justify-center flex-column'>
              <form method='POST' action='../back/zmien_na_ok.php?id=". $value['order_id']."'"."'>
              <button class='bg-green-400 hover:bg-green-500 w-20 h-20 border-1 font-bold text-white mx-2 border-green-500 ml-2 rounded'><p class='shadowek'>OK <i class='fas fa-check text-2xl mx-2'></i></p></button>
              <input type='hidden' value='ok' id='change_status'/>
              </form>
              <form method='POST' action='../back/ban-ogl.php?id=". $value['order_id']."'"."'>
              <button class='bg-red-400 hover:bg-red-500 border-1 w-20 h-20 font-bold text-white mx-2 border-red-500 ml-2 rounded'><p class='shadowek'>ZBANUJ <i class='far fa-trash-alt text-2xl mx-2'></i></p></button>
              </form>
              <form method='POST' action ='../../public/views/ogloszenie.php?id=". $value['order_id']."'".">
              <button class='bg-blue-400 hover:bg-blue-500 border-1 w-20 h-20 font-bold text-white mx-2 border-blue-500 rounded'><p class='shadowek'>POKAŻ <i class='far fa-eye text-2xl mx-2'></i></p></button>
              </form>
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
    
            <footer class="w-full bg-white text-right p-4">
                Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">David Grzyb</a>.
            </footer>
        </div>
        
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>
