<?php
include 'includes/dbh.inc.php';
session_start();
$var = $_SESSION['email'];
echo "$var"."<br>";
$comment = $_POST['comment'];
echo "$comment"."<br>";
$quiz = $_POST['test'];
echo "$quiz";
$sql = "insert into feedbackform values('$quiz','$var','$comment');";
$res = mysqli_query($conn,$sql) or die("error");
echo "<br>"."HAPPY";
header("Location: Quiz.php");
