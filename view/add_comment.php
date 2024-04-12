<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post with Comments</title>
    <style>
        .post {
            background-color: #f9f9f9;
            padding: 20px;
            margin: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .comments {
            margin-top: 10px;
        }

        .comment {
            padding: 5px;
            border-radius: 4px;
            background-color: #e8e8e8;
            margin-bottom: 5px;
        }

        .comment-input {
            width: calc(100% - 40px);
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .comment-button {
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h2>Comments</h2>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    require '../settings/connection.php'; 

    $user_id = $_SESSION["user_id"] ?? ''; 
    $post_id = $_POST["post_id"] ?? ''; 
    $content = mysqli_real_escape_string($conn, $_POST["comment"]); 

    // Insert comment into the database
    $sql = "INSERT INTO comments (post_id, user_id, content) 
            VALUES ('$post_id', '$user_id', '$content')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>Comment added successfully.</p>";
        header('Location:../login/feed.php');
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $conn->close();
}
?>

<!-- Display existing comments -->
<div class="comments">
    <?php
    require '../settings/connection.php'; 

    // Fetch comments for the current post from the database
    $post_id = $_GET["post_id"] ?? '';
    if (!empty($post_id)) {
        $sql = "SELECT c.content, u.username 
                FROM comments c 
                INNER JOIN users u ON c.user_id = u.user_id 
                WHERE c.post_id = ? 
                ORDER BY c.created_at DESC";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $post_id); 
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='comment'>";
                echo "<strong>{$row['username']}:</strong> {$row['content']}";
                echo "</div>";
            }
        }
        
        $stmt->close();
    } else {
        echo "<p>No comments found.</p>";
    }
    $conn->close();
    ?>
</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?? ''; ?>">
    <textarea class="comment-input" name="comment" rows="4" placeholder="Add Comment"></textarea><br>
    <input type="submit" class="comment-button" value="Submit">
</form>
</body>
</html>
