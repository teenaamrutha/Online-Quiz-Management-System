<?php
$con=mysqli_connect("localhost","root","","qms");
if(!$con)
{
echo "error";
}
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$sql="insert into contact(firstname,lastname,email,subject) values ('$fname','$lname','$email','$subject')";
if(mysqli_query($con,$sql))
{
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
    
      input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }
    
    
    </style>
    </head>
    <body>
    
    <ul>
      
      
      <li>
        <div class="dropdown">
          <button  class="dropbtn">Register 
            <i class="fa fa-caret-down"></i>
          </button>
          <div  class="dropdown-content">
            <a style="padding: 20px;float:left;" href="register-teacher.html">Register as Teacher</a>
            <a style="padding: 20px;float:left;"href="register-student.html">Register as Student</a>
      </li>
    <li ><div class="dropdown">
      <button style="border-left: 2px solid #bbb" class="dropbtn">Login 
        <i class="fa fa-caret-down"></i>
      </button>
      <div  class="dropdown-content">
        <a href="login-teacher.html">Login as Teacher</a>
        <a href="login-student.html">Login as Student</a>
      </div></li>
     
      <li style="float:left "><a  href="homepage.html"><b>QMS</b></a></li>
      
      
    </ul> 
     
    <h1 style="color:rgba(14, 126, 24, 0.863);background-color:white;text-align:center;width:30%;margin-left:auto;margin-right:auto">Thank you.<br>
    Your request is submitted successfully<br>
    We will get back to you soon</h1>
    </body>
    </html>
    ';
}
?>