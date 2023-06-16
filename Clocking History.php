<?php


include "dbconfig.php";
session_start();
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>History</title>
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXiS6gTpZYH0uJ7GnCsHN9wG1mNE_gASY&callback=myMap"></script>


 
<style>
#Clocking-Table {display:block;margin:80px; auto;width:90%;overflow-y:auto;height:550px;}
#Clocking-Table th,td{width:600px;height:20px;padding:15px;}
#Clocking-Table th{position: sticky; top: 0; background-color:grey;border-top:none;}

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

<table id="Clocking-Table" border="1">
<caption style="font-size:20px;font-weight:bold;text-align:left;background-color:grey;"><?php echo "Company : ".$_SESSION["CompanyName"] ?></caption>
<tr style="position:sticky;"><th>Employee ID</th><th>Name</th><th>Clocked In Time</th><th>Clocked Out Time</th><th>Location</th><tr/>
<?php  

$Compid=$_SESSION["CompanyId"];
$EmployeeNo = $_SESSION["EmpNo"];
if($_SESSION["Class"]=="Staff")
{
$SQL = "Select * from clocking INNER JOIN employee on clocking.Employee_No = employee.Employee_NO where clocking.Employee_No = $EmployeeNo";
$result = mysqli_query($db,$SQL);


}

else if($_SESSION["Class"]=="Manager")
{
$SQL = "Select* from clocking INNER JOIN employee on clocking.Employee_No = employee.Employee_No where employee.Company_Id = $Compid";
}

$result = mysqli_query($db,$SQL);
while($row=mysqli_fetch_assoc($result))
{ ?>

<tr>
<td><?php echo $row["Employee_ID"];?></td>
<td><?php echo $row["Employee_Name"];?></td>
<td><?php echo $row["Clock_Date"]." ".$row["Clock_IN_Time"];?></td>
<td><?php echo $row["Clock_Date"]." ".$row["Clock_OUT_Time"];?></td>
<td><a title="Click here to check the location clocked-in" href="CheckLocation.php?lat=<?php echo $row["LocationLatitude"]."&long=".$row["LocationLongitude"]."&No=".$row["Employee_No"]."&ClockInTime=".$row["Clock_IN_Time"]."&ClockOutTime=".$row["Clock_OUT_Time"]."&ClockDate=".$row["Clock_Date"];?>">Click here</a></td>
</tr>
<?php
}
?>

</table>



    
</body>
</html>