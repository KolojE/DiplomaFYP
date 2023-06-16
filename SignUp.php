  <?php
   include('dbconfig.php');
   
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
				<form class="login100-form validate-form"  method="post">
				
                    <span class="login100-form-title p-b-34 p-t-27" style="font-size:20px;height:10px;" >
						Sign Up as an Employer
					</span> 
				
                    <span class="login100-form-title p-b-34 p-t-27" style="font-size:15px;height:10px;" >
						Your Comapny Details
					</span> 
					<div class="wrap-input100 validate-input" data-validate = "Comapny Name" >
						<input class="input100" type="text" name="CompanyName" placeholder="Company Name" required />
						<span class="focus-input100" ></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="text" name="CompanySSM" placeholder="Company SSM No" id="password" required />
						<span class="focus-input100"></span>
					</div>
					
					<span class="login100-form-title p-b-34 p-t-27" style="font-size:15px;height:10px;" >
						Your Personal Details
					</span> 

<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="Name" placeholder="Name" required />
						<span class="focus-input100" ></span>
					</div>

				<div class="wrap-input100 validate-input">
						<input class="input100" type="Email" name="Email" placeholder="Email" id="email" required />
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" name="Password" placeholder="Password" id="password" required />
						<span class="focus-input100"></span>
					</div>
		
		<div class="wrap-input100 validate-input">
						<input class="input100" name="ContactNum" placeholder="Contact Number" id="ContactNum"  required />
						<span class="focus-input100"></span>
					</div>


				
<div style="display:inline-block;width:100%;">
				
					<div class="container-login100-form-btn" style="display:inline-block;width:100px;margin-left:250px;">
						<button class="login100-form-btn" type="submit" name="submit" >Sign up</button>
					</div>
					

</div>
				</form>	
			
			</div>
		</div>
	</div>
	


<?php 

if(isset($_POST['submit'])){
	
	$CompanyName = $_POST['CompanyName'];
	$CompanySSM = $_POST['CompanySSM'];
	$EmployerName = $_POST['Name'];
	$EmployerEmail =$_POST['Email'];
	$EmployerPassword = $_POST['Password'];
	$EmployerContactNumber = $_POST['ContactNum'];
	
	
	$result=mysqli_query($db,"SELECT Employee_Email FROM employee where Employee_Email = '$EmployerEmail'");
    $count = mysqli_num_rows($result);
if($count>=1)
{
	
	echo "<script>alert('The entered email address is in used by other account pls try another email..')</script>";
}
else {
	$query=mysqli_query($db,"INSERT INTO employee(Employee_Email, Employee_Name, Employee_Pass, Employee_Contact_Num, Position) VALUES ('$EmployerEmail','$EmployerName','$EmployerPassword','$EmployerContactNumber', 'Employer' ) ");
	$EmpNo = mysqli_insert_id($db);
	$query=mysqli_query($db,"INSERT INTO company(Company_Name,Company_SSM_No,Employer_No) VALUES ('$CompanyName','$CompanySSM','$EmpNo')");
    $CompanyID = mysqli_insert_id($db);
	mysqli_query($db,"update employee set Company_id = $CompanyID where Employee_No = $EmpNo");
	mysqli_query($db,"INSERT INTO Manager(Employee_No)values($EmpNo)");
	if($query)
	{
		echo "<script>alert('Registration Complete!');</script>";
        echo "<script>window.href.location='index.php'</script>";
	}
	else {
		echo mysqli_error($db);
		echo "sohai bu neng la ni";
}
}
}

?>
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
