<?php
session_start();
require '../settings/connection.php';


$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .post {
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            position: relative;
        }

        .post h3 {
            margin-top: 0;
        }

        .button {
            display: inline-block;
            padding: 5px 10px; 
            background-color: #333; 
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .button:hover {
            background-color: #555; 
        }

        .post-footer {
            margin-top: 20px;
        }

        .delete-button {
            background-color: #333; 
            color: #fff;
            padding: 5px 10px; 
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
            position: absolute;
            bottom: 10px;
            right: 20px; 
        }

        .delete-button:hover {
            background-color: #555; 
        }
    </style>
</head>
<body>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $post_id = $row['post_id'];
            $user_id = $row["user_id"];
            $caption = $row["caption"];
            $content = $row["content"];
            $picture = $row["picture"];
            $audio = $row["audio"];
            $video = $row["video"];

            // Fetch username of the post creator
            $sql_user = "SELECT username FROM users WHERE user_id='$user_id'";
            $result_user = $conn->query($sql_user);
            if ($result_user->num_rows > 0) {
                $row_user = $result_user->fetch_assoc();
                $username = $row_user["username"];
            }

            // Display post
            echo "<div class='post'>";
            echo "<h3>$username</h3>";
            echo "<p>$caption</p>";
            echo "<p>$content</p>";
            
            // Display picture if available
            if (!empty($picture)) {
                echo "<img src='../$picture' alt='Picture'>";
            }

            // Display audio if available
            if (!empty($audio)) {
                echo "<audio controls>";
                echo "<source src='../$audio' type='audio/mp3'>";
                echo "Your browser does not support the audio element.";
                echo "</audio>";
            }

            // Display video if available
            if (!empty($video)) {
                echo "<video width='320' height='240' controls>";
                echo "<source src='../$video' type='video/mp4'>";
                echo "Your browser does not support the video tag.";
                echo "</video>";
            }


            echo "<div class='post-footer'>";
            echo "<a href='../view/add_comment.php?post_id=$post_id' class='button'>Comments</a>";
            if ($_SESSION['user_id'] == $user_id) {
                echo "<a href='../action/delete.php?post_id=$post_id' class='delete-button'>Delete</a>";
            }
            echo "</div>"; 

            echo "</div>"; 
        }
    } else {
        echo "No posts Yet. Share Your Hobby With The World";
    }
    $conn->close();
    ?>
</body>
</html>
