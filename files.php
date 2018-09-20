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

    <title>UpLoader | All Files</title>
</head>
<body>
    <div class="container">
        <h1><a href="index.php"><span class="text-border">Up</span>Loader</a></h1>
        <h3>Keep your files and Share it with friends</h3>

        <?php
            include "inc/database.inc.php";

            /**
             * Convert float size to letters.
             * 
             * Ex: 4370000 --> 4.37MB
             * 
             * @param float $val the file size that wll be converted
             * @return string
             */
            function convert_size($val){
                if ($val < 999)
                    return $val . "B";
                else if ($val <= 999999)
                    return round(($val/1000), 2) . "KB";
                else 
                    return round(($val/1000000), 2) . "MB";
            }

            /** Connect To Database **/
            $db = new database("localhost", "root", "12345678", "uploader_db");
            $result = $db->getFiles();

            /** Fetch and print the result **/
            while ($file = $result->fetch_array()) {
                //get suitable file size format
                $file_size = convert_size($file[file_size]);

                echo '<div class="file-paner">';
                echo "<p>$file[file_name]</p>";
                echo "<span>$file[file_date]</span> | <span>$file_size</span> | 
                <span><a href='../uploader/files/$file[file_link]' download>Download</a></span>";
                echo '</div>';
            }
        ?>

    </div>
</body>
</html>