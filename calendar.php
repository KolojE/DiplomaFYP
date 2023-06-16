<?php

   include("dbconfig.php");

session_start();
?>


<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<title>Calendar</title>	
<link rel='stylesheet' href='lib/cupertino/jquery-ui.min.css' />
<link href='css/fullcalendar.min.css' rel='stylesheet' />
<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />


<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
 <script src="js/jquery-ui.11.4.min.js"></script>
 <link href="css/pace-theme-barber-shop.css" rel="stylesheet" />
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/default.css" type="text/css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">

<script type="text/javascript">
  
        setInterval(function() {
            var currentTime = new Date ( );    
            var currentHours = currentTime.getHours ( );   
            var currentMinutes = currentTime.getMinutes ( );   
            var currentSeconds = currentTime.getSeconds ( );
            currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;   
            currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;    
            var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";    
            currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;    
            currentHours = ( currentHours == 0 ) ? 12 : currentHours;    
            var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
            if (document.getElementById("timer") != null) {
                document.getElementById("timer").innerHTML = currentTimeString;
            }
        }, 1000);
</script>
 


<style>
 .modalDialog {
		position: fixed;
		font-family: Arial, Helvetica, sans-serif;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background: rgba(0,0,0,0.8);
		z-index: 99999;
		opacity:0;
		-webkit-transition: opacity 400ms ease-in;
		-moz-transition: opacity 400ms ease-in;
		transition: opacity 400ms ease-in;
		pointer-events: none;
	}

	.modalDialog:target {
		opacity:1;
		pointer-events: auto;
	}

	.modalDialog > div {
		width: 800px;
		position: relative;
		margin: 10% auto;
		padding: 5px 20px 13px 20px;
		border-radius: 10px;
		background: #fff;
		background: -moz-linear-gradient(#fff, #999);
		background: -webkit-linear-gradient(#fff, #999);
		background: -o-linear-gradient(#fff, #999);
	}

	.close {
		background: #606061;
		color: #FFFFFF;
		line-height: 25px;
		position: absolute;
		right: -12px;
		text-align: center;
		top: -10px;
		width: 24px;
		text-decoration: none;
		font-weight: bold;
		-webkit-border-radius: 12px;
		-moz-border-radius: 12px;
		border-radius: 12px;
		-moz-box-shadow: 1px 1px 3px #000;
		-webkit-box-shadow: 1px 1px 3px #000;
		box-shadow: 1px 1px 3px #000;
	}

	.close:hover { background: #00d9ff; }
	



	text-align:center;
	}

  div {
    position: relative;
  }
  header {
    padding: 4px;
    border-bottom: 2px solid #aaa;
      background-color: #CCCCCC;
	
  }
  h3 {
    margin: 0 !important;
	  font-weight: bold;


</style>

   
 </head>
 <body>
   
     <nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
    <ul class="nav navbar-nav">
   <li class="active"><a href="tblcontent.php" class="reveal"><span class="glyphicon glyphicon-home" style="display:inline-block; padding-right:5px;" ></span>DashBoard</a></li>
	  
	
	  <li><a href="ApproveUser.php" class="reveal"  <?php if($_SESSION['Class']== 'Staff') echo  'style="display:none;"';?>><span  class="fa fa-users"style="display:inline-block; padding-right:5px;"></span>Employee</a></li>
	    <li><a href="calendar.php" class="reveal"  <?php if($_SESSION['Class']== 'Staff') echo  'style="display:none;"';?>><span class="fa fa-calendar" style="display:inline-block; padding-right:5px;"></span>Calendar</a></li>
	  <li><a href="LeaveRecord.php" class="reveal"><span class="fa fa-list-alt" style="display:inline-block; padding-right:5px;"></span>Leave Record</a></li>
   <li><a href="ApproveList.php" class="reveal" <?php if($_SESSION['Class']== 'Staff') echo  'style="display:none;"';?>><span style="display:inline-block; padding-right:5px;" class="fa fa-list-alt"></span> Leave </a></li>
  <li><a href="form.php" class="reveal" <?php if($_SESSION['Class']== 'Manager') echo  'style="display:none;"';?>><span style="display:inline-block; padding-right:5px;" class="fa fa-wpforms"></span> Leave </a></li>
    <li><a href="form2.php" class="reveal"<?php if($_SESSION["Class"]== "Manager") echo  'style="display:none;"';?>><span style="display:inline-block; padding-right:5px;" class="fa fa-calculator "></span>Claim </a></li>
	   <li><a href="ApproveAll.php" class="reveal" <?php if($_SESSION["Class"]== "Staff") echo  'style="display:none;"';?>><span style="display:inline-block; padding-right:5px;" class="fa fa-table"></span> Claim </a></li>
	   <li><a href="Clocking History.php" class="reveal"><span class="fa fa-briefcase" style="display:inline-block; padding-right:5px;" ></span>Clocking History</a></li>
	    <li><a href="Clocking page.php" class="reveal" <?php  if($_SESSION["Class"]== "Manager")  echo  'style="display:none;"'  ?>><span style="display:inline-block; padding-right:5px;" style="display:inline-block; padding-right:5px;" class="fa fa-briefcase" ></span> Clocking </a></li>
		<li><a href="RunPayroll.php" class="reveal"<?php if($_SESSION["Class"]== "Staff")echo  'style="display:none;"';?>><span style="display:inline-block; padding-right:5px;" class="fa  fa-money"></span>RunPayroll</a></li>
		 <li ><a href="report.php" class="reveal"><span style="display:inline-block; padding-right:5px;" class="fa  fa-money "></span>PaySlip</a></li>

        </ul>
      </li>
    
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a> <?php echo date('D d M Y');?> <span id='timer' ></span></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["EmpID"];?>  <?php echo  $_SESSION["EmpName"]?> <span class="glyphicon glyphicon-log-in" style="display:inline-block; padding-right:5px;"></span>Logout</a></li>
    </ul>
  </div>
</nav>
   <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3>Leave Date Calendar View</h3>

					 <div class='results'></div>
             <div id='calendar'></div>
		
            </div>
        </div>
    </div>

   <div id="eventContent" title="Event Details" style="display:none;">
   
    Employee ID: <span id="eventInfo"></span><br>
    Name: <span id="remark"></span><br>
    <HR style=" border-top: 1px solid grey;;">
	Leave Date: <span id="StartTimes"></span><br>
	From Date: <span id="startTime"></span><br>
	Return Date: <span id="endTime"></span><br>
  
</div>
       
    </div>
<script>
 
	$(document).ready(function() {
    $('#calendar').fullCalendar({
		
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listWeek'
        },
      
		eventRender: function (event, element) {
			if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        element.attr('href', 'javascript:void(0);');
        element.click(function() {
            $("#startTime").html(moment(event.start).format('MMM Do'));
            $("#endTime").html(moment(event.end).format('MMM Do '));
			$("#StartTimes").html(event.description1);
		    $("#EndTimes").html(event.description2);
            $("#eventInfo").html(event.description);
			$("#remark").html(event.description3);
             $("#eventLink").attr('href', event.url);
             $("#eventContent").dialog({
                        modal: true,
                        title: event.title
                    });
                    return false;
        });
    },
	theme:true,
	eventLimit: true,
        events: [
		<?php 
	 $CompID = $_SESSION["CompanyId"];
		 	$No = $_SESSION["EmpNo"];
		if ($_SESSION["Class"]=="Manager"){
			$sql = "SELECT * FROM leaveapplication inner join employee on employee.Employee_No = leaveapplication.Employee_No where employee.Company_id = $CompID and status='Approved'";
		}
	
     $result=mysqli_query($db, $sql);
//Gets the number of rows in a result;
//Fetches all result rows as an associative array;

	while($row=mysqli_fetch_assoc($result)){ ?>
	
            {
                      "title":"<?php echo $row['LeaveType'];?>",
                      "allday":"True",
                      "description":"<?php echo $row['Employee_ID'];?>",
					  "description3":" <?php echo $row['Employee_Name'];?>",
                      "start":"<?php echo date('Y-m-d',strtotime($row['From_Date'])); ?>",
                      "end":"<?php echo date('Y-m-d',strtotime($row['To_Date'])); ?>",
					 "description1":"<?php echo $row['Leave_days'];?>",
					  "description2":"<?php echo date('Y-m-d',strtotime($row['To_Date']));?>",
					   "url":"#"
            },
		<?php }?>
		  
     
      
       ],
	   
    });
});

function myFunction() {
    var x = document.getElementById('calendar');
 
        x.style.display = 'none';
    
}	

</script>
<style>

	body {
		padding: 0;
	
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}
	

</style>


</body>
</html>