<!doctype html>
<?php 
 include("dbconfig.php");

 session_start();
  
 $No= $_GET['id'];
 $SQL = "select * from employee where Employee_No= '$No'";
 $result = mysqli_query($db,$SQL);
 
 
 $SQLClaim = "Select sum(Claim_Amounts) as sum from claimapplication where Employee_No=$No and Status = 'Approved'";
 $resultClaim = mysqli_query($db,$SQLClaim);
 $ClaimRow = mysqli_fetch_assoc($resultClaim);
 $RowCount = mysqli_num_rows($resultClaim);
 if($RowCount>1)
 $ClaimSum = $ClaimRow["sum"];
else
	$ClaimSum=0;
?>
<html>                        
 <head>
    
 <meta charset="utf-8" />
    <!-- The styles -->

<script src="js/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  
<link href="css/jquery.dataTables.min.css" rel="stylesheet">



 


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src='js/jquery-latest.min.js'></script>
<script src="js/jquery-3.5.1.min.js"></script>
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
var id = '<?php echo $No;?>'
$(function() { 

     $('#payForm').submit(function(e) {
		 alert("id");
            e.preventDefault();
            $.ajax({
                type        : 'POST',
                url         : 'add.php',
                data        : $(this).serialize() +'&EmpNo='+id,
				
                success     : function(data){
		                 swal('Submitted!', 'Your payslip has been succesfully submitted!', 'success');
						
				 },
			
            })
          document.getElementById("payForm").reset();
		   $("button[type=submit]").prop("disabled", true);
        });
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
</head>
<body>
  <form name="employeeInfoForm" >
	 <fieldset>	
	 <?php while($row=mysqli_fetch_assoc($result))
	 {
		 ?>
		<td> Employee ID 
<input type="Text" class="form-control"  id ="userid" name="usrid"  readonly value="<?php echo $row['Employee_ID']?>"/>  
</select >
		</td>
 			
	<br />
		<td> Employee Name
		<input readonly type="text" id="lastname" class="form-control" name="name" value="<?php echo $row['Employee_Name'];?>"/>
		</td>
		<br />
		<td> Salary
		<input  readonly  type="number" id="salary" class="form-control" name="salary" value="<?php echo $row['Basic_Salary'];?>"/>
		</td>
		<br />
		<td>Claim
		<input  readonly  type="number" id="ClaimAmount" class="form-control" name="allowance" value="<?php echo $ClaimSum;?>"/>
		</td>
		<br />
		<td>Penalty
		<input type="number" id="pnty" class="form-control" name="Penalty" value="0"/>
		</td>
	 <?php }?>
		<br />
			 </fieldset>
  </form>
		<button  class="btn btn-primary" onclick="generatePayslip()">Generate Payslip</button>

  
  
  
  <form name="payForm" id="payForm" action="add.php"  method="POST">
  <input readonly type="hidden" id="usid" class="form-control" name="usidd" value=""/>
  <input readonly type="hidden" id="nms" class="form-control" name="namess" value=""/>
  <input readonly type="hidden" id="anll" class="form-control" name="annuals" value=""/>
  <input readonly type="hidden" id="supers" class="form-control" name="superr" value=""/>
  <input readonly type="hidden" id="epfs" class="form-control" name="epff" value=""/>
  <input readonly type="hidden" id="pntyss" class="form-control" name="pty" value=""/>
  <input readonly type="hidden" id="nets" class="form-control" name="netss" value=""/>
  <input readonly type="hidden" id="pays" class="form-control" name="payy" value=""/>
		<table class="table table-striped">
			<tbody>
			<tr>
				<td>Employee ID</td>
			<td id="users" name="userid"  ></td>
			  </tr>
			  <tr>
				<td>Employee Name</td>
			<td id="lastnames"  name="names"></td>
			  </tr>
			  <tr>
				<td>Pay Date</td>
				<td><?php echo date('D d M Y');?></td>
			  </tr>
			  <tr>
				<td>Pay Frequency</td>
				<td>Monthly</td>
			  </tr>		
			 <tr>
				<td>income</td>
				<td id="annual" name="annual" ></td>
			  </tr>		
						  <tr>
						  <tr>
				<td>Claim</td>
				<td id="Claim" name="Claim" ></td>
			  </tr>	
			  <tr>
				<td>EPF</td>
				<td id="epf" name="epf" ></td>
				  </tr>			
				<td>Penalty</td>
				<td id="pntys" name="pntys" ></td>
			  </tr>		
			  <tr>
				<td>Net income</td>
				<td id="net" name="net" ></td>
			  </tr>		
			  	  
			  <tr>
				<td>Pay</td>
				<td id="pay" name="pay"></td>
			  </tr>			
			</tbody>
		</table>
		
		<br>
      <button type="submit" class="btn btn-primary">Pay</button>
  </form>
  
  
  

    <script>

    function generatePayslip(){
	var Claim=0;
	var salary=document.getElementById("salary").value; 
    var penalty=document.getElementById("pnty").value; 	
	var ssid=document.getElementById("userid").value; 
	 document.getElementById("users").innerHTML =ssid ;
	 var name=document.getElementById("lastname").value; 
	 document.getElementById("lastnames").innerHTML =name ;
	  Claim =document.getElementById("ClaimAmount").value;  
	  document.getElementById("Claim").innerHTML = parseFloat(Claim).toFixed(2);

   document.getElementById("pntys").innerHTML = parseFloat(penalty).toFixed(2);
   
   	  var epf = (salary/100)*11;
	
	  var net=0;
	  net = salary;
	  var netss = 0;
	  var nets =0;
	  if(isNaN(Claim)==false){
	  netss = (net + +parseFloat(Claim))-epf;
	  }
       nets= (netss-penalty)
	
	   document.getElementById("annual").innerHTML = parseFloat(salary).toFixed(2);
	  document.getElementById("epf").innerHTML = parseFloat(epf).toFixed(2);
  	  document.getElementById("net").innerHTML =  parseFloat(net).toFixed(2);
  	  document.getElementById("pay").innerHTML =  parseFloat(nets).toFixed(2);
	  document.getElementById("usid").value = ssid;
	   document.getElementById("nms").value = name;
	    document.getElementById("anll").value = salary;
		 document.getElementById("supers").value = Claim;
		  document.getElementById("epfs").value = epf;
		   document.getElementById("pntyss").value = penalty;
		    document.getElementById("nets").value = net;
			 document.getElementById("pays").value = nets;
		
    }
	
	
	
	
    </script>
	
	
</body>
</html>