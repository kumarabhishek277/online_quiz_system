<?php
    session_start();
    include 'includes/dbh.inc.php';
    $var = $_SESSION["email"];
    $a = $_SESSION["user"];
    if($a == "instructor")
    {
        $sql = "select * from instructor where email = '$var';";
    }
    else
    {
        $sql = "select * from student where email = '$var';";
    }
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $fname = $row['fname'];
    $lname = $row['lname'];
    $gender = $row['gender'];
    $email = $row['email'];
    $dob = $row['dob'];
    $address = $row['address'];
    $mobNumber = $row['mobNumber'];
    $username = $row['username'];
    $nationality = $row['nationality'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table{
            font-size: 1.3em;
        }
        td
        {
            padding-top: 15px;
        }
        input{
            border-radius: 12px;
            width: 254px;
            height: 30px;
        }
        button{
            margin-top: 15px;
            width: 130px;
            height: 40px;
            border-radius: 12px;
            background-color: aqua;
        }
    </style>
</head>
<body>
    <div>
        <center><h3>Profile Information</h3>
        <form action="includes/updateprofile_inc.php" method="POST">
            <table>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname" value='<?php echo "$fname"?>'></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lname" value='<?php echo "$lname"?>'></td>
            </tr>
            <tr>
                <td>User name</td>
                <td><input type="text" name="username" value='<?php echo "$username"?>'></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><input type="number" name="mob" value='<?php echo "$mobNumber"?>'></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" value='<?php echo "$address"?>'></td>
            </tr>
        </table>
        <button type="submit" name="updatesubmit">Update</button>
        </form>
        </center>
    </div>
</body>
</html>
