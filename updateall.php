 <?php 
 
 	include("dbconfig.php");
	 if (isset($_POST['username']) || isset($_POST['RfNo']) ) {
 $refno=$_POST['RfNo'];
$user=$_POST['username'];
	mysqli_query($db,"Update claimapplication Set Status ='Approved' Where (CA_ID ='$refno') and (Employee_No='$user')") ;
    
	
    
	
 }?>
 
 <?php
 include("dbconfig.php");
if (isset($_POST['userid']) || isset($_POST['RefNos'])) {
 $refno=$_POST['RefNos'];
$user=$_POST['userid'];
  
    mysqli_query($db,"Delete FROM claimapplication Where (Employee_No ='$user') and (CA_ID ='$refno')");
    
 }


 ?> 
 <?php
 include("dbconfig.php");
if (isset($_POST['EmployeeID']) || isset($_POST['EmployeeNo'])) {
 $EmpID=$_POST['EmployeeID'];
$EmpNo=$_POST['EmployeeNo'];

  
    mysqli_query($db,"Delete FROM employee Where Employee_ID = $EmpID and Employee_No = $EmpNo");
    
 }


 ?>