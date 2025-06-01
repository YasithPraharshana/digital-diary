<?php
// Set up the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DiaryDB";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

//get date
if(isset($_GET['sd']) and !empty($_GET['sd']) and isset($_GET['ed']) and !empty($_GET['ed'])){
    $start_date = $_GET['sd'];
    $end_date = $_GET['ed'];
    $sql = "SELECT * FROM diary WHERE '$start_date' <= date AND date <= '$end_date' ORDER BY date ASC";
} else if(isset($_GET['sd']) and !empty($_GET['sd'])){
    $start_date = $_GET['sd'];
    $sql = "SELECT * FROM diary WHERE '$start_date' <= date ORDER BY date ASC";
}else if(isset($_GET['ed']) and !empty($_GET['ed'])){
    $end_date = $_GET['ed'];
    $sql = "SELECT * FROM diary WHERE date <= '$end_date' ORDER BY date ASC";

} else {
    $sql = "SELECT * FROM diary ORDER BY date ASC";
}




// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all the records from the diary table
$result = $conn->query($sql);

// Create an array to store the results
$records = array();
while ($row = $result->fetch_assoc()) {
    $records[] = $row;
}

// Close the database connection
$conn->close();

// Encode the records as JSON
$json = json_encode($records);

// Output the JSON
echo $json;
?>