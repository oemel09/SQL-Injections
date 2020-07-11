<?php
$dbhost = 'localhost:3306';
$dbuser = 'oemel09';
$dbpass = '';
$dbname = 'sql-injections';
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    die('<p>Could not connect: ' . $mysqli->connect_error . '</p>');
}
