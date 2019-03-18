


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
    //document.getElementById("form_email").innerHTML = "Enter a valid email"
    var para = document.createElement("p");
    var node = document.createTextNode("This is new.");
    para.appendChild(node);

    var element = document.getElementById("form_email");
    element.appendChild(para);
    return false
  }
  if (zero_len === 1){
    //document.getElementById("form_message").innerHTML = "please enter a message"
    return false
  }
  return true

}

let contact = document.getElementById("contact-submit")
contact.addEventListener("click", submitForm, false)
