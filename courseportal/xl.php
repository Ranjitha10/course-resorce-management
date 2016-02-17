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
.error {color: #FF0000;}
</style>
</head>
<body> 


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;

if($conn)
 	{
	  // $sem=$_POST["sem"];
		$fname=$_FILES['file1']['name'];
		if(!isset($fname))
		{
			echo "File not able to upload!Please try again!";
		}
		else if ($_FILES["file1"]["error"] > 0) {
			echo "Error: " . $_FILES["file1"]["error"] . "<br>";
		} 
		else 
		{
			$ext = pathinfo($fname, PATHINFO_EXTENSION);
			$temp="student".".".$ext;
			$mov=move_uploaded_file($_FILES['file1']['tmp_name'],"uploads/$temp");
			//save and rename files to a new folder 
			

			include '\Classes\PHPExcel\IOFactory.php';
			
				$inputFileType = 'Excel2007';
				//$sem=$_POST["sem"];
				$fname=$_FILES['file1']['name'];
				$ext = pathinfo($fname, PATHINFO_EXTENSION);
				$temp="student".".".$ext;
				//get file from the saved folder
							
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load("uploads/".$temp);

				$sheet = $objPHPExcel->setActiveSheetIndex(0); 
				$highestRow = $sheet->getHighestRow(); 
				$highestColumn = $sheet->getHighestColumn();
				$x=1;
				
				
				while($x<=$highestRow)
				{	$l="A".$x;
					$m="B".$x;
					$n="C".$x;
					$o="D".$x;
					
					$name=$sheet->getCell($l)->getValue();
					$c_id=$sheet->getCell($m)->getValue();
					$sem=$sheet->getCell($n)->getValue();
					$cred=$sheet->getCell($o)->getValue();
					
					
					//echo $usn."\n".$name;
					//$stmt->execute();
					$query="INSERT into course values('$name','$c_id','$sem','$cred');";
					mysqli_query($conn,$query);
					$x=$x+1;
					//echo $x;
				}
			

		}
		echo "Updating database...Please wait.";
		header('Refresh:1,url= staff_home.php');
    	
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

<?php echo"COURSE NAME :<strong>".$_SESSION["coursename"]."</strong><br><br>"?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
	
	
	Select File to upload:<br>
    <input type="file" name="file1" id="file1">
	<br><br>
    <input type="submit" value="Submit" name="submit">
</form>


</div>
</div>
</body>
</html>
