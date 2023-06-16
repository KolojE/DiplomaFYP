<?php
    include("dbconfig.php"); 

			session_start();

?>
<!DOCTYPE html>

<html lang="en">
<head>
  <title>Claim Application Form</title>
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

$(function() { 
        $('#contact_form').submit(function(e) { 
            e.preventDefault();
            $.ajax({
                type        : 'POST',
                url         : 'updateapp.php',
                data        : $(this).serialize(),
                success     : function(data){
		                 swal('Submitted!', 'Your claim has been succesfully submitted!', 'success');
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
	
        <h3 class="panel-title text-center">Allowance Claim Form</h3>
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
               <input  name="Designation" placeholder="Employee Designation" class="form-control"readonly  value="<?php echo  $_SESSION["Class"];?>"type="text">
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
               <input  name="Department" placeholder="Employee Department" class="form-control" readonly value="<?php echo  $_SESSION["EmpEmail"];?>" type="text" required>
                </div>
				</div>
                <div class="form-group-top">
                  <label class="control-label col-sm-2" for="sd">Contact:</label>
                  <div class="col-sm-4">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>
             <input  name="Department" placeholder="Employee Department" class="form-control" readonly value="<?php echo  $_SESSION["EmpContact"];?>" type="text" required>
                  </div>
                </div>
              </div>
            </div>

          </div>
          </div>
<br/>
          <div class="form-group">
            <label class="control-label col-sm-3" style=" text-align:right;">Claim Type:</label>
            <div class="col-sm-6 ">
			 <div class="input-group">
			<span class="input-group-addon"><i class="fa fa-telegram"></i></span>
              <select  required class="form-control "  name="Claim" id="Leavetype">
                <option  disabled="" selected=""  >Select Claim Type</option>
                <option value="Petrol">Petrol</option>
			    <option value="Meal">Meal</option>
				 <option value="Phone">Phone</option>
                <option  value="Parking">Parking</option>
							
              </select>
            </div>
          </div>
		  </div>

        
          <div class="form-group">
            <label class="control-label col-sm-3" style="text-align:right;">Date:</label>
            <div class="col-sm-6">
              <div class="input-group date">
                
                <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
				   
				<input type="Date" id="date" class="form-control" name="Date" placeholder="YYYY-MM-DD">
              </div>
            </div>
          </div>

         


              <div class="form-group">
			  <label class="control-label col-sm-3"  style="text-align:right;">Amount:</label>
            <div class="col-sm-6">
              <div class="input-group date">
                
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
				   
				<input name="Amounts" placeholder="123456" type="text" class="form-control">
              </div>
            </div>
          </div>
		  <div class="form-group">
            <label class="control-label col-sm-3"  style="text-align:right;">Remark:</label>
            <div class="col-sm-8">
              <div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                <input type="text" id="remark" name="remark" class="form-control" placeholder="Remark" >
		         </div>
            </div>
          </div>
		           <div class="form-group">
         <label class="col-md-4 control-label"></label>
           <div class="col-md-4">
           <button type="submit" id="submit"  class="btn btn-warning" >Submit <span class="fa fa-send"></span></button>
		   <button type="reset" id="clear" class="btn btn-primary" value="reset" >Clear <span class="fa fa-eraser"></span></button>
          </div>
       </div>
			  
</div>
        	    
          
	
                <input type="hidden" id="remarks" name="remark"class="form-control" placeholder="If there's no remark please press spacebar on this field" >

		        
       
 
		  
          <div class="form-group">
     
            <div class="col-sm-8">
              <div class="input-group">
		
              </div>
            </div>
          </div>
 </fieldset>
     
        </form>
		
      </div>
    </div>
  </div>
</div>
</div>
<script>
var Today = new Date();
var dd= Today.getDate();
var mm = Today.getMonth()+1;
var yy=Today.getFullYear();

var todayDate = yy+'-'+mm+'-'+dd;

document.getElementById("Fromdate").setAttribute("min",todayDate);	

function SetValidDate()
{
	var selectedFromDate = document.getElementById("Fromdate").value;
	document.getElementById("Todate").setAttribute("min",selectedFromDate);
}
</script>
     <script>

$('#Leavetype').on('change', function () {
    $('#submit').prop('disabled', !$(this).val());
}).trigger('change');
 
	</script>







</body>
</html>