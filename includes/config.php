<?php

// Conectar ao banco
try {
    $pdo = new PDO("mysql:dbname=class;host=localhost", "root", "");
} catch (PDOException $e) {
    echo $e->getMessage();
}
