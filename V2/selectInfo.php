<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <div style = "width:40%; height:500px; border:3px solid black">
    <?php
    //loops for the amount of entries in the database
    $databaseEntryAmount = 5;
    for($i = 0; $i < $databaseEntryAmount; $i++)
    {
        echo("<div>");
    }
    ?>
    </div>
</body>
</html>