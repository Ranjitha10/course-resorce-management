<?php
session_start();
?>
<!DOCTYPE HTML lang="en"> 
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


<?php


$flag=0;
$tnameErr = $cidErr = $creditErr = $usnErr  =null;
$tname = $cid = $credit = $usn  =$fname =null ;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
  $tname = $_POST["tname"]; 
  
  //$cid = $_POST["cid"]; 

  
  //$fname = $_POST["fname"];
  
	// check if name only contains letters and whitespace
  if(!empty($_POST["tname"])){
    if (!preg_match("/^[a-zA-Z ]*$/",$tname)) 
    {
		$flag=1;
      $tnameErr = "Only letters and white space allowed"; 
    }
  }
  else
  {
    $tnameErr = "Please enter this field";
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
	
	
	$cdate = date("Y-m-d");
	$tname = $_POST["tname"];
	$cid = $_POST["cid"];
	$filename = '/assignments';
	//$usn1 = $_POST["usn"];
	$dir = "/assignments/$cid/$tname/".$_SESSION["usn"]."/";
	$file = $_FILES['fileToUpload'];
	$_SESSION["cid"] = $cid;
	
	
	if (file_exists($filename)) {
		chdir("assignments");
	} else {
		mkdir("assignments");
		chdir("assignments");
	}
	
	if (file_exists("$cid")) {
		chdir("$cid");
	} else {
		mkdir("$cid");
		chdir("$cid");
	}
	
	if (file_exists($tname)) {
		chdir("$tname");
	} else {
		mkdir("$tname");
		chdir("$tname");
	}
	
	if (file_exists($_SESSION["usn"])) {
		chdir("".$_SESSION["usn"]."");
	} else {
		mkdir("".$_SESSION["usn"]."");
		chdir("".$_SESSION["usn"]."");
	}
	
	$target_dir1="";
	$target_file = $target_dir1 . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	
	
	
	// Check if file already exists
	
 
 
 $servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;

if($conn)
 	{
	    $sql2 = "SELECT lastdate  FROM assignment WHERE topic='$tname'";
		$result2 = $conn->query($sql2);
		if ( $result2->num_rows > 0){
						$row2 = $result2->fetch_assoc();
						$ldate = $row2["lastdate"];
						if($cdate <= $ldate){
													
													$sql="insert into assignment_submission(usn,course_id,topic,submit_doc,cdate) values('".$_SESSION["usn"]."','$cid','$tname','".$dir."','$cdate')"; 
								//$result = $conn->query($sql);
								if ($conn->query($sql) == TRUE) {
											echo "$fname<br><br>";
											echo "New record created successfully<br>";
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
											//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
										} else {
											echo "Sorry, there was an error uploading your file.";
										}
									}
											header("Location: /courseportal/ass_sub_ack.php");
									
									
								} else {
									echo "<script type='text/javascript'>alert('You have already Submitted!')</script>";
									//echo "Error: " . $sql . "<br>" . $conn->error;
								}
							
					
							
						}
						else{
							echo "<script type='text/javascript'>alert('You are too late to submit this assignment!')</script>";
						}
		}
    	
	}
  }
    
}

?>

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
<?php echo"COURSE NAME :<strong>".$_SESSION["coursename"]."</strong><br><br>"?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
	<strong>Topic name:</strong> <br>
	<select name="tname">
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
			$cname = $_SESSION["coursename"];
			$cid =$_SESSION["cid"];
				//echo "<input type = hidden name = cid value = $cid>";
				$sql = "SELECT topic FROM course_assignment WHERE course_id = '$cid'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							$tname = $row["topic"];
							echo "<option>
							$tname
						</option>";
						}
				
				} else {
						echo "0 results";
				}

			echo "<input type = hidden name = cid value = $cid>";
			$conn->close();
		?>
	</select>
	<span class="error"><?php echo $tnameErr;?></span>
	<br><br>
	
	Select File to upload:<br>
    <input type="file" name="fileToUpload" id="fileToUpload">
	<br><br>
    <input type="submit" value="Submit" name="submit">
</form>


</div>
</div>
</body>
</html>
