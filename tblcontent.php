<?php

require_once("dbconfig.php");


 session_start();
 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Leave Information</title>
  <meta charset="utf-8">
	<script src="js/jquery-1.4.1.min.js"></script>
<script src="js/jquery2.1.1.min.js"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
 <link href="css/pace-theme-barber-shop.css" rel="stylesheet" />
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/default.css" type="text/css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">

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
        }, 1000);
</script>
 
<style>
.table-bordered thead tr{background-color: #00FFFF;}
.table-bordered tbody th{background-color: #00FFFF;}

</style>
<script>

function myFunction() {
    var x = document.getElementById('myTable');
 
        x.style.display = 'none';	
    
}	

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
</table>
   <div class= "container">
      </br>
	  </br>
   </div>
<div class ="results"></div>
<div class="container" id="myTable">
<div class="panel-group">
    <div class="panel panel-primary" style="width: 80%;">
      <div class="panel-heading">
        <h3 class="panel-title text-center"><span class="glyphicon glyphicon-user"></span> User Information</h3>
      </div>
   


 <table cellpadding="3" cellspacing="1">
      <?php 
	  
	
            echo '<tr>'; 
 	        echo '<th scope="col">Employee ID :</th>';
 	        echo '<td scope="col">'.  $_SESSION["EmpID"] .'</td>';
 	        echo'</tr>';
            echo '<tr>'; 
 	        echo '<th scope="col">Employee Name :</th>';
 	        echo '<td scope="col">'.$_SESSION["EmpName"].'</td>';
 	        echo'</tr>';
 	        echo '<tr>'; 
 	        echo '<th scope="col">Email :</th>';
 	        echo '<td scope="col">'.$_SESSION["EmpEmail"].'</td>';
 	        echo'</tr>';
 	        echo '<tr>';
			echo '<th scope="col">Company:</th>';
 	        echo '<td scope="col">'.$_SESSION["CompanyName"].'</td>';
 	        echo '<th scope="col">Contact :</th>';
 	        echo '<td scope="col">'. $_SESSION["EmpContact"].'</td>';
 		    echo'</tr>';
			echo'<tr>';
		    echo '<th scope="col">Basic Salary : </th>';
		    echo '<td scope="col">RM '.$_SESSION["BSalary"].'</td>'; 
		    echo '<th scope="col">Class :</th>';
 	        echo '<td scope="col">'.$_SESSION["Class"].'</td>';			
 		    echo'</tr>';
 	   
	    
	$ID = $_SESSION["EmpNo"];
	$sql = "SELECT `Employee_ID`, `AnnualLeave`, `MedicalLeave`, `UnpaidLeave` FROM `leaveavailable` WHERE Employee_ID=$ID ";
	$result=mysqli_query($db, $sql);
	$row = mysqli_fetch_assoc($result);
	if($_SESSION["Class"]=="Staff"){
	        echo '<tr style="border-bottom:2px solid black; display:block; padding-top:20px;">'; 
 	        echo '<th>Leave Available</th>';
 	        echo'</tr>';
	        echo '<tr>'; 
 	        echo '<th scope="col">Annual Leave:</th>';
 	        echo '<td scope="col">'.$row["AnnualLeave"] .'</td>';
 	        echo'</tr>';
            echo '<tr>'; 
 	        echo '<th scope="col">Medical Leave:</th>';
 	        echo '<td scope="col">'.$row["MedicalLeave"].'</td>';
 	        echo'</tr>';
			 echo '<tr>'; 
 	        echo '<th scope="col">Unpaid Leave :</th>';
 	        echo '<td scope="col">'.$row["UnpaidLeave"].'</td>';
 	        echo'</tr>';
	}

		   ?>
<?php

?>
		   
     </table>   

</div>
         	 
  </div>
  </div>
  
  
  </div>

    
	  <script src="js/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" href="css/jqueryui.css">
		<link href="css/lugo.datepicker.css" rel="stylesheet">
<script src="js/jquery-ui.min.js"></script>
<script src="jquery.mtz.monthpicker.js"></script>
<script>

$('#date-picker').monthpicker({pattern: 'yyyy-mm', 
    selectedYear: 2015,
    startYear: 1900,
    finalYear: 2212,});
	var options = {
    selectedYear: 2015,
    startYear: 2008,
    finalYear: 2018,
    openOnFocus: false // Let's now use a button to show the widget
};
</script>
</body>
</html>