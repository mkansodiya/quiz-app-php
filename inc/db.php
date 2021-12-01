
<?php
$host = 'localhost';
$database = 'quiz';
$username = 'root';
$password = '';

$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    echo 'databse connection error';
}
