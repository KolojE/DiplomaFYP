  <?php
   include('dbconfig.php');
    session_start();
  
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
            $myusername = mysqli_real_escape_string($db,$_POST['name']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "select * from students where student_id= '$myusername' and Student_Pass ='$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
                 
         header("location: main.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>