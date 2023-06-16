<?php 
	include('dbconfig.php');
	session_start();
	if(isset($_POST['EmployeeName'])){
		$EmployeeName=$_POST['EmployeeName'];
		$email=$_POST['email'];
	    $password=$_POST['password'];
		$Position=$_POST['Position'];
		$Contact=$_POST['contact'];
	    $EmployeeID=$_POST['EmployeeID'];
		$Manager=$_POST['ManagerLevel'];
		$Company = $_SESSION["CompanyId"];
		$Socso=$_POST['Socso'];
		$EPF=$_POST['EPF'];
	    $PF =$_POST['PayFrequency'];
		$Salary =$_POST['Salary'];
		
	 
	  


   
	
if($Manager == "Yes" )
{ 
	 mysqli_query($db,"INSERT INTO employee(Employee_Email, Employee_ID, Employee_Name, Employee_Pass, PayFrequency, Basic_Salary, Employee_EPF_No, Employee_Socso_No, Company_id, Employee_Contact_Num, Position) VALUES ('$email', '$EmployeeID','$EmployeeName','$password','$PF','$Salary','$EPF','$Socso','$Company','$Contact','$Position')");
	$ID=mysqli_insert_id($db);
	 mysqli_query($db,"INSERT INTO manager(Employee_No) VALUES ('$ID')");
}
else
{
	mysqli_query($db,"INSERT INTO employee(Employee_Email, Employee_ID, Employee_Name, Employee_Pass, PayFrequency, Basic_Salary, Employee_EPF_No, Employee_Socso_No, Company_id, Employee_Contact_Num, Position) VALUES ('$email', '$EmployeeID','$EmployeeName','$password','$PF','$Salary','$EPF','$Socso','$Company','$Contact','$Position')");
	$ID = mysqli_insert_id($db);
	 mysqli_query($db,"INSERT INTO leaveavailable(Employee_ID) VALUES ('$ID')");
	 mysqli_query($db,"INSERT INTO staff(Employee_No) VALUES ('$ID')");
}
}

		   	
?>
<?php 
	include('dbconfig.php');
	if(isset($_POST['annuals'])){
		$EmployeeNo=$_POST['EmpNo'];
		$Salary=$_POST['annuals'];
	    $Claim=$_POST['superr'];
		$EPF=$_POST['epff'];
		$Penalty=$_POST['pty'];
	    $NetIncome=$_POST['netss'];
		$TotalIncome=$_POST['payy'];
		$Employee_ID=$_POST['usidd'];
	echo $EmployeeNo;

		mysqli_query($db,"INSERT INTO payslip(Claim,Salary,Penatly,EPF,Net_Income,Total_Pay,Employee_No) VALUES ('$Claim','$Salary','$Penalty','$EPF','$NetIncome','$TotalIncome','$EmployeeNo')");

		   	}
?>
