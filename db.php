<?php
$mysqli = new mysqli("localhost", "root", "", "blood_donation");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
