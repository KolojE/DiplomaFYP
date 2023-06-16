<?php
include('dbconfig.php');
?>

<?php
session_start();
$EmpNo = $_SESSION['EmpNo'];
$id = $_SESSION["CompanyId"];

	 if($_SESSION["Class"]=="Manager")
$sql = "SELECT * FROM payslip inner join employee on payslip.Employee_No = employee.Employee_No WHERE employee.Company_Id = $id  ";
     else if($_SESSION["Class"]=="Staff")
$sql = "SELECT * FROM payslip inner join employee on payslip.Employee_No = employee.Employee_No WHERE employee.Employee_No = $EmpNo ";
 $result = mysqli_query($db,$sql);



?>


  <script src="js/jquery-1.11.2.min.js"></script>

	    <script type="text/javascript" src="libs/js-xlsx/xlsx.core.min.js"></script>
  <script type="text/javascript" src="libs/FileSaver/FileSaver.min.js"></script>

  <script type="text/javascript" src="libs/jsPDF/jspdf.min.js"></script>
  <script type="text/javascript" src="libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
  <script type="text/javascript" src="libs/html2canvas/html2canvas.min.js"></script>
  <script type="text/javascript" src="libs/tableExport.js"></script>
    
 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src='js/jquery-latest.min.js'></script>
<script src="js/jquery-3.5.1.min.js"></script>
 <script src="js/jquery.dataTables.min.js "></script>

   <link href="css/pace-theme-barber-shop.css" rel="stylesheet" />
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/default.css" type="text/css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">


	<script type="text/javascript">
	
   function DoOnCellHtmlData(cell, row, col, data) {
      var result = "";
      if (data != "") {
        var html = $.parseHTML( data );

        $.each( html, function() {
          if ( typeof $(this).html() === 'undefined' )
            result += $(this).text();
          else if ( $(this).is("input") )
            result += $('#'+$(this).attr('id')).val();
          else if ( $(this).is("select") )
            result += $('#'+$(this).attr('id')+" option:selected").text();
          else if ( $(this).hasClass('no_export') !== true )
            result += $(this).html();
        });
      }
      return result;
    }

    function DoOnMsoNumberFormat(cell, row, col) {
      var result = "";
      if (row > 0 && col == 0)
        result = "\\@";
      return result;
    }


  </script>
	
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
.filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
</style>
<html>                        
 <head>
    
 
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
<div class="container">
   
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">PaySlip (Approved)</h3>
				
        
								
 
  </div>
            
         
			
           <table class="table table-striped" id="leave">
                <thead>
				<tr>
				<th>LogID</th>
				<th>StaffID</th>
                <th>StaffName</th>
				<th>Salary</th>
				<th>Allowance</th>
				<th>EPF</th>
				<th>Penalty</th>
				<th>Pay</th>

                 </tr>				 
                </thead>
                <tbody>
                  	
		     <?php while($row=mysqli_fetch_assoc($result))
	 {
	
 	        echo '<tr>'; 
			  echo '<td>'.$row['PaySlip_ID'].'</td>';
			  echo '<td>'.$row['Employee_ID'].'</td>';
			echo '<td>'.$row['Employee_Name'].'</td>';
		    echo '<td>'.$row['Claim'].'</td>';
			echo '<td>'.$row['Salary'].'</td>';
			echo '<td>'.$row['Penatly'].'</td>';
			echo '<td>'.$row['EPF'].'</td>';
			echo '<td>'.$row['Net_Income'].'</td>';
		
		   
		
			
					  

                  
	  
          
			
			
			}			?>  
			
                   
               </tbody>
            </table>
        </div>
    </div>
</div>
<script>
/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/

</script>
</html>