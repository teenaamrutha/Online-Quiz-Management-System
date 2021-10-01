<?php
    $con=mysqli_connect("localhost","root","","qms");
    if(!$con)
    {
    echo "error";
    }
    session_start();
    $sid=$_SESSION['sid'];
    $scode=$_POST['code'];
    $sql="select * from quiz where code=$scode";
    $result=mysqli_query($con,$sql);
    if (mysqli_num_rows($result) ==1) 
    { $row = mysqli_fetch_assoc($result);
     $_SESSION["tid"]=$row["tid"];
     $_SESSION["total"]=$row["num"];
     $_SESSION["num"]=1;
    $_SESSION["code"]=$scode;
     $_SESSION["score"]=0;
     $_SESSION["marks"]=$row['marks'];
     header("refresh:0;url=answerinput.php");
    }
    else
    {
        echo "Quiz with the code ".$scode."doesnot exist"; 
    }
?>