<?php
    $con=mysqli_connect("localhost","root","","qms");
    if(!$con)
    {
    echo "error";
    }
    session_start();
    $qname=$_POST['qname'];
    $num=$_POST['num'];
    $marks=$_POST['marks'];
    $tid=$_SESSION['tid'];
    $code = rand(1,100000);
    $sql="INSERT INTO quiz(qname,num,marks,tid,code) values('$qname','$num','$marks','$tid','$code')";
    $result= mysqli_query($con,$sql);
    $_SESSION['code']=$code;
    $_SESSION['total']=$num;
    $_SESSION['num']=$num;
    header("refresh:0;url=addquestions.php");
   
    
?>

