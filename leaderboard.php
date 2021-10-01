<?php
echo '<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="styleqms.css">

</head>
<body>

<ul>
  

  <li><a href="welcome-teacher.php" style="border-left: 2px solid #bbb">Dashboard</a></li>
  <li style="float:left "><a  href="homepage.html"><b>QMS</b></a></li>
</ul>
';
 $con=mysqli_connect("localhost","root","","qms");
 if(!$con)
 {
 echo "error";
 }
 session_start();
$n=1;
 $code=$_POST["code"];
//  $sql="select * from score where code=$code order by sco DESC";
 $sql="SELECT sid, 
       sco,  
       RANK() OVER(ORDER BY sco DESC) Rank
FROM score where code=$code
ORDER BY Rank;";
 $result=mysqli_query($con,$sql);
 if (mysqli_num_rows($result) > 0) 
{
  echo '<body><div class="tab"><h1 style="color:rgba(14, 126, 24, 0.863); text-align:center;"><b>Leaderboard</b></h1>
  <table  id="customers"><tr><th>Sno</th><th>Student Name</th><th>Marks Scored</th><th>Rank</th></tr>';

 while ($row = mysqli_fetch_assoc($result))
 {
     $sid=$row['sid'];
 $sql1="select * from student where sid=$sid";
 $result1=mysqli_query($con,$sql1);
 $row1 = mysqli_fetch_assoc($result1);
  echo '
  <style>
  body{  
    background-image: url("quiz_dim.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }
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
  <tr><td>'.$n.'</td><td>'.$row1["firstname"].' '.$row1["lastname"].'</td><td>'.$row['sco'].'</td><td>'.$row['Rank'].'</td></tr>';
  $n+=1;
 }
 echo '</table></div></body>';}
 else
{
    echo '<h1 style="color:rgba(14, 126, 24, 0.863);background-color:white;text-align:center;width:30%;margin-left:auto;margin-right:auto">No students attempted yet</h1>';
}


 ?>