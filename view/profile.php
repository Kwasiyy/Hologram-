<?php
require '../settings/connection.php';

// Start the session to access session variables
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/login.php");
    exit();
}

// Fetch user's profile information from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT username, profile_picture FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display the profile information
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $profile_picture = $row['profile_picture'];
} else {

    header("Location: ../view/login.php");
    exit();
}

$conn->close();
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

        .profile-header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: relative; 
        }

        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .profile-username {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .logout-button {
            display: block;
            width: 100px;
            padding: 10px;
            margin: 0 auto;
            margin-bottom: 20px;
            border: none;
            background-color: #000;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #333;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px; 
            padding: 10px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="profile-header">
        <?php if (!empty($profile_picture)) : ?>
            <img src="<?php echo $profile_picture; ?>" alt="Profile Picture" class="profile-picture">
        <?php else : ?>
            <img src="default-profile-picture.jpg" alt="Profile Picture" class="profile-picture">
        <?php endif; ?>
        
        <form action="../action/display_pixs.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <input type="file" name="profile_photo" id="profile_photo" accept="image/*">
        <input type="submit" value="Upload Photo" name="submit">
        </form>

        <div class="profile-username"><?php echo $username; ?></div>
        <a href="../action/logout.php" class="logout-button">Logout</a>
        <a href="../login/feed.php" class="back-button">Back to Feed</a> 
    </div>
</body>
</html>