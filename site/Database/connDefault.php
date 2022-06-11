<?php   
    $host = 'localhost';
    $dbname = 'FajfusBase';
    $username = 'root';
    $password = 'chuj';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $pe) {
        die(" Connect Error :" . $pe->getMessage());
    }