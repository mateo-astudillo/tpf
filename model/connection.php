<?php

$user = getenv("PDO_USER") ?: "root";
$pass = getenv("PDO_PASS") ?: "pass";
$host = getenv("PDO_HOST") ?: "127.0.0.1";
$db = getenv("PDO_DB") ?: "tpf";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass, array(
        PDO::ATTR_PERSISTENT => true
    ));
} catch (PDOException $e) {
    die("Unable connect: " . $e->getMessage());
}
