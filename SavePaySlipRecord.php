<?php
include("dbconfig.php");

$allowance=$_POST['Allowance'];
$salary=$_POST['Salary'];
$penalty=$_POST['penalty'];
$net=$_POST['net'];
$nets=$_POST['nets'];
$id=$_POST['User_ID'];
$epf=$_POST['EPF'];

			$SQL = "INSERT INTO `payslip`( `Allowance`, `Salary`, `Penatly`, `EPF`, `Net Income`, `Total_Pay`, `User_ID`) VALUES  ('$allowance','$salary','$penalty','$epf','$net','$nets','$id')";
			
			mysqli_query($db,$SQL);
?>