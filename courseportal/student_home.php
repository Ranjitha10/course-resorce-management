<?php
// Start the session
session_start();
?>
<!DOCTYPE html lang="en">
<html>
<head>
<title>Student home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/bootstrap.css">
    <style>
	body{
  background-image: url(swirl_pattern.png);
  background-repeat:repeat;
}
  </style>
  <style>
	a:hover {
    color:#ff0000;
    background-color:transparent;
    text-decoration:underline;
	}
	a:active {
		color:#ff0000;
		background-color:transparent;
		text-decoration:underline;
	}
  </style>
</head>
<body>
<nav class="navbar navbar-default">
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
						<li class="active"><a href="/courseportal/student_home.php">Home <span class="sr-only">(current)</span></a></li>
					  </ul>
					  <ul class="nav navbar-nav">
						<li ><a href="/courseportal/studies.php">Register For Course </a></li>
					  </ul>
					  
					  
					  <ul class="nav navbar-nav navbar-right">
						<li ><a href="/courseportal/logout.php">Logout </a></li>
						</li>
						
	
					  </ul>
					  
					</div>
		  </div>
		</nav>
<div class="container">
  <div class="jumbotron">
    <h2 >COURSE RESOURCE MANAGEMENT</h2>           
  </div>
</div>
<div class="container">
<div class="jumbotron" >
<?php
#echo  "Welcome ". $_SESSION["usn"] . ".<br>";
?>
<br>
<?php
echo "<center><h2>Welcome ";
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
			$sql = "SELECT name,sem FROM student WHERE usn = '$usn' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
								$name1 = $row["name"];
							echo "<strong> $name1 </strong>";
							$_SESSION["sem"] = $row["sem"];
							$sem = $row["sem"];
							echo "<strong>of  $sem th semester ! </strong></h2></center>";
							}
			}	
			$sql1 = "SELECT COUNT(usn) FROM studies WHERE usn = '$usn'";
			$no = $conn->query($sql1);
			if ($no->num_rows > 0) {
				while($row1 = $no->fetch_assoc()) {
								$name1 = $row1["COUNT(usn)"];
							
							}
			}
			echo "<center><br><br><h3>Number of courses registered : $name1</h3><br></center>";


?>
<br>
 <br>
 <hr>
<form action = "/courseportal/student_course_home.php" method = "POST">
Select your registered course:<br><br>
	
	<ul name="cname">
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
			$sql = "SELECT course_id FROM studies WHERE usn = '$usn' ";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
						$cname = $row["course_id"];
						$sql1 = "SELECT name FROM course WHERE course_id = '$cname' ";
						$result1= $conn->query($sql1);
						if ($result1->num_rows > 0) {
							while($row1 = $result1->fetch_assoc()) {
								$cname1 = $row1["name"];
							echo "<li>
								$cname1
								</li>
								<br>";
							}
						}
						else {
							echo "0 results";
						}
						
				}
				//echo"</center>";
					
		} 
			$conn->close();
		?>
	</ul>
	
	<select name="cname">
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
			$sql = "SELECT course_id FROM studies WHERE usn = '$usn' ";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
						$cname = $row["course_id"];
						$sql1 = "SELECT name FROM course WHERE course_id = '$cname' ";
						$result1= $conn->query($sql1);
						if ($result1->num_rows > 0) {
							while($row1 = $result1->fetch_assoc()) {
								$cname1 = $row1["name"];
							echo "<option>
								$cname1
								</option>
								<br>";
							}
						}
						else {
							echo "0 results";
						}
						
				}
					
		} 
			$conn->close();
		?>
	</select> 
	
	<input type="submit" value="submit" name="submit">
</form>
<br><br>
</div>
</div>
</body>
</html>
