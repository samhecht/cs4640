function loginForm() {

    let username = document.getElementById("email").value
    let password = document.getElementById("pwd").value

    let length_arr = [username.length, password.length]

    let zero_len = 0

    // check for empty fields
    for(let i = 0; i < length_arr.length; i++){
      if (length_arr[i] === 0){
        zero_len = 1

      }
    }
//    document.getElementById("login-error").innerHTML="test"

    validUsername = (username.includes("@") && username.length > 1)
    validPassword = password.length > 6
    if (zero_len === 1){
        document.getElementById("login-error").innerHTML = "Please fill out every form"
        if (length_arr[0] !== 0){
          document.getElementById("pwd").focus()
        } else {
          document.getElementById("email").focus()
        }

    }
    else if (username.length == 0) {
        document.getElementById("login-error").innerHTML = "Please enter email address"
        document.getElementById("email").focus()
    }
    else if (username.includes("@") === false) {
        document.getElementById("login-error").innerHTML = "Please enter valid email"
        document.getElementById("email").focus()
    }
    else if (password.length == 0) {
        document.getElementById("login-error").innerHTML = "Please enter password"
        document.getElementById("pwd").focus()
    }
    else if (validPassword === false){
        document.getElementById("login-error").innerHTML = "Please enter valid password"
        document.getElementById("pwd").focus()
    } else {
    document.getElementById("email").value = ""
    document.getElementById("pwd").value = ""
    document.getElementById("login-error").innerHTML = "Successfully Logged In"
    }


}




let gen = document.getElementById("gen")
gen.addEventListener("click", () => {
  let pic = document.getElementById("movie-pic")
  pic.src = "../images/the-lord-of-the-rings.jpg"
  let desc = document.getElementById("movie-desc")
  desc.innerHTML = "This movie is the lord of the rings and it is very good."
})

let login = document.getElementById("login-submit")
login.addEventListener("click", loginForm, false)
