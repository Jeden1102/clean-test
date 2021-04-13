let checkboxes = document.querySelectorAll('.item-check');
checkboxes.forEach(element => {
    element.addEventListener('click',()=>{
        element.classList.toggle('bg-red-500');
    })
});