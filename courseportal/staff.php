<!DOCTYPE HTML lang="en"> 
<html>
<head>
<title>Staff signup</title>
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
	body {background-color:#dfe3ee}
  </style>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 


<?php


$flag=0;
$nameErr = $depErr = $staff_idErr = $emailErr=$passErr =null;
$name = $dep = $staff_id = $pass =$email =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $name = $_POST["name"]; 
  //test_input($_POST["name"]);
  $dep = $_POST["dep"];     //test_input($_POST["usn"]);
  $staff_id = $_POST["staff_id"];
  $pass = $_POST["pass"];
  $email = $_POST["email"];
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
  
  if(!empty($_POST["dep"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$dep)) 
    {
      $depErr = "Only letters and white space allowed"; 
	  //echo "$usnErr";
	  $flag=1;
    }
  }
  else
  {
    $depErr= "Please enter department";
	$flag=1;
  } 
  
   if(!empty($_POST["pass"])){
    if (!preg_match("/^[a-z0-9A-Z]*$/",$pass)) 
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
  
  if(!empty($_POST["staff_id"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$staff_id)) 
    {
      $staff_idErr = "Only letters allowed"; 
	  $flag=1;
	  
    }
  }
  else
  {
    $staff_idErr = "Please enter staff id";
	$flag=1;
  } 
  
  if($flag==0){
 
 
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
    	$sql = "insert into staff(name,department,staff_id,password,email) values('".$name."','".$dep."','".$staff_id."','".$pass."','".$email."')";
    	if ($conn->query($sql) === TRUE) {
			echo "New record created successfully<br>";
			
			
			$epass = sha1($pass);
			$sql1 = "insert into staff_auth(staff_id,password) values('".$staff_id."','".$epass."')";
			if ($conn->query($sql1) === TRUE) {
				header("Location: /courseportal/Staff_login.php");
				exit;
			}
			
			
			header("Location: /courseportal/Staff_login.php");
			
			
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
<nav class="navbar navbar-inverse navbar-fixed-top">
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
<h3>Faculty registration</h3>
<hr>
<div class="row">
    <div class="col-md-6">
<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		<div class="form-group">
		<label class="control-label col-sm-2" for="name">Name:</label> 
		<div class="col-sm-10">
		<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $name;?>">
		<span class="error"><?php echo $nameErr;?></span>
		</div>
		</div>   
		<div class="form-group">
		<label class="control-label col-sm-2" for="email">Email:</label> 
		<div class="col-sm-10">
		<input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $email;?>">
		<span class="error"><?php echo $emailErr;?></span>
		</div>
		</div> 
		<div class="form-group">
		<label class="control-label col-sm-2" for="dept">Department:</label> 
		<div class="col-sm-10">
		<input type="text" class="form-control" id="dept" placeholder="Department" name="dep" value="<?php echo $dep;?>">
		<span class="error"><?php echo $depErr;?></span>
		</div>
		</div>
		<div class="form-group">
		<label class="control-label col-sm-2" for="sid">Staff ID:</label> 
		<div class="col-sm-10">
		<input type="text" class="form-control" id="sid" placeholder="Staff ID" name="staff_id" value="<?php echo $staff_id;?>">
		<span class="error"><?php echo $staff_idErr;?></span>
		</div>
		</div>
		<div class="form-group">
		<label class="control-label col-sm-2" for="pwd">Password:</label> 
        <div class="col-sm-10">  
		<input type="password" class="form-control" id="pwd" placeholder="Password" name="pass" value="<?php echo $pass;?>">
	    <span class="error"><?php  echo $passErr;?></span>
	    </div>
        </div>
		<div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" name="submit" value="Submit">
		</div>
		</div>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
