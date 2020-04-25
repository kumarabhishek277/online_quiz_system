<?php

include_once 'dbh.inc.php';
session_start();

if(isset($_POST['updatesubmit']))
{

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $mobNum = $_POST["mob"];
    $address = $_POST["address"];
    $var = $_SESSION['email'];
    $a = $_SESSION["user"];
    if($a == "instructor")
    {
        $sql = "update instructor set fname = '$fname',lname = '$lname', username = '$username', mobNumber = '$mobNum', address = '$address'  where email='$var';";
    }
    else
    {
        $sql = "update student set fname = '$fname',lname = '$lname', username = '$username', mobNumber = '$mobNum', address = '$address'  where email='$var';";
    }

    mysqli_query($conn,$sql);
    echo '<div style = "border:2px solid red; font-size: 2.4em; margin: auto;padding-left:30%;width:55%; background-color:grey;color:white ">
    <h3>Updated Successfully</h3>
</div>';

}
else
{
    header("Location ../studentProfile.php?update=fail");
    exit();
}

?>

