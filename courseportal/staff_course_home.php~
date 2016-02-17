<?php
session_start();
?>
<!DOCTYPE html lang="en">
<html>
<head>
<title>Staff home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/bootstrap.min.css">
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
<head/>
<body>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$cname = $_POST["cname"];
	$_SESSION["coursename"] = $cname;
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
			//$cname = $_SESSION["coursename"];
			$sql1 = "SELECT course_id FROM course WHERE name = '$cname'";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				$row1 = $result1->fetch_assoc();
				$cid = $row1["course_id"];
				$_SESSION["cid"] = $cid;
			}
			$sql2 = "INSERT INTO resource(course_id) VALUES ('$cid')";
			if($conn->query($sql2)==TRUE){
				//echo "Very good";
			}
			else
			{
				//echo "Very bad";
			}
			
	//echo "Course name : $cname";
	//$_SESSION["coursename"] = $cname;
	//echo"<a href="/assignment.php/">Submit Assignments </a> <br>";
	//echo"<a href="/ResourceDownload.php/">Download course resource </a> <br>";
}

?>
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
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Assignment<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/assignment_creation.php">Create Assignment </a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/assignment_download.php">Download Assignments </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/courseportal/assignment_manage.php">View/Delete Assignments </a></li>
			
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/courseportal/modifyass.php">Change Lastdate</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Course resource <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/ResourceUpoad.php">Upload course resource </a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/resdownload1.php">Download course resource </a> </li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="
/courseportal/resdelete.php">Delete course resource </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/courseportal/viewres.php">View course resource </a></li>
          </ul>
        </li>

		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage students <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/listofstudents.php">Manage</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/xlwrite.php">excel write</a></li>
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
Course name: <?php  echo "".$_SESSION["coursename"]."<br>";?><br>
Course 	 ID: <?php  echo "".$_SESSION["cid"]."<br>";?><br><br>
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
			$staff_id = $_SESSION["staffid"];
			$sql = "SELECT name FROM staff WHERE staff_id = '$staff_id' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
								$name1 = $row["name"];
							echo "<strong> $name1 </strong>";
							}
			}				
			$cid = $_SESSION["cid"];
			$sql1 = "SELECT COUNT(course_id) FROM course_assignment WHERE course_id = '$cid'";
			$no = $conn->query($sql1);
			if ($no->num_rows > 0) {
				while($row1 = $no->fetch_assoc()) {
								$name1 = $row1["COUNT(course_id)"];
							
							}
			}
			echo "<br><br>Total number of assignments in course : $name1<br>";
			
			$sql2 = "SELECT COUNT(usn) FROM assignment_submission WHERE course_id = '$cid'  ";
			$no1 = $conn->query($sql2);
			if ($no1->num_rows > 0) {
				while($row2 = $no1->fetch_assoc()) {
								$name2 = $row2["COUNT(usn)"];
							
							}
			}
			echo "<br>Number of submitted assignments   : $name2<br>";
			
			$sql3 = "SELECT * FROM resource WHERE course_id = '$cid'";
			$no3 = $conn->query($sql3);
			if ($no3->num_rows > 0) {
				while($row3 = $no3->fetch_assoc()) {
								if($row3["qbank"]==null){
									echo "<br>Question Bank : <strong>Unavailable</strong><br><br>";
								}
								else{
									echo "Question Bank : <strong>Available</strong><br><br>";
								}
								if($row3["ppt"]==null){
									echo "PPts  : <strong>Unavailable</strong><br><br>";
								}
								else{
									echo "PPts  : <strong>Available</strong><br><br>";
								}
								if($row3["lessonplan"]==null){
									echo "Lesson Plan  : <strong>Unavailable</strong><br><br>";
								}
								else{
									echo "Lesson Plan : <strong>Available</strong><br><br>";
								}
								if($row3["modelq"]==null){
									echo "Model Question Papers : <strong>Unavailable</strong><br><br>";
								}
								else{
									echo "Model Question Papers : <strong>Available</strong><br><br>";
								}
							
							
							}
			}

?>
<br>
 <br>


<br><br><br>

 
 <br><br>
</div>
</div>
</body>
</html>
