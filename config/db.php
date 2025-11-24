<?php
$host = '';
$dbname = '';
$username = '';
$password = '';


try{
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password);
} catch (PDOException $e){
    echo "Error de conexión: " . $e->getMessage();
    exit;
}


