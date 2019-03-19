


function submitForm() {

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
  

  validEmail = email.includes("@") && (email.length > 2)

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
function resizeAbout(x) {
  if (x.matches) { // If media query matches
    let dev1 = document.getElementById("developer")
    let dev2 = document.getElementById("developer2")

    let grid = document.getElementById("resp-row")

    if (grid !== null){
      grid.appendChild(dev2)
    }

  } else {
    let dev2 = document.getElementById("developer2")
    let grid = document.getElementById("dev-grid")

    if (grid !== null) {
      grid.appendChild(dev2)
    }
  }
}

var mob = window.matchMedia("(max-width: 768px)")
resizeAbout(mob)
mob.addListener(resizeAbout)



let contact = document.getElementById("contact-submit")
contact.addEventListener("click", submitForm, false)
