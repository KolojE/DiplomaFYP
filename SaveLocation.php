<?php

include("dbconfig.php");

$EmpNo= $_POST['EmpNo'];
$latitude = $_POST['lat'];
$longitude = $_POST['lng'];

 $SQL = "INSERT INTO clocking (Clock_IN_Time,Clock_Date,LocationLatitude,LocationLongitude,Employee_No) values (CURRENT_TIME,CURRENT_DATE,'$latitude','$longitude','$EmpNo')";
 mysqli_query($db,$SQL);


?>