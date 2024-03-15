const submitBtn = document.querySelector("button[type=submit]");
const userNameField = document.getElementById("username");
const passwordField = document.getElementById("password");
const visibleIcon = document.getElementById("visible-pass");
const hideIcon = document.getElementById("invisible-pass");

// password hide and visible
visibleIcon.style.zIndex = "4";
hideIcon.style.zIndex = "5";

visibleIcon.addEventListener("click", ()=>{
    hideIcon.style.opacity = 1;
    hideIcon.style.zIndex = "5";
    visibleIcon.style.opacity = 0;
    visibleIcon.style.zIndex = "4";
    passwordField.setAttribute("type", "password");
})

hideIcon.addEventListener("click", ()=>{
    visibleIcon.style.opacity = 1;
    visibleIcon.style.zIndex = "5";
    hideIcon.style.opacity = 0;
    hideIcon.style.zIndex = "4";
    passwordField.setAttribute("type", "text");
})

// notify required field is not filled
function requiredFieldWarning(element) {
    element.addEventListener("input", (e)=>{
        if(e.target.value === "") {
            e.target.style.border = "1px solid red";
        } else {
            e.target.removeAttribute("style");
        }
    })
}

submitBtn.addEventListener("click", ()=>{
    if(userNameField.value === "") {
        userNameField.style.border = "1px solid red";
        requiredFieldWarning(userNameField);
    }
    if(passwordField.value === "") {
        passwordField.style.border = "1px solid red";
        requiredFieldWarning(passwordField);
    }
    if(userNameField.value != "" && passwordField.value != "") {
        LogInValidation(({"username":userNameField.value, "password":passwordField.value}))
    }
})

// login request validation
function LogInValidation(usersData) {
    fetch("./login.php", {
        method: 'POST',
        headers: {
            'Content-Type' : 'application/json; charset=utf-8'
        },
        body: JSON.stringify(usersData)
    }).then(
        res => res.json()
    ).then(
        resJson => {
            if(resJson["userExist"] === "1"){
                window.location = "./inward.php";
            } else {
                InvalidUserOrPassword();
            }
        }
    )
}

function InvalidUserOrPassword() {
    const errorMsg = document.getElementById("errorMsg");
    errorMsg.style.opacity = 1;
    const timeOut = setTimeout(() => {
        errorMsg.removeAttribute("style");
        clearTimeout(timeOut);
    }, 5000)
}