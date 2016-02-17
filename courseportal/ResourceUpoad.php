<?php
session_start();
?>
<!DOCTYPE HTML lang="en"> 
<html>
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
.error {color: #FF0000;}
</style>
</head>
<body> 


<?php


	$flag = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if($flag==0){
	  
	$rtype = $_POST["rtype"];
	$cid = $_SESSION["cid"];
	$filename = "resources";
	$dir = "/resources/$cid/$rtype/";
	$file = $_FILES['fileToUpload'];
	
	
	
	if (file_exists($filename)) {
		chdir("resources");
	} else {
		mkdir("resources");
		chdir("resources");
	}
	
	if (file_exists("$cid")) {
		chdir("$cid");
	} else {
		mkdir("$cid");
		chdir("$cid");
	}
	
	if (file_exists($rtype)) {
		chdir("$rtype");
	} else {
		mkdir("$rtype");
		chdir("$rtype");
	}
	
	$target_dir1="";
	$target_file = $target_dir1 . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	
	
	
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
 
 
 $servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;

if($conn)
 	{
	    if($rtype == "CourseNotes"){
			$rtype = "ppt";
			//$sql="insert into resource(course_id,ppt) values('$cid','".$dir."')"; 
			$sql="UPDATE resource SET $rtype='".$dir."' WHERE course_id= '$cid'"; 
			//$result = $conn->query($sql);
			if ($conn->query($sql) == TRUE) {
				//echo "$fname<br><br>";
				echo "New record created successfully<br>";
				header("Location: /courseportal/ResourceUpoadack.php");
				
				
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		if($rtype == "QuestionBank"){
			$rtype = "qbank";
			$sql="UPDATE resource SET $rtype='".$dir."' WHERE course_id= '$cid'"; 
			//$result = $conn->query($sql);
			if ($conn->query($sql) == TRUE) {
				//echo "$fname<br><br>";
				echo "New record created successfully<br>";
				echo "<form action=new.php><input type=Submit value=HOME name=sub></form>";
				header("Location: /courseportal/ResourceUpoadack.php");
				
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		if($rtype == "LessonPlan"){
			$rtype = "lessonplan";
			$sql="UPDATE resource SET $rtype='".$dir."' WHERE course_id= '$cid'"; 
			//$result = $conn->query($sql);
			if ($conn->query($sql) == TRUE) {
				//echo "$fname<br><br>";
				echo "New record created successfully<br>";
				header("Location: /courseportal/ResourceUpoadack.php");
				
				
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
		if($rtype == "ModelQuestionPaper"){
			$rtype = "modelq";
			$sql="UPDATE resource SET $rtype='".$dir."' WHERE course_id= '$cid'"; 
			//$result = $conn->query($sql);
			if ($conn->query($sql) == TRUE) {
				//echo "$fname<br><br>";
				echo "New record created successfully<br>";
				header("Location: /courseportal/ResourceUpoadack.php");
				
				
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
  }
}
    


?>

<nav class="navbar navbar-default">
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
			<li role="presentation"><a href="/courseportal/resdelete.php">Delete course resource </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/courseportal/viewres.php">View course resource </a></li>
          </ul>
        </li>
		<li class="active"><a href="/courseportal/listofstudents.php">Manage students</a></li>
		
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li class="active"><a href="/courseportal/logout.php">Logout</a></li>
</div>
</nav>
<div class="container">
  <div class="jumbotron">
    <h2 >COURSE RESOURCE MANAGEMENT</h2>   
		
  </div>
</div>

<div class="container">
<div class="jumbotron" >
<h3>Resource upload</h3>
Welcome  
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
							echo "<strong> $name1 </strong>";
							}
			}				



?><hr>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
	
	Resource type: <br>
	<select name="rtype">
		<option>CourseNotes</option>
		<option>QuestionBank</option>
		<option>LessonPlan</option>
		<option>ModelQuestionPaper</option>
		
	</select>
	<br><br>
	Select File to upload:<br>
    <input type="file" name="fileToUpload" id="fileToUpload">
	<br><br>
    <input type="submit" value="Upload" name="submit">
	<br><br>
</form>
</div>
</div>
</body>
</html>
