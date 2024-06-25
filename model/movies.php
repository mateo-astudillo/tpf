<?php
function get_all_movies(): array {
    global $pdo;
    $q = "SELECT * FROM movies;";
    $stmt = $pdo->prepare($q);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insert_movie() {
    global $pdo;
    $name = $_POST["name"];
    $release_year = $_POST["release_year"];
    $genre = $_POST["genre"];
    $q = "INSERT INTO movies (name, release_year, genre) VALUES(:n, :ry, :g);";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam("n", $name, PDO::PARAM_STR, 255);
    $stmt->bindParam("ry", $release_year, PDO::PARAM_INT);
    $stmt->bindParam("g", $genre, PDO::PARAM_STR, 64);
    $stmt->execute();
}

function remove_movie(int $id) {
    global $pdo;
    $q = "DELETE FROM movies WHERE id = :id;";
    $stmt = $pdo->prepare($q);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
}
