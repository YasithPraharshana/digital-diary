<?php
$username_data = "";
$password_data = "";
$data_pass = "";


if (isset($_POST["send"]) and !empty($_POST["send"]) and $_POST["send"] == "ok" ){

if (isset($_POST["username"]) and !empty($_POST["username"])){
    $data_pass = $data_pass + 1;
    $username_data = $_POST["username"];
    $data_pass = $data_pass + 1;
}else{
    echo "Full name is not define";
}

if (isset($_POST["password"]) and !empty($_POST["password"])){
    $data_pass = $data_pass + 10;
    $password_data = $_POST["password"];
    $data_pass = $data_pass + 10;
}else{
    echo "password is not define";
}

}

if ($data_pass == 11){
// Set up the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DiaryDB";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM user WHERE user_name = '$username_data'";

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all the records from the diary table
$result = $conn->query($sql);

// Create an array to store the results
$records = array();
while ($row = $result->fetch_assoc()) {
     if ($username == $row['username']){
        echo "username is correct";
     }else{
        echo "username is incorrect";
     }

     if ($password_data == $row['password']){
        echo "password is correct";
     }else{
        echo "password is incorrect";
     }
}

// Close the database connection
$conn->close();

}
?>