<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            if (!empty($_POST['firstName']) and !empty($_POST['lastName']) and !empty($_POST['birthday'])) {
                echo "true";
            } else {
                echo "false";
            }
        ?>
        <meta charset="UTF-8">
        <title>Webpage</title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="showData.css">
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
            <label for="birthday">Geboortjedatum:</label><br/>
            <input type="date" name="birthday"><br/>
            <input type="submit" value="🗿">
        </form>
    </body>
</html>