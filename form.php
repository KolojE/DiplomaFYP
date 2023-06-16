	<?php
    include("dbconfig.php");
	
session_start();
			

?>
<!DOCTYPE html>

<html lang="en">
<head>
  <title>Leave Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<script src="js/jquery2.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="font-awesome/css/font-awesome.css">

 <script src="js/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  <script src="js/core.js"></script>
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
var Difference_In_Days;
function OnDateChange()
{ Difference_In_Days=0
	var FromDate = document.getElementById('date').value;
	document.getElementById('date1').setAttribute("min",FromDate);	
	GetDays();
}
</script>
<script>

function GetDays()
{
	
	var FromDate = new Date(document.getElementById('date').value);
	var ToDate = new Date(document.getElementById('date1').value);
	var Difference_In_Time =   ToDate.getTime()-FromDate.getTime(); 
	Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

	CheckLeftLeave(Difference_In_Days+1);
	}
</script>



<script>
	
function CheckLeftLeave(Days)
{  

 var type = document.getElementById('Leavetype').value;

	
	<?php
	$empNo = $_SESSION['EmpNo'];
     $SQL = "Select* from leaveavailable where Employee_ID = $empNo";
	
     $row = mysqli_fetch_assoc(mysqli_query($db,$SQL));
	 $Annual_Leave = $row['AnnualLeave'];
	 $Medical_Leave = $row['MedicalLeave'];
	 $Unpaid_Leave = $row['UnpaidLeave'];

	?>
var DaysLeftForAL='<?php echo  $Annual_Leave; ?>';
var DaysLeftForML='<?php echo  $Medical_Leave; ?>';
var DaysLeftForUL='<?php echo  $Unpaid_Leave; ?>';

if(Days>DaysLeftForAL&&type=="AL")
{
	alert("You are not allowed to take more than "+DaysLeftForAL+" days for Annual Leave");
	document.getElementById('date1').value = document.getElementById('date').value;
}
else if(Days>DaysLeftForML&&type=="ML")
{
	alert("You are not allowed to take more than "+DaysLeftForML+" days for Medical Leave");
	document.getElementById('date1').value = document.getElementById('date').value;
}
else if(Days>DaysLeftForUL&&type=="UL")
{
	
	
	alert("You are not allowed to take more than "+DaysLeftForUL+" days for Unpaid Leave");
	document.getElementById('date1').value = document.getElementById('date').value;
}

	
}

</script>

<script>

$(function() { 
        $('#contact_form').submit(function(e) { 
            e.preventDefault();
            $.ajax({
                type        : 'POST',
                url         : 'UpdateLeaveRecord.php',
                data        : $(this).serialize()+"&days="+(Difference_In_Days+1),
				          
                success     : function(data){
		                 swal('Submitted!', 'Your Leave Application has been succesfully submitted!', 'success');
						
				 },
            })
          document.getElementById("contact_form").reset();
		   $("button[type=submit]").prop("disabled", true);
		
        });
    }); 

	
           

