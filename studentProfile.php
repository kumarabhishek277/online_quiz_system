
<!DOCTYPE html>


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
        }
        button{
            margin-top: 15px;
            width: 130px;
            height: 40px;
            border-radius: 12px;
            background-color: aqua;
        }
        a{
            border: 2px solid red;
            font-size: 1.4em;
            margin-right: 113px;
            padding: 20px;
            background-color: grey;
            color: white;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <p style=" font-size:32px; color:blue; float:right;padding-right: 30px;">Hello <?php echo "$username"?></p>
   <div>
       <center><h1>Profile Information</h1>
       <table>
           <tr>
               <td>Name: </td>
               <td><?php echo "$fname"." $lname";?></td>
           </tr>
           <tr>
               <td>Username: </td>
               <td><?php echo "$username";?></td>
           </tr>
           <tr>
               <td>email: </td>
               <td><?php echo "$email";?></td>
           </tr>
           <tr>
               <td>Gender: </td>
               <td><?php echo "$gender";?></td>
           </tr>
           <tr>
               <td>Date of Birth:  </td>
               <td><?php echo "$dob";?></td>
           </tr>
           <tr>
               <td>Nationality: </td>
               <td><?php echo "$nationality";?></td>
           </tr>
           <tr>
               <td>Mob. Number </td>
               <td><?php echo "$mobNumber";?></td>
           </tr>
           <tr>
               <td>Address: </td>
               <td><?php echo "$address";?></td>
           </tr>
       </table>
           <p style="margin-top: 35px;"><a href="update_profile.php" target="_self">Update Information</a></p><br>
           <div>
               <a href="deleteaccount.php" target="_top">Delete Account</a>
           </div>
           <!--<form method ="POST" action="deleteaccount.php" name="signUp">
               <button type="submit" name="deleteac">Delete ACcount</button>
           </form>-->
       </center>
   </div>

</body>
</html>
