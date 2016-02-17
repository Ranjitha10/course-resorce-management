
<!DOCTYPE html>
<html lang="en">
<head>
  <title>COURSE RESOURCE MANAGEMENT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.css">
  <style>
	body{
  background-image: url(swirl_pattern.png);
  background-repeat:repeat;
}
  </style>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container-fluid">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="/courseportal/homepage.php">Course Portal</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						<li class="active"><a href="/courseportal/homepage.php">Home <span class="sr-only">(current)</span></a></li>
					  </ul>
					  
					  <ul class="nav navbar-nav navbar-right">
						<li class="dropdown" >
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sign Up <span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="/courseportal/student.php">Student</a></li>
							<li class="divider"></li>
							<li><a href="/courseportal/staff.php">Faculty</a></li>
						  </ul>
						</li
						
					  </ul>
					  <ul class="nav navbar-nav navbar-right">
						<li class="dropdown" >
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Login <span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
							<li><a href="/courseportal/Student_login.php">Student</a></li>
							<li class="divider"></li>
							<li><a href="/courseportal/Staff_login.php">Faculty</a></li>
						  </ul>
						</li
						
					  </ul>
					</div>
		  </div>
		</nav>


<div class="container">
  <br>
  <br>
  <br>
  <br>
  <br>
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
        <center><img src="1.png" alt="book" class="img-rounded"  width="1200" height="345"></center>
      </div>

      <div class="item">
        <center><img src="2.png" alt="book" class="img-rounded" width="1200" height="345"></center>
      </div>
	  
	   <div class="item">
        <center><img src="3.png" alt="book" class="img-rounded" width="1200" height="345"></center>
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
