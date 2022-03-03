<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/B2/css/showData.css">
    <title>Document</title>
</head>
<body>



<?php
//collect info from server

//test info
$firstName = "Eric";
$lastName = "Spier";
$birthDate = "2005-07-11";
echo("<div id = 'selectedDataGrid'>");
echo("<div>");
echo("<div class = 'titleData'  id = 'name_date'>" . "Full name");
echo("<div class = 'userData'>" . $firstName . " " . $lastName . "</div>");
echo("</div>");
echo("<div class = 'titleData'  id = 'name_date'>" . "Birthdate");
echo("<div class = 'userData'>" . $birthDate . "</div>");
echo("</div>");
echo("</div>");
//calculate the age in days/months years and store this in an array
$ages = ageCalculator($birthDate);
echo("<div id = 'agesBox'>");
echo("<div class = 'titleData'>" . "Has been alive for" . "</div>");
echo("<div class = 'userData' id = 'ages'>" . $ages[0] . "</div>");
echo("<div id = 'ages' style = 'font-size: 45px; font-weight:bold'>" . "Days" . "</div>");
echo("<div class = 'userData' id = 'ages'>" . $ages[1] . "</div>");
echo("<div id = 'ages'  style = 'font-size: 45px; font-weight:bold'>" . "Months" . "</div>");
echo("<div class = 'userData' id = 'ages'>" . $ages[2] . "</div>");
echo("<div id = 'ages'  style = 'font-size: 45px; font-weight:bold'>" . "Years" . "</div>");
echo("</div>");
echo("</div>");

function ageCalculator($input)
{
    $input = "11-07-2005";
    //first filter out the -
    //this will give back an array
    $input = preg_split("/[-]/", $input);
    //check if the input is even a falid date
    if(!(checkdate($input[1], $input[0], $input[2])))
    {
        echo("date isn't valid");
        return;
    }
    //calculate date differences
    $dayDif = date("d") - $input[0];
    $monthDif = date("m") - $input[1];
    $yearDif = date("Y") - $input[2];
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
    
</body>
</html>


