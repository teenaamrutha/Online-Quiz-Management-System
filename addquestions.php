<?php
  $con=mysqli_connect("localhost","root","","qms");
  if(!$con)
  {
  echo "error";
  }
  session_start();

  
  $code=$_SESSION['code'];
  $num=$_SESSION['num'];
  // echo "code is".$code;
  $total=$_SESSION['total'];
// echo "Question number:".$total-$num+1;
if($num>0){
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
    
    
    
    <form action="http://localhost/qms/questionsintodb.php" method="post">
      <div class="container" style="margin-bottom:10%">
        <h1>Add Questions</h1>
        <hr>
        
        <label for="ques"><b>Question</b></label>
        <input type="text" placeholder="Enter Question" name="ques" id="ques" required>
    
        <label for="correct_answer"><b>Correct answer</b></label>
        <input type="text" placeholder="Enter correct answer" name="correct_answer" id="correct_answer" required>
        
        <label for="opt1"><b>A</b></label>
        <input type="text" placeholder="Enter option A" name="opt1" id="opt1" required>

        <label for="opt2"><b>B</b></label>
        <input type="text" placeholder="Enter option B" name="opt2" id="opt2" required>

        <label for="opt3"><b>C</b></label>
        <input type="text" placeholder="Enter option C" name="opt3" id="opt3" required>

        <label for="opt4"><b>D</b></label>
        <input type="text" placeholder="Enter option D" name="opt4" id="opt4" required>
    
        
        <button type="submit" class="registerbtn" style="margin:0 0">Create</button>
      </div>
    </form>
    </body>
    </html>';
    $_SESSION['num']=$num-1;
  }
  else{
    header("refresh:0;url=welcome-teacher.php");

  }
    ?>