const menu = document.getElementById("menu")
const toggle = document.getElementById("toggle")

//toggling the visibility of an element
function toggleVisibility(where){
    where.classList.toggle("h-0")
    where.classList.toggle("h-20")
    document.getElementById("button").classList.toggle("rotate-90")
}


toggle.addEventListener("click",()=>{toggleVisibility(menu)})

