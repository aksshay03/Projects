<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "barter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$x=$_POST['pname'];
$sql = "DELETE FROM baggage WHERE pname='$x'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>