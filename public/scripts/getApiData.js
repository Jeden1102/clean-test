// let orders;
// fetch('../../back/api.php')
//   .then(response => response.json())
//   .then((data)=>{
//     orders = data;
//     createOrders(orders);

//   } );
// //filter data
// let lokalizacja = document.querySelector('input[name="lokalizacja"]');
// let lokalizacja2;
// lokalizacja.addEventListener('keyup',()=>{
//     console.log(lokalizacja.value);
//     lokalizacja2 = lokalizacja.value;
//     createOrders(orders);

// })
//   function createOrders(orders){
  
//     orders.forEach(element => {
//         if(element.street == lokalizacja2){
//             let div = document.createElement('div');
//             let parent = document.querySelector('.orders')
//             div.classList.add("shadow", "w-11/12", "mx-auto","my-4");
//             div.innerHTML = `
//             <h2>${element.city}</h2>
//             <img class="w-11/12 mx-auto rounded" src="../assets/img/photo.jpg"/>
//             <strong>Data : </strong> ${element.date}.
//             `;
//             parent.appendChild(div);
//         }
//     });
//   }

// let orders;
// fetch('../../back/api.php')
//   .then(response => response.json())
//   .then((data)=>{
//     orders = data;
//     getAllOrders(orders);

//   } );
// //zbieram wszystkie zmowienia
// function getAllOrders(orders){
//     filterOrders(orders,isFiltering=false,loc=null);
// }
// //filtruje zamówienia funckja
// function filterOrders(orders,isFiltering=false,loc=null){
// let filteredOrders
// if(isFiltering){
// filteredOrders = orders.filter(el => el.street == loc);
// }else{
//     filteredOrders = orders;
// }
// showResult(filteredOrders);
// }

// //dane do filtrowania i odpalanie funkcji

// let filteredOrders;
// let lokalizacja = document.querySelector('input[name="lokalizacja"]');
// let lokalizacja2;
// lokalizacja.addEventListener('keyup',()=>{
//     console.log(lokalizacja.value);
//     lokalizacja2 = lokalizacja.value;
//     if(lokalizacja2.length>0){
//     filterOrders(orders,isFiltering=true,loc=lokalizacja2);

//     }else{
//         filterOrders(orders,isFiltering=false,loc=null);
//     }
// })
// //pokzywanie na stronie

// function showResult(filteredOrders){
//     console.log(filteredOrders)
//     filteredOrders.forEach(element => {
//         console.log(element)
//         let div = document.createElement('div');
//             let parent = document.querySelector('.orders')
          
//             div.classList.add("shadow", "w-11/12", "mx-auto","my-4");
//             div.innerHTML = `
//             <h2>${element.city}</h2>
//             <img class="w-11/12 mx-auto rounded" src="../assets/img/photo.jpg"/>
//             <strong>Data : </strong> ${element.date}.
//             `;
//             parent.appendChild(div);
//     });
// }



//   function createOrders(orders){
  
//     orders.forEach(element => {
//         if(element.street == lokalizacja2){
//             let div = document.createElement('div');
//             let parent = document.querySelector('.orders')
//             div.classList.add("shadow", "w-11/12", "mx-auto","my-4");
//             div.innerHTML = `
//             <h2>${element.city}</h2>
//             <img class="w-11/12 mx-auto rounded" src="../assets/img/photo.jpg"/>
//             <strong>Data : </strong> ${element.date}.
//             `;
//             parent.appendChild(div);
//         }
//     });
//   }

//ostatnia próba

let orders;
fetch('../../back/api.php')
  .then(response => response.json())
  .then((data)=>{
    orders = data;
    getAllOrders(orders);

  } );
//zbieram wszystkie zmowienia
function getAllOrders(orders){
    filterOrders(orders,isFiltering=false,loc=null);
    showResult(orders)
}
//filtruje zamówienia funckja
function filterOrders(orders,isFiltering=false,loc=null){
let filteredOrders
if(isFiltering){
filteredOrders = orders.filter(el => el.street == loc);
}else{
    filteredOrders = orders;
}
// showResult(filteredOrders);
}

//dane do filtrowania i odpalanie funkcji

let filteredOrders;
let lokalizacja = document.querySelector('input[name="lokalizacja"]');
let lokalizacja2;
lokalizacja.addEventListener('keyup',()=>{
    console.log(lokalizacja.value);
    lokalizacja2 = lokalizacja.value;
    if(lokalizacja2.length>0){
    filterOrders(orders,isFiltering=true,loc=lokalizacja2);

    }else{
        filterOrders(orders,isFiltering=false,loc=null);
    }
})
//pokzywanie na stronie

function showResult(orders){
    console.log(orders)
    orders.forEach(element => {
        console.log(element)
        let div = document.createElement('div');
            let parent = document.querySelector('.orders')
          
            div.classList.add("shadow", "w-11/12", "mx-auto","my-4");
            div.innerHTML = `
            <h2>${element.city}</h2>
            <img class="w-11/12 mx-auto rounded" src="../assets/img/photo.jpg"/>
            <strong>Data : </strong> ${element.date}.
            `;
            parent.appendChild(div);
    });
}
