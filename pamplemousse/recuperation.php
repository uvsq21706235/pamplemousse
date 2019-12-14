<?php
$servername = "localhost";
$username = "Client";
$password = "Client";
$dbname = "user";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

s
$sql = "SELECT DISTINCT nom FROM articles_dispo WHERE categorie like 'jupe'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["nom"].  "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
