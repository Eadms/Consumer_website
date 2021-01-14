var imageIndex = 1; //assigns an index number to the images (1-6)
showImages(imageIndex);

function currentImage(a) { //controls the thumbnails
  showImages(imageIndex = a);
}

function showImages() {
  var i;
  var images = document.getElementsByClassName("large-images"); //turns the images into a javascript object
  for (i = 0; i < images.length; i++) {
    images[i].style.display = "none"; //hides the large images by default
  }
  images[imageIndex-1].style.display = "block"; //displays the images
  } 

function myFunction() { //blocks large images from opening if user has javascript enabled. If not enabled, each thumbnail will open to a large image 
  var x = document.querySelectorAll(".imageLink");
  var i;
  for (i = 0; i < x.length; i++) { 
    x[i].href = "#"; //changes the href to a blank URL
  }
}