<?php
session_start();

require 'includes/dbh.inc.php';
$var = $_SESSION["email"];
$sql = "select * from student where email = '$var';";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $fname = $row['fname'];
//echo "$var";

if(isset($_POST['imgupload'])){
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg');

    if(in_array($fileActualExt,$allowed)){

        if($fileError === 0){

            if($fileSize < 20000000){

                $fileNameNew = "profile".$fname.".".$fileActualExt;
                $fileDestination = 'image/'.$fileNameNew;
                //echo "1"."<br>";
            move_uploaded_file($fileTmpName,$fileDestination);
                //echo "2"."<br>";
                //echo "Uploaded successfully";
                $sql = "select * from profileimg where emailid = '$var';";
                $result = mysqli_query($conn,$sql);// or die("error");
                //$count = mysqli_num_rows($result);
                if(mysqli_num_rows($result)>0)
                {
                    $sql = "delete from profileimg where emailid = '$var';";
                    $result=mysqli_query($conn,$sql) or die("error in deletion");
                    echo "$result";
                    //echo "$result"." inside if statement";
                }
                $stat = 1;
                $sql = "insert into profileimg values('$var','$stat');";
                $result=mysqli_query($conn,$sql) or die("error result");
                echo "successfully changed "."$result";
                //echo "$result"." outside if statement";
                $sql = "select * from student where email='".$var."';";
                $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    header("Location: studentLeft.php?uploadimage=success");
                }
                else
                {
                    header("Location: instructorLeft.php?uploadimage=success");
                }


            }else{
                echo "File size is too big";
            }

        }else{
            echo "There is some error in uploading your file";
        }

    }else{
        echo "You cannot upload file of this type";
    }


}

?>
