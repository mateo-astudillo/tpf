<?php

function get_movie_id($name) {
    global $pdo;
    $q = "SELECT `id` FROM `movies` WHERE `name` = :n;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":n", $name, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)["id"] ?: false;
}

function get_movie($id) {
    global $pdo;
    $q = "SELECT * FROM `movies` WHERE `id` = :id;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_all_movies(): array {
    global $pdo;
    $q = "SELECT * FROM `movies`;";
    $stmt = $pdo->prepare($q);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insert_movie($name, $release_year, $genre) {
    global $pdo;
    $q = "INSERT INTO `movies` (`name`, `release_year`, `genre`) VALUES(:n, :ry, :g);";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam("n", $name, PDO::PARAM_STR, 255);
    $stmt->bindParam("ry", $release_year, PDO::PARAM_INT);
    $stmt->bindParam("g", $genre, PDO::PARAM_STR, 64);
    $stmt->execute();
}

function delete_movies() {
    global $pdo;
    $q_delete = "DELETE FROM `movies`;";
    $stmt = $pdo->prepare($q_delete);
    $stmt->execute();
}
function insert_movies(array $movies) {
    global $pdo;
    $q = "INSERT INTO `movies` (`name`, `release_year`, `genre`) VALUES(:n, :ry, :g);";
    $stmt = $pdo->prepare($q);
    foreach ($movies as $m) {
        $stmt->bindParam(":n", $m["name"], PDO::PARAM_STR, 255);
        $stmt->bindParam(":ry", $m["release_year"], PDO::PARAM_INT);
        $stmt->bindParam(":g", $m["genre"], PDO::PARAM_STR, 64);
        $stmt->execute();
    }
}

function remove_movie($id) {
    global $pdo;
    $q = "DELETE FROM `actors_in_movies` WHERE `movie_id` = :id;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $q = "DELETE FROM `movies` WHERE `id` = :id;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}

function update_movie($movie_id, $name, $release_year, $genre) {
    global $pdo;
    $q = "UPDATE `movies` SET `name` = :n, `release_year` = :ry, `genre` = :g WHERE `id` = :mi;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":mi", $movie_id);
    $stmt->bindParam(":n", $name);
    $stmt->bindParam(":ry", $release_year);
    $stmt->bindParam(":g", $genre);
    $stmt->execute();
}
