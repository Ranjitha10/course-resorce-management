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
  <!-- Load jQuery from Google's CDN -->
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="jquery-ui.css" />
    
    <!-- Load jQuery JS -->
    <script src="jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="jquery-ui.js"></script>
    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="script_2.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.css">
  <style>
	body {background-color:#dfe3ee}
  </style>
<style>
.error {color: #FF0000;}
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
<div class="jumbotron" >
<h3>Change Last Date</h3>
<hr>
Course name: <?php  echo "".$_SESSION["coursename"]."<br>";?><br>
Course 	 ID: <?php  echo "".$_SESSION["cid"]."<br>";?><br><br>
Topic name: <br>
<?php $topic = $_POST["topic"]; echo "$topic<br>"; $_SESSION["topic"] = "$topic";?>
Current LastDate:
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
			$topic = $_SESSION["topic"];
				//echo "<input type = hidden name = cid value = $cid>";
				$sql = "SELECT lastdate FROM assignment WHERE topic = '$topic'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
						// output data of each row
						$row = $result->fetch_assoc();
						$ldate = $row["lastdate"];
						echo "$ldate<br>";
						}
				
				 else {
						echo "0 results";
				}

			
			$conn->close();
		?>
	
	<br><br>
<form method="post" action="/courseportal/insertdate.php"> 
	Last Date:<br>
	<input type="date" name="ldate" id="datepicker" >
	<br><br>
    <input type="submit" value="Submit" name="submit">
</form>

</div></div>

</body>
</html>
