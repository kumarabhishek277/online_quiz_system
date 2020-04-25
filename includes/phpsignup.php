<?php

include 'dbh.inc.php';

$fname = $lname = $gender = $user =$email = $username =$password = $repassword = $nationality = $dob =$mobNumber = $address = "";

$ferr = $lerr = $gendererr = $usererr =$emailerr = $usernameerr =$passworderr = $repassworderr = $nationalityerr = $doberr =$mobileerr = $addresserr = "";






if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["signupsubmit"]))
{
    $correct = 1;
    if(empty($_POST["fname"]))
    {
        $correct = 0;
        $ferr = "First name is required";
    }
    else
    {
        $fname=test_input($_POST["fname"]);
		if(!preg_match("/^[a-zA-Z]*$/",$fname))
		{
            $correct = 0;
			$ferr="Only Characters are allowed";
		}

    }
    if(empty($_POST["lname"]))
    {
        $correct = 0;
         $lerr = "Last name is required";
    }
    else
    {
        $lname=test_input($_POST["lname"]);
		if(!preg_match("/^[a-zA-Z]*$/",$lname))
		{
            $correct = 0;
			$lerr="Only Characters are allowed";
		}

    }
    if(empty($_POST["gender"]))
    {
        $correct = 0;
         $gendererr = "Please select gender";
    }
    else
    {

        $gender = $_POST["gender"];
    }
    if(empty($_POST["user"]))
    {
        $correct = 0;
         $usererr = "Please select user";
    }
    else
    {
       $user = $_POST["user"];
    }
    if(empty($_POST["email"]))
    {
        $correct = 0;
         $emailerr = "Email is required";
    }
    else
    {
       $email = $_POST["email"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    	if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
            $correct = 0;
			$emailErr = "Invalid email format";
    	}
    }
    if(empty($_POST["username"]))
    {
        $correct = 0;
         $usernameerr = "User name is required";
    }
    else
    {
            $username=test_input($_POST["username"]);
			if(!preg_match("/^[a-zA-Z0-9_]*$/",$username))
			{
			 $usernameerr="Enter vaild Username";
			}
    }
    if(empty($_POST["password"]))
    {
        $correct = 0;
         $passworderr = "Please enter password";
    }
    else
    {
       $password = $_POST["password"];
        if (strlen($password) < 8)
        {   $correct = 0;
            $passworderr = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $correct = 0;
            $passworderr = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $correct = 0;
            $passworderr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $correct = 0;
            $passworderr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
        else
        {
            $correct = 1;
        }

    }
    if(empty($_POST["repassword"]))
    {
        $correct = 0;
         $repassworderr = "Enter the password";

    }
    else
    {
       $repassword = $_POST["repassword"];
        if($repassword != $password)
        {
           $repassworderr = "Both the password should be matched";
        }
    }
    if(empty($_POST["nationality"]))
    {
        $correct = 0;
         $nationalityerr = "Plesae enter your Nationality";
    }
    else
    {
       $nationality = $_POST["nationality"];
    }
    if(empty($_POST["dob"]))
    {
        $correct = 0;
         $doberr = "Please enter your DOB";
    }
    else
    {
       $dob = $_POST["dob"];
    }
    if(empty($_POST["mobNumber"]))
    {
        $correct = 0;
        $mobileerr = "Required";
    }
    else
    {
        $mobNumber=$_POST["mobNumber"];
			if(!preg_match("/[6789]{1}[0-9]{9}/",$mobNumber))
			{
                $correct = 0;
				$mobileerr="Enter vaild Mobilenumber";
			}

    }
    if(empty($_POST["address"]))
    {
        $correct = 0;
         $addresserr = "Required";
    }
    else
    {

            $address=test_input($_POST["address"]);
//			if(!preg_match('/\d+ [0-9a-zA-Z ]+/', $address))
//			{
//                $correct = 0;
//				$addresserr="Enter valid/complete Address";
//			}

    }
    if($correct == 1)
    {
        if($user == "student")
        {
            $sql = "select * from student where email='$email';";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0)
            {
                $emailError = "Email id already present";
            }
            else
            {
                $sql = "insert into student values('$fname', '$lname', '$gender', '$email',  '$username', '$password' , '$nationality', '$dob', '$mobNumber',  '$address');";
                mysqli_query($conn,$sql);
                header("Location: index.php?registration:success");
                exit(0);
               //echo "success";
               //header("Location: ../index.php?registration=success");
            }
        }
        if($user == "instructor")
        {
            $sql = "select * from instructor where email='$email';";
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0)
            {
                $emailError = "Email id already present";
            }
            else
            {
                $sql = "insert into instructor values('$fname', '$lname', '$gender', '$email',  '$username', '$password' , '$nationality', '$dob', '$mobNumber',  '$address');";
                mysqli_query($conn,$sql);
                header("Location: index.php?registration:success");
                exit(0);
               //echo "success";
               //header("Location: ../index.php?registration=success");
            }
        }




    }
    else
    {
        echo "Correct is not equal to 1";
    }

}
else
{
    //header("Location: ../index.php?error=something wrong");
    //exit();
}

function test_input ($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
