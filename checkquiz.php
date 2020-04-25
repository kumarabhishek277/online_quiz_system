<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>HELLO</h1>
</body>
</html>


<?php
    session_start();
    include 'includes/dbh.inc.php';
    $data = $_GET["testname"];
    echo "$data"."<br>";
    $count = 0;
    $sql = "select * from ".$data.";";
    $result = mysqli_query($conn,$sql) or die("error in answer checking");
    $count = 0;
    $marks = 0;
    while($row = mysqli_fetch_assoc($result))
    {
        $correctanswer = $row['answer'];
        $choosedanswer = $_POST["$count"];
        echo "$choosedanswer"."<br>";
        if($correctanswer == $choosedanswer)
        {
          $marks = $marks + 1;
        }
        $count = $count+1;
    }
    //echo "$marks"."<br>";
    $studentemail = $_SESSION['email'];
    //echo "$studentemail";
    $sql = "insert into result values('$data','$studentemail','$marks');";
    mysqli_query($conn,$sql) or die("Something is wrong.\nEither databse is not working or you have already given the exam");
    header("Location: Quiz.php")
    //$sql = "insert into values"
?>
