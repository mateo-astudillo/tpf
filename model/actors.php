<?php

function get_actor($id) {
    global $pdo;
    $q = "SELECT * FROM actors WHERE id = :id;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

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

function multiple_actors_insert(array $actors) {
    global $pdo;
    $q_delete = "DELETE FROM actors;";
    $stmt = $pdo->prepare($q_delete);
    $stmt->execute();
    $q = "INSERT INTO actors (first_name, last_name, birthdate) VALUES(:fn, :ln, :bd);";
    $stmt = $pdo->prepare($q);
    foreach ($actors as $a) {
        $stmt->bindParam(":fn", $a["first_name"]);
        $stmt->bindParam(":ln", $a["last_name"]);
        $stmt->bindParam(":bd", $a["birthdate"]);
        $stmt->execute();
    }
}

function remove_actor(int $id) {
    global $pdo;
    $q = "DELETE FROM actors_in_movies WHERE actor_id = :id;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $q = "DELETE FROM actors WHERE id = :id;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}
