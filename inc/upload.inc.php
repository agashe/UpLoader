<?php 
/**
 * UpLoader v1.00
 * 
 * PHP 5.6
 * 
 * @author Mohamed Yossef <engineer.mohamed.yossef@gmail.com>
 * @copyright UpLoader (C) 2018
 */

include "database.inc.php";

/**
 * Get The Request Data.
 * 
 * @var string $file_name hold file description by the user
 * @var string $file_link hold the real file name on the server
 * @var float $file_size the file size 
 */
$file_name = $_POST["file_name"];
$file_link = $_FILES["uploaded-file"]["name"];
$file_size = $_FILES["uploaded-file"]["size"];

/**
 * Set The File Path On The Server.
 * 
 * @var string $target_dir the folder will keep the uploaded files
 * @var string $target_file the file path on the sever for downlaod
 */
$target_dir = "../files/";
$target_file = $target_dir . basename($_FILES["uploaded-file"]["name"]);

/**
 * Response depending on request status:
 * - file name empty
 * - user didn't choose a file
 * - file size > 5MB
 * - database connection error
 */
if (empty($file_name)) {
    echo "empty name";
}
else if ($file_size > 5000000) {
    echo "big file";
}
else {
    /** Move the file to its new location **/
    if (move_uploaded_file($_FILES["uploaded-file"]["tmp_name"], $target_file)) {
        //just for access deniend problem!!
        chmod($target_file, 777); 

        /** Connect to DB and insert the data  **/
        $db = new database("localhost", "root", "12345678", "uploader_db");
        $result = $db->insertFile($file_name, $file_link, $file_size);

        if ($result == true) {
            echo "success";
        } else {
            echo "database error";
        }
    }else{
        echo "file error";
    }
}
