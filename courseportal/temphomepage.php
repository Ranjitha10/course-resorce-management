
<!DOCTYPE html>
<html lang="en">
<head>
  <title>COURSE RESOURCE MANAGEMENT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
							<li><a href="/courseportal/assignment_view_student.php">Assignment list</a></li>
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
    <h1 >COURSE RESOURCE MANAGEMENT</h1>           
  </div>
</div>
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <center><img src="1.jpg" alt="book" class="img-rounded"  width="460" height="345"></center>
      </div>

      <div class="item">
        <center><img src="2.jpg" alt="book" class="img-rounded" width="460" height="345"></center>
      </div>
	  
	   <div class="item">
        <center><img src="3.jpg" alt="book" class="img-rounded" width="460" height="345"></center>
      </div>
    
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>
