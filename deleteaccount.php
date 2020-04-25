

<?php
session_start();
include 'includes/dbh.inc.php';
$var = $_SESSION["email"];
$sql = "DELETE FROM student WHERE email = '$var';";
if(mysqli_query($conn, $sql)){
    $sql = "delete from profileimg where emailid = '$var';";
    if(mysqli_query($conn,$sql)){
        session_destroy();
        header("Location: index.php");
    }else{
        echo "<h1>Couldn't complete the work.</h1>";
    }
} else{
    echo "<h1>Couldn't complete the work.</h1>";
}
mysqli_close($conn);
?>
