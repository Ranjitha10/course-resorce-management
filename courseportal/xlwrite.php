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



$cid=$_SESSION["cid"];
$servername = "localhost";
$username = "root";
$password = "root";
$conn = mysqli_connect($servername, $username, $password,"courseportal")  ;
if($conn)		
{	
	$sql1 = "SELECT usn FROM studies WHERE course_id = '$cid'";
	
			$result1 = $conn->query($sql1);
			if ($result1->num_rows > 0){
				require_once 'Spreadsheet/Excel/Writer.php';
					$workbook = new Spreadsheet_Excel_Writer('test2.xls');
					$worksheet = $workbook->addWorksheet('My first worksheet');
					$x=0;
				while($row1 = $result1->fetch_assoc()){
					$usn = $row1["usn"];
					$sql2 = "SELECT name ,sem FROM student WHERE usn='$usn'";
					$result2 = $conn->query($sql2);
					
					if ( $result2->num_rows > 0){
						$row2 = $result2->fetch_assoc();
						$name = $row2["name"];
						$sem = $row2["sem"];
						
						$worksheet->write($x, 0, $usn);
						$worksheet->write($x, 1, $name);
						$worksheet->write($x, 2, $sem);
						$x=$x+1;

						// We still need to explicitly close the workbook
						
					}//end while
				}
					$workbook->close();
			}//end num_rows >0 condition
}//end set of result
}

//function to write to Excel file and sheet



 
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
     <h3>Write Excel</h3>
<hr>
Course name: <?php  echo "".$_SESSION["coursename"]."<br>";?><br>
Course 	 ID: <?php  echo "".$_SESSION["cid"]."<br>";?><br><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
	
	
	
    <input type="submit" value="Submit" name="submit">
</form>
</div></div>
</body>
</html>
