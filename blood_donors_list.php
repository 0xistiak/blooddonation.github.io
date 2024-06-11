<?php
include_once("db.php");

$query = "SELECT * FROM blood_donations";
$result = mysqli_query($mysqli, $query);

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Blood Donors List</title>";
echo "<link rel='stylesheet' href='styles.css'>";
echo "</head>";
echo "<body>";
echo "<div class='container'>";
echo "<h2>Blood Donors List</h2>";
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Name</th><th>Phone</th><th>Address</th><th>Blood Group</th><th>Donation Date</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
        echo "<td>" . htmlspecialchars($row['blood_group']) . "</td>";
        echo "<td>" . htmlspecialchars($row['donation_date']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No donors found.</p>";
}
echo "<a href='home.php'><button>Back to Home</button></a>";
echo "</div>";
echo "</body>";
echo "</html>";

mysqli_close($mysqli);
?>
