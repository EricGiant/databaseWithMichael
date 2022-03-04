<?php
// server info
$server = "localhost";
$database = "b2_eric&michael";
$username = "root";
$password = "";
$connection = new mysqli($server, $username, $password, $database);
// Checks if connection is successful
if ($connection -> connect_error)
{
    die("Connection failed: " . $conn -> connect_error);
}
//collect ID send through post
$ID = 2;
//collect info from server
$sql = "SELECT firstName, lastName, birthdate FROM userdata WHERE id = $ID";
$result = $connection -> query($sql);
$result = $result -> fetch_assoc();
//close connection to DB
$connection -> close();
//echo page
echo("<div id = 'selectedDataGrid'>");
    echo("<div class = 'element'>");
        echo("<div class = 'titleData'>" . "Full name");
            echo("<div class = 'userData'>" . $result["firstName"] . " " . $result["lastName"] . "</div>");
        echo("</div>");
    echo("</div>");
    echo("<div class = 'element'>");
        echo("<div class = 'titleData'>" . "Has been alive for");
            $ages = ageCalculator($result["birthdate"]);
            echo("<div style = 'text-align: left'>");
                echo("<div class = 'dateInput'>" . $ages[0] . "</div>");
                echo("<div class = 'dateWord'>" . "Days" . "</div>");
            echo("</div>");
            echo("<div style = 'text-align: left'>");
                echo("<div class = 'dateInput'>" . $ages[1] . "</div>");
                echo("<div class = 'dateWord'>" . "Months" . "</div>");
            echo("</div>");
            echo("<div style = 'text-align: left'>");
                echo("<div class = 'dateInput'>" . $ages[2] . "</div>");
                echo("<div class = 'dateWord'>" . "Years" . "</div>");
            echo("</div>");
        echo("</div>");
    echo("</div>");
    echo("<div class = 'element'>");
        echo("<div class = 'titleData'>" . "Birthdate");
        echo("<div class = 'userData'>" . $result["birthdate"] . "</div>");
    echo("</div>");
echo("</div>");

function ageCalculator($input)
{
    //first filter out the -
    //this will give back an array
    $input = preg_split("/[-]/", $input);
    //calculate date differences
    $dayDif = date("d") - $input[2];
    $monthDif = date("m") - $input[1];
    $yearDif = date("Y") - $input[0];
    //set date difference over to days
    $days_day = $dayDif;
    $days_month = $monthDif * (365.25 / 12);
    $days_year = $yearDif * 365.25;
    //now add it all together to get the amount of days the user has been alive for
    $alive_days = $days_day + $days_month + $days_year;
    //calculate months alive
    $alive_months = $alive_days / (365.25 / 12);
    //calculate years alive
    $alive_years = $alive_days / 365.25;
    //round all the numbers down and add them to array that will be returned
    $alive_days = floor($alive_days);
    $alive_months = floor($alive_months);
    $alive_years = round($alive_years, 1);
    $array = [];
    array_push($array, $alive_days, $alive_months, $alive_years);
    return $array;
}
?>