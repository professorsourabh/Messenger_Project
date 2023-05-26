const form=document.querySelector(".typing-area"),
sendbtn=form.document.querySelector("button"),
inputField=form.querySelector(".input-field");

sendbtn.onclick =() =>{
    let xhr=new XMLHttpRequest();
    xhr.open("POST","http://localhost/chat_project/insert-chat.php",true);
    xhr.onload=()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data=xhr.response;
                console.log(data);
                if(data=="success"){
                    location.href="";
                }else{
                    errorText.style.display="block";
                    errorText.textContent =data;
                }
            }
        }
    }
    let formData =new FormData(form);
    xhr.send(formData);
}