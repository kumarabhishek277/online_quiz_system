<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        input[type="number"]{
            width: 150px;
            height: 30px;
            border-radius: 20px;
            font-size: 1.0em;
        }
        #qu{
            width: 130px;
            height: 30px;
            border-radius: 20px;
            font-size: 1.0em;
            margin-left: 12px;
        }
        input[type="text"]
        {
            width: 450px;
            height: 30px;
            border-radius: 10px;
            font-size: 1.0em;
            margin-top: 20px;
            margin-left: 34px;
        }
        #qwe{
            width: 230px;
            height: 30px;
            border-radius: 20px;
            font-size: 1.0em;
            margin-left: 12px;
        }
        .container{
            background-color: grey;
            color: white;
            font-size: 1.3em;
        }
    </style>
   <script>
       function createQuestionForm()
        {
            var x = document.forms["f1"]["val"].value;
            var name = "totalques";
            document.cookie = escape(name) + "=" +  escape(x);
            var table ='';//= 'number of questions: <input type="text" name="totalques" value='+x+' disabled><br>';
            table+="<b>Enter quiz name: </b>";
            table += '<input type="text" placeholder="enter quiz name" name="paperName" required><br>';
            for(var r=0;r<x;r++)
                {
                    table+="Enter the question "+(r+1)+": ";
                    var z = '<input type="text" placeholder="enter question" name="ques'+r+'" required>'+"<br>";
                    table+=z;
                    for(var j =0;j<4;j++)
                        {
                            table+="Enter the option "+(j+1)+" : ";
                            z = '<input type="text" placeholder="enter option" name="option'+r+j+'"required>'+"<br>";
                            table+=z;
                        }
                    table+="Enter the correct answer: ";
                    z = '<input type="text" placeholder="enter correct answer" name="answer'+r+'"required style="margin-left:0px;">'+"<br>";
                    table+=z;
                    if(x>1)
                        {
                            table+="<hr>";
                        }

                }
            table+="<br>";
             z = '<center><button type="submit" name="questionsubmit" id="qwe">Create Question Paper</button></center>';
                    table+=z;
            //alert(x);
            document.getElementById("id1").innerHTML = table;
        }
    </script>
</head>
<body>
    <center><h1>Create Question Paper</h1></center>
    <div>
        <form action="setQuestion.php" name="f1" method="post">
            <p style="font-size:1.4em;"><b>Enter number of questions :- </b>
        <input type="number" min="1" max="10" name="val" value="1">
                <button type="button" name="ques" onclick="createQuestionForm()" id="qu">Create</button></p>
        </form>
    </div>
    <div class="container" style="border:2px solid red;">
       <br>
        <center><form id = "id1" action="setQuestion.php" method="post" style="padding:20px;">
           <h3>Create Questions</h3>
            </form></center>
    </div>

</body>
</html>
