<?php
session_start();
?>
<!DOCTYPE html lang="en">
<html>
<head>
<title>Student home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<head/>
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
						
						<li class="dropdown" class="active">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Assignment <span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="/courseportal/assignment_view_student.php">Assignment list</a></li>
							<li class="divider"></li>
							<li><a href="/courseportal/assignment_submission.php">Submit Assignment</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Course Resource <span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="/courseportal/ResourceDownload.php">Download course resource</a></li>
							<li class="divider"></li>
							<li><a href="/courseportal/student_viewres.php">View course resource</a></li>
						  </ul>
						</li>
						<li class="active"><a href="/courseportal/student_listofstudents.php">Student list</a></li>
					  </ul>
					  
					  <ul class="nav navbar-nav navbar-right">
						<li><a href="/courseportal/logout.php">Log out</a></li>
					  </ul>
					</div>
		  </div>
		</nav>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$cname = $_POST["cname"];
	$_SESSION["coursename"] = $cname;
	$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "courseportal";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			//$cname = $_SESSION["coursename"];
			$sql1 = "SELECT course_id FROM course WHERE name = '$cname'";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				$row1 = $result1->fetch_assoc();
				$cid = $row1["course_id"];
				$_SESSION["cid"] = $cid;
			}
	//echo "Course name : $cname";
	//$_SESSION["coursename"] = $cname;
	//echo"<a href="/assignment.php/">Submit Assignments </a> <br>";
	//echo"<a href="/ResourceDownload.php/">Download course resource </a> <br>";
}

?>

<div class="container">
<div class="jumbotron" >
<h1>Assignment submission</h1><br><hr><br>
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



?>
<br>
 <br>
Course name: <?php  echo "".$_SESSION["coursename"]."<br>";?><br><br>
Course 	 ID: <?php  echo "".$_SESSION["cid"]."<br>";?><br><br>

Assignment Submitted!!<br>
<a href = "/courseportal/student_course_home.php">Course Home</a>
<br><br><br>

</div>
</div>
</body>
</html>
