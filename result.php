<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        ol {
            background: #ff9999;
            padding: 20px;
            text-align: center;
            width: 70%;
            margin-left: 13%;
        }
        li{
            margin: 10px 0;
        }

ol li {
  background: #ffe5e5;
  padding: 5px;
  margin-left: 35px;
    font-size: 1.3em;
}
    </style>
</head>
<body style="background-color:grey;">
    <h1><center>Result</center></h1>
</body>
</html>

<?php
    session_start();
    include 'includes/dbh.inc.php';
    $var = $_SESSION['email'];
    $sql = "select * from quizname where instructoremail = '".$var."';";
    $result = mysqli_query($conn,$sql) or die("error in showing email id");
    if(mysqli_num_rows($result)>0)
    {
        echo "<ol>";
        while($row = mysqli_fetch_assoc($result))
        {
            $testname = $row['quiz'];
            $as = "topicWiseResult.php?testname="."$testname";
            echo "<li><a href='$as'>".$row['quiz']."</a>"."</li>";
        }
        echo "</ol>";
    }
    else
    {
        echo "<h1>NO QUIZ RESULT</h1>"."<br>";
    }

?>
