<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instructor
    </title>
</head>
<?php
    if($_SESSION['status']!="active")
    {
        header("Location:index.php");
        exit(0);
    }
 ?>
<frameset rows="6%,*">
    <frame src="instructorDashboard.php" noresize="noresize">
    <frameset cols="14%,*">
        <frame src="instructorLeft.php" name="frameLeft" noresize="noresize">
        <frame src="setQuiz.php" name="frameRight" noresize="noresize">
    </frameset>
</frameset>
</html>
