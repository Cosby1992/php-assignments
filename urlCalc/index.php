<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./global.css">
    <title>Url Calculator</title>
</head>
<body>

    <?php

        // checks if parameters are set and update ui accordingly
        if(isset($_GET["a"]) && isset($_GET["b"]) && isset($_GET["operator"])){

            echo returnMethod($_GET["a"], $_GET["b"], $_GET["operator"]);

        } else {

            echo "<div class='content'>

            <h1>URL Calculator</h1>
    
            <div class='headertext'>Welcome to the URL calculator. Input a, b and an Operatotion (plus, minus, multiply or divide).</div>
            <div class='headertext'>You'll need to input all three parameters to calculate a number. </div>
    
            <p>Example:</p>
            <div id='example'>http://localhost:[PORT]?a=1&b=2&operator=plus</div>
        </div>";

        }

        // method that returns a string containing html response based on the calculation of the arguments
        function returnMethod($a, $b, $operator){

            if(calc($a, $b, $operator) === "calcerror"){
                return "<div class='content'>
                <h1>Calculation Error</h1>
                <p>Unknown operation, please use plus, minus, multiply or divide</p>
                </div>";
            } else {

                $result = calc($a, $b, $operator);

                return "<div class='content'>
                <h1>URL Calculator</h1>
                <div class='headertext'>The result of $a $operator $b is $result </div></div>";
            }

            


        }

        // method that returns the result of a calculation according to operation 
        function calc($a, $b, $operator){

            switch($operator){
                case "plus": return $a + $b; break;
                case "minus": return $a - $b; break;
                case "multiply": return $a * $b; break;
                case "divide": return $a / $b; break;
                default: return "calcerror";
            }

        }

    ?>
    

    
</body>
</html>