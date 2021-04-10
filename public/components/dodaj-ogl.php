<div class="shadow bg-red-400 overflow-x-hidden">
<div class="szeroki flex">
<div class="bg-yellow-200 general-div">
<h2 class="p-4 text-3xl text-center font-light">Dodaj ogłoszenie</h2>
    <div class="mt-3 md:mt-0 md:col-span-2">
      <form action="#" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="company_website" class="block text-sm font-medium text-gray-700">
                  Tytuł ogłoszenia
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
          
                  <input type="text" name="company_website" id="company_website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Zlecę posprzątanie apartamentu">
                </div>
              </div>
            </div>

            <div>
              <label for="about" class="block text-sm font-medium text-gray-700">
                Opis
              </label>
              <div class="mt-1">
                <textarea id="about" name="about" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
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
              <legend class="text-base font-medium text-gray-900">Rodzaj usługi:</legend>
              <div class="mt-4 space-y-4">
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="comments" class="font-medium text-gray-700">Sprzątanie domu/mieszkania</label>
                    <p class="text-gray-500">W opisie prosimy podać jak najwięcej szczegółow, np. wielkość mieszkania itp.</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="candidates" name="candidates" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                  </div>
                  <div class="ml-3 text-sm">
                    <label for="candidates" class="font-medium text-gray-700">Sprzątanie samochodu</label>
                    <p class="text-gray-500">W opisie prosimy podać jak najwięcej szczegółow, np. jaki to samochód oraz oczekiwanie czynnności np. pranie dywanów, mycie tapicerki.</p>
                  </div>
                </div>
                <div class="flex items-start">
                  <div class="flex items-center h-5">
                    <input id="offers" name="offers" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
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
          
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Dalej
            </button>
          </div>
          
        </div>
      </form>
    </div>

</div>
<div class="pricing-div bg-black">
x
</div>
<div class="w-1/2 bg-green-200 personal-div card  p-4">
<form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Imię</label>
    <input type="text" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Nazwisko</label>
    <input type="text" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Ulica</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Nr domu/mieszkania</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Miasto</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Kod pocztowy</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
  <button type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Wstecz
  </button>
  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Dodaj !
  </button>
  </div>
</form>
</div>
</div>
    <!-- <header>Formularz</header>
    <div class="form-outer">
        <form action="#">
            <div class="page">
                <div class="title">Basic Info:</div>
                <div class="field">
                    <div class="label">First Name</div>
                    <input type="text">
                </div>
                <div class="field">
                    <div class="label">Last Name</div>
                    <input type="text">
                </div>
                <div class="field">
                    <button>Next</button>
                </div>
            </div>

            <div class="page">
                <div class="title">Contact Info:</div>
                <div class="field">
                    <div class="label">Email Address</div>
                    <input type="text">
                </div>
                <div class="field">
                    <div class="label">Phone Number</div>
                    <input type="text">
                </div>
                <div class="field btns">
                    <button class="prev-1 prev">Previous</button>
                    <button class="next-1 pnext">Next</button>
                </div>
            </div>

            <div class="page">
                <div class="title">Date of Birth:</div>
                <div class="field">
                    <div class="label">Date</div>
                    <input type="text">
                </div>
                <div class="field">
                    <div class="label">Gender</div>
                    <select>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="field btns">
                    <button class="prev-2 prev">Previous</button>
                    <button class="next-2 next">Next</button>
                </div>
            </div>

            <div class="page">
                <div class="title">Login Details:</div>
                <div class="field">
                    <div class="label">Username</div>
                    <input type="text">
                </div>
                <div class="field">
                    <div class="label">Password</div>
                    <input type="password">
                </div>
                <div class="field btns">
                    <button class="prev-3 prev">Previous</button>
                    <button class="submit">Submit</button>
                </div>
            </div>
        </form> -->
    </div>

    </div>