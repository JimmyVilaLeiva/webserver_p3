<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  
  position: relative;
  margin: auto;
    width: auto;
    height: 500;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 3.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="YG-dash.css" rel="stylesheet"> 
</head>
<body>


<div class="topnav">
  
  <a  href="young_guns_muc.html" class="active">Young Guns MUC</a>
  <a  href="news_muc.html">News MUC</a>
  
</div>

<div class="slideshow-container"  style="max-width:1100px" >

<div class="mySlides fade">
  <div class="numbertext">1 / 9</div>
  <img src="slices/P3_Muc_News_Januar-2018-001.jpg" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 9</div>
  <img src="slices/P3_Muc_News_Januar-2018-002.jpg" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 9</div>
  <img src="slices/P3_Muc_News_Januar-2018-003.jpg" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 9</div>
  <img src="slices/P3_Muc_News_Januar-2018-004.jpg" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 9</div>
  <img src="slices/P3_Muc_News_Januar-2018-004.jpg" style="width:100%">

</div>
    

    
<div class="mySlides fade">
  <div class="numbertext">6 / 9</div>
  <img src="slices/P3_Muc_News_Januar-2018-006.jpg" style="width:100%">

</div>
 
    
<div class="mySlides fade">
  <div class="numbertext">7 / 9</div>
  <img src="slices/P3_Muc_News_Januar-2018-007.jpg" style="width:100%">

</div>
    
    
<div class="mySlides fade">
  <div class="numbertext">8 / 9</div>
  <img src="slices/P3_Muc_News_Januar-2018-008.jpg" style="width:100%">

    
</div>
<div class="mySlides fade">
  <div class="numbertext">9 / 9</div>
  <img src="slices/P3_Muc_News_Januar-2018-009.jpg" style="width:100%">

</div>
    
    
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>




<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html> 
