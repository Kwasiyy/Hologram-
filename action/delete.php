<?php
session_start();
require '../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $user_id = $_SESSION['user_id'];

    // Check if the user is the owner of the post
    $sql_check_owner = "SELECT * FROM posts WHERE post_id = $post_id AND user_id = $user_id";
    $result_check_owner = $conn->query($sql_check_owner);

    if ($result_check_owner->num_rows > 0) {
        // Delete associated comments first
        $sql_delete_comments = "DELETE FROM comments WHERE post_id = $post_id";
        if ($conn->query($sql_delete_comments) === TRUE) {
            // Once comments are deleted, delete the post
            $sql_delete_post = "DELETE FROM posts WHERE post_id = $post_id";
            if ($conn->query($sql_delete_post) === TRUE) {
                header("Location: ../login/feed.php");
                exit(); 
            } else {
                echo "Error deleting post: " . $conn->error;
            }
        } else {
            echo "Error deleting comments: " . $conn->error;
        }
    } else {
        echo "You don't have permission to delete this post.";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
