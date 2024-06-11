<?php
include_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $blood_group = $_POST['blood_group'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (name, username, phone, address, blood_group, password) VALUES ('$name', '$username', '$phone', '$address', '$blood_group', '$password')";
    if (mysqli_query($mysqli, $query)) {
        header("Location: index.html");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
    mysqli_close($mysqli);
}
?>
