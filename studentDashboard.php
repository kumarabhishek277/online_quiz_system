<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        head,body
        {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .navbar{
            position: fixed;
            padding-top: 8px;
            width: 100%;
            background-color: gray;
            height: 100%;
            font-size: 1.6em;
        }
        a {
            color: white;
            text-decoration: none;
            padding-left: 20px;
        }
        a:active{
            color: red;
        }
        a:hover{
            color: black;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#" style="color: bisque">Online Quiz Portal</a>
        <a href="Quiz.php" target="frameRight">Home</a>
        <a href="Quiz.php" target="frameRight">Quizzes</a>
        <a href="about.php" target="frameRight">About Us</a>
        <a href="logout.php" target="_top" style="float: right;padding-right: 20px;">LogOut </a>
        <a href="studentProfile.php" style="float: right" target="frameRight"> Profile</a>

    </div>
</body>
</html>
