// By Johnny Choi and Sammy Hecht
// scripts for the recent releases page

// toggle the view for new releases
let toggled = document.getElementById("toggle")

// anonymous function
toggled.addEventListener("click", function(){
  // get current state
  let list_v = document.getElementById("list-view")
  let grid_v = document.getElementById("row-view")
  let style = window.getComputedStyle(list_v)
  let visible = style.getPropertyValue("display")

  // toggle to whichever one is hidden
  if (visible === "none") {
    list_v.style.display = "block"
    grid_v.style.display = "none"
  } else {
    list_v.style.display = "none"
    grid_v.style.display = "block"
  }
})
