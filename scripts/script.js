/*
//Slideshow 1
var imlocation = "obrazky/slideshow1/";
var currentPerf = 0;
var image_number = 0;

function ImageArray1(n) {
  this.length = n;
  for (var i = 1; i <= n; i++) {
    this[i] = ' ';
  }
}
image = new ImageArray1(6);
image[0] = '0.jpg';
image[1] = '1.jpg';
image[2] = '2.jpg';
image[3] = '3.jpg';
image[4] = '4.jpg';
image[5] = '5.jpg';
var rand = 60 / image.length;

function randomimage() {
  currentPerf = new Date();
  image_number = currentPerf.getSeconds();
  image_number = Math.floor(image_number / rand);
  return (image[image_number]);
}
document.getElementById("slideshow1").innerHTML = "<img src='" + imlocation + randomimage() + "'>";
*/

//Last Modified
document.getElementById("lastMod").innerHTML = document.lastModified;

//TopNav RWD ikona
function menu() {
  var x = document.getElementById("idTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

/*
//Choď na začiatok
window.onscroll = function () {
  scrollFunction()
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("top").style.display = "block";
  } else {
    document.getElementById("top").style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
*/