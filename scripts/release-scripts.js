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


// generate movies for the releases page
// still needs some work
let generateReleases = () => {
  let descriptions = Array()
  let urls = Array()
  for (let i = 0; i < 9; i++){
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



    var base_url = "https://image.tmdb.org/t/p/w500/"

    // request the movie api with a random movie
    $.ajax(settings).done(function (response) {
      let overview = response.overview;
      let url = base_url + response.poster_path;

      descriptions.push(overview);
      urls.push(url);

    }).fail(function (response) {
      // try again if the response fails
      i = i - 1;
    });
  }

  let images = document.getElmentsByClassName('grid-img');

  for (let i = 0; i < images.length / 2; i++){
    images[i].src = urls[i];
  }
  for (let i = images.length / 2; i < images.length; i++){
    images[i].src = urls[i];
  }

}
generateReleases();
