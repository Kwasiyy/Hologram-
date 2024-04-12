<?php
session_start();
require '../settings/connection.php'; 

// Check if form is submitted
if (isset($_SERVER["REQUEST_METHOD"])) {
    $request_method = $_SERVER["REQUEST_METHOD"];
    // Get data from the form
    $post_id = $_POST["post_id"];
    $user_id = $_SESSION["user_id"]; 
    $content = mysqli_real_escape_string($conn, $_POST["comment"]); 

    // Insert comment into the database
    $sql = "INSERT INTO comments (post_id, user_id, content) 
            VALUES ('$post_id', '$user_id', '$content')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Comment added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

