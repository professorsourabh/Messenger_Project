const searchbar = document.querySelector(".users .search input"),
searchbtn=document.querySelector(".users .search button");

searchbtn.onclick=()=>{
    searchbar.classList.toggle("active");
    searchbar.focus();
    searchbtn.classList.toggle("active");
}

setInterval(()=>{
    let xhr=new XMLHttpRequest();

    xhr.open("POST","php/",true);
    xhr.onload=()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                console.log(data);
                if(data == "success"){
                    location.href="chatpage1.php";
                }else{
                    errorText.style.display="block";
                    errorText.textContent =data;
                }
            }
        }
    }

},500);