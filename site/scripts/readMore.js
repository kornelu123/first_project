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
        classToggling([['post_u']])
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
        document.getElementById("warning").innerHTML = '<h1 class="text-5xl text-errorRed">Log in</h1>'
        document.getElementById("warning").classList.toggle('p-10')
    }else if(!isInFraction){
        document.getElementById("post_"+i).classList.toggle('blur-sm')
        document.getElementById("warning").innerHTML = '<h1 class="text-5xl text-errorRed">Join the fraction to see the posts</h1>'
        document.getElementById("warning").classList.toggle('p-10')
    }
}

//class toggling 
function classToggling(array,bool){
    if(bool){
        for(let i=0;i<array.length;i++){
            if(array[i][1]=="add"){
                document.getElementById(array[i][0]).classList.add(array[i][2])
            }
            if(array[i][1]=="remove"){
                document.getElementById(array[i][0]).classList.remove(array[i][2])
            }
        }
    }
}