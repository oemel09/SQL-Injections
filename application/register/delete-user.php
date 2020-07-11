<?php
include_once('../connection.php');

$query = "DELETE FROM users WHERE username = 'admin\"-- '";
echo '<pre>' . $query . '</pre>';

$result = $mysqli->query($query);
if (!$result) {
    die('Error: ' . $mysqli->error);
}    
$mysqli->close();
