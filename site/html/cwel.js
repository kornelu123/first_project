var cwel

function cwell(){
    cwel = (document.forms["cwel"]["waga"].value * document.forms["cwel"]["iq"].value)/document.forms["cwel"]["wzrost"].value
    document.getElementById("wynik").innerHTML = "Twoj wynik cwela to : "+cwel
}

document.getElementById("butt").addEventListener("click",() =>{cwell()})