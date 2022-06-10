const menu = document.getElementById("menu")
const toggle = document.getElementById("toggle")
const nav = ["Home" , "About" , "Projects" , "Blog"]
const menuChild = menu.children

//toggling the visibility of an element
function toggleVisibility(where){
    where.classList.toggle("h-0")
    where.classList.toggle("h-20")
    document.getElementById("button").classList.toggle("rotate-90")
}

//setting menu options 
function setMenu(){
    for(let i=0;i<4;i++){
        menuChild[i].innerHTML = nav[i]
    }
}

setMenu()
toggle.addEventListener("click",()=>{toggleVisibility(menu)})

