const searchbar = document.querySelector(".users .search input"),
searchbtn=document.querySelector(".users .search button").
userList=document.querySelector(".users .users-list");

searchbtn.onclick= ()=>{
    searchbar.classList.toggle("active");
    searchbar.focus();
    searchbtn.classList.toggle("active");
}

setInterval(()=>{
    let xhr=new XMLHttpRequest();

    xhr.open("GET", "http://localhost/chat_project/chat.php", true);

    xhr.onload=()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                console.log(xhr.responseText);
                // if(data == "success"){
                //     location.href="chatpage1.php";
                // }else{
                //     errorText.style.display="block";
                //     errorText.textContent =data;
                // }
                // alert('hello');
            }
        }
    }
xhr.send();
},500);