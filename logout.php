<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
setcookie("cooFullName", "", time() - 3600 , "/");
setcookie("cooStaffName", "", time()- 3600, "/");
setcookie("cooStaffId", "", time()- 3600, "/");
setcookie( "cooBranch", "",time()- 3600 , "/" ) ;
setcookie( "cooDept1",  "",time()- 3600  , "/") ;
setcookie( "cooDept",  "",time()- 3600  , "/") ;
setcookie( "cooPosition","",time()- 3600 , "/") ;
setcookie( "cooBranch1","",time()- 3600 , "/") ;
setcookie( "cooAreaCode","",time()- 3600 , "/") ;
setcookie( "cooEmpCat","",time()- 3600 , "/") ;
setcookie( "cooDateIn","",time()- 3600 , "/") ;

header("Location: index.php"); // Redirecting To Home Page
}
?>

