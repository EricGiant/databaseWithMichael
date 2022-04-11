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

    //calculate total days alive
    $birthDate = $result["birthdate"];
    $dayDif = date("d") - ($birthDate[8] . $birthDate[9]);
    $monthDif = date("m") - ($birthDate[5] . $birthDate[6]);
    $yearDif = date("Y") - ($birthDate[0] . $birthDate[1] . $birthDate[2] . $birthDate[3]);
    $totalDays = $dayDif + ($monthDif * (365.25 / 12)) + ($yearDif * 365.25);

    //print page
    $name = $result["firstName"] . " " . $result["lastName"];
    $birthDate = $result["birthdate"];
    $days = floor($totalDays);
    $months = floor($totalDays / (365.25 / 12));
    $years = round($totalDays / 365.25, 1);
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