<?php
session_start();
include_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $blood_group = $_POST['blood_group'];

    $query = "INSERT INTO blood_donations (name, phone, address, blood_group) VALUES ('$name', '$phone', '$address', '$blood_group')";
    if (mysqli_query($mysqli, $query)) {
        echo "Your blood donation information has been saved!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>
