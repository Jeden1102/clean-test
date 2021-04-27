
<div class="fixed z-10 inset-0 overflow-y-auto pwd-reset hidden ">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
 
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block  bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-400 sm:mx-0 sm:h-10 sm:w-10">
            <!-- Heroicon name: outline/exclamation -->
            <i class="fas fa-user-minus text-white"></i>
          </div>
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
              Usuwanie konta
            </h3>
            <div class="mt-2">
              <p class="text-sm text-gray-500">
                Pamiętaj, że ta czynność jest <span class="text-red-400 font-bold">nieodwracalna</span>, wszystkie dane n.t Twojego konta przepadną ! Aby potwierdzić ,że jesteś właścicielem konta, wpisz swoje hasło.
              </p>
              <form action="../../back/delete-acc.php" method="POST">
              <input name="password" type="password" class="form-control mt-4" id="exampleFormControlInput1" placeholder="********">
            </div>
          </div>
        </div>
      </div>
      <div class="border-t-2 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button name="send" type="submit" id="btn-change" class="mt-3 bg-red-400 hover:bg-red-500 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
          Usuń konto
        </button>
        <button type="button" id="btn-cancel" class="mt-3 bg-gray-100 hover:bg-gray-300 w-full inline-flex justify-center rounded-md border border-gray- shadow-sm px-4 py-2 text-base font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Anuluj
        </button>
        </form>
      </div>
    </div>
  </div>
</div>

