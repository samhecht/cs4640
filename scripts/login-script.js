// By Johnny Choi and Sammy Hecht
// Scripts for login

// validate input on the login form
function loginForm() {
    // get input
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

    // check for valid email
    validUsername = (username.includes("@") && username.length > 1)
    validPassword = password.length > 6

    // display error messages
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
        document.getElementById("login-error").innerHTML = "enter valid email please"
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
//        document.getElementById("email").value = ""
//        document.getElementById("pwd").value = ""
        document.getElementById("login-error").innerHTML = "Successfully Logged In"
        return true
    }
    return false


}



// generate a movie rec on the generate button
let gen = document.getElementById("gen")
// make sure the button exists
if (gen !== null){
    // random number for movie
      var num = Math.floor(Math.random() * 2000)
      num = num.toString()
      // create settings for ajax request
      var settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://api.themoviedb.org/3/movie/" + num + "?language=en-US&api_key=53ba7831b31ceda4cde1c4e8db70ba41",
        "method": "GET",
        "headers": {},
        "data": "{}"
      }


      let desc = document.getElementById("movie-desc")
      var base_url = "https://image.tmdb.org/t/p/w500/"

      // request the movie api with a random movie
      $.ajax(settings).done(function (response) {
        let name = response.original_title;
        let url = base_url + response.poster_path

        // update the movie name and image
        let pic = document.getElementById("movie-pic")
        pic.src = url;
        desc.innerHTML = name;

        let get_name = document.getElementById("movie_title")
        let get_img = document.getElementById("movie_img")

        get_name.value = name
        get_img.value = url

        let html_number = document.getElementById("current_movie")
        html_number.value = num

      });


}

function logoutUser() {
  let logout = document.getElementById("logout-flag");
  // set logout to true so our php can reset the cookie.
  logout.value = "true";
  return true;
}

function shouldLogin() {
  let loginFlag = document.getElementById("login-flag");
  loginFlag.value = "true";
  return loginForm();
}

// add event listeners
/*
let login = document.getElementById("login-submit")
if (login !== null){
  login.addEventListener("click", loginForm, false)
  // add some checking for if our php should run

}
*/
