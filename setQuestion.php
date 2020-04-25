
<?php
session_start();
$var = $_SESSION['email'];
include 'includes/dbh.inc.php';
$totalques = $_COOKIE["totalques"];
$paperName = $_POST["paperName"];
echo "$paperName"."<br>";
$sql = 'create table '.$paperName.' (question varchar(255) not null ,option0 varchar(255) not null,option1 varchar(255) not null,option2 varchar(255) not null,option3 varchar(255) not null,answer varchar(255) not null);';
$result = mysqli_query($conn,$sql) or die("error in mysql");
$sql = "insert into quizname values ('$paperName','$var');";
mysqli_query($conn,$sql) or die("error in inserting values in quizname");
$ques = $_POST["ques"."0"];
for($i =0;$i<$totalques;$i=$i+1)
{
    $ques = $_POST["ques"."$i"];
    //echo "$ques"."<br>";
    $option0 = $_POST["option"."$i"."0"];
    //echo "$option0","<br>";
    $option1 = $_POST["option"."$i"."1"];
    //echo "$option1"."<br>";
    $option2 = $_POST["option"."$i"."2"];
    //echo "$option2"."<br>";
    $option3 = $_POST["option"."$i"."3"];
    //echo "$option3"."<br>";
    $answer = $_POST["answer"."$i"];
    //echo "$answer"."<br>";
    //$c = $i+1;
    //echo "$c"."<br>";
    $sql = "insert into ".$paperName." values('$ques','$option0','$option1','$option2','$option3','$answer');";
    mysqli_query($conn,$sql) or die("error in sending data");
}
header("Location: setQuiz.php?success");

?>
