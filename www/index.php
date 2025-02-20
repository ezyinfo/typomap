<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello world</title>
</head>

<body>
    <?php

    // Connect to database


    $host = "mysql";
    $base = "typomapdb";
    $user = "typo";
    $pass = "P@TypoM@p";


    // Connect to the base
    try {
        $conn = new PDO("mysql:host=$host;dbname=$base", $user, $pass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    ?>
</body>

</html>