<?php
session_start();
?>
<!DOCTYPE HTML lang="en"> 
<html>
<head>
<title>Faculty home</title>
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
//echo "Nan maganmd!@";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{	//echo "Nan maganmd!@";
	$servername = "localhost";
	$username = "root";
	$password = "root";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;

	if($conn)
	 	{
	 		//echo "Nan maganmd!@";
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
				//echo "Nan maganmd!@";
				$ext = pathinfo($fname, PATHINFO_EXTENSION);
				$temp="student".".".$ext;
				$mov=move_uploaded_file($_FILES['file1']['tmp_name'],"uploads/$temp");
				//save and rename files to a new folder 
				//echo "Nan maganmd!@";

				include '\Classes\PHPExcel\IOFactory.php';
			
					$inputFileType = 'Excel2007';
					//$sem=$_POST["sem"];
					$fname=$_FILES['file1']['name'];
					$ext = pathinfo($fname, PATHINFO_EXTENSION);
					$temp="student".".".$ext;
					//get file from the saved folder
							
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load("uploads/".$temp);
					//echo "Nan maganmd!@";
					$sheet = $objPHPExcel->setActiveSheetIndex(0); 
					$highestRow = $sheet->getHighestRow(); 
					$highestColumn = $sheet->getHighestColumn();
					$x=1;
					
					$staff_id = $_SESSION["staffid"];
					
					while($x<=$highestRow)
					{	$l="A".$x;
						$m="B".$x;
						$n="C".$x;
						$o="D".$x;
						//$p="E".$x;
						//$m="B".$x;
					
						$name=$sheet->getCell($l)->getValue();
						$cid=$sheet->getCell($m)->getValue();
						$sem=$sheet->getCell($n)->getValue();
					
						$cred=$sheet->getCell($o)->getValue();
						//$cred=$sheet->getCell($p)->getValue();
						//echo $usn."\n".$name;
						//$stmt->execute();
						$query1="INSERT into course values('$name','$cid','$sem','$cred');";
						//$encrypt=sha1($pass);
						$query2="INSERT into teaches values('$cid','$staff_id');";
						mysqli_query($conn,$query1);
						mysqli_query($conn,$query2);
						$x=$x+1;
						echo $x;
					}
			

			}
			echo "Updating database...Please wait.";
			//header('Refresh:1,url= staff_home.php');
	    	
	}
	else{
		echo "Nan maganmd!@";
	}

}
else{
	echo "Nan maganmd!@";
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
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Course creation<span class="caret"></span></a>
        <ul class="dropdown-menu">
            
        
            <li role="presentation"><a href="/courseportal/course_creation.php">Form </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/courseportal/xlcourse.php">Upload sheet </a></li>
			
			
          </ul>
		
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li ><a href="/courseportal/logout.php">Logout</a></li>
</div>
</nav>


<div class="container">
<div class="jumbotron" >
<h1>Course Creation</h1><br><hr><br>



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
