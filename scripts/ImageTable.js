//variables which turn the image query string into an object
const queryString = window.location.search; 
const urlParam = new URLSearchParams(queryString);
const imageSlice = urlParam.get("slice");

//preloading the images into the browser cache
var imageArray = new Array(); //creates the array which will contain the images
var arrayIndex = 0;
var r = 4;
var c = 5;

for(var row = 0; row < r; row++){
  for(var col = 0; col < c; col++){
    imageArray[arrayIndex] = new Image(); //creates the image object
    imageArray[arrayIndex].src = imageSlice + "_r" + (row+1) + "_c" + (col+1) + ".jpeg"; //places the images in the array using the source path
    arrayIndex++;
  }
}

function createImageSlices(imageSlice) { //function to create the table and arrange the images
  var rows = 4;
  var columns = 5;
  var table = '<table border ="0" cellpadding = "0" cellspacing="0">' 
  for(var row = 0; row < rows; row++) {
    table += "<tr>";
    for(var col = 0; col < columns; col++){
      table += "<td>";
      table += "<img src= '" + imageSlice + "_r" + (row+1) + "_c" + (col+1) + ".jpeg'"; //adds the file path so the images can be accessed
      table += "</td>"; 
    }
    table += "</tr>"
  }
  table += "</table>";
  document.getElementById("image-table").innerHTML = table; //prints the images in the table
  return;
}