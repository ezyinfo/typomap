<?php

require "../lib/config.php";
require "../lib/connector.php";

/* For debug purpose only */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get and check query
$query = $_GET['query'] ?? '';

/*

$carts = new Connector($mysql_host, $mysql_user, $mysql_pwd, $mysql_dbname);
if (!$carts->connect()) {
    die("Failed to connect");
}
$carts_list = $carts->getCarts($query);

*/

// Stub for testing only
$locations = array(
    array("id" => 1, "name" => "Rennes")
);

// Convert to JSON
$jsonResponse = json_encode($carts_list);

// Send data
header('Content-Type: application/json');
echo $jsonResponse;
