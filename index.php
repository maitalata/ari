<?php  
require("includes/connect.inc.php");

$name= $email= $message= $response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $data_check = new DataValidation();
  
  $name = $data_check->validate($_POST['name']);
  $email = $data_check->validate($_POST['email']);
  $message = $data_check->validate($_POST['message']);
  
  if($data_check->emptyCheck($name, $email, $message)){
    if($db->query("INSERT INTO messages(name, email, message) VALUES ('$name','$email','$message')")){
      $response = "<div class=\"w3-panel w3-green w3-leftbar w3-padding-10\">
              <h6><i class=\"fa fa-check\"></i> Message sent successfully</h6>
            </div>";
      //header("Location: #contact");
      
    }else{
      $response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
              <h6><i class=\"fa fa-times\"></i> System unable to send message</h6>
            </div>";
      //header("Location: #contact");
      
    }
  }else{
    $response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
              <h6><i class=\"fa fa-times\"></i> All fields must be filled</h6>
            </div>";
    //header("Location: #contact");
    
  }
}

?>
<!DOCTYPE html>
<html>
<title>Adversity Relief Initiative | Home</title>
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

  <!-- Automatic Slideshow Images -->
   <div class="mySlides w3-display-container w3-center">
    <img src="w3images/name.jpg" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="w3images/2.png" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <p class="w3-text-black"><b>Sister Ann, Pharm. Rahila and Fatima assisting ARI Foundation beneficiaries</b></p>   
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="w3images/3.png" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <p class="w3-text-black"><b>ARI Foundation Pharm. Rahila and Sister Ann making sure that the High blood pressure tools are working effectively to
avoid miscalculation</b></p>    
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="w3images/4.png" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">   
    </div>
  </div>

  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">About Adversity Relief Initiative (ARI)</h2>
    <p class="w3-opacity"><i>All Lives Matter</i></p>
    <p class="w3-justify">Adversity Relieve Initiative (ARI) was established in 2016 and started it
outreaches July 2017, Adversity Relief Initiative (ARI) is a non-profit initiative
aimed at providing aid and support to at least 5million the less privileged in the
society in the next 10years. It has operated in Kano and Kaduna states respectively.</p>
	<h3>Our Vision</h3>
	  <p class="w3-justify">Our vision is to see youth taking leadership role in addressing the most urgent
issues facing the world, through supporting their communities. a society free of
poverty, socially and economically self-reliant as well as mindful about basic
human rights.</p>
<h3>Our Mission</h3>
	  <p class="w3-justify">Our mission is working tirelessly in helping and sustaining the needy and
abandoned people in the society. Placing youth at the lead of development. Hence,
ARI will take necessary enterprises towards empowering community members,
aiding them in solving their own socio-economic problems. We aim to achieve our
mission in four (4) goal areas:
<ul class="w3-left-align">
<li>Help and Develop the Vulnerable People: helping the needy socially and
economically through providing them with necessary help in sustaining their
lives most especially the women and children</li>
<li>Civic Participation: youth are vital contributors to development processes.
This will help ARI to achieve their mission with the involvement of
community youth.</li>
<li>Skills Acquisition: ARI will assist in teaching community people different
skills acquisition that will help them to be poverty free.</li>
<li>Water and Sanitation Hygiene: hygiene is one of the most important thing
in the society as this will help in reducing mortality rate</li>
</ul>
</p>
<h3>Our Values</h3>
    <div class="w3-row w3-padding-small">
      <div class="w3-quarter">
        <p>Heart</p>
        <i class="fa fa-heart" style="font-size:45px;"></i>
      </div>
      <div class="w3-quarter">
        <p>Voice</p>
        <i class="fa fa-volume-up" style="font-size:45px;"></i>
      </div>
      <div class="w3-quarter">
        <p>Head</p>
		<i class="fa fa-smile-o" style="font-size:45px;"></i>
       <i></i>
      </div>
	   <div class="w3-quarter">
        <p>Hand</p>
		<i class="fa fa-handshake-o" style="font-size:45px;"></i>
       <i></i>
      </div>
	   <div class="w3-quarter">
        <p>Together</p>
		<i class="fa fa-group" style="font-size:45px;"></i>
       <i></i>
      </div>
    </div>
  </div>

  <!-- The Tour Section -->
  <div class="w3-light-grey" id="tour">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h2 class="w3-wide w3-center">Activities</h2>
	  <?php
		$a_query = $db->query("SELECT * FROM activities ORDER BY id DESC");
		$a_row = $a_query->fetch_array();
       echo "<h4>".$a_row['title']."</h4>";
		echo "<p class=\"w3-opacity w3-justify\">".$a_row['description']."</p><br>";
		?>
      <div class="w3-row-padding w3-center">
        <?php if(is_file("activities/".$a_row['id']."_1.jpg")){ ?>
			<div class="w3-col m3">
			  <img src="<?php echo "activities/".$a_row['id']."_1.jpg"; ?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
			</div>
		<?php } ?>
		
		<?php if(is_file("activities/".$a_row['id']."_2.jpg")){ ?>
			<div class="w3-col m3">
			  <img src="<?php echo "activities/".$a_row['id']."_2.jpg"; ?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
			</div>
		<?php } ?>
		
		<?php if(is_file("activities/".$a_row['id']."_3.jpg")){ ?>
			<div class="w3-col m3">
			  <img src="<?php echo "activities/".$a_row['id']."_3.jpg"; ?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
			</div>
		<?php } ?>
		
		<?php if(is_file("activities/".$a_row['id']."_4.jpg")){ ?>
			<div class="w3-col m3">
			  <img src="<?php echo "activities/".$a_row['id']."_4.jpg"; ?>" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
			</div>
		<?php } ?>
        <br>
        <div class="w3-panel w3-center">
          <button class="w3-button w3-padding-large w3-dark-grey " style="margin-top:64px" onclick="location.href='activities.php'" >MORE</button>
        </div>
      </div> 

    </div>
  </div>

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
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <p class="w3-opacity w3-center"><i>Contact us through our phone nuumber, email or send us direct message using the form below</i></p>
    <?php echo  $response; ?>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> No. 1, Audu Bako Way, Nassarawa LGA, Kano Nigeria<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: +2347039032095<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: info@ari.com.ng<br>
      </div>
      <div class="w3-col m6">
        <form action="" method="POST">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Name" required name="name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Email" required name="email">
            </div>
          </div>
          <textarea class="w3-input w3-border" type="text" placeholder="Message" required name="message"></textarea>
          <button class="w3-button w3-dark-grey w3-section w3-right" type="submit">SEND</button>
        </form>
      </div>
    </div>
  </div>
  
<!-- End Page Content -->
</div>
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
