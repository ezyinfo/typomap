<?php


/* For debug purpose only */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* For debug purpose only */

require "inc/config.php";
require "lib/letters.php";



// Get and check query
$query = $_GET['query'] ?? '';

// If query is not alphanum, quit
if ($query != "" && !preg_match('/^[a-zA-Z0-9\-]+$/', $query)) {
    die("Wrong query.");
}

$locations = new Letters($mysql_host, $mysql_user, $mysql_pass, $mysql_base);
if (!$locations->connect()) {
    die("Failed to connect");
}

$location_list = $locations->getLetters($query);

foreach ($location_list as $row) {
    //echo "ID: " . $row['id'] . " - Nom: " . $row['letter'] . "<br>";
}


// Convert to JSON
$jsonResponse = json_encode($location_list);

// Send data
header('Content-Type: application/json');
echo $jsonResponse;
