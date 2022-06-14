var message = "Read more"
var isLogged = false
var isInFraction = false
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
    }else if(!isInFraction){
        document.getElementById("post_"+i).classList.toggle('blur-sm')
        document.getElementById("warning").innerHTML = '<h1 class="text-5xl text-errorRed">Get to the fraction to see the posts</h1>'
        document.getElementById("warning").classList.toggle('p-10')
    }
}

//handling the textarea expanding
function textArea_in(){
    if(isLogged&&isInFraction){
        document.getElementById('post_write').classList.remove("h-24")
        document.getElementById('post_write').classList.add("h-60")
        document.getElementById("input_post").classList.add("h-32")
        document.getElementById("input_post").classList.remove("h-5/6")
        document.getElementById("send_post").classList.add("h-12")
        document.getElementById("send_post").classList.remove("h-0")
        document.getElementById("close_icon").classList.remove("hidden")
        document.getElementById('post_write').onclick = null
    }
}

//handling the textarea shrinking
function textArea_out(){
    document.getElementById('post_write').classList.add("h-24")
    document.getElementById('post_write').classList.remove("h-60")
    document.getElementById("input_post").classList.remove("h-32")
    document.getElementById("input_post").classList.add("h-5/6")
    document.getElementById("send_post").classList.remove("h-12")
    document.getElementById("send_post").classList.add("h-0")
    document.getElementById("close_icon").classList.add("hidden")
}