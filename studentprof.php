<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>student
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
    <frame src="studentDashboard.php" noresize="noresize">
    <frameset cols="14%,*">
        <frame src="studentLeft.php" name="frameLeft" noresize="noresize">
        <frame src="Quiz.php" name="frameRight" noresize="noresize">
    </frameset>
</frameset>
</html>
