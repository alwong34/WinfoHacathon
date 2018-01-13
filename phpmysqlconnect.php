<?php
require_once 'dbconfig.php';
# http://www.mysqltutorial.org/php-connecting-to-mysql-database/
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    #echo "Connected to $dbname at $host successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}