<?php
include("dbconfig.php");
SESSION_START();


       $EmpNo = $_SESSION['EmpNo'];
       $Leave=$_POST['Leave'];
	  $date1=$_POST['FromDate'];
   $date2=$_POST['ToDate'];
   $days=$_POST['days'];
   $remarks=$_POST['remark'];
   
	if($Leave == 'AL')
        mysqli_query($db,"Update leaveavailable Set AnnualLeave = (AnnualLeave - $days) Where (Employee_ID=$EmpNo)");
   else if($Leave == 'ML')
	    mysqli_query($db,"Update leaveavailable Set MedicalLeave = (MedicalLeave - $days) Where (Employee_ID=$EmpNo)");
     else if($Leave =='UL')
	     mysqli_query($db,"Update leaveavailable Set UnpaidLeave = (UnpaidLeave - $days) Where (Employee_ID=$EmpNo)");
	 
   mysqli_query($db,"INSERT INTO leaveapplication(Employee_No,LeaveType,Leave_days,Status,From_Date,To_Date,Remark) VALUES ('$EmpNo','$Leave','$days','Pending','$date1','$date2','$remarks' )");
 
  
	

 ?>	
