<?php



    if(isset($_POST['loginsubmit']))
    {
        include 'dbh.inc.php';
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $user = $_POST["user"];
        if( empty($email) || empty($pwd) || empty($user)){
            header("Location: ../signin.php?login=empty");
            exit();
        }
        else{
            if($user == "student")
            {
                $sql = "select * from student where email = '$email';";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck < 1){
                    header("Location: ../signin.php?login=error1");
                    exit();
                }
                else{
                    $row = mysqli_fetch_assoc($result);
                    //echo "$row['user_uid']";

                    if($pwd != $row['pword']){
                        header("Location: ../index.php?login=error2");
                        exit();
                    }
                    elseif($pwd == $row['pword']){
                        session_start();
                        $_SESSION['email']=$email;
                        $_SESSION['status'] = "active";
                        $_SESSION['user']=$user;
                        header("Location: ../studentprof.php?login=success");
                        exit();
                    }
                    else{
                        header("Location: ../signin.php?login=error3");
                        exit();
                    }

                }
            }
            if($user == "instructor")
            {
                $sql = "select * from instructor where email = '$email';";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck < 1){
                    header("Location: ../signin.php?login=error1");
                    exit();
                }
                else{
                    $row = mysqli_fetch_assoc($result);
                    if($pwd != $row['pword']){
                        header("Location: ../index.php?login=error2");
                        exit();
                    }
                    elseif($pwd == $row['pword']){
                        session_start();
                        $_SESSION['email']=$email;
                        $_SESSION['status'] = "active";
                        $_SESSION['user']=$user;
                        header("Location: ../instructor.php?login=success");
                        exit();
                    }
                    else{
                        header("Location: ../signin.php?login=error3");
                        exit();
                    }

                }
            }

        }
    }
    else{
        header("Location: ../loginpage.php?login=error4");
            exit();
    }
