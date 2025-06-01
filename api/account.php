<?php
$data_pass = 0;
$name_data = "";
$password_data = "";
$username_data = "";
$email_data = "";

if (isset($_POST["send"]) and !empty($_POST["send"]) and $_POST["send"] == "ok" ){

if (isset($_POST["name"]) and !empty($_POST["name"])){
    $data_pass = $data_pass + 1;
    $name_data = $_POST["name"];
}else{
    echo "Full name is not define";
}

if (isset($_POST["password"]) and !empty($_POST["password"])){
    $data_pass = $data_pass + 10;
    $password_data = $_POST["password"];
}else{
    echo "password is not define";
}

if (isset($_POST["username"]) and !empty($_POST["username"])){
    $data_pass = $data_pass + 100;
    $username_data = $_POST["username"];
}else{
    echo "username is not define";
}

if (isset($_POST["email"]) and !empty($_POST["email"])){
    $data_pass = $data_pass + 1000;
    $email_data = $_POST["email"];
}else{
    echo "email is not define";
}
}

if ($data_pass == 1111){
// Set up the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DiaryDB";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO account(`name`,`user_name`,`email`, `password`, `status`) VALUES ('$name_data','$username_data','$email_data','$password_data','1')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "success"; // Send success response
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


?>