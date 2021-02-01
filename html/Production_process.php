<!DOCTYPE html>
<html lang="en-au">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet"  type='text/css' href="../styles/production_page.css">
    <title>Production process</title>
    <script src="../scripts/production.js"></script>
</head>
<body onload="myFunction()">
<header>
  <?php include 'include_files/Navigation.inc'; 
         include 'include_files/Banner.php';
	?>
</header>
<h1>Production and design process</h1>
<p>
  Bazaar Ceramics are constantly experimenting with new designs and techniques.  The process of developing a particular range of ceramics, starts with the design process.  The ceramic designers and gallery director meet regularly to discuss new ideas for product ranges.  It may be that the designers are following through on an inspiration from a field trip or perhaps the gallery director has some suggestions to make based on feedback from customers.</p>
  <p>
  Promising designs are developed into working drawings which the production potters use to create the ceramic forms.  Depending on the type of decoration, the designers may apply the decoration at this stage, or after they have been “bisqued” (fired to 1000 degrees celsius).  These prototype designs go through a lengthy development stage of testing and review until the designer is happy with the finished product.  At this stage a limited number of pots are produced and displayed in the gallery.  If they do well in the gallery, they become a “standard line”. 
  </p>
  <p class="slideshow-text">Click on each thumbnail to see the larger image</p>
   <!-- Container for the image gallery -->
<div class="slideshow">
  <!-- Full-width images with number text -->
  <div class="large-images">
      <img src="../images/production_images/openingclay.jpg" alt="Starting the pot">
  </div>
  <div class="large-images">
      <img src="../images/production_images/sequence1.jpg" alt="Second stage"> 
  </div>
  <div class="large-images">
      <img src="../images/production_images/sequence5.jpg" alt="Third stage">
  </div>
  <div class="large-images">
      <img src="../images/production_images/sequence10.jpg" alt="Fourth stage">
  </div>
  <div class="large-images">
    <img src="../images/production_images/sequence13.jpg" alt="Fifth stage">
</div>
  <div class="large-images">
      <img src="../images/production_images/finishing.jpg" alt="Finishing the pot">
  </div>

  <!-- Thumbnail images -->
  <div>
    <div class="column">
      <a href="../images/production_images/openingclay.jpg" class="imageLink">
      <img class="thumbnail" src="../images/production_images/openingclaysmall.jpg" onclick="currentImage(1)" alt="Starting the pot"></a>
    </div>
    <div class="column">
      <a href="../images/production_images/sequence1.jpg" class="imageLink">
      <img class="thumbnail" src="../images/production_images/sequence1small.jpg" onclick="currentImage(2)" alt="Second stage"></a>
    </div>
    <div class="column">
      <a href="../images/production_images/sequence5.jpg" class="imageLink">
      <img class="thumbnail" src="../images/production_images/sequence5small.jpg" onclick="currentImage(3)" alt="Third stage"></a>
    </div>
    <div class="column">
      <a href="../images/production_images/sequence10.jpg" class="imageLink">
      <img class="thumbnail" src="../images/production_images/sequence10small.jpg" onclick="currentImage(4)" alt="Fourth stage"></a>
    </div>
    <div class="column">
      <a href="../images/production_images/sequence13.jpg" class="imageLink">
      <img class="thumbnail" src="../images/production_images/sequence13small.jpg" onclick="currentImage(5)" alt="Fifth stage"></a>
    </div>
    <div class="column">
      <a href="../images/production_images/finishing.jpg" class="imageLink">
      <img class="thumbnail" src="../images/production_images/finishingsmall.jpg" onclick="currentImage(6)" alt="Finishing the pot"></a>
    </div>
  </div>
</div>
</body>
</html>