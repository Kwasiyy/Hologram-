<?php
session_start();


if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    include '../settings/connection.php'; 


    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            // Redirect the user to the homepage
            header("Location:../login/feed.php"); 
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }


}

