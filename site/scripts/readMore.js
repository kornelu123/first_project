var message = "Read more"
var isLogged = false
//if post is overflown 
function check(i){
    return document.getElementById('content_'+i).scrollHeight > document.getElementById('content_'+i).clientHeight
}

//writing out read more
function overflow(i){
    if(check(i)){
        setMessage(message,i)
    }
    blurring(i)
}

//reading more , or less
function read(i){
    if(isLogged){
        handleHeight(i)
        message = (message == "Read more") ? 'Read less' : 'Read more'
        setMessage(message,i)
    }
}

//setting message 
function setMessage(mess,i){
    document.getElementById("read_"+i).innerHTML = mess
}   

//handling height value of post div
function handleHeight(i){
    document.getElementById("post_"+i).classList.toggle('h-72')
    document.getElementById("post_"+i).classList.toggle('h-fit')
}

//handling getting logged in
function blurring(i){
    if(!isLogged){
        document.getElementById("post_"+i).classList.toggle('blur-sm')
        document.getElementById("warning").innerHTML = '<h1 class="text-5xl text-errorRed">Log in to see the posts</h1>'
        document.getElementById("warning").classList.toggle('p-10')
    }
}