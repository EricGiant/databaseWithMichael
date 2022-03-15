<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Home</title>
    <?php
    // Data for logging into the database
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "b2v2";

    // Checks if all input fields are filled
    if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['birthdate'])) {
        // Fetches input data from post
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $birthdate = $_POST['birthdate'];

        // Checks if any of the names contain chaactes that arent alphabetic
        $numeric = false;
        if (ctype_alpha($firstName) == false || ctype_alpha($lastName) == false) {
            $numeric = true;

            // Sets boolean for error messages later
            if (ctype_alpha($firstName) == false) {
                $firstNameNumeric = true;
            }
            if (ctype_alpha($lastName) == false) {
                $lastNameNumeric = true;
            }
        }

        // Sends input data to database if there ae only alphabetic characters
        if ($numeric ==  false) {
            $conn = new mysqli($server, $username, $password, $database);

            // Prepares SQL statement and executes it
            $sql = "INSERT INTO `userdata` (`ID`, `firstName`, `lastName`, `birthdate`) VALUES (NULL, '$firstName', '$lastName', '$birthdate')";
            if (mysqli_query($conn, $sql)) {
                echo "Succes";
            } else {
                echo "<b>ERROR: </b>" . $sql . "<br/>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }
    ?>
</head>
<body>
<a href="selectInfo.php">shidfard</a>
<form method="post">
    <label for="firstName">Voornaam:<br/>
        <?php if (isset($firstNameNumeric)) {echo "<p class='error'><b>Voornaam mag alleen letters bevatten</b><p/>";} ?>
        <input type="text" name="firstName" <?php if ($numeric == true) {echo "value='" . $firstName . "'";} ?>><br/>
    </label>
    <label for="lastName">Achternaam:<br/>
        <?php if (isset($lastNameNumeric)) {echo "<p class='error'><b>Achternaam mag alleen letters bevatten</b><p/>";} ?>
        <input type="text" name="lastName" <?php if ($numeric == true) {echo "value='" . $lastName . "'";} ?>><br/>
    </label>
    <label for="birthdate">Geboortedatum:<br/>
        <input type="date" name="birthdate" <?php if ($numeric == true) {echo "value='" . $birthdate . "'";} ?>><br/>
    </label>
    <input type="submit" value="🗿">
</form>
</body>
</html>