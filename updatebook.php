<?php
   include("dbconfig.php");

if(isset($_POST['Employeename'])){
		$Name=$_POST['Employeename'];
       $EmpID = $_POST['EmployeeID'];
       $Leave=$_POST['Leave'];
	  $date1=$_POST['Date1'];
   $date2=$_POST['Date2'];
   $days=$_POST['days'];
   $remarks=$_POST['remark'];
   
 echo $Name;
 echo $Leave;
	

   mysqli_query($db,"INSERT INTO leaverecords(User_ID,Name,LeaveType,Leave_days,Status,From_Date,To_Date)VALUES(' $EmpID','$Name','$Leave',$days,'Pending','$date1','$date2' )");
 
  
	

}  ?>	
 <?php 
 
 	include("dbconfig.php");
	 if (isset($_POST['username']) || isset($_POST['RfNo']) || isset($_POST['Leave']) ) {
 $refno=$_POST['RfNo'];
$user=$_POST['username'];
$leaves=$_POST['Leave'];
	mysqli_query($db,"Update leaverecords Set Status ='Approved' Where (LogID ='$refno') and (User_ID='$user')") ;
    
	
    
	
 }?>