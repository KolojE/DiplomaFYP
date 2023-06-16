<?php
    include("dbconfig.php"); 

	session_Start();	
 $id =  $_SESSION['CompanyId'];
    $sql = "select* from company where Company_ID = $id";

    $row = mysqli_fetch_assoc(mysqli_query($db,$sql));
	
    $CompanyName= $row['Company_Name'];

?>
<!DOCTYPE html>

<html lang="en">
<head>
  <title>Allowance Claim Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<script src="js/jquery2.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 	<script
		src="https://code.jquery.com/jquery-3.4.1.js"
		integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
		crossorigin="anonymous"></script>
	<script>
		function SubForm (){
			$.ajax({
				url:"https://api.apispreadsheets.com/data/1853/",
				type:"post",
				data:$("#contact_form").serializeArray(),
				success: function(){
				
				},
				error: function(){
					
				}
			});
		}
	</script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="font-awesome/css/font-awesome.css">

 <script src="js/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  <script src="js/core.js"></script>
   <link href="css/pace-theme-barber-shop.css" rel="stylesheet" />
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/default.css" type="text/css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
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
                url         : 'add.php',
                data        : $(this).serialize(),
                success     : function(data){
		                 swal('Submitted!', 'Your registeration has been succesfully submitted!\n An email has been sent to the email!', 'success');
				 },
            })
          document.getElementById("contact_form").reset();
        
		
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
	
        <h3 class="panel-title text-center">Employee Registeration </h3>
      </div>
      <div class="panel-body">

     <form onsubmit="SubForm()" class="well form-horizontal" method="POST"  id="contact_form" >
	 <fieldset>

          <div class="form-group has-clear">
            <label class="control-label col-sm-3" for="eid">Employee ID:</label>
            <div class="col-sm-5">
              <div class="input-group">
              
			   <span class="input-group-addon"><i class="fa fa-user"></i></span>

               <input  name="EmployeeID" placeholder="Employee ID" class="form-control"  type="text" required>
			 
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
               <input type="text" name="EmployeeName" placeholder="Employee Name" class="form-control"   required>
                </div>
                </div>
                <div class="form-group-top">


                  <label class="control-label col-sm-2" for="designation">Password:</label>
                  <div class="col-sm-4">
                   <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
               <input  name="password" placeholder="Default Password" class="form-control"   type="password" required>
                </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="department">Position:</label>
                <div class="col-sm-4">
				 <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-inbox"></i></span>
               <input  name="Position" placeholder="Employee Position" class="form-control" type="text" required>
                </div>
				</div>
                <div class="form-group-top">
                  <label class="control-label col-sm-2" for="sd" >Company:</label>
                  <div class="col-sm-4">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <input disabled class="form-control " name="Comp" id="Branch"  value ="<?php echo $CompanyName;?>" required>
                
                
            
                  </div>
                </div>
              </div>
            </div>
			    <div class="form-group">
                <label class="control-label col-sm-2" for="department">Email:</label>
                <div class="col-sm-4">
				 <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
               <input  name="email" placeholder="Employee Department" class="form-control" type="email" type="text" required>
                </div>
				</div>
                <div class="form-group-top">
                  <label class="control-label col-sm-2" for="sd">Phone Number:</label>
                  <div class="col-sm-4">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>
                <input class="form-control " name="contact" id="Branch"  type ="number" required  >
                
                
    
                  </div>
                </div>
              </div>
            </div>
  <div class="form-group">
                <label class="control-label col-sm-2" for="Socs">Socso No:</label>
                <div class="col-sm-4">
				 <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
               <input  name="Socso" placeholder="Employee Department" class="form-control" type="text" required>
                </div>
				</div>
                <div class="form-group-top">
                  <label class="control-label col-sm-2" for="EPF">EPF No:</label>
                  <div class="col-sm-4">
                  <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>
                <input class="form-control " name="EPF" id="EPF"  type="text" required  >
                
                
    
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>

              <div class="form-group">
</div>

          <div class="form-group">
            <label class="control-label col-sm-3" style=" text-align:right;">Manager Level:</label>
            <div class="col-sm-6 ">
			 <div class="input-group">
			<span class="input-group-addon"><i class="fa fa-telegram"></i></span>
              <select  required class="form-control "  name="ManagerLevel" id="ManagerLevel">
                 <option selected disabled></option>
                <option  id="Yes" value="Yes" >Yes</option>
			    <option id="No" value="No">No</option>
			
							
              </select>
            </div>
          </div>
		  </div>
		   <div class="form-group">
			  <label class="control-label col-sm-3"  style="text-align:right;">Pay Frequncy:</label>
            <div class="col-sm-6">
              <div class="input-group date">
                
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
				   
				 <select  required class="form-control "  name="PayFrequency">
            
                <option  selected value="PFHourly" id="PFHourly" >Hourly</option>
			    <option id="PFDaily" value="PFDaily">Daily</option>
				<option id="PFMonthly" value="PFMonthly">Monthly</option>
			
							
              </select>
              </div>
            </div>
          </div>
      
              <div class="form-group">
			  <label class="control-label col-sm-3"  style="text-align:right;">Salary:</label>
            <div class="col-sm-6">
              <div class="input-group date">
                
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
				   
				<input min="0" name="Salary" placeholder="123456" type="number" class="form-control">
              </div>
            </div>
          </div>
		
		           <div class="form-group">
         <label class="col-md-4 control-label"></label>
           <div class="col-md-4">
           <button   type="submit" id="submit"  class="btn btn-warning" >Submit <span class="fa fa-send"></span></button>
		   <button type="reset" id="clear" class="btn btn-primary" value="reset" >Clear <span class="fa fa-eraser"></span></button>
          </div>
       </div>
			  
</div>
        	    
          
	       
 
		  
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


	</script>







</body>
</html>