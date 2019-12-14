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

$rech = $_POST['recherche'];

$sql = "SELECT DISTINCT nom FROM articles_dispo WHERE 
				categorie like '".$rech."' OR
				couleur like '".$rech."' OR
				nom like '%".$rech."%'  ";
				
				
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " " . $row["nom"].  "<br>";
    }
    
} else {
    echo "aucun résultat n'a été trouvé pour la recherche \" ".$rech." \"";
}
$conn->close();

?>
