
<?php
    session_start();
    include 'includes/dbh.inc.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/quizstyle.css">
    <style>
        .container{
            border: 2px solid red;
            width: 80%;
            margin: auto;
        }
        #quizlist {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        #quizlist td, #quizlist th {
          border: 1px solid #ddd;
          padding: 8px;
            text-align: center;
        }

        #quizlist tr:nth-child(even){background-color: #f2f2f2;}

        #quizlist tr:hover {background-color: #ddd;}

        #quizlist th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: center;
          background-color: #4CAF50;
          color: white;
    </style>
</head>
<body style="background-color:grey;">
    <center><h1>List of Quizzess</h1></center>
    <div class="container">
        <?php
            $sql = "select * from quizname;";
            $result = mysqli_query($conn,$sql) or die("error in retrieveing quiz name");
            echo "<table id='quizlist'>";
            echo "<tr><th>Quiz Name</th><th>Marks(total marks)</th><th>Comment</th></tr>";
            while ($row = mysqli_fetch_assoc($result))
            {
                $testname = $row['quiz'];
                $var = $_SESSION["email"];
                $sql = "select * from result where name = '"."$testname"."' and studentemail = '"."$var"."';";
                $res = mysqli_query($conn,$sql) or die("don't know");
                if(mysqli_num_rows($res)>0)
                {
                    $sql = "select * from "."$testname".";";
                    $q = mysqli_query($conn,$sql) or die("error");
                    $totalques = mysqli_num_rows($q);
                    $rows = mysqli_fetch_assoc($res);
                    $marks = $rows['marks'];
                    //$sql = "select * from feedback where quizname = '".$testname."' and studentemail = '".$var."';";
                    $as = "feedback.php?testname="."$testname";
                    $sql = "select * from feedbackform where studentemail = '".$var."' and quizname = '".$testname."';";
                    $r = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($r)>0)
                    {
                        echo "<tr><td>"."$testname"."</td><td>"."$marks"."(".$totalques.")</td><td>Feedback Saved</tr>";
                    }
                    else
                    {
                        echo "<tr><td>"."$testname"."</td><td>"."$marks"."(".$totalques.")</td><td><a href='$as'>FEEDBACK</a></td></tr>";
                    }

                }
                else
                {
                    $as = "takequiz.php?testname="."$testname";
                    echo "<tr><td><a href='$as'>".$row['quiz']."</a></td><td>Not attempted</td><td>Disable</td></tr>";
                }

            }
        echo "</table>";
        ?>
    </div>




</body>
</html>
