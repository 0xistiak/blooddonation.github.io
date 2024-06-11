<?php
session_start();
include_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['blood_group'] = $row['blood_group'];
        header("Location: home.php");
    } else {
        echo '<div class="container">';
        echo '<div class="alert">Invalid username or password</div>';
        echo '<a href="index.html"><button>Back to Login</button></a>';
        echo '</div>';
    }
}
?>
