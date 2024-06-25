<?php

function get_all_actors(): array {
    global $pdo;
    $q = "SELECT * FROM actors;";
    $stmt = $pdo->prepare($q);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insert_actor() {
    global $pdo;
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $birthdate = $_POST["birthdate"];
    $q = "INSERT INTO actors (first_name, last_name, birthdate) VALUES(:fn, :ln, :bd);";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam("fn", $first_name);
    $stmt->bindParam("ln", $last_name);
    $stmt->bindParam("bd", $birthdate);
    $stmt->execute();
}

function remove_actor(int $id) {
    global $pdo;
    $q = "DELETE FROM actors WHERE id = :id;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}
