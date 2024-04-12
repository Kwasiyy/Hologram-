<?php
session_start(); 
require '../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $caption = mysqli_real_escape_string($conn, $_POST["caption"]);
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $picture = ""; 
    $audio = "";
    $video = "";

    // Check if picture file is uploaded
    if (!empty($_FILES["picture"]["name"])) {
        echo $_FILES["picture"]["name"];
        $picture = mysqli_real_escape_string($conn, "uploads/" . $_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], "../uploads/" . $_FILES["picture"]["name"]);
    }

    // Check if audio file is uploaded
    if (!empty($_FILES["audio"]["name"])) {
        $audio = mysqli_real_escape_string($conn, "uploads/" . $_FILES["audio"]["name"]);
        move_uploaded_file($_FILES["audio"]["tmp_name"], "../uploads/" . $_FILES["audio"]["name"]);
    }

    // Check if video file is uploaded
    if (!empty($_FILES["video"]["name"])) {
        $video = mysqli_real_escape_string($conn, "uploads/" . $_FILES["video"]["name"]);
        move_uploaded_file($_FILES["video"]["tmp_name"], "../uploads/" . $_FILES["video"]["name"]);
    }

    // Insert post into the database
    $sql = "INSERT INTO posts (user_id, caption , content, picture, audio, video) 
            VALUES ('$user_id', '$caption', '$content', '$picture', '$audio', '$video')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the feed page
        header("Location: ../login/feed.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
