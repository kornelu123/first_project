<?php   
    $host = 'localhost';
    $dbname = 'FajfusBase';
    $username = 'root';
    $password = 'chu';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $pe) {
        die(" Connect Error :" . $pe->getMessage());
    }