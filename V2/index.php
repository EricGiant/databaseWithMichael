<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Home</title>
    <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "b2v2";

    if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['birthdate'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $birthdate = $_POST['birthdate'];

        $conn = new mysqli($server, $username, $password, $database);

        $sql = "INSERT INTO `userdata` (`ID`, `firstName`, `lastName`, `birthdate`) VALUES (NULL, '$firstName', '$lastName', '$birthdate')";
        if (mysqli_query($conn, $sql)) {
            echo "Succes";
        } else {
            echo "<b>ERROR: </b>" . $sql . "<br/>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    ?>
</head>
<body>
<a href="selectInfo.php">shidfard</a>
<form method="post">
    <label for="firstName">Voornaam:<br/>
        <input type="text" name="firstName"><br/>
    </label>
    <label for="lastName">Achternaam:<br/>
        <input type="text" name="lastName"><br/>
    </label>
    <label for="birthdate">Geboortedatum:<br/>
        <input type="date" name="birthdate"><br/>
    </label>
    <input type="submit" value="🗿">
</form>
</body>
</html>