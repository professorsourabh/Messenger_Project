const searchbar = document.querySelector(".users .search input"),
searchbtn=document.querySelector(".users .search button"),
userList=document.querySelector(".users .users-list");

searchbtn.onclick= ()=>{
    searchbar.classList.toggle("active");
    searchbar.focus();
    searchbtn.classList.toggle("active");
}
searchbar.onkeyup=()=>{
let seachTerm =searchbar.value;
let xhr=new XMLHttpRequest();
xhr.open("POST","http://localhost/chat_project/search.php",true);
xhr.onload=()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data=xhr.response;
            // userList.innerHTML=data;
            console.log(data);
        }
    }
}
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhr.send("seachTerm="+ seachTerm);

}
setInterval(()=>{
    let xhr=new XMLHttpRequest();

    xhr.open("GET", "http://localhost/chat_project/chat.php", true);

    xhr.onload=()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data=xhr.responseText;
                userList.innerHTML=data;
                
            }
        }
    }
xhr.send();
},500);