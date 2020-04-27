<?php  
require("includes/connect.inc.php");

$query = $db->query("SELECT * FROM members WHERE position NOT LIKE '%Chair%' AND position NOT LIKE '%Secretary%' ");

?>
<!DOCTYPE html>
<html>
<title>Adversity Relief Initiative | Members</title>
<meta charset="UTF-8">
<meta name="description" content="Adversity Refilief Initiative">
<meta name="keywords" content="ari, relief, aid, health">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/x-icon" href="images/logo.png" />
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<?php include("includes/header.inc.php"); ?>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

<br>

<h1 class="w3-margin">ARI Members</h1>
  <div class="w3-row-padding w3-grayscale">
    <?php
        $pres_sec_query = $db->query("SELECT * FROM members WHERE position LIKE '%Chair%' OR position LIKE '%Secretary%' ");

        while($row = $pres_sec_query->fetch_array()){
            echo "<div class=\"w3-col l3 m6 w3-margin-bottom\" style='height:700px;overflow:auto;' >
                    <img src=\"members/".$row['id'].".jpg\" alt=\"John\" style=\"width:280px;height:360px;\" class=\"w3-margin\" >
                    <h3>".$row['name']."</h3>
                    <p class=\"w3-opacity\">".$row['position']."</p>
                    <p class='w3-justify' >".$row['bio']."</p>
                  </div>";
        }

        while($row = $query->fetch_array()){
            echo "<div class=\"w3-col l3 m6 w3-margin-bottom\" style='height:700px;overflow:auto;' >
                    <img src=\"members/".$row['id'].".jpg\" alt=\"John\" style=\"width:280px;height:360px;\" class=\"w3-margin\" >
                    <h3>".$row['name']."</h3>
                    <p class=\"w3-opacity\">".$row['position']."</p>
                    <p class='w3-justify'>".$row['bio']."</p>
                  </div>";
        }
    ?>
  </div>


  <!-- The Band Section -->


  <!-- The Tour Section -->


  <!-- Modal for full size images on click-->



  <!-- Ticket Modal -->


  <!-- The Contact Section -->

<!-- End Page Content -->
</div>
<!-- Add Google Maps -->
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 4000);    
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
