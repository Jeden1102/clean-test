
getAllOrders();


let isFiltering = false;
async function getAllOrders(){
    fetch('../../back/get_users.php')
    .then(response => response.json())
    .then((data)=>{
    //   filterResults(data);
    if(isFiltering == true){
        getAllOrders();
    }
    if(!isFiltering){
        showAllResults(data);
    }
    orders = data;

    } );
}

let ogloszenia = document.querySelector('.admin-users-list');
//2 step show ALL orders on site

function showAllResults(data){
    data.forEach(element => {
        let  div = document.createElement('tr');
        div.innerHTML = `
        <td class='w-20 text-left py-3 px-4'>${element.login}</td>
        <td class='w-20 text-left py-3 px-4'>${element.user_id}</td>
        <td class='w-20 text-left py-3 px-4'>${element.create_date}</td>

        <td class='w-20  text-left py-3 px-4'>${element.ilosc_ogl}</td>
        <td class='w-20  text-left py-3 px-4'>${element.ilosc_zlc}</td>
        <td class='w-20  text-left py-3 px-4'>${element.srednia}</td>

        `;
        
        ogloszenia.appendChild(div);
    });

}
// //3 step get the filters

let lokalizacja = document.querySelector('.lokalizacja');
let login = document.querySelector('.login');

lokalizacja.addEventListener('keyup',()=>{
    isFiltering = true;
    filterResults();
})
login.addEventListener('keyup',()=>{
    isFiltering = true;
    filterResults();
})

function filterResults(){
    ogloszenia.textContent = "";
    isFiltering = true;
    let filter = {
        address: lokalizacja.value.toUpperCase(),
        login:login.value.toUpperCase(),
      };
    getAllOrders();

    
    if(filter.address != ""){
        orders = orders.filter(obj => filter.address.includes(obj.user_id.toUpperCase()));
    }
    if(filter.login != ""){
        orders = orders.filter(obj => filter.login.includes(obj.login.toUpperCase()));
    }
    if(orders.length == 0){
        ogloszenia.innerHTML = "Brak dostępnych wyszkiwań, spróbuj użyć innych filtrów."
    }

    orders.forEach(element => {
    let  div = document.createElement('tr');
    div.innerHTML = `
    <td class='w-20 text-left py-3 px-4'>${element.login}</td>
    <td class='w-20 text-left py-3 px-4'>${element.user_id}</td>
    <td class='w-20 text-left py-3 px-4'>${element.create_date}</td>


    <td class='w-20  text-left py-3 px-4'>${element.ilosc_ogl}</td>
    <td class='w-20  text-left py-3 px-4'>${element.ilosc_zlc}</td>
    <td class='w-20  text-left py-3 px-4'>${element.srednia}</td>

    `;
    ogloszenia.appendChild(div);

        ogloszenia.appendChild(div);
    });
}