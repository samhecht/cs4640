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
  let images = document.getElementsByClassName('grid-img');
  let descs = document.getElementsByClassName('mov-desc');
  for (let i = 0; i < images.length; i++){
    images[i].alt = "../images/blank-movie.jpg";

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


      images[i].src = url;
      descs[i].textContent = overview;

    });

  }
}

function fixupReleases(){
  let images = document.getElementsByClassName('grid-img');
  let descs = document.getElementsByClassName('mov-desc');
  var count = 0;
  for (let i = 0; i < images.length; i++){
    if (descs[i].textContent === " This is a movie description"){
      //console.log("we here")
      images[i].alt = "../images/blank-movie.jpg";
      count += 1;
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


        images[i].src = url;
        descs[i].textContent = overview;
      });
    }

  }
  return count;
}




generateReleases();

fixupReleases();
fixupReleases();
/*
for (let i = 0; i < 20; i++){
  fixupReleases();
}
*/
