//1 step get ALL orders
//     let min1 = 0;
//     let max2 = 0;
//   $( function() {
//     $( "#slider-range" ).slider({
//       range: true,
//         values:[0,500],
//       slide: function( event, ui ) {
//         $( "#amount" ).val( "zł " + ui.values[ 0 ] + " - zł " + ui.values[ 1 ] );
//         min1 = ui.values[0];
//         max2 = ui.values[1];
//         filterResults();

//         $( "#slider-range" ).slider( "option", "max", highest );
//         $( "#slider-range" ).slider( "option", "min", 0 );
//       }
//     });

//     $( "#amount" ).val( "zł " + $( "#slider-range" ).slider( "values", 0 ) +
//       " - zł " + $( "#slider-range" ).slider( "values", 1 ) );

//   } );
getAllOrders();
let orders;
let highest;

let isFiltering = false;
async function getAllOrders(){
    fetch('../../back/api.php')
    .then(response => response.json())
    .then((data)=>{
    //   console.log(data);
    //   filterResults(data);
    if(isFiltering == true){
        getAllOrders();
    }
    if(!isFiltering){
        showAllResults(data);
    }
    orders = data;
    console.log(orders);
    highest = Number(Math.max.apply(Math, orders.map(function(o) { return o.order_price; })));
    console.log(highest)

    } );
}

let ogloszenia = document.querySelector('.ogloszenia');
//2 step show ALL orders on site

function showAllResults(data){
    data.forEach(element => {
        let  div = document.createElement('div');
        if(Number(element.car_clean) !=0){
            samochod = "Samochody";
        }else{
            samochod = "";
        }
        if(Number(element.home_clean) !=0){
            okna = "Mycie okien";
        }else{
            okna = "";
        }
        if(Number(element.window_clean) !=0){
            dom = "Sprzątanie domu";
        }else{
            dom = "";
        }
        div.innerHTML = `
        <a href='./ogloszenie.php?id=${element.order_id}' >
        
       
        <div class='shadow w-11/12  mx-auto my-2 md:flex md:flex-row-reverse h-72 md:h-52'>
          <div class='md:w-1/3 md:h-full w-full mx-auto rounded  h-2/3' style='background-image:url("../assets/img/sp1.jpg");background-size:cover;background-position:center'>
  
          </div>
          <div class='mt-4 md:w-2/3 h-1/3 md:h-full'>
            <div class='flex w-full  justify-between items-center md:h-3/5 '>
            <h2  class='ml-4 text-2xl md:text-3xl'>${element.title}</h2>
            <p class='font-bold mr-4 md:text-2xl'> ${element.order_price}zł</p>
            </div>
           
            <div class='font-light mt-2 md:ml-4'>
            ${element.city} ,${element.street}, ${element.number} "
            </div>
            <div class='font-light mt-2 md:ml-4'>
            Kategorie : ${samochod}   ${okna}   ${dom} 
            </div>
          </div>
              
        </div>
        </a> 
        `;
        ogloszenia.appendChild(div);
    });

}
//3 step get the filters

let lokalizacja = document.querySelector('.lokalizacja');
let min = document.querySelector('.minimum');
let max = document.querySelector('.maximum');
let ch1 = document.querySelector('#ch1');
let ch2 = document.querySelector('#ch2');
let ch3 = document.querySelector('#ch3');
let slider = document.querySelector('#slider-range');
lokalizacja.addEventListener('keyup',()=>{
    isFiltering = true;
    console.log('tak');
    filterResults();
})
min.addEventListener('keyup',()=>{
    isFiltering = true;
    console.log('tak');

    filterResults();
})
max.addEventListener('keyup',()=>{
    isFiltering = true;
    console.log('tak');

    filterResults();
})
ch1.addEventListener('change',()=>{
    isFiltering = true;
    filterResults();
})
ch2.addEventListener('change',()=>{
    isFiltering = true;
    filterResults();
})
ch3.addEventListener('change',()=>{
    isFiltering = true;
    filterResults();
})

function filterResults(){
    ogloszenia.textContent = "";
    isFiltering = true;
    let filter = {
        address: lokalizacja.value.toUpperCase(),
        min: Number(min.value),
        max: Number(max.value),
        samochod : ch1.checked,
        okna : ch2.checked,
        sprzatanie : ch3.checked,
      };
      console.log(filter);
    getAllOrders();
    console.log(orders);
    // czyszczenie  diva
    if(filter.min != 0 && filter.max ==0){
        orders = orders.filter(obj => (Number(obj.order_price) >= Number(filter.min) && Number(obj.order_price) <= 9999999));

    }
    if(filter.min == 0 && filter.max !=0){
        orders = orders.filter(obj => (Number(obj.order_price) >= Number(filter.min) && Number(obj.order_price) <= Number(filter.max)));

    }
    
    if(filter.min != 0 && filter.max !=0){
        orders = orders.filter(obj => (Number(obj.order_price) >= Number(filter.min) && Number(obj.order_price) <= Number(filter.max)));

    }
    if(filter.min == 0 && filter.max ==0){
        orders = orders.filter(obj => (Number(obj.order_price) >= Number(filter.min) && Number(obj.order_price) <=  9999999));

    }
    
    if(filter.address != ""){
        orders = orders.filter(obj => filter.address.includes(obj.city.toUpperCase()));
    }
    if(filter.okna){
        orders = orders.filter(obj => Number(obj.window_clean == 1));

    }
    if(filter.samochod){
        orders = orders.filter(obj => Number(obj.car_clean == 1));

    }
    if(filter.sprzatanie){
        orders = orders.filter(obj => Number(obj.home_clean == 1));

    }
    
    console.log(orders);
    if(orders.length == 0){
        ogloszenia.innerHTML = "Brak dostępnych wyszkiwań, spróbuj użyć innych filtrów."
    }

    orders.forEach(element => {
        let  div = document.createElement('div');
        let samochod,okna,dom;
        if(Number(element.car_clean) !=0){
            samochod = "Samochody";
        }else{
            samochod = "";
        }
        if(Number(element.home_clean) !=0){
            okna = "Mycie okien";
        }else{
            okna = "";
        }
        if(Number(element.window_clean) !=0){
            dom = "Sprzątanie domu";
        }else{
            dom = "";
        }
            div.innerHTML = `

            <a href='./ogloszenie.php?id=${element.order_id}' >
        
       
            <div class='shadow w-11/12  mx-auto my-2 md:flex md:flex-row-reverse h-72 md:h-52'>
              <div class='md:w-1/3 md:h-full w-full mx-auto rounded  h-2/3' style='background-image:url("../assets/img/sp1.jpg");background-size:cover;background-position:center'>
      
              </div>
              <div class='mt-4 md:w-2/3 h-1/3 md:h-full'>
                <div class='flex w-full  justify-between items-center md:h-3/5 '>
                <h2  class='ml-4 text-2xl md:text-3xl'>${element.title}</h2>
                <p class='font-bold mr-4 md:text-2xl'> ${element.order_price}zł</p>
                </div>
               
                <div class='font-light mt-2 md:ml-4'>
                ${element.city} ,${element.street}, ${element.number} "
                </div>
                <div class='font-light mt-2 md:ml-4'>
                Kategorie : ${samochod}   ${okna}   ${dom} 
                </div>
              </div>
                  
            </div>
            </a> 
            `;

        ogloszenia.appendChild(div);
    });
}