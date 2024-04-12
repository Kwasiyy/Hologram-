<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed</title>
    <style>

        body {
            background-color: #fff; 
            color: #000; 
        }

        .profile-button {
            position: fixed;
            top: 20px;
            right: 120px;
            padding: 10px 20px;
            background-color: #333; 
            color: #fff; 
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            z-index: 999;
        }

        .profile-button:hover {
            background-color: #555; 
        }

        .main-content {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }

        .post {
            background-color: #fff;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .post-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .post-content {
            padding: 20px;
        }

        .post-footer {
            background-color: #f8f9fa;
            padding: 10px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .post-footer span {
            margin-right: 10px;
            color: #007bff;
            cursor: pointer;
        }

        .post-footer span:hover {
            text-decoration: underline;
        }

        .add-post-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 200px;
            padding: 10px;
            text-align: center;
            background-color: #333; 
            color: #fff; 
            text-decoration: none;
            border-radius: 4px;
            z-index: 999;
        }

        .add-post-button:hover {
            background-color: #555; 
        }

        .logo {
            position: fixed;
            top: 20px;
            left: 20px;
            width: 160px; 
            height: auto;
            z-index: 999;
        }

        @media (max-width: 768px) {
            .profile-button {
                top: 10px;
                right: 10px;
            }

            .main-content {
                padding: 10px;
            }

            .add-post-button {
                width: calc(100% - 40px);
                left: 20px;
                bottom: 20px;
            }
        }
    </style>
</head>
<body>
<?php
require '../action/get_all_post.php';
$all_posts = get_all_posts();
foreach ($all_posts as $post) {
}
?>

<a href="../view/profile.php" class="profile-button">Profile</a>

<div class="main-content">
    <?php include '../action/feed_action.php'; ?>
</div>

<a href="../view/add_post.php" class="add-post-button">Add Post</a>

<img src="../uploads/images/logowhite.jpeg" alt="Logo" class="logo">

</body>
</html>
