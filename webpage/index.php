<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Webpage</title>
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/showData.css">
    </head>
    <body>
        <div class = "top">
            <form method="post">
                <label class = "text">
                    First Name:<br/>
                    <input type="text" name="firstName" class = "input" autocomplete = "off">
                </label><br/>
                <label class = "text">
                    Last Name:<br/>
                    <input type="text" name="lastName" class = "input" autocomplete = "off">
                </label><br/>
                <label class = "text">
                    Birthdate:<br/>
                    <input type="date" name="birthdate" class = "input" autocomplete = "off">
                </label><br/>
                <input type="submit" value="Submit" id = "submit">
            </form>
        </div>
        <div class = "top">
            <!-- put the select user code here -->
        </div>
        <div id = "part3">
            <!-- code for showData comes here -->
            <?php
            include("../php/showData.php");
            ?>
        </div>
        <?php

//michael make session tooken to see if the site has been launched for the first time
//because on first load the input is empyt so it triggers the alert


// Does some stuff
$server = "localhost";
$database = "b2_eric&michael";
$username = "root";
$password = "";

// Checks if all inputs are filled
if (!empty($_POST['firstName']) and !empty($_POST['lastName']) and !empty($_POST['birthdate'])) {
    // Creates database connection
    $conn = new mysqli($server, $username, $password, $database);

    // Checks if connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetches user input
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthdate = $_POST['birthdate'];

    //checks if user input is valid
    if(!(preg_match("/^[A-Za-z]+$/", $firstName)))
    {
        echo '<script>alert("First name can only contain alphabetic characters")</script>';
        exit;
    }
    if(!(preg_match("/^[A-Za-z]+$/", $lastName)))
    {
        echo '<script>alert("Last name can only contain alphabetic characters")</script>';
        exit;
    }
    //calculate the difference in days between current date and put in date
    //if awnser is negative the birthdate is invalid
    echo($birthdate . "<br>");
    $day_input = $birthdate[8] . $birthdate[9];
    $month_input = $birthdate[5] . $birthdate[6];
    $year_input = $birthdate[0] . $birthdate[1] . $birthdate[2] . $birthdate[3];
    $day_dif = date("d") - $day_input;
    $month_dif = date("m") - $month_input;
    $year_dif = date("Y") - $year_input;
    $days_day = $day_dif;
    $days_month = $month_dif * (365.25 / 12);
    $days_year = $year_dif * 365.25;
    $days_days = $days_day + $days_month + $days_year;

    // if(date("d") < $day)
    // {
    //     echo("Test");
    // }
    // if(date("d", "m", "Y"))
    // {
    //     echo '<script>alert("Birthdate that was put in is invalid")</script>';
    //     exit;
    // }

    // Creates SQL query and executes it
    $sql = "INSERT INTO `userdata` (`ID`, `firstName`, `lastName`, `birthdate`) VALUES (NULL, '$firstName', '$lastName', '$birthdate')";
    if (mysqli_query($conn, $sql)) {
        echo "Succes";
    } else {
        echo "<b>ERROR: </b>" . $sql . "<br/>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
    </body>
</html>