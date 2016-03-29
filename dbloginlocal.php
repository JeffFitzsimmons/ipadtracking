<?php
date_default_timezone_set('America/Denver');

$mysqli = mysqli_connect("localhost", "root", "NormaJean1", "ipadtracking");

if (!$mysqli) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>
