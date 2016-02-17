<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML lang="en"> 
<html>
<title>Student home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<head>
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

<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container-fluid">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="/courseportal/student_home.php">Course Portal</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						<li ><a href="/courseportal/student_home.php">Home <span class="sr-only">(current)</span></a></li>
					  </ul>
					  <ul class="nav navbar-nav">
						<li class="active"><a href="/courseportal/studies.php">Register For Course </a></li>
					  </ul>
					  
					  
					  <ul class="nav navbar-nav navbar-right">
						<ul class="nav navbar-nav">
						<li ><a href="/courseportal/logout.php">Logout </span></a></li>
					  </ul>
						</li
						
					  </ul>
					  
					</div>
		  </div>
		</nav>
<div class="container">
  <div class="jumbotron">
    <h2 >COURSE RESOURCE MANAGEMENT</h2>           
  </div>
</div>


<?php


$flag=0;
$cnameErr = $cidErr = $creditErr = $usnErr  =null;
$cname = $cid = $credit = $usn  =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $cname = $_POST["cname"]; 
  
  $cid = $_POST["cid"]; 

  $usn = $_SESSION["usn"]; 
  
  //echo "$usn";
  
  
	// check if name only contains letters and whitespace
  if(!empty($_POST["cname"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$cname)) 
    {
		$flag=1;
      $cnameErr = "Only letters and white space allowed"; 
    }
  }
  else
  {
    $cnameErr = "Please enter this field";
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
  

  
 
  
  if($flag==0){
 
 
 $servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;

if($conn)
 	{
		$sem = $_SESSION["sem"];
	    
    	$sql="select name from course where course_id = '$cid' && sem = '$sem'"; 
		
    	$result = $conn->query($sql);
    	if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$cname1 = $row["name"];
			if($cname != $cname1){
				
					echo "<script type='text/javascript'>alert('Coursename and Courseid Doesnot match!')</script>";

				
			}
			else{
				$sql1="insert into studies(usn,course_id) values('$usn','$cid')";
				if( $conn->query($sql1) == TRUE){
					echo "Perfect! <br>";
					echo "<script type='text/javascript'>alert('Registered for the course Successful!')</script>";
					header("Location: /courseportal/student_home.php");
				}
				else
					echo "<script type='text/javascript'>alert('You have already registered!')</script>";
			}
		
		} else {
			echo "0 results";
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

<div class="container">
<div class="jumbotron" >

<br>
 <br>
<h3>Course registration</h3>
<hr>
<?php
echo "Welcome ";
?> 
<?php
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "courseportal";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			$usn = $_SESSION["usn"];
			$sql = "SELECT name FROM student WHERE usn = '$usn' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
								$name1 = $row["name"];
							echo "<strong> $name1 </strong>";
							}
			}				



?><br><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	
	
	Course Name:<br>
	<select name="cname">
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "courseportal";
			$sem = $_SESSION["sem"];
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT name FROM course where sem ='$sem'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$cname = $row["name"];
					echo "<option>
                    $cname
                </option>";
				}
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</select>
	<span class="error"><?php echo $cnameErr;?></span>
	<br><br>
	Course ID: <br>
	<select name="cid">
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "courseportal";
			$sem = $_SESSION["sem"];
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT course_id FROM course where sem = '$sem'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$cid = $row["course_id"];
					echo "<option>
                    $cid
                </option>";
				}
			
			} else {
				echo "0 results";
			}
			$conn->close();
		?>
	</select>
	<span class="error"><?php echo $cidErr;?></span>
	<br><br>
	<input type="submit" name="submit" value="Submit"><br> <br>
	
</form>
</body>
</html>
