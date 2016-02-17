<?php
// Start the session
session_start();
?>
<!DOCTYPE html lang="en">
<html>
<head>
<title>Faculty home</title>
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
</head>
<body>

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
          <li class="active"><a href="/courseportal/resourseperteacher.php">Resource check</a></li>
          
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

<div class ="container">
  <div class="jumbotron">
<h3></h3>

<br>
<?php
echo "<center><h3>Welcome ";
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
			$staffid = $_SESSION["staffid"];
			$sql = "SELECT name FROM staff WHERE staff_id = '$staffid' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
								$name1 = $row["name"];
							echo "<strong> $name1 </strong></h3></center>";
							}
			}			
			$sql1 = "SELECT COUNT(staff_id) FROM teaches WHERE staff_id = '$staffid'";
			$no = $conn->query($sql1);
			if ($no->num_rows > 0) {
				while($row1 = $no->fetch_assoc()) {
								$name1 = $row1["COUNT(staff_id)"];
							
							}
			}
			echo "<br><br><center><h3>Number of courses  : $name1</h3></center><br>";
			
			



?>
<br>
<br>
<form action = "/courseportal/staff_course_home.php" method = "POST">
Go to Courses:<br>
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
			$staffid = $_SESSION["staffid"];
			$sql = "SELECT course_id FROM teaches WHERE staff_id = '$staffid' ";
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
								</option>";
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
