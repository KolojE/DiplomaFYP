<?php



include "dbconfig.php";
session_start();
$EmpNo=$_SESSION['EmpNo'];
 
 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Clocking</title>
  <meta charset="utf-8">
	<script src="js/jquery-1.4.1.min.js"></script>
<script src="js/jquery2.1.1.min.js"></script>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

<link rel="stylesheet" href="font-awesome/css/font-awesome.css"/>

 <link rel="stylesheet" href="css/default.css" type="text/css"/>
 <link rel="stylesheet" href="css/ClockCss.css" type="text/css"/>

<link rel="stylesheet" href="font-awesome/css/font-awesome.css"/>
 <link href="css/pace-theme-barber-shop.css" rel="stylesheet" />
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXiS6gTpZYH0uJ7GnCsHN9wG1mNE_gASY"></script>
<script>
function showPosition() {
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showMap, showError);
    } else {
        alert("Sorry, your browser does not support HTML5 geolocation.");
    }
}
 
// Define callback function for successful attempt
function showMap(position) {
    // Get location data
    lat = position.coords.latitude;
    long = position.coords.longitude;
    var latlong = new google.maps.LatLng(lat, long);
    
    var myOptions = {
        center: latlong,
        zoom: 16,
        mapTypeControl: true,
        navigationControlOptions: {
            style:google.maps.NavigationControlStyle.SMALL
        }
    }
    
    var map = new google.maps.Map(document.getElementById("embedMap"), myOptions);
    var marker = new google.maps.Marker({ position:latlong, map:map, title:"You are here!" });
}
 
// Define callback function for failed attempt
function showError(error) {
    if(error.code == 1) {
        result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
    } else if(error.code == 2) {
        result.innerHTML = "The network is down or the positioning service can't be reached.";
    } else if(error.code == 3) {
        result.innerHTML = "The attempt timed out before it could get the location data.";
    } else {
        result.innerHTML = "Geolocation failed due to unknown error.";
    }
}
</script>

<script type="text/javascript">
  
        setInterval(function() {
            var currentTime = new Date ( );    
            var currentHours = currentTime.getHours ( );   
            var currentMinutes = currentTime.getMinutes ( );   
            var currentSeconds = currentTime.getSeconds ( );
            currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;   
            currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;    
            var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";    
            currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;    
            currentHours = ( currentHours == 0 ) ? 12 : currentHours;    
            var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
            if (document.getElementById("timer") != null) {
                document.getElementById("timer").innerHTML = currentTimeString;
            }
			if (document.getElementById("timer-digital") != null) {
                document.getElementById("timer-digital").innerHTML = currentTimeString;
            }
const secondHand = document.querySelector('.second-hand');
const minsHand = document.querySelector('.min-hand');
const hourHand = document.querySelector('.hour-hand');


  const now = new Date();

  const seconds = now.getSeconds();
  const secondsDegrees = ((seconds / 60) * 360) + 90;
  secondHand.style.transform = `rotate(${secondsDegrees}deg)`;

  const mins = now.getMinutes();
  const minsDegrees = ((mins / 60) * 360) + ((seconds/60)*6) + 90;
  minsHand.style.transform = `rotate(${minsDegrees}deg)`;

  const hour = now.getHours();
  const hourDegrees = ((hour / 12) * 360) + ((mins/60)*30) + 90;
  hourHand.style.transform = `rotate(${hourDegrees}deg)`;


        }, 1000);
		
		
</script>
 

