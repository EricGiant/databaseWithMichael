<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "userInfo.css">
</head>
<body>
    <?php
    $id;
    //collect ID send through get
    if($_GET == null)
    {
        return;
    }
    else
    {
        $id = $_GET["id"];
    }
    // server info
    $server = "localhost";
    $database = "b2v2";
    $username = "root";
    $password = "";
    $connection = new mysqli($server, $username, $password, $database);
    //collect info from server
    $sql = "SELECT firstName, lastName, birthdate FROM userdata WHERE id = $id";
    $result = $connection -> query($sql);
    $result = $result -> fetch_assoc();
    //close connection to DB
    $connection -> close();




    $name = $result["firstName"] . " " . $result["lastName"];
    $birthDate = $result["birthdate"];
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