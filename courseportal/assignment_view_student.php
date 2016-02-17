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
   <style>
	body{
  background-image: url(swirl_pattern.png);
  background-repeat:repeat;
}
  </style>
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
						<li class="dropdown" >
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Course Resource <span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="/courseportal/ResourceDownload.php">Download course resource</a></li>
							<li class="divider"></li>
							<li><a href="/courseportal/student_viewres.php">View course resource</a></li>
						  </ul>
						</li>
						<li class=><a href="/courseportal/student_listofstudents.php">Student list</a></li>
					  </ul>
					  
					  <ul class="nav navbar-nav navbar-right">
						<li><a href="/courseportal/logout.php">Log out</a></li>
					  </ul>
					</div>
		  </div>
		</nav>

<div class="container">
  <div class="jumbotron">
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;
if($conn)
{
	$cid = $_SESSION["cid"];
	$sql1 = "SELECT topic FROM course_assignment WHERE course_id = '$cid'";
	$usn = $_SESSION["usn"];
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				echo "<table  class=table   style=width:100%><thead><tr><td><center><strong>Topic</strong></center></td><td><center><strong>LastDate</strong></center></td><td><center><strong>CreateDate</strong></center></td><td><center><strong>Submitted</strong></center></td></tr><thead>";
				//echo "<hr>";
				while($row1 = $result1->fetch_assoc()){
					$topic = $row1["topic"];
					$sql2 = "SELECT lastdate ,creatdate FROM assignment WHERE topic='$topic'";
					$result2 = $conn->query($sql2);
					$sql3 = "SELECT usn FROM assignment_submission WHERE topic='$topic' && usn = '$usn' && course_id = '$cid'";
					$result3 = $conn->query($sql3);
					if ( $result3->num_rows > 0){
						$yon = "yes";
					}
					else{
						$yon = "no";
					}
					if ( $result2->num_rows > 0){
						$row2 = $result2->fetch_assoc();
						$ldate = $row2["lastdate"];
						$cdate = $row2["creatdate"];
						echo "<tbody><tr><td><center>$topic</center></td>
								<td><center>$ldate</center></td>
								<td><center>$cdate</center></td>
								<td><center>$yon</center></td>
								</tr><tbody>";
						
					}
					
				
				}
				
			}
			else{
				Echo "<br>No students registered<br>";
			}
}
else
{
}

?>
<h1>Assignment List</h1><br><hr><br><br>
</div>
</div>
</body>
</html>
