
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
              Oceń wykonawcę
            </h3>
            <div class="mt-2">
              <p class="text-sm text-gray-500">
                Pamiętaj, że ta czynność jest <span class="text-red-400 font-bold">nieodwracalna</span>, wszystkie dane n.t Twojego konta przepadną ! Aby potwierdzić ,że jesteś właścicielem konta, wpisz swoje hasło.
              </p>
              <form method='POST' action='../../back/end_order.php'>
                        <button name='chosenUser' class='ml-4 next-step  inline-flex justify-center py-2 px-4  shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500' >Zakończ i oceń</button>
                        <input type='hidden' name='chose_order_id' value='". $value['order_id'] ."'/>
                        <input type='text' name='description' placeholder='Oceń użytkownika'/>
                        <input type='number' name='score'/>
                        <input type='hidden' name='from_user' value='".$_SESSION['email']."'/>
                    <input type='hidden' name='to_user' value='".  $value['chosen_user'] ."'/>
        <button type="button" id="btn-cancel" class="mt-3 bg-gray-100 hover:bg-gray-300 w-full inline-flex justify-center rounded-md border border-gray- shadow-sm px-4 py-2 text-base font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Anuluj
        </button>
        </form>
      </div>
    </div>
  </div>
</div>

