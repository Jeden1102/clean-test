<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="bg-white p-0 m-0 ">
  <div class="w-screen">
    <div class="relative flex items-center justify-between h-20 border-b-2">
    
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
      <a href="../../index.php">
        <div class="flex-shrink-0 flex items-center justify-center sm:m-auto md:m-0">
          <img class="block h-24 w-auto" src="../assets/img/logo.png" alt="Workflow">
        </div>
        </a>
        <div class="hidden md:block sm:ml-6 my-auto">
          <div class="flex space-x-4 items-center">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="../../index.php" class="nav-link text-black px-3 py-2 rounded-md text-sm font-medium">Strona główna</a>
            <a href="../views/ogloszenia.php" class="nav-link text-gray-700  px-3 py-2 rounded-md text-sm font-medium">Ogłoszenia</a>
            <a href="../views/users.php" class="nav-link text-gray-700  px-3 py-2 rounded-md text-sm font-medium">Użytkownicy</a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <div><div class="relative ">
        <?php
        if(isset($_SESSION['email'])){
          $sql = "SELECT * from user where mail = '$email'";
          $result = $conn->query($sql);

          $json2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
          $img  = $json2[0]["image_url"];
          echo '<div class="relative profile-dropdown ">
          <button type="button" class="mx-4 bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>
            ';
            if($json2[0]["image_url"] != ""){
              echo '<img class="h-8 w-8 rounded-full" src="../../uploads/user_avatars/'.$img.'" alt="">';
            }else{
              echo '<img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">';
            } echo '
        </button>
      </div>
      <!--MENU ON MD + TO GIT-->
        
      <div class="z-10 hidden drop-profile origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
        <a href="../views/profile-settings.php"" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Twój profil</a>
        <a href="../views/ogloszenia-uzyt.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Twoje ogłoszenia i zgłoszenia</a>
        <a href="../../back/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Wyloguj się</a>
      </div>';
      
      ;
        }else{
          echo '<a href="../../public/views/login-register.php" class=" h-8 w-8 rounded-full bg-green-400 flex justify-center items-center mx-4 md:mr-8"><i class="fas fa-sign-in-alt text-white"></i></a>';

        }
        ?>
        <!-- Profile dropdown -->
        
         
          <!--MENU ON MD + TO GIT-->
          
          <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
            <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Twój profil</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Wyloguj się</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</nav>
</body>
</html>
<script src="../scripts/dropdownProfile.js"></script>
