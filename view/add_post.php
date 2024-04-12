<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            width: calc(100% - 12px);
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #000; 
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #333; 
        }
        
        .back-to-feed {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .back-to-feed:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <a href="../login/feed.php" class="back-to-feed">Back to Feed</a>
    
    <form id="postForm" action="../action/post.php" method="POST" enctype="multipart/form-data">
        <h2>Add Post</h2>
        <label for="caption">Caption</label>
        <input type="text" id="caption" name="caption" required>
        <label for="content">Content</label>
        <textarea id="content" name="content" rows="4"></textarea>
        <label for="picture">Picture</label>
        <input type="file" id="picture" name="picture" accept="image/*">
        <label for="audio">Audio</label>
        <input type="file" id="audio" name="audio" accept="audio/*">
        <label for="video">Video</label>
        <input type="file" id="video" name="video" accept="video/*">
        <input type="submit" value="Post" name="post" onclick="return validateForm()">
    </form>

    <script>
        function validateForm() {
            var picture = document.getElementById("picture").value;
            var audio = document.getElementById("audio").value;
            var video = document.getElementById("video").value;
            var content = document.getElementById("content").value.trim(); 
            
            // Check if at least one of picture, audio, video, or content is provided
            if (picture === "" && audio === "" && video === "" && content === "") {
                alert("Please provide at least one of Picture, Audio, Video, or Content.");
                return false; 
            }
            return true; 
        }
    </script>
</body>
</html>
