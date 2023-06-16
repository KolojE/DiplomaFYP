<?php
include("dbconfig.php");
    ?> 
 
  <html>                        
 <head>
    
 <meta charset="utf-8" />
    <!-- The styles -->

<script src="js/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  


<script src='js/jquery-latest.min.js'></script>

 

<link href="css/jquery.dataTables.min.css" rel="stylesheet">
<script src="js/jquery-3.2.1.min.js"></script>
 <script src="js/jquery.dataTables.min.js "></script>
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
 

	
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
	
});



	</script>


   


</head>
 <body  onload="button();">
  
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
    <ul class="nav navbar-nav">
   <li class="active"><a href="tblcontent.php" class="reveal"><span class="glyphicon glyphicon-home"></span> User Information</a></li>
	  <li><a href="LeaveRecord.php" class="reveal"><span class="fa fa-list-alt"></span> User Leave Record</a></li>
	  <li><a href="calendar.php" class="reveal"><span class="fa fa-calendar"></span> Leave Calendar</a></li>
   <li><a href="ApproveList.php" class="reveal" <?php if($_COOKIE['cooType'] <> "HR") echo  'style="display:none;"';?>><span class="fa fa-list-alt"></span> Leave Approval</a></li>
  <li><a href="form.php" class="reveal" <?php if($_COOKIE['cooType'] <> "Staff") echo  'style="display:none;"';?>><span class="fa fa-wpforms"></span> Leave Application Form </a></li>
    <li><a href="form2.php" class="reveal"<?php if($_COOKIE['cooType'] <> "Staff") echo  'style="display:none;"';?>><span class="fa fa-calculator "></span> Allowance Claim Form </a></li>
	   <li><a href="ApproveAll.php" class="reveal" <?php if($_COOKIE['cooType'] <> "HR") echo  'style="display:none;"';?>><span class="fa fa-table"></span> Allowance Approval</a></li>
	    <li><a href="ApproveUser.php" class="reveal" <?php if($_COOKIE['cooType'] <> "HR") echo  'style="display:none;"';?>><span class="fa fa-user-circle-o"></span> Register/Delete User</a></li>
  <li><a href="Clocking page.php" class="reveal" <?php if($_COOKIE['cooType'] <> "Staff") echo  'style="display:none;"';?>><span class="fa fa-briefcase"></span>Clocking</a></li>
	    <li><a href="Clocking History.php" class="reveal"><span class="fa fa-briefcase" ></span> Clocking History</a></li>
       <li><a href="RunPayroll.php" class="reveal" <?php if($_COOKIE['cooType'] <> "HR") echo  'style="display:none;"';?>><span class="fa fa-briefcase"></span>Run PayRoll</a></li>
        </ul>
    
    
   
    <ul class="nav navbar-nav navbar-right">
        <li><a> <?php echo date('D d M Y');?> <span id='timer' ></span></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span><?php echo $_COOKIE['cooStdId'];?>  <?php echo urldecode($_COOKIE['cooName']);?> <span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
    </ul>
  </div>
</nav>

    



    <!-- topbar starts -->
    
    <!-- topbar ends -->

        <!--/span-->
        <!-- left menu ends -->


    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Employee List(Run PayRoll)</h2>

        <div class="box-icon">
            
          
         
        </div>
    </div>
    <div class="box-content">
	
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="myTable">
    <thead>
    <tr>
	
	<th>Payslip ID</th>
      <th>Allowance</th>
     <th>Name</th>
	<th>Salary</th>
	<th>Penatly</th>
   <th>EPF</th>
   <th>Net</th>
   <th>Total_Pay</th>
   <th>User_ID</th>

	
    </tr>
    </thead>
    <tbody>
	<?php 
	 	$sql = "SELECT * FROM payslip,user inner join user on payslip.User_ID = user.User_ID";
     $result=mysqli_query($db, $sql);


	while($row=mysqli_fetch_assoc($result)){
		  ?>
		  <tr>
	    
        <td class ="center"><?php echo $row['PaySlip_ID'];?> </td>
		     <td class ="center"><?php echo $row['User_name'];?> </td>
        <td class="center"><?php echo $row['Allowance'];?> </td>
        <td class="center"><?php echo $row['Salary'];?> </td>
	    <td class="center"><?php echo $row['Penatly'];?> </td>
		        <td class="center"><?php echo $row['EPF'];?> </td>
	    <td class="center"><?php echo $row['Net Income'];?> </td>
		<td class="center"><?php echo $row['Total_Pay'];?> </td>
			<td class="center"><?php echo $row['User_ID'];?> </td>
			
      
	
	
		
	
    </tr>
	
	<?php
	}
	?>		  
		</tbody>	
	


   
 

   
   </table>
</div><!--/.fluid-container-->
</div>
</div>
</div>
