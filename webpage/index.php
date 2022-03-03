<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
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
        <meta charset="UTF-8">
        <title>Webpage</title>
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/showData.css">
    </head>
    <body>
        <div id = "part1">
            <form method="post">
                <label>
                    Voornaam:<br/>
                    <input type="text" name="firstName">
                </label><br/>
                <label>
                    Achternaam:<br/>
                    <input type="text" name="lastName">
                </label><br/>
                <label>
                    Geboortedatum:<br/>
                    <input type="date" name="birthdate">
                </label><br/>
                <input type="submit" value="🗿">
            </form>
        </div>
        <div id = "part2">
            <!-- put the select user code here -->
        </div>
        <div id = "part3">
            <!-- code for showData comes here -->
            <?php
            include("../php/showData.php");
            ?>
        </div>
    </body>
</html>