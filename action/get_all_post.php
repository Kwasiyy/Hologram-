<?php
require '../settings/connection.php';

function get_all_posts() {
    global $conn; 
    // SQL query to select all posts
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";

  
    $result = $conn->query($sql);

    // Check if there are any posts
    if ($result->num_rows > 0) {
        // Initialize an empty array to store the posts
        $posts = array();

        // Fetch data for each post
        while ($row = $result->fetch_assoc()) {
    
            $posts[] = $row;
        }

        return $posts;
    } else {
        return array();
    }
}

