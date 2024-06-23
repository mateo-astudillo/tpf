<?php
$envs = getenv();
$user = $envs["PDO_USER"];
$pass = $envs["PDO_PASS"];
$host = $envs["PDO_HOST"];
$db = $envs["PDO_DB"];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass, array(
        PDO::ATTR_PERSISTENT => true
    ));
} catch (PDOException $e) {
    die("Unable connect: " . $e->getMessage());
}