</script>
<style>

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
<div class="container">

  <div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">

        <h3 class="panel-title text-center">Leave Form</h3>
      </div>
      <div class="panel-body">

     <form class="well form-horizontal" method="POST" id="contact_form">
	 <fieldset>

          <div class="form-group has-clear">
            <label class="control-label col-sm-3" for="eid">Employee ID:</label>
            <div class="col-sm-5">
              <div class="input-group">
              
			   <span class="input-group-addon"><i class="fa fa-user"></i></span>

               <input  name="EmployeeID" placeholder="Employee ID" class="form-control"  readonly value="<?php echo $_SESSION["EmpID"];?>" type="text">
			 
                </div>
            </div>
			
          </div>

          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title text-center">Employee Information <span class=" fa fa-user" aria-hidden="true"></span> </h3> 
            </div>
            <div class="panel-body ">

              <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-4">
				<div class="input-group">
               <span class="input-group-addon"><i class="fa fa-user"></i></span>
               <input type="text" name="Employeename" placeholder="Employee Name" class="form-control" readonly  value="<?php echo $_SESSION["EmpName"];?>">
                </div>
                </div>
                <div class="form-group-top">


                  <label class="control-label col-sm-2" for="designation">Designation:</label>
                  <div class="col-sm-4">
                   <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
               <input  name="Designation"  class="form-control"readonly  value="<?php echo $_SESSION["Class"];?>"type="text">
                </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="department">Position:</label>
                <div class="col-sm-4">
				 <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-inbox"></i></span>
               <input  name="Department" placeholder="Employee Department" class="form-control" readonly value="<?php echo $_SESSION["EmpPosition"];?>" type="text" required>
                </div>
				</div>
                 <div class="form-group-top">
                  <label class="control-label col-sm-2" for="sd">Company:</label>
                  <div class="col-sm-4">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-building"></i></span>
            
                <input  name="Department" placeholder="Employee Department" class="form-control" readonly value="<?php echo $_SESSION["CompanyName"];?>" type="text" required>
                
        
                  </div>
                </div>
              </div>
            </div>
			    <div class="form-group">
                <label class="control-label col-sm-2" for="department">Email:</label>
                <div class="col-sm-4">
				 <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
               <input  name="Department" placeholder="Employee Department" class="form-control" readonly value="<?php echo $_SESSION["EmpEmail"];?>" type="text" required>
                </div>
				</div>
                <div class="form-group-top">
                  <label class="control-label col-sm-2" for="sd">Contact:</label>
                  <div class="col-sm-4">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>
               
            
                  <input  name="Department" placeholder="Employee Department" class="form-control" readonly value="<?php echo $_SESSION["EmpContact"];?>" type="text" required>
          
                  </div>
                </div>
              </div>
            </div>

          </div>
          </div>

              <div class="form-group">
</div>

          <div class="form-group">
            <label class="control-label col-sm-3" style=" text-align:right;">Leave Type:</label>
            <div class="col-sm-6 ">
			 <div class="input-group">
			<span class="input-group-addon"><i class="fa fa-telegram"></i></span>
              <select  required class="form-control "  name="Leave" id="Leavetype">
                <option  disabled="" selected="" >Select Leave Type</option>
                <option   value="AL" >Annual Leave</option>
			    <option   value="ML" >Medical Leave</option>
                <option  value= "UL" >Unpaid Leave</option>
           </select>
            </div>
          </div>
		  </div>

          <div class="form-group">
            <label class="control-label col-sm-3"  style="text-align:right;">From Date:</label>
            <div class="col-sm-6">
              <div class="input-group date" >
               
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				 <input type="Date" class="form-control" id="date"  name="FromDate" required  placeholder="YYYY-MM-DD" onchange="OnDateChange();"/>
				</span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" id="date-picker" required style="text-align:right;">To Date:</label>
            <div class="col-sm-6">
              <div class="input-group date">
                
                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
				   
				<input type="Date" id="date1" class="form-control" name="ToDate" placeholder="YYYY-MM-DD" onchange="OnDateChange();"/>
              </div>
            </div>
          </div>

         


              <div class="form-group">
			  
</div>
          <div class="form-group">
            <label class="control-label col-sm-3"  style="text-align:right;">Remark:</label>
            <div class="col-sm-8">
              <div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input type="text" id="remark" name="remark" class="form-control" placeholder="Remark"/>
		         </div>
            </div>
          </div>
		  
		
     
           
          
	
                
				 <input type="hidden" id="remark1" name="days"class="form-control" placeholder="If there's no remark please press spacebar on this field" >
		        
           
 
		  
          <div class="form-group">
     
            <div class="col-sm-8">
              <div class="input-group">
		
              </div>
            </div>
          </div>
 </fieldset>
          <div class="form-group">
         <label class="col-md-4 control-label"></label>
           <div class="col-md-4">
           <button type="submit" name="LeaveSubmit" id="submit"  class="btn btn-warning" >Submit <span class="fa fa-send"></span></button>
		   <button type="reset" id="clear" class="btn btn-primary" value="reset" >Clear <span class="fa fa-eraser"></span></button>
          </div>
       </div>
        </form>
       
		
      </div>
    </div>
  </div>
</div>
</div>
<script>//set from Date Minimum
var Today = new Date();
var dd= Today.getDate();
var mm = Today.getMonth()+1;
var yy=Today.getFullYear();

var todayDate = yy+'-'+mm+'-'+dd;

document.getElementById("date").setAttribute("min",todayDate);	
document.getElementById("date1").setAttribute("min",todayDate);
	</script>
     <script>

$('#Leavetype').on('change', function () {
    $('#submit').prop('disabled', !$(this).val());
}).trigger('change');
 
	</script>







</body>
</html>