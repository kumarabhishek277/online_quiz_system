<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>17BCI0145</title>
    <link rel="stylesheet" href="css/signupstyle.css">
</head>
   <script>
       function test_password(str)
       {

            if (str.match(/[a-z]/g) && str.match(
                    /[A-Z]/g) && str.match(
                    /[0-9]/g) && str.match(
                    /[^a-zA-Z\d]/g) && str.length >= 8)
                return true;
            else
                return false;

        }
       function test_email(mail)
        {
         if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
          {
            return (true)
          }
            return (false)
        }
       function signupValidation()
       {
            var fname = document.forms["signUp"]["fname"].value;
           var lname = document.forms["signUp"]["lname"].value;
           var gender = document.forms["signUp"]["gender"].value;
           var user = document.forms["signUp"]["user"].value;
           var email = document.forms["signUp"]["email"].value;
           var username = document.forms["signUp"]["username"].value;
           var password = document.forms["signUp"]["password"].value;
           var repassword = document.forms["signUp"]["repassword"].value;
           var dob = document.forms["signUp"]["dob"].value;
           var mobile = document.forms["signUp"]["mobNumber"].value;
           var address = document.forms["signUp"]["address"].value;
           if(fname==""||lname==""||gender==""||user==""||email==""||username==""||password==""||dob==""||address==""||mobile=="")
               {
                   alert("Fill all the fields");
                   exit(0);
               }
           if(!test_email(email))
               {
                   alert("Please enter a valid email id");
                   exit(0);
               }
           if(!test_password(password))
               {
                  alert("Weak Password");
                    exit(0);
               }
           if(password!=repassword)
               {
                   alert("Both the password should be matched");
                   exit(0);
               }
           if(mobile.length!=10)
               {
                   alert("Mobile number should be of 10 digits");
                   exit(0);
               }
           var a = mobile.toString();
           if(a[0]==0)
               {
                   alert("Please enter valid mobile number");
                   exit(0);
               }

       }
       function myFunction(str)
       {
        str.value = str.value.toUpperCase();
       }
    </script>
<body>
      <?php  include 'includes/phpsignup.php';
        ?>
       <center><h1>Online Quiz System</h1></center>
   <div class="container"  style="background-color:aqua;">
       <p style="font-family:serif; padding-top:20px;text-align: center; font-size: 2em;"><b>Sign Up Page</b></p>
       <form method ="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="signUp">
         <table>
             <tr>
                 <td style="width: 90px">First Name</td>
                 <td style="width: 450px"><input type="text" placeholder="First Name" name="fname" onkeyup="myFunction(this)"><span class="error">* <?php echo "$ferr"?></span></td>
             </tr>
             <tr>
                 <td>Last Name</td>
                 <td colspan="2"><input type="text" placeholder="Last Name" name="lname" onkeyup="myFunction(this)">
                 <span class="error">* <?php echo "$lerr"?></span></td>
             </tr><br>
             <tr>
                 <td>Gender</td>
                 <td><input type="radio" name="gender" value="male">Male <input type="radio" name="gender" value="female">Female  <span class="error"> * <?php echo "$gendererr"?></span></td>
             </tr>
             <tr>
                 <td>User</td>
                 <td><input type="radio" name="user" value="instructor">Instructor <input type="radio" name="user" value="student">Student  <span class="error">*  <?php echo "$usererr"?></span></td>
             </tr>
             <tr>
             <td>Email</td>
                 <td colspan="3"><input type="email" name="email" placeholder="Enter Email"><span class="error"> * <?php echo "$emailerr"?></span></td>
             </tr>
             <br>
             <tr>
                 <td>Username</td>
                 <td colspan="2"><input type="text" name="username" placeholder="Enter username"><span class="error"> * <?php echo "$usernameerr"?></span></td>

             </tr>
             <tr>
                 <td>Password</td>
                 <td colspan="2"><input type="password" name="password" placeholder="Enter password"><span class="error"> * <?php echo "$passworderr"?></span></td>
             </tr>
             <tr>
                 <td>Re-password</td>
                 <td colspan="2"><input type="password" name="repassword" placeholder="Re-enter password"> <span class="error"> * <?php echo "$repassworderr"?></span></td>
             </tr>
             <br>
             <tr>
                 <td>Nationality</td>
                 <td>
                    <input type="text" name="nationality" onkeyup="myFunction(this)"><span class="error"> * <?php echo "$nationalityerr"?></span>
                    </td>
             </tr>
             <tr>
                 <td>D.O.B</td>
                 <td colspan="2"><input type="date" name="dob"><span class="error"> * <?php echo "$doberr"?></span></td>
             </tr>
             <br>
             <tr>
                 <td>Mobile No.</td>
                 <td><input type="number" placeholder="Mob. Number" name="mobNumber"><span class="error"> * <?php echo "$mobileerr"?></span></td>
             </tr>

             <br>
             <tr>
                 <td>Residential Address</td>
                 <td><textarea rows="4" cols="50" placeholder="Enter the address" name="address"></textarea><span class="error"> * <?php echo "$addresserr"?></span></td>
             </tr>
             <tr>
                 <td><input type="reset" value="Reset"></td>
                 <td><button type="submit" onclick="signupValidation()" name="signupsubmit">Submit</button></td>
             </tr>
         </table>


       </form>
       <p style="font-size: 1.2em;padding-left: 30%">
        Do u have account already ? <a href="signin.php">LogIn</a>
       </p>
   </div>
</body>
</html>
