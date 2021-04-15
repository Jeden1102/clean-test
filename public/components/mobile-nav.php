
    <nav class="bg-green-400 w-full h-12 fixed bottom-0 left-0 border-t-2 border-green-500  md:hidden">
     
        <div class="flex h-full bg-green-400 ">
            <a href="../../index.php" class="w-1/4 h-full  flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500"><i class="fas fa-home text-3xl text-white hover:text-gray-100"></i></a>
            <a href="./ogloszenia.php" class="w-1/4 h-full   flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500"><i class="fas fa-bullhorn text-3xl text-white hover:text-gray-100"></i></a>
            <a href="" class="w-1/4 h-full  flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500"><i class="fas fa-users text-3xl text-white hover:text-gray-100"></i></a>
            <?php
            if(isset($_SESSION['email'])){
            echo ' <a href="../views/profile-settings.php" class="w-1/4 h-full  flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500">
            <i class="fas fa-user-circle text-3xl text-white hover:text-gray-100"></i>
            </a>
            ';
            }else{
                echo '<a href="../views/login-register.php" class="w-1/4 h-full  flex justify-center items-center border-r-2 hover:bg-green-500 border-green-500">
                <i class="fas fa-sign-in-alt text-3xl text-white hover:text-gray-100"></i>
                </a>';

            }
            ?>
        
            
        </div>
    </nav>
