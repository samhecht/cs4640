function loginForm() {
    
    let username = document.getElementById("email").value
    let password = document.getElementById("pwd").value
    
    let length_arr = [username.length, password.length]

    let zero_len = 0
    let invalid_entry = []
    // check for empty fields
    for(let i = 0; i < length_arr.length; i++){
    if (length_arr[i] === 0){
      zero_len = 1
      invalid_entry.push(i)
    }
    }
//    document.getElementById("login-error").innerHTML="test"

    validUsername = (username.includes("@") && username.length > 1)
    validPassword = password.length > 6
    if (zero_len === 1){
    document.getElementById("login-error").innerHTML = "Please fill out every form"
    } 
    else if (username.length == 0) {
        document.getElementById("login-error").innerHTML = "Please enter email address"
    }
    else if (username.includes("@") === false) {
        document.getElementById("login-error").innerHTML = "Please enter valid email"
    }
    else if (password.length == 0) {
        document.getElementById("login-error").innerHTML = "Please enter password"
    }
    else if (validPassword === false){
        document.getElementById("login-error").innerHTML = "Please enter valid password"
    } else {
    document.getElementById("email").value = ""
    document.getElementById("pwd").value = ""
    document.getElementById("login-error").innerHTML = "Successfully Logged In"
    }


}

let login = document.getElementById("login-submit")
login.addEventListener("click", loginForm, false)