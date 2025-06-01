<?php
// Set up the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DiaryDB";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$today = $_POST["today"];
$description = $_POST["description"];

// Check if the date is valid
if (!checkdate(substr($today, 5, 2), substr($today, 8, 2), substr($today, 0, 4))) {
    echo "Invalid date";
    exit;
}

// Check if the description is not empty
if ($description == "") {
    echo "Please enter a description";
    exit;
}
$description = $conn->real_escape_string($description);
// Create the SQL query
$sql = "INSERT INTO diary (`user_id`,`date`, `description`) VALUES (".'"'.$user_id.'"'.",".'"'.$today.'"'.", ".'"'.$description.'"'.")";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "success"; // Send success response
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>