// By Johnny Choi and Sammy Hecht
// scripts for the about page


// validate input on the contact form
function submitForm() {

  // get input
  let first = document.getElementById("form_name").value
  let last = document.getElementById("form_lastname").value
  let email = document.getElementById("form_email").value
  let message = document.getElementById("form_message").value

  let length_arr = [first.length, last.length, email.length, message.length]

  let zero_len = 0
  let invalid_entry = []
  // check for empty fields
  for(let i = 0; i < length_arr.length; i++){
    if (length_arr[i] === 0){
      zero_len = 1
      invalid_entry.push(i)
    }
  }

  // check for valid email
  validEmail = email.includes("@") && (email.length > 2)

  // display error messages
  if (validEmail === false){
    document.getElementById("error").innerHTML = "Enter a valid email"
  }
  else if (zero_len === 1){
    document.getElementById("error").innerHTML = "Please fill out every form"
  } else {
    document.getElementById("form_name").value = ""
    document.getElementById("form_lastname").value = ""
    document.getElementById("form_email").value = ""
    document.getElementById("form_message").value = ""
    document.getElementById("error").innerHTML = "Message Submitted"
  }


}

// On mobile, create one column
function resizeAbout(size) {
  if (size.matches) {
    let dev1 = document.getElementById("developer")
    let dev2 = document.getElementById("developer2")

    let grid = document.getElementById("resp-row")

    // move the element under its predecessor
    if (grid !== null){
      grid.appendChild(dev2)
    }

  } else {
    let dev2 = document.getElementById("developer2")
    let grid = document.getElementById("dev-grid")

    // otherwise put them next to each other
    if (grid !== null) {
      grid.appendChild(dev2)
    }
  }
}

// add listeners
var mob = window.matchMedia("(max-width: 768px)")
resizeAbout(mob)
mob.addListener(resizeAbout)



let contact = document.getElementById("contact-submit")
contact.addEventListener("click", submitForm, false)
