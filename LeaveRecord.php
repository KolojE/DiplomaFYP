<?php
include("dbconfig.php");

 session_start();

 
 
  ?> 
  

<!DOCTYPE html>
<html>
<head>
<title>Leave Inquiry</title>
 <script src="pace.min.js"></script>
 <link href="css/pace-theme-barber-shop.css" rel="stylesheet" />
 <link rel="short icon" href="favicon.ico" />
 	<script src="js/bootstrap.min.js"></script>

    <script src="js/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  <script src="js/core.js"></script>

	<script src="js/jquery-1.4.1.min.js"></script>
    
	  <link rel="stylesheet" href="css/default.css" type="text/css">
	  <link href="css/pace-theme-barber-shop.css" rel="stylesheet" />
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
 
<script type="text/javascript">   
$(document).ready(function()
{
	$(".area").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "updateleave.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".slct2").html(html);
			} 
		});
	});
	

	
});

		
 
  </script>
<style>
 .modalDialog {
		position: fixed;
		font-family: Arial, Helvetica, sans-serif;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background: rgba(0,0,0,0.8);
		z-index: 99999;
		opacity:0;
		-webkit-transition: opacity 400ms ease-in;
		-moz-transition: opacity 400ms ease-in;
		transition: opacity 400ms ease-in;
		pointer-events: none;
	}

	.modalDialog:target {
		opacity:1;
		pointer-events: auto;
	}

	.modalDialog > div {
		width: 800px;
		position: relative;
		margin: 10% auto;
		padding: 5px 20px 13px 20px;
		border-radius: 10px;
		background: #fff;
		background: -moz-linear-gradient(#fff, #999);
		background: -webkit-linear-gradient(#fff, #999);
		background: -o-linear-gradient(#fff, #999);
	}

	.close {
		background: #606061;
		color: #FFFFFF;
		line-height: 25px;
		position: absolute;
		right: -12px;
		text-align: center;
		top: -10px;
		width: 24px;
		text-decoration: none;
		font-weight: bold;
		-webkit-border-radius: 12px;
		-moz-border-radius: 12px;
		border-radius: 12px;
		-moz-box-shadow: 1px 1px 3px #000;
		-webkit-box-shadow: 1px 1px 3px #000;
		box-shadow: 1px 1px 3px #000;
	}

	.close:hover { background: #00d9ff; }
	



	text-align:center;
	}

  div {
    position: relative;
  }
  header {
    padding: 4px;
    border-bottom: 2px solid #aaa;
      background-color: #CCCCCC;
	
  }
  h3 {
    margin: 0 !important;
	  font-weight: bold;
  }



</style>


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
<div>
  <header>
    <h3>Leave Record</h3>
  </header>
  <content select="p"></content>
  
</div>

<form action="" method="POST">

<div class="form">
 </div>
<div class="result">
		<table id ="myTable" cellspacing="1" cellpadding="3" border="0">
		<thead>
			<tr>
				<th>LogID</th>
				<th>UserID</th>
                <th>Name</th>
               <th>Leave Type</th>
		        <th>Leave Days</th>
				<th>From Date</th>
		       <th>To Date</th>
		      <th>Status</th>
			   <th>Remark</th>
    										
			</tr>
			</thead>
			<tbody>
		
		 <?php 
		 $CompID = $_SESSION["CompanyId"];
		 	$No = $_SESSION["EmpNo"];
			if ($_SESSION["Class"]=="Manager"){
			$sql ="SELECT * FROM leaveapplication inner join employee on employee.Employee_No = leaveapplication.Employee_No where employee.Company_id = $CompID ";
		}else if($_SESSION["Class"]=="Staff")
		{
		
	 	$sql = "SELECT * FROM leaveapplication inner join employee on employee.Employee_No = leaveapplication.Employee_No where leaveapplication.Employee_No=$No and employee.Company_id = $CompID ";
		}
     $result=mysqli_query($db, $sql);
//Gets the number of rows in a result;
$count=mysqli_num_rows($result);
//Fetches all result rows as an associative array;
while($row=mysqli_fetch_assoc($result))
{
 	        echo '<tr>'; 
		    echo '<td>'.$row['LogID'].'</td>';
			echo '<td>'.$row['Employee_ID'].'</td>';
			echo '<td>'.$row['Employee_Name'].'</td>';
			echo '<td>'.$row['LeaveType'].'</td>';
			echo '<td>'.$row['Leave_days'].'</td>';
			echo '<td>'.$row['From_Date'].'</td>';
			echo '<td>'.$row['To_Date'].'</td>';
			echo '<td id="status">'.$row['Status'].'</td>';
			echo '<td>'.$row['Remark'].'</td>';
			          echo'</tr>'; 
					
			
                  
		 }
           ?> 
	        
	        </tbody>
		</table>
		
</div>
</form>   
 <div class ="results"></div>



</body>
<script>
 



function myFunction() {
    var x = document.getElementById('myTable');
 
        x.style.display = 'none';
    
}	



</script>






  <script src="js/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" href="css/jqueryui.css">

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
	
</html>
