<?php
$con=mysqli_connect("localhost","root","","qms");
if(!$con)
 {
 echo "error";
 }
session_start();
$code=$_SESSION['code'];
  $num=$_SESSION['num'];
  $total=$_SESSION['total'];
//   echo "code is".$code;
  $qno=$total-$num;
  $ques=$_POST['ques'];
  $correct_answer=$_POST['correct_answer'];
  $opt1=$_POST['opt1'];
  $opt2=$_POST['opt2'];
  $opt3=$_POST['opt3'];
  $opt4=$_POST['opt4'];
$sql="INSERT INTO questions(qno,question,correctanswer,code,opt1,opt2,opt3,opt4) values('$qno','$ques','$correct_answer','$code','$opt1','$opt2','$opt3','$opt4')";
  if(!mysqli_query($con,$sql))
    {
    echo "not inserted";
    } 
 header("refresh:0;url=addquestions.php");

    ?>