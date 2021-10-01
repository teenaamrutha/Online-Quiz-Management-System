<?php
    $con=mysqli_connect("localhost","root","","qms");
    if(!$con)
    {
    echo "error";
    }
    session_start();
    // $tid=$_SESSION["tid"];
    // $total= $_SESSION["total"];
    // $sid=$_SESSION["sid"];
    // $num=$_SESSION["num"];
    // $code=$_SESSION["code"];
    $score=$_SESSION["score"];
    $answer=$_SESSION["answer"];
    if(isset($_POST["answer"])) 
    {
    $answered=$_POST["answer"];
    if($answered==$answer)
       {$score+=$_SESSION["marks"];
        $_SESSION["score"]=$score;} 
   }

   header("refresh:0;url=answerinput.php");
  

    ?>