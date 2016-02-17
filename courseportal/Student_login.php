<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML lang="en"> 
<html>
<head>
<title>Student login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.css">
  <style>
	body{
  background-image: url(swirl_pattern.png);
  background-repeat:repeat;
}
  </style>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 


<?php


$flag=0;
$nameErr = $usnErr = $semErr = $passErr =null;
$name = $usn = $sem = $pass =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $usn = $_POST["usn"];     
  $pass = $_POST["pass"];
	
 
  
  if(!empty($_POST["usn"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$usn)) 
    {
      $usnErr = "Only letters and digit allowed";
	  $flag=1;
    }
  }
  else
  {
    $usnErr = "Please enter usn";
	$flag=1;
  } 
  
   if(!empty($_POST["pass"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$usn)) 
    {
      $passErr = "Only letters and digit allowed"; 
	  $flag=1;
    }
  }
  else
  {
    $passErr = "Please enter password";
	$flag=1;
  } 
  
  
  if($flag==0){
	  
	  $_SESSION["usn"] = $usn;
 
 
 $servername = "localhost";
$username = "root";
$password = "root";


$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	    //echo "Connection successfull<br>";
    	$sql="select password from stud_auth where usn = '$usn'"; 
		$result = $conn->query($sql);
    	if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$pass1 = $row["password"];
			if(sha1($pass) != $pass1){
				echo "<script type='text/javascript'>alert('Error!')</script>";
			}
			else{
				echo "Perfect! <br>";
				echo "<script type='text/javascript'>alert('Login Successful!')</script>";
				header("Location: /courseportal/student_home.php");
			}
		
		} else {
			echo "<script type='text/javascript'>alert('Record not found!')</script>";
			
		}
}
$conn->close();

  }
    
}





?>

<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container-fluid">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="/courseportal/homepage.php">Course Portal</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						<li class="active"><a href="/courseportal/homepage.php">Home <span class="sr-only">(current)</span></a></li>
					  </ul>
					  
					  <ul class="nav navbar-nav navbar-right">
						<li class="dropdown" >
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sign Up <span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="/courseportal/student.php">Student</a></li>
							<li class="divider"></li>
							<li><a href="/courseportal/staff.php">Faculty</a></li>
						  </ul>
						</li
						
					  </ul>
					  <ul class="nav navbar-nav navbar-right">
						<li class="dropdown" >
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Login <span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="/courseportal/Student_login.php">Student</a></li>
							<li class="divider"></li>
							<li><a href="/courseportal/Staff_login.php">Faculty</a></li>
						  </ul>
						</li
						
					  </ul>
					</div>
		  </div>
		</nav>
<div class="row">
<div class="container">
<div class="jumbotron">
<h2 >COURSE RESOURCE MANAGEMENT</h2>
</div>
</div>
<div class="container">
<div class="jumbotron">
<h3>STUDENT LOGIN</h3>
<hr>
<div class="row">
<div class="col-md-6">
<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset> 
	
	<div class="form-group">
	<label class="control-label col-sm-2" for="usn">USN:</label> 
	<div class="col-sm-10">
	<input class="form-control" id="usn" placeholder="USN" type="text" name="usn" value="<?php echo $usn;?>">
	<span class="error"><?php echo $usnErr;?></span>
	 </div>
    </div>
	
	<div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label> 
      <div class="col-sm-10">          
	<input type="password" class="form-control" id="pwd" placeholder="Password" name="pass" value="<?php echo $pass;?>"  required>
	   <span class="error"><?php  echo $passErr;?></span>
	   </div>
    </div>
	<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
	 <input type="submit" name="submit" value="Submit"><br> <br>
	 </div>
	 </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

</body>
</html>
