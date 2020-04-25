<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        div{
            font-size: 1.3em;
            padding: 20px;
            border-radius: 10px;
            margin: 0 20px 0 20px;
        }
        input[type="radio"]{
            margin: 0 20px 20px 90px;
        }
        button{
            width: 130px;
            height: 30px;
            border-radius: 20px;
            font-size: 1.0em;
            margin-left: 12px;
        }
    </style>
</head>
<body style="background-color:grey;">
 <?php
        session_start();
        include 'includes/dbh.inc.php';
        $data = $_GET["testname"];
    ?>
  <center><h1><?php echo strtoupper($data); ?></h1></center>
   <div style="border: 2px solid red; background-color:lightblue;">
    <?php
        $sql = "select * from ".$data.";";
        $result = mysqli_query($conn,$sql) or die("error in retrieving test questions");
        $count = 0;
        echo "<form action='checkquiz.php?testname=".$data."' method='POST'>";
        while($row = mysqli_fetch_assoc($result)){
            $num = $count + 1;
            echo "Question "."$num : ".$row['question']."<br><br>";
            echo "<input type='radio' name='".$count."' value='".$row['option0']."' required> ".$row['option0']."<br>";
            echo "<input type='radio' name='".$count."' value='".$row['option1']."'> ".$row['option1']."<br>";
            echo "<input type='radio' name='".$count."' value='".$row['option2']."'> ".$row['option2']."<br>";
            echo "<input type='radio' name='".$count."' value='".$row['option3']."'> ".$row['option3']."<br>";
            $count = $count+1;
            echo "<hr>";
        }
        echo "<center><button type='subemit' name='submitquiz'>Submit</button></center>";
        echo "</form>";
    ?>
    </div>
</body>
</html>

