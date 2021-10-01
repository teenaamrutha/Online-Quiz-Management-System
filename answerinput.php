<?php
    $con=mysqli_connect("localhost","root","","qms");
    if(!$con)
    {
    echo "error";
    }
    session_start();
    $tid=$_SESSION["tid"];
    $total= $_SESSION["total"];
    $sid=$_SESSION["sid"];
    $num=$_SESSION["num"];
    $code=$_SESSION["code"];
    $score=$_SESSION["score"];
    echo '
    <head>
      <link rel="stylesheet" href="radio.css">
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
           margin-top:5%;
           padding-top:2%;
           border-radius:5%;
           padding-left:2%;
           padding-bottom:2%;
           padding-right:2%;
        }
      </style>
    </head>';
    if($num<=$total)
    {
        $sql="select question,opt1,opt2,opt3,opt4,correctanswer from questions where code=$code and qno=$num";
        $result=mysqli_query($con,$sql);
        if (mysqli_num_rows($result)==1) 
        {
            $row = mysqli_fetch_assoc($result);


            echo ' </br> <form action="evaluate.php" method="post">
            <div class="container1"><h3>Question '
            .$num.'</h3><h2>'.$row["question"].
            '</h2><label class="container">'.$row["opt1"].'    
        <input type="radio" class="container" name="answer" value="'.$row["opt1"].'" <?php if (isset($answer) && $answer=="'.$row["opt1"].'") echo "checked";?>
        <span class="checkmark"></span></label>
        <label class="container">'.$row["opt2"].'
        <input type="radio" class="container" name="answer" value="'.$row["opt2"].'" <?php if (isset($answer) && $answer=="'.$row["opt2"].'") echo "checked";?>
        <span class="checkmark"></span></label>
        <label class="container">'.$row["opt3"].'
        <input type="radio" class="container" name="answer" value="'.$row["opt3"].'" <?php if (isset($answer) && $answer=="'.$row["opt3"].'") echo "checked";?>
        <span class="checkmark"></span></label>
        <label class="container">'.$row["opt4"].'
        <input type="radio" class="container" name="answer" value="'.$row["opt4"].'" <?php if (isset($answer) && $answer=="'.$row["opt4"].'") echo "checked";?>
        <span class="checkmark"></span></label>
        
    
        <input class="button1" type="submit" name="submit" >
        <br></div> </form>';
        $_SESSION["answer"]=$row["correctanswer"];
        $_SESSION["num"]=$num=$num+1;;
        }
        else
        {
            echo "could not fetch question";
        }
   
    }
    else{
        // echo "<b>Your Score is:</b>".$_SESSION["score"];
        // echo "<b>Quiz submitted successfully</b>";
        header("refresh:0;url=score.php");
    }

?>