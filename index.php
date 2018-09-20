<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <script src="js/jquery-1.10.0.min.js"></script>
    <script src="js/events.js"></script>
    <script src="js/ajax.js"></script>
    
    <title>UpLoader</title>
</head>
<body>
    <div class="content">
        <h1><a href="index.php"><span class="text-border">Up</span>Loader</a></h1>
        <h3>Keep your files and Share it with friends</h3>

        <div class="main">
            <a href="files.php">Show All Files</a><a id="open-form">Upload New File</a>
        </div>

        <div class="upload-form">
            <p id="error"></p>
            <form action="" method="POST" enctype="multipart/form-data" class="form">
                <input type="text" name="file-name" placeholder="File Name*" id="file-name">
                <input type="file" name="uploaded-file" id="file">
                <p id="note">(Max File Size: 5MB)</p>
                <input type="submit" value="Upload" id="upload-btn">
            </form>
        </div>

        <div class="success-msg">
            <h2>Your file has been uploaded successfully ^__^</h2>
            <a href="files.php">Go To Files</a>
        </div>
    </div>
</body>
</html>