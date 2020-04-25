<?php
    session_start();
    include 'includes/dbh.inc.php';
    $var = $_SESSION["email"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .imageprofile{
            border: 2px solid red;
            width: 10em;
            height: 10em;
            border-radius: 100px;
            overflow: hidden;
            margin-top: 25% ;
        }
        img{
            background-size: cover;
            background-repeat: no-repeat;
            max-height: 100%;
        }
        .quizDetail
        {
            border: 2px solid red;
            margin-top: 25%;
        }
    </style>
</head>
<body style="background-color:grey;">
   <center>

    <?php
       $sql = "select * from profileimg where emailid = '$var';";
       $result = mysqli_query($conn,$sql) or die("error");
        $resultCheck = mysqli_num_rows($result);
       //echo "$resultCheck";
       if($resultCheck>0)
       {
           //$row = mysqli_fetch_assoc($result);
           $sql = "select * from student where email = '$var';";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $fname = $row['fname'];
           echo "<div class='imageprofile'>";
           $s = "image/profile"."$fname".".jpg";
           echo "<img src='$s' alt='profile.pic'>";
           echo "</div>";
           //echo "$s"."<br>";
           echo "$s";

       }
       else
       {
           echo '<div class="imageprofile">
                <img src="image/image2.jpg" alt="default Image" >
                </div>';
       }
       ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="imgupload">Upload</button>
    </form>
    </center>

</body>
</html>
