<?php 
include'dbconfig.php';



$lat = $_GET['lat'];
$long = $_GET['long'];
$No=$_GET['No'];
$ClockIn=$_GET['ClockInTime'];
$ClockOut = $_GET['ClockOutTime'];
$ClockDate = $_GET['ClockDate'];

$row = mysqli_fetch_assoc(mysqli_query($db,"select * from employee where Employee_No = $No"));
$EmpID=$row['Employee_ID'];
$EmpName=$row['Employee_Name'];
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 700px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
    <h3><?php echo "Employee_ID = ".$EmpID." | Employee Name = ".$EmpName."   | Clock-In-Time = ".$ClockIn."   | Clock-Out-Time = ".$ClockOut."   | Clock-Date = ".$ClockDate; ?></h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: <?php echo $lat ?>, lng: <?php echo $long?>};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 17, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXiS6gTpZYH0uJ7GnCsHN9wG1mNE_gASY&callback=initMap">
    </script>
  </body>
</html>