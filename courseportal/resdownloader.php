<?php
session_start();
?>
<!DOCTYPE HTML lang ="en"> 
<html>
<head>
<style>

  .navbar-default {
  background-color: #000;
  border-color: #000;
}
.navbar-default .navbar-brand {
  color: #1b1c1c;
}
.navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus {
  color: #040404;
}
.navbar-default .navbar-text {
  color: #1b1c1c;
}
.navbar-default .navbar-nav > li > a {
  color: #1b1c1c;
}
.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
  color: #040404;
}
.navbar-default .navbar-nav > li > .dropdown-menu {
  background-color: #bdd3db;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > a {
  color: #1b1c1c;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
.navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
  color: #040404;
  background-color: #929494;
}
.navbar-default .navbar-nav > li > .dropdown-menu > li > .divider {
  background-color: #bdd3db;
}
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
  color: #040404;
  background-color: #929494;
}
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
  color: #040404;
  background-color: #929494;
}
.navbar-default .navbar-toggle {
  border-color: #929494;
}
.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
  background-color: #929494;
}
.navbar-default .navbar-toggle .icon-bar {
  background-color: #1b1c1c;
}
.navbar-default .navbar-collapse,
.navbar-default .navbar-form {
  border-color: #1b1c1c;
}
.navbar-default .navbar-link {
  color: #1b1c1c;
}
.navbar-default .navbar-link:hover {
  color: #040404;
}

@media (max-width: 767px) {
  .navbar-default .navbar-nav .open .dropdown-menu > li > a {
    color: #1b1c1c;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
    color: #040404;
  }
  .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
    color: #040404;
    background-color: #929494;
  }
}
  
  
</style>

<title>Staff home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  
  

  
  
</head>
<head>
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
        <li class="active"><a href="/staff_course_home.php/">Home</a></li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Assignment<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/assignment_creation.php/">Create Assignment </a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/assignment_download.php/">Download Assignments </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/assignment_manage.php/">View/Delete Assignments </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/modifyass.php/">Change Lastdate</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Course resource <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/ResourceUpoad.php/">Upload course resource </a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/resdownload.php/">Download course resource </a> </li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/resdelete.php/">Delete course resource </a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a href="/viewres.php/">View course resource </a></li>
          </ul>
        </li>
		<li class="active"><a href="/listofstudents.php/">Manage students</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">About us <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="presentation"><a href="/about.html/">About website</a></li>
            <li role="presentation" class="divider"></li>
            <li role="presentation"><a href="/contact.html/">Contact info</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li class="active"><a href="/logout.php/">Logout</a></li>
</div>
</nav>
<div class="container">
  <div class="jumbotron">
    <h2 >COURSE RESOURCE MANAGEMENT</h2>   
		
  </div>
</div>

<div class="container">
<div class="jumbotron" >
<h3>Course Resource</h3>
<hr>

<form action = "/sdownload.php/" method= "POST" >
<strong>Resource type:</strong><br><br>
   <input type="radio" name="rtype" <?php if (isset($rtype) && $rtype=="CoursePPT") echo "checked";?>  value="CoursePPT">CoursePPT
   <br><br>
   <input type="radio" name="rtype" <?php if (isset($rtype) && $rtype=="QuestionBank") echo "checked";?>  value="QuestionBank">QuestionBank
   <br><br>
   <input type="radio" name="rtype" <?php if (isset($rtype) && $rtype=="LessonPlan") echo "checked";?>  value="LessonPlan">LessonPlan
   <br><br>
   <input type="radio" name="rtype" <?php if (isset($rtype) && $rtype=="ModelQuestionPaper") echo "checked";?>  value="ModelQuestionPaper">ModelQuestionPaper
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
<br><br>
</div>
</div></div>
</div>
</body>
</html>