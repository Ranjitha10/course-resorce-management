<?php
session_start();
?>
<!DOCTYPE html>
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
<style>
.error {color: #FF0000;}
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
						
						<li class="dropdown" class="active">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Assignment <span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="/courseportal/assignment_creation.php">Assignment list</a></li>
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
<div class="container">
  <div class="jumbotron">
    <h2 >COURSE RESOURCE MANAGEMENT</h2>           
  </div>
</div>	
<div class="container">
  <div class="jumbotron">	
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	//$dir1 = $_POST["dir"];
	$rtype = $_POST["rtype"];
	if($rtype == "CoursePPT")
		$dir ="ppt";
	else if($rtype == "QuestionBank")
		$dir = "qbank";
	else if($rtype == "LessonPlan")
		$dir = "lessonplan";
	else if($rtype == "ModelQuestionPaper")
		$dir = "modelq";
	else if($rtype == "LabManual")
		$dir = "labm";
	
	
	
	$cdrive = "/var/www/courseportal";
	$cid = $_SESSION["cid"];
	//echo "$cid<br><br><br>";
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
			$sql1 = "SELECT $dir FROM resource WHERE course_id = '$cid'";
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				$row1 = $result1->fetch_assoc();
				//print_r ($row1);
				$dir2 = $row1["$dir"];
				if($dir2 == null){
					echo "Empty folder!<br>";
					echo "<a href = /courseportal/ResourceDownload.php>Back</a><br>";
					//header("Location: /ResourceDownload.php/");
					
				}
				//echo "$dir2<br><br><br>";
				$dir1 = $cdrive.$dir2 ;
				//echo "$dir1<br><br><br>";
				$zip = new ZipArchive;
				$rar = "zipfile.zip";
				$rardir = $dir1.$rar;
				//echo "$rardir<br><br><br>";
				//$file = "chumma.php";
				//$afile = $dir1.$file;
				//echo "$afile<br>";
				if ($zip->open("$rardir",ZIPARCHIVE::CREATE) === TRUE) {
					if ($dh = opendir($dir1)){
					
						while (($file = readdir($dh)) !== false){
							if ($file == '.' ) 
								continue;
							else if ($file == '..' ) 
								continue;
							else if ($file == $rar ) 
								continue;
							$afile = $dir1.$file;
							//echo "$afile<br>";
							$zip->addFile("$afile","$file");
						}
					}
					else{
						echo "<script type='text/javascript'>alert('FolderEmpty')</script>";
						echo "<a href = /courseportal/ResourceDownload.php>Back</a>";
					}
					
					$zip->close();
					
					
					//echo 'ok';
				} else {
					echo 'failed';
				}
				chdir("$dir1");
				if (file_exists($rar)) {
						header('Content-Description: File Transfer');
						header('Content-Type: application/octet-stream');
						header('Content-Disposition: attachment; filename='.basename($rar));
						header('Expires: 0');
						header('Cache-Control: must-revalidate');
						header('Pragma: public');
						header('Content-Length: ' . filesize($rar));
						header('Content-type: application/zip');
						readfile($rar);
						exit;
					}
				
				
				
			}
			else{
				echo "<center>Course Resource not uploaded<center><br>";
				echo "<a href = /courseportal/ResourceDownload.php>Back</a><br>";
				//header("Location: ?courseportal/ResourceDownload.php/");
				
			}
	
	
	
	
	
	
	
	//$dir1 = $_POST["dir"];
	//echo"$dir1<br><br><br><br>";
	
}

?>
</div>
</div>
</body>
</html>
