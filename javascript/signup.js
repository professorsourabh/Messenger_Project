function togglePasswordVisibility(inputId) {
    var input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}

const form=document.querySelector(".container-1 form"),
continuebtn =form.querySelector(".button input");
continuebtn.onclick=()=>{
    console.log("hello");
}