</head>
<body>
      
     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
    <ul class="nav navbar-nav">
   <li class="active"><a href="tblcontent.php" class="reveal"><span class="glyphicon glyphicon-home" style="display:inline-block; padding-right:5px;" ></span>DashBoard</a></li>
	  
	
	  <li><a href="ApproveUser.php" class="reveal"  <?php if($_SESSION['Class']== 'Staff') echo  'style="display:none;"';?>><span  class="fa fa-users"style="display:inline-block; padding-right:5px;"></span>Employee</a></li>
	    <li><a href="calendar.php" class="reveal"  <?php if($_SESSION['Class']== 'Staff') echo  'style="display:none;"';?>><span class="fa fa-calendar" style="display:inline-block; padding-right:5px;"></span>Calendar</a></li>
	  <li><a href="LeaveRecord.php" class="reveal"><span class="fa fa-list-alt" style="display:inline-block; padding-right:5px;"></span>Leave Record</a></li>
   <li><a href="ApproveList.php" class="reveal" <?php if($_SESSION['Class']== 'Staff') echo  'style="display:none;"';?>><span style="display:inline-block; padding-right:5px;" class="fa fa-list-alt"></span> Leave </a></li>
  <li><a href="form.php" class="reveal" <?php if($_SESSION['Class']== 'Manager') echo  'style="display:none;"';?>><span style="display:inline-block; padding-right:5px;" class="fa fa-wpforms"></span> Leave </a></li>
    <li><a href="form2.php" class="reveal"<?php if($_SESSION["Class"]== "Manager") echo  'style="display:none;"';?>><span style="display:inline-block; padding-right:5px;" class="fa fa-calculator "></span>Claim </a></li>
	   <li><a href="ApproveAll.php" class="reveal" <?php if($_SESSION["Class"]== "Staff") echo  'style="display:none;"';?>><span style="display:inline-block; padding-right:5px;" class="fa fa-table"></span> Claim </a></li>
	   <li><a href="Clocking History.php" class="reveal"><span class="fa fa-briefcase" style="display:inline-block; padding-right:5px;" ></span>Clocking History</a></li>
	    <li><a href="Clocking page.php" class="reveal" <?php  if($_SESSION["Class"]== "Manager")  echo  'style="display:none;"'  ?>><span style="display:inline-block; padding-right:5px;" style="display:inline-block; padding-right:5px;" class="fa fa-briefcase" ></span> Clocking </a></li>
		<li><a href="RunPayroll.php" class="reveal"<?php if($_SESSION["Class"]== "Staff")echo  'style="display:none;"';?>><span style="display:inline-block; padding-right:5px;" class="fa  fa-money"></span>RunPayroll</a></li>
		 <li ><a href="report.php" class="reveal"><span style="display:inline-block; padding-right:5px;" class="fa  fa-money "></span>PaySlip</a></li>

        </ul>
      </li>
    
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a> <?php echo date('D d M Y');?> <span id='timer' ></span></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["EmpID"];?>  <?php echo  $_SESSION["EmpName"]?> <span class="glyphicon glyphicon-log-in" style="display:inline-block; padding-right:5px;"></span>Logout</a></li>
    </ul>
  </div>
</nav>
<div class="clock">
  <div class="outer-clock-face">
    <div class="marking marking-one"></div>
    <div class="marking marking-two"></div>
    <div class="marking marking-three"></div>
    <div class="marking marking-four"></div>
    <div class="inner-clock-face">
      <div class="hand hour-hand"></div>
      <div class="hand min-hand"></div>
      <div class="hand second-hand"></div>
    </div>
  </div>
</div>
<div class="clock-digital">

<span style="font-weight:bold;">Time : </span> <span style="font-weight:bold;" id='timer-digital' ></span> <br/><span style="font-weight:bold;">Date : <?php echo date('D d M Y');?></span>

</div>
<form method="post"><div style="display:block;text-align:center;height:0px;width:100%; "><button type="submit" onclick="clockIn();" id="ClockIn"  name="ClockInBtn" class="ClockingBtn">Clock In</button><button  type="submit" id="ClockOut" name="ClockOutBtn" class="ClockingBtn">Clock Out</button><button title="Check Your Current Location" type="button" onclick="showPosition()" style="margin:0px 0px 100px 0px;"><i class="fa fa-map-marker" aria-hidden="true"></i></button></div></form>
<div id="embedMap" style="width: 200px; height: 200px;display:inline-block;">
        <!--Google map will be embedded here-->
</div>




    

	
<?php
if(isset($_POST['ClockInBtn']))
{
	
 $result = mysqli_query($db,"Select Clock_OUT_Time,Clock_Date FROM clocking where Clock_Date = CURRENT_DATE and Clock_OUT_Time is null and Employee_No='$EmpNo' ");
 $count =  mysqli_num_rows($result);
if($count == 0)
	 { 
 ?>
   <script>

if (navigator.geolocation) {
var Emp_No = '<?php echo $EmpNo; ?>';
    navigator.geolocation.getCurrentPosition(function(position) {

        $.ajax({
            url: 'http://localhost/mmu/SaveLocation.PHP',
            data: {
                'lat': position.coords.latitude,
                'lng': position.coords.longitude,
				'EmpNo':Emp_No
            },
            type: 'POST',
        success:function() {
			alert("Clock In Sucessed");
		},
		 fail: function(){
		 alert('failed to clock in..Please try again');
		 },
		 async: false,

        });

        // Use the 2 lines below to center your map on user location (you need a map instance at this point)
        userLoc = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        map.panTo(userLoc);
    });
}

    </script>
<?php
}
else {
	?>

 <script> alert('You have already Clock-In Today plesase Clock-out before you can process to clock-in');</script>
 
<?php 
}
}
 ?>


	<?php
	
	if(isset($_POST['ClockOutBtn']))
	{  
		$result = mysqli_query($db,"Select Clock_IN_Time,Clock_Date FROM clocking where Clock_Date = CURRENT_DATE and Clock_OUT_Time is null ");
        $count =  mysqli_num_rows($result);
		if($count!=0)
		{
		$SQL = "update clocking set Clock_OUT_Time = CURRENT_TIME where Clock_Date = CURRENT_DATE and Clock_OUT_Time is null and Employee_No='$EmpNo'";
		mysqli_query($db,$SQL);
		?><script>alert("Clocked-Out!");</script>
		<?php }
		else 
		{
			?>
			<script>alert("Please Clock-In before you process Clock-out.");</script>
			<?php
		}
	}
	?>
</body>
</html>