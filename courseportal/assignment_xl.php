<?php
session_start();
?>
<!DOCTYPE HTML> 
<html>
<head>
<title>Staff home</title>
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
				$cid = $_SESSION["cid"];
				
				while($x<=$highestRow)
				{	$l="A".$x;
					$m="B".$x;
					
					
					$topic=$sheet->getCell($l)->getValue();
					$ldate=$sheet->getCell($m)->getValue();
					//$ldate=strtotime("$ldate");
					$ldate = date("Y-m-d", $ldate);
					$cdate=$sheet->getCell($m)->getValue();
					
					
					//echo $usn."\n".$name;
					//$stmt->execute();
					$query="INSERT into assignment values('$topic','$ldate','$cdate');";
					mysqli_query($conn,$query);
					$query1="INSERT into course_assignment values('$cid','$topic');";
					mysqli_query($conn,$query1);
					$x=$x+1;
					//echo $x;
				}
			

		}
		echo "Updating database...Please wait.";
		header('Refresh:1,url= staff_course_home.php');
    	
	}

}
?>

<nav class="navbar navbar-inverse">
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
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">About us <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/courseportal/about.html">About website</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/courseportal/contact.html">Contact info</a></li>
          </ul>
        </li>
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
   <div class="jumbotron">
     <h3>Assignments sheet Upload</h3>
<hr>
Course name: <?php  echo "".$_SESSION["coursename"]."<br>";?><br>
Course 	 ID: <?php  echo "".$_SESSION["cid"]."<br>";?><br><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
	
	
	Select File to upload:<br>
    <input type="file" name="file1" id="file1">
	<br><br>
    <input type="submit" value="Submit" name="submit">
</form>
</div></div>
</body>
</html>
