<?php
 $con=mysqli_connect("localhost","root","","qms");
 if(!$con)
 {
 echo "error";
 }
 session_start();
 $sid=$_SESSION['sid'];
echo
'<!DOCTYPE html>
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
 <li ><div class="dropdown">
 <button  class="dropbtn">
'.$_SESSION['fname'].' 
   <i class="fa fa-caret-down"></i>
 </button>
 <div  class="dropdown-content">
   <a href="logoutteacher.php">Log out</a>
 </div></li>
   <li ><a href="leaderboardstudent.html">View Leaderboard</a></li>
  <li ><a style="border-left: 2px solid #bbb" href="takequiz1.php">Take Quiz</a></li>
   <li style="float:left "><a  href="homepage.html"><b>QMS</b></a></li>    
</ul>
</body>
</html>';
$sql="select * from score where sid=$sid;";
$result=mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0) 
{
  echo '<div class="tab"><h1 style="color:rgba(14, 126, 24, 0.863); text-align:center;"><b>Dashboard</b></h1>
  <table  id="customers"><tr><th>Quiz Name</th><th>Code</th><th>Teacher Name</th><th>Score</th><th>Max Score</th></tr>';

 while ($row = mysqli_fetch_assoc($result))
 {
 $sco=$row['sco'];
 $code=$row['code'];
 $sql1="select * from quiz where code=$code";
 $result1=mysqli_query($con,$sql1);
 $row1=mysqli_fetch_assoc($result1);
 $tid=$row1['tid'];
 $maxscore=$row1['marks']*$row1['num'];
 $sql2="select * from teacher where tid=$tid";
 $result2=mysqli_query($con,$sql2);
 $row2=mysqli_fetch_assoc($result2);
  echo '
  <style>
  .tab{
    background-color: white;
    width:60%;
    margin-left:auto;
    margin-right:auto;
    padding-left:2%;
    padding-right:2%;
    padding-top:2%;
    padding-bottom:2%;
    margin-top:5%;
  }
  #customers {
    font-family:"Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif ;
    border-collapse: collapse;
   margin-left:auto;
   margin-right:auto;
    padding:8px;
    width:100%;
    
  }
  
  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
  #customers tr:nth-child(even){background-color: #f2f2f2;}
  
  #customers tr:hover {background-color: #ddd;}
  
  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: rgba(14, 126, 24, 0.863);
    color: white;}
  </style>
  <tr><td>'.$row1["qname"].'</td><td>'.$row["code"].'</td><td>'.$row2["firstname"]." ".$row2["lastname"].'</td><td>'.$sco.'</td><td>'.$maxscore.'</td></tr>';
 }
 echo '</table></div>';
}
  else {
    echo '<h1 style="color:rgba(14, 126, 24, 0.863);background-color:white;text-align:center;width:30%;margin-left:auto;margin-right:auto">No quizzes attempted</h1>';
  }
  

?>
