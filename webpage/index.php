<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            // stuff
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
        <link rel="stylesheet" href="index.css">
<!--        <link rel="stylesheet" href="showData.css">-->
        <style>
            body {
                background-color: rgb(33, 33, 33);
                color: white;
            }
        </style>
    </head>
    <body>
        <form method="post">
            <label for="firstName">Voornaam:</label><br/>
            <input type="text" name="firstName"><br/>
            <label for="lastName">Achternaam:</label><br/>
            <input type="text" name="lastName"><br/>
            <label for="birthday">Geboortedatum:</label><br/>
            <input type="date" name="birthdate"><br/>
            <input type="submit" value="🗿">
        </form>
    </body>
</html>