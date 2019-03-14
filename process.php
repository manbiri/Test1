<?php

//echo "test";
print_r($_POST);




$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "manolis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Customers (firstName, lastName, Email, Message, Gender, Age, Birthday)
VALUES ('$_POST[firstName]', '$_POST[lastName]', '$_POST[email]', '$_POST[message]', '$_POST[gender]', '$_POST[age]', '$_POST[birthday]')
ON DUPLICATE KEY UPDATE
   firstName = '$_POST[firstName]',
   lastName = '$_POST[lastName]',
   message = '$_POST[message]',
   gender = '$_POST[gender]',
   age = '$_POST[age]',
   birthday = '$_POST[birthday]'";



if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>