<?php
echo '<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styleqms.css">
  <style>
      body{  
  background-image: url("quiz_dim.jpg");
    background-repeat: no-repeat;
    background-size: cover;
  }
  </style>
</head>
<body>

<ul>
  <li><a href="welcome-student.php" style="border-left: 2px solid #bbb">Dashboard</a></li>
  <li style="float:left "><a  href="homepage.html"><b>QMS</b></a></li>
</ul>

<form action="takequiz.php" method="POST">
  <div class="container" style="margin-bottom:10%">
    <h1>Take Quiz</h1>
    <hr>
    <label for="code"><b>Code</b></label>
    <input type="text" placeholder="Enter Code" name="code" id="code" required>
    <button type="submit" class="registerbtn" style="margin:0 0">Take</button>
  </div></div>
</form>


</body>
</html> ';

?>