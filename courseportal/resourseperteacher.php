<?php
session_start();
?>
<!DOCTYPE html lang="en">
<head>
<title>Staff home</title>
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
  <style>

</style>
</head>
<html>
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
<div class="container">
<div class="jumbotron" >
<h3>Resource Check </h3>
<hr>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;
if($conn)
{
	$staffid = $_SESSION["staffid"];
	//$cid = $_SESSION["cid"];
	//$sql2= "SELECT course_id FROM teaches WHERE staff_id = '$staffid'";
	$sql1 = "SELECT course_id FROM teaches WHERE staff_id = '$staffid'";
	
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				echo "<table class=table style=width:100%><thead><tr><td><center><strong>Name</strong></center></td><td><center><strong>qbank</strong></center></td><td><center><strong>ppt</strong></center></td><td><center><strong>lessplan</strong></center></td><td><center><strong>modelq</strong></center></td><td><center><strong>labmanual</strong></center></td></tr></thead>";
				while($row1 = $result1->fetch_assoc()){
					$cid = $row1["course_id"];
					$sql2 = "SELECT * FROM `resource` WHERE course_id='$cid'";
					$sql3 = "SELECT name FROM course WHERE course_id='$cid'";
					$result2 = $conn->query($sql2);
					$result3 = $conn->query($sql3);
					if ( $result2->num_rows > 0&&$result3->num_rows > 0){
						$row2 = $result2->fetch_assoc();
						$row3=$result3->fetch_assoc();
						$name = $row3["name"];
						echo " <tbody><tr><td><center>$name</center></td>";
						if($row2["qbank"]==NULL){
						echo " <td ><center><red>Unavailable</red></center></td>";
						}
						else{
							echo " <td><center>Available</center></td>";
						}
						if($row2["ppt"]==NULL){
						echo " <td><center>Unavailable</center></td>";
						}
						else{
							echo " <td><center>Available</center></td>";
						}
						if($row2["lessonplan"]==NULL){
						echo " <td><center>Unavailable</center></td>";
						}
						else{
							echo " <td><center>Available</center></td>";
						}
						if($row2["modelq"]==NULL){
						echo " <td><center>Unavailable</center></td>";
						}
						else{
							echo " <td><center>Available</center></td>";
						}
						if($row2["labm"]==NULL){
							echo " <td><center>Unavailable</center></td></tr></tbody>";
						}
						else{
							echo " <td><center>Available</center></td></tr></tbody>";
						}
						
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
</div></div>
</body>
</html>
