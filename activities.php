<?php  
require("includes/connect.inc.php");

$query = $db->query("SELECT * FROM activities ORDER BY id DESC");

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

<h1 class="w3-margin">ARI Activities</h1>
  <div class="w3-row-padding w3-grayscale">
	<!-- The Tour Section -->
	
	<?php while($row = $query->fetch_array()){ ?>
  <div class="w3-light-grey w3-margin" id="tour">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h2 class="w3-wide w3-center"><?php echo $row['title']; ?></h2>
      <p class="w3-opacity w3-justify"><?php echo $row['description']; ?></p><br>

      <div class="w3-row-padding w3-center">
		<?php if(is_file("activities/".$row['id']."_1.jpg")){ ?>
			<div class="w3-col m3">
			  <img src="<?php echo "activities/".$row['id']."_1.jpg"; ?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
			</div>
		<?php } ?>
		
		<?php if(is_file("activities/".$row['id']."_2.jpg")){ ?>
			<div class="w3-col m3">
			  <img src="<?php echo "activities/".$row['id']."_2.jpg"; ?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
			</div>
		<?php } ?>
		
		<?php if(is_file("activities/".$row['id']."_3.jpg")){ ?>
			<div class="w3-col m3">
			  <img src="<?php echo "activities/".$row['id']."_3.jpg"; ?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
			</div>
		<?php } ?>
		
		<?php if(is_file("activities/".$row['id']."_4.jpg")){ ?>
			<div class="w3-col m3">
			  <img src="<?php echo "activities/".$row['id']."_4.jpg"; ?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
			</div>
		<?php } ?>
		
        <br>
      </div> 
    </div>
  </div>
	<?php } ?>
  </div>
  
  


  <!-- The Band Section -->


  <!-- The Tour Section -->

	  <!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>

  <!-- Ticket Modal -->
   <div id="ticketModal" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4">
      <header class="w3-container w3-teal w3-center w3-padding-32"> 
        <span onclick="document.getElementById('ticketModal').style.display='none'" 
       class="w3-button w3-teal w3-xlarge w3-display-topright">×</span>
        <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
      </header>
      <div class="w3-container">
        <p><label><i class="fa fa-shopping-cart"></i> Tickets, $15 per person</label></p>
        <input class="w3-input w3-border" type="text" placeholder="How many?">
        <p><label><i class="fa fa-user"></i> Send To</label></p>
        <input class="w3-input w3-border" type="text" placeholder="Enter email">
        <button class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right">PAY <i class="fa fa-check"></i></button>
        <button class="w3-button w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i class="fa fa-remove"></i></button>
        <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>
      </div>
    </div>
  </div>


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
