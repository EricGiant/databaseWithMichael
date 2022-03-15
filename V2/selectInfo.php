<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel = "stylesheet" href = "selectInfo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div style = "width: 80%; height:400px; border:3px solid black; margin: auto">
    <?php
    //connect to DB
    
    //return array of entries

    $dbEntries = ["test", "test"];

    //loops for the amount of entries in the database
    $testFirstname = "Eric";
    $testLastname = "Spier";
    $testBirthdate = "2005-07-11";
    $testID = "3";
    //make entry using the returned database info (as array)
    //then use the first letter of the last name + first name + birthdate to show what entry is what
    for($i = 0; $i < count($dbEntries); $i++)
    {
        $fName = $testFirstname;
        $lName = $testLastname[0];
        $bDate = $testBirthdate;
        echo("<div class = 'entry' id = " . $testID . ">");
        echo($lName . "   " . $fName . "<br>" . $bDate);
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
                    location.href = "selectInfo.php?id=" + id;
                });
            });
        });
    </script>
</body>
</html>