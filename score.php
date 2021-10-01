<?php
 $con=mysqli_connect("localhost","root","","qms");
 if(!$con)
 {
 echo "error";
 }
 session_start();
$sco=$_SESSION['score'];
$sid=$_SESSION['sid'];
$code=$_SESSION['code'];
$sql="insert into score(sid,code,sco) values('$sid','$code','$sco');";
if(mysqli_query($con,$sql))
{    echo '<head>
    <style>
    body{  
      background-image: url("quiz_dim.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
      }
      .button1 {
          background-color: #04AA6D;
          color: white;
          padding: 14px 20px;
          margin: 50px 0;
          border: none;
          cursor: pointer;
          width:100%;
          font-style:bold;
          font-size:20px;
        }
        
        
        .button1:hover {
          opacity: 0.8;
        }
      .container1
      {
         background-color:white;
         width:50%;
         margin-left:auto;
         margin-right:auto;
         margin-top:10%;
         padding-top:2%;
         border-radius:5%;
         padding-left:2%;
         padding-bottom:2%;
         padding-right:2%;
      }
    </style>
  </head><body>
  <form action="welcome-student.php">
  <div class="container1"><h2>Your score is '.$_SESSION['score'].'</h2>
  <input class="button1" type="submit" name="submit" value="GO TO DASHBOARD"></div></form></body>';   
}
?>

