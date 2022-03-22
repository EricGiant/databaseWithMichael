<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "userInfo.css">
</head>
<body>
    <?php
    $name = "test test";
    $birthDate = "2000-07-20";
    $days = 10;
    $months = 10;
    $years = 10;
    echo("<div id = 'grid'>");
        echo("<div style = 'padding: 10px; display: grid; grid-template-columns: repeat(1, 1fr)'>");
            echo("<div>");
                echo("<div class = 'infoText'>" . "Full name" . "</div>" . "<div class = 'awnserText'>" . $name . "</div>" . "<br>");
            echo("</div>");
            echo("<div>");
                echo("<div class = 'infoText'>" ."Birthdate" . "</div>" . "<div class = 'awnserText' style = 'width: 40%'>" . $birthDate . "</div>");
            echo("</div>");
        echo("</div>");
        echo("<div style = 'padding: 10px'>");
            echo("<div class = 'infoText'>" . "Has been alive for" . "</div>" . "<br>");
            echo("<div class = 'infoText' style = 'font-size: 25px'>" . "Days" . "</div>" . "<div class = 'awnserText'>" . $days . "</div>" . "<br>");
            echo("<div class = 'infoText' style = 'font-size: 25px'>" . "Months" . "</div>" . "<div class = 'awnserText'>" . $months . "</div>" . "<br>");
            echo("<div class = 'infoText' style = 'font-size: 25px'>" . "Years" . "</div>" . "<div class = 'awnserText'>" . $years . "</div>" . "<br>");
        echo("</div>");
    echo("</div>");
    ?>
</body>
</html>