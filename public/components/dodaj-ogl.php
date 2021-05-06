<div class="shadow  overflow-x-hidden">
<div class="szeroki flex">
<div class="general-div ">
<img class="mx-auto mt-4 h-52" src="../assets/img/dodaj_ogloszenie.png" alt="">
<?php

$email = $_SESSION['email'];

$sql = "SELECT * from user where mail = '$email'";
$result = $conn->query($sql);

$json = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
    <div class="mt-3 md:mt-0 md:col-span-2">
      <form action="../../back/dodaj-ogl.php" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="company_website" class="block text-sm font-medium text-gray-700">
                  Tytuł ogłoszenia
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
          
                  <input type="text" name="order_title" id="company_website" class="h-8 pl-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Zlecę posprzątanie apartamentu">
                </div>
              </div>
            </div>

            <div>
              <label for="about" class="block text-sm font-medium text-gray-700">
                Opis
              </label>
              <div class="mt-1">
                <textarea id="about" name="order_description" rows="3" class="h-20 pl-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Opisz zlecenie"></textarea>
              </div>
             
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">
                Dodaj zdjęcie ogłoszenia
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
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
            </div>
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <fieldset>
              <legend class="text-base font-medium text-gray-900">Rodzaj usługi - musisz wybrać co najmniej jeden:</legend>
              <div class="mt-4 space-y-4">
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="comments" name="home_clean" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded check-check">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="comments" class="font-medium text-gray-700">Sprzątanie domu/mieszkania</label>
                    <p class="text-gray-500">W opisie prosimy podać jak najwięcej szczegółow, np. wielkość mieszkania itp.</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="candidates" name="car_clean" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded check-check">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="candidates" class="font-medium text-gray-700">Sprzątanie samochodu</label>
                    <p class="text-gray-500">W opisie prosimy podać jak najwięcej szczegółow, np. jaki to samochód oraz oczekiwanie czynnności np. pranie dywanów, mycie tapicerki.</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="offers" name="window_clean" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded check-check">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="offers" class="font-medium text-gray-700">Mycie okien</label>
                    <p class="text-gray-500">W opisie prosimy podać jak najwięcej szczegółow, np. ilość okien.</p>
                  </div>
                </div>
              </div>
            </fieldset>
           
          </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          
           
            <button type="button" class="next-step inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Dalej
            </button>
          </div>
          
        </div>
    </div>

</div>

<div class="w-1/2  personal-div card  p-4">
<img class="mx-auto mt-4 h-52" src="../assets/img/personal_info.png" alt="">
<p class="font-light text-center mb-4">Prosimy o wprowadzenie danych osobowych oraz miejsca zlecenia usługi.</p>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Imię</label>
    <input value="<?php echo $json[0]["fname"]?>" name="fname" type="text" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Nazwisko</label>
    <input value="<?php echo $json[0]["lname"]?>" type="text" name="lname" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Ulica</label>
    <input value="<?php echo $json[0]["street"]?>" type="text" name="street"  class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Nr domu/mieszkania</label>
    <input value="<?php echo $json[0]["local"]?>" type="text" name="number"  class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Miasto</label>
    <input value="<?php echo $json[0]["city"]?>" type="text" name="city" class="form-control" id="inputCity">
  </div>
  <div class="col-12 mt-4">
  <button type="button" class="prev-step inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Wstecz
  </button>
  <button type="button" class="next-step inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Dalej
  </button>
  </div>
</div>
<div class="pricing-div  ">
<img class="mx-auto mt-4 h-52" src="../assets/img/price.png" alt="">
<p class="font-light text-center mb-4">Prosimy o wprowadzenie informacji na temat ceny usługi oraz daty jej realizacji.</p>
<div class="flex mb-8 w-full  items-center justify-center space-x-8">
              <div class="w-40" >
                <p class="text-center">Cena :</p>
                <div class="input-group">
                  <input minlength="1" type="number" name="order_price" class="form-control" aria-label="Amount (to the nearest dollar)" id="inputPrice">
                  <span class="input-group-text">zł</span>
                </div>
              </div>
              <div class="w-40">
              
                <p class="text-center">Data ważności usługi : </p>
                <input class="h-9 border border-green-400" type="date" name="order_date" id="inputDate">
              </div>
</div>
<button type="button" class="prev-step inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Wstecz
  </button>
<!-- <button type="submit"  name="send" value="1" class="next-step inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:bg-red-100">
              Dodaj !
  </button> -->
  <button id="send-Btn" name="send" value="1" type="submit" class="btn bg-green-400 text-white sign-btn">Dodaj</button>
  <p id="err-info"></p>
</form>
</div>
</div>
</div>
</div>
<script src="../scripts/addOgloszenie.js"></script>