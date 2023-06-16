<?php
session_start();

 include("dbconfig.php");
if (isset($_POST['userid']) || isset($_POST['RefNo'])) {
 $refno=$_POST['RefNo'];
$user=$_POST['userid'];
  
    $row = mysqli_fetch_assoc(mysqli_query($db,"Select LeaveType,Leave_days from leaveapplication where Employee_No=$user and LogID =$refno"));
    $LeaveType = $row['LeaveType'];
	$days = $row['Leave_days'];
	if($LeaveType=='AL')
	{
		mysqli_query($db,"Update leaveavailable Set AnnualLeave = (AnnualLeave + $days) Where (Employee_ID=$user)");
	}
	  else if($Leave == 'ML')
	    mysqli_query($db,"Update leaveavailable Set MedicalLeave = (MedicalLeave + $days) Where (Employee_ID=$user)");
     else if($Leave =='UL')
	     mysqli_query($db,"Update leaveavailable Set UnpaidLeave = (UnpaidLeave + $days) Where (Employee_ID=$user)");
	 
    mysqli_query($db,"UPDATE leaveapplication SET Status = 'Rejected' Where Employee_No=$user and LogID =$refno");
    
 }


 ?>
 
 	<?php 
 
 	include("dbconfig.php");
	 if (isset($_POST['EmployeeNo']) || isset($_POST['RfNo']) || isset($_POST['Leave']) || isset($_POST['Days']) ) {
 $refno=$_POST['RfNo'];
$No=$_POST['EmployeeNo'];
$leave=$_POST['Leave'];
$days =$_POST['Days'];

	 
mysqli_query($db,"Update leaveapplication Set Status ='Approved' Where (LogID ='$refno') and (Employee_No='$No')") ;
 }?>
 <?php   
if(isset($_POST['Employeename'])){
	
$Name= $_POST['Employeename'];
$EmpID = $_POST['EmployeeID'];
$claim=$_POST['Claim'];
$date=$_POST['Date'];
$EmpNo = $_SESSION["EmpNo"];
$amount=$_POST['Amounts'];
$remarks=$_POST['remark'];
   
	

   mysqli_query($db,"INSERT INTO claimapplication( Employee_No, Claim_Type, Claim_Amounts, Status, Date, Remark) VALUES ('$EmpNo','$claim', '$amount','Pending','$date','$remarks' )");	
}?>  
