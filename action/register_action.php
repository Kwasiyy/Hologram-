<?php
require '../settings/connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    $email = $_POST["email"];
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $phoneNumber = $_POST["phoneNumber"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute SQL statement
    $sql = "INSERT INTO users (username, password, email, full_name, gender, dob, phone_number) 
            VALUES ('$username', '$hashedPassword', '$email', '$firstName $lastName', '$gender', '$dob', '$phoneNumber')";

    if ($conn->query($sql) === TRUE) {
        header("Location:../login/login_view.php"); 
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request method";  // For debugging purposes
}

// Close database connection
$conn->close();
