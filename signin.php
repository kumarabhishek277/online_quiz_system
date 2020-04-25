

<!doctype html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="css/signinstyle.css">
    </head>
    <script>
        function signInValidation()
        {
            var a =document.forms["signin"]["email"].value;
            var b = document.forms["signin"]["password"].value;
            var c = document.forms["signin"]["user"].value;
            if(a==""||b==""||c=="")
                {
                    alert("Fill all the fields");
                    exit(0);
                }
        }
    </script>
    <body>
    <center><h1>Online Quiz System</h1></center>
     <div >
         <p style="font-family:serif;padding-top:40px;text-align: center; font-size: 2em"><b>Login Page</b></p>
       <form action="includes/signin_inc.php" method="POST" name="signin">
         <h4>
             <input type="radio" name="user" value="instructor">Instructor <input type="radio" name="user" value="student">Student
         </h4>
          <p>
           Email
           <input type="email" name="email" placeholder="Enter Email" required>
           </p>
             <p>
              Password
               <input type="password" name="password" placeholder="Enter Password" required>
               <button type="submit" name="loginsubmit">Submit</button>
       </form>
       <p style="font-size: 1.2em">
        No Account ? <a href="signup.php">Register</a>
       </p>
     </div>

    </body>
</html>
