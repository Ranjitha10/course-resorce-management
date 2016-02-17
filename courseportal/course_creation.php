<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML lang="en"> 
<html>
<head>
<title>Faculty home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 


<?php


$flag=0;
$nameErr = $cidErr = $creditErr = $semErr=null;
$name = $sem=$cid = $credit  =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $name = $_POST["name"]; 
  $sem = $_POST["sem"];
  $cid = $_POST["cid"];    
  $credit = $_POST["credit"];
	// check if name only contains letters and whitespace
  if(!empty($_POST["name"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
    {
		$flag=1;
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  else
  {
    $nameErr = "Please enter this field";
	$flag=1;
  }
  
  if(!empty($_POST["cid"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$cid)) 
    {
      $cidErr = "Only letters and digit allowed"; 
	  //echo "$usnErr";
	  $flag=1;
    }
  }
  else
  {
    $cidErr = "Please enter usn";
	$flag=1;
  } 
  

  
  if(!empty($_POST["credit"])){
    if (!preg_match("/^[1-5]$/",$credit)) 
    {
      $creditErr = "Only digit"; 
	  $flag=1;
	  
    }
  }
  else
  {
    $creditErr = "Please enter credit";
	$flag=1;
  } 
  
    if(!empty($_POST["sem"])){
    if (!preg_match("/^[1-8]$/",$sem)) 
    {
      $semErr = "Only digit"; 
	  $flag=1;
	  
    }
  }
  else
  {
    $semErr = "Please enter semester";
	$flag=1;
  }
  
  if($flag==0){
	  
	  $staffid = $_SESSION["staffid"];
 
 
 $servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;

if($conn)
 	{
	    // mysql inserting a new row
	    //$result = mysql_query("INSERT INTO student(USN,FName,Mname,Lname,Phno,emailid) VALUES('$usn',$Fname', '$Mname','Lname','phno', '$email')");
	 	//$sql="insert into student(USN,FName,Mname,Lname,Phno,emailid) values('".$_POST['usn']."','".$_POST['fname']."','".$_POST['mname']."','".$_POST['lname']."','".$_POST['ph']."','".$_POST['email']."')";
    	$sql = "insert into course(name,course_id,credits,sem) values('".$name."','".$cid."','".$credit."','".$sem."')";
		$sql1 = "insert into teaches(staff_id,course_id) values('".$staffid."','".$cid."')";
		$sql3 = "insert into resource(course_id) values('".$cid."')";
    	if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE&& $conn->query($sql3) === TRUE) {
			//echo "New record created successfully<br>";
			
			$sql4 = "SELECT name,email FROM student WHERE sem='$sem'";
			$result = $conn->query($sql4);
			if ($result->num_rows > 0) {
				echo "working!";
				require ('class.phpmailer.php');
                        $mail = new PHPMailer(); // create a new object
                        $mail->IsSMTP(); // enable SMTP
                         // debugging: 1 = errors and messages, 2 = messages only
                        $mail->SMTPAuth = true; // authentication enabled
                        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = 587; // or 465
                        $mail->IsHTML(false);
                        $mail->Username = "noreplycourseportal@gmail.com";
                        $mail->Password = "courseportal";
                        $mail->Subject = $name;
						$mail->Body = "A new course has been added! Check it out in Courseportal soon!";
				while($row = $result->fetch_assoc()) {
					$email = $row["email"];
					$stname = $row["name"];
					$mail->AddAddress("$email");
					if(!@$mail->Send())
                        {
                            echo "<script> alert(\"' Error! mail could not be sent because '.$mail->ErrorInfo\"); </script>";
                          //  header('Refresh:1,url= index.php');
                        }
					else
                        {
                            echo "<script> alert(\"Message Sent\"); </script>";
                           // header('Refresh:1,url= index.php');
                        }
							
				}
				header("Location: /courseportal/staff_home.php");
			}			
			
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
  }
    
}



// function test_input($data) {
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
// }

//?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">COURSE RESOURCE MANAGEMENT</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/courseportal/staff_home.php">Home</a></li>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Course creation<span class="caret"></span></a>
        <ul class="dropdown-menu">
            
        
            <li role="presentation"><a href="/courseportal/course_creation.php">Form </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/courseportal/xlcourse.php">Upload sheet </a></li>
			
			
          </ul>
		
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li ><a href="/courseportal/logout.php">Logout</a></li>
</div>
</nav>
<div class="container">
  <div class="jumbotron">
    <h2 >COURSE RESOURCE MANAGEMENT</h2>   
		
  </div>
</div>
<div class="container">
  <div class="jumbotron">
<h2>Course creation</h2>
<hr>

<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	<div class="form-group">
	<label class="control-label col-sm-2" for="cname">Course Name:</label> 
	<div class="col-sm-10">
	<input type="text" class="form-control" id="cname" placeholder="course name" name="name" value="<?php echo $name;?>">
	<span class="error"> <?php echo $nameErr;?></span>
	</div></div>  
	
	
	<div class="form-group">
	<label class="control-label col-sm-2" for="cid">Course ID:</label> 
	<div class="col-sm-10">	
	<input type="text" class="form-control" id="cid" placeholder="course ID" name="cid" value="<?php echo $cid;?>">
	<span class="error"> <?php echo $cidErr;?></span>
	</div></div>  
	
	<div class="form-group">
	<label class="control-label col-sm-2" for="cid">Credits:</label> 
	<div class="col-sm-10">	
	<input type="text" class="form-control" id="credits" placeholder="credits" name="credit" value="<?php echo $credit;?>">
	<span class="error"><?php echo $creditErr;?></span>
	</div></div>
	
	<div class="form-group">
	<label class="control-label col-sm-2" for="cid">Semester:</label> 
	<div class="col-sm-10">	
	<input type="text" class="form-control" id="sem" placeholder="sem" name="sem" value="<?php echo $sem;?>">
	<span class="error"><?php echo $semErr;?></span>
	</div></div>
	
	<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
	<input type="submit" name="submit" value="Submit"><br> <br>
	</div>
	</div>
</form>
</div>
</div>
</body>
</html>
