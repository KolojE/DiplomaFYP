<?php
include("dbconfig.php");

session_start();
    ?> 
 
  <html>                        
 <head>
    
 <meta charset="utf-8" />
    <!-- The styles -->

<script src="js/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  
<link href="css/jquery.dataTables.min.css" rel="stylesheet">

<script src='js/jquery-latest.min.js'></script>

 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script src="js/jquery-3.2.1.min.js"></script>
 <script src="js/jquery.dataTables.min.js "></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
	
	button.btn{ position:absolute;
	bottom:10px;
	left:380px;



	text-align:center;
	}

</style>

	
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
	
});



	</script>


   


</head>
 <body  >
   
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
        <h2><i class="glyphicon glyphicon-user"></i> Delete User Account</h2>
		
 <td class="center">
                                  <a class="btn btn-primary"  href="FormSign.php" >
                <i class="glyphicon glyphicon-user icon-white"></i>
                Create User
            </a>
		                   </td>
       
    </div>
    <div class="box-content">
    <div class="alert alert-info">Please Click "Delete" Button to Delete the Employee </div>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="myTable">
    <thead>
    <tr>

	<th>Employee ID</th>
      <th>Name</th>
    
	<th>Email</th>
	<th>Company</th>
   <th>Contact</th>
   <th>Position</th>
   <th>Manager Level</th>
	<th>Salary</th>
	<th>Pay Frequency</th>
		<th>Action</th>
    </tr>
    </thead>
    <tbody>
	<?php 
	$compid= $_SESSION["CompanyId"];
	$EmpNo = $_SESSION["EmpNo"];
	 	$sql = "SELECT employee.PayFrequency,employee.Employee_No,employee.Employee_ID,employee.Employee_Name,employee.Employee_Contact_Num,employee.Employee_Email,employee.Position,employee.Basic_Salary,company.Company_Name FROM employee,staff,company where staff.Employee_No = Employee.Employee_No and company.Company_Id = $compid and employee.Employee_No!= $EmpNo
UNION
SELECT employee.PayFrequency,employee.Employee_No,employee.Employee_ID,employee.Employee_Name,employee.Employee_Contact_Num,employee.Employee_Email,employee.Position,employee.Basic_Salary,company.Company_Name FROM employee,manager,company where manager.Employee_No = Employee.Employee_No and company.Company_Id = $compid and employee.Employee_No !=$EmpNo";
     $result=mysqli_query($db, $sql);
//Gets the number of rows in a result;
$rowcount=mysqli_num_rows($result);
//Fetches all result rows as an associative array;

	while($row = mysqli_fetch_assoc($result)){
		
		$employeeNo = $row['Employee_No'];
		$Sql = "SELECT * from manager where Employee_No =$employeeNo";
		$Result =mysqli_query($db,$Sql);
		if(mysqli_num_rows($Result)>=1)
		{
			$ManagerLevel = "Yes";
		}
		$Sql = "SELECT * from staff where Employee_No =$employeeNo";
		$Result =mysqli_query($db,$Sql);
		if(mysqli_num_rows($Result)>=1)
		{
			$ManagerLevel = "No";
			
		}
			
		    echo'<tr>
        <td class ="center">'.$row['Employee_ID'].' </td>
        <td class="center">'.$row['Employee_Name'].'</td>
        <td class="center">'.$row['Employee_Email'].'</td>
        <td class="center">'.$row['Company_Name'].'</td>
	    <td class="center">'.$row['Employee_Contact_Num'].'</td>
		<td class="center">'.$row['Position'].'</td>
		<td class="center">'.$ManagerLevel.'</td>
		<td class="center">'.$row['Basic_Salary'].'</td>
		<td class="center">'.$row['PayFrequency'].'</td>
			        <td class="center">
                                  <a class="btn btn-danger" data-toggle="modal"   onClick="deletei(\'' .$row['Employee_ID']. '\',\''.$row['Employee_No'].'\')" href="javascript:void(0)" >
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
		                   </td>
	
    </tr>';
	}?>		  
			
	  
 

   
   </table>
</div><!--/.fluid-container-->
</div>
</div>
</div>




</body>
</html>


</script>


  


<script>

 




function deletei($EmpID,$EmpNo){
			
			var EmpID = $EmpID;
			var EmpNo = $EmpNo;
			SwalDelete(EmpID,EmpNo);
			
		
	}
	
		

function SwalDelete(EmpID,EmpNo){
		 
  swal({
    title: 'Are you sure?',
    text: 'You won\'t be able to revert this Action !',
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
      url: "updateall.php",
      data: {EmployeeID: EmpID, EmployeeNo: EmpNo},
	  success: function(data){
		    swal('Deleted!','Employee '+EmpID+ ' has been Removed!', 'success'); 
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
  
 
	</script>      



</body>
              
</html>
