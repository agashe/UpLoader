<?php 
/**
 * UpLoader v1.00
 * 
 * PHP 5.6
 * 
 * @author Mohamed Yossef <engineer.mohamed.yossef@gmail.com>
 * @copyright UpLoader (C) 2018
 */

class database
{
    /**
     * @var resource $conn hold database connection
     */
    private $conn;

    /**
     * constructor
     * 
     * @param string $host      host name
     * @param string $username  host username
     * @param string $password  host password
     * @param string $db_name   database name
     * @return void
     */
    public function __construct($host, $username, $password, $db_name)
    {
        $this->conn = mysqli_connect($host, $username, $password, $db_name);
    }

    /**
     * insert new file
     * 
     * @param string $file_name   
     * @param string $file_link  
     * @param string $file_size 
     * @return bool $result
     */
    public function insertFile($file_name, $file_link, $file_size)
    {
        $query = "INSERT INTO files(file_name, file_link, file_size, file_date) 
                  VALUES('$file_name', '$file_link', $file_size, NOW())";

        $result = mysqli_query($this->conn, $query);

        return $result;
    }

    /**
     * get files
     * 
     * @return array $result
     */
    public function getFiles()
    {
        $query = "SELECT * FROM files ORDER BY file_id DESC";

        $result = mysqli_query($this->conn, $query);

        return $result;
    }
}
?>