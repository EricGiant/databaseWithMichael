<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "stylesheet" href = "selectInfo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div style ="
    background-color: rgb(228, 224, 235);
    width: 80%;
    height: 400px;
    margin: auto;
    overflow: auto;
    border:10px solid rgb(228, 224, 235);
    border-radius: 30px;
    ">
    <?php
    // Login info for database
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "b2v2";

    // Makes connection to database
    $conn = new mysqli($server, $username, $password, $database);

    // Creates array with all database entries
    $sql = "SELECT * FROM userdata";
    $result = mysqli_query($conn, $sql);
    $entries = array();
    if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $entries[] = $row;
        }
    }

    // Echoes all database entries
    for($i = 0; $i < count($entries); $i++)
    {
        $fName = $entries[$i]["firstName"];
        $lName = $entries[$i]["lastName"];
        $bDate = $entries[$i]["birthdate"];
        echo("<div class = 'entry' id = " . $entries[$i]["ID"] . ">");
        echo substr($fName, 0, 1) . ". " . $lName . "<br/>" . $bDate;
        echo("</div>");
    }
    ?>
    </div>
    <script>
        $(document).ready(function()
        {
            var entries = document.getElementsByClassName("entry");
            console.log(entries);
            $(entries).each(function()
            {
                $(this).click(function()
                {
                    var id = this.id;
                    location.href = "index.php?id=" + id;
                });
            });
        });
    </script>
</body>
</html>