<?php
include("dbconfig.php");
SESSION_START();
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



    <!-- topbar starts -->
    
    <!-- topbar ends -->

        <!--/span-->
        <!-- left menu ends -->


    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Approve Leave Application</h2>

        <div class="box-icon">
            
          
         
        </div>
    </div>
    <div class="box-content">
    <div class="alert alert-info">Please Click "Approve" Button to approve the Application </div>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="myTable">
    <thead>
    <tr>
	 <th>LogID</th>
	<th>UserID</th>
      <th>Name</th>
      <th>Leave Type</th>
	<th>Leave Days</th>
	   <th>Status</th>
	<th>From Date</th>
   <th>To Date</th>
	<th>Remark</th>
	<th>Action</th>
    </tr>
    </thead>
    <tbody>
	<?php 
	$compid = $_SESSION["CompanyId"];
	 	$sql = "SELECT * FROM leaveapplication inner join employee on employee.Employee_No = leaveapplication.Employee_No where leaveapplication.Status = 'Pending' and employee.Company_id = $compid";
     $result=mysqli_query($db, $sql);


	while($row=mysqli_fetch_assoc($result)){
		  ?>
		  <tr>
	  <td class ="center"><?php echo $row['LogID'];?> </td>
        <td class ="center"><?php echo $row['Employee_ID'];?> </td>
        <td class="center"><?php echo $row['Employee_Name'];?> </td>
        <td class="center"><?php echo $row['LeaveType'];?> </td>
		     <td class="center"><?php echo $row['Leave_days'];?> </td>
        <td class="center">
            <span class="label-warning label label-default" id="status"><?php echo $row['Status'];?> </span>
        </td>
	    <td class="center"><?php echo $row['From_Date'];?></td>
		<td class="center"><?php echo $row['To_Date'];?></td>
		<td class="center"><?php echo $row['Remark'];?></td>
			        <td class="center">
                      <a class="btn btn-info" id="button" data-toggle="modal" onClick="approvei('<?php echo $row['LogID'];?>','<?php echo $row['Employee_No'];?>','<?php echo $row['LeaveType']?>','<?php echo $row['Leave_days']?>')" href="javascript:void(0)">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Approve
            </a>
            <button class="btn btn-danger" data-toggle="modal"   onClick="deletei('<?php echo $row['LogID'];?>','<?php echo $row['Employee_No'];?>')" href="javascript:void(0)" >
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Cancel
            </button>
		                   </td>
	
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










<script>

function approvei($refnos,$users,$leave,$days){
			
			var refId = $refnos;
			var userId = $users;
			var leave = $leave;
			var days = $days;
			SwalApprove(refId,userId,leave,days);
			
		
	}
	
		

function SwalApprove(refId,userId,leave,days){
		 
  swal({
    title: 'Approve Application',
    text: 'Are you really want to approve this application ?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Approve',
	  cancelButtonText: 'cancel',
 preConfirm: function() {
	 return new Promise(function(resolve) {  
    $.ajax ({
      type: "POST",
      url: "updateapp.php",
      data: {RfNo: refId, EmployeeNo: userId, Leave: leave,Days:days},
	  success: function(data){
		    swal('Approved!','' +refId+' has been succesfully approve!', 'success'); 
			var tbl = document.getElementById("myTable");
        for (var i=0; i < tbl.rows.length; i++) {
            var trs = tbl.getElementsByTagName("tr")[i];
             var cellVal=trs.cells[0].innerHTML;
           location.reload();
           }
                    },

					});
					 
					  
  });
},
});

} 

function deletei($refnos,$Employee){
			
			var refId = $refnos;
			var userId = $Employee;
			SwalDelete(refId,userId);
			e.preventDefault();
		
	}
	
		

function SwalDelete(refId,userId){
		 
  swal({
    title: 'Are you sure?',
    text: 'You won\'t be able to revert this Application !',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes',
	  cancelButtonText: 'No',
 preConfirm: function() {
	 return new Promise(function(resolve) {  
    $.ajax ({
      type: "POST",
      url: "updateapp.php",
      data: {RefNo: refId, userid: userId},
	  success: function(data){
		    swal('Application has been REJECTED!'); 
			var tbl = document.getElementById("myTable");
           for (var i=0; i < tbl.rows.length; i++) {
            var trs = tbl.getElementsByTagName("tr")[i];
             var cellVal=trs.cells[0].innerHTML;           				  
             location.reload();
			  			   
			   
           }
                    },
fail: function()
{
	alert("Somthing went wrong!");
	
},
					});
					  
  });
},
});
 
} 
 
	

	</script>      



</body>
              
</html>
