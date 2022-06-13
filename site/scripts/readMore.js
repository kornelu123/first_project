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

//handling the textarea expanding
function textArea_in(i){
    document.getElementById(i).classList.remove("h-24")
    document.getElementById(i).classList.add("h-52")
    document.getElementById("input_post").classList.add("h-4/5")
    document.getElementById("input_post").classList.remove("h-full")
    document.getElementById("send_post").classList.add("h-1/5")
    document.getElementById("send_post").classList.remove("h-0")
}

//handling the textarea shrinking
function textArea_out(i){
    document.getElementById(i).classList.add("h-24")
    document.getElementById(i).classList.remove("h-52")
}