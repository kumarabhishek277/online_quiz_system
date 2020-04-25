<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/feedbackstyle.css">
</head>
<body style="background-color:grey; color:white;">
  <center><h1>FEEDBACK FORM</h1></center>
   <div>

       <h2>
           <?php
                session_start();
                $data = $_GET["testname"];
                echo "Test name: "."$data"."<br>";
                $email = $_SESSION['email'];
                echo "Email id: "."$email";
           ?>
       </h2>
       <form action="feed.php" method="post">
           <textarea name="comment" id="" cols="60" rows="10" placeholder="Comment" value="No comment"></textarea>
           <input type="text" name="test" value='<?php echo "$data"?>' hidden><br>
           <button type="submit">Submit</button>
       </form>
   </div>
</body>
</html>
