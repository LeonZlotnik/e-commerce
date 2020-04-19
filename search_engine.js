// Función de buscador
let searchBar = document.getElementById("search");

searchBar.addEventListener('keyup', Filter);

function Filter(){
    let filterValue = document.getElementById("search").value.toUpperCase();
    console.log(filterValue);

    let ul = document.getElementById("list");

    let li = ul.querySelectorAll('li.card');
    
    for(let i=0; i<li.length; i++){
        let a = li[i];
        if(a.innerHTML.toUpperCase().indexOf(filterValue) > -1){
            li[i].style.display = "";
        }else{
            li[i].style.display = "none";
        }
    }
};