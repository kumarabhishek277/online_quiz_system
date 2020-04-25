<?php
    include 'includes/dbh.inc.php';
    $data = $_GET["testname"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        #resultlist {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #resultlist td, #resultlist th {
          border: 1px solid #ddd;
          padding: 8px;
            text-align: center;
        }

        #resultlist tr:nth-child(even){background-color: #f2f2f2;}

        #resultlist tr:hover {background-color: #ddd;}

        #resultlist th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: center;
          background-color: #4CAF50;
          color: white;
        }
        .container{
            border: 2px solid red;
            width: 80%;
            margin: auto;
        }
        #quiztitle{
            font-size: 2.3em;
            color: white;
            text-align: center;
            width: 80%;
            margin: auto;
        }
    </style>
</head>
<body style="background-color:grey;">
    <p id="quiztitle">
       <b>
       <?php
          $sql = "select * from ".$data.";";
           $result = mysqli_query($conn,$sql) or die("Not getting number of questions");
           $numberOfQues = mysqli_num_rows($result);
           echo "$data"."<br>"?>
        </b>
    </p>
    <p style="width: 80%;margin: auto; color:white;font-size:1.1em;">
        <?php
               $sql = "select * from student;";
               $totalstudents = mysqli_num_rows(mysqli_query($conn,$sql));
               $sql = "select * from result where name = '".$data."';";
               $givenexam = mysqli_num_rows(mysqli_query($conn,$sql));
               $notgiven = $totalstudents - $givenexam;
               echo "Number of Questions: ".$numberOfQues."<br>Total Marks: ".$numberOfQues."<br>Total number of Students: ".$totalstudents."<br>Number of students given exam: ".$givenexam."<br>Number of student not attempted: ".$notgiven."<br>";
        ?>

    </p>
    <br>
    <div class="container">
    <?php
    $sql = "select * from result where name = '"."$data"."';";
    $result = mysqli_query($conn,$sql) or die("cannot retrieve the result");
    //if(mysqli_num_rows($result)>0)
    //{

        echo "<table border='1' id='resultlist'>";
        echo "<tr><th>Name</th><th>Email</th><th>Marks</th><th>Comment</th></tr>";
        while($row = mysqli_fetch_assoc($result))
        {
            $email = $row['studentemail'];
            $marks = $row['marks'];
            $sql = "select * from student where email = '".$email."';";
            $res = mysqli_query($conn,$sql) or die("Error in getting name of the candidate");
            $rows = mysqli_fetch_assoc($res);
            $name = $rows['fname']." ".$rows['lname'];
            $sql = "select * from feedbackform where quizname = '".$data."' and studentemail = '".$email."';";
            $r = mysqli_query($conn,$sql) or die("eror");
            if(mysqli_num_rows($r) > 0)
            {
                $rows = mysqli_fetch_assoc($r);
                $comment = $rows['comment'];
                echo "<tr><td>"."$name"."</td><td>"."$email "."</td><td>"."$marks"."</td><td>".$comment."</td></tr>";
            }
            else
            {
                echo "<tr><td>"."$name"."</td><td>"."$email "."</td><td>"."$marks"."</td><td>No Comment</td></tr>";
            }

        }
        echo "</table>";
    //}
    //else
    //{
      //  echo "No one has given the exam yet";
    //}
?>
    </div>
</body>
</html>


