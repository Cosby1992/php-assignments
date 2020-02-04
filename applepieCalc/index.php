<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./global.css">

    <title>Æbletærte Beregner</title>
</head>
<body>
    
    <div class="siteHeader"><center>Æbletærten DK</center></div>

    <form action="" method="get">
        <input type="number" class="numOfPersons" placeholder="Antal personer" name="numOfPersons">
        <button type="submit">Beregn</button>
    </form>

    <?php

        if(isset($_GET["numOfPersons"]) && !empty($_GET["numOfPersons"])){

            echo "<div class='centertext'>";
            echo "<p>Viser resultat for " . $_GET["numOfPersons"] . " personer</p>";
            echo "<h1>Mørdejstærtebund</h1>";
            echo "<p>" . 100/6*$_GET["numOfPersons"] . " g smør, koldt</p>"; 
            echo "<p>" . 150/6*$_GET["numOfPersons"] . " g hvedemel</p>";

            echo "<p>" . 2/6*$_GET["numOfPersons"] . " æg, sammenpisket</p>";
            echo "<p>" . 1/6*$_GET["numOfPersons"] . " knivspids salt</p>";

            echo "<h1>Fyld til Æbletærte</h1>";
            echo "<p>" . 350/6*$_GET["numOfPersons"] . " g marcipan, groftrevet</p>";
            echo "<p>" . 3/6*$_GET["numOfPersons"] . " æg</p>";
            echo "<p>" . 1/6*$_GET["numOfPersons"] . " tsk kanel</p>";
            echo "<p>" . 100/6*$_GET["numOfPersons"] . " g smør, stuetemperatur</p>";
            echo "<p>" . 300/6*$_GET["numOfPersons"] . " g æbler, skåret i både</p>";

            echo "<h1>Drys inden bagning</h1>";
            echo "<p>" . 3/6*$_GET["numOfPersons"] . " tsk rørsukker</p>";

            echo "</div>";

            echo "<div class='doThis'>";
            
            echo "<h1>Fremgangsmåde</h1>";

            echo "Tærtedejen
            Skær smørret i små stykker og smuldr det i melet.
            
            Tilsæt æg og sukker. Saml dejen hurtigt. Du skal ikke ælte dejen.
            
            Derefter stilles tærtedejen på køl i en 30 minutter.
            
            Rul dejen ud og læg den i et smurt tærtefad.
            
            Fyld til æbletærte
            Groftrevet marcipan piskes sammen med kanel, smør og æg.
            
            Æbletærte
            Fordel marcipanmassen på tærtebunden og tryk æbleskiverne ned i et fint mønster på kagen.
            
            Drys med lidt rørsukker og bag æbletærten i en forvarmet ovn ved 175 grader varmluft i 30-35 minutter.
            
            Server æbletærte med fx creme fraiche, vanilje is eller flødeskum.";
            
            echo "</div>";

        } else {
            echo "<div class='centertext'>";
            echo "<p>Indtast et antal personer og tryk beregn :)</p>";
            echo "</div>";
        }


    ?>

</body>
</html>