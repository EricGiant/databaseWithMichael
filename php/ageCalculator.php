<?php
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
    //check if the month has a 0 and if it does remove it
    // if(substr($input[1], 0, 1) == 0)
    // {
    //     $input[1] = substr($input[1], 1, 1);
    // }
    //calculate the total amount of days
    $amountInDays_day = $input[0];
    echo($amountInDays_day . "<br>");
    $amountInDays_month = $input[1] * (365.25 / 12);
    echo($amountInDays_month . "<br>");
    $amountInDays_year = $input[2] * 365.25;
    echo($amountInDays_year . "<br>");
?>