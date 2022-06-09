const latest = document.getElementById("latest")
let text = '<ul class="text-basicWhite ">'
const post = {
    name : ["John" , "Mol" , "Cwel","Pizdus"],
    time : ["18:00", "19:43" , "20:21" , "14:32"],
}

//creating latest posts
for(let i=0;i<4 ;i++){
    let add
    if(i==0){
        add = "pt-16"
    }else{
        add = ''
    }
    text = text + '<li class="pl-16 py-4 px-6 text-xl '+add+'" id="post_info_'+i+'">Latest post by : '+post.name[i]+' at : '+post.time[i]+'</li>'
}
text += "</ul>"

latest.innerHTML = text
