  <?php
   include('dbconfig.php');
    session_start();
  
   if(isset($_POST['submit'])) {
      // username and password sent from form 
      $UserEmail=$_POST['Email'];
      $Password=$_POST['Password'];
      
      $sql = "select * from employee where Employee_Email= '$UserEmail' and Employee_Pass ='$Password'";
      $result = mysqli_query($db,$sql);
       $count = mysqli_num_rows($result);
       $row = mysqli_fetch_array($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {

 $_SESSION["EmpNo"] = $row["Employee_No"];
 $_SESSION["EmpName"] = $row["Employee_Name"];
 $_SESSION["EmpID"] = $row["Employee_ID"];
 $_SESSION["EmpName"] = $row["Employee_Name"];
 $_SESSION["EmpPass"]=$row["Employee_Pass"];
 $_SESSION["EmpEmail"]=$row["Employee_Email"];
 $_SESSION["PayFrequency"]=$row["PayFrequency"];
 $_SESSION["BSalary"] = $row["Basic_Salary"];
 $_SESSION["EmpEPFNo"]=$row["Employee_EPF_No"];
 $_SESSION["EmpSocsoNo"]=$row["Employee_Socso_No"];
 $_SESSION["EmpContact"]=$row["Employee_Contact_Num"];
 $_SESSION["EmpPosition"]=$row["Position"];
 $_SESSION["CompanyId"]=$row["Company_id"];
 
 $EmpNo = $_SESSION["EmpNo"];
$sql = "select * from employee,manager where manager.Employee_No = employee.Employee_No and employee.Employee_No = $EmpNo  ";
$result = mysqli_query($db,$sql);
$count = mysqli_num_rows($result);
if($count ==1)
{ 
$_SESSION["Class"] = "Manager";

}
else
{
	$_SESSION["Class"] = "Staff";     
 }  
		 
		   header("location: tblcontent.php");
       }
       
      else {
         $error = "Your Login Name or Password is invalid";
      }
   }  
$sql = "select * from employee inner join company on company.Company_ID	= employee.Company_ID";
$result = mysqli_query($db,$sql);
 $row = mysqli_fetch_array($result);
$_SESSION["CompanyName"]=$row["Company_Name"];  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Leave Form Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-logo" >
					 <img src="img/mmu.png" class="img-responsive" alt="" width="120" height="120"/>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Payroll System 
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="Email" name="Email" placeholder="Enter Email" >
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="Password" placeholder="Enter password" id="password" >
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					
<div style="display:inline-block;width:100%;">
					<div class="container-login100-form-btn" style="display:inline-block;width:100px;float:left;margin-left:30px;">
						<button class="login100-form-btn" type="submit" name="submit" value="Login">
							Login
						</button>
					</div>
					<div class="container-login100-form-btn" style="display:inline-block;width:100px;margin-left:100px;">
						
						<a href="SignUp.php" class="login100-form-btn" >	Sign up</a>
						
					</div>

</div>
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
 <script type="text/javascript" color="255,0,0" pointColor="255,0,0" opacity='0.7' zIndex="-2" count="100" src="dist/canvas-nest.js"></script>
   <script type="text/javascript" src="dist/canvas-nest.umd.js"></script>
</body>
</html>
