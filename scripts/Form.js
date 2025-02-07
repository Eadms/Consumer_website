//function to open the order page and specify the query string for each product
function openWindow() {
  myWindow = window.open("members_order.php?product=Copper%Red%Dish&price=40&productID=bcpot020&slice=../images/slicedimages/bcpot002", "pot"); //query string for the red bowl
 
}
function openWindow2() {
  myWindow = window.open("members_order.php?product=White%bowl&price=60&productID=bcpot120&slice=../images/slicedimages//bcpot001", "pot"); //query string for the white bowl
 
}
function openWindow3() {
  myWindow = window.open("members_order.php?product=Copper%Red%Vase&price=50&productID=bcpot030&slice=../images/slicedimages//bcpot003", "pot"); //query string for the red vase
  
}
function openWindow4() {
  myWindow = window.open("members_order.php?product=Tungsten%Blue%bowl&price=35&productID=bcpot090&slice=../images/slicedimages//bcpot006", "pot"); //query string for the blue bowl
 
}
function openWindow5() {
  myWindow = window.open("members_order.php?product=Blue%teacup&price=30&productID=bcpot080&slice=../images/slicedimages/bcpot008", "pot"); //query string for the blue teacup
}
function openWindow6() {
  myWindow = window.open("members_order.php?product=Cyan%dish&price=40&productID=bcpot060&slice=../images/slicedimages/bcpot009", "pot"); //query string for the turquoise bowl

}

function openCart() {
	myWindow = window.open("cart.php")
}

function openConfirmpage() {
	myWindow = window.open("order_confirmation.php");
}

//function to close the order and cart pages
function closeWindow() {
  window.close();
}

//pre-filling the header and form with the prduct data contained within the query strings
window.onload = function createDetails(){
var productDetails = window.location.search.slice(1).split("&")[0].split("=")[1]
document.getElementById("item").value = productDetails.replace("%", " ").replace("%", " "); //pre-fills the item box

var productDetails = window.location.search.slice(1).split("&")[1].split("=")[1]
document.getElementById("cost").value = productDetails; //pre-fills the cost box

//document.getElementById("item").setAttribute("readonly", true); //makes the item box read-only
document.getElementById("cost").setAttribute("readonly", true); //makes the cost box read-only

var productDetails = window.location.search.slice(1).split("&")[0].split("=")[1]
document.getElementById("header").innerHTML = productDetails.replace("%", " ").replace("%", " ");
	//pre-fills the page header with the product details
}

//form calculation function - cost and quantity
function calculation() {
  var cost = document.getElementById("cost").value;
  var quantity = document.getElementById("quantity").value;
  var result = parseFloat(cost)+parseFloat(quantity);

if(!isNaN(result)) { //pop up alert if the product quantity field is blank
      document.getElementById("total-price").value = quantity * cost;
} else if (quantity == "") {
  alert("Please enter the product quantity")
} 
}

function clearBoxes() { //function to clear the quantity and total price fields 
  document.getElementById("quantity").value = "";
  document.getElementById("total-price").value = "";
}
/*
//submit order confirmation pop-up box
function submitOrder() {
  if( document.getElementById("quantity").value == "" || document.getElementById("total-price").value == "") {
    alert("please ensure the quantity and total price are complete before submitting"); //prompts user to complete the order form if it is incomplete
  } else {
  var confirmationBox = confirm('You have selected:\nItem Description: ' + document.getElementById("item").value + '\nQuantity: ' + document.getElementById("quantity").value + '\nPrice: ' + document.getElementById("cost").value + '\nTotal Price: ' + document.getElementById("total-price").value + '\nIf this information is correct, please click OK to submit your order'); //confirmation box 
  if (confirmationBox == false) {
    event.preventDefault() + clearBoxes(); //clears the quantity and total price if the user presses cancel
  }
}
}
*/